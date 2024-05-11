<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;
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

class CurrencyController extends Controller
{
    public function index(Request $request)
    {
        $data['seo_title']      = "Currency";
        $data['seo_desc']       = "Currency";
        $data['seo_keywords']   = "Currency";
        $data['page_title'] = "All Currency";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Currency::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.currency.index', $data);
    }
    
    
    public function create(Request $request)
    {
        $data['seo_title']      = "Currency";
        $data['seo_desc']       = "Currency";
        $data['seo_keywords']   = "Currency";
        $data['page_title'] = "Currency";
        return view('admin.currency.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Currency";
        $data['seo_desc']       = "Edit Currency";
        $data['seo_keywords']   = "Edit Currency";
        $data['page_title'] = "Edit Currency";
        $data['currency'] = Currency::where("id", $id)->first();
        return view('admin.currency.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Currency::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Currency Deleted Successfully.'];
        return redirect()->route('admin.currency')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'main_symbol' => 'required',
            'unit_symbol' => 'required',
        ]);
        
        $currency = new Currency();
        $currency->fill($request->all());
        $currency->save();
        
        $notify[] = ['success', 'Currency Added Successfully.'];
        return redirect()->route('admin.currency')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'main_symbol' => 'required',
            'unit_symbol' => 'required',
        ]);
        
        $currency = Currency::where("id", $request->id)->first();
        $currency->fill($request->all());
        $currency->save();
        
        $notify[] = ['success', 'Quotation Updated Successfully.'];
        return redirect()->route('admin.currency')->withNotify($notify);
    }
    
}
