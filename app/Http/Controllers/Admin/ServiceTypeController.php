<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ServiceTypeController extends Controller
{
    public function create(Request $request)
    {
        $data['seo_title']    = "Service Type";
        $data['seo_desc']     = "Service Type";
        $data['seo_keywords'] = "Service Type";
        $data['page_title']   = "Service Type";

        if ($request->ajax()) {
            $query = ServiceType::Query();
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        return view('admin.service_type.create', $data);
    }

    public function delete($id)
    {
        $service_type = ServiceType::where("id", $id);
        $service_type->delete();

        $notify[] = ['success', 'Service Type Deleted Successfully.'];
        return redirect()->route('admin.service_type.create')->withNotify($notify);
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|max:50|string|unique:service_types,code',
            'name' => 'required|max:250|string',
        ]);

        $service_type = new ServiceType();
        $service_type->code = $request->code;
        $service_type->name = $request->name;
        $service_type->save();

        $notify[] = ['success', 'Service Type Added Successfully.'];
        return redirect()->route('admin.service_type.create')->withNotify($notify);
    }

    public function update(Request $request)
    {
        $request->validate([
            'code' => 'required|max:50|string|unique:service_types,code,' . $request->id,
            'name' => 'required|max:250|string',
        ]);

        $service_type = ServiceType::where('id', $request->id)->first();
        $service_type->code = $request->code;
        $service_type->name = $request->name;
        $service_type->save();

        $notify[] = ['success', 'Service Type Updated Successfully.'];
        return redirect()->route('admin.service_type.create')->withNotify($notify);
    }

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;

        $data = ServiceType::Query();

        if ($type == "first") {
            $data = $data->orderBy('id', 'asc');
        } else if ($type == "last") {
            $data = $data->orderBy('id', 'desc');
        } else if ($type == "forward") {
            $data = $data->where('id', '>', $id);
        } else if ($type == "backward") {
            $data = $data->where('id', '<', $id)->orderBy('id', 'desc');
        }

        return $data->first();
    }

    public function getAllData(Request $request)
    {
        if (isset($request->type) && $request->type == 'get_service_types') {
            $search_term = $request->search;
            $data = ServiceType::where('code', 'like', "%$search_term%")
                ->orWhere('name', 'like', "%$search_term%")
                ->select('id', DB::raw('CONCAT(name) as text'))
                ->take(20)->get();
            return $data;
        }
    }
}
