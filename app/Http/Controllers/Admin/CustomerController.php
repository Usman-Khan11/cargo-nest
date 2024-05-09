<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
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

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $data['seo_title']      = "Customers";
        $data['seo_desc']       = "Customers";
        $data['seo_keywords']   = "Customers";
        $data['page_title'] = "All Customers";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Customer::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.customer.index', $data);
    }
    
    
    public function create(Request $request)
    {
        $data['seo_title']      = "Add New Customer";
        $data['seo_desc']       = "Add New Customer";
        $data['seo_keywords']   = "Add New Customer";
        $data['page_title'] = "Add New Customer";
        return view('admin.customer.create', $data);
    }
    
    public function edit($id)
    {
        $data['seo_title']      = "Edit Customer";
        $data['seo_desc']       = "Edit Customer";
        $data['seo_keywords']   = "Edit Customer";
        $data['page_title'] = "Edit Customer";
        $data['customer'] = Customer::where("id", $id)->first();
        return view('admin.customer.edit', $data);
    }
    
    public function delete($id)
    {
        $developer = Customer::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Customer Deleted Successfully.'];
        return redirect()->route('admin.customer')->withNotify($notify);
    }
    
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->country = $request->country;
        $customer->status = 1;
        $customer->postal_code = $request->postal_code;
        $customer->gst_no = $request->gst_no;
        $customer->save();
        
        $notify[] = ['success', 'Customer Added Successfully.'];
        return redirect()->route('admin.customer')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
           'name' => 'required|max:255',
        ]);
        
        $customer = Customer::where("id", $request->id)->first();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->country = $request->country;
        $customer->status = 1;
        $customer->postal_code = $request->postal_code;
        $customer->gst_no = $request->gst_no;
        $customer->save();
        
        $notify[] = ['success', 'Customer Updated Successfully.'];
        return redirect()->route('admin.customer')->withNotify($notify);
    }
    
}
