<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlTemplateController extends Controller
{
    public function create(Request $request)
    {
        $data['seo_title']      = "B/L Template";
        $data['seo_desc']       = "B/L Template";
        $data['seo_keywords']   = "B/L Template";
        $data['page_title'] = "B/L Template";

        return view('admin.bl_template.create', $data);
    }
}
