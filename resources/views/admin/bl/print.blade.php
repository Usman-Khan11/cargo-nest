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
                                        <p class="mt-4 mb-1">{{ @$bl->shippers->party_name }}</p>
                                    </div>
                                </td>
                                <td width="50%" colspan="1">
                                    <div>
                                        <h6>BILL OF LOADING</h6>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%" colspan="2">
                                    <div>
                                        <h6>Consigned to the order of:</h6>
                                        <p class="mt-4 mb-1">{{ @$bl->consignees->party_name }}</p>
                                    </div>
                                </td>
                                <td width="50%" rowspan="2" colspan="1">
                                    <div class="text-center">
                                        <img src="/assets/img/logo/logo.png" width="500">
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
                                        <p class="mt-4 mb-1">{{ @$bl_detail->place_of_receipt->location }}</p>
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
                                        <p class="mt-4 mb-1">{{ @$bl->vessels->vessel_name }} {{ @$bl->voyages->voy }}</p>
                                    </div>
                                </td>
                                <td width="25%">
                                    <div>
                                        <h6>Port of Loading:</h6>
                                        <p class="mt-4 mb-1">{{ @$bl->port_of_loading->location }}</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="25%">
                                    <div>
                                        <h6>Port of Discharge:</h6>
                                        <p class="mt-4 mb-1">{{ @$bl_detail->port_of_discharge->location }}</p>
                                    </div>
                                </td>
                                <td width="25%">
                                    <div>
                                        <h6>Port of Delivery:</h6>
                                        <p class="mt-4 mb-1">{{ @$bl_detail->place_of_delivery->location }}</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-3" style="min-height: 400px;">
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
                        <tbody>
                            <tr>
                                <td>
                                    {{ @$bl_detail->b_marks_no }}
                                </td>
                                <td>
                                    {{ @$bl_detail->b_no_of_pkgs }}
                                </td>
                                <td>
                                    {{ @$bl_detail->b_description }}
                                </td>
                                <td>
                                    {{ @$bl_detail->b_gross_weight }}
                                </td>
                                <td>
                                    {{ @$bl_detail->b_measurement }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <p class="m-0">
                        ABOVE PARTICULARS AS DECLARED BY SHIPPER-CARRIER NOT RESPONSIBLE SUBJECT TO OTHER TERMS & CONDITION
                        AS ON REVERSE
                    </p>
                    <hr class="my-2">
                    <p>
                        Received in good order and conditions, unless otherwise noted herein, at the place of receipt for
                        transpon and delivery as mentioned above. The particulars as stuted above by shipper and the weight,
                        measure, quantity, conditions, contents and value is unknown of Goods to the carrier. One of these
                        Combined Transport Bills of are uniziown to The Carrier, Quality, quantity and nature of the cargo
                        stuffed inside Lading must be surrendered duly endorsed in exchange for the goods the container by
                        the shipper Transport Bills of Lading all of this tenor and date have been signed in the number
                        stated below one of which being accomplished and the other's) to be vod. The contract evidenced by
                        of IN WITNESS whareof the original Combinat contained in this bill of lading is govermed by the law
                        of Pakistan and any clean dispute arising hersunder or is connection herewith shall be determined by
                        the courts in Pakistan and no other courts. Cargo insurance not provided by the Carmer. In casa
                        subject shipment is not cleared/claimed by by the consignee and cargo is abandoned al destination
                        tination or or curtio is ms-declared by the shipper subject to any seizure of the shipment at port
                        of loading or port of discharge, all charges/penalties/fines/legal ten pertaining to this shipment
                        wiil be for shipper's act and carrier hold shipper fully responsible for the same. All charges with
                        regard lu losses and for damages to contener(s) while empty container(s) is/are returned to ines
                        custody at destination will be on consignee account. Destination THC, Container Detention charges
                        and all other applicable andiaries are payable at destination by consignee. The shipment will be
                        held back by carrier/carmer's agent if shipper or consignee owas any money without any
                        responsibility of claims on their port. In case shipment has been rejected try the authorities at
                        the discharging port, re-shipment expenses, demurrage, detention etc, and all freight charges will
                        be on shippers account. Canier is not responsible for the condition of cargo.
                    </p>
                </div>

                <div class="mt-3">
                    <table class="table table-bordered table-sm border-dark align-top">
                        <tbody>
                            <tr>
                                <td width="25%" colspan="1">
                                    <div>
                                        <h6>Total Freight Amount:</h6>
                                        <p class="mt-4"></p>
                                    </div>
                                </td>
                                <td width="25%" colspan="1">
                                    <div>
                                        <h6>Freight Payable At</h6>
                                        <p class="mt-4"></p>
                                    </div>
                                </td>
                                <td width="50%" colspan="1" rowspan="2">
                                    <div>
                                        <h6>For and on behalf of</h6>
                                        <p class="mt-4"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="25%" colspan="1">
                                    <div>
                                        <h6>Number of original B/L(s):</h6>
                                        <p class="mt-3 mb-1">{{ @$bl_detail->b_no_of_bl }}</p>
                                    </div>
                                </td>
                                <td width="25%" colspan="1">
                                    <div>
                                        <h6>Place & Date of issue</h6>
                                        <p class="mt-3 mb-1">{{ @$bl_detail->b_date_of_issue }}</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
