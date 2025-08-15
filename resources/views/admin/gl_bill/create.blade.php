@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="GLFormReset('{{ route('admin.gl_bill.store') }}')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/gl_bill/delete')">
                <i class="fa fa-circle-xmark" title="Delete"></i>
            </div>
            <div class="refresh">
                <i class="fa fa-refresh" title="Reload"></i>
            </div>
            <div class="lock">
                <i class="fa fa-lock" title="Lock"></i>
            </div>
            <div class="ban">
                <i class="fa fa-ban" title="Void"></i>
            </div>
            <div class="backward navigation" data-type="first">
                <i class="fa fa-backward-step" title="First"></i>
            </div>
            <div class="backward navigation" data-type="backward">
                <i class="fa fa-backward" title="Backward"></i>
            </div>
            <div class="forward navigation" data-type="forward">
                <i class="fa fa-forward" title="Forward"></i>
            </div>
            <div class="forward navigation" data-type="last">
                <i class="fa fa-forward-step" title="Last"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-7">
                <div class="d-flex align-items-center">
                    <label style="padding:0px 10px;">Search</label>
                    <select class="form-select">
                        <option></option>
                        <option>Search</option>
                    </select>
                </div>
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control" />
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="d-flex">
            <div class="check">
                <i class="fa fa-circle-check"></i>
            </div>
            <div class="file-check">
                <i class="fa fa-file-circle-check"></i>
            </div>
            <div class="file_line">
                <i class="fa fa-file-lines"></i>
            </div>
        </div>
    </div>
