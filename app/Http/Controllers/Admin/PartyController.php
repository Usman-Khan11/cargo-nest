<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PartyBasicInfo;
use App\Models\PartyOtherInfo;
use App\Models\PartyAccountDetail;
use App\Models\PartyAchBankDetail;
use App\Models\PartyLocalizeKyc;
use App\Models\PartyNotification;
use App\Models\PartyInsurance;
use App\Models\partyCenter;
use App\Models\Location;
use App\Models\ChartAccount;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminNotification;
use Image;
use Validator;
use Session;
// use DataTables;
use File;
use Yajra\DataTables\Facades\DataTables;

class PartyController extends Controller
{
    public function create(Request $request)
    {
        if ($request->ajax()) {

            if (isset($request->type) && $request->type == 'get_location') {
                $search_term = $request->search;
                $data = Location::where('location_check', 'like', '%city%')->orWhere('code', 'like', "%$search_term%")->orWhere('location', 'like', "%$search_term%")->select('id', DB::raw('location as text'))->get();
                return $data;
            }

            if (isset($request->type) && $request->type == 'get_parent_account') {
                $search_term = $request->search;
                $data = ChartAccount::where('acc_code', 'like', "%$search_term%")->orWhere('title', 'like', "%$search_term%")->select('id', DB::raw('title as text'))->get();
                return $data;
            }

            $query = PartyBasicInfo::Query();
            $query = $query->with('city');
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['party_num'] = PartyBasicInfo::orderby('id', 'desc')->first();
        if ($data['party_num']) {
            $data['party_num'] = $data['party_num']->party_code + 1;
        } else {
            $data['party_num'] = 1;
        }

        $data['seo_title']      = "Party";
        $data['seo_desc']       = "Party";
        $data['seo_keywords']   = "Party";
        $data['page_title'] = "Party";
        // $data['locations'] = Location::where('location_check','like','%city%')->select(["id", "location as text"])->get();
        //$data['locations'] = Location::select('id', DB::raw('CONCAT(location, code) as text'))->where('location_check', 'like', '%city%')->get();
        //$data['locations'] = $data['locations']->toArray();
        return view('admin.party.create', $data);
    }

    public function edit($id)
    {
        $data['seo_title']      = "Edit Party";
        $data['seo_desc']       = "Edit Party";
        $data['seo_keywords']   = "Edit Party";
        $data['page_title'] = "Edit Party";
        $data['party'] = PartyBasicInfo::where("id", $id)->first();
        return view('admin.party.edit', $data);
    }

    public function delete($id)
    {
        $developer = PartyBasicInfo::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Party Deleted Successfully.'];
        return back()->withNotify($notify);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'party_code' => 'required',
            'party_name' => ['required', 'string', 'max:255', 'unique:party_basic_infos'],
            'operation_check' => 'required',
            'Type' => 'required',
        ]);

        $partybasicinfo = new PartyBasicInfo();
        $partybasicinfo->party_type = $request->calculation_type;
        $partybasicinfo->party_code = $request->party_code;
        $partybasicinfo->party_name = $request->party_name;
        $partybasicinfo->party_inactive = $request->party_inactive;
        $partybasicinfo->short_name = $request->short_name;
        $partybasicinfo->reg_date = $request->reg_date;
        $partybasicinfo->license_no = $request->license_no;
        $partybasicinfo->contact_person = $request->contact_person;
        $partybasicinfo->ntn = $request->ntn;
        $partybasicinfo->strn = $request->strn;
        $partybasicinfo->address1 = $request->address1;
        $partybasicinfo->address2 = $request->address2;
        $partybasicinfo->address3 = $request->address3;
        $partybasicinfo->city = $request->city;
        $partybasicinfo->zipcode = $request->zipcode;
        $partybasicinfo->tel_1 = $request->tel_1;
        $partybasicinfo->tel_2 = $request->tel_2;
        $partybasicinfo->facsimile = $request->facsimile;
        $partybasicinfo->mobile = $request->mobile;
        $partybasicinfo->website = $request->website;
        $partybasicinfo->email = $request->email;
        $partybasicinfo->acc_dept_email = $request->acc_dept_email;
        $partybasicinfo->operation = $request->operation;
        $partybasicinfo->operation_check = ($request->operation_check);
        $partybasicinfo->Type = ($request->Type);
        $partybasicinfo->nomination = ($request->nomination);
        $partybasicinfo->scac_iata_code = $request->scac_iata_code;
        $partybasicinfo->restriction = ($request->restriction);
        $partybasicinfo->save();

