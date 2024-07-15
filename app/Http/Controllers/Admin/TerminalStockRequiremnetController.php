<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\TerminalStockRequiremnet;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class TerminalStockRequiremnetController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "TerminalStockRequiremnet";
    //     $data['seo_desc']       = "TerminalStockRequiremnet";
    //     $data['seo_keywords']   = "TerminalStockRequiremnet";
    //     $data['page_title'] = "All TerminalStockRequiremnet";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=TerminalStockRequiremnet::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.TerminalStockRequiremnet.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = TerminalStockRequiremnet::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
       
        $data['seo_title']      = "Terminal Stock Requiremnet";
        $data['seo_desc']       = "Terminal Stock Requiremnet";
        $data['seo_keywords']   = "Terminal Stock Requiremnet";
        $data['page_title'] = "Terminal Stock Requiremnet";
        return view('admin.terminal_stock_requirement.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Terminal Stock Requiremnet";
        $data['seo_desc']       = "Edit Terminal Stock Requiremnet";
        $data['seo_keywords']   = "Edit Terminal Stock Requiremnet";
        $data['page_title'] = "Edit TerminalStockRequiremnet";
        $data['terminalstockrequiremnet'] = TerminalStockRequiremnet::where("id", $id)->first();
        return view('admin.terminal_stock_requirement.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = TerminalStockRequiremnet::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Terminal Stock Requiremnet Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $terminal_stock_requirement = new TerminalStockRequiremnet();
        $terminal_stock_requirement->fill($request->all());
        $terminal_stock_requirement->save();
        
        $notify[] = ['success', 'Terminal Stock Requiremnet Added Successfully.'];
        return redirect()->route('admin.terminal_stock_requirement.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
       
        $terminal_stock_requirement = TerminalStockRequiremnet::where("id", $request->id)->first();
        $terminal_stock_requirement->inactive = $request->inactive ? $request->inactive : '';
        $terminal_stock_requirement->fill($request->all());
        $terminal_stock_requirement->update();
        
        $notify[] = ['success', 'Terminal Stock Requiremnet Updated Successfully.'];
        return redirect()->route('admin.terminal_stock_requirement.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = TerminalStockRequiremnet::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = TerminalStockRequiremnet::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = TerminalStockRequiremnet::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = TerminalStockRequiremnet::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
