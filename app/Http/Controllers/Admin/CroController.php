<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cro;
use App\Models\Vessel;
use App\Models\Voyage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminNotification;
use App\Models\DocsCompanyWise;
use App\Models\PartyBasicInfo;
use Image;
use Validator;
use Session;
// use DataTables;
use File;
use Yajra\DataTables\Facades\DataTables;

class CroController extends Controller
{
    protected $name;

    public function __construct()
    {
        $this->name = "CRO";
    }

    public function create(Request $request)
    {
        $user_info = session()->get('user_info');

        if ($request->ajax()) {
            $query = Cro::Query();
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['cro_no'] = DocsCompanyWise::getDocNumber($user_info['company_id'], $user_info['fiscal_year_id'], $this->name);

        $data['seo_title']      = "CRO";
        $data['seo_desc']       = "CRO";
        $data['seo_keywords']   = "CRO";
        $data['page_title'] = "CRO";
        return view('admin.cro.create', $data);
    }

    public function edit($id)
    {
        $data['seo_title']      = "Edit CRO";
        $data['seo_desc']       = "Edit CRO";
        $data['seo_keywords']   = "Edit CRO";
        $data['page_title'] = "Edit CRO";
        $data['cro'] = Cro::where("id", $id)->first();
        return view('admin.cro.edit', $data);
    }

    public function delete($id)
    {
        $cro = Cro::where("id", $id);
        $cro->delete();
        $notify[] = ['success', 'CRO Deleted Successfully.'];
        return redirect()->route('admin.cro.create')->withNotify($notify);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cro_no' => 'required',
            'cro_type' => 'required',
            'job_number' => 'required',
            'client' => 'required',
            'issue_date' => 'required',
        ]);

        $user_info = session()->get('user_info');

        $cro = new Cro();
        $cro->cro_no = DocsCompanyWise::getDocNumber($user_info['company_id'], $user_info['fiscal_year_id'], $this->name, true);
        $cro->cro_type = $request->cro_type;
        $cro->job_number = $request->job_number;
        $cro->client = $request->client;
        $cro->issue_date = $request->issue_date;
        $cro->cro_valid_for = $request->cro_valid_for;
        $cro->ref_number = $request->ref_number;
        $cro->equip_qty = $request->equip_qty;
        $cro->size_type = $request->size_type;

        $cro->overseas_agent = $request->overseas_agent;
        $cro->clearing_agent = $request->clearing_agent;
        $cro->shipper = $request->shipper;
        $cro->pickup_location = $request->pickup_location;
        $cro->port_of_loading = $request->port_of_loading;
        $cro->port_of_discharge = $request->port_of_discharge;
        $cro->final_destination = $request->final_destination;
        $cro->commodity = $request->commodity;
        $cro->terminal = $request->terminal;
        $cro->empty_depot = $request->empty_depot;
        $cro->transporter = $request->transporter;

        $cro->book_no = $request->book_no;
        $cro->gate_pass = $request->gate_pass;
        $cro->date = $request->date;
        $cro->letter_no = $request->letter_no;
        $cro->licence_no = $request->licence_no;
        $cro->job_no = $request->job_no;
        $cro->expiry_date = $request->expiry_date;
        $cro->shipping_agent = $request->shipping_agent;

        $cro->cargo_type = $request->cargo_type;
        $cro->vessel = $request->vessel;
        $cro->voyage = $request->voyage;
        $cro->sailing_date = $request->sailing_date;
        $cro->manual = $request->manual ?? '';
        // $cro->upload = $request->upload;
        $cro->print_logo = $request->print_logo ?? '';
        $cro->continue_mode = $request->continue_mode ?? '';
        $cro->haulage = $request->haulage;

        $r_container_no = $request->r_container_no;
        $arr = [];
        if (is_array($r_container_no)) {
            foreach ($r_container_no as $key => $value) {
                $arr[$request->r_container_no[$key]] = [
                    "sno" => $request->r_sno[$key],
                    "container_no" => $request->r_container_no[$key],
                    "container_size" => $request->r_container_size[$key]
                ];
            }
        }

        $cro->container_details = $arr;
        $cro->save();

        $notify[] = ['success', 'CRO Added Successfully.'];
        return redirect()->route('admin.cro.create')->withNotify($notify);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'cro_no' => 'required',
            'cro_type' => 'required',
            'job_number' => 'required',
            'client' => 'required',
            'issue_date' => 'required',
        ]);

        $cro = Cro::where("id", $request->id)->first();
        $cro->cro_no = $request->cro_no;
        $cro->cro_type = $request->cro_type;
        $cro->job_number = $request->job_number;
        $cro->client = $request->client;
        $cro->issue_date = $request->issue_date;
        $cro->cro_valid_for = $request->cro_valid_for;
        $cro->ref_number = $request->ref_number;
        $cro->equip_qty = $request->equip_qty;
        $cro->size_type = $request->size_type;

        $cro->overseas_agent = $request->overseas_agent;
        $cro->clearing_agent = $request->clearing_agent;
        $cro->shipper = $request->shipper;
        $cro->pickup_location = $request->pickup_location;
        $cro->port_of_loading = $request->port_of_loading;
        $cro->port_of_discharge = $request->port_of_discharge;
        $cro->final_destination = $request->final_destination;
        $cro->commodity = $request->commodity;
        $cro->terminal = $request->terminal;
        $cro->empty_depot = $request->empty_depot;
        $cro->transporter = $request->transporter;

        $cro->book_no = $request->book_no;
        $cro->gate_pass = $request->gate_pass;
        $cro->date = $request->date;
        $cro->letter_no = $request->letter_no;
        $cro->licence_no = $request->licence_no;
        $cro->job_no = $request->job_no;
        $cro->expiry_date = $request->expiry_date;
        $cro->shipping_agent = $request->shipping_agent;

        $cro->cargo_type = $request->cargo_type;
        $cro->vessel = $request->vessel;
        $cro->voyage = $request->voyage;
        $cro->sailing_date = $request->sailing_date;
        $cro->manual = $request->manual ?? '';
        // $cro->upload = $request->upload;
        $cro->print_logo = $request->print_logo ?? '';
        $cro->continue_mode = $request->continue_mode ?? '';
        $cro->haulage = $request->haulage;

        $r_container_no = $request->r_container_no;
        $arr = [];
        if (is_array($r_container_no)) {
            foreach ($r_container_no as $key => $value) {
                $arr[$request->r_container_no[$key]] = [
                    "sno" => $request->r_sno[$key],
                    "container_no" => $request->r_container_no[$key],
                    "container_size" => $request->r_container_size[$key]
                ];
            }
        }

        $cro->container_details = $arr;
        $cro->save();

        $notify[] = ['success', 'CRO Updated Successfully.'];
        return redirect()->route('admin.cro.create')->withNotify($notify);
    }

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = Cro::Query();

        if ($type == "first") {
            $data = $data->orderBy('id', 'asc');
        } else if ($type == "last") {
            $data = $data->orderBy('id', 'desc');
        } else if ($type == "forward") {
            $data = $data->where('id', '>', $id);
        } else if ($type == "backward") {
            $data = $data->where('id', '<', $id)->orderBy('id', 'desc');
        }

        $data = $data->with(
            'clients',
            'overseas_agents',
            'clearing_agent',
            'shippers',
            'pickup_location',
            'port_of_loading',
            'port_of_discharge',
            'final_destination',
            'commodities',
            'terminals',
            'empty_depot',
            'transporters',
            'vessels',
            'voyages'
        )->first();

        return $data;
    }
}
