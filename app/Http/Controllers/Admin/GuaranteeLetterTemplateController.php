<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\GuaranteeLetterTemplate;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class GuaranteeLetterTemplateController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "GuaranteeLetterTemplate";
    //     $data['seo_desc']       = "GuaranteeLetterTemplate";
    //     $data['seo_keywords']   = "GuaranteeLetterTemplate";
    //     $data['page_title'] = "All GuaranteeLetterTemplate";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=GuaranteeLetterTemplate::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.GuaranteeLetterTemplate.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = GuaranteeLetterTemplate::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
       
        $data['seo_title']      = "Guarantee Letter Template";
        $data['seo_desc']       = "Guarantee Letter Template";
        $data['seo_keywords']   = "Guarantee Letter Template";
        $data['page_title'] = "Guarantee Letter Template";
        return view('admin.guarantee_letter_template.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Guarantee Letter Template";
        $data['seo_desc']       = "Edit Guarantee Letter Template";
        $data['seo_keywords']   = "Edit Guarantee Letter Template";
        $data['page_title'] = "Edit GuaranteeLetterTemplate";
        $data['guaranteelettertemplate'] = GuaranteeLetterTemplate::where("id", $id)->first();
        return view('admin.guarantee_letter_template.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = GuaranteeLetterTemplate::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Guarantee Letter Template Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $guarantee_letter_template = new GuaranteeLetterTemplate();
        $guarantee_letter_template->fill($request->all());
        $guarantee_letter_template->save();
        
        $notify[] = ['success', 'Guarantee Letter Template Added Successfully.'];
        return redirect()->route('admin.guarantee_letter_template.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
       
        $guarantee_letter_template = GuaranteeLetterTemplate::where("id", $request->id)->first();
        $guarantee_letter_template->inactive = $request->inactive ? $request->inactive : '';
        $guarantee_letter_template->fill($request->all());
        $guarantee_letter_template->update();
        
        $notify[] = ['success', 'Guarantee Letter Template Updated Successfully.'];
        return redirect()->route('admin.guarantee_letter_template.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = GuaranteeLetterTemplate::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = GuaranteeLetterTemplate::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = GuaranteeLetterTemplate::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = GuaranteeLetterTemplate::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
