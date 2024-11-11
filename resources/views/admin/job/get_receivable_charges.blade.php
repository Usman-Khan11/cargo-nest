@php

@endphp
<tr>
  <td>
    <i onclick="delNewReceivableChargesRepeaterRow(this)" class="fa fa-circle-xmark fa-lg text-danger"></i>
  </td>
  <td>
    <i onclick="addNewReceivableChargesRepeaterRow(this)" class="fa fa-clone fa-lg text-info"></i>
  </td>
  <td>
    <input name="" type="checkbox" class="form-check-input" />
  </td>
  <td>
    <input name="cr_s.no" class="form-control" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="cr_bill_invoice[]" class="form-control" type="text" style="width: 100%;" />
  </td>
  <td>
    <select class="form-select cr_chrg" onchange="getChargesCurrency(this)" style="width: 100%;" name="cr_chrg[]">
      <option selected disabled value="">Select Charges</option>
    </select>
  </td>
  <td>
    <input name="cr_particular[]" class="form-control cr_particular" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="cr_description[]" class="form-control cr_description" type="text" style="width: 100%;" />
  </td>
  <td>
    <select name="crp_type[]" class="form-select crp_type" style="width: 100%;">
      <option></option>
      <option value="Unit">Unit</option>
      <option value="Ship">Ship</option>
    </select>
  </td>
  <td>
    <input name="crp_basis[]" class="form-control crp_basis" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_pp_cc[]" class="form-control crp_pp_cc" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_collect_by[]" class="form-control crp_collect_by" type="text" style="width: 100%;" />
  </td>
  <td width="4%">
    <select name="crp_size_type[]" class="form-select crp_size_type" style="width: 100%;">
      <option value="0" selected disabled>Select</option>
    </select>
  </td>
  <td>
    <input name="crp_rate_group[]" class="form-control crp_rate_group" type="text" style="width: 100%;" />
  </td>
  <td>
    <select name="crp_dg_non_dg[]" class="form-select crp_dg_non_dg" style="width: 100%;">
      <option value="Non-DG" selected>Non-DG</option>
      <option value="DG">DG</option>
      <option value="All">All</option>
    </select>
  </td>
  <td>
    <input name="crp_shared[]" class="form-check-input crp_shared" type="checkbox" />
  </td>
  <td>
    <input name="crp_code[]" class="form-control crp_code" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_name_1[]" class="form-control crp_name_1" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_manual[]" class="form-check-input crp_manual" type="checkbox" />
  </td>
  <td>
    <input name="crp_city[]" class="form-control crp_city" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_rate[]" class="form-control crp_rate" type="text" style="width: 100%;" />
  </td>
  <td>
    <select name="crp_currency[]" class="form-select crp_currency" style="width: 100%;">
      <option>Select</option>
    </select>
  </td>
  <td>
    <input name="crp_margin[]" class="form-control crp_margin" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_amount[]" class="form-control crp_amount" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_discount[]" class="form-control crp_discount" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_tax_apple[]" class="form-check-input crp_tax_apple" type="checkbox" />
  </td>
  <td>
    <input name="crp_tax_rev[]" class="form-control crp_tax_rev" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_tax_amount_lc[]" class="form-control crp_tax_amount_lc" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_net_amount[]" class="form-control crp_net_amount" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_ex_rate[]" class="form-control crp_ex_rate" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_local_amount[]" class="form-control crp_local_amount" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_code[]" class="form-control crp_code" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_name_2[]" class="form-control crp_name_2" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_manifest_remarks[]" class="form-control crp_manifest_remarks" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_tariff_code[]" class="form-control crp_tariff_code" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_approved[]" class="form-control crp_approved" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_approved_by[]" class="form-control crp_approved_by" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_approved_date[]" class="form-control crp_approved_date" type="text" style="width: 100%;" />
  </td>
  <td>
    <input name="crp_approved_log[]" class="form-control crp_approved_log" type="text" style="width: 100%;" />
  </td>
</tr>