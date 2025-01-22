<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
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

class LocationController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data['seo_title']      = "Location";
    //     $data['seo_desc']       = "Location";
    //     $data['seo_keywords']   = "Location";
    //     $data['page_title'] = "Location";

    //     if ($request->ajax()) {
    //         $totalCount=0;
    //         $recordsFiltered=0;
    //         $pageSize = (int)($request->length) ? $request->length : 10;
    //         $start=(int)($request->start) ? $request->start : 0;
    //         $query=Location::Query();
    //         $totalCount=$query->count(); 

    //         $query = $query->orderby('id','desc')->skip($start)->take($pageSize)->latest()->get();

    //         return Datatables::of($query)
    //             ->setOffset($start)->addIndexColumn()
    //             ->with(['recordsTotal'=>$totalCount])
    //             ->make(true);
    //     }
    //     return view('admin.location.index', $data);
    // }


    public function create(Request $request)
    {
        if ($request->ajax()) {
            $length = (int)($request->limit) ? $request->limit : 15;
            $start  = (int)($request->offset) ? $request->offset : 0;

            $query = Location::Query();

            if (isset($request->search_country)) {
                $country = Location::find($request->search_country);
                $query = $query->where('code', 'like', $country->code . '%');
            }
            if (isset($request->search_city)) {
                $query = $query->where('location', 'like', '%' . $request->search_city . '%');
            }

            $totalCount = $query->count();
            $query = $query->orderBy('id', 'asc')->skip($start)->take($length)->get();
            return Datatables::of($query)->addIndexColumn()->setTotalRecords($totalCount)->make(true);
        }

        // $data['location_num'] = Location::orderby('id','desc')->first();
        // if($data['location_num']) {
        //     $data['location_num'] = $data['location_num']->code + 1;
        // } else {
        //     $data['location_num'] = 1;
        // }

        $data['seo_title']      = "Location";
        $data['seo_desc']       = "Location";
        $data['seo_keywords']   = "Location";
        $data['page_title'] = "Location";
        $data['countries'] = Location::where('location_check', 'like', '%country%')->select(["id", "location as text"])->get();
        $data['countries'] = $data['countries']->toArray();
        return view('admin.location.create', $data);
    }

    public function edit($id)
    {
        $data['seo_title']      = "Edit Location";
        $data['seo_desc']       = "Edit Location";
        $data['seo_keywords']   = "Edit Location";
        $data['page_title'] = "Edit Location";
        $data['location'] = Location::where("id", $id)->first();
        return view('admin.location.edit', $data);
    }

    public function delete($id)
    {
        $developer = Location::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Location Deleted Successfully.'];
        return redirect()->route('admin.location.create')->withNotify($notify);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'location' => ['required', 'string', 'max:225', 'unique:locations'],
            'location_check' => 'required',
        ]);

        $location = new Location();
        $location->code = $request->code;
        $location->location = $request->location;
        $location->location_check = ($request->location_check);
        $location->co_ordinates = $request->co_ordinates;
        $location->inactive = $request->inactive;
        $location->latitude = $request->latitude;
        $location->state = $request->state;
        $location->longitude = $request->longitude;
        $location->phone_prefix = $request->phone_prefix;
        $location->epass_code = $request->epass_code;
        $location->country_region = $request->country_region;

        // $location->fill($request->all());
        $location->save();

        $notify[] = ['success', 'Location Added Successfully.'];
        return redirect()->route('admin.location.create')->withNotify($notify);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'location' => 'required',
            //'location_check' => 'required',
        ]);

        $location = Location::where("id", $request->id)->first();
        $location->inactive = $request->inactive ? $request->inactive : '';
        $location->fill($request->all());
        $location->save();

        $notify[] = ['success', 'Location Updated Successfully.'];
        return redirect()->route('admin.location.create')->withNotify($notify);
    }

    public function bulkUpload(Request $request)
    {
        $file = $request->file('import_file');
        $tempPath = $file->getPathname();
        $extension = $file->getClientOriginalExtension();
        $i = 0;

        if ($extension == "csv") {
            $handle = fopen($tempPath, 'r');
            while (($line = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($i >= 0) {

                    $chk = Location::where('location', strtolower($line[3]))->count();
                    if ($chk == 0) {

                        $code = $line[1] . $line[2];
                        $loc = null;
                        if (!empty($line[2])) {
                            $loc = json_encode(["city"]);
                        } else {
                            $loc = json_encode(["country"]);
                        }

                        $location = new Location();
                        $location->code = $code;
                        $location->location = $line[3];
                        $location->location_check = $loc;
                        $location->co_ordinates = $line[10];
                        $location->save();
                    }
                }
                $i++;
            }
            fclose($handle);
            return ['success', 'Upload Successfully.'];
        } else {
            return ['error', 'Only csv file allowed.'];
        }

        return ['error', 'Something went wrong!'];
    }

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;

        if ($type == "first") {
            $data = Location::orderBy('id', 'asc')->first();
        } else if ($type == "last") {
            $data = Location::orderBy('id', 'desc')->first();
        } else if ($type == "forward") {
            $data = Location::where('id', '>', $id)->first();
        } else if ($type == "backward") {
            $data = Location::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }

        return $data;
    }

    public function getAllData(Request $request)
    {
        if (isset($request->type) && $request->type == 'get_location') {
            $search_term = $request->search;
            $data = Location::where('code', 'like', "%$search_term%")
                ->orWhere('location', 'like', "%$search_term%")
                ->select('id', DB::raw('CONCAT(location) as text'))
                ->take(50)->get();
            return $data;
        }

        if (isset($request->type) && $request->type == 'get_local_port') {
            $search_term = $request->search;
            $data = Location::Where(function ($query) use ($search_term) {
                $query->where('location', 'like', "%$search_term%")
                    ->orWhere('code', 'like', "%$search_term%");
            })->where('location_check', 'like', '%seaport%')
                ->select('id', DB::raw('CONCAT(location) as text'))
                ->take(50)->get();
            return $data;
        }

        if (isset($request->type) && $request->type == 'get_city') {
            $search_term = $request->search;
            $data = Location::Where(function ($query) use ($search_term) {
                $query->where('location', 'like', "%$search_term%")
                    ->orWhere('code', 'like', "%$search_term%");
            })->where('location_check', 'like', '%city%')
                ->select('id', DB::raw('CONCAT(location) as text'))
                ->take(50)->get();
            return $data;
        }

        if (isset($request->type) && $request->type == 'get_country') {
            $search_term = $request->search;
            $data = Location::Where(function ($query) use ($search_term) {
                $query->where('location', 'like', "%$search_term%")
                    ->orWhere('code', 'like', "%$search_term%");
            })->where('location_check', 'like', '%country%')
                ->select('id', DB::raw('CONCAT(location) as text'))
                ->take(50)->get();
            return $data;
        }
    }
}
