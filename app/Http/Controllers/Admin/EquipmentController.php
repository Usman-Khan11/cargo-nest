<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipment;
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

class EquipmentController extends Controller
{
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = Equipment::Query();
            $query = $query->orderby('id', 'asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }

        $data['seo_title']      = "Equipment Size Type";
        $data['seo_desc']       = "Equipment Size Type";
        $data['seo_keywords']   = "Equipment Size Type";
        $data['page_title'] = "Equipment Size Type";
        return view('admin.equipment.create', $data);
    }

    public function edit($id)
    {
        $data['seo_title']      = "Edit Equipment Size Type";
        $data['seo_desc']       = "Edit Equipment Size Type";
        $data['seo_keywords']   = "Edit Equipment Size Type";
        $data['page_title'] = "Edit Equipment Size Type";
        $data['equipment'] = Equipment::where("id", $id)->first();
        return view('admin.equipment.edit', $data);
    }

    public function delete($id)
    {
        $developer = Equipment::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Equipment Size Type Deleted Successfully.'];
        return back()->withNotify($notify);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'max:225', 'unique:equipment'],
            'size' => ['required', 'string', 'max:100'],
            'type' => ['required', 'string', 'max:225'],
        ]);

        $chk = Equipment::where('code', $request->code)->where('size', $request->size)->where('type', $request->type)->count();
        if ($chk > 0) {
            $notify[] = ['error', 'code, size & type duplicate not allowed!'];
            return back()->withNotify($notify);
        }

        $equipment = new Equipment();
        $equipment->fill($request->all());
        $equipment->save();

        $notify[] = ['success', 'Equipment Size Type Added Successfully.'];
        return redirect()->route('admin.equipment.create')->withNotify($notify);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'size' => 'required',
            'type' => 'required',
        ]);

        $equipment = Equipment::where("id", $request->id)->first();
        $equipment->fill($request->all());
        $equipment->save();

        $notify[] = ['success', 'Equipment Size Type Updated Successfully.'];
        return redirect()->route('admin.equipment.create')->withNotify($notify);
    }


    public function bulkUpload(Request $request)
    {
        $file = $request->file('import_file');
        $tempPath = $file->getPathname();
        $extension = $file->getClientOriginalExtension();
        $i = 0;

        if ($extension == "csv") {
            $handle = fopen($tempPath, 'r');
            while (($line = fgetcsv($handle, 10000, ",")) !== FALSE) {
                if ($i > 0) {
                    $chk_1 = Equipment::where('code', strtolower($line[0]))->count();
                    //$chk_2 = Equipment::where('size', strtolower($line[1]))->count();
                    //$chk_3 = Equipment::where('type', strtolower($line[2]))->count();
                    if ($chk_1 == 0) {
                        $equipment = new Equipment();
                        $equipment->code =    $line[0];
                        $equipment->size =    $line[1];
                        $equipment->type =    $line[2];
                        $equipment->teu =     $line[3];
                        $equipment->old_iso = $line[4];
                        $equipment->iso =     $line[5];
                        $equipment->weight =  $line[6];
                        $equipment->save();
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
            $data = Equipment::orderBy('id', 'asc')->first();
        } else if ($type == "last") {
            $data = Equipment::orderBy('id', 'desc')->first();
        } else if ($type == "forward") {
            $data = Equipment::where('id', '>', $id)->first();
        } else if ($type == "backward") {
            $data = Equipment::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }

        return $data;
    }
}
