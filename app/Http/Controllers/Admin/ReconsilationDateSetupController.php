<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Commodity;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class ReconsilationDateSetupController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Commodity";
    //     $data['seo_desc']       = "Commodity";
    //     $data['seo_keywords']   = "Commodity";
    //     $data['page_title'] = "All Commodity";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Commodity::Query();
    //         $totalCount=$query->count(); 
            
    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.commodity.index', $data);
    // }
    
    
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = ReconsilationDateSetup::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Reconsilation Date Setup";
        $data['seo_desc']       = "Reconsilation Date Setup";
        $data['seo_keywords']   = "Reconsilation Date Setup";
        $data['page_title'] = "Reconsilation Date Setup";
        return view('admin.reconsilation_date_setup.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Reconsilation Date Setup";
        $data['seo_desc']       = "Edit Reconsilation Date Setup";
        $data['seo_keywords']   = "Edit Reconsilation Date Setup";
        $data['page_title'] = "Edit Reconsilation Date Setup";
        $data['reconsilationdatesetup'] = ReconsilationDateSetup::where("id", $id)->first();
        return view('admin.reconsilation_date_setup.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = ReconsilationDateSetup::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Reconsilation Date Setup Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            // 'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $reconsilation_date_setup = new ReconsilationDateSetup();
        $reconsilation_date_setup->fill($request->all());
        $reconsilation_date_setup->save();
        
        $notify[] = ['success', 'Reconsilation Date Setup Added Successfully.'];
        return redirect()->route('admin.reconsilation_date_setup.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $reconsilation_date_setup = ReconsilationDateSetup::where("id", $request->id)->first();
        $reconsilation_date_setup->inactive = $request->inactive ? $request->inactive : '';
        $reconsilation_date_setup->fill($request->all());
        $reconsilation_date_setup->update();
        
        $notify[] = ['success', 'Reconsilation Date Setup Updated Successfully.'];
        return redirect()->route('admin.reconsilation_date_setup.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = ReconsilationDateSetup::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = ReconsilationDateSetup::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = ReconsilationDateSetup::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = ReconsilationDateSetup::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
