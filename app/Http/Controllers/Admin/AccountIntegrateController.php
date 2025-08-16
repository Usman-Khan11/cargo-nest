<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountIntegrationParentAccount;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AccountIntegrateController extends Controller
{
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = AccountIntegrationParentAccount::Query();
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['seo_title']      = "Account Integration";
        $data['seo_desc']       = "Account Integration";
        $data['seo_keywords']   = "Account Integration";
        $data['page_title'] = "Account Integration";
        return view('admin.account_integrate.create', $data);
    }

    public function delete($id)
    {
        $developer = AccountIntegrationParentAccount::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Account Integration Deleted Successfully.'];
        return back()->withNotify($notify);
    }

    private function parent_accounts_validation($request)
    {
        $request->validate([
            'vendor_city_id' => 'nullable|integer|exists:locations,id',
            'vendor_account_id' => 'nullable|integer|exists:chart_accounts,id',
            'vendor_all_city_acc_id' => 'nullable|integer|exists:chart_accounts,id',
        ]);
    }

    public function store(Request $request)
    {
        $this->parent_accounts_validation($request);

        $accountintegrate = new AccountIntegrationParentAccount();
        $accountintegrate->fill($request->all());
        $accountintegrate->save();

        $notify[] = ['success', 'Account Integration Added Successfully.'];
        return redirect()->route('admin.account_integrate.create')->withNotify($notify);
    }

    public function update(Request $request)
    {
        $this->parent_accounts_validation($request);

        $accountintegrate = AccountIntegrationParentAccount::where("id", $request->id)->first();
        $accountintegrate->inactive = $request->inactive ? $request->inactive : '';
        $accountintegrate->fill($request->all());
        $accountintegrate->update();

        $notify[] = ['success', 'Account Integration Updated Successfully.'];
        return redirect()->route('admin.account_integrate.create')->withNotify($notify);
    }


    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;

        if ($type == "first") {
            $data = AccountIntegrationParentAccount::orderBy('id', 'asc')->first();
        } else if ($type == "last") {
            $data = AccountIntegrationParentAccount::orderBy('id', 'desc')->first();
        } else if ($type == "forward") {
            $data = AccountIntegrationParentAccount::where('id', '>', $id)->first();
        } else if ($type == "backward") {
            $data = AccountIntegrationParentAccount::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }

        return $data;
    }
}
