$(document).ready(function () {
    initSearchSelect2();

    $("#newForm").on("submit", function (e) {
        e.preventDefault();

        let form = this;
        let url = $(form).attr('action');
        let method = $(form).attr('method');

        if (!url) {
            notify('error', 'Form action is null or undefined.');
            return;
        }

        let formData = new FormData(form);

        $.ajax({
            url: url,
            method: method,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(".loader").show();
            },
            success: function (response) {
                if (response.success == 1) {
                    notify('success', response.message);
                } else if (response.success == 0) {
                    notify('error', response.message);
                } else {
                    notify('success', 'Form submitted successfully.');
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;

                    $.each(errors, function (key, value) {
                        notify('error', value[0]);
                    });
                } else {
                    notify('error', xhr.responseJSON.message || 'Request failed');
                }
            },
            complete: function () {
                $(".loader").hide();
            }
        });
    })
})

function submitForm() {
    $("#newForm").submit();
}

function navigation(type = 'first') {
    let id = $("#newForm").find("input[name=id]").val() || 0;
    let token = $('#newForm input[name="_token"]').val();
    let navigation_url = $("#newForm").data("navigation_url");

    $.ajax({
        url: navigation_url,
        method: 'POST',
        data: {
            id: id,
            type: type,
            _token: token
        },
        beforeSend: function () {
            $(".loader").show();
        },
        success: function (response) {
            $('#formResponse').html(response.data);
            console.log(response)
        },
        error: function (xhr, textStatus, errorThrown) {
            notify('error', 'Failed to fetch record.');
        },
        complete: function () {
            $(".loader").hide();
        }
    });
}

function initSearchSelect2() {
    const search_select2 = $(".search_select2");

    if (search_select2.length) {
        $(search_select2).each(function (i, v) {
            if (!$(v).hasClass('select2-hidden-accessible')) {
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
                    minimumInputLength: 2,
                    // minimumResultsForSearch: 25,
                });
            }
        })
    }
}