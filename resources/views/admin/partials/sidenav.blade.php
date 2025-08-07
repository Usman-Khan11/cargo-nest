<style>
    #navbar_search_result_area {
        position: absolute;
        top: 84%;
        background-color: #fff;
        width: 100%;
        left: 0px;
        border-radius: 5px;
        z-index: 99;
        overflow: hidden;
        display: none;
        box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.25);
    }
</style>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo mt-2">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <img src="{{ asset('assets/img/logo/logo.png') }}" width="80%" />
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="flex-grow-1 input-group input-group-merge rounded-pill" style="width: 90%; margin: 0 auto;">
        <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
        <input type="text" id="navbar-search__field" class="form-control chat-search-input" placeholder="Search..."
            aria-label="Search..." aria-describedby="basic-addon-search31" />
        <div id="navbar_search_result_area">
            <ul class="navbar_search_result"></ul>
        </div>
    </div>

    <div class="menu-inner-shadow"></div>

    @php
        $user_info = session()->get('user_info');
        $user_id = $user_info['user_id'] ?? 0;
        $role_id = $user_info['role_id'] ?? 0;
        $navs = app()->make(\App\Services\NavService::class);
        $all_menus = [];

        if ($user_info) {
            $all_menus = $navs->get_nav();
        }
    @endphp

    <ul class="menu-inner py-1 mt-2">
        <li class="menu-item">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        @foreach ($all_menus as $key => $value)
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-user"></i>
                    <div data-i18n="{{ $key }}">{{ $key }}</div>
                </a>
                <ul class="menu-sub">
                    @foreach ($value as $item_key => $item)
                        <li class="menu-item">
                            @if (is_array($item))
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons ti ti-user"></i>
                                    <div data-i18n="{{ $item_key }}">{{ $item_key }}</div>
                                </a>
                                <ul class="menu-sub">
                                    @foreach ($item as $sub_item_key => $sub_item)
                                        @php
                                            $nav = \App\Models\Nav::where('key', $sub_item_key)->first();
                                            $hasPermission = false;
                                            $href = '#';
                                            $label = $sub_item;

                                            if ($nav) {
                                                $href = $nav->slug;
                                                $label = $nav->name;

                                                $hasPermission = \App\Models\NavPermission::with('nav_key')
                                                    ->where('role_id', $role_id)
                                                    ->where('nav_id', $nav->id)
                                                    ->whereHas('nav_key', function ($query) {
                                                        $query->where('value', 'view');
                                                    })
                                                    ->exists();
                                            }

                                            if ($user_id == 1) {
                                                $hasPermission = true;
                                            }
                                        @endphp
                                        @if ($hasPermission)
                                            <li class="menu-item">
                                                <a href="{{ url($href) }}" class="menu-link">
                                                    <i class="menu-icon tf-icons ti ti-user"></i>
                                                    <div data-i18n="{{ $label }}">{{ $label }}</div>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                @php
                                    $nav = \App\Models\Nav::where('key', $item_key)->first();
                                    $hasPermission = false;
                                    $href = '#';
                                    $label = $item;

                                    if ($nav) {
                                        $href = $nav->slug;
                                        $label = $nav->name;

                                        $hasPermission = \App\Models\NavPermission::with('nav_key')
                                            ->where('role_id', $role_id)
                                            ->where('nav_id', $nav->id)
                                            ->whereHas('nav_key', function ($query) {
                                                $query->where('value', 'view');
                                            })
                                            ->exists();
                                    }

                                    if ($user_id == 1) {
                                        $hasPermission = true;
                                    }
                                @endphp
                                @if ($hasPermission)
                                    <a href="{{ url($href) }}" class="menu-link">
                                        <i class="menu-icon tf-icons ti ti-user"></i>
                                        <div data-i18n="{{ $label }}">{{ $label }}</div>
                                    </a>
                                @endif
                            @endif
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach


        {{-- @if (!in_array(auth()->guard('admin')->user()->id ?? 0, [21, 22]))
            <li class="menu-item {{ menuActive('admin.general_setting') }}">
                <a href="{{ route('admin.general_setting') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-settings"></i>
                    <div data-i18n="General Setting">General Setting</div>
                </a>
            </li>
        @endif --}}

        <li class="menu-item {{ menuActive('admin.logout') }}">
            <a href="{{ route('admin.logout') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-logout"></i>
                <div data-i18n="Logout">Logout</div>
            </a>
        </li>
    </ul>
</aside>
