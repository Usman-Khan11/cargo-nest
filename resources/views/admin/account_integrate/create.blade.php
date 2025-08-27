@extends('admin.layouts.app')

@section('top_nav_panel')
    <div class="col-md-4">
        <div class="d-flex">
            <div class="plus" onclick="formReset('/admin/account_integrate/store')">
                <i class="fa fa-square-plus" title="Add"></i>
            </div>
            <div class="save">
                <i class="fa fa-save" id="submitButton" title="Save"></i>
            </div>
            <div class="xmark">
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
                <form id="myForm" method="post" action="{{ route('admin.account_integrate.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input name="id" type="hidden" value="0" />
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="" class="btn btn-primary">Get Fiels List</a>
                                    <a href="" class="btn btn-outline-primary">WIP Policy</a>
                                    <a href="{{ route('admin.account_integrate_charges.create') }}"
                                        class="btn btn-outline-primary">View Advance</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered align-middle table-sm">
                                <thead>
                                    <tr>
                                        <th colspan="3">
                                            <h4 class="m-0 text-center">Parent Account</h4>
                                        </th>
                                    </tr>
                                    <tr class="bg-primary">
                                        <th colspan="3">
                                            <h5 class="m-0 text-white">Vendor</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="33.33%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">City</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="vendor_city_id"
                                                        class="vendor_city_id form-select search_select2"
                                                        data-type="get_city"
                                                        data-url="/admin/location/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="33.33%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Account</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="vendor_account_id"
                                                        class="vendor_account_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="33.33%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">All City Acc</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="vendor_all_city_acc_id"
                                                        class="vendor_all_city_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered align-middle table-sm">
                                <thead>
                                    <tr class="bg-primary">
                                        <th colspan="3">
                                            <h5 class="m-0 text-white">Consignee (Import Party Parent)</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="33.33%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">City</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="consignee_city_id"
                                                        class="consignee_city_id form-select search_select2"
                                                        data-type="get_city"
                                                        data-url="/admin/location/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="33.33%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Account</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="consignee_acc_id"
                                                        class="consignee_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="33.33%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">All City Acc</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="consignee_all_city_acc_id"
                                                        class="consignee_all_city_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered align-middle table-sm">
                                <thead>
                                    <tr class="bg-primary">
                                        <th colspan="3">
                                            <h5 class="m-0 text-white">Shipper (Export Party Parent)</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="33.33%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">City</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="shipper_city_id"
                                                        class="shipper_city_id form-select search_select2"
                                                        data-type="get_city"
                                                        data-url="/admin/location/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="33.33%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Account</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="shipper_acc_id"
                                                        class="shipper_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="33.33%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">All City Acc</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="shipper_all_city_acc_id"
                                                        class="shipper_all_city_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered align-middle table-sm">
                                <thead>
                                    <tr class="bg-primary">
                                        <th colspan="2">
                                            <h5 class="m-0 text-white">General Parent Account</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Principal Acc</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="general_principal_acc_id"
                                                        class="general_principal_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Commission Agent
                                                        Acc</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="general_commission_agent_acc_id"
                                                        class="general_commission_agent_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Terminal Acc</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="general_terminal_acc_id"
                                                        class="general_terminal_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Overseas Agent Acc</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="general_overseas_agent_acc_id"
                                                        class="general_overseas_agent_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered align-middle table-sm">
                                <thead>
                                    <tr class="bg-primary">
                                        <th colspan="2">
                                            <h5 class="m-0 text-white">Export Common Account</h5>
                                        </th>
                                    </tr>
                                    <tr style="background: rgb(113, 191, 69, 0.2) !important">
                                        <th class="text-center">Revenue</th>
                                        <th class="text-center">Expense</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Ocean Freight</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="export_revenue_ocean_freight_acc_id"
                                                        class="export_revenue_ocean_freight_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Ocean Freight</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="export_expense_ocean_freight_acc_id"
                                                        class="export_expense_ocean_freight_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Documentation</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="export_revenue_documentation_acc_id"
                                                        class="export_revenue_documentation_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Documentation</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="export_expense_documentation_acc_id"
                                                        class="export_expense_documentation_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">LCL</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="export_revenue_lcl_acc_id"
                                                        class="export_revenue_lcl_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">LCL</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="export_expense_lcl_acc_id"
                                                        class="export_expense_lcl_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">FCL</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="export_revenue_fcl_acc_id"
                                                        class="export_revenue_fcl_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">FCL</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="export_expense_fcl_acc_id"
                                                        class="export_expense_fcl_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Air</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="export_revenue_air_acc_id"
                                                        class="export_revenue_air_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Air</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="export_expense_air_acc_id"
                                                        class="export_expense_air_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">BreakBulk</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="export_revenue_break_bulk_acc_id"
                                                        class="export_revenue_break_bulk_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">BreakBulk</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="export_expense_break_bulk_acc_id"
                                                        class="export_expense_break_bulk_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered align-middle table-sm">
                                <thead>
                                    <tr class="bg-primary">
                                        <th colspan="2">
                                            <h5 class="m-0 text-white">Import Common Account</h5>
                                        </th>
                                    </tr>
                                    <tr style="background: rgb(113, 191, 69, 0.2) !important">
                                        <th class="text-center">Revenue</th>
                                        <th class="text-center">Expense</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Ocean Freight</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="import_revenue_ocean_freight_acc_id"
                                                        class="import_revenue_ocean_freight_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Ocean Freight</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="import_expense_ocean_freight_acc_id"
                                                        class="import_expense_ocean_freight_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Delivery Order</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="import_revenue_delivery_order_acc_id"
                                                        class="import_revenue_delivery_order_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Delivery Order</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="import_expense_delivery_order_acc_id"
                                                        class="import_expense_delivery_order_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">LCL</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="import_revenue_lcl_acc_id"
                                                        class="import_revenue_lcl_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">LCL</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="import_expense_lcl_acc_id"
                                                        class="import_expense_lcl_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">FCL</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="import_revenue_fcl_acc_id"
                                                        class="import_revenue_fcl_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">FCL</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="import_expense_fcl_acc_id"
                                                        class="import_expense_fcl_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Air</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="import_revenue_air_acc_id"
                                                        class="import_revenue_air_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Air</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="import_expense_air_acc_id"
                                                        class="import_expense_air_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">BreakBulk</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="import_revenue_break_bulk_acc_id"
                                                        class="import_revenue_break_bulk_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">BreakBulk</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="import_expense_break_bulk_acc_id"
                                                        class="import_expense_break_bulk_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Sec Receivable</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="import_revenue_sec_receivable_acc_id"
                                                        class="import_revenue_sec_receivable_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Sec Payable</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="import_expense_sec_payable_acc_id"
                                                        class="import_expense_sec_payable_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered align-middle table-sm">
                                <thead>
                                    <tr class="bg-primary">
                                        <th colspan="2">
                                            <h5 class="m-0 text-white">Logistics Common Account</h5>
                                        </th>
                                    </tr>
                                    <tr style="background: rgb(113, 191, 69, 0.2) !important">
                                        <th class="text-center">Revenue</th>
                                        <th class="text-center">Expense</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Account</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="logistics_revenue_acc_id"
                                                        class="logistics_revenue_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Account</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="logistics_expense_acc_id"
                                                        class="logistics_expense_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered align-middle table-sm">
                                <thead>
                                    <tr class="bg-primary">
                                        <th colspan="2">
                                            <h5 class="m-0 text-white">Other Account</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Security Inhand</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="other_security_inhand_acc_id"
                                                        class="other_security_inhand_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Exchange Rate G/L</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="other_exchange_rate_gl_acc_id"
                                                        class="other_exchange_rate_gl_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">WIP</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="other_wip_acc_id"
                                                        class="other_wip_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    {{-- Advanced against running detention --}}
                                                    <label class="form-label text-center w-100">Adv. Against Rung
                                                        Dtn</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="other_advanced_against_running_detention_acc_id"
                                                        class="other_advanced_against_running_detention_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Principal</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="other_principal_acc_id"
                                                        class="other_principal_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Margin Account</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="other_margin_acc_id"
                                                        class="other_margin_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Bank Charges
                                                        Account</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="other_bank_charges_acc_id"
                                                        class="other_bank_charges_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Round Factor
                                                        Account</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="other_round_factor_acc_id"
                                                        class="other_round_factor_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Convenience Fees
                                                        Acc</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="other_convenience_fees_acc_id"
                                                        class="other_convenience_fees_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="50%">
                                            <div class="row g-0 align-items-center mb-1">
                                                <div class="col-2">
                                                    <label class="form-label text-center w-100">Negative Round
                                                        Factor Acc</label>
                                                </div>
                                                <div class="col-10">
                                                    <select name="other_negative_round_factor_acc_id"
                                                        class="other_negative_round_factor_acc_id form-select search_select2"
                                                        data-type="get_chart_account"
                                                        data-url="/admin/chart_account/get_all_data"></select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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

        function edit_row(e, data) {
            data = JSON.parse(data);
            if (data) {
                for (const [key, value] of Object.entries(data)) {
                    if (key.endsWith("_id")) {
                        let relation = key.endsWith("_id") ? key.replace(/_id$/, "") : key;
                        relation = data[relation];

                        if (relation && relation.id) {
                            var option = new Option(
                                relation.location || relation.title || value,
                                relation.id || value,
                                true,
                                true
                            );

                            $(`.${key}`).append(option).trigger('change');
                        }
                    }
                }

                // if (data.vendor_city) {
                //     var option = new Option(data.vendor_city.location, data.vendor_city.id, true, true);
                //     $(".vendor_city_id").append(option).trigger('change');
                // } else {
                //     $(".vendor_city_id").val(null).trigger('change');
                // }

                $("#myForm").attr("action", "{{ route('admin.account_integrate.update') }}")
                $("input[name=id]").val(data.id);
            }
        }

        $(".navigation").click(function() {
            let id = $("input[name=id]").val();
            let route = "/admin/account_integrate/get";
            let type = $(this).attr("data-type");
            let data = getList(route, type, id);
            if (data != null) {
                edit_row("", JSON.stringify(data));
            }
        });
    </script>
@endpush
