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

class ChequeBookStockController extends Controller
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
            $query = ChequeBookStock::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Cheque Book Stock";
        $data['seo_desc']       = "Cheque Book Stock";
        $data['seo_keywords']   = "Cheque Book Stock";
        $data['page_title'] = "Cheque Book Stock";
        return view('admin.cheque_book_stock.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Cheque Book Stock";
        $data['seo_desc']       = "Edit Cheque Book Stock";
        $data['seo_keywords']   = "Edit Cheque Book Stock";
        $data['page_title'] = "Edit Cheque Book Stock";
        $data['chequebookstock'] = ChequeBookStock::where("id", $id)->first();
        return view('admin.cheque_book_stock.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = ChequeBookStock::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Cash Denomination Record Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            // 'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);
       
        $cheque_book_stock = new ChequeBookStock();
        $cheque_book_stock->fill($request->all());
        $cheque_book_stock->save();
        
        $notify[] = ['success', 'Cash Denomination Record Added Successfully.'];
        return redirect()->route('admin.cheque_book_stock.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        
        $cheque_book_stock = ChequeBookStock::where("id", $request->id)->first();
        $cheque_book_stock->inactive = $request->inactive ? $request->inactive : '';
        $cheque_book_stock->fill($request->all());
        $cheque_book_stock->update();
        
        $notify[] = ['success', 'Cash Denomination Record Updated Successfully.'];
        return redirect()->route('admin.cheque_book_stock.create')->withNotify($notify);
    }
    
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = ChequeBookStock::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = ChequeBookStock::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = ChequeBookStock::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = ChequeBookStock::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
    
}
