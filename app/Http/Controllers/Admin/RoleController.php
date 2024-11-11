<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Validator;
use Carbon\Carbon;
use Session;
use DataTables;
use App\Models\User;
use App\Models\Nav;
use App\Models\NavKey;
use App\Models\NavPermission;
use App\Models\Admin;
use App\Models\AdminRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    public function create(Request $request)
    {
        if ($request->ajax()) {
            
            if(isset($request->nav_id) && isset($request->role_id)) {
                $arr = [];
                $n = NavKey::where('nav_id', $request->nav_id)->get();
                foreach($n as $nn){
                    $b = '';
                    $d = NavPermission::where('nav_id', $request->nav_id)->where('nav_key_id', $nn->id)->where('role_id', $request->role_id)->first();
                    if($d) $b = 'checked';
                    $arr[$nn->value] = [$nn->id, $nn->key, $b];
                }
                
                return $arr;
            }
            
            $query = AdminRole::Query();
            $query = $query->orderby('id','asc')->get();
            return Datatables::of($query)->addIndexColumn()->make(true);
        }
        
        $data['seo_title']      = "Security Role";
        $data['seo_desc']       = "Security Role";
        $data['seo_keywords']   = "Security Role";
        $data['page_title'] = "Security Role";
        return view('admin.security_role.create', $data);
    }
    
    public function delete($id)
    {
        $developer = AdminRole::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Security Role Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);
       
        $role = new AdminRole();
        $role->name = $request->name;
        $role->save();
        
        $notify[] = ['success', 'Security Role Added Successfully.'];
        return redirect()->route('admin.security_role.create')->withNotify($notify);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);
        
        $role = AdminRole::where("id", $request->id)->first();
        $role->name = $request->name;
        $role->save();
        
        $notify[] = ['success', 'Security Role Updated Successfully.'];
        return redirect()->route('admin.security_role.create')->withNotify($notify);
    }
    
    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = null;
        
        if($type == "first") {
            $data = AdminRole::orderBy('id', 'asc')->first();
        }
        else if($type == "last") {
            $data = AdminRole::orderBy('id', 'desc')->first();
        }
        else if($type == "forward") {
            $data = AdminRole::where('id', '>', $id)->first();
        }
        else if($type == "backward") {
            $data = AdminRole::where('id', '<', $id)->orderBy('id', 'desc')->first();
        }
        
        return $data;
    }
}
