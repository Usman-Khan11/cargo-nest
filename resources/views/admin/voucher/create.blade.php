@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="voucherFormReset('/admin/voucher/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark" onclick="deleteData('/admin/voucher/delete')">
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
                <form id="myForm" method="post" action="{{ route('admin.voucher.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="0">

                    <div class="card mb-2">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                            <!--<hr />-->
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
                                                value="{{ old('voucher_no', $voucher_no) }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Date</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="date" class="form-control date" name="date"
                                                value="{{ old('date', date('Y-m-d')) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Type</label>
                                        </div>
                                        <div class="col-9">
                                            <select class="form-select type" name="type">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Company</label>
                                        </div>
                                        <div class="col-9">
                                            {{-- <select name="company_id" class="company_id search_select2"
                                                data-url="{{ route('admin.sub_company.get_all_data') }}"
                                                data-type="get_sub_company" data-placeholder="Select Company"></select> --}}

                                            <select name="company_id" class="company_id select2">
                                                <option value="{{ $user_info['company_id'] }}">
                                                    {{ $user_info['company_name'] }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Settlement</label>
                                        </div>
                                        <div class="col-9">
                                            <input class="form-control settlement" name="settlement"
                                                value="{{ old('settlement') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-2">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label">Cost Center</label>
                                        </div>
                                        <div class="col-8">
                                            <select name="cost_center" class="form-select cost_center">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Bank Sub Type</label>
                                        </div>
                                        <div class="col-9">
                                            <select name="bank_sub_type" class="form-select bank_sub_type">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Currency</label>
                                        </div>
                                        <div class="col-9">
                                            {{-- <select name="currency_id" class="currency_id search_select2"
                                                data-url="{{ route('admin.currency.get_all_data') }}"
                                                data-type="get_currency" data-placeholder="Select Currency">
                                                <option value="{{ $user_info['currency_id'] }}">
                                                    {{ $user_info['currency_code'] }}</option>
                                            </select> --}}

                                            <select name="currency_id" class="currency_id select2">
                                                {{-- <option value=""></option> --}}
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

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Cheque No</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="number" name="cheque_no" class="form-control cheque_no"
                                                value="{{ old('cheque_no') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-2">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-4">
                                            <label class="form-label">Cheque Date</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="date" name="cheque_date" class="form-control cheque_date"
                                                value="{{ old('cheque_date') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-3">
                                            <label class="form-label">Pay To</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" name="pay_to" class="form-control pay_to"
                                                value="{{ old('pay_to') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input print_on_letter_head" type="checkbox"
                                                    value="1" name="print_on_letter_head" id="print_on_letter_head">
                                                <label class="form-check-label" for="print_on_letter_head">
                                                    Print On Letter Head
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input extended_voucher" type="checkbox"
                                                    value="1" name="extended_voucher" id="extended_voucher">
                                                <label class="form-check-label" for="print_on_letter_head">
                                                    Extended Voucher
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <button type="button" class="btn btn-primary btn-sm">Upload</button>
                                    <button type="button" class="btn btn-primary btn-sm">Continue</button>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#listModal">Show List</button>
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
                                        aria-selected="true">Account Detail</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">Voucher Properties</button>
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
                                                    {{-- <th>Account Code</th> --}}
                                                    <th width="25%">Particular</th>
                                                    <th>Cost Center</th>
                                                    <th>Debit(VC)</th>
                                                    <th>Credit(VC)</th>
                                                    <th>Debit(LC)</th>
                                                    <th>Credit(LC)</th>
                                                    <th>Narration</th>
                                                </tr>
                                            </thead>
                                            <tbody class="detail_repeater">
                                                @foreach (old('detail_acc_code', ['']) as $index => $desc)
                                                    @include('admin.voucher.partials.account_details_row', [
                                                        'index' => $index,
                                                        'chart_accounts' => $chart_accounts,
                                                    ])
                                                @endforeach
                                                {{-- <tr>
                                                    <input type="hidden" name="detail_id[]" value="0"
                                                        class="detail_id">
                                                    <td>
                                                        <i onclick="delRow(this)"
                                                            class="fa fa-circle-xmark fa-lg text-danger"></i>
                                                    </td>
                                                    <td>
                                                        <i onclick="addNewRow(this)"
                                                            class="fa fa-print fa-lg text-info"></i>
                                                    </td>
                                                    <td>
                                                        <select name="detail_acc_code[]"
                                                            class="form-select select2 detail_acc_code">
                                                            <option value=""></option>
                                                            @foreach ($chart_accounts as $chart_account)
                                                                <option value="{{ $chart_account->id }}">
                                                                    {{ $chart_account->acc_code }} -
                                                                    {{ $chart_account->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input name="detail_acc_name[]"
                                                            class="form-control detail_acc_name" type="text" />
                                                    </td>
                                                    <td>
                                                        <input name="detail_cost_center[]"
                                                            class="form-control detail_cost_center" type="text" />
                                                    </td>
                                                    <td>
                                                        <input name="detail_debit_vc[]"
                                                            class="form-control detail_debit_vc" type="text"
                                                            onkeyup="detail_calculation()" />
                                                    </td>
                                                    <td>
                                                        <input name="detail_credit_vc[]"
                                                            class="form-control detail_credit_vc" type="text"
                                                            onkeyup="detail_calculation()" />
                                                    </td>
                                                    <td>
                                                        <input name="detail_debit_lc[]"
                                                            class="form-control detail_debit_lc" type="text" />
                                                    </td>
                                                    <td>
                                                        <input name="detail_credit_lc[]"
                                                            class="form-control detail_credit_lc" type="text" />
                                                    </td>
                                                    <td>
                                                        <input name="detail_narration[]"
                                                            class="form-control detail_narration" type="text" />
                                                    </td>
                                                </tr> --}}
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
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-12">
                                            <div class="">
                                                <input type="checkbox" id="receipt" name="receipt_check"
                                                    value="1" class="form-check-input">
                                                <label for="receipt">Receipt</label>

                                                <input type="checkbox" id="narration" name="narration_check"
                                                    value="1" class="form-check-input">
                                                <label for="narration">Narration</label>

                                                <input type="checkbox" id="apply" name="apply_check" value="1"
                                                    class="form-check-input">
                                                <label for="apply">Apply</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <textarea name="remark" class="form-control remark" rows="5">{{ old('remark') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-0 align-items-center mb-1">
                                        <div class="col-12">
                                            <label for="drawn_at" class="form-label">Drawn At</label>
                                        </div>
                                        <div class="col-12">
                                            <textarea name="drawn_at" class="form-control drawn_at" rows="5">{{ old('drawn_at') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label for="debit" class="form-label">Debit</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="number" id="debit" name="debit"
                                                        class="form-control debit" value="{{ old('debit') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label for="credit" class="form-label">Credit</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="number" id="credit" name="credit"
                                                        class="form-control credit" value="{{ old('credit') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-3">
                                                    <label for="net_amount" class="form-label">Net Amount</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="number" id="net_amount" name="net_amount"
                                                        class="form-control net_amount" value="{{ old('net_amount') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input show_narration" type="checkbox"
                                                    value="1" name="show_narration" id="show_narration">
                                                <label class="form-check-label" for="show_narration">
                                                    Show Narration in Report
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary btn-sm">Chart of
                                                Account</button>

                                            <button type="button" class="btn btn-primary btn-sm">Recall Voucher
                                                Memories</button>
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

    <div class="modal fade" id="listModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Voucher List</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-sm quotation_record"></table>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>
        $('#submitButton').click(function() {
            $('#myForm').submit();
        });

        $(document).ready(function() {
            const search_select2 = $(".search_select2");
            if (search_select2.length) {
                $(search_select2).each(function(i, v) {
                    let url = $(v).data("url");
                    let type = $(v).data("type");
                    let placeholder = $(v).data("placeholder") || 'Search for...';

                    $(v).select2({
                        ajax: {
                            url: url,
                            dataType: "json",
                            data: (params) => ({
                                search: params.term,
                                type: type,
                            }),
                            processResults: (data) => ({
                                results: data
                            }),
                        },
                        cache: true,
                        allowClear: true,
                        placeholder: placeholder,
                        minimumInputLength: 1,
                        minimumResultsForSearch: 25,
                    });
                });
            }
        });

        $(".navigation").click(function() {
            let id = $("input[name=id]").val();
            let route = "/admin/voucher/get";
            let type = $(this).attr("data-type");
            let data = getList(route, type, id);
            if (data != null) {
                edit_row("", JSON.stringify(data));
            }
        });

        function edit_row(e, data) {
            data = JSON.parse(data);
            console.log(data)
            if (data) {
                $(".voucher_no").val(data.voucher_no);
                $(".date").val(data.date);
                $(".type").val(data.type).trigger('change');
                $(".settlement").val(data.settlement);
                $(".cost_center").val(data.cost_center).trigger('change');
                $(".bank_sub_type").val(data.bank_sub_type).trigger('change');
                $(".exchange_rate").val(data.exchange_rate);
                $(".cheque_no").val(data.cheque_no);
                $(".cheque_date").val(data.cheque_date);
                $(".pay_to").val(data.pay_to);
                $(".print_on_letter_head").prop('checked', data.print_on_letter_head === 1);
                $(".extended_voucher").prop('checked', data.extended_voucher === 1);
                $(".debit").val(data.debit);
                $(".credit").val(data.credit);
                $(".net_amount").val(data.net_amount);
                $(".show_narration").prop('checked', data.show_narration === 1);
                $("#receipt").prop('checked', data.receipt_check === 1);
                $("#narration").prop('checked', data.narration_check === 1);
                $("#apply").prop('checked', data.apply_check === 1);
                $(".remark").val(data.remark);
                $(".drawn_at").val(data.drawn_at);

                $(".company_id").val(data.company_id).trigger('change');
                // if (data.company) {
                //     var option = new Option(data.company.name, data.company.id, true, true);
                //     $(".company_id").append(option).trigger('change');
                // } else {
                //     $(".company_id").val(null).trigger('change');
                // }

                $(".currency_id").val(data.currency.id || 0).trigger('change');
                // if (data.currency) {
                //     var option = new Option(data.currency.code, data.currency.id, true, true);
                //     $(".currency_id").append(option).trigger('change');
                // } else {
                //     $(".currency_id").val(null).trigger('change');
                // }

                $("#myForm").attr("action", "{{ route('admin.voucher.update') }}")
                $("input[name=id]").val(data.id);

                append_account_details(data.account_details || null);
            }
        }

        function append_account_details(data) {
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
                $newRow.find('.detail_debit_vc').val(Number(value.debit_vc).toFixed(2));
                $newRow.find('.detail_credit_vc').val(Number(value.credit_vc).toFixed(2));
                $newRow.find('.detail_debit_lc').val(Number(value.debit_lc).toFixed(2));
                $newRow.find('.detail_credit_lc').val(Number(value.credit_lc).toFixed(2));
                $newRow.find('.detail_narration').val(value.narration);

                $(".detail_repeater").append($newRow);
            })

            $(".detail_repeater tr:first").remove();
            $('select.detail_acc_code').select2();
        }

        var datatable = $(".quotation_record").DataTable({
            select: {
                style: "api",
            },
            processing: true,
            searching: true,
            serverSide: true,
            lengthChange: true,
            pageLength: 10,
            scrollY: 400,
            // scrollX: 100,
            autoWidth: true,
            ajax: {
                url: "/admin/voucher/create",
                type: "get",
                data: function(d) {},
            },
            columns: [{
                    data: "voucher_no",
                    title: "Voucher No",
                },
                {
                    data: "date",
                    title: "Date",
                },
                {
                    data: "company.name",
                    title: "Company",
                    render: function(data, type, full, meta) {
                        if (full.company) {
                            return full.company.name;
                        } else {
                            return '-';
                        }
                    }
                },
                {
                    data: "debit",
                    title: "Debit",
                },
                {
                    data: "credit",
                    title: "Credit",
                },
                {
                    data: "net_amount",
                    title: "Net Amount",
                },
            ],
            rowCallback: function(row, data) {
                data = {
                    quotation: data,
                };
                $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`);
                $(row).attr("data-bs-dismiss", "modal");
            },
        });

        $('#listModal').on('shown.bs.modal', function(e) {
            datatable.ajax.reload();
        })

        function voucherFormReset(route) {
            $(".detail_repeater tr:gt(0)").remove();
            document.getElementById("myForm").reset();
            $("#myForm").attr("action", route);
            $("#myForm").find(".search_select2").val(null).trigger("change");
            $("#myForm").find("select").trigger("change");
        }

        function addNewRow(e) {
            $("select.detail_acc_code").select2(
                "destroy"
            );
            $(e).parent().parent().clone().appendTo(".detail_repeater");
            initializeSelect2([
                "select.detail_acc_code"
            ]);
            $(".detail_repeater tr:last").find("input").val(null);
        }

        function delRow(e) {
            if ($(".detail_repeater tr").length <= 1) {
                $(".detail_repeater tr:last").find("input").val(null);
                return;
            }
            $(e).parent().parent().remove();
        }

        function detail_calculation(e) {
            let debit_vc_total = 0;
            let credit_vc_total = 0;
            let exchange_rate = Number($(".exchange_rate").val()) || 1;
            console.log(e)

            $(".detail_repeater tr").each(function() {
                let debit_vc = Number($(this).find('.detail_debit_vc').val());
                let credit_vc = Number($(this).find('.detail_credit_vc').val());

                if (debit_vc > 0 && credit_vc <= 0) {
                    $(this).find('.detail_debit_lc').val(debit_vc * exchange_rate);
                } else {
                    $(this).find('.detail_debit_vc').val('');
                    $(this).find('.detail_debit_lc').val('');
                }

                if (credit_vc > 0 && debit_vc <= 0) {
                    $(this).find('.detail_credit_lc').val(credit_vc * exchange_rate);
                } else {
                    $(this).find('.detail_credit_vc').val('');
                    $(this).find('.detail_credit_lc').val('');
                }

                debit_vc_total += debit_vc;
                credit_vc_total += credit_vc;
            })

            $(".debit").val(debit_vc_total);
            $(".credit").val(credit_vc_total);
        }
    </script>
@endpush
