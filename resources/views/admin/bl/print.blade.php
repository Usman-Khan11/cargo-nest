@extends('admin.layouts.master')

@section('style')
    <style>
        body {
            background: #fff;
            color: black !important;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: black !important;
        }

        p,
        a,
        small,
        td,
        span {
            color: black !important;
        }

        .table {
            vertical-align: top !important;
        }

        #layout-navbar,
        #layout-menu {
            display: none !important;
        }

        .layout-page {
            padding: 0 !important;
        }

        .layout-navbar-fixed .layout-wrapper:not(.layout-horizontal):not(.layout-without-menu) .layout-page {
            padding-top: 0px !important;
        }

        .layout-page:before {
            display: none !important;
        }

        table th {
            font-weight: 600 !important;
            text-align: center !important;
            color: black !important;
            font-size: 15px !important;
            vertical-align: middle !important
        }

        .low-padding-table td,
        .low-padding-table th {
            padding: 5px;
            font-size: 14px !important;
        }

        .border-dark {
            border-color: #555 !important;
        }
    </style>
@endsection

@section('content')
    <div class="w-100">
        <div class="invoice-print p-4">
            <div class="mb-2 mt-0">
                {{-- <h3 class="text-center fw-bolder">Bill of Loading</h3> --}}

                <div class="text-wrap">
                    <table class="table table-bordered table-sm border-dark align-top">
                        <tbody>
                            <tr>
                                <td width="50%" colspan="2">
                                    <div>
                                        <h6>Shipper:</h6>
                                        <p class="mt-5"></p>
                                    </div>
                                </td>
                                <td width="50%" colspan="1">
                                    <div>
                                        <h6>BILL OF LOADING</h6>
                                        <p class="mt-5"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%" colspan="2">
                                    <div>
                                        <h6>Consigned to the order of:</h6>
                                        <p class="mt-5 pt-3"></p>
                                    </div>
                                </td>
                                <td width="50%" rowspan="2" colspan="1">
                                    <div>
                                        <h6>:</h6>
                                        <p class="mt-5"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%" colspan="2">
                                    <div>
                                        <h6>Notify address (No claim shall attached to the carrier or its agents for failure
                                            to
                                            notify):</h6>
                                        <p class="mt-5 pt-3"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="25%">
                                    <div>
                                        <h6>Pre Carruage by:</h6>
                                        <p class="mt-4"></p>
                                    </div>
                                </td>
                                <td width="25%">
                                    <div>
                                        <h6>Place of Receipt by Pre-Carrier:</h6>
                                        <p class="mt-4"></p>
                                    </div>
                                </td>
                                <td width="50%" rowspan="3" colspan="1">
                                    <div>
                                        <h6>For delivery of goods apply to:</h6>
                                        <p class="mt-5"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="25%">
                                    <div>
                                        <h6>Ocean Vessel & Voy:</h6>
                                        <p class="mt-4"></p>
                                    </div>
                                </td>
                                <td width="25%">
                                    <div>
                                        <h6>Port of Loading:</h6>
                                        <p class="mt-4"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="25%">
                                    <div>
                                        <h6>Port of Discharge:</h6>
                                        <p class="mt-4"></p>
                                    </div>
                                </td>
                                <td width="25%">
                                    <div>
                                        <h6>Port of Delivery:</h6>
                                        <p class="mt-4"></p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <table class="table table-bordered table-sm border-dark align-top text-center low-padding-table">
                        <thead>
                            <tr>
                                <th width="20%">Marks & Nos; Container No; Seal No</th>
                                <th width="15%">Number & Kind of Packages</th>
                                <th width="45%">Types or kind of containers or packages description of goods</th>
                                <th width="10%" class="text-nowrap">Gross Weight</th>
                                <th width="10%" class="text-nowrap">Measurement</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
