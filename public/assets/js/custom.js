$(document).ready(function () {
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

}