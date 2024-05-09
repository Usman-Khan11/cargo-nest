<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Validator;
use Carbon\Carbon;
use Session;
use DataTables;
use App\Models\User;
use App\Models\Customer;
use App\Models\Quotation;
use App\Models\Order;
use App\Models\Vector;
use App\Models\FileTransfer;
use Illuminate\Support\Facades\Auth;

class ManageUserController extends Controller
{
    //Customer Data
    public function index(Request $request)
    {
        $data['top_title'] = "Customer Records | Digitizing Portal";
        $data['page_title'] = "Customer Records";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=User::Query();
            $totalCount=$query->count();
            $query = $query->with('customers');
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->get();
            

            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }

        return view('admin.users.show',$data);
    }

    //Quotation Records Starts
    public function today_quotes(Request $request)
    {
        $data['top_title'] = "Today's Quotation Records | Digitizing Portal";
        $data['page_title'] = "Today's Quotation Records";
        $today = Carbon::now()->format('Y-m-d');
        
        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Quotation::query();
            $totalCount=$query->count();
            $query = $query->with('users');
            $query = $query->whereDate('created_at',$today);
            
            $query = $query->orderBy('id','desc')->skip($start)->take($pageSize)->get();
            

            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }

        return view('admin.quote.today',$data);
    }
    public function all_quotes(Request $request)
    {
        $data['top_title'] = "All Quotation Records | Digitizing Portal";
        $data['page_title'] = "All Quotation Records";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Quotation::Query();
            $totalCount=$query->count();
            $query = $query->with('users');
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->get();
            

            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }

        return view('admin.quote.all',$data);
    }
    //Quotation Records Ends
    //Order Records Starts
    public function today_orders(Request $request)
    {
        $data['top_title'] = "Today's Order Records | Digitizing Portal";
        $data['page_title'] = "Today's Order Records";
        $today = Carbon::now()->format('Y-m-d');

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Order::Query();
            $totalCount=$query->count();
            $query = $query->with('users');
            $query = $query->whereDate('created_at',$today);
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->get();
            

            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }

        return view('admin.order.today',$data);
    }
    public function all_orders(Request $request)
    {
        $data['top_title'] = "All Order Records | Digitizing Portal";
        $data['page_title'] = "All Order Records";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Order::Query();
            $totalCount=$query->count();
            $query = $query->with('users');
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->get();
            

            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }

        return view('admin.order.all',$data);
    }
    //Order Records Ends
    //Vector Records Starts
    public function today_vectors(Request $request)
    {
        $data['top_title'] = "Today's Vector Records | Digitizing Portal";
        $data['page_title'] = "Today's Vector Records";
        $today = Carbon::now()->format('Y-m-d');

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Vector::Query();
            $totalCount=$query->count();
            $query = $query->with('users');
            $query = $query->whereDate('created_at',$today);
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->get();
            

            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }

        return view('admin.vector.today',$data);
    }
    
    public function all_vectors(Request $request)
    {
        $data['top_title'] = "All Vector Records | Digitizing Portal";
        $data['page_title'] = "All Vector Records";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=Vector::Query();
            $totalCount=$query->count();
            $query = $query->with('users');
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->get();
            

            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }

        return view('admin.vector.all',$data);
    }
    //Vector Records Ends
    
    
    
    // ORDER WORK USMAN
    public function order_detail($id)
    {
        $data['top_title'] = "Order Detail | Digitizing Portal";
        $data['page_title'] = "Order Details";
        $data['order'] = Order::find(base64_decode($id));
        $data['order_file'] = FileTransfer::where('source_number', base64_decode($id))->where('type', 'order')->first();
        return view('admin.order.detail',$data);
    }
    
    public function order_process($id)
    {
        $data['top_title'] = "Order Process | Digitizing Portal";
        $data['page_title'] = "Order Process";
        $data['order'] = Order::find(base64_decode($id));
        return view('admin.order.process',$data);
    }
    
    public function order_process_info(Request $request)
    {
        $order = Order::find($request->id);
        $order->price = $request->price;
        $order->admin_instruction = $request->admin_inst;
        $order->width = $request->width;
        $order->height = $request->height;
        $order->status = $request->status;
        $order->save();
        $notify[] = ['success', 'Order Updated successfully.'];
        return back()->withNotify($notify);
    }
    
    public function order_process_file(Request $request)
    {
        $order = Order::find($request->id);
        
        FileTransfer::where('source_number', $request->id)->where('type', 'order')->delete();
        $filename_list = [];
        if ($request->hasFile('files')) 
        {
            $files = $request->file('files');
            $i = 0;
            foreach($files as $file)
            {
                $i++;
                $filename = time() . '_' . $i.'.' . $file->getClientOriginalExtension();
                $directory = 'app-assets/files/order_files/';
                $filename_list[] = $filename;

                // Store the file with the custom name
                $path = $file->move($directory, $filename);                
            }
        }
        
        $file = new FileTransfer();
        $file->type = "order";
        $file->source_number = $order->id;
        $file->files = json_encode($filename_list);
        $file->added_by = Auth::guard('admin')->user()->id;
        $file->save();
        
        $notify[] = ['success', 'Order Updated successfully.'];
        return back()->withNotify($notify);
    }
    // ORDER WORK USMAN
    
    
    
    
    // VECTOR WORK USMAN
    public function vector_detail($id)
    {
        $data['top_title'] = "Vector Detail | Digitizing Portal";
        $data['page_title'] = "Vector Details";
        $data['order'] = Vector::find(base64_decode($id));
        $data['order_file'] = FileTransfer::where('source_number', base64_decode($id))->where('type', 'vector')->first();
        return view('admin.vector.detail',$data);
    }
    
    public function vector_process($id)
    {
        $data['top_title'] = "Vector Process | Digitizing Portal";
        $data['page_title'] = "Vector Process";
        $data['order'] = Vector::find(base64_decode($id));
        return view('admin.vector.process',$data);
    }
    
    public function vector_process_info(Request $request)
    {
        $order = Vector::find($request->id);
        $order->price = $request->price;
        $order->admin_instruction = $request->admin_inst;
        $order->status = $request->status;
        $order->save();
        $notify[] = ['success', 'Vector Updated successfully.'];
        return back()->withNotify($notify);
    }
    
    public function vector_process_file(Request $request)
    {
        $order = Vector::find($request->id);
        
        FileTransfer::where('source_number', $request->id)->where('type', 'vector')->delete();
        $filename_list = [];
        if ($request->hasFile('files')) 
        {
            $files = $request->file('files');
            $i = 0;
            foreach($files as $file)
            {
                $i++;
                $filename = time() . '_' . $i.'.' . $file->getClientOriginalExtension();
                $directory = 'app-assets/files/order_files/';
                $filename_list[] = $filename;

                // Store the file with the custom name
                $path = $file->move($directory, $filename);                
            }
        }
        
        $file = new FileTransfer();
        $file->type = "vector";
        $file->source_number = $order->id;
        $file->files = json_encode($filename_list);
        $file->added_by = Auth::guard('admin')->user()->id;
        $file->save();
        
        $notify[] = ['success', 'Vector Updated successfully.'];
        return back()->withNotify($notify);
    }
    // VECTOR WORK USMAN
    
    
    
    
    // QUOTE WORK USMAN
    public function quote_detail($id)
    {
        $data['top_title'] = "Quotation Detail | Digitizing Portal";
        $data['page_title'] = "Quotation Details";
        $data['order'] = Quotation::find(base64_decode($id));
        $data['order_file'] = FileTransfer::where('source_number', base64_decode($id))->where('type', 'quote')->first();
        return view('admin.quote.detail',$data);
    }
    
    public function quote_process($id)
    {
        $data['top_title'] = "Quotation Process | Digitizing Portal";
        $data['page_title'] = "Quotation Process";
        $data['order'] = Quotation::find(base64_decode($id));
        return view('admin.quote.process',$data);
    }
    
    public function quote_process_info(Request $request)
    {
        $order = Quotation::find($request->id);
        $order->price = $request->price;
        $order->admin_instruction = $request->admin_inst;
        $order->width = $request->width;
        $order->height = $request->height;
        $order->status = $request->status;
        $order->save();
        $notify[] = ['success', 'Quotation Updated successfully.'];
        return back()->withNotify($notify);
    }
    
    public function quote_process_file(Request $request)
    {
        $order = Quotation::find($request->id);
        
        FileTransfer::where('source_number', $request->id)->where('type', 'quote')->delete();
        $filename_list = [];
        if ($request->hasFile('files')) 
        {
            $files = $request->file('files');
            $i = 0;
            foreach($files as $file)
            {
                $i++;
                $filename = time() . '_' . $i.'.' . $file->getClientOriginalExtension();
                $directory = 'app-assets/files/quotation_files/';
                $filename_list[] = $filename;

                // Store the file with the custom name
                $path = $file->move($directory, $filename);                
            }
        }
        
        $file = new FileTransfer();
        $file->type = "quote";
        $file->source_number = $order->id;
        $file->files = json_encode($filename_list);
        $file->added_by = Auth::guard('admin')->user()->id;
        $file->save();
        
        $notify[] = ['success', 'Quotation Updated successfully.'];
        return back()->withNotify($notify);
    }
    // QUOTE WORK USMAN
    
    
    
}
