<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Charges;
use App\Models\Currency;
use App\Models\Job;
use App\Models\JobEquipment;
use App\Models\JobCharges;
use App\Models\JobRouting;
use App\Models\JobOtherInfo;
use App\Models\JobReceivable;
use App\Models\JobPayable;
use App\Models\JobSummary;
use App\Models\JobPrincipal;

use App\Models\Quotation;
use App\Models\QuotationDetail;
use App\Models\QuotationRouting;
use App\Models\QuotationEquipment;

use App\Models\Incoterm;
use App\Models\PartyBasicInfo;
use App\Models\PartyLocation;
use App\Models\Commodity;
use App\Models\Location;
use App\Models\Employee;
use App\Models\Vessel;
use App\Models\Voyage;
use App\Models\Equipment;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminNotification;
use App\Models\DocsCompanyWise;
use App\Models\Manifest;
use App\Models\VoyageLocal;
use Image;
use Validator;
use Session;
use File;
use Yajra\DataTables\Facades\DataTables;

class JobController extends Controller
{
    protected $user_info;

    public function __construct() {}

    public function create(Request $request)
    {
        $user_info = session()->get('user_info');

        if ($request->ajax()) {

            if (isset($request->type) && $request->type == 'get_location') {
                $search_term = $request->search;
                $data = Location::where('code', 'like', "%$search_term%")->orWhere('location', 'like', "%$search_term%")->select('id', DB::raw('CONCAT(location) as text'))->get();
                return $data;
            }

            if (isset($request->fetch_charges_currency)) {
                $fetch_charges_currency = Charges::where('id', $request->fetch_charges_currency)->first();
                return $fetch_charges_currency;
            }

            if (isset($request->type) && $request->type == 'get_custom_clearance') {
                $search_term = $request->search;
                $data = PartyBasicInfo::where('Type', 'like', "%CHA-CHB%")->orWhere('party_code', 'like', "%$search_term%")->orWhere('party_name', 'like', "%$search_term%")->select('id', DB::raw('CONCAT(party_name) as text'))->get();
                return $data;
            }

            if (isset($request->type) && $request->type == 'get_terminal_location') {
                $search_term = $request->search;
                $data = PartyLocation::where('Type', 'like', '%Terminel%')->select(["id", "location_name as text"])->get();
                return $data;
            }

            if (isset($request->type) && $request->type == 'get_allocation') {
                $vessel = $request->vessel;
                $voyage = $request->voyage;
                $data['job_id'] = $request->job_id;
                $data['manifests'] = Manifest::where('vessel', $vessel)
                    ->where('voyage_no', $voyage)
                    ->with('vessels', 'voyages', 'terminals', 'local_port')
                    ->get();
                return view('admin.job.partials.allocation', $data);
            }

            $query = Job::Query();
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['job_no'] = DocsCompanyWise::getDocNumber($user_info['company_id'], $user_info['fiscal_year'], 'SE Job');
        // $data['job_no'] = Job::orderby('id', 'desc')->first();
        // if ($data['job_no']) {
        //     $str = $data['job_no']->job_number;
        //     $str = explode('-', $str);
        //     $str = explode('/', $str[2]);
        //     $str = $str[0] + 1;
        //     $data['job_no'] = $str;
        // } else {
        //     $data['job_no'] = 1;
        // }

        $data['seo_title']      = "Se Job";
        $data['seo_desc']       = "Se Job";
        $data['seo_keywords']   = "Se Job";
        $data['page_title'] = "Se Job";


        $data['incoterms'] = Incoterm::select(["id", "name as text"])->get();
        $data['incoterms'] = $data['incoterms']->toArray();

        // AS CLIENT
        $data['client'] = PartyBasicInfo::select(["id", "party_name as text"])->get();
        $data['client'] = $data['client']->toArray();

        $data['shippers'] = PartyBasicInfo::where('Type', 'like', '%Shipper%')->select(["id", "party_name as text"])->get();
        $data['shippers'] = $data['shippers']->toArray();

        $data['consignees'] = PartyBasicInfo::where('Type', 'like', '%Consignee%')->select(["id", "party_name as text"])->get();
        $data['consignees'] = $data['consignees']->toArray();

        $data['commodities'] = Commodity::select(["id", "name as text"])->get();
        $data['commodities'] = $data['commodities']->toArray();

        $data['employees'] = Employee::where('rep', 'like', '%Sales-Rep%')->select(["id", "emp_name as text"])->get();
        $data['employees'] = $data['employees']->toArray();

        $data['shipping_lines'] = PartyBasicInfo::where('Type', 'like', '%Shipping-Line%')->select(["id", "party_name as text"])->get();
        $data['shipping_lines'] = $data['shipping_lines']->toArray();

        $data['vendors'] = PartyBasicInfo::where('Type', 'like', '%Local-Vendor%')->select(["id", "party_name as text"])->get();
        $data['vendors'] = $data['vendors']->toArray();

        $data['overseas'] = PartyBasicInfo::where('Type', 'like', '%Overseas-Agent%')->select(["id", "party_name as text"])->get();
        $data['overseas'] = $data['overseas']->toArray();

        $data['principals'] = PartyBasicInfo::where('Type', 'like', '%Principal%')->select(["id", "party_name as text"])->get();
        $data['principals'] = $data['principals']->toArray();

        $data['vessels'] = Vessel::select(["id", "vessel_name as text"])->get();
        $data['vessels'] = $data['vessels']->toArray();

        $data['voyages'] = Voyage::select(["id", "voy as text"])->take(0)->get();
        $data['voyages'] = $data['voyages']->toArray();

        $data['forwarder'] = PartyBasicInfo::where('Type', 'like', '%Forwarder-Coloader%')->select(["id", "party_name as text"])->get();
        $data['forwarder'] = $data['forwarder']->toArray();

        $data['transport'] = PartyBasicInfo::where('Type', 'like', '%Transporter%')->select(["id", "party_name as text"])->get();
        $data['transport'] = $data['transport']->toArray();

        $data['clearance'] = PartyBasicInfo::where('Type', 'like', '%CHA-CHB%')->select(["id", "party_name as text"])->get();
        $data['clearance'] = $data['clearance']->toArray();

        $data['sizes'] = Equipment::select(["id", "code as text"])->get();
        $data['sizes'] = $data['sizes']->toArray();

        $data['charges'] = Charges::select(["id", "name as text"])->get();
        $data['charges'] = $data['charges']->toArray();

        $data['currencies'] = Currency::select(["id", "code as text"])->orderBy('id', 'desc')->get();
        $data['currencies'] = $data['currencies']->toArray();


        return view('admin.job.create', $data);
    }

    public function edit($id)
    {
        $data['seo_title']      = "Edit Se Job";
        $data['seo_desc']       = "Edit Se Job";
        $data['seo_keywords']   = "Edit Se Job";
        $data['page_title'] = "Edit Se Job";
        $data['job'] = Job::where("id", $id)->first();
        return view('admin.job.edit', $data);
    }

    public function delete($id)
    {
        $developer = Job::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Se Job Deleted Successfully.'];
        return redirect()->route('admin.job.delete')->withNotify($notify);
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_number' => ['required', 'string', 'max:255', 'unique:job'],
            'nature' => 'required',
            'job_date' => 'required',
            'job_status' => 'required',
            'shipt_status' => 'required',
            'port_of_loading' => 'required',
            'port_of_discharge' => 'required',
            'client' => 'required',
        ]);

