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
        $this->name = "Global Container Inventory";
        $this->nav_id = 5;
    }

    public function create(Request $request)
    {
        $user_info = session()->get('user_info');
        checkPermissions('view', $this->nav_id, $user_info['role_id'], $user_info['user_id']);

        $data['seo_title']    = "Global Container Inventory";
        $data['seo_desc']     = "Global Container Inventory";
        $data['seo_keywords'] = "Global Container Inventory";
        $data['page_title']   = "Global Container Inventory";

        if ($request->ajax()) {
            $query = ContainerMovement::with([
                'container',
                'destination_agent',
                'loc_from',
                'loc_to',
                'vessel',
                'voyage',
                'created_by_user'
            ]);
            $query = $query->latest()->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['containers'] = Ctrk::with(['sizetype', 'principals'])->where('show_on_gci', 1)->latest()->get();
        return view('admin.container_movements.create', $data);
    }

    public function delete($id)
    {
        $user_info = session()->get('user_info');
        checkPermissions('delete', $this->nav_id, $user_info['role_id'], $user_info['user_id']);

        ContainerMovement::where("id", $id)->delete();
        $notify[] = ['success', 'Global Container Inventory Deleted Successfully.'];
        return redirect()->route('admin.container_movement.create')->withNotify($notify);
    }

    public function store(Request $request)
    {
        $user_info = session()->get('user_info');
        checkPermissions('add', $this->nav_id, $user_info['role_id'], $user_info['user_id']);

        $request->validate([
            'container_id' => 'required|integer|exists:ctrk,id',
            'container_size' => 'required|string|max:100',
            'container_principal' => 'required|string|max:100',
            'destination_principal' => 'required|string|max:100',
            'location_from' => 'required|string|max:150',
            'location_to' => 'required|string|max:150',
            'arrival_date' => 'nullable|date',
            'departure_date' => 'nullable|date',
            'empty_return' => 'nullable|date',
            'empty_out' => 'nullable|date',
            'status' => 'nullable|string|max:50',
            'bl_no' => 'nullable|string|max:150',
            'free_days' => 'nullable|integer|max:99|min:0',
            'vessel_id' => 'required|integer|exists:vessels,id',
            'voyage_id' => 'required|integer|exists:voyages,id',
        ]);

        $container_movement = new ContainerMovement();
        $container_movement->fill($request->all());
        $container_movement->save();

        $notify[] = ['success', 'Global Container Inventory Added Successfully.'];
        return back()->withNotify($notify);
    }

    public function update(Request $request)
    {
        $user_info = session()->get('user_info');
        checkPermissions('edit', $this->nav_id, $user_info['role_id'], $user_info['user_id']);

        $request->validate([
            'container_id' => 'required|integer|exists:ctrk,id',
            'container_size' => 'required|string|max:100',
            'container_principal' => 'required|string|max:100',
            'destination_principal' => 'required|string|max:100',
            'location_from' => 'required|string|max:150',
            'location_to' => 'required|string|max:150',
            'arrival_date' => 'nullable|date',
            'departure_date' => 'nullable|date',
            'empty_return' => 'nullable|date',
            'empty_out' => 'nullable|date',
            'status' => 'nullable|string|max:50',
            'bl_no' => 'nullable|string|max:150',
            'free_days' => 'nullable|integer|max:99|min:0',
            'vessel_id' => 'required|integer|exists:vessels,id',
            'voyage_id' => 'required|integer|exists:voyages,id',
        ]);

        $container_movement = ContainerMovement::find($request->id);
        $created_by = $container_movement->created_by;
        $container_movement->fill($request->all());
        $container_movement->created_by = $created_by;
        $container_movement->save();

        $notify[] = ['success', 'Global Container Inventory Updated Successfully.'];
        return back()->withNotify($notify);
    }

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = ContainerMovement::with([
            'container',
            'destination_agent',
            'loc_from',
            'loc_to',
            'vessel',
            'voyage',
            'created_by_user'
        ]);

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
