@extends('user.layouts.app')
@section('title')
{{ $top_title }}
@endsection
@section('style')
<style>
    .auth-wrapper.auth-v1 .auth-inner {
        max-width:1200px;
    }
    .main_cards .card{
        
    }
    .main_cards .card:hover{
        transform:scale(1.1);
    }
</style>
@endsection
@section('breadcrumb-panel')

    <div class="row match-height">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-congratulations">
                <div class="card-body text-center">
                    <img src="{{ asset('app-assets/images/elements/decore-left.png') }}" class="congratulations-img-left" alt="card-img-left">
                    <img src="{{ asset('app-assets/images/elements/decore-right.png') }}" class="congratulations-img-right" alt="card-img-right">
                    <div class="avatar avatar-xl bg-primary shadow">
                        <div class="avatar-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award font-large-1"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                        </div>
                    </div>
                    <div class="text-center">
                        <h1 class="mb-1 text-white text-capitalize">Congratulations customer</h1>
                        <p class="card-text m-auto w-75">
                            Your IP Address Is: <strong>{{ $_SERVER["REMOTE_ADDR"] }}</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>                    

    <div class="row match-height main_cards">
        
        <div class="col-lg-4 col-sm-6 col-6">
            <a href="{{ route('user.quote.send') }}">
            <div class="card">
                <div class="card-header flex-column align-items-center pb-0">
                    <div class="avatar bg-light-info p-2 m-0">
                        <i class="fa fa-user-edit fa-3x"></i>
                    </div>
                    <h4 class="card-text my-1 text-center fw-bolder">Place Quotes</h4>
                </div>
            </div>
            </a>
        </div>
        
        <div class="col-lg-4 col-sm-6 col-6">
            <a href="{{ route('user.order.place') }}">
            <div class="card">
                <div class="card-header flex-column align-items-center pb-0">
                    <div class="avatar bg-light-primary p-2 m-0">
                        <i class="fa fa-edit fa-3x"></i>
                    </div>
                    <h4 class="card-text my-1 text-center fw-bolder">Place Digitizing Orders</h4>
                </div>
            </div>
            </a>
        </div>
        
        <div class="col-lg-4 col-sm-6 col-6">
            <a href="{{ route('user.vector.place') }}">
            <div class="card">
                <div class="card-header flex-column align-items-center pb-0">
                    <div class="avatar bg-light-warning p-2 m-0">
                        <i class="fa fa-pen-square fa-3x"></i>
                    </div>
                    <h4 class="card-text my-1 text-center fw-bolder">Place Vector Orders</h4>
                </div>
            </div>
            </a>
        </div>
        
        <div class="col-lg-4 col-sm-6 col-6">
            <a href="{{ route('user.quote.records') }}">
            <div class="card">
                <div class="card-header flex-column align-items-center pb-0">
                    <div class="avatar bg-light-secondary p-2 m-0">
                        <i class="fa fa-project-diagram fa-3x"></i>
                    </div>
                    <h4 class="card-text my-1 text-center fw-bolder">Quotes Records</h4>
                </div>
            </div>
            </a>
        </div>
        
        <div class="col-lg-4 col-sm-6 col-6">
            <a href="{{ route('user.order.place') }}">
            <div class="card">
                <div class="card-header flex-column align-items-center pb-0">
                    <div class="avatar bg-light-danger p-2 m-0">
                        <i class="fa fa-chart-pie fa-3x"></i>
                    </div>
                    <h4 class="card-text my-1 text-center fw-bolder">Order Records</h4>
                </div>
            </div>
            </a>
        </div>
        
        <div class="col-lg-4 col-sm-6 col-6">
            <a href="{{ route('user.vector.records') }}">
            <div class="card">
                <div class="card-header flex-column align-items-center pb-0">
                    <div class="avatar bg-light-success p-2 m-0">
                        <i class="fa fa-theater-masks fa-3x"></i>
                    </div>
                    <h4 class="card-text my-1 text-center fw-bolder">Vector Records</h4>
                </div>
            </div>
            </a>
        </div>
        
        <div class="col-lg-4 col-sm-6 col-6">
            <a href="#">
            <div class="card">
                <div class="card-header flex-column align-items-center pb-0">
                    <div class="avatar bg-light-primary p-2 m-0">
                        <i class="fa fa-user-circle fa-3x"></i>
                    </div>
                    <h4 class="card-text my-1 text-center fw-bolder">Profile</h4>
                </div>
            </div>
            </a>
        </div>
        
        <div class="col-lg-4 col-sm-6 col-6">
            <a href="{{route('user.invoice.show')}}">
            <div class="card">
                <div class="card-header flex-column align-items-center pb-0">
                    <div class="avatar bg-light-primary p-2 m-0">
                        <i class="fa fa-receipt fa-3x"></i>
                    </div>
                    <h4 class="card-text my-1 text-center fw-bolder">My Invoices</h4>
                </div>
            </div>
            </a>
        </div>
        
        <div class="col-lg-4 col-sm-6 col-6">
            <a href="{{ route('user.card.all') }}">
            <div class="card">
                <div class="card-header flex-column align-items-center pb-0">
                    <div class="avatar bg-light-primary p-2 m-0">
                        <i class="fa fa-credit-card fa-3x"></i>
                    </div>
                    <h4 class="card-text my-1 text-center fw-bolder">Credit Card</h4>
                </div>
            </div>
            </a>
        </div>
        
    </div>

@endsection



@push('script') 
@if(Session::has('success'))
    <script type="text/javascript">
        // Display the toaster message using Toastr (you need to include Toastr library in your layout)
        toastr.success("{{ Session::get('success') }}");
    </script>
@endif
@endpush