        $user_info = session()->get('user_info');

        $job = new Job();
        $job->approval_status = "Pending";
        $job->fill($request->all());
        $job->job_number = DocsCompanyWise::getDocNumber($user_info['company_id'], $user_info['fiscal_year'], 'SE Job', true);
        $job->save();

        $e_size_type = $request->e_size_type;
        if ($e_size_type) {
            foreach ($e_size_type as $key => $value) {
                $job_equipment = new JobEquipment();
                $job_equipment->job_id = $job->id;
                $job_equipment->e_size_type = $request->e_size_type[$key];
                $job_equipment->e_rate_group = $request->e_rate_group[$key];
                $job_equipment->e_qty = $request->e_qty[$key];
                $job_equipment->e_code = $request->e_code[$key];
                $job_equipment->e_name = $request->e_name[$key];
                $job_equipment->e_dg_non_dg = $request->e_dg_non_dg[$key];
                $job_equipment->e_gross_wt_cnt = $request->e_gross_wt_cnt[$key];
                $job_equipment->e_teu = $request->e_teu[$key];
                $job_equipment->save();
            }
        }


        $this->charges_store($request, $job->id);
        $this->routing_store($request, $job->id);
        $this->other_info_store($request, $job->id);

        $notify[] = ['success', 'Se Job Added Successfully.'];
        return redirect()->route('admin.job.create')->withNotify($notify);
    }

    public function charges_store($request, $id)
    {
        // $job_charges = new JobCharges();
        // $job_charges->job_id = $id;
        // $job_charges->fill($request->all());
        // $job_charges->save();

        $cr_chrg = $request->cr_chrg;
        if (!empty($cr_chrg)) {
            JobReceivable::where('job_id', $id)->delete();
            foreach ($cr_chrg as $key => $value) {
                $job_receivable = new JobReceivable();
                $job_receivable->job_id = $id;
                $job_receivable->cr_bill_invoice = $request->cr_bill_invoice[$key];
                $job_receivable->cr_chrg = @$request->cr_chrg[$key];
                $job_receivable->cr_particular = $request->cr_particular[$key];
                $job_receivable->cr_description = $request->cr_description[$key];

                $job_receivable->crp_type = @$request->crp_type[$key];
                $job_receivable->crp_basis = $request->crp_basis[$key];
                $job_receivable->crp_pp_cc = $request->crp_pp_cc[$key];
                $job_receivable->crp_collect_by = $request->crp_collect_by[$key];
                $job_receivable->crp_size_type = @$request->crp_size_type[$key];
                $job_receivable->crp_rate_group = $request->crp_rate_group[$key];
                $job_receivable->crp_dg_non_dg = @$request->crp_dg_non_dg[$key];
                $job_receivable->crp_shared = (isset($request->crp_shared[$key])) ? $request->crp_shared[$key] : '';
                $job_receivable->crp_code = $request->crp_code[$key];
                $job_receivable->crp_name_1 = $request->crp_name_1[$key];
                $job_receivable->crp_manual = (isset($request->crp_manual[$key])) ? $request->crp_manual[$key] : '';
                $job_receivable->crp_city = $request->crp_city[$key];
                $job_receivable->crp_rate = $request->crp_rate[$key];
                $job_receivable->crp_currency = @$request->crp_currency[$key];
                $job_receivable->crp_margin = $request->crp_margin[$key];
                $job_receivable->crp_amount = $request->crp_amount[$key];
                $job_receivable->crp_discount = $request->crp_discount[$key];
                $job_receivable->crp_tax_apple = (isset($request->crp_tax_apple[$key])) ? $request->crp_tax_apple[$key] : '';
                $job_receivable->crp_tax_rev = $request->crp_tax_rev[$key];
                $job_receivable->crp_tax_amount_lc = $request->crp_tax_amount_lc[$key];
                $job_receivable->crp_net_amount = $request->crp_net_amount[$key];
                $job_receivable->crp_ex_rate = $request->crp_ex_rate[$key];
                $job_receivable->crp_local_amount = $request->crp_local_amount[$key];
                $job_receivable->crp_code = $request->crp_code[$key];
                $job_receivable->crp_name_1 = $request->crp_name_1[$key];
                $job_receivable->crp_manifest_remarks = $request->crp_manifest_remarks[$key];
                $job_receivable->crp_tariff_code = $request->crp_tariff_code[$key];
                $job_receivable->crp_approved = $request->crp_approved[$key];
                $job_receivable->crp_approved_by = $request->crp_approved_by[$key];
                $job_receivable->crp_approved_date = $request->crp_approved_date[$key];
                $job_receivable->crp_approved_log = $request->crp_approved_log[$key];
                $job_receivable->save();
            }
        }

        $cp_bill_invoice = $request->cp_bill_invoice;
        if ($cp_bill_invoice) {
            JobPayable::where('job_id', $id)->delete();
            foreach ($cp_bill_invoice as $key => $value) {
                $job_payable = new JobPayable();
                $job_payable->job_id = $id;
                $job_payable->cp_bill_invoice = $request->cp_bill_invoice[$key];
                $job_payable->cp_chrg = @$request->cp_chrg[$key];
                $job_payable->cp_particular = $request->cp_particular[$key];
                $job_payable->cp_description = $request->cp_description[$key];
                $job_payable->cpp_type = @$request->cpp_type[$key];
                $job_payable->cpp_basis = $request->cpp_basis[$key];
                $job_payable->cpp_pp_cc = $request->cpp_pp_cc[$key];
                $job_payable->cpp_collect_by = $request->cpp_collect_by[$key];
                $job_payable->cpp_size_type = @$request->cpp_size_type[$key];
                $job_payable->cpp_rate_group = $request->cpp_rate_group[$key];
                $job_payable->cpp_dg_non_dg = @$request->cpp_dg_non_dg[$key];
                $job_payable->cpp_shared = @$request->cpp_shared[$key];
                $job_payable->cpp_code_1 = $request->cpp_code_1[$key];
                $job_payable->cpp_name_1 = $request->cpp_name_1[$key];
                $job_payable->cpp_manual = @$request->cpp_manual[$key];
                $job_payable->cpp_city = $request->cpp_city[$key];
                $job_payable->cpp_rate = $request->cpp_rate[$key];
                $job_payable->cpp_currency = @$request->cpp_currency[$key];
                $job_payable->cpp_margin = $request->cpp_margin[$key];
                $job_payable->cpp_amount = $request->cpp_amount[$key];
                $job_payable->cpp_discount = $request->cpp_discount[$key];
                $job_payable->cpp_tax_apply = @$request->cpp_tax_apply[$key];
                $job_payable->cpp_tax_rev = $request->cpp_tax_rev[$key];
                $job_payable->cpp_tax_amount_lc = $request->cpp_tax_amount_lc[$key];
                $job_payable->cpp_net_amount = $request->cpp_net_amount[$key];
                $job_payable->cpp_ex_rate = $request->cpp_ex_rate[$key];
                $job_payable->cpp_local_amount = $request->cpp_local_amount[$key];
                $job_payable->cpp_rotate = @$request->cpp_rotate[$key];
                $job_payable->cpp_code_2 = $request->cpp_code_2[$key];
                $job_payable->cpp_name_2 = $request->cpp_name_2[$key];
                $job_payable->cpp_manifest_remarks = $request->cpp_manifest_remarks[$key];
                $job_payable->cpp_tariff_code = $request->cpp_tariff_code[$key];
                $job_payable->cpp_approved = $request->cpp_approved[$key];
                $job_payable->cpp_approved_by = $request->cpp_approved_by[$key];
                $job_payable->cpp_approved_date = $request->cpp_approved_date[$key];
                $job_payable->cpp_approved_log = $request->cpp_approved_log[$key];
                $job_payable->save();
            }
        }

        $cs_code = $request->cs_code;
        if ($cs_code) {
            JobSummary::where('job_id', $id)->delete();
            foreach ($cs_code as $key => $value) {
                $job_summary = new JobSummary();
                $job_summary->job_id = $id;
                $job_summary->cs_code = $request->cs_code[$key];
                $job_summary->cs_charges = @$request->cs_charges[$key];
                $job_summary->cs_realize_revenue_1 = $request->cs_realize_revenue_1[$key];
                $job_summary->cs_unrealize_revenue_1 = $request->cs_unrealize_revenue_1[$key];
                $job_summary->cs_total_revenue = $request->cs_total_revenue[$key];
                $job_summary->cs_realize_revenue_2 = $request->cs_realize_revenue_2[$key];
                $job_summary->cs_unrealize_revenue_2 = $request->cs_unrealize_revenue_2[$key];
                $job_summary->cs_total_cost = $request->cs_total_cost[$key];
                $job_summary->cs_realize_net_3 = $request->cs_realize_net_3[$key];
                $job_summary->cs_unrealize_net_3 = $request->cs_unrealize_net_3[$key];
                $job_summary->cs_total_net = $request->cs_total_net[$key];
                $job_summary->cs_detail = $request->cs_detail[$key];
                $job_summary->save();
            }
        }

        $cpc_principal = $request->cpc_principal;
        if ($cpc_principal) {
            JobPrincipal::where('job_id', $id)->delete();
            foreach ($cpc_principal as $key => $value) {
                $job_principal = new JobPrincipal();
                $job_principal->job_id = $id;
                $job_principal->cpc_principal = $request->cpc_principal[$key];
                $job_principal->cpc_chrg = @$request->cpc_chrg[$key];
                $job_principal->cpc_name_1 = $request->cpc_name_1[$key];
                $job_principal->cpc_description = $request->cpc_description[$key];
                $job_principal->cpc_charges_type = @$request->cpc_charges_type[$key];
                $job_principal->cpc_rec_pay_type = $request->cpc_rec_pay_type[$key];
                $job_principal->cpc_code = $request->cpc_code[$key];
                $job_principal->cpc_name_2 = $request->cpc_name_2[$key];
                $job_principal->cpc_size_type = @$request->cpc_size_type[$key];
                $job_principal->cpc_rate_group = $request->cpc_rate_group[$key];
                $job_principal->cpc_dg_non_dg = @$request->cpc_dg_non_dg[$key];
                $job_principal->cpc_manual = @$request->cpc_manual[$key];
                $job_principal->cpc_qty = $request->cpc_qty[$key];
                $job_principal->cpc_rate = $request->cpc_rate[$key];
                $job_principal->cpc_currency = @$request->cpc_currency[$key];
                $job_principal->cpc_amount = $request->cpc_amount[$key];
                $job_principal->cpc_discount = $request->cpc_discount[$key];
                $job_principal->cpc_net_amount = $request->cpc_net_amount[$key];
                $job_principal->cpc_manual_ex_rate = @$request->cpc_manual_ex_rate[$key];
                $job_principal->cpc_ex_rate = $request->cpc_ex_rate[$key];
                $job_principal->cpc_local_amount = $request->cpc_local_amount[$key];
                $job_principal->cpc_tariff_code = $request->cpc_tariff_code[$key];
                $job_principal->cpc_approved = $request->cpc_approved[$key];
                $job_principal->cpc_approved_by = $request->cpc_approved_by[$key];
                $job_principal->cpc_approved_date = $request->cpc_approved_date[$key];
                $job_principal->cpc_approval_log = $request->cpc_approval_log[$key];
                $job_principal->save();
            }
        }
    }

    public function routing_store($request, $id)
    {
        $job_routing = JobRouting::where('job_id', $id)->first();
        if (!$job_routing) {
            $job_routing = new JobRouting();
        }

        $job_routing->job_id = $id;
        $job_routing->fill($request->all());
        $job_routing->save();
    }

    public function other_info_store($request, $id)
    {
        $job_other_info = JobOtherInfo::where('job_id', $id)->first();
        if (!$job_other_info) {
            $job_other_info = new JobOtherInfo();
        }

        $job_other_info->job_id = $id;
        $job_other_info->fill($request->all());
        $job_other_info->save();
    }

    public function update(Request $request)
    {
        $request->validate([
            'job_number' => ['required', 'string', 'max:255'],
            'nature' => 'required',
            'job_date' => 'required',
            'job_status' => 'required',
            'shipt_status' => 'required',
            'port_of_loading' => 'required',
            'port_of_discharge' => 'required',
            'client' => 'required',
        ]);

        $job = Job::where("id", $request->id)->first();
        if ($request->approval_status == "Approved") {
            $job->approved_by = Auth::guard('admin')->user()->id;
            $job->approved_at = date("Y-m-d h:i:s");
        }
        $job->fill($request->all());
        $job->update();

        $e_size_type = $request->e_size_type;
        if ($e_size_type) {
            JobEquipment::where('job_id', $job->id)->delete();
            foreach ($e_size_type as $key => $value) {
                $job_equipment = new JobEquipment();
                $job_equipment->job_id = $job->id;
                $job_equipment->e_size_type = $request->e_size_type[$key];
                $job_equipment->e_rate_group = $request->e_rate_group[$key];
                $job_equipment->e_qty = $request->e_qty[$key];
                $job_equipment->e_code = $request->e_code[$key];
                $job_equipment->e_name = $request->e_name[$key];
                $job_equipment->e_dg_non_dg = $request->e_dg_non_dg[$key];
                $job_equipment->e_gross_wt_cnt = $request->e_gross_wt_cnt[$key];
                $job_equipment->e_teu = $request->e_teu[$key];
                $job_equipment->save();
            }
        }

        $this->charges_store($request, $job->id);
        $this->routing_store($request, $job->id);
        $this->other_info_store($request, $job->id);

        $notify[] = ['success', 'Se Job Updated Successfully.'];
        return redirect()->route('admin.job.create')->withNotify($notify);
    }


    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;

        $arr = [
            "booking_info" => null,
            "equipments" => null,
            "routing" => null,
            "other_info" => null,
            "receivable_charges" => null,
            "payable_charges" => null,
            "summary_charges" => null,
            "principal_charges" => null
        ];

        if ($type == "first") {
            $arr["booking_info"] = Job::orderBy('id', 'asc')->with('created_by', 'last_updated_by', 'approved_by', 'port_of_loading', 'port_of_discharge', 'final_destination', 'custom_clearance')->first();
            $arr["equipments"] = JobEquipment::where('job_id', $arr["booking_info"]->id)->get();
            $arr["routing"] = JobRouting::where('job_id', $arr["booking_info"]->id)->with('port_of_loading', 'port_of_discharge', 'final_destination', 'terminals')->first();
            $arr["other_info"] = JobOtherInfo::where('job_id', $arr["booking_info"]->id)->first();

            // Charges
            $arr["receivable_charges"] = JobReceivable::where('job_id', $arr["booking_info"]->id)->get();
            $arr["payable_charges"] = JobPayable::where('job_id', $arr["booking_info"]->id)->get();
            $arr["summary_charges"] = JobSummary::where('job_id', $arr["booking_info"]->id)->get();
            $arr["principal_charges"] = JobPrincipal::where('job_id', $arr["booking_info"]->id)->get();
        } else if ($type == "last") {
            $arr["booking_info"] = Job::orderBy('id', 'desc')->with('created_by', 'last_updated_by', 'approved_by', 'port_of_loading', 'port_of_discharge', 'final_destination', 'custom_clearance')->first();
            $arr["equipments"] = JobEquipment::where('job_id', $arr["booking_info"]->id)->get();
            $arr["routing"] = JobRouting::where('job_id', $arr["booking_info"]->id)->with('port_of_loading', 'port_of_discharge', 'final_destination', 'terminals')->first();
            $arr["other_info"] = JobOtherInfo::where('job_id', $arr["booking_info"]->id)->first();

            // Charges
            $arr["receivable_charges"] = JobReceivable::where('job_id', $arr["booking_info"]->id)->get();
            $arr["payable_charges"] = JobPayable::where('job_id', $arr["booking_info"]->id)->get();
            $arr["summary_charges"] = JobSummary::where('job_id', $arr["booking_info"]->id)->get();
            $arr["principal_charges"] = JobPrincipal::where('job_id', $arr["booking_info"]->id)->get();
        } else if ($type == "forward") {
            $arr["booking_info"] = Job::where('id', '>', $id)->with('created_by', 'last_updated_by', 'approved_by', 'port_of_loading', 'port_of_discharge', 'final_destination', 'custom_clearance')->first();
            $arr["equipments"] = JobEquipment::where('job_id', $arr["booking_info"]->id)->get();
            $arr["routing"] = JobRouting::where('job_id', $arr["booking_info"]->id)->with('port_of_loading', 'port_of_discharge', 'final_destination', 'terminals')->first();
            $arr["other_info"] = JobOtherInfo::where('job_id', $arr["booking_info"]->id)->first();

            // Charges
            $arr["receivable_charges"] = JobReceivable::where('job_id', $arr["booking_info"]->id)->get();
            $arr["payable_charges"] = JobPayable::where('job_id', $arr["booking_info"]->id)->get();
            $arr["summary_charges"] = JobSummary::where('job_id', $arr["booking_info"]->id)->get();
            $arr["principal_charges"] = JobPrincipal::where('job_id', $arr["booking_info"]->id)->get();
        } else if ($type == "backward") {
            $arr["booking_info"] = Job::where('id', '<', $id)->orderBy('id', 'desc')->with('created_by', 'last_updated_by', 'approved_by', 'port_of_loading', 'port_of_discharge', 'final_destination', 'custom_clearance')->first();
            $arr["equipments"] = JobEquipment::where('job_id', $arr["booking_info"]->id)->get();
            $arr["routing"] = JobRouting::where('job_id', $arr["booking_info"]->id)->with('port_of_loading', 'port_of_discharge', 'final_destination', 'terminals')->first();
            $arr["other_info"] = JobOtherInfo::where('job_id', $arr["booking_info"]->id)->first();

            // Charges
            $arr["receivable_charges"] = JobReceivable::where('job_id', $arr["booking_info"]->id)->get();
            $arr["payable_charges"] = JobPayable::where('job_id', $arr["booking_info"]->id)->get();
            $arr["summary_charges"] = JobSummary::where('job_id', $arr["booking_info"]->id)->get();
            $arr["principal_charges"] = JobPrincipal::where('job_id', $arr["booking_info"]->id)->get();
        }

        return $arr;
    }


    public function get_quot(Request $request)
    {
        $arr = ["quotation" => null, "quotation_detail" => null, "routing" => null, "equipment" => null];

        if (isset($request->quot_id) && $request->ajax()) {
            $arr["quotation"] = Quotation::find($request->quot_id);
            $arr["quotation_detail"] = QuotationDetail::where('quotation_id', $request->quot_id)->get();
            $arr["routing"] = QuotationRouting::where('quotation_id', $request->quot_id)->with('terminals', 'custom_clearance', 'place_of_receipt', 'port_of_loading', 'port_of_discharge', 'final_destination')->first();
            $arr["equipment"] = QuotationEquipment::where('quotation_id', $request->quot_id)->get();
        }

        return $arr;
    }

    public function get_receivable_charges(Request $request)
    {
        $type = $request->type;
        $data["get_data"] = null;

        if ($type == "blank") {
        } else if ($type == "blank") {
        }
        $data["charges"] = Charges::get();
        $data["currencies"] = Currency::orderBy('id', 'desc')->get();
        return view('admin.job.get_receivable_charges', $data);
    }
}
