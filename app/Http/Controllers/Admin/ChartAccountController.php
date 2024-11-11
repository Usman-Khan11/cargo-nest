<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ChartAccount;
use App\Models\PartyAccountDetail;
use Image;
use Validator;
use Session;
use DataTables;
use File;

class ChartAccountController extends Controller
{
    public function create(Request $request)
    {
        if ($request->ajax()) {
            if (isset($request->type) && $request->type == 'get_parent_acc') {
                $search_term = $request->search;
                $data = ChartAccount::where('acc_code', 'like', "%$search_term%")->orWhere('title', 'like', "%$search_term%")->select('id', DB::raw('CONCAT(title) as text'))->get();
                return $data;
            }

            if (isset($request->get_party)) {
                $arr = ["party" => null, "chart_account" => null];
                $arr["party"] = PartyAccountDetail::where('account', $request->get_party)->with('party_basic_id')->get();
                $arr["chart_account"] = ChartAccount::where('id', $request->get_party)->with('parent_acc')->first();
                return $arr;
            }

            if (isset($request->get_account)) {
                $d = ChartAccount::where('id', $request->get_account)->with('parent_acc')->first();
                return $d;
            }

            if (isset($request->getSeries)) {
                return $this->getSeries($request->getSeries);
            }
        }

        $data['code'] = ChartAccount::whereNull('parent_acc')->latest()->first();
        if ($data['code']) {
            $data['code'] = $data['code']->acc_code + 1;
        } else {
            $data['code'] = 1;
        }

        $data['seo_title']      = "Chart Of Account";
        $data['seo_desc']       = "Chart Of Account";
        $data['seo_keywords']   = "Chart Of Account";
        $data['page_title'] = "Chart Of Account";
        return view('admin.chart_account.create', $data);
    }

    public function edit($id)
    {
        $data['seo_title']      = "Edit Chart Of Account";
        $data['seo_desc']       = "Edit Chart Of Account";
        $data['seo_keywords']   = "Edit Chart Of Account";
        $data['page_title'] = "Edit Chart Of Account";
        $data['chartaccount'] = ChartAccount::where("id", $id)->first();
        return view('admin.chart_account.edit', $data);
    }

    public function delete($id)
    {
        $chartaccount = ChartAccount::where("id", $id);
        $d = ChartAccount::where("parent_acc", $id)->count();

        if ($d > 0) {
            $notify[] = ['error', 'This account contains childs.'];
            return back()->withNotify($notify);
        }

        $chartaccount->delete();
        $notify[] = ['success', 'Chart Of Account Deleted Successfully.'];
        return back()->withNotify($notify);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'acc_code' => ['required', 'string', 'max:25', 'unique:chart_accounts']
        ]);

        $chartaccount = new ChartAccount();

        $get = ChartAccount::where('id', $request->parent_acc)->first();
        if ($get && $get->allow_voucher_entry == 1) {
            $notify[] = ['error', 'Voucher enter is enabled of this account.'];
            return back()->withNotify($notify);
        }

        $arr = [];
        $short_name = $request->short_name;
        if ($short_name) {
            foreach ($short_name as $k => $v) {
                $arr[$v] = $request->company[$k];
            }
        }

        $chartaccount->fill($request->all());
        $chartaccount->details = $arr;
        $chartaccount->save();

        $notify[] = ['success', 'Chart Of Account Added Successfully.'];
        return redirect()->route('admin.chart_account.create')->withNotify($notify);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'acc_code' => ['required', 'string', 'max:25']
        ]);

        $chartaccount = ChartAccount::where("id", $request->id)->first();
        $chartaccount->fill($request->all());
        $chartaccount->update();

        $notify[] = ['success', 'Chart Of Account Updated Successfully.'];
        return redirect()->route('admin.chart_account.create')->withNotify($notify);
    }


    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;

        if ($type == "first") {
            $data = ChartAccount::orderBy('id', 'asc')->with('parent_acc')->first();
        } else if ($type == "last") {
            $data = ChartAccount::orderBy('id', 'desc')->with('parent_acc')->first();
        } else if ($type == "forward") {
            $data = ChartAccount::where('id', '>', $id)->with('parent_acc')->first();
        } else if ($type == "backward") {
            $data = ChartAccount::where('id', '<', $id)->orderBy('id', 'desc')->with('parent_acc')->first();
        }

        return $data;
    }

    public function getSeries($series)
    {
        $num = 0;
        $data = ChartAccount::where('id', $series)->first();
        $length = strlen($data->acc_code);

        if ($length == 1) {
            $get_childs = ChartAccount::where('parent_acc', $data->id)->latest()->first();
            if ($get_childs) {
                $num = $get_childs->acc_code + 1;
            } else {
                $num = $data->acc_code . '1';
            }
        }

        if ($length == 2) {
            $get_childs = ChartAccount::where('parent_acc', $data->id)->latest()->first();
            if ($get_childs) {
                $num = $get_childs->acc_code + 1;
            } else {
                $num = $data->acc_code . '01';
            }
        }

        if ($length == 4) {
            $get_childs = ChartAccount::where('parent_acc', $data->id)->latest()->first();
            if ($get_childs) {
                $num = $get_childs->acc_code + 1;
            } else {
                $num = $data->acc_code . '001';
            }
        }

        return $num;
    }

    public function movement(Request $request)
    {
        $account = ChartAccount::where('acc_code', $request->main_acc_code)->first();
        $id = $account->parent_acc;
        $arr = [];

        while ($id != "" || $id != 0) {
            $a = ChartAccount::where('id', $id)->first();
            if ($a) {
                $arr[] = $id;
                $id = $a->parent_acc;
            } else {
                break;
            }
        }

        $new_account = ChartAccount::where('acc_code', $request->new_acc_code)->first();
        if ($new_account && (in_array($new_account->id, $arr) || in_array($new_account->parent_acc, $arr))) {
            $account->parent_acc = $new_account->id;
            $account->acc_code = $this->getSeries($new_account->id);
            $account->save();
        } else {
            $notify[] = ['error', 'Account only move in parent ancestors.'];
            return back()->withNotify($notify);
        }

        $notify[] = ['success', 'Account moved successfully.'];
        return back()->withNotify($notify);
    }
}
