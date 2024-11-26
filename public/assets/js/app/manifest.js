$(document).ready(function () {
    const search_select2 = $(".search_select2");

    if (search_select2.length) {
        $(search_select2).each(function (i, v) {
            let url = $(v).data("url");
            let type = $(v).data("type");
            let placeholder = $(v).data("placeholder") || 'Search for...';

            $(v).select2({
                ajax: {
                    url: url,
                    dataType: "json",
                    data: (params) => ({
                        search: params.term,
                        type: type,
                    }),
                    processResults: (data) => ({ results: data }),
                },
                cache: true,
                allowClear: true,
                placeholder: placeholder,
                minimumInputLength: 1,
                minimumResultsForSearch: 25,
            });
        })
    }

    $("select.vessel").change(function () {
        var id = $(this).val();
        $(".voyage_no").html(null);

        $.get(
            "/admin/voyage/get_all_data",
            {
                fetch_vessel_voyages: id,
                type: 'get_voyages_by_vessels'
            },
            function (res) {
                $(".voyage_no").select2({
                    data: res,
                });
            }
        );
    });
})