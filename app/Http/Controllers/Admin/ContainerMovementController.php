<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContainerMovement;
use App\Models\Ctrk;
use App\Models\Location;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContainerMovementController extends Controller
{
    protected $permissions;
    protected $name;
    protected $nav_id;

    public function __construct()
    {
        $this->name = "Container Movement";
        $this->nav_id = 5;
    }

    public function create(Request $request)
    {
        $user_info = session()->get('user_info');
        checkPermissions('view', $this->nav_id, $user_info['role_id'], $user_info['user_id']);

        $data['seo_title']    = "Container Movement";
        $data['seo_desc']     = "Container Movement";
        $data['seo_keywords'] = "Container Movement";
        $data['page_title']   = "Container Movement";

        if ($request->ajax()) {
            $query = ContainerMovement::with(['container', 'created_by_user']);
            $query = $query->latest()->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['containers'] = Ctrk::with(['sizetype', 'principals'])->latest()->get();
        return view('admin.container_movements.create', $data);
    }

    public function delete($id)
    {
        $user_info = session()->get('user_info');
        checkPermissions('delete', $this->nav_id, $user_info['role_id'], $user_info['user_id']);

        ContainerMovement::where("id", $id)->delete();
        $notify[] = ['success', 'Container Movement Deleted Successfully.'];
        return redirect()->route('admin.container_movement.create')->withNotify($notify);
    }

    public function store(Request $request)
    {
        $user_info = session()->get('user_info');
        checkPermissions('add', $this->nav_id, $user_info['role_id'], $user_info['user_id']);

        $request->validate([
            'container_id' => 'required|string|max:150',
            'container_size' => 'required|string|max:100',
            'container_principal' => 'required|string|max:100',
            'destination_principal' => 'required|string|max:100',
            'location_from' => 'required|string|max:150',
            'location_to' => 'required|string|max:150',
            'arrival_date' => 'required|date',
            'departure_date' => 'required|date',
            'status' => 'required|string|max:50',
        ]);

        $container_movement = new ContainerMovement();
        $container_movement->fill($request->all());
        $container_movement->save();

        $notify[] = ['success', 'Container Movement Added Successfully.'];
        return back()->withNotify($notify);
    }

    public function update(Request $request)
    {
        $user_info = session()->get('user_info');
        checkPermissions('edit', $this->nav_id, $user_info['role_id'], $user_info['user_id']);

        $request->validate([
            'container_id' => 'required|string|max:150',
            'container_size' => 'required|string|max:100',
            'container_principal' => 'required|string|max:100',
            'destination_principal' => 'required|string|max:100',
            'location_from' => 'required|string|max:150',
            'location_to' => 'required|string|max:150',
            'arrival_date' => 'required|date',
            'departure_date' => 'required|date',
            'status' => 'required|string|max:50',
        ]);

        $container_movement = ContainerMovement::find($request->id);
        $created_by = $container_movement->created_by;
        $container_movement->fill($request->all());
        $container_movement->created_by = $created_by;
        $container_movement->save();

        $notify[] = ['success', 'Container Movement Updated Successfully.'];
        return back()->withNotify($notify);
    }

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = ContainerMovement::Query();

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
