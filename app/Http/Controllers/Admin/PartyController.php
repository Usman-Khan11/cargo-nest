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
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminNotification;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class PartyController extends Controller
{
    public function index(Request $request)
    {
        $data['seo_title']      = "Party";
        $data['seo_desc']       = "Party";
        $data['seo_keywords']   = "Party";
        $data['page_title'] = "All Party";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Party::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.party.index', $data);
    }
    
    
    public function create(Request $request)
    {
        $data['seo_title']      = "Party";
        $data['seo_desc']       = "Party";
        $data['seo_keywords']   = "Party";
        $data['page_title'] = "Party";
        return view('admin.party.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Party";
        $data['seo_desc']       = "Edit Party";
        $data['seo_keywords']   = "Edit Party";
        $data['page_title'] = "Edit Party";
        $data['party'] = Party::where("id", $id)->first();
        return view('admin.party.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Party::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Party Deleted Successfully.'];
        return redirect()->route('admin.party')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'short_name' => 'required',
            'reg_date' => 'required',
            'license_no' => 'required',
            'contact_person' => 'required',
        ]);
        
        $partybasicinfo = new PartyBasicInfo();
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
        $partybasicinfo->operation_check=json_encode($request->operation_check);
        $partybasicinfo->Type=json_encode($request->Type);
        $partybasicinfo->nomination=json_encode($request->nomination);
        $partybasicinfo->scac_iata_code = $request->scac_iata_code;
        $partybasicinfo->restriction=json_encode($request->restriction);
        $partybasicinfo->save();
        $this->other_info_store($request,$partybasicinfo->id);
        $this->account_detail_store($request,$partybasicinfo->id);
        $this->ach_bank_detail_store($request,$partybasicinfo->id);
        $this->localize_kyc_store($request,$partybasicinfo->id);
        
        $notify[] = ['success', 'Party Added Successfully.'];
        return redirect()->route('admin.party')->withNotify($notify);
    }
    
    public function other_info_store($request,$id)
    {
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
        $partyotherinfo->expiry_date = $request->expiry_date;
        $partyotherinfo->save();
    }
    
    public function account_detail_store($request,$id)
    {
        $partyaccountdetail = new PartyAccountDetail();
        $partyaccountdetail->party_basic_id = $id;
        $partyaccountdetail->manual_account = $request->manual_account	;
        $partyaccountdetail->parent_account = $request->parent_account	;
        $partyaccountdetail->account = $request->account	;
        $partyaccountdetail->sale_rep = $request->sale_rep	;
        $partyaccountdetail->doc_rep = $request->doc_rep	;
        $partyaccountdetail->account_rep = $request->account_rep	;
        $partyaccountdetail->referred_by = $request->referred_by	;
        $partyaccountdetail->currency = $request->currency;
        $partyaccountdetail->customer_grp = $request->customer_grp;
        $partyaccountdetail->sub_type = $request->sub_type;
        $partyaccountdetail->save();
    }
    
    public function ach_bank_detail_store($request,$id){
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
    
    public function localize_kyc_store($request,$id){
        $partylocalizekyc = new PartyLocalizeKyc();
        $partylocalizekyc->party_basic_id = $id;
        $partylocalizekyc->name = $request->name;
        $partylocalizekyc->address1 = $request->address1;
        $partylocalizekyc->address2 = $request->address2;
        $partylocalizekyc->address3 = $request->address3;
        $partylocalizekyc->kyc_verification = $request->kyc_verification;
        $partylocalizekyc->kyc_date = $request->kyc_date;
        $partylocalizekyc->kyc_remarks = $request->kyc_remarks;
        $partylocalizekyc->save();
    }
    
    public function notifications($request,$id){
        $notification = $request->notification;
        foreach($notification as $key => $value) {
            $party_notification = new PartyNotification();
            $party_notification->party_basic_id = $id;
            $party_notification->notification = $request->notification[$key];
            $party_notification->disabled = $request->disabled[$key];
            $party_notification->email_address = $request->email_address[$key];
            $party_notification->operation_type = $request->operation_type[$key];
            $party_notification->save();
        }    
    }
    
    public function insurance($request,$id){
        $insurace_company = $request->insurace_company;
        foreach($insurace_company as $key => $value) {
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
    
    public function cost_center($request,$id){
        $company = $request->company;
        foreach($company as $key => $value) {
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
            'quotation_no' => 'required',
            'date' => 'required',
        ]);
        
        $quotation = Quotation::where("id", $request->id)->first();
        $quotation->fill($request->all());
        $quotation->save();
        
        $notify[] = ['success', 'Quotation Updated Successfully.'];
        return redirect()->route('admin.quotation')->withNotify($notify);
    }
    
}
