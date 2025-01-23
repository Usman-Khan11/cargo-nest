<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Validator;
use Carbon\Carbon;
use Session;
use App\Models\User;
use App\Models\Admin;
use App\Models\AdminRight;
use App\Models\AdminRole;
use App\Models\Role;
use App\Models\SubCompany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class ManageUserController extends Controller
{
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $query = Admin::Query();
            $query = $query->where('id', '!=', 1);
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['seo_title']      = "User Setup";
        $data['seo_desc']       = "User Setup";
        $data['seo_keywords']   = "User Setup";
        $data['page_title'] = "User Setup";

        $data['companies'] = SubCompany::all();
        $data['roles'] = AdminRole::all();

        return view('admin.user.create', $data);
    }

    public function user_right_create(Request $request)
    {
        if ($request->ajax()) {
            $query = AdminRight::Query();
            $query = $query->with('admin');
            $query = $query->orderby('id', 'asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }

        $data['seo_title']      = "User Right";
        $data['seo_desc']       = "User Right";
        $data['seo_keywords']   = "User Right";
        $data['page_title'] = "User Right";

        $data['companies'] = SubCompany::all();
        $data['users'] = Admin::where('id', '!=', 1)->select(["id", "name as text"])->orderBy('name', 'asc')->get();
        $data['users'] = $data['users']->toArray();

        return view('admin.user.user_right_create', $data);
    }

    public function delete($id)
    {
        $developer = Admin::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'User Deleted Successfully.'];
        return back()->withNotify($notify);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:25', 'unique:admins'],
            'email' => ['required', 'string', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'max:20'],
        ]);

        $user = new Admin();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->security_que = $request->security_que;
        $user->security_ans = $request->security_ans;
        $user->status = (isset($request->status)) ? 1 : 0;
        $user->acount_block = (isset($request->acount_block)) ? 1 : 0;
        $user->company_id = $request->company_id;
        $user->role_id = $request->role_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $directory = 'assets/upload/';
            $path = $file->move($directory, $filename);
            $user->image = $directory . $filename;
        }

        $user->save();

        $notify[] = ['success', 'User Added Successfully.'];
        return redirect()->route('admin.user.create')->withNotify($notify);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'max:20'],
        ]);

        $user = Admin::where("id", $request->id)->first();
        $user->name = $request->name;
        $user->username = $request->username;
        if (!empty($user->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->security_que = $request->security_que;
        $user->security_ans = $request->security_ans;
        $user->status = (isset($request->status)) ? 1 : 0;
        $user->acount_block = (isset($request->acount_block)) ? 1 : 0;
        $user->company_id = $request->company_id;
        $user->role_id = $request->role_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $directory = 'assets/upload/';
            $path = $file->move($directory, $filename);
            $user->image = $directory . $filename;
        }

        $user->save();

        $notify[] = ['success', 'User Updated Successfully.'];
        return redirect()->route('admin.user.create')->withNotify($notify);
    }

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;

        if ($type == "first") {
            $data = Admin::where('id', '!=', 1)->orderBy('id', 'asc')->first();
        } else if ($type == "last") {
            $data = Admin::where('id', '!=', 1)->orderBy('id', 'desc')->first();
        } else if ($type == "forward") {
            $data = Admin::where('id', '!=', 1)->where('id', '>', $id)->first();
        } else if ($type == "backward") {
            $data = Admin::where('id', '!=', 1)->where('id', '<', $id)->orderBy('id', 'desc')->first();
        }

        return $data;
    }

    public function user_right_store(Request $request)
    {
        $validated = $request->validate([
            'admin_id' => ['required']
        ]);

        $user = new AdminRight();
        $user->admin_id = $request->admin_id;
        $user->remark = $request->remark;
        $user->cost_center = $request->cost_center;
        $user->default_company = $request->default_company;
        $user->default_departure = $request->default_departure;
        $user->default_sale_rep = $request->default_sale_rep;
        $user->restrict_company = (isset($request->restrict_company)) ? 1 : 0;

        if ($request->hasFile('sign')) {
            $file = $request->file('sign');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $directory = 'assets/upload/';
            $path = $file->move($directory, $filename);
            $user->sign = $path;
        }

        if ($request->hasFile('sign_with_img')) {
            $file = $request->file('sign_with_img');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $directory = 'assets/upload/';
            $path = $file->move($directory, $filename);
            $user->sign_with_img = $path;
        }

        $user->save();

        $notify[] = ['success', 'User Right Added Successfully.'];
        return redirect()->route('admin.user_right.create')->withNotify($notify);
    }

    public function user_right_update(Request $request)
    {
        $validated = $request->validate([
            'admin_id' => ['required']
        ]);

        $user = AdminRight::find($request->id);
        $user->admin_id = $request->admin_id;
        $user->remark = $request->remark;
        $user->cost_center = $request->cost_center;
        $user->default_company = $request->default_company;
        $user->default_departure = $request->default_departure;
        $user->default_sale_rep = $request->default_sale_rep;
        $user->restrict_company = (isset($request->restrict_company)) ? 1 : 0;

        if ($request->hasFile('sign')) {
            $file = $request->file('sign');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $directory = 'assets/upload/';
            $path = $file->move($directory, $filename);
            $user->sign = $path;
        }

        if ($request->hasFile('sign_with_img')) {
            $file = $request->file('sign_with_img');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $directory = 'assets/upload/';
            $path = $file->move($directory, $filename);
            $user->sign_with_img = $path;
        }

        $user->save();

        $notify[] = ['success', 'User Right Updated Successfully.'];
        return redirect()->route('admin.user_right.create')->withNotify($notify);
    }

    public function user_right_get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;

        if ($type == "first") {
            $data = AdminRight::with('admin')->orderBy('id', 'asc')->first();
        } else if ($type == "last") {
            $data = AdminRight::with('admin')->orderBy('id', 'desc')->first();
        } else if ($type == "forward") {
            $data = AdminRight::where('id', '>', $id)->with('admin')->first();
        } else if ($type == "backward") {
            $data = AdminRight::where('id', '<', $id)->with('admin')->orderBy('id', 'desc')->first();
        }

        return $data;
    }
}
