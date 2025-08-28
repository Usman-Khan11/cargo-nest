<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountIntegratePartyParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AccountIntegratePartyParentController extends Controller
{
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = AccountIntegratePartyParent::with(['account', 'city']);
            $query = $query->latest()->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['seo_title']    = "Account Integration Party Parent";
        $data['seo_desc']     = "Account Integration Party Parent";
        $data['seo_keywords'] = "Account Integration Party Parent";
        $data['page_title']   = "Account Integration Party Parent";
        return view('admin.account_integrate.party_parent', $data);
    }

    public function delete($id)
    {
        AccountIntegratePartyParent::where("id", $id)->delete();
        $notify[] = ['success', 'Party Parent Deleted Successfully.'];
        return back()->withNotify($notify);
    }

    private function party_parent_validation($request)
    {
        $request->validate([
            'account_id'   => 'required|integer|exists:chart_accounts,id',
            'city_id'      => 'required|integer|exists:locations,id',
            'job_type'     => 'required|string|max:30',
            'party_type'   => 'nullable|string|max:30',
            'operation'    => 'required|string|max:30',
            'sub_type'     => 'required|string|max:30',
        ]);
    }

    public function store(Request $request)
    {
        $user_info = session()->get('user_info');
        $this->party_parent_validation($request);

        try {
            DB::beginTransaction();

            $party_parent = new AccountIntegratePartyParent();
            $party_parent->fill($request->all());
            $party_parent->save();

            DB::commit();
            $notify[] = ['success', 'Party Parent created successfully.'];
            return redirect()->route('admin.account_integrate_party_parent.create')->withNotify($notify);
        } catch (\Exception $e) {
            DB::rollBack();
            $notify[] = ['error', $e->getLine() . ': ' . $e->getMessage()];
            return back()->withInput()->withNotify($notify);
        }
    }

    public function update(Request $request)
    {
        $user_info = session()->get('user_info');
        $this->party_parent_validation($request);

        try {
            DB::beginTransaction();

            $party_parent = AccountIntegratePartyParent::where('id', $request->id)->firstOrFail();
            $party_parent->fill($request->all());
            $party_parent->save();

            DB::commit();
            $notify[] = ['success', 'Party Parent updated successfully.'];
            return redirect()->route('admin.account_integrate_party_parent.create')->withNotify($notify);
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
        $data = AccountIntegratePartyParent::with(['account', 'city']);

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
