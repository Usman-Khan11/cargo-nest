<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeLetterList;
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

class LetterlistController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Se Letter list";
    //     $data['seo_desc']       = "Se Letter list";
    //     $data['seo_keywords']   = "Se Letter list";
    //     $data['page_title'] = "Se Letterlist";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Letterlist::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.letterlist.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = SeLetterList::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Se Letterlist";
        $data['seo_desc']       = "Se Letterlist";
        $data['seo_keywords']   = "Se Letterlist";
        $data['page_title'] = "Se Letterlist";
        return view('admin.letterlist.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Se Letters";
        $data['seo_desc']       = "Edit Se Letters";
        $data['seo_keywords']   = "Edit Se Letters";
        $data['page_title'] = "Edit Se Letterlist";
        $data['letter'] = SeLetterList::where("id", $id)->first();
        return view('admin.letterlist.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = SeLetterList::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Se Letter list Deleted Successfully.'];
        return redirect()->route('admin.letterlist.create')->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'trans_number' => 'required',
            'letter' => ['required', 'string', 'max:255', 'unique:se_letter_list'],
        ]);
       
        $se_letter_list = new SeLetterList();
        $se_letter_list->fill($request->all());
        $se_letter_list->save();
        
        $notify[] = ['success', 'Guarantee Letter List Added Successfully.'];
        return redirect()->route('admin.letterlist.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'trans_number' => 'required',
            'letter' => 'required',
        ]);
       
        $se_letter_list = SeLetterList::where("id", $request->id)->first();
        $se_letter_list->inactive = $request->inactive ? $request->inactive : '';
        $se_letter_list->fill($request->all());
        $se_letter_list->update();
        
        $notify[] = ['success', 'Guarantee Letter List Updated Successfully.'];
        return redirect()->route('admin.letterlist.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = SeLetterList::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = SeLetterList::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = SeLetterList::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = SeLetterList::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
   
    
}
