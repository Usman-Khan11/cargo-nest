<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manifest;
use App\Models\ManifestAllocation;
use App\Models\Vessel;
use App\Models\ManifestAllocationHbl;
use App\Models\ManifestAllocationMaster;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminNotification;
use App\Models\DocsCompanyWise;
use Image;
use Validator;
use Session;
use File;
use Yajra\DataTables\Facades\DataTables;

class ManifestController extends Controller
{
    protected $name;

    public function __construct()
    {
        $this->name = "Manifest";
    }

    public function create(Request $request)
    {
        $user_info = session()->get('user_info');

        if ($request->ajax()) {
            $totalCount = 0;
            $recordsFiltered = 0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start = (int)($request->start) ? $request->start : 0;
            $query = Manifest::Query();
            $totalCount = $query->count();

            $query = $query->orderby('id', 'desc')->skip($start)->take($pageSize)->latest()->get();

            return DataTables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal' => $totalCount])
                ->make(true);
        }

        $data['manifest_no'] = DocsCompanyWise::getDocNumber($user_info['company_id'], $user_info['fiscal_year_id'], $this->name);

        $data['seo_title']      = "Manifest";
        $data['seo_desc']       = "Manifest";
        $data['seo_keywords']   = "Manifest";
        $data['page_title'] = "Manifest";

        return view('admin.manifest.create', $data);
    }

    public function edit($id)
    {
        $data['seo_title']      = "Edit Manifest";
        $data['seo_desc']       = "Edit Manifest";
        $data['seo_keywords']   = "Edit Manifest";
        $data['page_title'] = "Edit Manifest";
        $data['manifest'] = Manifest::where("id", $id)->first();

        return view('admin.manifest.edit', $data);
    }

