<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets') }}/" data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="{{ $seo_desc }}">
    <meta name="keywords" content="{{ $seo_keywords }}">
    <title>{{ $seo_title }} | {{ App\Models\GeneralSetting::first()->sitename }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon-ico.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/jstree/jstree.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-advance.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    @yield('style')
</head>

@if (!request()->routeIs('admin.dashboard'))
    <style>
        #layout-menu {
            display: none !important;
        }

        .layout-page {
            padding-left: 0 !important;
        }

        .layout-navbar-fixed .layout-navbar.navbar-detached {
            width: 100% !important;
            left: 1.25rem !important;
        }
    </style>
@endif

<body>
    @yield('content')

    <script>
        function checkDelete() {
            return confirm('Are you sure?');
        }
    </script>
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jstree/jstree.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/forms-selects.js') }}"></script>
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    @stack('script')
    @include('admin.partials.notify')

    <script>
        $('#navbar-search__field').on('input', function() {
            var search = $(this).val().toLowerCase();
            var search_result_pane = $('.navbar_search_result');
            $(search_result_pane).html('');
            if (search.length == 0) {
                $('#navbar_search_result_area').css('display', 'none');
                return;
            }
            // search
            var match = $('.menu-inner .menu-link').filter(function(idx, elem) {
                return $(elem).text().trim().toLowerCase().indexOf(search) >= 0 ? elem : null;
            }).sort();

            // show search result
            // search not found
            if (match.length == 0) {
                $(search_result_pane).append('<li class="text-muted pl-5">No search result found.</li>');
                return;
            }
            // search found
            match.each(function(idx, elem) {
                var item_url = $(elem).attr('href') || $(elem).data('default-url');
                var item_text = $(elem).text().replace(/(\d+)/g, '').trim();
                $(search_result_pane).append(
                    `<li><a class="nav_link" href="${item_url}">${item_text}</a></li>`);
            });

            $('#navbar_search_result_area').css('display', 'block');
        });


        function getList(route, type, id) {
            let data = null;
            $.ajax({
                url: route,
                type: "POST",
                data: {
                    id: id,
                    type: type,
                    _token: "{{ csrf_token() }}",
                },
                async: false,
                success: function(res) {
                    if (res) {
                        data = res;
                    }
                },
            });
            return data;
        }

        function deleteData(route) {
            let c = confirm('Are you sure?');
            let id = parseInt($("#myForm input[name=id]").val());
            if (id > 0 && c && route) {
                window.location.assign(route + '/' + id);
            } else if (!id || !route) {
                iziToast.error({
                    message: 'Something went wrong!',
                    position: "topRight"
                });
            }
        }

        function formReset(route) {
            document.getElementById('myForm').reset();
            $("#myForm").attr('action', route);
            $("#myForm").find("select option:first").attr("selected", true);
            $("#myForm").find("select").trigger("change");
        }

        function initializeSelect2(elem) {
            let arr = elem.join(', ');
            $(arr).select2();
        }

        $("div.refresh").click(function() {
            window.location.reload();
        })

        $(document).ready(function() {
            let iframe_height = $(window).height() - 100;

            let storedWindows = JSON.parse(localStorage.getItem("openedWindows")) || {};
            let storedWindowsLength = Object.keys(storedWindows).length;

            setTimeout(function() {
                $(".navigation[data-type=last]").click();
                for (const id in storedWindows) {
                    const url = storedWindows[id].url;
                    const name = storedWindows[id].name;
                    const focus = storedWindows[id].focus;

                    $('#myTabs').append(addTabList(id, name));
                    $('#myTabsContent').append(addTabContent(id, url, iframe_height));

                    if (focus) {
                        $(`#myTabs [data-bs-target="#${id}"]`).tab("show");
                    }
                }
            }, 300);

            $(document).on("click", ".nav_link, .menu-inner .menu-link", function(event) {
                event.preventDefault();

                if ($(this).hasClass('menu-toggle')) {
                    return;
                }

                let name = $(this).text().trim();
                let url = $(this).attr('href');

                if (url == "#") {
                    notify('error', 'URL not found')
                    return;
                }

                if (name == "Logout") {
                    localStorage.setItem("openedWindows", JSON.stringify({}));
                    window.location.assign(url)
                    return;
                }

                if (name && url) {
                    let id = 't_' + slugify(name);

                    // focus false of all tabs
                    Object.keys(storedWindows).forEach(key => (storedWindows[key].focus = false));

                    if (!$(`#myTabs [data-bs-target="#${id}"]`).length) {

                        if (storedWindowsLength >= 11) {
                            notify('error', 'Tab Length Exceed!')
                            return;
                        }

                        const tabContent = addTabContent(id, url, iframe_height);

                        $('#myTabs').append(addTabList(id, name));
                        $('#myTabsContent').append(tabContent);
                        $(`#myTabs [data-bs-target="#${id}"]`).tab("show");

                        storedWindows[id] = {
                            name: name,
                            url: url,
                            focus: true
                        };

                        storedWindowsLength++;
                    } else {
                        // focus true of this tab
                        Object.keys(storedWindows).forEach(key => (storedWindows[key].focus = key === id));
                        $(`#myTabs [data-bs-target="#${id}"]`).tab("show");
                    }

                    // Update localStorage with metadata
                    localStorage.setItem("openedWindows", JSON.stringify(storedWindows));
                    $('#navbar_search_result_area').css('display', 'none');
                    $('#navbar-search__field').val(null);
                }
            })

            // focus true on tab click
            $('#myTabs [data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                let id = $(this).data("id");
                Object.keys(storedWindows).forEach(key => (storedWindows[key].focus = key === id));
                localStorage.setItem("openedWindows", JSON.stringify(storedWindows));
            });

            $(document).on("click", "button.nav-link span", function(event) {
                let id = $(this).parent().attr("data-id");
                let target = $(this).parent().attr("data-bs-target");
                $(this).parent().parent().remove();
                $(target).remove();

                delete storedWindows[id];
                // Update localStorage with metadata
                localStorage.setItem("openedWindows", JSON.stringify(storedWindows));

                if ($('#myTabs li').length > 0) {
                    $('#myTabs li:first').find('button').click();
                }
            })
        })

        function addTabList(id, name) {
            return `<li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-id="${id}" data-bs-target="#${id}"
                            type="button" role="tab">${name} &nbsp; <span class="badge badge-center rounded-pill bg-label-danger"><i class="fa fa-times"></i></span></button>
                    </li>`;
        }

        function addTabContent(id, url, height) {
            return `<div class="tab-pane fade" id="${id}" role="tabpanel">
                      <iframe src="${url}" style="width: 100%; height: ${height}px; border: none;"></iframe>
                    </div>`;
        }

        function slugify(text) {
            return text
                .toString() // Convert to string
                .trim() // Remove leading/trailing whitespace
                .toLowerCase() // Convert to lowercase
                .replace(/<\/?[^>]+(>|$)/g, "") // Remove HTML tags if present
                .replace(/[\s\W-]+/g, "-") // Replace spaces and non-alphanumeric characters with a hyphen
                .replace(/^-+|-+$/g, ""); // Remove leading/trailing hyphens
        }
    </script>
</body>

</html>
