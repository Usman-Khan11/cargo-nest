@extends('admin.layouts.master')

@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('admin.partials.sidenav')
            <div class="layout-page">
                @include('admin.partials.topnav')
                <div class="content-wrapper">
                    @yield('panel')
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
    </div>
@endsection