    public function delete($id)
    {
        Manifest::where("id", $id)->delete();
        ManifestAllocationHbl::where('manifest_id', $id)->delete();
        ManifestAllocationMaster::where('manifest_id', $id)->delete();

        $notify[] = ['success', 'Manifest Deleted Successfully.'];
        return redirect()->route('admin.manifest.create')->withNotify($notify);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tran' => 'required',
            'vessel' => 'required',
            'voyage_no' => 'required',
            'ship_company' => 'required',
        ]);

        $user_info = session()->get('user_info');

        $manifest = new Manifest();
        $manifest->fill($request->all());
        $manifest->tran =  DocsCompanyWise::getDocNumber($user_info['company_id'], $user_info['fiscal_year_id'], $this->name, true);

        if ($manifest->save()) {
            //$this->add_hbl_details($request, $manifest->id);
            //$this->add_mbl_details($request, $manifest->id);
        }

        $notify[] = ['success', 'Manifest Added Successfully.'];
        return redirect()->route('admin.manifest.create')->withNotify($notify);
    }

    public function add_hbl_details($request, $manifest_id)
    {
        $h_job_no = $request->h_job_no;
        if ($h_job_no) {
            ManifestAllocationHbl::where('manifest_id', $manifest_id)->delete();
            foreach ($h_job_no as $key => $value) {
                $manifest_allocation_hbl = new ManifestAllocationHbl();
                $manifest_allocation_hbl->manifest_id = $manifest_id;
                $manifest_allocation_hbl->h_job_no = $request->h_job_no[$key];
                $manifest_allocation_hbl->h_job_date = $request->h_job_date[$key];
                $manifest_allocation_hbl->h_job_nature = $request->h_job_nature[$key];
                $manifest_allocation_hbl->h_hbl_no = $request->h_hbl_no[$key];
                $manifest_allocation_hbl->h_hbl_date = $request->h_hbl_date[$key];
                $manifest_allocation_hbl->h_client_name = $request->h_client_name[$key];
                $manifest_allocation_hbl->h_volume = $request->h_volume[$key];
                $manifest_allocation_hbl->h_packages = $request->h_packages[$key];
                $manifest_allocation_hbl->h_port_of_discharge = $request->h_port_of_discharge[$key];
                $manifest_allocation_hbl->h_port_of_receipt = $request->h_port_of_receipt[$key];
                $manifest_allocation_hbl->h_total_container = $request->h_total_container[$key];
                $manifest_allocation_hbl->h_20ft = $request->h_20ft[$key];
                $manifest_allocation_hbl->h_40ft = $request->h_40ft[$key];
                $manifest_allocation_hbl->save();
            }
        }
    }

    public function add_mbl_details($request, $manifest_id)
    {
        $m_job_no = $request->m_job_no;
        if ($m_job_no) {
            ManifestAllocationMaster::where('manifest_id', $manifest_id)->delete();
            foreach ($m_job_no as $key => $value) {
                $manifest_allocation_master = new ManifestAllocationMaster();
                $manifest_allocation_master->manifest_id = $manifest_id;
                $manifest_allocation_master->m_job_no = $request->m_job_no[$key];
                $manifest_allocation_master->m_job_date = $request->m_job_date[$key];
                $manifest_allocation_master->m_job_nature = $request->m_job_nature[$key];
                $manifest_allocation_master->m_job_type = $request->m_job_type[$key];
                $manifest_allocation_master->m_mbl_no = $request->m_mbl_no[$key];
                $manifest_allocation_master->m_mbl_date = $request->m_mbl_date[$key];
                $manifest_allocation_master->m_destuffing_date = $request->m_destuffing_date[$key];
                $manifest_allocation_master->m_total = $request->m_total[$key];
                $manifest_allocation_master->m_volume = $request->m_volume[$key];
                $manifest_allocation_master->m_total_cont = $request->m_total_cont[$key];
                $manifest_allocation_master->m_20ft = $request->m_20ft[$key];
                $manifest_allocation_master->m_40ft = $request->m_40ft[$key];
                $manifest_allocation_master->save();
            }
        }
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'tran' => 'required',
            'vessel' => 'required',
            'voyage_no' => 'required',
            'ship_company' => 'required',
        ]);

        $manifest = Manifest::where("id", $request->id)->first();
        $manifest->fill($request->all());

        if ($manifest->save()) {
            //$this->add_hbl_details($request, $manifest->id);
            //$this->add_mbl_details($request, $manifest->id);
        }

        $notify[] = ['success', 'Manifest Updated Successfully.'];
        return redirect()->route('admin.manifest.create')->withNotify($notify);
    }

    public function manifest_allocate(Request $request)
    {
        $manifest_id = $request->manifest_id;
        $job_id = $request->job_id;

        $data = ManifestAllocation::where('manifest_id', $manifest_id)->where('job_id', $job_id)->first();
        if ($data) {
            $data->manifest_id = $manifest_id;
            $data->job_id = $job_id;
            $data->save();
        } else {
            $data = new ManifestAllocation();
            $data->manifest_id = $manifest_id;
            $data->job_id = $job_id;
            $data->save();
        }

        return 1;
    }

    public function get_manifest_allocate(Request $request)
    {
        $res = ["hbl" => null, "mbl" => null];
        $manifest_id = $request->manifest_id;
        $type = $request->type;

        $data['manifest'] = ManifestAllocation::where('manifest_id', $manifest_id)
            ->with('manifest', 'job')
            ->get();

        if ($type == "hbl") {
            return view('admin.manifest.partials.hbl_table', $data);
        } else if ($type == "mbl") {
            return view('admin.manifest.partials.mbl_table', $data);
        } else {
            return null;
        }

        $query = ManifestAllocation::join('job', 'manifest_allocations.job_id', '=', 'job.id')
            ->join('customers', 'inquiries.customer_id', '=', 'customers.id')
            ->join('suppliers', 'inquiries.supplier_id', '=', 'suppliers.id')
            ->join('products', 'inquiry_items.item_id', '=', 'products.id')
            ->select(
                'inquiries.inq_no',
                'inquiries.date as inq_date',
                'inquiries.customer_id',
                'inquiries.supplier_id',
                'inquiry_items.*',
                'customers.name as customer_name',
                'customers.person_3 as sales_person',
                'suppliers.name as supplier_name',
                'suppliers.person_3 as sourcing_person',
                'products.name as product_name',
                'inquiry_items.item_desc as product_description',
            );
    }


    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;

        $arr = [
            "manifest" => [],
            "hbl_info" => [],
            "mbl_info" => []
        ];

        $data = Manifest::Query();

        if ($type == "first") {
            $data = $data->orderBy('id', 'asc');
        } else if ($type == "last") {
            $data = $data->orderBy('id', 'desc');
        } else if ($type == "forward") {
            $data = $data->where('id', '>', $id);
        } else if ($type == "backward") {
            $data = $data->where('id', '<', $id)->orderBy('id', 'desc');
        }

        $arr["manifest"] = $data->with(
            'vessels',
            'voyages',
            'terminals',
            'shipping_line',
            'shipping_license',
            'local_port'
        )->first();

        return $arr;
    }
}
