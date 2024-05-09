<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="card card-body">
                     <div class="row">
                        <div class="col-lg-8 col-12">
                            <h3 class="page-title">{{ $page_title }}</h3>
                        </div>
                        <div class="col-lg-4 col-12 text-end">
                            @yield('breadcrumb-plugins')
                        </div>
                    </div>
                </div>
                @yield('breadcrumb-panel')
            </div>
        </div>
</div>
