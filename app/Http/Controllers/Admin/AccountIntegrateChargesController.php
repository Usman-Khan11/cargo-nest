<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountIntegrationCharges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AccountIntegrateChargesController extends Controller
{
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = AccountIntegrationCharges::with(['charges', 'account']);
            $query = $query->latest()->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['seo_title']    = "Account Integration Charges";
        $data['seo_desc']     = "Account Integration Charges";
        $data['seo_keywords'] = "Account Integration Charges";
        $data['page_title']   = "Account Integration Charges";
        return view('admin.account_integrate.charges', $data);
    }

    public function delete($id)
    {
        AccountIntegrationCharges::where("id", $id)->delete();
        $notify[] = ['success', 'Charges Deleted Successfully.'];
        return back()->withNotify($notify);
    }

    private function charges_validation($request)
    {
        $request->validate([
            'charges_id'   => 'required|integer|exists:charges,id',
            'account_id'   => 'required|integer|exists:chart_accounts,id',
            'job_type'     => 'required|string|max:30',
            'account_type' => 'nullable|string|max:30',
            'operation'    => 'required|string|max:30',
            'sub_type'     => 'required|string|max:30',
        ]);
    }

    public function store(Request $request)
    {
        $user_info = session()->get('user_info');
        $this->charges_validation($request);

        try {
            DB::beginTransaction();

            $charges = new AccountIntegrationCharges();
            $charges->fill($request->all());
            $charges->save();

            DB::commit();
            $notify[] = ['success', 'Charges created successfully.'];
            return redirect()->route('admin.account_integrate_charges.create')->withNotify($notify);
        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['error', $e->getLine() . ': ' . $e->getMessage()];
            return back()->withInput()->withNotify($notify);
        }
    }

    public function update(Request $request)
    {
        $user_info = session()->get('user_info');
        $this->charges_validation($request);

        try {
            DB::beginTransaction();

            DB::commit();
            $notify[] = ['success', 'Charges updated successfully.'];
            return redirect()->route('admin.account_integrate_charges.create')->withNotify($notify);
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
        $data = AccountIntegrationCharges::with(['charges', 'account']);

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
