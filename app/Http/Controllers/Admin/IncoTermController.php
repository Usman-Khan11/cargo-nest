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
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = Incoterm::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
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
        return redirect()->route('admin.inco_term.create')->withNotify($notify);
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
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = Incoterm::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = Incoterm::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = Incoterm::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = Incoterm::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
