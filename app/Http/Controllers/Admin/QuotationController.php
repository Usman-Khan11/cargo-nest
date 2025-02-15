<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\Customer;
use App\Models\Commodity;
use App\Models\Vessel;
use App\Models\Voyage;
use App\Models\Currency;
use App\Models\Equipment;
use App\Models\Incoterm;
use App\Models\Packages;
use App\Models\Employee;
use App\Models\PartyBasicInfo;
use App\Models\PartyLocation;
use App\Models\Location;
use App\Models\Job;
use App\Models\Charges;

use App\Models\QuotationDetail;
use App\Models\QuotationEquipment;
use App\Models\QuotationRouting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminNotification;
use App\Models\DocsCompanyWise;
use Image;
use Validator;
use Session;
// use DataTables;
use File;
use Yajra\DataTables\Facades\DataTables;

class QuotationController extends Controller
{
    protected $permissions;
    protected $name;
    protected $nav_id;

    public function __construct()
    {
        $this->name = "Quotation";
        $this->nav_id = 1;
    }

    // protected function checkPermissions($action)
    // {
    //     $permission = Get_Permission(1, Auth::guard('admin')->user()->role_id);
    //     $this->permissions = $permission;

    //     if (!in_array($action, $permission)) {
    //         abort(403, 'Unauthorized action.');
    //     }
    // }

