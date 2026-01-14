<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiJobController extends Controller
{
    public function index(Request $request)
    {
        $data['seo_title']    = "Si Job";
        $data['seo_desc']     = "Si Job";
        $data['seo_keywords'] = "Si Job";
        $data['page_title']   = "Si Job";

        return view('admin.si_job.index', $data);
    }
}
