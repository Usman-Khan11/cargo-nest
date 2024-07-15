<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\GuaranteeLetterList;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class GuaranteeLetterListController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "GuaranteeLetterList";
    //     $data['seo_desc']       = "GuaranteeLetterList";
    //     $data['seo_keywords']   = "GuaranteeLetterList";
    //     $data['page_title'] = "All GuaranteeLetterList";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=GuaranteeLetterList::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.GuaranteeLetterList.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = GuaranteeLetterList::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
       
        $data['seo_title']      = "Guarantee Letter List";
        $data['seo_desc']       = "Guarantee Letter List";
        $data['seo_keywords']   = "Guarantee Letter List";
        $data['page_title'] = "Guarantee Letter List";
        return view('admin.guarantee_letter_list.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Guarantee Letter List";
        $data['seo_desc']       = "Edit Guarantee Letter List";
        $data['seo_keywords']   = "Edit Guarantee Letter List";
        $data['page_title'] = "Edit GuaranteeLetterList";
        $data['guaranteeletterlist'] = GuaranteeLetterList::where("id", $id)->first();
        return view('admin.guarantee_letter_list.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = GuaranteeLetterList::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Guarantee Letter List Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $guarantee_letter_list = new GuaranteeLetterList();
        $guarantee_letter_list->fill($request->all());
        $guarantee_letter_list->save();
        
        $notify[] = ['success', 'Guarantee Letter List Added Successfully.'];
        return redirect()->route('admin.guarantee_letter_list.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
       
        $guarantee_letter_list = GuaranteeLetterList::where("id", $request->id)->first();
        $guarantee_letter_list->inactive = $request->inactive ? $request->inactive : '';
        $guarantee_letter_list->fill($request->all());
        $guarantee_letter_list->update();
        
        $notify[] = ['success', 'Guarantee Letter List Updated Successfully.'];
        return redirect()->route('admin.guarantee_letter_list.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = GuaranteeLetterList::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = GuaranteeLetterList::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = GuaranteeLetterList::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = GuaranteeLetterList::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
