<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\DocsCompanyWise;
use App\Models\Job;
use App\Models\JobReceivable;
use App\Models\PartyBasicInfo;
use Illuminate\Support\Facades\DB;

class SEInvoiceController extends Controller
{
    protected $name;

    public function __construct()
    {
        $this->name = "SE Invoice";
    }

    public function create(Request $request)
    {
        $user_info = session()->get('user_info');

        $data['seo_title']      = "Se Invoice";
        $data['seo_desc']       = "Se Invoice";
        $data['seo_keywords']   = "Se Invoice";
        $data['page_title'] = "Se Invoice";

        $data['client'] = PartyBasicInfo::select(["id", "party_name as text"])->get();
        $data['client'] = $data['client']->toArray();

        if (isset($request->job_id)) {
            $data['job_data'] = $this->get_data_by_job($request->job_id);
        }

        if (isset($request->type) && $request->type == 'get_invoice_charges') {
            $data["invoice_id"] = $request->invoice_id;
            $data['job'] = Job::where('id', $request->job_id)->first();
            $data['charges'] = JobReceivable::where('job_id', $request->job_id)
                ->with(
                    'charges',
                    'size_type',
                    'currency'
                )
                ->get();
            return view('admin.se_invoice.partials.charges', $data);
        }

        if (isset($request->type) && $request->type == 'put_invoice_charges') {
            $data['charges'] = JobReceivable::whereIn('id', $request->values)
                ->with(
                    'charges',
                    'size_type',
                    'currency'
                )
                ->get();
            return view('admin.se_invoice.partials.charges_data', $data);
        }

        if (isset($request->get_invoice_acc) && isset($request->invoice_to)) {
            $invoice_to = $request->invoice_to;
            return PartyBasicInfo::where('Type', 'Like', "%{$invoice_to}%")->select(["id", "party_name as text"])->orderBy('id', 'desc')->get();
        }

        $data['invoice_no'] = DocsCompanyWise::getDocNumber($user_info['company_id'], $user_info['fiscal_year_id'], $this->name);
        $data['currencies'] = Currency::select(["id", "code as text"])->orderBy('id', 'desc')->get();

        return view('admin.se_invoice.create', $data);
    }

    public function delete($id)
    {
        Invoice::where("id", $id)->delete();
        InvoiceDetail::where("invoice_id", $id)->delete();

        $notify[] = ['success', 'Invoice Deleted Successfully.'];
        return redirect()->route('admin.se_invoice.create')->withNotify($notify);
    }

    public function store(Request $request)
    {
        $user_info = session()->get('user_info');

        $request->validate([
            'tran_number' => 'required',
            'inv_date'    => 'required',
            'reference'   => 'required',
            'status'      => 'required',
            'job_id'      => 'required',
        ]);

        try {
            DB::beginTransaction();

            $invoice = new Invoice();
            $invoice->fill($request->all());
            $invoice->tran_number = DocsCompanyWise::getDocNumber($user_info['company_id'], $user_info['fiscal_year_id'], $this->name, true);
            $invoice->save();

            $charges_ids = $request->charges_ids;
            if ($charges_ids) {
                foreach ($charges_ids as $key => $value) {
                    $invoice_details = new InvoiceDetail();
                    $invoice_details->invoice_id = $invoice->id;
                    $invoice_details->job_id = $request->job_id;
                    $invoice_details->charges_id = $value;
                    $invoice_details->save();
                }
            }

            DB::commit();
            $res = ["success" => 1, "message" => "Invoice Added Successfully."];
        } catch (\Exception $e) {
            DB::rollBack();
            $res = ["success" => 0, "message" => $e->getLine() . ': ' . $e->getMessage()];
        }

        return response()->json($res);
    }

    public function update(Request $request)
    {
        $request->validate([
            'tran_number' => 'required',
            'inv_date'    => 'required',
            'reference'   => 'required',
            'status'      => 'required',
            'job_id'      => 'required',
        ]);

        try {
            DB::beginTransaction();

            $invoice = Invoice::where("id", $request->id)->first();
            $invoice->types = [];
            $invoice->fill($request->all());
            $invoice->save();

            InvoiceDetail::where('invoice_id', $invoice->id)->delete();
            $charges_ids = $request->charges_ids;
            if ($charges_ids) {
                foreach ($charges_ids as $key => $value) {
                    $invoice_details = new InvoiceDetail();
                    $invoice_details->invoice_id = $invoice->id;
                    $invoice_details->job_id = $request->job_id;
                    $invoice_details->charges_id = $value;
                    $invoice_details->save();
                }
            }

            DB::commit();
            $res = ["success" => 1, "message" => "Invoice Updated Successfully."];
        } catch (\Exception $e) {
            DB::rollBack();
            $res = ["success" => 0, "message" => $e->getLine() . ': ' . $e->getMessage()];
        }

        return response()->json($res);
    }

    public function get_data_by_job($job_id)
    {
        $arr = [
            "invoice" => [],
            "invoice_charges" => []
        ];

        $job = Job::where('id', $job_id)
            ->select(
                'id as job_id',
                'job_number',
                'client',
            )
            ->with(
                'clients',
            )
            ->first();

        $job_id = $job->id;
        $arr["invoice"] = $job;

        $arr["invoice_charges"] = JobReceivable::where('job_id', $job_id)->get();

        return $arr;
    }

    public function get_data(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $arr = [
            "invoice" => [],
            "invoice_details" => null
        ];

        $data = Invoice::Query();

        if ($type == "first") {
            $data = $data->orderBy('id', 'asc');
        } else if ($type == "last") {
            $data = $data->orderBy('id', 'desc');
        } else if ($type == "forward") {
            $data = $data->where('id', '>', $id);
        } else if ($type == "backward") {
            $data = $data->where('id', '<', $id)->orderBy('id', 'desc');
        }

        $arr["invoice"] = $data->with('job')->first();
        $invoice_id = @$arr["invoice"]->id;

        $charges = InvoiceDetail::where('invoice_id', $invoice_id)
            ->select('charges_id')
            ->pluck('charges_id');

        $charges = JobReceivable::whereIn('id', $charges)
            ->with(
                'charges',
                'size_type',
                'currency'
            )->get();

        $arr['invoice_details'] = view('admin.se_invoice.partials.charges_data', ['charges' => $charges])->render();

        return $arr;
    }
}
