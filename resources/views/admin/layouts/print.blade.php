@extends('admin.layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="body-wrapper">
            <div class="bodywrapper__inner">
                @include('admin.partials.breadcrumb_print')
                @yield('panel')
            </div>
        </div>
    </div>
@endsection
