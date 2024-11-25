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

    $(".navigation").click(function () {
        let id = $("input[name=id]").val();
        let route = "/admin/bl/get";
        let type = $(this).attr("data-type");
        let data = getList(route, type, id);
        if (data != null) {
            edit_row("", JSON.stringify(data));
        }
    });

    $('#submitButton').click(function () {
        $('#myForm').submit();
    });

    $(".stamp_repeater .btn_add").click(function () {
        $(".stamp_repeater tbody").find("tr:last").clone().appendTo(".stamp_repeater tbody");
        $(".stamp_repeater tbody tr:last").find("input").val(null).prop("disabled", false);
        $(".stamp_repeater tbody tr:last").find("textarea").val(null).prop("disabled", false);
        $(".stamp_repeater tbody tr:last").find("select").val(null).trigger('change');
    })
})

function delStamp(e) {
    if ($(".stamp_repeater tbody tr").length > 1) {
        $(e).parent().parent().remove();
    }
}