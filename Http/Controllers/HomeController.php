<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;

class HomeController extends Controller
{
    
    public function __construct() {}
    
    public function index()
    {
        $data['top_title'] = "Edit Card |";
        $data['page_title'] = "Edit Card";
        return view('home', $data);
    }
    
    public function home()
    {
        $GeneralSetting = GeneralSetting::first();
        $data['seo_title']      = $GeneralSetting->meta_title;
        $data['seo_desc']       = $GeneralSetting->meta_desc;
        $data['seo_keywords']   = $GeneralSetting->meta_keywords;
        $data['page_title'] = "Home";
        return view('index', $data);
    }
}
