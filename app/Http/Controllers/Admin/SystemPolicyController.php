<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocsCompanyWise;
use App\Models\SubCompany;
use App\Models\SystemPolicy;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SystemPolicyController extends Controller
{
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = SystemPolicy::Query();
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['seo_title']      = "System Policy";
        $data['seo_desc']       = "System Policy";
        $data['seo_keywords']   = "System Policy";
        $data['page_title'] = "System Policy";
        $data['companies'] = SubCompany::get();
        return view('admin.system_policy.create', $data);
    }

    public function delete($id)
    {
        $system_policy = SystemPolicy::where("id", $id);
        $system_policy->delete();
        $notify[] = ['success', 'System Policy Deleted Successfully.'];
        return back()->withNotify($notify);
    }

    public function store(Request $request)
    {
        $type = $request->type;
        if ($type == "system_policy") {
            $request->validate([
                'element' => ['required', 'string', 'max:255'],
                'value' => ['nullable', 'string', 'max:20']
            ]);

            $system_policy = new SystemPolicy();
            $system_policy->element = $request->element;
            $system_policy->value = $request->value;
            $system_policy->save();

            $notify[] = ['success', 'System Policy Added Successfully.'];
            return redirect()->route('admin.system_policy.create')->withNotify($notify);
        } else if ($type == "docs_company_wise") {
            $request->validate([
                'document' => ['required', 'string', 'max:255'],
                'company_id' => ['required', 'integer'],
                'fiscal_year' => ['required', 'string', 'max:200'],
                'prefix' => ['required', 'string', 'max:30'],
                'no_seperator' => ['required', 'string', 'max:10'],
                'suffix' => ['required', 'string', 'max:30'],
                'start_no' => ['nullable', 'string', 'max:50'],
                'last_no' => ['nullable', 'string', 'max:50'],
            ]);

            $docs_company_wise = new DocsCompanyWise();
            $docs_company_wise->document = $request->document;
            $docs_company_wise->company_id = $request->company_id;
            $docs_company_wise->fiscal_year = $request->fiscal_year;
            $docs_company_wise->prefix = $request->prefix;
            $docs_company_wise->no_seperator = $request->no_seperator;
            $docs_company_wise->suffix = $request->suffix;
            $docs_company_wise->start_no = $request->start_no;
            $docs_company_wise->last_no = $request->last_no;
            $docs_company_wise->save();

            $notify[] = ['success', 'Document Company Wise Added Successfully.'];
            return redirect()->route('admin.system_policy.create')->withNotify($notify);
        }

        $notify[] = ['error', 'Invalid Request.'];
        return back()->withNotify($notify);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'element' => ['required', 'string', 'max:255'],
            'value' => ['nullable', 'string', 'max:20']
        ]);

        $system_policy = SystemPolicy::where("id", $request->id)->first();
        $system_policy->element = $request->element;
        $system_policy->value = $request->value;
        $system_policy->save();

        $notify[] = ['success', 'System Policy Updated Successfully.'];
        return redirect()->route('admin.system_policy.create')->withNotify($notify);
    }

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;

        $query = SystemPolicy::query();
        if ($type === "first") {
            $query->orderBy('id', 'asc');
        } elseif ($type === "last") {
            $query->orderBy('id', 'desc');
        } elseif ($type === "forward") {
            $query->where('id', '>', $id);
        } elseif ($type === "backward") {
            $query->where('id', '<', $id)->orderBy('id', 'desc');
        }

        return $query->first();
    }
}
