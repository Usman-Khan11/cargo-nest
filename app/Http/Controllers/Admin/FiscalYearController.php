<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FiscalYear;
use App\Models\SubCompany;
use DateTime;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FiscalYearController extends Controller
{
    public function create(Request $request)
    {
        $user_info = session()->get('user_info');

        if ($request->ajax()) {

            if (isset($request->type) && $request->type == "set_default") {
                $fiscal_year = FiscalYear::find($request->id);
                if ($fiscal_year) {
                    $fiscal_year->default = $request->def;
                    $fiscal_year->save();
                }
                return;
            }

            if (isset($request->type) && $request->type == "set_selected") {
                $fiscal_year = FiscalYear::find($request->id);
                if ($fiscal_year) {
                    $fiscal_year->selected = $request->selected;
                    $fiscal_year->save();
                }
                return;
            }

            if (isset($request->type) && $request->type == "generate") {
                $from = $request->from;
                $to = $request->to;
                $period = $request->period;
                $prefixes = range('A', 'Z');
                $prefixCounter = 0;
                $datesArray = [];

                if ($period == "month") {
                    $start = new DateTime($from);
                    $end = new DateTime($to);
                    $end->modify('first day of next month');

                    while ($start < $end) {
                        $firstDay = $start->format('Y-m-01');
                        $lastDay = $start->format('Y-m-t');
                        $prefix = $prefixes[$prefixCounter];
                        $datesArray[] = [
                            'from' => $firstDay,
                            'to' => $lastDay,
                            'prefix' => $prefix
                        ];

                        $start->modify('first day of next month');
                        $prefixCounter++;
                    }
                } else if ($period == "quarter") {
                    $start = new DateTime($from);
                    $end = new DateTime($to);

                    while ($start <= $end) {
                        $firstDay = $start->format('Y-m-01');
                        $quarterEnd = clone $start;
                        $quarterEnd->modify('+2 months');
                        $lastDay = $quarterEnd->format('Y-m-t');

                        if ($lastDay > $to) {
                            $lastDay = $to;
                        }

                        $prefix = $prefixes[$prefixCounter];
                        $datesArray[] = [
                            'from' => $firstDay,
                            'to' => $lastDay,
                            'prefix' => $prefix
                        ];

                        $start->modify('first day of +3 months');
                        $prefixCounter++;
                    }
                }

                return $datesArray;
            }

            $query = FiscalYear::Query();
            $query = $query->with('company');
            $query = $query->orderby('id', 'asc')->get();
            return DataTables::of($query)->addIndexColumn()->make(true);
        }

        $data['seo_title']      = "Fiscal Year";
        $data['seo_desc']       = "Fiscal Year";
        $data['seo_keywords']   = "Fiscal Year";
        $data['page_title'] = "Fiscal Year";
        $data['companies'] = SubCompany::all();
        return view('admin.fiscal_year.create', $data);
    }

    public function delete($id)
    {
        FiscalYear::where("id", $id)->delete();

        $notify[] = ['success', 'Fiscal Year Deleted Successfully.'];
        return redirect()->route('admin.fiscal_year.create')->withNotify($notify);
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'nullable|string|max:1000',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'doc_suffix' => 'nullable|string|max:50',
            'period_base' => 'nullable|string|max:50',
            'company_id' => 'required|integer',
        ]);

        $fiscal_year = new FiscalYear();
        $fiscal_year->description = $request->description;
        $fiscal_year->start_date = $request->start_date;
        $fiscal_year->end_date = $request->end_date;
        $fiscal_year->doc_suffix = $request->doc_suffix;
        $fiscal_year->default = (isset($request->default)) ? 1 : 0;
        $fiscal_year->status = $request->status;
        $fiscal_year->period_base = $request->period_base;
        $fiscal_year->company_id = $request->company_id;
        $fiscal_year->save();

        $notify[] = ['success', 'Fiscal Year Added Successfully.'];
        return redirect()->route('admin.fiscal_year.create')->withNotify($notify);
    }

    public function update(Request $request)
    {
        $request->validate([
            'description' => 'nullable|string|max:1000',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'doc_suffix' => 'nullable|string|max:50',
            'period_base' => 'nullable|string|max:50',
            'company_id' => 'required|integer',
        ]);

        $fiscal_year = FiscalYear::find($request->id);
        $fiscal_year->description = $request->description;
        $fiscal_year->start_date = $request->start_date;
        $fiscal_year->end_date = $request->end_date;
        $fiscal_year->doc_suffix = $request->doc_suffix;
        $fiscal_year->default = (isset($request->default)) ? 1 : 0;
        $fiscal_year->status = $request->status;
        $fiscal_year->period_base = $request->period_base;
        $fiscal_year->company_id = $request->company_id;
        $fiscal_year->save();

        $notify[] = ['success', 'Fiscal Year Updated Successfully.'];
        return redirect()->route('admin.fiscal_year.create')->withNotify($notify);
    }

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $data = FiscalYear::Query();

        if ($type == "first") {
            $data = $data->orderBy('id', 'asc');
        } else if ($type == "last") {
            $data = $data->orderBy('id', 'desc');
        } else if ($type == "forward") {
            $data = $data->where('id', '>', $id);
        } else if ($type == "backward") {
            $data = $data->where('id', '<', $id)->orderBy('id', 'desc');
        }

        $data = $data->with(
            'company'
        )->first();

        return $data;
    }
}
