<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\GuaranteeFillingAnellation;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class GuaranteeFillingAnellationController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "GuaranteeFillingAnellation";
    //     $data['seo_desc']       = "GuaranteeFillingAnellation";
    //     $data['seo_keywords']   = "GuaranteeFillingAnellation";
    //     $data['page_title'] = "All GuaranteeFillingAnellation";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=GuaranteeFillingAnellation::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.GuaranteeFillingAnellation.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = GuaranteeFillingAnellation::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
       
        $data['seo_title']      = "Guarantee Filling Anellation";
        $data['seo_desc']       = "Guarantee Filling Anellation";
        $data['seo_keywords']   = "Guarantee Filling Anellation";
        $data['page_title'] = "Guarantee Filling Anellation";
        return view('admin.guarantee_filling_anellation.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Guarantee Filling Anellation";
        $data['seo_desc']       = "Edit Guarantee Filling Anellation";
        $data['seo_keywords']   = "Edit Guarantee Filling Anellation";
        $data['page_title'] = "Edit GuaranteeFillingAnellation";
        $data['guaranteefillinganellation'] = GuaranteeFillingAnellation::where("id", $id)->first();
        return view('admin.guarantee_filling_anellation.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = GuaranteeFillingAnellation::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Guarantee Filling Anellation Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $guarantee_filling_anellation = new GuaranteeFillingAnellation();
        $guarantee_filling_anellation->fill($request->all());
        $guarantee_filling_anellation->save();
        
        $notify[] = ['success', 'Guarantee Filling Anellation Added Successfully.'];
        return redirect()->route('admin.guarantee_filling_anellation.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
       
        $guarantee_filling_anellation = GuaranteeFillingAnellation::where("id", $request->id)->first();
        $guarantee_filling_anellation->inactive = $request->inactive ? $request->inactive : '';
        $guarantee_filling_anellation->fill($request->all());
        $guarantee_filling_anellation->update();
        
        $notify[] = ['success', 'Guarantee Filling Anellation Updated Successfully.'];
        return redirect()->route('admin.guarantee_filling_anellation.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = GuaranteeFillingAnellation::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = GuaranteeFillingAnellation::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = GuaranteeFillingAnellation::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = GuaranteeFillingAnellation::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
