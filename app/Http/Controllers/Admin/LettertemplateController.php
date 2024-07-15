<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeLetterTemplate;
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

class LettertemplateController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Se Letter Template";
    //     $data['seo_desc']       = "Se Letter Template";
    //     $data['seo_keywords']   = "Se Letter Template";
    //     $data['page_title'] = "Se Letter Template";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Lettertemplate::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.lettertemplate.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = SeLetterTemplate::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Se Letter Template";
        $data['seo_desc']       = "Se Letter Template";
        $data['seo_keywords']   = "Se Letter Template";
        $data['page_title'] = "Se Letter Template";
        return view('admin.lettertemplate.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Se Letter Template";
        $data['seo_desc']       = "Edit Se Letter Template";
        $data['seo_keywords']   = "Edit Se Letter Template";
        $data['page_title'] = "Edit Se Letter Template";
        $data['selettertemplate'] = SeLetterTemplate::where("id", $id)->first();
        return view('admin.lettertemplate.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = SeLetterTemplate::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Se Letter Template Deleted Successfully.'];
        return redirect()->route('admin.lettertemplate.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'letter_code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:se_letter_template'],
        ]);
        
        
        $letter_template = new SeLetterTemplate();
        $letter_template->fill($request->all());
        $letter_template->save();
        
        $notify[] = ['success', 'Se Letter template Added Successfully.'];
        return redirect()->route('admin.lettertemplate.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'letter_code' => 'required',
            'name' => 'required',
        ]);
        
        $letter_template = SeLetterTemplate::where("id", $request->id)->first();
        $letter_template->fill($request->all());
        $letter_template->update();
        
        $notify[] = ['success', 'Se Letter template Updated Successfully.'];
        return redirect()->route('admin.lettertemplate.create')->withNotify($notify);
    }
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = SeLetterTemplate::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = SeLetterTemplate::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = SeLetterTemplate::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = SeLetterTemplate::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
   
    
}
