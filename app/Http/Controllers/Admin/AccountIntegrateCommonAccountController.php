<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountIntegrateCommonAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AccountIntegrateCommonAccountController extends Controller
{
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = AccountIntegrateCommonAccount::with(['account']);
            $query = $query->latest()->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['seo_title']    = "Account Integration Common Account";
        $data['seo_desc']     = "Account Integration Common Account";
        $data['seo_keywords'] = "Account Integration Common Account";
        $data['page_title']   = "Account Integration Common Account";
        return view('admin.account_integrate.common_account', $data);
    }

    public function delete($id)
    {
        AccountIntegrateCommonAccount::where("id", $id)->delete();
        $notify[] = ['success', 'Common Account Deleted Successfully.'];
        return back()->withNotify($notify);
    }

    private function common_account_validation($request)
    {
        $request->validate([
            'account_id'   => 'required|integer|exists:chart_accounts,id',
            'job_type'     => 'required|string|max:30',
            'account_type' => 'required|string|max:30',
            'operation'    => 'required|string|max:30',
            'sub_type'     => 'required|string|max:30',
        ]);
    }

    public function store(Request $request)
    {
        $user_info = session()->get('user_info');
        $this->common_account_validation($request);

        try {
            DB::beginTransaction();

            $common_account = new AccountIntegrateCommonAccount();
            $common_account->fill($request->all());
            $common_account->save();

            DB::commit();
            $notify[] = ['success', 'Common Account created successfully.'];
            return redirect()->route('admin.account_integrate_common_account.create')->withNotify($notify);
        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['error', $e->getLine() . ': ' . $e->getMessage()];
            return back()->withInput()->withNotify($notify);
        }
    }

    public function update(Request $request)
    {
        $user_info = session()->get('user_info');
        $this->common_account_validation($request);

        try {
            DB::beginTransaction();

            $common_account = AccountIntegrateCommonAccount::where('id', $request->id)->firstOrFail();
            $common_account->fill($request->all());
            $common_account->save();

            DB::commit();
            $notify[] = ['success', 'Common Account updated successfully.'];
            return redirect()->route('admin.account_integrate_common_account.create')->withNotify($notify);
        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['error', $e->getLine() . ': ' . $e->getMessage()];
            return back()->withInput()->withNotify($notify);
        }
    }

    public function get_data(Request $request)
    {
        $user_info = session()->get('user_info');
        $id = $request->id;
        $type = $request->type;
        $data = AccountIntegrateCommonAccount::with(['account']);

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
}
