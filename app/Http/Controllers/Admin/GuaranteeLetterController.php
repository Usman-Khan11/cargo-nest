<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\GuaranteeLetter;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class GuaranteeLetterController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "GuaranteeLetter";
    //     $data['seo_desc']       = "GuaranteeLetter";
    //     $data['seo_keywords']   = "GuaranteeLetter";
    //     $data['page_title'] = "All GuaranteeLetter";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=GuaranteeLetter::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.GuaranteeLetter.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = GuaranteeLetter::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
       
        $data['seo_title']      = "Guarantee Letter";
        $data['seo_desc']       = "Guarantee Letter";
        $data['seo_keywords']   = "Guarantee Letter";
        $data['page_title'] = "Guarantee Letter";
        return view('admin.guarantee_letter.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Guarantee Letter";
        $data['seo_desc']       = "Edit Guarantee Letter";
        $data['seo_keywords']   = "Edit Guarantee Letter";
        $data['page_title'] = "Edit GuaranteeLetter";
        $data['guaranteeletter'] = GuaranteeLetter::where("id", $id)->first();
        return view('admin.guarantee_letter.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = GuaranteeLetter::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Guarantee Letter Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $guarantee_letter = new GuaranteeLetter();
        $guarantee_letter->fill($request->all());
        $guarantee_letter->save();
        
        $notify[] = ['success', 'Guarantee Letter Added Successfully.'];
        return redirect()->route('admin.guarantee_letter.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
       
        $guarantee_letter = GuaranteeLetter::where("id", $request->id)->first();
        $guarantee_letter->inactive = $request->inactive ? $request->inactive : '';
        $guarantee_letter->fill($request->all());
        $guarantee_letter->update();
        
        $notify[] = ['success', 'Guarantee Letter Updated Successfully.'];
        return redirect()->route('admin.guarantee_letter.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = GuaranteeLetter::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = GuaranteeLetter::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = GuaranteeLetter::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = GuaranteeLetter::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
