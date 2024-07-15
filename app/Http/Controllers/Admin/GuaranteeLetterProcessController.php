<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\GuaranteeLetterProcess;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class GuaranteeLetterProcessController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "GuaranteeLetterProcess";
    //     $data['seo_desc']       = "GuaranteeLetterProcess";
    //     $data['seo_keywords']   = "GuaranteeLetterProcess";
    //     $data['page_title'] = "All GuaranteeLetterProcess";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=GuaranteeLetterProcess::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.GuaranteeLetterProcess.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = GuaranteeLetterProcess::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
       
        $data['seo_title']      = "Guarantee Letter Process";
        $data['seo_desc']       = "Guarantee Letter Process";
        $data['seo_keywords']   = "Guarantee Letter Process";
        $data['page_title'] = "Guarantee Letter Process";
        return view('admin.guarantee_letter_process.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Guarantee Letter Process";
        $data['seo_desc']       = "Edit Guarantee Letter Process";
        $data['seo_keywords']   = "Edit Guarantee Letter Process";
        $data['page_title'] = "Edit GuaranteeLetterProcess";
        $data['guaranteeletterprocess'] = GuaranteeLetterProcess::where("id", $id)->first();
        return view('admin.guarantee_letter_process.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = GuaranteeLetterProcess::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Guarantee Letter Process Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $guarantee_letter_process = new GuaranteeLetterProcess();
        $guarantee_letter_process->fill($request->all());
        $guarantee_letter_process->save();
        
        $notify[] = ['success', 'Guarantee Letter Process Added Successfully.'];
        return redirect()->route('admin.guarantee_letter_process.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
       
        $guarantee_letter_process = GuaranteeLetterProcess::where("id", $request->id)->first();
        $guarantee_letter_process->inactive = $request->inactive ? $request->inactive : '';
        $guarantee_letter_process->fill($request->all());
        $guarantee_letter_process->update();
        
        $notify[] = ['success', 'Guarantee Letter Process Updated Successfully.'];
        return redirect()->route('admin.guarantee_letter_process.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = GuaranteeLetterProcess::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = GuaranteeLetterProcess::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = GuaranteeLetterProcess::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = GuaranteeLetterProcess::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