    public function create(Request $request)
    {
        $user_info = session()->get('user_info');
        checkPermissions('view', $this->nav_id, $user_info['role_id'], $user_info['user_id']);

        if ($request->ajax()) {

            if (isset($request->fetch_vessel_voyages)) {
                $voyages = Voyage::where('vessel', $request->fetch_vessel_voyages)->select(["id", "voy as text"])->latest()->get();
                return $voyages->toArray();
            }

            if (isset($request->fetch_charges_code)) {
                $fetch_charges_code = Charges::where('code', $request->fetch_charges_code)->first();
                return $fetch_charges_code;
            }

            if (isset($request->fetch_charges_currency)) {
                $fetch_charges_currency = Charges::where('id', $request->fetch_charges_currency)->first();
                return $fetch_charges_currency;
            }

            if (isset($request->fetch_equip_size_type)) {
                $fetch_equip_size_type = Equipment::where('id', $request->fetch_equip_size_type)->first();
                return $fetch_equip_size_type;
            }

            if (isset($request->type) && $request->type == 'get_location') {
                $search_term = $request->search;
                $data = Location::where('code', 'like', "%$search_term%")->orWhere('location', 'like', "%$search_term%")->select('id', DB::raw('CONCAT(location) as text'))->get();
                return $data;
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

            if (isset($request->type) && $request->type == 'get_client') {
                $search_term = $request->search;
                $data = PartyBasicInfo::where('party_name', 'like', "%$search_term%")->whereIn('party_type', ['customer', 'customer-vendor'])->select(["id", "party_name as text"])->get();
                return $data;
            }

            if (isset($request->type) && $request->type == 'get_sale_rep') {
                $search_term = $request->search;
                $data = Employee::whereJsonContains('rep', 'Sales-Rep')
                    ->orWhere(function ($query) use ($search_term) {
                        $query->where('emp_name', 'like', "%$search_term%")
                            ->orWhere('emp_code', 'like', "%$search_term%");
                    })
                    ->select(['id', 'emp_name as text'])
                    ->get();
                return $data;
            }

            if (isset($request->type) && $request->type == 'get_units') {
                $search_term = $request->search;
                $data = Packages::Where(function ($query) use ($search_term) {
                    $query->where('pack_name', 'like', "%$search_term%")
                        ->orWhere('pack_code', 'like', "%$search_term%");
                })
                    ->select(["id", "pack_code as text"])
                    ->get();
                return $data;
            }

            if (isset($request->type) && $request->type == 'get_commodity') {
                $search_term = $request->search;
                $data = Commodity::Where(function ($query) use ($search_term) {
                    $query->where('name', 'like', "%$search_term%")
                        ->orWhere('code', 'like', "%$search_term%");
                })
                    ->select(["id", "name as text"])->get();
                return $data;
            }

            if (isset($request->type) && $request->type == 'get_inco_term') {
                $search_term = $request->search;
                $data = Incoterm::Where(function ($query) use ($search_term) {
                    $query->where('name', 'like', "%$search_term%")
                        ->orWhere('code', 'like', "%$search_term%");
                })
                    ->select(["id", "name as text"])->get();
                return $data;
            }

            if (isset($request->type) && $request->type == 'get_vessel') {
                $search_term = $request->search;
                $data = Vessel::Where(function ($query) use ($search_term) {
                    $query->where('vessel_name', 'like', "%$search_term%")
                        ->orWhere('vessel_code', 'like', "%$search_term%");
                })
                    ->select(["id", "vessel_name as text"])->get();
                return $data;
            }

            if (isset($request->type) && $request->type == 'get_voyage') {
                $search_term = $request->search;
                $data = Voyage::Where(function ($query) use ($search_term) {
                    $query->where('voy', 'like', "%$search_term%");
                })
                    ->select(["id", "voy as text"])->get();
                return $data;
            }

            if (isset($request->type) && $request->type == 'get_currency') {
                $search_term = $request->search;
                $data = Currency::Where(function ($query) use ($search_term) {
                    $query->where('name', 'like', "%$search_term%")
                        ->orWhere('code', 'like', "%$search_term%");
                })
                    ->select(["id", "code as text"])->orderBy('id', 'desc')->get();
                return $data;
            }

            if (isset($request->type) && $request->type == 'get_vendor') {
                $search_term = $request->search;
                $data = PartyBasicInfo::where('party_name', 'like', '%' . $search_term . '%')
                    ->where('Type', 'Like', "%Local-Vendor%")
                    ->select(['id', 'party_name as text'])
                    ->get();
                return $data;
            }

            if (isset($request->type) && $request->type == 'get_overseas') {
                $search_term = $request->search;
                $data = PartyBasicInfo::where('party_name', 'like', '%' . $search_term . '%')
                    ->where('Type', 'Like', '%Overseas-Agent%')
                    ->select(["id", "party_name as text"])
                    ->get();
                return $data;
            }

            if (isset($request->type) && $request->type == 'get_sline_carrier') {
                $search_term = $request->search;
                $data = PartyBasicInfo::where('party_name', 'like', '%' . $search_term . '%')
                    ->where('Type', 'Like', '%Shipping-Line%')
                    ->select(["id", "party_name as text"])
                    ->get();
                return $data;
            }

            if (isset($request->type) && $request->type == 'get_principal') {
                $search_term = $request->search;
                $data = PartyBasicInfo::where('party_name', 'like', '%' . $search_term . '%')
                    ->where('Type', 'Like', '%Principal%')
                    ->select(["id", "party_name as text"])
                    ->get();
                return $data;
            }

            if (isset($request->type) && $request->type == 'get_shipper') {
                $search_term = $request->search;
                $data = PartyBasicInfo::where('party_name', 'like', '%' . $search_term . '%')
                    ->where('Type', 'Like', '%Shipper%')
                    ->select(["id", "party_name as text"])
                    ->get();
                return $data;
            }

            if (isset($request->type) && $request->type == 'get_consignee') {
                $search_term = $request->search;
                $data = PartyBasicInfo::where('party_name', 'like', '%' . $search_term . '%')
                    ->where('Type', 'Like', '%Consignee%')
                    ->select(["id", "party_name as text"])
                    ->get();
                return $data;
            }

            $query = Quotation::Query();
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['quotation_no'] = DocsCompanyWise::getDocNumber($user_info['company_id'], $user_info['fiscal_year_id'], $this->name);
        // $data['quotation_no'] = Quotation::orderby('id', 'desc')->first();
        // if ($data['quotation_no']) {
        //     $str = $data['quotation_no']->quotation_no;
        //     $str = explode('-', $str);
        //     $str = explode('/', $str[2]);
        //     $str = $str[0] + 1;
        //     $data['quotation_no'] = $str;
        // } else {
        //     $data['quotation_no'] = 1;
        // }

        $data['seo_title']      = "Quotation";
        $data['seo_desc']       = "Quotation";
        $data['seo_keywords']   = "Quotation";
        $data['page_title'] = "Quotation";
        $data['customers'] = Customer::get();

        $data['currencies'] = Currency::select(["id", "code as text"])->orderBy('id', 'desc')->get();
        $data['currencies'] = $data['currencies']->toArray();

        $data['sizes'] = Equipment::select(["id", "code as text"])->get();
        $data['sizes'] = $data['sizes']->toArray();

        $data['parties'] = PartyBasicInfo::whereIn('party_type', ['customer', 'customer-vendor'])->select(["id", "party_name as text"])->get();
        $data['parties'] = $data['parties']->toArray();

        $data['charges'] = Charges::select(["id", "name as text"])->get();
        $data['charges'] = $data['charges']->toArray();

        $data['permissions'] = $this->permissions;
        return view('admin.quotation.create', $data);
    }

    public function edit($id)
    {
        $data['seo_title']      = "Edit Quotation";
        $data['seo_desc']       = "Edit Quotation";
        $data['seo_keywords']   = "Edit Quotation";
        $data['page_title'] = "Edit Quotation";
        $data['customers'] = Customer::get();
        $data['quotation'] = Quotation::where("id", $id)->first();
        return view('admin.quotation.edit', $data);
    }

    public function delete($id)
    {
        $user_info = session()->get('user_info');
        checkPermissions('delete', $this->nav_id, $user_info['role_id'], $user_info['user_id']);

        Quotation::where("id", $id)->delete();
        QuotationRouting::where("quotation_id", $id)->delete();
        QuotationDetail::where("quotation_id", $id)->delete();
        QuotationEquipment::where("quotation_id", $id)->delete();

        $notify[] = ['success', 'Quotation Deleted Successfully.'];
        return redirect()->route('admin.quotation.create')->withNotify($notify);
    }

    public function store(Request $request)
    {
        $user_info = session()->get('user_info');
        checkPermissions('create', $this->nav_id, $user_info['role_id'], $user_info['user_id']);

        $validated = $request->validate([
            'operation_type' => 'required',
            'cost_center' => 'required',
            'client' => 'required',
            'port_of_loading' => 'required',
            'port_of_discharge' => 'required',
        ]);

        $quotation = new Quotation();
        $quotation->approval_status = "Pending";
        $quotation->created_by = Auth::guard('admin')->user()->id;
        $quotation->fill($request->all());
        $quotation->quotation_no = DocsCompanyWise::getDocNumber($user_info['company_id'], $user_info['fiscal_year_id'], $this->name, true);
        $quotation->save();

        $quotation_routings = new QuotationRouting();
        $quotation_routings->quotation_id = $quotation->id;
        $quotation_routings->po_num = $request->po_num;
        $quotation_routings->ready_date = $request->ready_date;
        $quotation_routings->ship_date = $request->ship_date;
        $quotation_routings->arrive_date = $request->arrive_date;
        $quotation_routings->s_c = $request->s_c;
        $quotation_routings->service_type = $request->service_type;
        $quotation_routings->transit_time = $request->transit_time;
        $quotation_routings->free_days = $request->free_days;
        $quotation_routings->vendor = $request->vendor;
        $quotation_routings->overseas = $request->overseas;
        $quotation_routings->sline_carrier = $request->sline_carrier;
        $quotation_routings->principal = $request->principal;
        $quotation_routings->other_instruct = $request->other_instruct;
        $quotation_routings->terminals = $request->terminals;
        $quotation_routings->shipper = $request->shipper;
        $quotation_routings->consignee = $request->consignee;
        $quotation_routings->pickup_location = $request->pickup_location;
        $quotation_routings->auto_address = $request->auto_address;
        $quotation_routings->custom_clearance = $request->custom_clearance;
        $quotation_routings->place_of_receipt = $request->place_of_receipt;
        $quotation_routings->port_of_loading = $request->port_of_loading;
        $quotation_routings->port_of_discharge = $request->port_of_discharge;
        $quotation_routings->final_destination = $request->final_destination;
        $quotation_routings->drop_off_location = $request->drop_off_location;
        $quotation_routings->auto_address2 = $request->auto_address2;
        $quotation_routings->transportation = $request->transportation;
        $quotation_routings->save();

        $units = $request->units;
        foreach ($units as $key => $value) {
            $quotation_details = new QuotationDetail();
            $quotation_details->quotation_id = $quotation->id;
            $quotation_details->charges_code = $request->charges_code[$key];
            $quotation_details->charges = $request->charges[$key];
            $quotation_details->charges_desc = $request->charges_desc[$key];
            $quotation_details->charges_category = $request->charges_category[$key];
            $quotation_details->units = $request->units[$key];
            $quotation_details->size_type = $request->size_type[$key];
            $quotation_details->good_unit = $request->good_unit[$key];
            $quotation_details->rate_group = $request->rate_group[$key];
            $quotation_details->mode = $request->modee[$key];

            $quotation_details->manual = (!empty($request->manual[$key])) ? $request->manual[$key] : '';

            $quotation_details->dg_type = $request->dg_type[$key];
            $quotation_details->qty = $request->qty[$key];
            $quotation_details->rate = $request->rate[$key];
            $quotation_details->currency = $request->detail_currency[$key];
            $quotation_details->ex_rate = $request->detail_ex_rate[$key];
            $quotation_details->amount = $request->amount[$key];
            $quotation_details->local_amount = $request->local_amount[$key];
            $quotation_details->tax = $request->tax[$key];
            $quotation_details->inc_tax_amount = $request->inc_tax_amount[$key];
            $quotation_details->buying_rate = $request->buying_rate[$key];
            $quotation_details->remarks = $request->remarks[$key];
            $quotation_details->payable_to = $request->payable_to[$key];
            $quotation_details->buying_remarks = $request->buying_remarks[$key];
            $quotation_details->ord = $request->ord[$key];
            $quotation_details->tariff_code = $request->tariff_code[$key];
            $quotation_details->save();
        }

        $equip_size_type = $request->equip_size_type;
        if ($equip_size_type) {
            foreach ($equip_size_type as $key => $value) {
                $quotation_equipments = new QuotationEquipment();
                $quotation_equipments->quotation_id = $quotation->id;
                $quotation_equipments->size_type = $request->equip_size_type[$key];
                $quotation_equipments->rate_group = $request->equip_rate_group[$key];
                $quotation_equipments->qty = $request->equip_qty[$key];
                $quotation_equipments->dg_type = $request->equip_dg_type[$key];
                $quotation_equipments->gross = $request->equip_gross[$key];
                $quotation_equipments->tue = $request->equip_tue[$key];
                $quotation_equipments->save();
            }
        }

        $notify[] = ['success', 'Quotation Added Successfully.'];
        return redirect()->route('admin.quotation.create')->withNotify($notify);
    }

    public function update(Request $request)
    {
        $user_info = session()->get('user_info');
        checkPermissions('edit', $this->nav_id, $user_info['role_id'], $user_info['user_id']);

        $validated = $request->validate([
            'operation_type' => 'required',
            'cost_center' => 'required',
            'client' => 'required',
            'port_of_loading' => 'required',
            'port_of_discharge' => 'required',
        ]);

        $quotation = Quotation::where("id", $request->id)->first();
        if ($request->approval_status == "Approved") {
            $quotation->approved_by = Auth::guard('admin')->user()->id;
            $quotation->approved_at = date("Y-m-d h:i:s");
        }
        $quotation->last_updated_by = Auth::guard('admin')->user()->id;
        $quotation->fill($request->all());
        $quotation->update();

        $quotation_routings = QuotationRouting::where('quotation_id', $quotation->id)->first();
        $quotation_routings->quotation_id = $quotation->id;
        $quotation_routings->po_num = $request->po_num;
        $quotation_routings->ready_date = $request->ready_date;
        $quotation_routings->ship_date = $request->ship_date;
        $quotation_routings->arrive_date = $request->arrive_date;
        $quotation_routings->s_c = $request->s_c;
        $quotation_routings->service_type = $request->service_type;
        $quotation_routings->transit_time = $request->transit_time;
        $quotation_routings->free_days = $request->free_days;
        $quotation_routings->vendor = $request->vendor;
        $quotation_routings->overseas = $request->overseas;
        $quotation_routings->sline_carrier = $request->sline_carrier;
        $quotation_routings->principal = $request->principal;
        $quotation_routings->other_instruct = $request->other_instruct;
        $quotation_routings->terminals = $request->terminals;
        $quotation_routings->shipper = $request->shipper;
        $quotation_routings->consignee = $request->consignee;
        $quotation_routings->pickup_location = $request->pickup_location;
        $quotation_routings->auto_address = $request->auto_address;
        $quotation_routings->custom_clearance = $request->custom_clearance;
        $quotation_routings->place_of_receipt = $request->place_of_receipt;
        $quotation_routings->port_of_loading = $request->port_of_loading;
        $quotation_routings->port_of_discharge = $request->port_of_discharge;
        $quotation_routings->final_destination = $request->final_destination;
        $quotation_routings->drop_off_location = $request->drop_off_location;
        $quotation_routings->auto_address2 = $request->auto_address2;
        $quotation_routings->transportation = $request->transportation;
        $quotation_routings->save();

        $units = $request->units;
        if ($units) {
            QuotationDetail::where('quotation_id', $quotation->id)->delete();
            foreach ($units as $key => $value) {
                $quotation_details = new QuotationDetail();
                $quotation_details->quotation_id = $quotation->id;
                $quotation_details->charges_code = $request->charges_code[$key];
                $quotation_details->charges = $request->charges[$key];
                $quotation_details->charges_desc = $request->charges_desc[$key];
                $quotation_details->charges_category = $request->charges_category[$key];
                $quotation_details->units = $request->units[$key];
                $quotation_details->size_type = $request->size_type[$key];
                $quotation_details->good_unit = $request->good_unit[$key];
                $quotation_details->rate_group = $request->rate_group[$key];
                $quotation_details->mode = $request->modee[$key];

                $quotation_details->manual = (!empty($request->manual[$key])) ? $request->manual[$key] : '';

                $quotation_details->dg_type = $request->dg_type[$key];
                $quotation_details->qty = $request->qty[$key];
                $quotation_details->rate = $request->rate[$key];
                $quotation_details->currency = $request->detail_currency[$key];
                $quotation_details->ex_rate = $request->detail_ex_rate[$key];
                $quotation_details->amount = $request->amount[$key];
                $quotation_details->local_amount = $request->local_amount[$key];
                $quotation_details->tax = $request->tax[$key];
                $quotation_details->inc_tax_amount = $request->inc_tax_amount[$key];
                $quotation_details->buying_rate = $request->buying_rate[$key];
                $quotation_details->remarks = $request->remarks[$key];
                $quotation_details->payable_to = $request->payable_to[$key];
                $quotation_details->buying_remarks = $request->buying_remarks[$key];
                $quotation_details->ord = $request->ord[$key];
                $quotation_details->tariff_code = $request->tariff_code[$key];
                $quotation_details->save();
            }
        }

        $equip_size_type = $request->equip_size_type;
        if ($equip_size_type) {
            QuotationEquipment::where('quotation_id', $quotation->id)->delete();
            foreach ($equip_size_type as $key => $value) {
                $quotation_equipments = new QuotationEquipment();
                $quotation_equipments->quotation_id = $quotation->id;
                $quotation_equipments->size_type = $request->equip_size_type[$key];
                $quotation_equipments->rate_group = $request->equip_rate_group[$key];
                $quotation_equipments->qty = $request->equip_qty[$key];
                $quotation_equipments->dg_type = $request->equip_dg_type[$key];
                $quotation_equipments->gross = $request->equip_gross[$key];
                $quotation_equipments->tue = $request->equip_tue[$key];
                $quotation_equipments->save();
            }
        }

        $notify[] = ['success', 'Quotation Updated Successfully.'];
        return redirect()->route('admin.quotation.create')->withNotify($notify);
    }

    public function get_data(Request $request)
    {
        $user_info = session()->get('user_info');
        checkPermissions('view', $this->nav_id, $user_info['role_id'], $user_info['user_id']);

        $id = $request->id;
        $type = $request->type;
        $data = null;

        $arr = [
            "quotation" => null,
            "quotation_routing" => null,
            "quotation_detail" => null,
            "quotation_equipment" => null,
            "jobs" => null
        ];

        if ($type == "first") {
            $arr["quotation"] = Quotation::with('clients', 'sales_rep', 'units', 'commodities', 'incoterms', 'vessels', 'voyages', 'currencies', 'created_by', 'last_updated_by', 'approved_by')
                ->orderBy('id', 'asc')
                ->first();

            $arr["quotation_routing"] = QuotationRouting::where('quotation_id', $arr["quotation"]->id)
                ->with('vendors', 'overseas_agent', 'sline_carriers', 'principals', 'terminals', 'shippers', 'consignees', 'custom_clearance', 'place_of_receipt', 'port_of_loading', 'port_of_discharge', 'final_destination')
                ->first();

            $arr["quotation_detail"] = QuotationDetail::where('quotation_id', $arr["quotation"]->id)->get();
            $arr["quotation_equipment"] = QuotationEquipment::where('quotation_id', $arr["quotation"]->id)->first();
            $arr["jobs"] = Job::where('quotation', $arr["quotation"]->quotation_no)->get();
        } elseif ($type == "last") {
            $arr["quotation"] = Quotation::with('clients', 'sales_rep', 'units', 'commodities', 'incoterms', 'vessels', 'voyages', 'currencies', 'created_by', 'last_updated_by', 'approved_by')
                ->orderBy('id', 'desc')
                ->first();

            $arr["quotation_routing"] = QuotationRouting::where('quotation_id', $arr["quotation"]->id)
                ->with('vendors', 'overseas_agent', 'sline_carriers', 'principals', 'terminals', 'shippers', 'consignees', 'custom_clearance', 'place_of_receipt', 'port_of_loading', 'port_of_discharge', 'final_destination')
                ->first();

            $arr["quotation_detail"] = QuotationDetail::where('quotation_id', $arr["quotation"]->id)->get();
            $arr["quotation_equipment"] = QuotationEquipment::where('quotation_id', $arr["quotation"]->id)->first();
            $arr["jobs"] = Job::where('quotation', $arr["quotation"]->quotation_no)->get();
        } elseif ($type == "forward") {
            $arr["quotation"] = Quotation::where('id', '>', $id)
                ->with('clients', 'sales_rep', 'units', 'commodities', 'incoterms', 'vessels', 'voyages', 'currencies', 'created_by', 'last_updated_by', 'approved_by')
                ->first();

            $arr["quotation_routing"] = QuotationRouting::where('quotation_id', $arr["quotation"]->id)
                ->with('vendors', 'overseas_agent', 'sline_carriers', 'principals', 'terminals', 'shippers', 'consignees', 'custom_clearance', 'place_of_receipt', 'port_of_loading', 'port_of_discharge', 'final_destination')
                ->first();

            $arr["quotation_detail"] = QuotationDetail::where('quotation_id', $arr["quotation"]->id)->get();
            $arr["quotation_equipment"] = QuotationEquipment::where('quotation_id', $arr["quotation"]->id)->first();
            $arr["jobs"] = Job::where('quotation', $arr["quotation"]->quotation_no)->get();
        } elseif ($type == "backward") {
            $arr["quotation"] = Quotation::where('id', '<', $id)
                ->with('clients', 'sales_rep', 'units', 'commodities', 'incoterms', 'vessels', 'voyages', 'currencies', 'created_by', 'last_updated_by', 'approved_by')
                ->orderBy('id', 'desc')
                ->first();

            $arr["quotation_routing"] = QuotationRouting::where('quotation_id', $arr["quotation"]->id)
                ->with('vendors', 'overseas_agent', 'sline_carriers', 'principals', 'terminals', 'shippers', 'consignees', 'custom_clearance', 'place_of_receipt', 'port_of_loading', 'port_of_discharge', 'final_destination')
                ->first();

            $arr["quotation_detail"] = QuotationDetail::where('quotation_id', $arr["quotation"]->id)->get();
            $arr["quotation_equipment"] = QuotationEquipment::where('quotation_id', $arr["quotation"]->id)->first();
            $arr["jobs"] = Job::where('quotation', $arr["quotation"]->quotation_no)->get();
        }

        return $arr;
    }
}
