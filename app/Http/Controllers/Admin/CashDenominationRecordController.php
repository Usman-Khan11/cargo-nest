<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Commodity;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class CashDenominationRecordController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Commodity";
    //     $data['seo_desc']       = "Commodity";
    //     $data['seo_keywords']   = "Commodity";
    //     $data['page_title'] = "All Commodity";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Commodity::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.commodity.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = CashDenominationRecord::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Cash Denomination Records";
        $data['seo_desc']       = "Cash Denomination Records";
        $data['seo_keywords']   = "Cash Denomination Records";
        $data['page_title'] = "Cash Denomination Records";
        return view('admin.cash_denomination_record.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Voucher";
        $data['seo_desc']       = "Edit Voucher";
        $data['seo_keywords']   = "Edit Voucher";
        $data['page_title'] = "Edit Voucher";
        $data['cashdenominationrecord'] = CashDenominationRecord::where("id", $id)->first();
        return view('admin.cash_denomination_record.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = CashDenominationRecord::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Cash Denomination Record Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            // 'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $cash_denomination_record = new CashDenominationRecord();
        $cash_denomination_record->fill($request->all());
        $cash_denomination_record->save();
        
        $notify[] = ['success', 'Cash Denomination Record Added Successfully.'];
        return redirect()->route('admin.cash_denomination_record.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $cash_denomination_record = CashDenominationRecord::where("id", $request->id)->first();
        $cash_denomination_record->inactive = $request->inactive ? $request->inactive : '';
        $cash_denomination_record->fill($request->all());
        $cash_denomination_record->update();
        
        $notify[] = ['success', 'Cash Denomination Record Updated Successfully.'];
        return redirect()->route('admin.cash_denomination_record.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = CashDenominationRecord::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = CashDenominationRecord::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = CashDenominationRecord::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = CashDenominationRecord::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
