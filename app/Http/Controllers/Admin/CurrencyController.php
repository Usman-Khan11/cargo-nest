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
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Currency";
    //     $data['seo_desc']       = "Currency";
    //     $data['seo_keywords']   = "Currency";
    //     $data['page_title'] = "All Currency";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Currency::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.currency.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        
        if ($request->ajax()) {
            $query = Currency::Query();
            $query = $query->orderBy('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
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
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'max:100', 'unique:currencies'],
            'name' => ['required', 'string', 'max:100', 'unique:currencies'],
            'main_symbol' => 'required',
            'unit_symbol' => 'required',
        ]);
        
        $chk = Currency::where('code', $request->code)->where('name', $request->name)->where('main_symbol', $request->main_symbol)->where('unit_symbol', $request->unit_symbol)->count();
        if($chk > 0){
            $notify[] = ['error', 'code, name, unit_symbol & main_symbol duplicate not allowed!'];
            return back()->withNotify($notify);
        }
        
        $currency = new Currency();
        $currency->fill($request->all());
        $currency->save();
        
        $notify[] = ['success', 'Currency Added Successfully.'];
        return redirect()->route('admin.currency.create')->withNotify($notify);
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
        
        $notify[] = ['success', 'Currency Updated Successfully.'];
        return redirect()->route('admin.currency.create')->withNotify($notify);
    }
    
     public function bulkUpload(Request $request)
    {
        $file = $request->file('import_file');
        $tempPath = $file->getPathname();
        $extension = $file->getClientOriginalExtension();
        $i = 0;

        if ($extension == "csv"){
            $handle = fopen($tempPath, 'r');
            while (($line = fgetcsv($handle, 10000, ",")) !== FALSE) {
                if($i > 0) {
                    
                    
                    $chk = Currency::where('name', strtolower($line[1]))->count();
                    $chk_1 = Currency::where('code', strtolower($line[0]))->count();
                    if($chk == 0 && $chk_1 == 0){
                        $currency = new Currency();
                        $currency->code = $line[0];
                        $currency->name = $line[1];
                        $currency->main_symbol = $line[2];
                        $currency->unit_symbol = $line[3];
                        $currency->decimal_portion_digits = $line[4];
                        $currency->save();
                    }
                }
                $i++;
            }
            fclose($handle);
            return ['success', 'Upload Successfully.'];
        } else {
            return ['error', 'Only csv file allowed.'];
        }
        
        return ['error', 'Something went wrong!'];
    }
    
    
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = Currency::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = Currency::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = Currency::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = Currency::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
