<!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto"><a class="navbar-brand" href=""><span class="brand-logo">
            {{-- <img
                    src="" alt="@lang('image')">                --}}
            </span>
                        <h2 class="brand-text">DigitizingPortal</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="{{menuActive('user.home')}}" id="sidebar__menuWrapper"><a class="d-flex align-items-center" href="{{ route('user.home') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span></a>
                </li>
                <li class="navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span><i data-feather="more-horizontal"></i>
                </li>
                <li class="{{menuActive('user.quote.send')}} nav-item"><a class="d-flex align-items-center" href="{{ route('user.quote.send') }}"><i data-feather="mail"></i><span class="menu-title text-truncate" data-i18n="Send Quote">Send Quote</span></a>
                </li>
                <li class="{{menuActive('user.quote.records')}} nav-item"><a class="d-flex align-items-center" href="{{ route('user.quote.records') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Quote Records">Quote Records</span></a>
                </li>
                <li class="{{menuActive('user.order.place')}} nav-item"><a class="d-flex align-items-center" href="{{ route('user.order.place') }}"><i data-feather="check-square"></i><span class="menu-title text-truncate" data-i18n="Place Order">Place Order</span></a>
                </li>
                <li class="{{menuActive('user.order.records')}} nav-item"><a class="d-flex align-items-center" href="{{ route('user.order.records') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Order Records">Order Records</span></a>
                </li>
                <li class="{{menuActive('user.vector.place')}} nav-item"><a class="d-flex align-items-center" href="{{ route('user.vector.place') }}"><i data-feather="check-square"></i><span class="menu-title text-truncate" data-i18n="Vector Order">Place Vector Order</span></a>
                </li>
                <li class="{{menuActive('user.vector.records')}} nav-item"><a class="d-flex align-items-center" href="{{ route('user.vector.records') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Vector Records">Vector Records</span></a>
                </li>
                <li class="{{menuActive('user.invoice.show')}} nav-item"><a class="d-flex align-items-center" href="{{ route('user.invoice.show') }}"><i data-feather="file"></i><span class="menu-title text-truncate" data-i18n="My Invoices">My Invoices</span></a>
                </li>
                <li class="{{menuActive('user.card.all')}} nav-item"><a class="d-flex align-items-center" href="{{ route('user.card.all') }}"><i data-feather="credit-card"></i><span class="menu-title text-truncate" data-i18n="Card">Card</span></a>
                </li>
                <li class="{{menuActive('user.logout')}} nav-item"><a class="d-flex align-items-center" href="{{ route('user.logout') }}"><i data-feather="power"></i><span class="menu-title text-truncate" data-i18n="Logout">Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->