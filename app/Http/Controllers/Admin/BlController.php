<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bl;
use App\Models\BlDetail;
use App\Models\BlStamp;
use App\Models\BlContainer;
use App\Models\BlRef;
use App\Models\Vessel;
use App\Models\Voyage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminNotification;
use App\Models\Job;
use App\Models\JobRouting;
use Image;
use Validator;
use Session;
use File;
use Yajra\DataTables\Facades\DataTables;

class BlController extends Controller
{
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = Bl::Query();
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        if (isset($request->job_id)) {
            $data['job_data'] = $this->get_data_by_job($request->job_id);
        }
        //return $data['job_data'];

        $data['seo_title']      = "B/L";
        $data['seo_desc']       = "B/L";
        $data['seo_keywords']   = "B/L";
        $data['page_title'] = "B/L";
        $data['vessels'] = Vessel::select(["id", "vessel_name as text"])->get();
        $data['vessels'] = $data['vessels']->toArray();
        $data['voyages'] = Voyage::get();
        return view('admin.bl.create', $data);
    }

    public function edit($id)
    {
        $data['seo_title']      = "Edit B/L";
        $data['seo_desc']       = "Edit B/L";
        $data['seo_keywords']   = "Edit B/L";
        $data['page_title'] = "Edit B/L";
        $data['bl'] = Bl::where("id", $id)->first();
        return view('admin.bl.edit', $data);
    }

    public function delete($id)
    {
        Bl::where("id", $id)->delete();
        BlRef::where('bl_id', $id)->delete();
        BlStamp::where('bl_id', $id)->delete();
        BlDetail::where('bl_id', $id)->delete();
        BlContainer::where('bl_id', $id)->delete();

        $notify[] = ['success', 'BL Deleted Successfully.'];
        return redirect()->route('admin.bl.create')->withNotify($notify);
    }

    public function print($id)
    {
        $data['seo_title']      = "Print B/L";
        $data['seo_desc']       = "Print B/L";
        $data['seo_keywords']   = "Print B/L";
        $data['page_title'] = "Print B/L";
        $data['bl'] = Bl::where("id", $id)->first();
        $data['bl_detail'] = BlDetail::where('bl_id', $id)->first();
        $data['bl_stamp'] = BlStamp::where('bl_id', $id)->first();
        $data['bl_ref'] = BlRef::where('bl_id', $id)->first();
        $data['bl_container'] = BlContainer::where('bl_id', $id)->get();
        return view('admin.bl.print', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_no' => ['required', 'unique:bl'],
        ]);

        $bl = new Bl();
        $bl->job_id = $request->job_id;
        $bl->job_no = $request->job_no;
        $bl->status = $request->status;
        $bl->hbl = $request->hbl;
        $bl->hbl_date = $request->hbl_date;
        $bl->mbl = $request->mbl;
        $bl->mbl_date = $request->mbl_date;
        $bl->source_date = $request->source_date;
        $bl->hbl_issue = isset($request->hbl_issue) ? $request->hbl_issue : 0;
        $bl->shipper = $request->shipper;
        $bl->consignee = $request->consignee;
        $bl->notify1 = $request->notify1;
        $bl->notify2 = $request->notify2;
        $bl->vessel = $request->vessel;
        $bl->sailing_date = $request->sailing_date;
        $bl->voyage = $request->voyage;
        $bl->pol = $request->pol;
        $bl->pofd = $request->pofd;
        $bl->pot = $request->pot;
        $bl->final_destination = $request->final_destination;
        $bl->commodity = $request->commodity;
        $bl->reference_number = $request->reference_number;
        $bl->overseas_agent = $request->overseas_agent;
        $bl->shipping_line_carrier = $request->shipping_line_carrier;
        $bl->total_container = $request->total_container;
        $bl->delivery = $request->delivery;

        if ($bl->save()) {
            $this->bl_ref_info($request, $bl->id);
            $this->bl_detail_store($request, $bl->id);
            $this->bl_stamps_store($request, $bl->id);
            $this->bl_container_info($request, $bl->id);
        }

        $notify[] = ['success', 'BL Added Successfully.'];
        return redirect()->route('admin.bl.create')->withNotify($notify);
    }

    public function bl_container_info($request, $id)
    {
        $c_container_no = $request->c_container_no;
        if ($c_container_no) {
            BlContainer::where('bl_id', $id)->delete();
            foreach ($c_container_no as $key => $value) {
                $bl_container = new BlContainer();
                $bl_container->bl_id = $id;
                $bl_container->c_container_no = $request->c_container_no[$key];
                $bl_container->c_seal = $request->c_seal[$key];
                $bl_container->c_size_type = $request->c_size_type[$key];
                $bl_container->c_rate_group = $request->c_rate_group[$key];
                $bl_container->c_gross_wt = $request->c_gross_wt[$key];
                $bl_container->c_net_wt = $request->c_net_wt[$key];
                $bl_container->c_tare_wt = $request->c_tare_wt[$key];
                $bl_container->c_wt_unit = $request->c_wt_unit[$key];
                $bl_container->c_cbm = $request->c_cbm[$key];
                $bl_container->c_packages = $request->c_packages[$key];
                $bl_container->c_unit = $request->c_unit[$key];
                $bl_container->c_temperature = $request->c_temperature[$key];
                $bl_container->c_voltage = $request->c_voltage[$key];
                $bl_container->c_load_type = $request->c_load_type[$key];
                $bl_container->c_remarks = $request->c_remarks[$key];
                $bl_container->c_free_days_detention = $request->c_free_days_detention[$key];
                $bl_container->c_free_days_demurrage = $request->c_free_days_demurrage[$key];
                $bl_container->c_free_days_plugin = $request->c_free_days_plugin[$key];
                $bl_container->c_line_code = $request->c_line_code[$key];
                $bl_container->c_part_fcl = @$request->c_part_fcl[$key];
                $bl_container->c_soc = @$request->c_soc[$key];
                $bl_container->c_dg = $request->c_dg[$key];
                $bl_container->c_imdg = $request->c_imdg[$key];
                $bl_container->c_un_no = $request->c_un_no[$key];
                $bl_container->c_number = $request->c_number[$key];
                $bl_container->c_date = $request->c_date[$key];
                $bl_container->c_oog = @$request->c_oog[$key];
                $bl_container->c_top = $request->c_top[$key];
                $bl_container->c_right = $request->c_right[$key];
                $bl_container->c_left = $request->c_left[$key];
                $bl_container->c_front = $request->c_front[$key];
                $bl_container->c_back = $request->c_back[$key];
                $bl_container->save();
            }
        }
    }

    public function bl_detail_store($request, $id)
    {
        $bl_detail = BlDetail::where('bl_id', $id)->first();

        if (empty($bl_detail)) {
            $bl_detail = new BlDetail();
        }

        $bl_detail->bl_id = $id;
        $bl_detail->fill($request->all());
        $bl_detail->save();
    }

    public function bl_ref_info($request, $bl_id)
    {
        $bl_stamp = BlStamp::where('bl_id', $bl_id)->first();

        if (empty($bl_stamp)) {
            $bl_stamp = new BlStamp();
        }

        $bl_stamp->bl_id = $bl_id;
        $bl_stamp->r_invoice_number = $request->r_invoice_number;
        $bl_stamp->r_inv_date = $request->r_inv_date;
        $bl_stamp->r_export_number = $request->r_export_number;
        $bl_stamp->r_exp_date = $request->r_exp_date;
        $bl_stamp->r_contact_number = $request->r_contact_number;
        $bl_stamp->r_contact_date = $request->r_contact_date;
        $bl_stamp->r_lc_number = $request->r_lc_number;
        $bl_stamp->r_lc_date = $request->r_lc_date;
        $bl_stamp->r_client_ref_number = $request->r_client_ref_number;
        $bl_stamp->r_shipper_ref_number = $request->r_shipper_ref_number;
        $bl_stamp->r_s_bill = $request->r_s_bill;
        $bl_stamp->r_date = $request->r_date;
        $bl_stamp->save();
    }

    public function bl_stamps_store($request, $id)
    {
        $r_code = $request->r_code;
        if ($r_code) {
            BlRef::where('bl_id', $id)->delete();
            foreach ($r_code as $key => $value) {
                $bl_ref = new BlRef();
                $bl_ref->bl_id = $id;
                $bl_ref->r_code = $request->r_code[$key];
                $bl_ref->r_stamp = $request->r_stamp[$key];
                $bl_ref->r_stamp_group = $request->r_stamp_group[$key];
                $bl_ref->r_stamp_date = $request->r_stamp_date[$key];
                $bl_ref->r_remarks = $request->r_remarks[$key];
                $bl_ref->save();
            }
        }
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'job_no' => 'required',
        ]);

        $bl = Bl::where("id", $request->id)->first();
        $bl->job_id = $request->job_id;
        $bl->job_no = $request->job_no;
        $bl->status = $request->status;
        $bl->hbl = $request->hbl;
        $bl->hbl_date = $request->hbl_date;
        $bl->mbl = $request->mbl;
        $bl->mbl_date = $request->mbl_date;
        $bl->source_date = $request->source_date;
        $bl->hbl_issue = isset($request->hbl_issue) ? $request->hbl_issue : 0;
        $bl->shipper = $request->shipper;
        $bl->consignee = $request->consignee;
        $bl->notify1 = $request->notify1;
        $bl->notify2 = $request->notify2;
        $bl->vessel = $request->vessel;
        $bl->sailing_date = $request->sailing_date;
        $bl->voyage = $request->voyage;
        $bl->pol = $request->pol;
        $bl->pofd = $request->pofd;
        $bl->pot = $request->pot;
        $bl->final_destination = $request->final_destination;
        $bl->commodity = $request->commodity;
        $bl->reference_number = $request->reference_number;
        $bl->overseas_agent = $request->overseas_agent;
        $bl->shipping_line_carrier = $request->shipping_line_carrier;
        $bl->total_container = $request->total_container;
        $bl->delivery = $request->delivery;

        if ($bl->save()) {
            $this->bl_ref_info($request, $bl->id);
            $this->bl_detail_store($request, $bl->id);
            $this->bl_stamps_store($request, $bl->id);
            $this->bl_container_info($request, $bl->id);
        }

        $notify[] = ['success', 'BL Updated Successfully.'];
        return redirect()->route('admin.bl.create')->withNotify($notify);
    }

    public function get_data_by_job($job_id)
    {
        $arr = [
            "bl" => [],
            "container_info" => [],
            "bl_details" => [],
            "bl_ref_info" => [],
            "bl_stamps" => []
        ];

        $job = Job::where('id', $job_id)
            ->select(
                'job_number as job_no',
                'shipper',
                'consignee',
                'commodity',
                'port_of_loading',
                'final_destination',
                'sline_carrier as shipping_line_carrier',
                'overseas_agent',
                'vessel',
                'voyage',
                'container as total_container',
                'delivery',
            )
            ->with(
                'shippers',
                'consignees',
                'vessels',
                'voyages',
                'commodities',
                'overseas_agents',
                'sline_carriers',
                'port_of_loading',
                'final_destination'
            )
            ->first();

        $job_routing = JobRouting::where('job_id', $job_id)
            ->select(
                'r_place_of_receipt',
                'r_port_of_loading',
                'r_port_of_discharge',
            )
            ->with(
                'place_of_receipt',
                'port_of_loading',
                'port_of_discharge',
            )
            ->first();

        $arr["bl"] = $job;
        $arr["bl_details"] = $job_routing;
        return $arr;
    }

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $arr = [
            "bl" => [],
            "container_info" => [],
            "bl_details" => [],
            "bl_ref_info" => [],
            "bl_stamps" => []
        ];

        $data = Bl::Query();

        if ($type == "first") {
            $data = $data->orderBy('id', 'asc');
        } else if ($type == "last") {
            $data = $data->orderBy('id', 'desc');
        } else if ($type == "forward") {
            $data = $data->where('id', '>', $id);
        } else if ($type == "backward") {
            $data = $data->where('id', '<', $id)->orderBy('id', 'desc');
        }

        $arr["bl"] = $data->with(
            'job',
            'shippers',
            'consignees',
            'notify_party_1',
            'notify_party_2',
            'vessels',
            'voyages',
            'port_of_loading',
            'port_of_final_dest',
            'port_of_terminal',
            'final_destination',
            'commodities',
            'overseas_agents',
            'sline_carriers'
        )->first();

        $bl_id = @$arr["bl"]->id;

        // BL Container Info
        $data = BlContainer::Query();
        $data = $data->where("bl_id", $bl_id);
        $arr["container_info"] = $data->get();

        // BL Details
        $data = BlDetail::Query();
        $data = $data->where("bl_id", $bl_id);
        $arr["bl_details"] = $data->with(
            'place_of_receipt',
            'port_of_loading',
            'port_of_discharge',
            'place_of_delivery',
        )->first();

        // BL Ref Info
        $data = BlStamp::Query();
        $data = $data->where("bl_id", $bl_id);
        $arr["bl_ref_info"] = $data->first();

        // BL Stamp Info
        $data = BlRef::Query();
        $data = $data->where("bl_id", $bl_id);
        $arr["bl_stamps"] = $data->get();

        return $arr;
    }
}
