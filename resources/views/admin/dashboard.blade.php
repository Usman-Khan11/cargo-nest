@extends('admin.layouts.app')

@section('top_nav_panel')
    @if (request()->routeIs('admin.dashboard'))
        <style>
            #myTabs li button {
                padding: 8px 5px !important;
                font-size: 14px !important;
                margin-right: 0 !important;
            }
        </style>
        <ul class="nav nav-tabs" id="myTabs" role="tablist"></ul>
    @endif
@endsection

@section('panel')
    @if (request()->routeIs('admin.dashboard'))
        <style>
            .layout-page {
                padding-top: 15px !important;
            }
        </style>
        <div>
            <div class="tab-content bg-transparent p-0" id="myTabsContent"></div>
        </div>
    @endif
    <!--<div class="container-xxl flex-grow-1 container-p-y">-->
    <!--    <div class="row">-->
    <!--        <div class="col-lg-6 mb-4">-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <div class="content-wrapper d-none">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">

                <!-- Total Profit -->
                <div class="col-xl-3 col-md-4 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge p-2 bg-label-danger mb-2 rounded">
                                <i class="ti ti-file-export ti-md"></i>
                            </div>
                            <h5 class="card-title mb-1 pt-2">Se Export</h5>
                            <div class="pt-1">
                                <a href="{{ route('admin.quotation.create') }}"><span class="badge bg-label-secondary">View
                                        Now</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Sales -->
                <div class="col-xl-3 col-md-4 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="badge p-2 bg-label-info mb-2 rounded"><i class="ti ti-file-import ti-md"></i></div>
                            <h5 class="card-title mb-1 pt-2">Se Import</h5>
                            <div class="pt-1">
                                <a href=""><span class="badge bg-label-secondary">View Now</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Revenue Growth -->
                <div class="col-xl-4 col-md-8 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column">
                                    <div class="card-title mb-auto">
                                        <h5 class="mb-1 text-nowrap">Revenue Growth</h5>
                                        <small>Weekly Report</small>
                                    </div>
                                    <div class="chart-statistics">
                                        <h3 class="card-title mb-1">$4,673</h3>
                                        <span class="badge bg-label-success">+15.2%</span>
                                    </div>
                                </div>
                                <div id="revenueGrowth"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
