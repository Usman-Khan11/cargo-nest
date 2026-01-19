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

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = [];
        // $data = AccountIntegrationCharges::with(['charges', 'account']);

        if ($type == "first") {
            $data = $data->orderBy('id', 'asc');
        } else if ($type == "last") {
            $data = $data->orderBy('id', 'desc');
        } else if ($type == "forward") {
            $data = $data->where('id', '>', $id);
        } else if ($type == "backward") {
            $data = $data->where('id', '<', $id)->orderBy('id', 'desc');
        }

        return response()->json([
            'success' => 1,
            'data' => view('admin.si_job.partials.form', $data)->render()
        ]);
    }
}
