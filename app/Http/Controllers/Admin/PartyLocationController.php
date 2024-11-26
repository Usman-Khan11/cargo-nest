<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PartyLocation;
use Yajra\DataTables\Facades\DataTables;
use Validator;

class PartyLocationController extends Controller
{
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = PartyLocation::Query();
            $query = $query->orderby('id', 'asc')->with('city', 'party')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['seo_title']      = "Party Location";
        $data['seo_desc']       = "Party Location";
        $data['seo_keywords']   = "Party Location";
        $data['page_title'] = "Party Location";
        return view('admin.party_location.create', $data);
    }

    public function edit($id)
    {
        $data['seo_title']      = "Edit Party Location";
        $data['seo_desc']       = "Edit Party Location";
        $data['seo_keywords']   = "Edit Party Location";
        $data['page_title'] = "Edit Party Location";
        $data['party'] = PartyLocation::where("id", $id)->first();
        return view('admin.party_location.edit', $data);
    }

    public function delete($id)
    {
        PartyLocation::where("id", $id)->delete();

        $notify[] = ['success', 'Party Location Deleted Successfully.'];
        return redirect()->route('admin.party_location.create')->withNotify($notify);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'location_name' => ['required', 'string', 'max:255', 'unique:party_location'],

        ]);

        $party_location = new PartyLocation();
        $party_location->code = $request->code;
        $party_location->location_name = $request->location_name;
        $party_location->short_name = $request->short_name;
        $party_location->contact_person = $request->contact_person;
        $party_location->city = $request->city;
        $party_location->address = $request->address;
        $party_location->state = $request->state;
        $party_location->zipcode = $request->zipcode;
        $party_location->phone = $request->phone;
        $party_location->mobile = $request->mobile;
        $party_location->email = $request->email;
        $party_location->website = $request->website;
        $party_location->facsimile = $request->facsimile;
        $party_location->codeco = $request->codeco;
        $party_location->party_code = $request->party_code;
        $party_location->party = $request->party;
        $party_location->Type = ($request->Type);
        $party_location->sender = $request->sender;
        $party_location->remarks = $request->remarks;
        $party_location->lp_header = $request->lp_header;
        $party_location->empty_remarks = $request->empty_remarks;
        $party_location->save();

        $notify[] = ['success', 'Party Location Added Successfully.'];
        return redirect()->route('admin.party_location.create')->withNotify($notify);
    }


    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'location_name' => 'required',
        ]);

        $party_location = PartyLocation::where("id", $request->id)->first();
        $party_location->code = $request->code;
        $party_location->location_name = $request->location_name;
        $party_location->short_name = $request->short_name;
        $party_location->contact_person = $request->contact_person;
        $party_location->city = $request->city;
        $party_location->address = $request->address;
        $party_location->state = $request->state;
        $party_location->zipcode = $request->zipcode;
        $party_location->phone = $request->phone;
        $party_location->mobile = $request->mobile;
        $party_location->email = $request->email;
        $party_location->website = $request->website;
        $party_location->facsimile = $request->facsimile;
        $party_location->codeco = $request->codeco;
        $party_location->party_code = $request->party_code;
        $party_location->party = $request->party;
        $party_location->Type = ($request->Type);
        $party_location->sender = $request->sender;
        $party_location->remarks = $request->remarks;
        $party_location->lp_header = $request->lp_header;
        $party_location->empty_remarks = $request->empty_remarks;
        $party_location->update();

        $notify[] = ['success', 'Party Location Updated Successfully.'];
        return redirect()->route('admin.party_location.create')->withNotify($notify);
    }

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = PartyLocation::Query();

        if ($type == "first") {
            $data = $data->orderBy('id', 'asc');
        } else if ($type == "last") {
            $data = $data->orderBy('id', 'desc');
        } else if ($type == "forward") {
            $data = $data->where('id', '>', $id);
        } else if ($type == "backward") {
            $data = $data->where('id', '<', $id)->orderBy('id', 'desc');
        }

        $data = $data->with(
            'city',
            'party'
        )->first();

        return $data;
    }

    public function getAllData(Request $request)
    {
        if (isset($request->type) && $request->type == 'get_terminal_location') {
            $search_term = $request->search;
            $data = PartyLocation::Where(function ($query) use ($search_term) {
                $query->where('location_name', 'like', "%$search_term%")
                    ->orWhere('code', 'like', "%$search_term%");
            })
                ->where('Type', 'like', '%Terminel%')
                ->select(["id", "location_name as text"])->get();
            return $data;
        }

        if (isset($request->type) && $request->type == 'get_pickup_location') {
            $search_term = $request->search;
            $data = PartyLocation::Where(function ($query) use ($search_term) {
                $query->where('location_name', 'like', "%$search_term%")
                    ->orWhere('code', 'like', "%$search_term%");
            })
                ->where('Type', 'like', '%Container-Pick-Drop-Loc%')
                ->select(["id", "location_name as text"])->get();
            return $data;
        }

        if (isset($request->type) && $request->type == 'get_empty_depot') {
            $search_term = $request->search;
            $data = PartyLocation::Where(function ($query) use ($search_term) {
                $query->where('location_name', 'like', "%$search_term%")
                    ->orWhere('code', 'like', "%$search_term%");
            })
                ->where('Type', 'like', '%Container-Depot%')
                ->select(["id", "location_name as text"])->get();
            return $data;
        }
    }
}
