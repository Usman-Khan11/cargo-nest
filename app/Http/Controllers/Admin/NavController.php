<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nav;
use App\Models\NavKey;
use App\Models\AdminRole;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class NavController extends Controller
{
    protected $parents;

    function __construct()
    {
        $this->parents = [
            "general_ledger" => "General Ledger",
            "sea_export" => "Sea Export",
            "sea_import" => "Sea Import",
            "container_inventary" => "Container Inventary",
            "principal_account" => "Principal Account",
            "crm" => "CRM",
            "depo" => "Depo",
            "edi" => "Edi",
            "utilities" => "Utilities",
            "payroll" => "Payroll",
            "setups" => "Setups",
            "common" => "Common",
        ];
    }

    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = Nav::Query();
            $query = $query->with('nav_key');
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['seo_title']      = "Navigation";
        $data['seo_desc']       = "Navigation";
        $data['seo_keywords']   = "Navigation";
        $data['page_title'] = "Navigation";
        $data['parents'] = $this->parents;
        return view('admin.nav.create', $data);
    }

    public function delete($id)
    {
        $developer = AdminRole::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Navigation Deleted Successfully.'];
        return back()->withNotify($notify);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:50',
            'key'    => 'required|string|max:50|unique:navs,key',
            'slug'   => 'required|string|max:100',
            'parent' => 'required|string|max:20',
            'type'   => 'required|string|max:20',
        ]);

        $nav = new Nav();
        $nav->name = $request->name;
        $nav->key = $request->key;
        $nav->slug = $request->slug;
        $nav->parent = $request->parent;
        $nav->type = $request->type;

        $keys = $request->keys;
        if ($nav->save() && $keys) {
            foreach ($keys as $k => $v) {
                $nav_key = new NavKey();
                $nav_key->nav_id = $nav->id;
                $nav_key->key = $v;
                $nav_key->value = GenerateSlug($v);
                $nav_key->save();
            }
        }

        $notify[] = ['success', 'Navigation Added Successfully.'];
        return redirect()->route('admin.nav.create')->withNotify($notify);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:50',
            'key'    => [
                'required',
                'string',
                'max:50',
                Rule::unique('navs', 'key')->ignore($request->id),
            ],
            'slug'   => 'required|string|max:100',
            'parent' => 'required|string|max:20',
            'type'   => 'required|string|max:20',
        ]);

        $nav = Nav::where("id", $request->id)->first();
        $nav->name = $request->name;
        $nav->key = $request->key;
        $nav->slug = $request->slug;
        $nav->parent = $request->parent;
        $nav->type = $request->type;

        $keys = $request->keys ?? [];
        if ($nav->save() && $keys) {
            $key_ids = [];

            foreach ($keys as $k => $v) {
                $nav_key_id = $request->keys_id[$k] ?? 0;
                $nav_key = NavKey::find($nav_key_id) ?? new NavKey();

                $nav_key->nav_id = $nav->id;
                $nav_key->key = $v;
                $nav_key->value = GenerateSlug($v);
                $nav_key->save();

                $key_ids[] = $nav_key->id;
            }

            NavKey::where('nav_id', $nav->id)->whereNotIn('id', $key_ids)->delete();


            // NavKey::where('nav_id', $nav->id)->delete();
            // foreach ($keys as $k => $v) {
            //     $nav_key_id = $request->keys_id[$k] ?? null;
            //     $nav_key = NavKey::where('id', $nav_key_id)->first();
            //     if (!$nav_key) {
            //         $nav_key = new NavKey();
            //         if ($nav_key_id) {
            //             $nav_key->id = $request->keys_id[$k];
            //         }
            //     }
            //     $nav_key->nav_id = $nav->id;
            //     $nav_key->key = $v;
            //     $nav_key->value = GenerateSlug($v);
            //     $nav_key->save();
            // }
        }

        $notify[] = ['success', 'Navigation Updated Successfully.'];
        return redirect()->route('admin.nav.create')->withNotify($notify);
    }

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;

        if ($type == "first") {
            $data = Nav::with('nav_key')->orderBy('id', 'asc')->first();
        } else if ($type == "last") {
            $data = Nav::with('nav_key')->orderBy('id', 'desc')->first();
        } else if ($type == "forward") {
            $data = Nav::where('id', '>', $id)->with('nav_key')->first();
        } else if ($type == "backward") {
            $data = Nav::where('id', '<', $id)->with('nav_key')->orderBy('id', 'desc')->first();
        }

        return $data;
    }
}
