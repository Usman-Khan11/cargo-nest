<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminNotification;
use App\Models\Job;
use App\Models\JobReceivable;
use App\Models\PartyBasicInfo;
use Image;
use Validator;
use Session;
use File;

class InvoiceController extends Controller
{
    public function create(Request $request)
    {
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
            return view('admin.invoice.partials.charges', $data);
        }

        if (isset($request->type) && $request->type == 'put_invoice_charges') {
            $data['charges'] = JobReceivable::whereIn('id', $request->values)
                ->with(
                    'charges',
                    'size_type',
                    'currency'
                )
                ->get();
            return view('admin.invoice.partials.charges_data', $data);
        }

        return view('admin.invoice.create', $data);
    }

    public function edit($id)
    {
        $data['seo_title']      = "Se Invoice";
        $data['seo_desc']       = "Se Invoice";
        $data['seo_keywords']   = "Se Invoice";
        $data['page_title'] = "Se Invoice";
        $data['invoice'] = Invoice::where("id", $id)->first();
        return view('admin.invoice.edit', $data);
    }

    public function delete($id)
    {
        $developer = Invoice::where("id", $id);
        $developer->delete();
        $notify[] = ['success', 'Invoice Deleted Successfully.'];
        return redirect()->route('admin.invoice.create')->withNotify($notify);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tran_number' => 'required',
            'inv_date'    => 'required',
            'reference'   => 'required',
            'status'      => 'required',
            'job_id'      => 'required',
        ]);

        $invoice = new Invoice();
        $invoice->fill($request->all());
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

        // $charges_code = $request->charges_code;
        // foreach ($charges_code as $key => $value) {
        //     $invoice_details = new InvoiceDetail();
        //     $invoice_details->invoice_id = $invoice->id;
        //     $invoice_details->charges_code = $request->charges_code[$key];
        //     $invoice_details->charges_name = $request->charges_name[$key];
        //     $invoice_details->charges_description = $request->charges_description[$key];
        //     $invoice_details->size_type = $request->size_type[$key];
        //     $invoice_details->rate_group = $request->rate_group[$key];
        //     $invoice_details->dg_nondg = $request->dg_nondg[$key];
        //     $invoice_details->container = $request->container[$key];
        //     $invoice_details->qty = $request->qty[$key];
        //     $invoice_details->rate = $request->rate[$key];
        //     $invoice_details->currency = $request->currency[$key];
        //     $invoice_details->amount = $request->amount[$key];
        //     $invoice_details->discount = $request->discount[$key];
        //     $invoice_details->net_amount = $request->net_amount[$key];
        //     $invoice_details->margin = $request->margin[$key];
        //     $invoice_details->tax = $request->tax[$key];
        //     $invoice_details->tax_amount = $request->tax_amount[$key];
        //     $invoice_details->inc_tax = $request->inc_tax[$key];
        //     $invoice_details->ex_rate = $request->ex_rate[$key];
        //     $invoice_details->local_amount = $request->local_amount[$key];
        // }

        $notify[] = ['success', 'Invoice Added Successfully.'];
        return redirect()->route('admin.invoice.create')->withNotify($notify);
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

        $invoice = Invoice::where("id", $request->id)->first();
        $invoice->fill($request->all());
        $invoice->save();

        $charges_ids = $request->charges_ids;
        InvoiceDetail::where('invoice_id', $invoice->id)->delete();

        if ($charges_ids) {
            foreach ($charges_ids as $key => $value) {
                $invoice_details = new InvoiceDetail();
                $invoice_details->invoice_id = $invoice->id;
                $invoice_details->job_id = $request->job_id;
                $invoice_details->charges_id = $value;
                $invoice_details->save();
            }
        }

        $notify[] = ['success', 'Invoice Updated Successfully.'];
        return redirect()->route('admin.invoice.create')->withNotify($notify);
    }

    public function get_data_by_job($job_id)
    {
        $arr = [
            "invoice" => [],
            "invoice_charges" => []
        ];

        $job = Job::where('id', $job_id)
            ->select(
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
            "invoice_details" => []
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

        $arr['invoice_details'] = InvoiceDetail::where('invoice_id', $invoice_id)
            ->with('charges')->get();

        return $arr;
    }
}
