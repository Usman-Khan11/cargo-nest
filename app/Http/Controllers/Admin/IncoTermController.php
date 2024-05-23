<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Incoterm;
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

class IncoTermController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Inco Term";
    //     $data['seo_desc']       = "Inco Term";
    //     $data['seo_keywords']   = "Inco Term";
    //     $data['page_title'] = "All Inco Term Record";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Incoterm::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.inco_term.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Incoterm::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        
        $data['seo_title']      = "Inco Term";
        $data['seo_desc']       = "Inco Term";
        $data['seo_keywords']   = "Inco Term";
        $data['page_title'] = "Inco Term";
        return view('admin.inco_term.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Group";
        $data['seo_desc']       = "Edit Group";
        $data['seo_keywords']   = "Edit Group";
        $data['page_title'] = "Edit Group";
        $data['incoterm'] = Incoterm::where("id", $id)->first();
        return view('admin.inco_term.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Incoterm::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Inco Term Deleted Successfully.'];
        return redirect()->route('admin.inco_term')->withNotify($notify);
    }
    
    
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
    
        $incoterm = new Incoterm();
        $incoterm->code = $request->code;
        $incoterm->name = $request->name;
        $incoterm->save();
        
        $notify[] = ['success', 'Inco Term Added Successfully.'];
        return redirect()->route('admin.inco_term.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
    
        $incoterm = Incoterm::where("id", $request->id)->first();
        $incoterm->code = $request->code;
        $incoterm->name = $request->name;
        $incoterm->save();
        
        $notify[] = ['success', 'Inco Term Updated Successfully.'];
        return redirect()->route('admin.inco_term.create')->withNotify($notify);
    }
    
}