        $this->other_info_store($request, $partybasicinfo->id);
        $this->account_detail_store($request, $partybasicinfo->id);
        $this->ach_bank_detail_store($request, $partybasicinfo->id);
        $this->localize_kyc_store($request, $partybasicinfo->id);
        $this->notifications($request, $partybasicinfo->id);
        $this->insurance($request, $partybasicinfo->id);
        $this->cost_center($request, $partybasicinfo->id);

        $notify[] = ['success', 'Party Added Successfully.'];
        return redirect()->route('admin.party.create')->withNotify($notify);
    }

    public function other_info_store($request, $id)
    {
        PartyOtherInfo::where('party_basic_id', $id)->delete();

        $partyotherinfo = new PartyOtherInfo();
        $partyotherinfo->party_basic_id = $id;
        $partyotherinfo->ownership = $request->ownership;
        $partyotherinfo->affiliated_companies = $request->affiliated_companies;
        $partyotherinfo->fed_id = $request->fed_id;
        $partyotherinfo->business_type = $request->business_type;
        $partyotherinfo->year_company_establised = $request->year_company_establised;
        $partyotherinfo->no_of_employee = $request->no_of_employee;
        $partyotherinfo->est_annual_sales = $request->est_annual_sales;
        $partyotherinfo->d_b = $request->d_b;
        $partyotherinfo->ntn_name = $request->ntn_name;
        $partyotherinfo->buyer_type = $request->buyer_type;
        $partyotherinfo->specific_credit_card = $request->specific_credit_card;
        $partyotherinfo->due_days = $request->due_days;
        $partyotherinfo->credit_unit = $request->credit_unit;
        $partyotherinfo->expiry_date = $request->expiry_dates;
        $partyotherinfo->save();
    }

    public function account_detail_store($request, $id)
    {
        PartyAccountDetail::where('party_basic_id', $id)->delete();

        $partyaccountdetail = new PartyAccountDetail();
        $partyaccountdetail->party_basic_id = $id;
        $partyaccountdetail->manual_account = $request->manual_account;
        $partyaccountdetail->parent_account = $request->parent_account;
        $partyaccountdetail->account = $request->account;
        $partyaccountdetail->sale_rep = $request->sale_rep;
        $partyaccountdetail->doc_rep = $request->doc_rep;
        $partyaccountdetail->account_rep = $request->account_rep;
        $partyaccountdetail->referred_by = $request->referred_by;
        $partyaccountdetail->currency = $request->currency;
        $partyaccountdetail->customer_grp = $request->customer_grp;
        $partyaccountdetail->sub_type = $request->sub_type;
        $partyaccountdetail->sub_type_input = (!empty($request->sub_type_input)) ? $request->sub_type_input : [];
        $partyaccountdetail->save();
    }

    public function ach_bank_detail_store($request, $id)
    {
        PartyAchBankDetail::where('party_basic_id', $id)->delete();

        $partyachbankdetail = new PartyAchBankDetail();
        $partyachbankdetail->party_basic_id = $id;
        $partyachbankdetail->ach_authority = $request->ach_authority;
        $partyachbankdetail->account_title = $request->account_title;
        $partyachbankdetail->bank = $request->bank;
        $partyachbankdetail->bank_name = $request->bank_name;
        $partyachbankdetail->account_no = $request->account_no;
        $partyachbankdetail->iban = $request->iban;
        $partyachbankdetail->branch_code = $request->branch_code;
        $partyachbankdetail->swift_code = $request->swift_code;
        $partyachbankdetail->routing_no = $request->routing_no;
        $partyachbankdetail->ifsc_code = $request->ifsc_code;
        $partyachbankdetail->micr_code = $request->micr_code;
        $partyachbankdetail->remarks = $request->remarks;
        $partyachbankdetail->auth_date = $request->auth_date;
        $partyachbankdetail->auth_by = $request->auth_by;
        $partyachbankdetail->save();
    }

    public function localize_kyc_store($request, $id)
    {
        PartyLocalizeKyc::where('party_basic_id', $id)->delete();

        $partylocalizekyc = new PartyLocalizeKyc();
        $partylocalizekyc->party_basic_id = $id;
        $partylocalizekyc->name = $request->kyc_name;
        $partylocalizekyc->address1 = $request->kyc_address1;
        $partylocalizekyc->address2 = $request->kyc_address2;
        $partylocalizekyc->address3 = $request->kyc_address3;
        $partylocalizekyc->kyc_verification = $request->kyc_verification;
        $partylocalizekyc->kyc_date = $request->kyc_date;
        $partylocalizekyc->kyc_remarks = $request->kyc_remarks;
        $partylocalizekyc->save();
    }

    public function notifications($request, $id)
    {
        $notification = $request->notification;
        PartyNotification::where('party_basic_id', $id)->delete();

        foreach ($notification as $key => $value) {
            $party_notification = new PartyNotification();
            $party_notification->party_basic_id = $id;
            $party_notification->notification = $request->notification[$key];
            $party_notification->disabled = (!empty($request->disabled[$key])) ? $request->disabled[$key] : '';
            $party_notification->email_address = $request->email_address[$key];
            $party_notification->operation_type = $request->operation_type[$key];
            $party_notification->save();
        }
    }

    public function insurance($request, $id)
    {
        $insurace_company = (!empty($request->insurace_company)) ? $request->insurace_company : [];
        PartyInsurance::where('party_basic_id', $id)->delete();

        foreach ($insurace_company as $key => $value) {
            $party_insurance = new PartyInsurance();
            $party_insurance->party_basic_id = $id;
            $party_insurance->insurace_company = $request->insurace_company[$key];
            $party_insurance->insurance_type = $request->insurance_type[$key];
            $party_insurance->policy_value = $request->policy_value[$key];
            $party_insurance->policy_no = $request->policy_no[$key];
            $party_insurance->expiry_date = $request->expiry_date[$key];
            $party_insurance->save();
        }
    }

    public function cost_center($request, $id)
    {
        $company = $request->company;
        partyCenter::where('party_basic_id', $id)->delete();

        foreach ($company as $key => $value) {
            $party_center = new partyCenter();
            $party_center->party_basic_id = $id;
            $party_center->company = $request->company[$key];
            $party_center->default = $request->default[$key];
            $party_center->cost_center = $request->cost_center[$key];
            $party_center->distribution = $request->distribution[$key];
            $party_center->save();
        }
    }


    public function update(Request $request)
    {
        $validated = $request->validate([
            'party_code' => 'required',
            'party_name' => ['required', 'string', 'max:255'],
            'operation_check' => 'required',
            'Type' => 'required',
        ]);

        $partybasicinfo = PartyBasicInfo::where("id", $request->id)->first();
        $partybasicinfo->party_code = $request->party_code;
        $partybasicinfo->party_type = $request->calculation_type;
        $partybasicinfo->party_name = $request->party_name;
        $partybasicinfo->party_inactive = $request->party_inactive;
        $partybasicinfo->short_name = $request->short_name;
        $partybasicinfo->reg_date = $request->reg_date;
        $partybasicinfo->license_no = $request->license_no;
        $partybasicinfo->contact_person = $request->contact_person;
        $partybasicinfo->ntn = $request->ntn;
        $partybasicinfo->strn = $request->strn;
        $partybasicinfo->address1 = $request->address1;
        $partybasicinfo->address2 = $request->address2;
        $partybasicinfo->address3 = $request->address3;
        $partybasicinfo->city = $request->city;
        $partybasicinfo->zipcode = $request->zipcode;
        $partybasicinfo->tel_1 = $request->tel_1;
        $partybasicinfo->tel_2 = $request->tel_2;
        $partybasicinfo->facsimile = $request->facsimile;
        $partybasicinfo->mobile = $request->mobile;
        $partybasicinfo->website = $request->website;
        $partybasicinfo->email = $request->email;
        $partybasicinfo->acc_dept_email = $request->acc_dept_email;
        $partybasicinfo->operation = $request->operation;
        $partybasicinfo->operation_check = ($request->operation_check);
        $partybasicinfo->Type = ($request->Type);
        $partybasicinfo->nomination = ($request->nomination);
        $partybasicinfo->scac_iata_code = $request->scac_iata_code;
        $partybasicinfo->restriction = ($request->restriction);
        $partybasicinfo->save();

        $this->other_info_store($request, $partybasicinfo->id);
        $this->account_detail_store($request, $partybasicinfo->id);
        $this->ach_bank_detail_store($request, $partybasicinfo->id);
        $this->localize_kyc_store($request, $partybasicinfo->id);
        $this->notifications($request, $partybasicinfo->id);
        $this->insurance($request, $partybasicinfo->id);
        $this->cost_center($request, $partybasicinfo->id);

        $notify[] = ['success', 'Party Updated Successfully.'];
        return redirect()->route('admin.party.create')->withNotify($notify);
    }

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;

        $arr = ["quotation" => null, "quotation_routing" => null, "quotation_detail" => null, "quotation_equipment" => null, "jobs" => null];

        if ($type == "first") {
            $data = PartyBasicInfo::orderBy('id', 'asc')->with('city')->first();
        } else if ($type == "last") {
            $data = PartyBasicInfo::orderBy('id', 'desc')->with('city')->first();
        } else if ($type == "forward") {
            $data = PartyBasicInfo::where('id', '>', $id)->with('city')->first();
        } else if ($type == "backward") {
            $data = PartyBasicInfo::where('id', '<', $id)->orderBy('id', 'desc')->with('city')->first();
        }

        return $data;
    }

    public function getAllData(Request $request)
    {
        if (isset($request->type) && $request->type == 'get_client') {
            $search_term = $request->search;
            $data = PartyBasicInfo::where('party_name', 'like', "%$search_term%")
                ->whereIn('party_type', ['customer', 'customer-vendor'])
                ->select(["id", "party_name as text"])->get();
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

        if (isset($request->type) && $request->type == 'get_shipper') {
            $search_term = $request->search;
            $data = PartyBasicInfo::where('party_name', 'like', '%' . $search_term . '%')
                ->where('Type', 'Like', '%Shipper%')
                ->select(["id", "party_name as text"])
                ->get();
            return $data;
        }

        if (isset($request->type) && $request->type == 'get_clearing_agent') {
            $search_term = $request->search;
            $data = PartyBasicInfo::where('party_name', 'like', '%' . $search_term . '%')
                ->where('Type', 'Like', '%CHA-CHB%')
                ->select(["id", "party_name as text"])
                ->get();
            return $data;
        }

        if (isset($request->type) && $request->type == 'get_transporter') {
            $search_term = $request->search;
            $data = PartyBasicInfo::where('party_name', 'like', '%' . $search_term . '%')
                ->where('Type', 'Like', '%Transporter%')
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

        if (isset($request->type) && $request->type == 'get_terminals') {
            $search_term = $request->search;
            $data = PartyBasicInfo::where('party_name', 'like', '%' . $search_term . '%')
                ->where('Type', 'Like', '%Terminal%')
                ->select(["id", "party_name as text"])
                ->get();
            return $data;
        }
    }
}
