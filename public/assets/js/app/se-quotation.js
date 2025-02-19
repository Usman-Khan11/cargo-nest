$(document).ready(function () {
    const search_select2 = $(".search_select2");

    $("#submitButton").click(function () {
        $("#myForm").submit();
    });

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
        let route = "/admin/quotation/get";
        let type = $(this).attr("data-type");
        let data = getList(route, type, id);
        if (data != null) {
            edit_row("", JSON.stringify(data));
        }
    });

    $("select[name=vessel]").change(function () {
        var id = $(this).val();
        $(".voyage").html(null);

        $.get(
            "/admin/quotation/create",
            {
                fetch_vessel_voyages: id,
            },
            function (res) {
                $(".voyage").select2({
                    data: res,
                });
            }
        );
    });

    var datatable = $(".quotation_record").DataTable({
        select: {
            style: "api",
        },
        processing: true,
        searching: false,
        serverSide: true,
        lengthChange: false,
        pageLength: 10,
        //   scrollX: true,
        ajax: {
            url: "/admin/quotation/create",
            type: "get",
            data: function (d) { },
        },
        columns: [
            {
                data: "quotation_no",
                title: "Quotation No",
            },
            {
                data: "date",
                title: "Date",
            },
            {
                data: "mode",
                title: "Mode",
            },
            {
                data: "operation_type",
                title: "Operation Type",
            },
            {
                data: "ex_rate",
                title: "Exchange Rate",
            },
        ],
        rowCallback: function (row, data) {
            data = {
                quotation: data,
            };
            $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`);
            $(row).attr("data-bs-dismiss", "modal");
        },
    });
});

function addNewRow(e) {
    $("select.charges, select.size_type, select.detail_currency").select2(
        "destroy"
    );
    $(e).parent().parent().clone().appendTo(".detail_repeater");
    initializeSelect2([
        "select.charges",
        "select.size_type",
        "select.detail_currency",
    ]);
    $(".detail_repeater tr:last").find("input").val(null);
    $(".detail_repeater tr:last")
        .find("select option:first")
        .attr("selected", true);
}

function delRow(e) {
    if ($(".detail_repeater tr").length <= 1) return;
    $(e).parent().parent().remove();
}

function eqpaddNewRow(e) {
    $("select.equip_size_type").select2(
        "destroy"
    );
    $(e).parent().parent().clone().appendTo(".eqp_detail_repeater");
    initializeSelect2([
        "select.equip_size_type",
    ]);
    $(".eqp_detail_repeater tr:last").find("input").val(null);
    $(".eqp_detail_repeater tr:last")
        .find("select option:first")
        .attr("selected", true);
}

function eqpdelRow(e) {
    if ($(".eqp_detail_repeater tr").length <= 1) return;
    $(e).parent().parent().remove();
}

function detailCalculation(e) {
    let total = 0;
    let qty = parseFloat($(e).parent().parent().find("input.qty").val()) || 0;
    let rate = parseFloat($(e).parent().parent().find("input.rate").val()) || 0;
    let detail_ex_rate = parseFloat($(e).parent().parent().find("input.detail_ex_rate").val()) || 0;
    let amount = parseFloat($(e).parent().parent().find("input.amount").val()) || 0;
    let local_amount = parseFloat($(e).parent().parent().find("input.local_amount").val()) || 0;
    let tax = parseFloat($(e).parent().parent().find("input.tax").val()) || 0;
    let inc_tax_amount = parseFloat($(e).parent().parent().find("input.inc_tax_amount").val()) || 0;
    let buying_rate = parseFloat($(e).parent().parent().find("input.buying_rate").val()) || 0;
    let total_receivable = parseFloat($("input[name=total_receivable]").val()) || 0;

    total = rate * qty;
    tax = tax / 100;
    tax = total * tax;
    $(e).parent().parent().find("input.amount").val(total);
    $(e)
        .parent()
        .parent()
        .find("input.local_amount")
        .val(total * detail_ex_rate);
    $(e)
        .parent()
        .parent()
        .find("input.inc_tax_amount")
        .val(total * detail_ex_rate + tax);

    $("input[name=total_receivable]").val(total * detail_ex_rate + tax);
    $("input[name=total_payable]").val(buying_rate);
    let t = (total * detail_ex_rate) + tax;
    t = buying_rate - t;
    $("input[name=total_profit]").val(t);
}

function quotationFormReset(route) {
    document.getElementById("myForm").reset();
    $("#myForm").attr("action", route);
    $("#myForm").find("select").trigger("change");
    $("#myForm")
        .find(
            ".terminals, .place_of_receipt, .port_of_loading, .port_of_discharge, .final_destination, .custom_clearance, .client, .sale_rep, .commodity"
        )
        .val(null)
        .trigger("change");
    $(".job_no").html(null);
    enableJobButton("");
}

function getChargesCode(e) {
    let val = $(e).val();
    if (val) {
        $.get(
            "/admin/quotation/create",
            {
                fetch_charges_code: val,
            },
            function (res) {
                if (res) {
                    $(e)
                        .parent()
                        .parent()
                        .find("select.charges")
                        .val(res.id)
                        .trigger("change");
                } else {
                    $(e)
                        .parent()
                        .parent()
                        .find("select.charges")
                        .val(null)
                        .trigger("change");
                }
            }
        );
    }
}

function modeChange(e) {
    let val = $(e).val();
    if (val == "Received From Client") {
        $(e).parent().parent().find(".buying_rate").hide();
        $(e).parent().parent().find(".remarks").hide();
        $(e).parent().parent().find(".payable_to").hide();
        $(e).parent().parent().find(".buying_remarks").hide();
        $(e).parent().parent().find(".ord").hide();
        $(e).parent().parent().find(".tariff_code").hide();
    } else {
        $(e).parent().parent().find(".buying_rate").show();
        $(e).parent().parent().find(".remarks").show();
        $(e).parent().parent().find(".payable_to").show();
        $(e).parent().parent().find(".buying_remarks").show();
        $(e).parent().parent().find(".ord").show();
        $(e).parent().parent().find(".tariff_code").show();
    }
}

function approvalStatusChange(status) {
    let id = $("input[name=id]").val();
    if (id > 0) {
        $("select[name=approval_status]")
            .find(`option`)
            .attr("selected", false);
        $("select[name=approval_status]").attr("disabled", false);
        $("select[name=approval_status]")
            .find(`option[value=${status}]`)
            .attr("selected", true);
        $("select[name=approval_status]").val(status);
        $("#myForm").submit();
    }
}

function addDaysAndFormat(date, days) {
    date = $(".date").val();
    let result = new Date(date);
    result.setDate(result.getDate() + days);

    let year = result.getFullYear();
    let month = (result.getMonth() + 1).toString().padStart(2, "0");
    let day = result.getDate().toString().padStart(2, "0");

    $(".expire_date").val(`${year}-${month}-${day}`);
}

function copyQuotationNumber() {
    var text = $(".quotation_no").val();
    navigator.clipboard
        .writeText(text)
        .then(function () {
            iziToast.success({
                message: "Quotation number copied",
                position: "topRight",
            });
        })
        .catch(function (error) {
            iziToast.error({
                message: "Failed to copy text: " + error,
                position: "topRight",
            });
        });
}

function equip_size_type(e) {
    let val = $(e).val();
    let parent = $(e).parent().parent();

    $.get(
        "/admin/quotation/create",
        {
            fetch_equip_size_type: val,
        },
        function (res) {
            $(parent).find(".equip_gross").val(res.weight);
            $(parent).find(".equip_tue").val(res.teu);
            $(parent).find(".original_equip_tue").val(res.teu);
            $(parent).find(".equip_qty").trigger('keyup');
        }
    );
}

function enableJobButton(status) {
    let date = $(".date").val();
    let port_loading = $(".port_of_loading").val();
    let port_discharge = $(".port_of_discharge").val();

    if (status == "Approved" && port_loading && port_discharge && date) {
        $("#create_job").removeAttr("disabled");
        $("#statusImage").show();
    } else {
        $("#create_job").attr("disabled", true);
        $("#statusImage").hide();
    }

    if (status == "Approved") {
        $("#approved_btn").attr("disabled", true);
        $("#cancel_job").attr("disabled", true);
    } else {
        $("#approved_btn").removeAttr("disabled");
        $("#cancel_job").removeAttr("disabled");
    }

    if (status == "Un-approved") {
        $("#un_approved_btn").attr("disabled", true);
    } else {
        $("#un_approved_btn").removeAttr("disabled");
    }

    if (status == "Cancelled") {
        $("#cancel_job").attr("disabled", true);
        $("#approved_btn").attr("disabled", true);
        $("#create_job").attr("disabled", true);
    }
}

function getChargesCurrency(e) {
    let val = $(e).val();
    if (val) {
        $.get(
            "/admin/quotation/create",
            {
                fetch_charges_currency: val,
            },
            function (res) {
                if (res) {
                    $(e)
                        .parent()
                        .parent()
                        .find("select.detail_currency")
                        .val(res.currency)
                        .trigger("change");
                    $(e)
                        .parent()
                        .parent()
                        .find(".units option")
                        .attr("selected", false);
                    if (res.calculation_type == "Per-Unit") {
                        $(e)
                            .parent()
                            .parent()
                            .find(".units option[value=Unit]")
                            .attr("selected", true);
                    } else if (res.calculation_type == "Per-Shipment") {
                        $(e)
                            .parent()
                            .parent()
                            .find(".units option[value=Ship]")
                            .attr("selected", true);
                    }
                } else {
                    $(e)
                        .parent()
                        .parent()
                        .find("select.detail_currency")
                        .val(null)
                        .trigger("change");
                }
            }
        );
    }
}

function equipment_link_to_detail() {
    $(".detail_repeater tr:gt(0)").remove();

    $("select.charges, select.size_type, select.detail_currency").select2(
        "destroy"
    );

    $(".eqp_detail_repeater tr").each(function (i, v) {
        let $newRow = $(".detail_repeater tr:first").clone();
        let size_type = $(v).find(".equip_size_type").val();
        let rate_group = $(v).find(".equip_rate_group").val();
        let dg_type = $(v).find(".equip_dg_type").val();
        let qty = $(v).find(".equip_qty").val();

        $newRow.find('.size_type').val(size_type).trigger('change');
        $newRow.find('.rate_group').val(rate_group);
        $newRow.find('.dg_type').val(dg_type).trigger('change');
        $newRow.find('.qty').val(qty);

        $(".detail_repeater").append($newRow);
    })

    $(".detail_repeater tr:first").remove();
    initializeSelect2([
        "select.charges",
        "select.size_type",
        "select.detail_currency",
    ]);
}