@endsection

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <form id="myForm" method="post" action="{{ route('admin.gl_bill.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="0">
                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-2">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label">Voucher No</label>
                                        </div>
                                        <div class="col-8">
                                            <input type ="text" class="form-control voucher_no" name="voucher_no"
                                                value="{{ old('voucher_no', $bill_no) }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label">Bill No</label>
                                        </div>
                                        <div class="col-8">
                                            <input type ="text" class="form-control bill_no" name="bill_no"
                                                value="{{ old('bill_no', $bill_no) }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-5">
                                            <label class="form-label">GST Invoice No</label>
                                        </div>
                                        <div class="col-7">
                                            <input type ="text" class="form-control gst_invoice_no" name="gst_invoice_no"
                                                value="{{ old('gst_invoice_no', $bill_no) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-5">
                                            <label class="form-label">Voucher / Inv Date</label>
                                        </div>
                                        <div class="col-7">
                                            <input type ="date" class="form-control date" name="date"
                                                value="{{ old('date', date('Y-m-d')) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-5">
                                            <label class="form-label">Vendor Bill Date</label>
                                        </div>
                                        <div class="col-7">
                                            <input type ="date" class="form-control vendor_bill_date"
                                                name="vendor_bill_date"
                                                value="{{ old('vendor_bill_date', date('Y-m-d')) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label">Due Date</label>
                                        </div>
                                        <div class="col-8">
                                            <input type ="date" class="form-control due_date" name="due_date"
                                                value="{{ old('due_date', date('Y-m-d')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-2">
                                            <label class="form-label">Vendor</label>
                                        </div>
                                        <div class="col-10">
                                            <select name="vendor_id" class="form-select select2 vendor_id">
                                                <option value=""></option>
                                                @foreach ($vendors as $vendor)
                                                    <option @if (old('vendor_id') == $vendor->id) selected @endif
                                                        value="{{ $vendor->id }}">{{ $vendor->party_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-2">
                                            <label class="form-label">Company</label>
                                        </div>
                                        <div class="col-10">
                                            <select name="company_id" class="company_id select2">
                                                <option value="{{ $user_info['company_id'] }}">
                                                    {{ $user_info['company_name'] }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label">Balance</label>
                                        </div>
                                        <div class="col-8">
                                            <select name="balance" class="form-select balance">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label">Cost Center</label>
                                        </div>
                                        <div class="col-8">
                                            <select name="cost_center" class="form-select cost_center">
                                                <option value="Head Office">Head Office</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-2">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Currency</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="currency_id" class="currency_id select2">
                                                @foreach ($currencies as $currency)
                                                    <option value="{{ $currency->id }}"
                                                        @if (old('currency_id', $user_info['currency_id']) == $currency->id) selected @endif>
                                                        {{ $currency->code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-5">
                                            <label class="form-label">Exchange Rate</label>
                                        </div>
                                        <div class="col-7">
                                            <input type="number" name="exchange_rate" class="form-control exchange_rate"
                                                value="{{ old('exchange_rate', '1.0000') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label">Print On</label>
                                        </div>
                                        <div class="col-8">
                                            <select name="print_on" class="form-select">
                                                <option></option>
                                                <option></option>
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <button type="button" class="btn btn-primary btn-sm">Continue</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-2">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">Invoice Detail</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">Voucher Properties</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="invoice-tab" data-bs-toggle="tab"
                                        data-bs-target="#invoice" type="button" role="tab" aria-controls="invoice"
                                        aria-selected="false">Invoice Properties</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th width="4%">--</th>
                                                    <th width="4%">--</th>
                                                    <th width="25%">Particular</th>
                                                    <th width="8%">Cost Center</th>
                                                    <th width="6%">Dr / Cr</th>
                                                    <th width="12%">Amount VC</th>
                                                    <th width="12%">Amount LC</th>
                                                    <th width="22%">Narration</th>
                                                    <th width="7%">TaxType</th>
                                                </tr>
                                            </thead>
                                            <tbody class="detail_repeater">
                                                @foreach (old('detail_acc_code', ['']) as $index => $desc)
                                                    @include('admin.gl_bill.partials.invoice_details_row', [
                                                        'index' => $index,
                                                        'chart_accounts' => $chart_accounts,
                                                    ])
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card-datatable table-responsive pt-0">
                                        <table class="datatables-basic table" style="width: 135%;">
                                            <thead>
                                                <tr>
                                                    <th>--</th>
                                                    <th>--</th>
                                                    <th>Property</th>
                                                    <th>Code</th>
                                                    <th>Value</th>
                                                </tr>
                                            </thead>
                                            <tbody class="local_repeater">
                                                <td><i onclick="dellocalRow(this)"
                                                        class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                <td><i onclick="addlocalRow(this)"
                                                        class="fa fa-print fa-lg text-info"></i></td>
                                                <td>
                                                    <input name="" class="form-control" type="text"
                                                        style="width: 100%;" />
                                                    <input name="" class="form-control" type="text"
                                                        style="width: 100%;" />
                                                </td>
                                                <td>
                                                    <input name="" class="form-control" type="text"
                                                        style="width: 100%;" />
                                                    <input name="" class="form-control" type="text"
                                                        style="width: 100%;" />
                                                </td>
                                                <td>
                                                    <input name="" class="form-control" type="text"
                                                        style="width: 100%;" />
                                                    <input name="" class="form-control" type="text"
                                                        style="width: 100%;" />
                                                </td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                                    <div class="card-datatable table-responsive pt-0">
                                        <table class="datatables-basic table" style="width: 135%;">
                                            <thead>
                                                <tr>
                                                    <th>--</th>
                                                    <th>--</th>
                                                    <th>Property</th>
                                                    <th>Code</th>
                                                    <th>Value</th>
                                                </tr>
                                            </thead>
                                            <tbody class="local_repeater">
                                                <td><i onclick="dellocalRow(this)"
                                                        class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                                <td><i onclick="addlocalRow(this)"
                                                        class="fa fa-print fa-lg text-info"></i></td>
                                                <td><input name="" class="form-control" type="text"
                                                        style="width: 100%;" /></td>
                                                <td><input name="" class="form-control" type="text"
                                                        style="width: 100%;" /></td>
                                                <td><input name="" class="form-control" type="text"
                                                        style="width: 100%;" /></td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-8">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-12">
                                            <label class="form-label">Narration</label>
                                        </div>
                                        <div class="col-12">
                                            <textarea name="narration" class="form-control narration" rows="5">{{ old('narration') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <br>
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Invoice Amount</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="number" name="invoice_amount"
                                                class="form-control invoice_amount" value="{{ old('invoice_amount') }}">
                                        </div>
                                    </div>
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Tax Amount</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="number" name="tax_amount" class="form-control tax_amount"
                                                value="{{ old('tax_amount') }}">
                                        </div>
                                    </div>
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Net Amount</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="number" name="net_amount" class="form-control net_amount"
                                                value="{{ old('net_amount') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#submitButton').click(function() {
            $('#myForm').submit();
        });

        $(".navigation").click(function() {
            let id = $("input[name=id]").val();
            let route = "/admin/gl_bill/get";
            let type = $(this).attr("data-type");
            let data = getList(route, type, id);
            if (data != null) {
                edit_row("", JSON.stringify(data));
            }
        });

        function edit_row(e, data) {
            data = JSON.parse(data);

            if (data) {
                $(".voucher_no").val(data.voucher_no);
                $(".bill_no").val(data.bill_no);
                $(".gst_invoice_no").val(data.gst_invoice_no);
                $(".date").val(data.date);
                $(".vendor_bill_date").val(data.vendor_bill_date);
                $(".due_date").val(data.due_date);
                $(".vendor_id").val(data.vendor_id).trigger('change');
                $(".company_id").val(data.company_id).trigger('change');
                $(".balance").val(data.balance);
                $(".cost_center").val(data.cost_center);
                $(".currency_id").val(data.currency_id).trigger('change');
                $(".exchange_rate").val(data.exchange_rate);
                $(".print_on").val(data.print_on);
                $(".narration").val(data.narration);
                $(".invoice_amount").val(data.invoice_amount);
                $(".tax_amount").val(data.tax_amount);
                $(".net_amount").val(data.net_amount);

                $("#myForm").attr("action", "{{ route('admin.gl_bill.update') }}")
                $("input[name=id]").val(data.id);

                append_invoice_details(data.invoice_details || null);
            }
        }

        function append_invoice_details(data) {
            if (!data) {
                return;
            }

            $(".detail_repeater tr:gt(0)").remove();

            if ($('select.detail_acc_code').hasClass('select2-hidden-accessible')) {
                $('select.detail_acc_code').select2('destroy');
            }

            $(data).each(function(key, value) {
                let $newRow = $(".detail_repeater tr:first").clone();

                $newRow.find('.detail_id').val(value.id);
                $newRow.find('.detail_acc_code').val(value.account_id).trigger('change');
                $newRow.find('.detail_cost_center').val(value.cost_center);
                $newRow.find('.detail_dr_cr').val(value.dr_cr).trigger('change');
                $newRow.find('.detail_amount_vc').val(Number(value.amount_vc).toFixed(2));
                $newRow.find('.detail_amount_lc').val(Number(value.amount_lc).toFixed(2));
                $newRow.find('.detail_narration').val(value.narration);
                $newRow.find('.detail_tax_type').val(value.tax_type).trigger('change');

                $(".detail_repeater").append($newRow);
            })

            $(".detail_repeater tr:first").remove();
            $('select.detail_acc_code').select2();
        }

        $('.exchange_rate').keyup(function() {
            detailCalculation(this);
        });

        function GLFormReset(route) {
            $(".detail_repeater tr:gt(0)").remove();
            document.getElementById("myForm").reset();
            $("#myForm").attr("action", route);
            $("#myForm").find(".search_select2").val(null).trigger("change");
            $("#myForm").find("select").trigger("change");
        }

        function addDetailRow(e) {
            $("select.detail_acc_code").select2("destroy");
            $(e).parent().parent().clone().appendTo(".detail_repeater");
            initializeSelect2(["select.detail_acc_code"]);
            $(".detail_repeater tr:last").find("input").val(null);
        }

        function delDetailRow(e) {
            if ($(".detail_repeater tr").length <= 1) {
                $(".detail_repeater tr:last").find("input").val(null);
                return;
            }
            $(e).parent().parent().remove();
        }

        function detailCalculation(e) {
            let exchange_rate = Number($(".exchange_rate").val()) || 1;
            let invoice_amount = 0;
            let tax_amount = 0;
            let net_amount = 0;

            $(".detail_repeater tr").each(function() {
                let amount_vc = Number($(this).find('.detail_amount_vc').val());
                $(this).find('.detail_amount_lc').val(amount_vc * exchange_rate);

                invoice_amount += amount_vc;
            })

            net_amount = invoice_amount;

            $('.invoice_amount').val(invoice_amount);
            $('.tax_amount').val(tax_amount);
            $('.net_amount').val(net_amount);
        }
    </script>
@endpush
