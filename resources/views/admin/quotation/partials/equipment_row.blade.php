<tr>
    <td>
        <i onclick="eqpdelRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i>
    </td>
    <td>
        <i onclick="eqpaddNewRow(this)" class="fa fa-clone fa-lg text-info"></i>
    </td>
    <td>
        <select name="equip_size_type[]" onchange="equip_size_type(this)" class="form-select equip_size_type">
            <option selected disabled> Select Size </option>
        </select>
    </td>
    <td>
        <input type="text" class="form-control equip_rate_group" name="equip_rate_group[]" />
    </td>
    <td>
        <input type="text" class="form-control equip_qty" name="equip_qty[]" />
    </td>
    <td>
        <select name="equip_dg_type[]" class="form-select equip_dg_type">
            <option value="Non-DG" selected>Non-DG</option>
            <option value="DG">DG</option>
            <option value="All">All</option>
        </select>
    </td>
    <td>
        <input class="form-control equip_gross" type="text" name="equip_gross[]" />
    </td>
    <td>
        <input class="original_equip_tue" type="hidden" name="original_equip_tue[]" />
        <input class="form-control equip_tue" type="text" name="equip_tue[]" />
    </td>
    <td>
        <select name="equip_principal[]" class="equip_principal search_select2" data-url="/admin/quotation/create"
            data-type="get_principal"></select>
    </td>
</tr>


@push('script')
    <script>
        function eqpaddNewRow(e) {
            $("select.equip_size_type, .eqp_detail_repeater select.search_select2").select2(
                "destroy"
            );
            $(e).parent().parent().clone().appendTo(".eqp_detail_repeater");
            initializeSelect2([
                "select.equip_size_type"
            ]);
            $(".eqp_detail_repeater tr:last").find("input").val(null);
            // $(".eqp_detail_repeater tr:last")
            //     .find("select option:first")
            //     .attr("selected", true);


            $(".eqp_detail_repeater tr .search_select2").each(function(i, v) {
                initSearchSelect2($(v));
            });
        }

        function eqpdelRow(e) {
            if ($(".eqp_detail_repeater tr").length <= 1) {
                $(".eqp_detail_repeater tr:last").find("input").val(null);
                $(".eqp_detail_repeater tr:last")
                    .find("select option:first")
                    .attr("selected", true);
                return;
            }
            $(e).parent().parent().remove();
        }
    </script>
@endpush
