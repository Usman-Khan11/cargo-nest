<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PartyBasicInfo;
use App\Models\PartyOtherInfo;
use App\Models\PartyAccountDetail;
use App\Models\PartyAchBankDetail;
use App\Models\PartyLocalizeKyc;
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

class SeExportController extends Controller
{
    public function index(Request $request)
    {
        $data['seo_title']      = "Job Balancing";
        $data['seo_desc']       = "Job Balancing";
        $data['seo_keywords']   = "Job Balancing";
        $data['page_title'] = "Job Balancing";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=JobBalancing::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.se_export_report.job_balancing', $data);
    }
    public function joblist(Request $request)
    {
        $data['seo_title']      = "Job List";
        $data['seo_desc']       = "Job List";
        $data['seo_keywords']   = "Job List";
        $data['page_title'] = "Job List";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=JobList::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.se_export_report.job_list', $data);
    }
    public function jobwisecontainerlist(Request $request)
    {
        $data['seo_title']      = "Job Wise Container List";
        $data['seo_desc']       = "Job Wise Container List";
        $data['seo_keywords']   = "Job Wise Container List";
        $data['page_title'] = "Job Wise Container List";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=JobWiseContainerList::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.se_export_report.job_wise_cont_list', $data);
    }
    
    public function chargeswisejobreport(Request $request)
    {
        $data['seo_title']      = "Charges Wise Job Report";
        $data['seo_desc']       = "Charges Wise Job Report";
        $data['seo_keywords']   = "Charges Wise Job Report";
        $data['page_title'] = "Charges Wise Job Report";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=ChargesWiseJobReport::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.se_export_report.charges_wise_job_report', $data);
    }
    
    public function loadinglist(Request $request)
    {
        $data['seo_title']      = "Loading list";
        $data['seo_desc']       = "Loading list";
        $data['seo_keywords']   = "Loading list";
        $data['page_title'] = "Loading list";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=LoadingList::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.se_export_report.loading_list', $data);
    }
    
    public function jobstatistics(Request $request)
    {
        $data['seo_title']      = "Job Statistics";
        $data['seo_desc']       = "Job Statistics";
        $data['seo_keywords']   = "Job Statistics";
        $data['page_title'] = "Job Statistics";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=JobStatistics::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.se_export_report.job_statistics', $data);
    }
    
    public function bookinglist(Request $request)
    {
        $data['seo_title']      = "Booking List";
        $data['seo_desc']       = "Booking List";
        $data['seo_keywords']   = "Booking List";
        $data['page_title'] = "Booking List";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=BookingList::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.se_export_report.booking_list', $data);
    }
    
    public function blreleasestatus(Request $request)
    {
        $data['seo_title']      = "BL Release Status Report";
        $data['seo_desc']       = "BL Release Status Report";
        $data['seo_keywords']   = "BL Release Status Report";
        $data['page_title'] = "BL Release Status Report";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=BlReleaseStatus::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.se_export_report.bl_release_status', $data);
    }
    
    public function debitcredit(Request $request)
    {
        $data['seo_title']      = "Se Debit Credit Note List";
        $data['seo_desc']       = "Se Debit Credit Note List";
        $data['seo_keywords']   = "Se Debit Credit Note List";
        $data['page_title'] = "Se Debit Credit Note List";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=DebitCredit::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.se_export_report.debit_credit', $data);
    }
    
    public function cargomovement(Request $request)
    {
        $data['seo_title']      = "Se Cargo Movement";
        $data['seo_desc']       = "Se Cargo Movement";
        $data['seo_keywords']   = "Se Cargo Movement";
        $data['page_title'] = "Se Cargo Movement";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=CargoMovement::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.se_export_report.cargo_movement', $data);
    }
    
    public function jobprofitloss(Request $request)
    {
        $data['seo_title']      = "Job Profit & Loss Report";
        $data['seo_desc']       = "Job Profit & Loss Report";
        $data['seo_keywords']   = "Job Profit & Loss Report";
        $data['page_title'] = "Job Profit & Loss Report";

        if ($request->ajax()) {
            $totalCount=0;
            $recordsFiltered=0;
            $pageSize = (int)($request->length) ? $request->length : 10;
            $start=(int)($request->start) ? $request->start : 0;
            $query=JobProfitLoss::Query();
            $totalCount=$query->count(); 
            
            $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();
            
            return Datatables::of($query)
                ->setOffset($start)->addIndexColumn()
                ->with(['recordsTotal'=>$totalCount])
                ->make(true);
        }
        return view('admin.se_export_report.job_profit_loss', $data);
    }
    
    
}
