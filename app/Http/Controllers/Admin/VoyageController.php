<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voyage;
use App\Models\Vessel;
use App\Models\VoyageDetail;
use App\Models\VoyageLocal;
use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminNotification;
use App\Models\Location;
use Image;
use Validator;
use Session;
use File;
use Yajra\DataTables\Facades\DataTables;

class VoyageController extends Controller
{
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = Voyage::Query();
            $query = $query->with('vessel', 'port_of_loading', 'port_of_discharge');

            if (isset($request->vessel_id)) {
                $query = $query->where('vessel', $request->vessel_id);
            }

            if (isset($request->voyage_name)) {
                $query = $query->where('voy', 'like', '%' . $request->voyage_name . '%');
            }

            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['seo_title']      = "Voyage";
        $data['seo_desc']       = "Voyage";
        $data['seo_keywords']   = "Voyage";
        $data['page_title'] = "Voyage";
        $data['vessels'] = Vessel::select(["id", "vessel_name as text"])->get();
        $data['vessels'] = $data['vessels']->toArray();
        // $data['local_ports'] = Location::where('location_check', 'like', '%city%')
        //     ->select('id', DB::raw('location as text'))
        //     ->get();
        // $data['local_ports'] = $data['local_ports']->toArray();
        $data['currencies'] = Currency::get();
        return view('admin.voyage.create', $data);
    }

    public function edit($id)
    {
        $data['seo_title']      = "Edit Voyage";
        $data['seo_desc']       = "Edit Voyage";
        $data['seo_keywords']   = "Edit Voyage";
        $data['page_title'] = "Edit Voyage";
        $data['voyage'] = Voyage::where("id", $id)->first();
        return view('admin.voyage.edit', $data);
    }

    public function delete($id)
    {
        Voyage::where("id", $id)->delete();
        VoyageLocal::where("voyage_id", $id)->delete();
        VoyageDetail::where("voyage_id", $id)->delete();

        $notify[] = ['success', 'Voyage Deleted Successfully.'];
        return back()->withNotify($notify);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vessel' => 'required',
            'voy' => ['required', 'string', 'max:255', 'unique:voyages'],
        ]);

        $voyage = new Voyage();
        $voyage->fill($request->all());

        if ($voyage->save()) {
            $this->add_voyage_details($request, $voyage->id);
            $this->add_voyage_local_port($request, $voyage->id);
        }

        $notify[] = ['success', 'Voyage Added Successfully.'];
        return redirect()->route('admin.voyage.create')->withNotify($notify);
    }

    public function add_voyage_details($request, $voyage_id)
    {
        $currency = $request->currency;
        if ($currency) {
            VoyageDetail::where("voyage_id", $voyage_id)->delete();
            foreach ($currency as $key => $value) {
                $voyage_detail = new VoyageDetail();
                $voyage_detail->voyage_id = $voyage_id;
                $voyage_detail->currency = $request->currency[$key];
                $voyage_detail->selling = $request->selling[$key];
                $voyage_detail->buying = $request->buying[$key];
                $voyage_detail->save();
            }
        }
    }

    public function add_voyage_local_port($request, $voyage_id)
    {
        $code = $request->code;
        if ($code) {
            VoyageLocal::where("voyage_id", $voyage_id)->delete();
            foreach ($code as $key => $value) {
                $voyage_local = new VoyageLocal();
                $voyage_local->voyage_id = $voyage_id;
                $voyage_local->code = $request->code[$key];
                $voyage_local->local_port = $request->local_port[$key];
                $voyage_local->arrival_date = $request->arrival_date[$key];
                $voyage_local->sailing_date = $request->sailing_date[$key];
                $voyage_local->vir_no = $request->vir_no[$key];
                $voyage_local->egm_no = $request->egm_no[$key];
                $voyage_local->egm_date = $request->egm_date[$key];
                $voyage_local->code2 = $request->code2[$key];
                $voyage_local->slot_operator = $request->slot_operator[$key];
                $voyage_local->scn = $request->scn[$key];
                $voyage_local->sa_code = $request->sa_code[$key];
                $voyage_local->opening_date = $request->opening_date[$key];
                $voyage_local->opening_time = $request->opening_time[$key];
                $voyage_local->closing_date = $request->closing_date[$key];
                $voyage_local->closing_time = $request->closing_time[$key];
                $voyage_local->save();
            }
        }
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'vessel' => 'required',
            'voy' => 'required',
        ]);

        $voyage = Voyage::where("id", $request->id)->first();
        $voyage->fill($request->all());

        if ($voyage->save()) {
            $this->add_voyage_details($request, $voyage->id);
            $this->add_voyage_local_port($request, $voyage->id);
        }

        $notify[] = ['success', 'Voyage Updated Successfully.'];
        return redirect()->route('admin.voyage.create')->withNotify($notify);
    }

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $arr = [
            "voyage" => [],
            "voyage_details" => [],
            "voyage_local_port" => []
        ];

        $data = Voyage::Query();

        if ($type == "first") {
            $data = $data->orderBy('id', 'asc');
        } else if ($type == "last") {
            $data = $data->orderBy('id', 'desc');
        } else if ($type == "forward") {
            $data = $data->where('id', '>', $id);
        } else if ($type == "backward") {
            $data = $data->where('id', '<', $id)->orderBy('id', 'desc');
        }

        $arr["voyage"] = $data->with(
            'vessel',
            'port_of_loading',
            'port_of_discharge'
        )->first();

        $voyage_id = @$arr["voyage"]->id;

        // Voyage Details
        $data = VoyageDetail::Query();
        $data = $data->where("voyage_id", $voyage_id);
        $arr["voyage_details"] = $data->get();

        // Voyage Local Port
        $data = VoyageLocal::Query();
        $data = $data->where("voyage_id", $voyage_id);
        $arr["voyage_local_port"] = $data->with('local_ports')->get();

        return $arr;
    }

    public function getAllData(Request $request)
    {
        if (isset($request->type) && $request->type == 'get_voyage') {
            $search_term = $request->search;
            $data = Voyage::Where(function ($query) use ($search_term) {
                $query->where('voy', 'like', "%$search_term%");
            })
                ->select(["id", "voy as text"])->get();
            return $data;
        }

        if (isset($request->type) && $request->type == 'get_voyages_by_vessels') {
            $data = Voyage::where('vessel', $request->fetch_vessel_voyages)->select(["id", "voy as text"])->latest()->get();
            return $data->toArray();
        }
    }
}
