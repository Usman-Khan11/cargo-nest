<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GlBill;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GlBillController extends Controller
{
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = GlBill::Query();
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['seo_title']      = "Bill";
        $data['seo_desc']       = "Bill";
        $data['seo_keywords']   = "Bill";
        $data['page_title'] = "Bill";
        return view('admin.gl_bill.create', $data);
    }

    public function delete($id)
    {
        $developer = GlBill::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'GL Bill Deleted Successfully.'];
        return back()->withNotify($notify);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            // 'name' => ['required', 'string', 'max:255', 'alpha', 'unique:commodities'],
        ]);

        $gl_bill = new GlBill();
        $gl_bill->fill($request->all());
        $gl_bill->save();

        $notify[] = ['success', 'GL Bill Added Successfully.'];
        return redirect()->route('admin.gl_bill.create')->withNotify($notify);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        $gl_bill = GlBill::where("id", $request->id)->first();
        $gl_bill->inactive = $request->inactive ? $request->inactive : '';
        $gl_bill->fill($request->all());
        $gl_bill->update();

        $notify[] = ['success', 'GL Bill Updated Successfully.'];
        return redirect()->route('admin.gl_bill.create')->withNotify($notify);
    }


    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;

        if ($type == "first") {
            $data = GlBill::orderBy('id', 'asc')->first();
        } else if ($type == "last") {
            $data = GlBill::orderBy('id', 'desc')->first();
        } else if ($type == "forward") {
            $data = GlBill::where('id', '>', $id)->first();
        } else if ($type == "backward") {
            $data = GlBill::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }

        return $data;
    }
}
