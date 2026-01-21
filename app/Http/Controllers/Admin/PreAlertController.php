<?php

namespace App\Http\Controllers\Admin;

use App\Models\PreAlertInput;
use App\Models\PreAlertInputRow;
use Illuminate\Http\Request;

class PreAlertController extends AppBaseController
{
    public function index(Request $request)
    {
        $data['seo_title']    = "Pre Alert Input";
        $data['seo_desc']     = "Pre Alert Input";
        $data['seo_keywords'] = "Pre Alert Input";
        $data['page_title']   = "Pre Alert Input";

        return view('admin.pre_alert_input.index', $data);
    }

    public function delete($id)
    {
        $pre_alert_input = PreAlertInput::where('id', $id)->first();

        if ($pre_alert_input) {
            PreAlertInputRow::where('pre_alert_input_id', $pre_alert_input->id)->delete();
            $pre_alert_input->delete();

            return true;
        }

        return false;
    }

    public function store(Request $request)
    {
        $request->validate([
            'tran_no'           => 'required',
            'overseas_agent_id' => 'required|exists:party_basic_infos,id',
            'vessel_id'         => 'required|exists:vessels,id',
            'voyage_id'         => 'required|exists:voyages,id',

            'row.*.container_id' => 'nullable|exists:vessels,id',
            'row.*.size_type_id' => 'nullable|exists:vessels,id',
            'row.*.rate_group'   => 'nullable|string|max:100',
            'row.*.principal_id' => 'nullable|exists:vessels,id',
        ]);

        $pre_alert_input = PreAlertInput::where('id', $request->id)->first() ?? new PreAlertInput();
        $pre_alert_input->tran_no = $request->tran_no;
        $pre_alert_input->overseas_agent_id = $request->overseas_agent_id;
        $pre_alert_input->vessel_id = $request->vessel_id;
        $pre_alert_input->voyage_id = $request->voyage_id;
        $pre_alert_input->is_filter = $request->is_filter ?? 0;
        $pre_alert_input->save();

        $rows = $request->row ?? [];
        $ids = [];

        foreach ($rows as $key => $value) {
            $pre_alert_input_row = PreAlertInputRow::where('id', $value['id'])->first() ?? new PreAlertInputRow();
            $pre_alert_input_row->pre_alert_input_id = $pre_alert_input->id;
            $pre_alert_input_row->soc = $value['soc'] ?? 0;
            $pre_alert_input_row->part_fcl = $value['part_fcl'] ?? 0;
            $pre_alert_input_row->container_id = $value['container_id'] ?? 0;
            $pre_alert_input_row->size_type_id = $value['size_type_id'] ?? 0;
            $pre_alert_input_row->rate_group = $value['rate_group'];
            $pre_alert_input_row->principal_id = $value['principal_id'] ?? 0;
            $pre_alert_input_row->save();

            $ids[] = $pre_alert_input_row->id;
        }

        PreAlertInputRow::where('pre_alert_input_id', $pre_alert_input->id)->whereNotIn('id', $ids)->delete();

        $msg = $request->id > 0 ? 'Pre Alert Updated Successfully.' : 'Pre Alert Added Successfully.';
        return $this->sendSuccess($msg, [
            'id' => $pre_alert_input->id
        ]);
    }

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;

        // Reset form
        if ($type == "reset") {
            return $this->sendResponse(view('admin.pre_alert_input.partials.form', ['data' => []])->render());
        }

        // Delete form data
        if ($type == "delete") {
            if ($this->delete($id)) {
                return $this->sendResponse(view('admin.pre_alert_input.partials.form', ['data' => []])->render());
            }

            return $this->sendResponse(null, 'Something went wrong.', 404);
        }

        // Fetch form data
        $data = PreAlertInput::with([
            'overseas_agent',
            'vessel',
            'vessel.voyages',
            'voyage',
            'rows',
            'rows.container',
            'rows.size_type',
            'rows.principal'
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

        $data = $data->first();

        if ($data) {
            return $this->sendResponse(
                view('admin.pre_alert_input.partials.form', ['data' => $data->toArray()])->render()
            );
        }

        return $this->sendResponse(null, 'Record not found.');
    }
}
