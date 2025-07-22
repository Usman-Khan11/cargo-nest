<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ctrk;
use App\Models\Equipment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminNotification;
use App\Models\PartyBasicInfo;
use Image;
use Validator;
use Session;
use File;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class CtrkController extends Controller
{
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = ctrk::with(['sizetype', 'principals']);
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['seo_title']      = "Ctrk Container";
        $data['seo_desc']       = "Ctrk Container";
        $data['seo_keywords']   = "Ctrk Container";
        $data['page_title'] = "Ctrk Container";
        $data['equipments'] = Equipment::get();
        $data['principals'] = PartyBasicInfo::where('Type', 'like', '%Principal%')->get();
        return view('admin.ctrk.create', $data);
    }

    public function edit($id)
    {
        $data['seo_title']      = "Edit Ctrk Container";
        $data['seo_desc']       = "Edit Ctrk Container";
        $data['seo_keywords']   = "Edit Ctrk Container";
        $data['page_title'] = "Edit Ctrk Container";
        $data['ctrk'] = Ctrk::where("id", $id)->first();
        return view('admin.ctrk.edit', $data);
    }

    public function delete($id)
    {
        $developer = Ctrk::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Ctrk Container Deleted Successfully.'];
        return redirect()->route('admin.ctrk.create')->withNotify($notify);
    }

    public function store(Request $request)
    {
        $request->validate([
            'container_no' => ['required', 'string', 'max:150', 'unique:ctrk'],
            'size_type'    => ['required', 'exists:equipment,id'],
            'yom'          => ['nullable', 'string', 'max:100'],
            'weight_limit' => ['nullable', 'numeric'],
            'principal'    => ['required', 'exists:party_basic_infos,id'],
            'top'          => ['nullable', 'string', 'max:100'],
            'right'        => ['nullable', 'string', 'max:100'],
            'left'         => ['nullable', 'string', 'max:100'],
            'front'        => ['nullable', 'string', 'max:100'],
            'back'         => ['nullable', 'string', 'max:100'],
            'remarks'      => ['nullable', 'string', 'max:1000'],
        ]);

        $ctrk = new Ctrk();
        $ctrk->fill($request->all());
        $ctrk->save();

        $notify[] = ['success', 'Ctrk Container Added Successfully.'];
        return back()->withNotify($notify);
    }

    public function update(Request $request)
    {
        $request->validate([
            'container_no' => [
                'required',
                'string',
                'max:150',
                Rule::unique('ctrk')->ignore($request->id),
            ],
            'size_type'    => ['required', 'exists:equipment,id'],
            'yom'          => ['nullable', 'string', 'max:100'],
            'weight_limit' => ['nullable', 'numeric'],
            'principal'    => ['required', 'exists:party_basic_infos,id'],
            'top'          => ['nullable', 'string', 'max:100'],
            'right'        => ['nullable', 'string', 'max:100'],
            'left'         => ['nullable', 'string', 'max:100'],
            'front'        => ['nullable', 'string', 'max:100'],
            'back'         => ['nullable', 'string', 'max:100'],
            'remarks'      => ['nullable', 'string', 'max:1000'],
        ]);

        $ctrk = Ctrk::where("id", $request->id)->first();
        $ctrk->fill($request->all());
        $ctrk->save();

        $notify[] = ['success', 'Ctrk Container Updated Successfully.'];
        return redirect()->route('admin.ctrk.create')->withNotify($notify);
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

                    $chk = Ctrk::where('container_no', strtolower($line[0]))->count();
                    if ($chk == 0) {
                        $ctrk = new Ctrk();
                        $ctrk->container_no = $line[0];
                        $ctrk->size_type = $line[1];
                        $ctrk->yom = $line[2];
                        $ctrk->weight_limit = $line[3];
                        $ctrk->principal = $line[4];
                        $ctrk->principal_code = $line[5];
                        $ctrk->top = $line[6];
                        $ctrk->right = $line[7];
                        $ctrk->left = $line[8];
                        $ctrk->front = $line[9];
                        $ctrk->back = $line[10];
                        $ctrk->remarks = $line[11];
                        $ctrk->save();
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
            $data = Ctrk::orderBy('id', 'asc')->first();
        } else if ($type == "last") {
            $data = Ctrk::orderBy('id', 'desc')->first();
        } else if ($type == "forward") {
            $data = Ctrk::where('id', '>', $id)->first();
        } else if ($type == "backward") {
            $data = Ctrk::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }

        return $data;
    }
}
