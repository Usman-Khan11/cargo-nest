<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingAgencyLicense;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;

class ShippingAgencyLicenseController extends Controller
{
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = ShippingAgencyLicense::Query();
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['seo_title']      = "Shipping Agency License";
        $data['seo_desc']       = "Shipping Agency License";
        $data['seo_keywords']   = "Shipping Agency License";
        $data['page_title']     = "Shipping Agency License";

        return view('admin.ship_agency_license.create', $data);
    }

    public function delete($id)
    {
        ShippingAgencyLicense::where("id", $id)->delete();

        $notify[] = ['success', 'Deleted Successfully.'];
        return redirect()->route('admin.ship_agency_license.create')->withNotify($notify);
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:100|unique:shipping_agency_license',
            'name' => 'required|string|max:255',
            'license_prefix' => 'required|string|max:200',
            'epass_code' => 'nullable|string|max:200',
            'contact_person' => 'nullable|string|max:100',
            'tell_no' => 'nullable|string|max:20',
            'fax' => 'nullable|string|max:20',
            'mobile_no' => 'nullable|string|max:20',
            'email' => 'nullable|string|email|max:150',
            'website' => 'nullable|string|max:200',
            'address_1' => 'nullable|string',
            'address_2' => 'nullable|string',
            'address_3' => 'nullable|string',
        ]);

        $ship_agency_license = new ShippingAgencyLicense();
        $ship_agency_license->code = $request->code;
        $ship_agency_license->name = $request->name;
        $ship_agency_license->license_prefix = $request->license_prefix;
        $ship_agency_license->epass_code = $request->epass_code;
        $ship_agency_license->contact_person = $request->contact_person;
        $ship_agency_license->tell_no = $request->tell_no;
        $ship_agency_license->fax = $request->fax;
        $ship_agency_license->mobile_no = $request->mobile_no;
        $ship_agency_license->email = $request->email;
        $ship_agency_license->website = $request->website;
        $ship_agency_license->address_1 = $request->address_1;
        $ship_agency_license->address_2 = $request->address_2;
        $ship_agency_license->address_3 = $request->address_3;
        $ship_agency_license->default = (isset($request->default)) ? $request->default : 0;

        $arr = [];
        $terminal_code = $request->terminal_code;
        if ($terminal_code) {
            foreach ($terminal_code as $key => $value) {
                $arr[$value] = [
                    "terminal_code" => $request->terminal_code[$key],
                    "terminal_name" => $request->terminal_name[$key],
                    "sub_company"   => $request->sub_company[$key],
                    "agency_code"   => $request->agency_code[$key]
                ];
            }
        }

        $ship_agency_license->lists = $arr;
        $ship_agency_license->save();

        $notify[] = ['success', 'Shipping Agency License Added Successfully.'];
        return redirect()->route('admin.ship_agency_license.create')->withNotify($notify);
    }

    public function update(Request $request)
    {
        $request->validate([
            'code' => [
                'required',
                'string',
                'max:100',
                Rule::unique('shipping_agency_license')->ignore($request->id),
            ],
            'name' => 'required|string|max:255',
            'license_prefix' => 'required|string|max:200',
            'epass_code' => 'nullable|string|max:200',
            'contact_person' => 'nullable|string|max:100',
            'tell_no' => 'nullable|string|max:20',
            'fax' => 'nullable|string|max:20',
            'mobile_no' => 'nullable|string|max:20',
            'email' => 'nullable|string|email|max:150',
            'website' => 'nullable|string|max:200',
            'address_1' => 'nullable|string',
            'address_2' => 'nullable|string',
            'address_3' => 'nullable|string',
        ]);

        $ship_agency_license = ShippingAgencyLicense::find($request->id);
        $ship_agency_license->code = $request->code;
        $ship_agency_license->name = $request->name;
        $ship_agency_license->license_prefix = $request->license_prefix;
        $ship_agency_license->epass_code = $request->epass_code;
        $ship_agency_license->contact_person = $request->contact_person;
        $ship_agency_license->tell_no = $request->tell_no;
        $ship_agency_license->fax = $request->fax;
        $ship_agency_license->mobile_no = $request->mobile_no;
        $ship_agency_license->email = $request->email;
        $ship_agency_license->website = $request->website;
        $ship_agency_license->address_1 = $request->address_1;
        $ship_agency_license->address_2 = $request->address_2;
        $ship_agency_license->address_3 = $request->address_3;
        $ship_agency_license->default = (isset($request->default)) ? $request->default : 0;

        $arr = [];
        $terminal_code = $request->terminal_code;
        if ($terminal_code) {
            foreach ($terminal_code as $key => $value) {
                $arr[$value] = [
                    "terminal_code" => $request->terminal_code[$key],
                    "terminal_name" => $request->terminal_name[$key],
                    "sub_company"   => $request->sub_company[$key],
                    "agency_code"   => $request->agency_code[$key]
                ];
            }
        }

        $ship_agency_license->lists = $arr;
        $ship_agency_license->save();

        $notify[] = ['success', 'Shipping Agency License Updated Successfully.'];
        return redirect()->route('admin.ship_agency_license.create')->withNotify($notify);
    }

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $arr = [
            "ship_agency_license" => [],
        ];

        $data = ShippingAgencyLicense::Query();

        if ($type == "first") {
            $data = $data->orderBy('id', 'asc');
        } else if ($type == "last") {
            $data = $data->orderBy('id', 'desc');
        } else if ($type == "forward") {
            $data = $data->where('id', '>', $id);
        } else if ($type == "backward") {
            $data = $data->where('id', '<', $id)->orderBy('id', 'desc');
        }

        $arr["ship_agency_license"] = $data->first();

        return $arr;
    }

    public function getAllData(Request $request)
    {
        if (isset($request->type) && $request->type == 'get_ship_agency_license') {
            $search_term = $request->search;
            $data = ShippingAgencyLicense::Where(function ($query) use ($search_term) {
                $query->where('code', 'like', "%$search_term%")
                    ->orWhere('name', 'like', "%$search_term%")
                    ->orWhere('license_prefix', 'like', "%$search_term%")
                    ->orWhere('email', 'like', "%$search_term%");
            })
                ->select(["id", "name as text"])->get();
            return $data;
        }
    }
}
