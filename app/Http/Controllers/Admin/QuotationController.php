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
use App\Models\QuotationDetail;
use App\Models\QuotationEquipment;
use App\Models\QuotationRouting;
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

class QuotationController extends Controller
{
    public function index(Request $request)
    {
        $data['seo_title']      = "Quotations";
        $data['seo_desc']       = "Quotations";
        $data['seo_keywords']   = "Quotations";
        $data['page_title'] = "All Quotations";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Quotation::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.quotation.index', $data);
    }
    
    
    public function create(Request $request)
    {
        $data['seo_title']      = "Quotation";
        $data['seo_desc']       = "Quotation";
        $data['seo_keywords']   = "Quotation";
        $data['page_title'] = "Quotation";
        $data['customers'] = Customer::get();
        $data['commodities'] = Commodity::get();
        $data['vessels'] = Vessel::get();
        $data['voyages'] = Voyage::get();
        $data['currencies'] = Currency::get();
        $data['sizes'] = Equipment::get();
        $data['incoterms'] = Incoterm::get();
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
        $developer = Quotation::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Quotation Deleted Successfully.'];
        return redirect()->route('admin.quotation')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'quotation_no' => 'required',
            'date' => 'required',
        ]);
        
        $quotation = new Quotation();
        $quotation->fill($request->all());
        $quotation->save();
        
        $quotation_routings = new QuotationRouting();
        $quotation_routings->fill($request->all());
        
        
        $units = $request->units;
        foreach($units as $key => $value) {
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
            $quotation_details->manual = $request->manual[$key];
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
        foreach($equip_size_type as $key => $value) {
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
        
        
        $notify[] = ['success', 'Quotation Added Successfully.'];
        return redirect()->route('admin.quotation.create')->withNotify($notify);
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
