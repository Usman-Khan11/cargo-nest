 <div class="row g-3">
     <div class="col-md-3">
         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Job #</label>
             </div>
             <div class="col-9">
                 <x-input name="basic_info.job_number" realName="basic_info[job_number]" value="" readonly />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Cost Center</label>
             </div>
             <div class="col-9">
                 <x-select name="basic_info.cost_center" realName="basic_info[cost_center]" placeholder=" " />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Job Status</label>
             </div>
             <div class="col-9">
                 <x-select name="basic_info.job_status" realName="basic_info[job_status]" :options="[
                     'Opened' => 'Opened',
                     'Closed' => 'Closed',
                     'Cancel' => 'Cancel',
                     'Merge' => 'Merge',
                     'Financial Close' => 'Financial Close',
                 ]" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Freight Type</label>
             </div>
             <div class="col-9">
                 <x-select name="basic_info.freight_type" realName="basic_info[freight_type]" :options="[
                     'Prepaid' => 'Prepaid',
                     'Collect' => 'Collect',
                 ]" />
             </div>
         </div>
     </div>

     <div class="col-md-2">
         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label w-100 m-0">Nature</label>
             </div>
             <div class="col-8">
                 <x-select name="basic_info.nature" realName="basic_info[nature]" :options="[
                     'None' => 'None',
                     'Parent' => 'Parent',
                     'Child' => 'Child',
                 ]" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label w-100 m-0">Console ID</label>
             </div>
             <div class="col-8">
                 <x-input name="basic_info.console_id" realName="basic_info[console_id]" value="" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label w-100 m-0">Shipt Status</label>
             </div>
             <div class="col-8">
                 <x-select name="basic_info.shipt_status" realName="basic_info[shipt_status]" placeholder=" "
                     :options="[
                         'Shipped' => 'Shipped',
                         'Hold' => 'Hold',
                         'Delivered' => 'Delivered',
                         'Booked' => 'Booked',
                         'Close' => 'Close',
                         'Confirmed' => 'Confirmed',
                         'Late Running' => 'Late Running',
                         'Loaded' => 'Loaded',
                     ]" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label w-100 m-0">Nomination</label>
             </div>
             <div class="col-8">
                 <x-select name="basic_info.nomination" realName="basic_info[nomination]" :options="[
                     'Free hand' => 'Free hand',
                     'Nominated' => 'Nominated',
                     'B2B' => 'B2B',
                 ]" />
             </div>
         </div>
     </div>

     <div class="col-md-2">
         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label w-100 m-0">Job Date</label>
             </div>
             <div class="col-8">
                 <x-input type="date" name="basic_info.date" realName="basic_info[date]" value="" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label w-100 m-0">Job Kind</label>
             </div>
             <div class="col-8">
                 <x-select name="basic_info.job_kind" realName="basic_info[job_kind]" :options="[
                     'Current' => 'Current',
                     'Opening' => 'Opening',
                 ]" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label w-100 m-0">Shipt Date</label>
             </div>
             <div class="col-8">
                 <x-input type="date" name="basic_info.shipt_date" realName="basic_info[shipt_date]"
                     value="" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label w-100 m-0">File #</label>
             </div>
             <div class="col-8">
                 <x-input name="basic_info.file_no" realName="basic_info[file_no]" value="" />
             </div>
         </div>
     </div>

     <div class="col-md-2">
         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label w-100 m-0">Job Type</label>
             </div>
             <div class="col-8">
                 <x-select name="basic_info.job_type" realName="basic_info[job_type]" placeholder=" "
                     :options="[
                         'Direct' => 'Direct',
                         'Coloaded' => 'Coloaded',
                         'Cross Trade' => 'Cross Trade',
                         'Liner Agency' => 'Liner Agency',
                     ]" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label w-100 m-0">DG/Non-DG</label>
             </div>
             <div class="col-8">
                 <x-select name="basic_info.dg_type" realName="basic_info[dg_type]" :options="[
                     'DG' => 'DG',
                     'Non-DG' => 'Non-DG',
                     'All' => 'All',
                 ]" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label w-100 m-0">Cust Ref #</label>
             </div>
             <div class="col-8">
                 <x-input name="basic_info.customer_ref_no" realName="basic_info[customer_ref_no]" value="" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label w-100 m-0">Type of BL</label>
             </div>
             <div class="col-8">
                 <x-select name="basic_info.type_of_bl" realName="basic_info[type_of_bl]" :options="[
                     'Other' => 'Other',
                 ]" />
             </div>
         </div>
     </div>

     <div class="col-md-2">
         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label w-100 m-0">Sub Type</label>
             </div>
             <div class="col-8">
                 <x-select name="basic_info.sub_type" realName="basic_info[sub_type]" placeholder=" "
                     :options="[
                         'LCL' => 'LCL',
                         'FCL' => 'FCL',
                         'Car' => 'Car',
                         'Breakbulk' => 'Breakbulk',
                     ]" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label w-100 m-0">Inco Terms</label>
             </div>
             <div class="col-8">
                 <x-select name="basic_info.inco_term_id" realName="basic_info[inco_term_id]" :options="[]" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label w-100 m-0">Secur Paid By</label>
             </div>
             <div class="col-8">
                 <x-select name="basic_info.security_paid_by" realName="basic_info[security_paid_by]"
                     :options="[]" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label w-100 m-0">Tax Distribution</label>
             </div>
             <div class="col-8">
                 <x-select name="basic_info.tax_distribution" realName="basic_info[tax_distribution]"
                     :options="[]" />
             </div>
         </div>
     </div>

     <div class="col-md-1">
         <div class="form-check mb-2">
             <input class="form-check-input" type="checkbox" value="1" id="part_fcl" name="part_fcl">
             <label class="form-check-label" for="part_fcl">
                 Part FCL
             </label>
         </div>

         <div class="form-check">
             <input class="form-check-input" type="checkbox" value="1" id="mty_move" name="mty_move">
             <label class="form-check-label" for="mty_move">
                 MTY Move
             </label>
         </div>

         <div class="mt-2">
             <button type="button" class="btn btn-secondary btn-sm">Security File</button>
         </div>

         <div class="mt-2">
             <button type="button" class="btn btn-secondary btn-sm">Generate</button>
         </div>
     </div>
 </div>

 <hr>

 <div class="row g-3">
     <div class="col-2">
         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label">HBL #</label>
             </div>
             <div class="col-9">
                 <x-input name="basic_info.hbl_no" realName="basic_info[hbl_no]" value="" />
             </div>
         </div>
     </div>

     <div class="col-2">
         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label">HBL Date</label>
             </div>
             <div class="col-8">
                 <x-input type="date" name="basic_info.hbl_date" realName="basic_info[hbl_date]"
                     value="" />
             </div>
         </div>
     </div>

     <div class="col-2">
         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label">MBL #</label>
             </div>
             <div class="col-9">
                 <x-input name="basic_info.mbl_no" realName="basic_info[mbl_no]" value="" />
             </div>
         </div>
     </div>

     <div class="col-2">
         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label">MBL Date</label>
             </div>
             <div class="col-8">
                 <x-input type="date" name="basic_info.mbl_date" realName="basic_info[mbl_date]"
                     value="" />
             </div>
         </div>
     </div>

     <div class="col-3">
         <button type="button" class="btn btn-primary btn-sm">Parent Job</button>
         <button type="button" class="btn btn-primary btn-sm ms-2">Shipment List</button>
     </div>

     <div class="col-1">
         <button type="button" class="btn btn-success btn-sm ms-2">
             <i class="fa fa-check"></i>
         </button>
         <button type="button" class="btn btn-danger btn-sm ms-2">
             <i class="fa fa-times"></i>
         </button>
     </div>

     <div class="col-12">
         <h5 class="d-inline-block m-0">
             <b>Total Conatiners:</b> N/A
         </h5>

         <h5 class="d-inline-block ms-5 mb-0">
             <b>Parent Job #:</b> N/A
         </h5>

         <h5 class="d-inline-block ms-5 mb-0">
             <b>Tariff Applied:</b> N/A
         </h5>
     </div>
 </div>

 <hr>

 <div class="row g-3">
     <div class="col-4">
         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Client</label>
             </div>
             <div class="col-9">
                 <x-select name="basic_info.client_id" realName="basic_info[client_id]" :options="[]"
                     data-type="get_client" data-url="/admin/party/get_all_data" class="search_select2" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Consignee</label>
             </div>
             <div class="col-9">
                 <x-select name="basic_info.consignee_id" realName="basic_info[consignee_id]" :options="[]"
                     data-type="get_consignee" data-url="/admin/party/get_all_data" class="search_select2" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Commodity</label>
             </div>
             <div class="col-9">
                 <x-select name="basic_info.commodity_id" realName="basic_info[commodity_id]" :options="[]"
                     data-type="get_commodity" data-url="/admin/commodity/get_all_data" class="search_select2" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Port of Loading</label>
             </div>
             <div class="col-9">
                 <x-select name="basic_info.port_of_loading_id" realName="basic_info[port_of_loading_id]"
                     :options="[]" data-type="get_location" data-url="/admin/location/get_all_data"
                     class="search_select2" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Port of Discharge</label>
             </div>
             <div class="col-9">
                 <x-select name="basic_info.port_of_discharge_id" realName="basic_info[port_of_discharge_id]"
                     :options="[]" data-type="get_location" data-url="/admin/location/get_all_data"
                     class="search_select2" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Final Destination</label>
             </div>
             <div class="col-9">
                 <x-select name="basic_info.final_destination_id" realName="basic_info[final_destination_id]"
                     :options="[]" data-type="get_location" data-url="/admin/location/get_all_data"
                     class="search_select2" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Custom Clearance</label>
             </div>
             <div class="col-9">
                 <x-select name="basic_info.custom_clearance_id" realName="basic_info[custom_clearance_id]"
                     :options="[]" data-type="get_clearing_agent" data-url="/admin/party/get_all_data"
                     class="search_select2" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Vessel</label>
             </div>
             <div class="col-9">
                 <x-select name="basic_info.vessel_id" realName="basic_info[vessel_id]" :options="[]"
                     data-type="get_vessel" data-url="/admin/vessel/get_all_data" class="search_select2" />
             </div>
         </div>
     </div>

     <div class="col-4">
         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Transportation</label>
             </div>
             <div class="col-9">
                 <x-select name="basic_info.transportation_id" realName="basic_info[transportation_id]"
                     :options="[]" data-type="get_transporter" data-url="/admin/party/get_all_data"
                     class="search_select2" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Forwarder/Coloader</label>
             </div>
             <div class="col-9">
                 <x-select name="basic_info.forwarder_coloader_id" realName="basic_info[forwarder_coloader_id]"
                     :options="[]" data-type="get_forwarder_coloader" data-url="/admin/party/get_all_data"
                     class="search_select2" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Sales Rep</label>
             </div>
             <div class="col-9">
                 <x-select name="basic_info.sales_representative_id" realName="basic_info[sales_representative_id]"
                     :options="[]" data-type="get_sales_rep" data-url="/admin/employee/get_all_data"
                     class="search_select2" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Sline/Carrier</label>
             </div>
             <div class="col-9">
                 <x-select name="basic_info.sline_carrier_id" realName="basic_info[sline_carrier_id]"
                     :options="[]" data-type="get_sline_carrier" data-url="/admin/party/get_all_data"
                     class="search_select2" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Local Vendor</label>
             </div>
             <div class="col-9">
                 <x-select name="basic_info.local_vendor_id" realName="basic_info[local_vendor_id]" :options="[]"
                     data-type="get_local_vendor" data-url="/admin/party/get_all_data" class="search_select2" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Overseas Agent</label>
             </div>
             <div class="col-9">
                 <x-select name="basic_info.overseas_agent_id" realName="basic_info[local_vendor_id]"
                     :options="[]" data-type="get_overseas" data-url="/admin/party/get_all_data"
                     class="search_select2" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Principal</label>
             </div>
             <div class="col-9">
                 <x-select name="basic_info.principal_id" realName="basic_info[principal_id]" :options="[]"
                     data-type="get_principal" data-url="/admin/party/get_all_data" class="search_select2" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Voyage</label>
             </div>
             <div class="col-9">
                 <x-select name="basic_info.voyage_id" realName="basic_info[voyage_id]" class="select2"
                     :options="[]" />
             </div>
         </div>
     </div>

     <div class="col-2">
         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label w-100 m-0">C.B KG/ED</label>
             </div>
             <div class="col-8">
                 <x-input name="basic_info.cb" realName="basic_info[cb]" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1 mt-5">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Weight</label>
             </div>
             <div class="col-9">
                 <x-input type="number" step="any" name="basic_info.weight" realName="basic_info[weight]" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Volume</label>
             </div>
             <div class="col-9">
                 <x-input type="number" step="any" name="basic_info.volume" realName="basic_info[volume]" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">Container</label>
             </div>
             <div class="col-9">
                 <x-input type="number" step="any" name="basic_info.container"
                     realName="basic_info[container]" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">TEU</label>
             </div>
             <div class="col-9">
                 <x-input type="number" step="any" name="basic_info.container"
                     realName="basic_info[container]" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">PCS</label>
             </div>
             <div class="col-9">
                 <x-input type="number" step="any" name="basic_info.pcs" realName="basic_info[pcs]" />
             </div>
         </div>
     </div>

     <div class="col-2">
         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">ETD</label>
             </div>
             <div class="col-9">
                 <x-input type="date" name="basic_info.etd" realName="basic_info[etd]" />
             </div>
         </div>

         <div class="row g-0 align-items-center mb-1">
             <div class="col-3">
                 <label class="form-label w-100 m-0">ETA</label>
             </div>
             <div class="col-9">
                 <x-input type="date" name="basic_info.eta" realName="basic_info[eta]" />
             </div>
         </div>
     </div>
 </div>

 <hr>

 <div class="row g-3 align-items-end">
     <div class="col-4">
         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <h6 class="m-0">Tracking Note</h6>
             </div>
             <div class="col-8 text-end">
                 <button type="button" class="btn btn-primary btn-sm">Add/Edit</button>
                 <button type="button" class="btn btn-primary btn-sm">View Notes</button>
             </div>
         </div>
         <div>
             <x-input name="basic_info.tracking_note" rows="6" realName="basic_info[tracking_note]"
                 is_textarea="true" />
         </div>
     </div>

     <div class="col-8">
         <div class="row g-3">
             <div class="col-4">
                 <div class="row g-0 align-items-center mb-1">
                     <div class="col-4">
                         <label class="form-label w-100 m-0">DO Issue On</label>
                     </div>
                     <div class="col-8">
                         <x-input name="" realName="" />
                     </div>
                 </div>
             </div>
             <div class="col-4">
                 <div class="row g-0 align-items-center mb-1">
                     <div class="col-4">
                         <label class="form-label w-100 m-0">Quotation</label>
                     </div>
                     <div class="col-8">
                         <x-input name="" realName="" />
                     </div>
                 </div>
             </div>
         </div>

         <div class="d-flex flex-wrap gap-3 mt-4">
             <button type="button" class="btn btn-primary btn-sm">Exception</button>
             <button type="button" class="btn btn-primary btn-sm">DO</button>
             <button type="button" class="btn btn-primary btn-sm">DO / Lock</button>
             <button type="button" class="btn btn-primary btn-sm">Milestone</button>
             <button type="button" class="btn btn-primary btn-sm">Invoice</button>
             <button type="button" class="btn btn-primary btn-sm">Bill</button>
             <button type="button" class="btn btn-primary btn-sm">Crucial Charges</button>
             <button type="button" class="btn btn-primary btn-sm">Agent Invoice</button>
             <button type="button" class="btn btn-primary btn-sm">Equipment Invoice</button>
         </div>

         <div class="d-flex flex-wrap gap-3 mt-3">
             <button type="button" class="btn btn-primary btn-sm">BL Amendment</button>
             <button type="button" class="btn btn-primary btn-sm">Apply Late Pickup</button>
             <button type="button" class="btn btn-primary btn-sm">Letter Generation</button>
             <button type="button" class="btn btn-primary btn-sm">Letters</button>
             <button type="button" class="btn btn-secondary btn-sm">Bulk Upload</button>
         </div>

         <div class="mt-4 text-end">
             <h5 class="d-inline-block mb-0 mt-2 me-5">
                 <b>Manifest #:</b> N/A
             </h5>

             <button type="button" class="btn btn-primary btn-sm">Allocate</button>
             <button type="button" class="btn btn-primary btn-sm">De Allocate</button>
         </div>
     </div>
 </div>

 <hr>

 <div class="row g-3">
     <div class="col-3">
         <div class="row g-0 align-items-center mb-1">
             <div class="col-4">
                 <label class="form-label w-100 m-0">Approval Status</label>
             </div>
             <div class="col-8">
                 <x-select name="basic_info.status" realName="basic_info[status]" :options="[]" />
             </div>
         </div>
     </div>

     <div class="col-2">
         <button type="button" class="btn btn-primary btn-sm">Approve</button>
         <button type="button" class="btn btn-primary btn-sm">Un Approve</button>
     </div>

     <div class="col-2">
         <h5 class="d-inline-block mb-0 mt-2 me-5">
             <b>Approved By:</b> N/A
         </h5>
     </div>

     <div class="col-2">
         <h5 class="d-inline-block mb-0 mt-2 me-5">
             <b>Approved On:</b> N/A
         </h5>
     </div>
 </div>
