@extends('admin.layouts.app') @section('top_nav_panel')
<div class="col-md-4">
  <div class="d-flex">
    <div class="plus" onclick="formReset('/admin/party/store')">
      <i class="fa fa-square-plus" title="Add"></i>
    </div>
    <div class="save">
      <i class="fa fa-save" id="submitButton" title="Save"></i>
    </div>
    <div class="xmark" onclick="deleteData('/admin/party/delete')">
      <i class="fa fa-circle-xmark" title="Delete"></i>
    </div>
    <div class="refresh">
      <i class="fa fa-refresh" title="Reload"></i>
    </div>
    <div class="lock">
      <i class="fa fa-lock" title="Lock"></i>
    </div>
    <div class="ban">
      <i class="fa fa-ban" title="Void"></i>
    </div>
    <div class="backward navigation" data-type="first">
      <i class="fa fa-backward-step" title="First"></i>
    </div>
    <div class="backward navigation" data-type="backward">
      <i class="fa fa-backward" title="Backward"></i>
    </div>
    <div class="forward navigation" data-type="forward">
      <i class="fa fa-forward" title="Forward"></i>
    </div>
    <div class="forward navigation" data-type="last">
      <i class="fa fa-forward-step" title="Last"></i>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="row">
    <div class="col-md-7">
      <div class="d-flex align-items-center">
        <label style="padding: 0px 10px">Search</label>
        <select class="form-select">
          <option></option>
          <option>Search</option>
        </select>
      </div>
    </div>
    <div class="col-md-5">
      <input type="text" class="form-control" />
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="d-flex">
    <div class="check">
      <i class="fa fa-circle-check"></i>
    </div>
    <div class="file-check">
      <i class="fa fa-file-circle-check"></i>
    </div>
    <div class="file_line">
      <i class="fa fa-file-lines"></i>
    </div>
  </div>
</div>
@endsection @section('panel')
<div class="container-xxl flex-grow-1 container-p-y">
  <form
    id="myForm"
    method="post"
    action="{{ route('admin.party.store') }}"
    enctype="multipart/form-data"
  >
    @csrf
    <div class="card mb-4">
      <div class="card-header">
        <h4 class="fw-bold" style="margin-bottom: 0rem">{{ $page_title }}</h4>
        <!--<hr />-->
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-center mb-3">
          <div class="mb-2 px-3">
            <input
              name="calculation_type"
              type="radio"
              class="form-check-input"
              value="customer"
              id="defaultRadio1"
              onclick="cusType(this)"
            />
            <label class="form-check-label" for="defaultRadio1">Customer</label>
          </div>
          <div class="mb-2 px-3">
            <input
              name="calculation_type"
              type="radio"
              class="form-check-input"
              value="vendor"
              id="defaultRadio2"
              onclick="cusType(this)"
            />
            <label class="form-check-label" for="defaultRadio2">Vendor</label>
          </div>
          <div class="mb-2 px-3">
            <input
              name="calculation_type"
              type="radio"
              class="form-check-input"
              value="customer-vendor"
              id="defaultRadio3"
              onclick="cusType(this)"
            />
            <label class="form-check-label" for="defaultRadio3"
              >Customer/Vendor</label
            >
          </div>
          <div class="mb-2 px-3">
            <input
              name="calculation_type"
              type="radio"
              class="form-check-input"
              value="non-gl-parties"
              id="defaultRadio4"
              onclick="cusType(this)"
              checked
            />
            <label class="form-check-label" for="defaultRadio4"
              >Non GL Parties</label
            >
          </div>
          <div class="mb-2 px-3">
            <input
              name="calculation_type"
              type="radio"
              class="form-check-input"
              value="factorating-Country"
              id="defaultRadio5"
              onclick="cusType(this)"
            />
            <label class="form-check-label" for="defaultRadio5"
              >Factorating Country</label
            >
          </div>
        </div>

        <div class="row mb-3">
          <input type="hidden" name="id" value="0" />

          <div class="col-md-3 col-12">
            <div class="mb-2">
              <label class="form-label">Code:</label>
              <input
                name="party_code"
                type="text"
                class="form-control party_code"
                value="{{ $party_num }}"
                placeholder=""
                readonly
              />
            </div>
          </div>
          <div class="col-md-5 col-12">
            <div class="mb-2">
              <label class="form-label">Name:</label>
              <input
                name="party_name"
                type="text"
                class="form-control party_name"
                placeholder=""
              />
            </div>
          </div>
          <div class="col-md-2">
            <div class="mb-2 mt-4">
              <label class="form-check-label mb-2">
                <input
                  type="checkbox"
                  name="party_inactive"
                  value="In-Active"
                  class="form-check-input party_inactive"
                />
                Inactive
              </label>
            </div>
          </div>
          <div class="col-md-2">
            <div class="mb-2 mt-4">
              <button
                type="button"
                class="btn btn-primary btn-sm showlist"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
              >
                Show List
              </button>
            </div>
          </div>
        </div>

        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item" id="tab_1">
            <button
              type="button"
              class="nav-link active"
              role="tab"
              data-bs-toggle="tab"
              data-bs-target="#navs-top-basic_info"
              aria-controls="navs-top-basic_info"
              aria-selected="true"
            >
              Basic Info
            </button>
          </li>
          <li class="nav-item" id="tab_2">
            <button
              type="button"
              class="nav-link"
              role="tab"
              data-bs-toggle="tab"
              data-bs-target="#navs-top-other_info"
              aria-controls="navs-top-other_info"
              aria-selected="false"
            >
              Other Info
            </button>
          </li>
          <li class="nav-item" id="tab_3">
            <button
              type="button"
              class="nav-link"
              role="tab"
              data-bs-toggle="tab"
              data-bs-target="#navs-top-account"
              aria-controls="navs-top-account"
              aria-selected="false"
            >
              Account Detail
            </button>
          </li>
          <li class="nav-item" id="tab_4">
            <button
              type="button"
              class="nav-link"
              role="tab"
              data-bs-toggle="tab"
              data-bs-target="#navs-top-bank_details"
              aria-controls="navs-top-bank_details"
              aria-selected="false"
            >
              ACH / Bank Details
            </button>
          </li>
          <li class="nav-item" id="tab_5">
            <button
              type="button"
              class="nav-link"
              role="tab"
              data-bs-toggle="tab"
              data-bs-target="#navs-top-notification"
              aria-controls="navs-top-notification"
              aria-selected="false"
            >
              Notifications
            </button>
          </li>
          <li class="nav-item" id="tab_6">
            <button
              type="button"
              class="nav-link"
              role="tab"
              data-bs-toggle="tab"
              data-bs-target="#navs-top-insurance"
              aria-controls="navs-top-insurance"
              aria-selected="false"
            >
              Insurance Detail
            </button>
          </li>
          <li class="nav-item" id="tab_7">
            <button
              type="button"
              class="nav-link"
              role="tab"
              data-bs-toggle="tab"
              data-bs-target="#navs-top-company"
              aria-controls="navs-top-company"
              aria-selected="false"
            >
              Company/CostCenter
            </button>
          </li>
          <li class="nav-item" id="tab_8">
            <button
              type="button"
              class="nav-link"
              role="tab"
              data-bs-toggle="tab"
              data-bs-target="#navs-top-localize"
              aria-controls="navs-top-localize"
              aria-selected="false"
            >
              Localize/KYC
            </button>
          </li>
        </ul>
        <div class="tab-content">
          <div
            class="tab-pane fade show active"
            id="navs-top-basic_info"
            role="tabpanel"
          >
            <div class="row">
              <div class="col-md-2 col-12">
                <div class="mb-2">
                  <label class="form-label">Short Name:</label>
                  <input
                    name="short_name"
                    type="text"
                    class="form-control short_name"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-2 col-12">
                <div class="mb-2">
                  <label class="form-label">Registration Date:</label>
                  <input
                    name="reg_date"
                    type="date"
                    value="{{date('Y-m-d')}}"
                    class="form-control reg_date"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-3 col-12">
                <div class="mb-2">
                  <label class="form-label">Licence No/Custom Code:</label>
                  <input
                    name="license_no"
                    type="text"
                    class="form-control license_no"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-2 col-12">
                <div class="mb-2">
                  <label class="form-label">Contact Person:</label>
                  <input
                    name="contact_person"
                    type="text"
                    class="form-control contact_person"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-3 col-12">
                <div class="mb-2">
                  <label class="form-label">NTN:</label>
                  <input
                    name="ntn"
                    type="text"
                    class="form-control ntn"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-2 col-12">
                <div class="mb-2">
                  <label class="form-label">STRN:</label>
                  <input
                    name="strn"
                    type="text"
                    class="form-control strn"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-5 col-12">
                <div class="mb-2">
                  <label class="form-label">Address 1:</label>
                  <input
                    name="address1"
                    type="text"
                    class="form-control address1"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-5 col-12">
                <div class="mb-2">
                  <label class="form-label">Address 2:</label>
                  <input
                    name="address2"
                    type="text"
                    class="form-control address2"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-2">
                  <label class="form-label">Address 3:</label>
                  <input
                    name="address3"
                    type="text"
                    class="form-control address3"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-3 col-12">
                <div class="mb-2">
                  <label class="form-label">City:</label>
                  <input
                    name="city"
                    type="text"
                    class="form-control city"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-3 col-12">
                <div class="mb-2">
                  <label class="form-label">Zipcode:</label>
                  <input
                    name="zipcode"
                    type="text"
                    class="form-control zipcode"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-3 col-12">
                <div class="mb-2">
                  <label class="form-label">Tel #1:</label>
                  <input
                    name="tel_1"
                    type="text"
                    class="form-control tel_1"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-3 col-12">
                <div class="mb-2">
                  <label class="form-label">Tel #2:</label>
                  <input
                    name="tel_2"
                    type="text"
                    class="form-control tel_2"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-3 col-12">
                <div class="mb-2">
                  <label class="form-label">Facsimile:</label>
                  <input
                    name="facsimile"
                    type="text"
                    class="form-control facsimile"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-3 col-12">
                <div class="mb-2">
                  <label class="form-label">Mobile:</label>
                  <input
                    name="mobile"
                    type="text"
                    class="form-control mobile"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-2">
                  <label class="form-label">Website:</label>
                  <input
                    name="website"
                    type="text"
                    class="form-control website"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-2">
                  <label class="form-label">E-mail:</label>
                  <input
                    name="email"
                    type="text"
                    class="form-control email"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-2">
                  <label class="form-label">Account Dept E-mail:</label>
                  <input
                    name="acc_dept_email"
                    type="text"
                    class="form-control acc_dept_email"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-12 col-12 mt-3">
                <label class="form-check-label mb-2"
                  ><input
                    name="operation"
                    value="Operation"
                    type="checkbox"
                    class="form-check-input operation"
                  /><span>&nbsp;Operation:</span></label
                >
                <div class="d-flex">
                  <div class="mb-2">
                    <label class="form-label"></label>
                    <input
                      name="operation_check[]"
                      type="checkbox"
                      value="Sea-Export"
                      class="form-check-input operation_check"
                    /><span>&nbsp;Sea Export</span>
                  </div>
                  <div class="mb-2 px-3">
                    <label class="form-label"></label>
                    <input
                      name="operation_check[]"
                      type="checkbox"
                      value="Sea-Import"
                      class="form-check-input operation_check"
                    /><span>&nbsp;Sea Import</span>
                  </div>
                  <div class="mb-2 px-3">
                    <label class="form-label"></label>
                    <input
                      name="operation_check[]"
                      type="checkbox"
                      value="Air-Export"
                      class="form-check-input operation_check"
                    /><span>&nbsp;Air Export</span>
                  </div>
                  <div class="mb-2 px-3">
                    <label class="form-label"></label>
                    <input
                      name="operation_check[]"
                      type="checkbox"
                      value="Air-Import"
                      class="form-check-input operation_check"
                    /><span>&nbsp;Air Import</span>
                  </div>
                  <div class="mb-2 px-3">
                    <label class="form-label"></label>
                    <input
                      name="operation_check[]"
                      type="checkbox"
                      value="Logistics"
                      class="form-check-input operation_check"
                    /><span>&nbsp;Logistics</span>
                  </div>
                  <div class="mb-2 px-3">
                    <label class="form-label"></label>
                    <input
                      name="operation_check[]"
                      type="checkbox"
                      value="Warehouse"
                      class="form-check-input operation_check"
                    /><span>&nbsp;Warehouse</span>
                  </div>
                  <div class="mb-2 px-3">
                    <label class="form-label"></label>
                    <input
                      name="operation_check[]"
                      type="checkbox"
                      value="Depot"
                      class="form-check-input operation_check"
                    /><span>&nbsp;Depot</span>
                  </div>
                  <div class="mb-2 px-3">
                    <label class="form-label"></label>
                    <input
                      name="operation_check[]"
                      type="checkbox"
                      value="Other"
                      class="form-check-input operation_check"
                    /><span>&nbsp;Other</span>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-12 mt-3">
                <label class="form-check-label mb-2">Type:</label>
                <div class="row type_row">
                  <div class="col-md-3">
                    <div class="mb-2">
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Shipper"
                          class="form-check-input"
                        />
                        Shipper </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Consignee"
                          class="form-check-input"
                        />
                        Consignee </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Notify"
                          class="form-check-input"
                        />
                        Notify </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Potential-Customer"
                          class="form-check-input"
                        />
                        Potential Customer </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Forwarder-Calender"
                          class="form-check-input"
                        />
                        Forwarder/Calender </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Local-Vendor"
                          class="form-check-input"
                        />
                        Local Vendor </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Overseas-Agent"
                          class="form-check-input"
                          disabled
                        />
                        Overseas Agent </label
                      ><br />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-2">
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Commision-Agent"
                          class="form-check-input"
                        />
                        Commision Agent </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Indentor"
                          class="form-check-input"
                        />
                        Indentor </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Transporter"
                          class="form-check-input"
                        />
                        Transporter </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="CHA-CHB"
                          class="form-check-input"
                        />
                        CHA/CHB </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Shipping-Line"
                          class="form-check-input"
                        />
                        Shipping Line </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Delivery-Agent"
                          class="form-check-input"
                        />
                        Delivery Agent </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Warehouse"
                          class="form-check-input"
                        />
                        Warehouse </label
                      ><br />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-2">
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Buying-House"
                          class="form-check-input"
                        />
                        Buying House </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Airline"
                          class="form-check-input"
                        />
                        Airline </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Trucking"
                          class="form-check-input"
                        />
                        Trucking </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Drayman"
                          class="form-check-input"
                        />
                        Drayman </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Cartage"
                          class="form-check-input"
                        />
                        Cartage </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Stevedore"
                          class="form-check-input"
                        />
                        Stevedore </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Principal"
                          class="form-check-input"
                        />
                        Principal </label
                      ><br />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="mb-2">
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Depot"
                          class="form-check-input"
                        />
                        Depot </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Terminal"
                          class="form-check-input"
                        />
                        Terminal </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Buyer"
                          class="form-check-input"
                        />
                        Buyer </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Invoice-Party"
                          class="form-check-input"
                        />
                        Invoice Party </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Slot Operator"
                          class="form-check-input"
                        />
                        Slot Operator </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Investor"
                          class="form-check-input"
                        />
                        Investor </label
                      ><br />
                      <label class="form-check-label mb-2">
                        <input
                          type="checkbox"
                          name="Type[]"
                          value="Non-Operational-Party"
                          class="form-check-input"
                        />
                        Non Operational Party </label
                      ><br />
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-12 mt-5">
                <div class="d-flex">
                  <div class="mb-2">
                    <label class="form-label"></label>
                    <input
                      name="nomination[]"
                      type="checkbox"
                      class="form-check-input"
                    /><span>&nbsp;Import Nomination</span>
                  </div>
                  <div class="mb-2 px-3">
                    <label class="form-label"></label>
                    <input
                      name="nomination[]"
                      type="checkbox"
                      class="form-check-input"
                    /><span>&nbsp;Export Nomination</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 mt-4">
                <div class="mb-2">
                  <label class="form-label">SCAC/IATA Code:</label>
                  <input
                    name="scac_iata_code"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-5 mt-4">
                <div class="mb-2">
                  <label class="form-label"></label>
                  <input
                    name="restriction"
                    type="checkbox"
                    class="form-check-input"
                  /><span>&nbsp;Apply Company Restriction</span>
                </div>
                <div class="mb-2">
                  <label class="form-label"></label>
                  <input
                    name="restriction"
                    type="checkbox"
                    class="form-check-input"
                  /><span>&nbsp;Apply Cost Center Restriction</span>
                </div>
              </div>
              <div class="col-md-12 mt-4">
                <div class="d-flex">
                  <button class="btn btn-primary btn-sm">Local Detail</button>
                  <button class="btn btn-primary btn-sm mx-2">
                    Contact Detail
                  </button>
                  <button class="btn btn-primary btn-sm">Alert</button>
                  <button class="btn btn-primary btn-sm mx-2">
                    Party Exception
                  </button>
                  <button class="btn btn-primary btn-sm">Commodity</button>
                  <button class="btn btn-primary btn-sm mx-2">
                    Active & Inactive Log
                  </button>
                  <button class="btn btn-primary btn-sm">Commitments</button>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="navs-top-other_info" role="tabpanel">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-2">
                  <label class="form-label">Type of Ownership:</label>
                  <div class="d-flex justify-content-between">
                    <div>
                      <input
                        type="radio"
                        value="Corporation"
                        name="ownership[]"
                        class="form-check-input"
                      /><span>&nbsp;Corporation</span>
                    </div>
                    <div>
                      <input
                        type="radio"
                        value="Partnership"
                        name="ownership[]"
                        class="form-check-input"
                      /><span>&nbsp;Partnership</span>
                    </div>
                    <div>
                      <input
                        type="radio"
                        value="Sole-Proprietorship"
                        name="ownership[]"
                        class="form-check-input"
                      /><span>&nbsp;Sole Proprietorship</span>
                    </div>
                    <div>
                      <input
                        type="radio"
                        value="Others"
                        name="ownership[]"
                        class="form-check-input"
                      /><span>&nbsp;Others</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-2">
                  <label class="form-label">Affiliated Companies:</label>
                  <input
                    type="text"
                    name="affiliated_companies"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-3">
                <div class="mb-2">
                  <label class="form-label">Fed ID No:</label>
                  <input
                    type="text"
                    name="fed_id"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-3">
                <div class="mb-2">
                  <label class="form-label">Type of Business:</label>
                  <input
                    type="text"
                    name="business_type"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-2">
                <div class="mb-2">
                  <label class="form-label">Year Company Established:</label>
                  <input
                    type="text"
                    name="year_company_establised"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-2">
                <div class="mb-2">
                  <label class="form-label"># of Employees:</label>
                  <input
                    type="text"
                    name="no_of_employee"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-2">
                <div class="mb-2">
                  <label class="form-label">Est Annual Sales:</label>
                  <input
                    type="text"
                    name="est_annual_sales"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-2">
                <div class="mb-2">
                  <label class="form-label">D & B#:</label>
                  <input
                    type="text"
                    name="d_b"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-2">
                  <label class="form-label">NTN Name:</label>
                  <input
                    type="text"
                    name="ntn_name"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-3">
                <div class="mb-2">
                  <label class="form-label">Buyer Type:</label>
                  <select name="buyer_type" class="form-select">
                    <option selected disabled></option>
                    <option value="End-Cunsumer">End Consumer</option>
                    <option value="Intermediary">Intermediary</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12 mt-4">
                <div class="d-flex align-items-center">
                  <div>
                    <input
                      type="checkbox"
                      name="specific_credit_card"
                      value="Specific-Credit-Card"
                      class="form-check-input"
                    /><span>&nbsp;Specific Credit Card Charges %</span>
                  </div>
                  <div class="px-3">
                    <input
                      type="number"
                      name="specific_credit_card_box"
                      class="form-control"
                    />
                  </div>
                </div>
              </div>
              <div class="col-md-3 mt-3">
                <div class="mb-2">
                  <label class="form-label">Due Days:</label>
                  <input
                    type="text"
                    name="due_days"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-3 mt-3">
                <div class="mb-2">
                  <label class="form-label">Credit Unit:</label>
                  <input
                    type="text"
                    name="credit_unit"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-3 mt-3">
                <div class="mb-2">
                  <label class="form-label">Expiry Date:</label>
                  <input
                    type="text"
                    name="expiry_dates"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-3 mt-3">
                <div class="mb-2 mt-4">
                  <button class="btn btn-primary">
                    Update due days on invoices
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="navs-top-account" role="tabpanel">
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <input
                    type="checkbox"
                    name="manual_account"
                    style="width: 16px; height: 16px"
                  /><span>&nbsp;Manual Account</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-2">
                  <label class="form-label">Parent Account:</label>
                  <input
                    name="parent_account"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-2">
                  <label class="form-label">Account:</label>
                  <input
                    name="account"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-2">
                  <label class="form-label">Sale Rep:</label>
                  <input
                    name="sale_rep"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-2">
                  <label class="form-label">Doc Rep:</label>
                  <input
                    name="doc_rep"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-2">
                  <label class="form-label">Account Rep:</label>
                  <input
                    name="account_rep"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-2">
                  <label class="form-label">Referred By:</label>
                  <input
                    name="referred_by"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-2">
                  <label class="form-label">Currency:</label>
                  <select class="form-select" name="currency">
                    <option value="PKR">PKR</option>
                    <option value="USD">USD</option>
                    <option value="AED">AED</option>
                    <option value="GPB">GPB</option>
                    <option value="EUR">EUR</option>
                    <option value="BDT">BDT</option>
                    <option value="OMR">OMR</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-2">
                  <label class="form-label">Customer GRP:</label>
                  <input
                    name="customer_grp"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-2 mt-4">
                  <input
                    name=""
                    class="sub_type sub_check form-check-input"
                    type="checkbox"
                  /><span>&nbsp; &nbsp;Show Sub Type</span>
                </div>
              </div>
              <div class="col-md-12">
                <div class="sub_type_check">
                  <div class="d-flex justify-content-between mt-4">
                    <div>
                      <input
                        name="sub_type_input[]"
                        type="checkbox"
                        class="form-check-input"
                      /><span>&nbsp;ACH</span>
                    </div>
                    <div>
                      <input
                        name="sub_type_input[]"
                        type="checkbox"
                        class="form-check-input"
                      /><span>&nbsp;Wire Transfer</span>
                    </div>
                    <div>
                      <input
                        name="sub_type_input[]"
                        type="checkbox"
                        class="form-check-input"
                      /><span>&nbsp;Online Transfer</span>
                    </div>
                    <div>
                      <input
                        name="sub_type_input[]"
                        type="checkbox"
                        class="form-check-input"
                      /><span>&nbsp;Credit Card</span>
                    </div>
                    <div>
                      <input
                        name="sub_type_input[]"
                        type="checkbox"
                        class="form-check-input"
                      /><span>&nbsp;Cheque</span>
                    </div>
                    <div>
                      <input
                        name="sub_type_input[]"
                        type="checkbox"
                        class="form-check-input"
                      /><span>&nbsp;PO</span>
                    </div>
                    <div>
                      <input
                        name="sub_type_input[]"
                        type="checkbox"
                        class="form-check-input"
                      /><span>&nbsp;TT</span>
                    </div>
                    <div>
                      <input
                        name="sub_type_input[]"
                        type="checkbox"
                        class="form-check-input"
                      /><span>&nbsp;Cash</span>
                    </div>
                    <div>
                      <input
                        name="sub_type_input[]"
                        type="checkbox"
                        class="form-check-input"
                      /><span>&nbsp;Party</span>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between mt-3">
                    <div>
                      <input
                        name="sub_type_input[]"
                        type="checkbox"
                        class="form-check-input"
                      /><span>&nbsp;Online Personal A/C</span>
                    </div>
                    <div>
                      <input
                        name="sub_type_input[]"
                        type="checkbox"
                        class="form-check-input"
                      /><span>&nbsp;Personal Cheque</span>
                    </div>
                    <div>
                      <input
                        name="sub_type_input[]"
                        type="checkbox"
                        class="form-check-input"
                      /><span>&nbsp;Digital Wallet</span>
                    </div>
                    <div>
                      <input
                        name="sub_type_input[]"
                        type="checkbox"
                        class="form-check-input"
                      /><span>&nbsp;Atm Transfer</span>
                    </div>
                    <div>
                      <input
                        name="sub_type_input[]"
                        type="checkbox"
                        class="form-check-input"
                      /><span>&nbsp;Open PO</span>
                    </div>
                    <div>
                      <input
                        name="sub_type_input[]"
                        type="checkbox"
                        class="form-check-input"
                      /><span>&nbsp;Pay Cargo</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="navs-top-bank_details" role="tabpanel">
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <input
                    type="checkbox"
                    value="ach_authority"
                    style="width: 15px; height: 15px"
                  />&nbsp; ACH Authority
                </div>
              </div>
              <div class="col-md-5">
                <div class="mb-2">
                  <label class="form-label">Account Title:</label>
                  <input
                    name="account_title"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-3">
                <div class="mb-2">
                  <label class="form-label">Bank:</label>
                  <input
                    name="bank"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-2">
                  <label class="form-label">Bank Name:</label>
                  <input
                    name="bank_name"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-2">
                  <label class="form-label">Account No:</label>
                  <input
                    name="account_no"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-2">
                  <label class="form-label">Iban:</label>
                  <input
                    name="iban"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-2">
                <div class="mb-2">
                  <label class="form-label">Branch Code:</label>
                  <input
                    name="branch_code"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-2">
                <div class="mb-2">
                  <label class="form-label">Swift Code:</label>
                  <input
                    name="swift_code"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-3">
                <div class="mb-2">
                  <label class="form-label">Routing No:</label>
                  <input
                    name="iban"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-3">
                <div class="mb-2">
                  <label class="form-label">IFSC Code:</label>
                  <input
                    name="ifsc"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-3">
                <div class="mb-2">
                  <label class="form-label">MICR Code:</label>
                  <input
                    name="micr"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-2">
                  <label class="form-label">Remarks:</label>
                  <textarea
                    class="form-control"
                    name="remarks"
                    rows="4"
                  ></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-2">
                  <label class="form-label">Autherization Date:</label>
                  <input
                    name="auth_date"
                    type="date"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-2">
                  <label class="form-label">Autherization By:</label>
                  <input
                    name="auth_by"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="navs-top-notification" role="tabpanel">
            <div class="p-3">
              <table class="datatables-basic table">
                <thead>
                  <tr>
                    <th>...</th>
                    <th>S.No</th>
                    <th>Notifications</th>
                    <th>Disabled</th>
                    <th>Email Address</th>
                    <th>Operation Type</th>
                  </tr>
                </thead>
                <tbody>
                  <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                  <td><input name="" type="text" style="width: 100%" /></td>
                  <td>
                    <input
                      name="notification[]"
                      type="text"
                      style="width: 100%"
                    />
                  </td>
                  <td>
                    <input
                      name="disabled[]"
                      type="checkbox"
                      disabled
                      style="width: 16px; height: 16px"
                    />
                  </td>
                  <td>
                    <input
                      name="email_address[]"
                      type="text"
                      style="width: 100%"
                    />
                  </td>
                  <td>
                    <select name="operation_type[]" style="width: 100%">
                      <option value="air_export">Air Export</option>
                      <option value="air_import">Air Import</option>
                      <option value="sea_export">Sea Export</option>
                      <option value="sea_import">Sea Import</option>
                      <option value="logistics">Logistics</option>
                      <option value="warehouse">Warehouse</option>
                      <option value="other">Other</option>
                      <option value="all">All</option>
                    </select>
                  </td>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="navs-top-insurance" role="tabpanel">
            <div class="p-3">
              <table class="datatables-basic table">
                <thead>
                  <tr>
                    <th>...</th>
                    <th>S.No</th>
                    <th>Insurance Company</th>
                    <th>Insurance Type</th>
                    <th>Policy Value</th>
                    <th>Policy#</th>
                    <th>Expiry Date</th>
                  </tr>
                </thead>
                <tbody>
                  <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                  <td><input name="" type="text" style="width: 100%" /></td>
                  <td>
                    <select
                      name="insurace_company[]"
                      style="width: 100%"
                    ></select>
                  </td>
                  <td>
                    <select
                      name="insurance_type[]"
                      style="width: 100%"
                    ></select>
                  </td>
                  <td>
                    <input
                      name="policy_value[]"
                      type="text"
                      style="width: 100%"
                    />
                  </td>
                  <td>
                    <input name="policy_no[]" type="text" style="width: 100%" />
                  </td>
                  <td>
                    <input
                      name="expiry_date[]"
                      type="text"
                      style="width: 100%"
                    />
                  </td>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="navs-top-company" role="tabpanel">
            <div class="p-3">
              <h5 class="text-center">Company</h5>
              <input
                name="inactive"
                type="checkbox"
                style="width: 15px; height: 15px"
              /><span>&nbsp;Apply Company Restriction:</span>
              <table class="datatables-basic table">
                <thead>
                  <tr>
                    <th>
                      <input
                        type="checkbox"
                        style="width: 16px; height: 16px"
                      />
                    </th>
                    <th>Company</th>
                    <th>Default</th>
                  </tr>
                </thead>
                <tbody>
                  <td>
                    <input type="checkbox" style="width: 16px; height: 16px" />
                  </td>
                  <td>
                    <input name="company[]" type="text" style="width: 100%" />
                  </td>
                  <td>
                    <input name="default[]" type="text" style="width: 100%" />
                  </td>
                </tbody>
              </table>
            </div>
            <div class="p-3 mt-3">
              <h5 class="text-center">Cost Center</h5>
              <input
                name="inactive"
                type="checkbox"
                style="width: 15px; height: 15px"
              /><span>&nbsp;Apply Cost Center Restriction:</span>
              <table class="datatables-basic table">
                <thead>
                  <tr>
                    <th>
                      <input
                        type="checkbox"
                        style="width: 16px; height: 16px"
                      />
                    </th>
                    <th>Cost Center</th>
                    <th>Distribution Name</th>
                  </tr>
                </thead>
                <tbody>
                  <td>
                    <input type="checkbox" style="width: 16px; height: 16px" />
                  </td>
                  <td name="cost_center[]">
                    <input type="text" style="width: 100%" />
                  </td>
                  <td name="distribution[]">
                    <input type="text" style="width: 100%" />
                  </td>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="navs-top-localize" role="tabpanel">
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="mb-2">
                  <label class="form-label">Name:</label>
                  <input
                    name="name"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-2">
                  <label class="form-label">Address 1:</label>
                  <input
                    name="address1"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-2">
                  <label class="form-label">Address 2:</label>
                  <input
                    name="address2"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-6 col-12">
                <div class="mb-2">
                  <label class="form-label">Address 3:</label>
                  <input
                    name="address3"
                    type="text"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-12 col-12">
                <div class="mb-2 mt-4">
                  <label class="form-label"></label>
                  <input
                    name="kyc"
                    type="checkbox"
                    style="width: 15px; height: 15px"
                  /><span>&nbsp;KYC Verification Done</span>
                </div>
              </div>
              <div class="col-md-3 col-12">
                <div class="mb-2 mt-4">
                  <label class="form-label">KYC Date</label>
                  <input
                    type="date"
                    name="kyc_date"
                    class="form-control"
                    placeholder=""
                  />
                </div>
              </div>
              <div class="col-md-9 col-12">
                <div class="mb-2 mt-4">
                  <label class="form-label">Remarks</label>
                  <textarea
                    class="form-control"
                    name="kyc_remarks"
                    rows="4"
                  ></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<!-- Modal -->
<div
  class="modal fade"
  id="exampleModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Party listing</h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <div class="responsive text-nowrap">
          <table class="table table-bordered table-sm quotation_record">
            <thead class="table-primary">
              <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!--<div class="modal-footer">-->
      <!--  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
      <!--  <button type="button" class="btn btn-primary">Save changes</button>-->
      <!--</div>-->
    </div>
  </div>
</div>
@endsection @push('script')
<script>
  var datatable = null;

  $(document).ready(function () {
    datatable = $(".quotation_record").DataTable({
      select: {
        style: "api",
      },
      processing: true,
      searching: false,
      serverSide: true,
      lengthChange: false,
      pageLength: 10,
      scrollX: true,
      ajax: {
        url: "{{ route('admin.party.create') }}",
        type: "get",
        data: function (d) {},
      },
      columns: [
        {
          data: "party_code",
          title: "code",
        },
        {
          data: "party_name",
          title: "Name:",
        },
        {
          data: "short_name",
          title: "Short Name:",
        },
        {
          data: "operation_check",
          title: "Operation Type",
        },
        {
          data: "Type",
          title: "Type",
        },
      ],
      rowCallback: function (row, data) {
        $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`);
      },
    });
  });

  $(".sub_type_check").hide();
  $(".sub_check").click(function () {
    if ($(this).prop("checked") == true) {
      $(".sub_type_check").show();
    } else {
      $(".sub_type_check").hide();
    }
  });

  function cusType(e) {
    let val = $(e).val();
    let tab_1 = $("#tab_1");
    let tab_2 = $("#tab_2");
    let tab_3 = $("#tab_3");
    let tab_4 = $("#tab_4");
    let tab_5 = $("#tab_5");
    let tab_6 = $("#tab_6");
    let tab_7 = $("#tab_7");
    let tab_8 = $("#tab_8");

    if (val == "customer") {
      $(tab_1).show();
      $(tab_2).show();
      $(tab_3).show();
      $(tab_4).show();
      $(tab_5).show();
      $(tab_6).hide();
      $(tab_7).show();
      $(tab_8).show();
      $(".type_row").find("input[value=Overseas-Agent]").attr("disabled", true);
      $(".type_row").find("input[value=Principal]").attr("disabled", true);
      $(".type_row").find("input[value=Non-Operational-Party]").attr("disabled", true);
    } else if (val == "vendor") {
      $(tab_1).show();
      $(tab_2).show();
      $(tab_3).show();
      $(tab_4).show();
      $(tab_5).show();
      $(tab_6).show();
      $(tab_7).show();
      $(tab_8).show();
      $(".type_row").find("input[value=Overseas-Agent]").attr("disabled", true);
      $(".type_row").find("input[value=Principal]").attr("disabled", true);
      $(".type_row").find("input[value=Non-Operational-Party]").attr("disabled", false);
    } else if (val == "customer-vendor") {
      $(tab_1).show();
      $(tab_2).show();
      $(tab_3).show();
      $(tab_4).show();
      $(tab_5).show();
      $(tab_6).show();
      $(tab_7).show();
      $(tab_8).show();
      $(".type_row").find("input[value=Overseas-Agent]").attr("disabled", false);
      $(".type_row").find("input[value=Principal]").attr("disabled", false);
      $(".type_row").find("input[value=Non-Operational-Party]").attr("disabled", true);
    } else if (val == "non-gl-parties") {
      $(tab_1).show();
      $(tab_2).hide();
      $(tab_3).show();
      $(tab_4).hide();
      $(tab_5).show();
      $(tab_6).hide();
      $(tab_7).show();
      $(tab_8).show();
      $(".type_row").find("input[value=Overseas-Agent]").attr("disabled", false);
      $(".type_row").find("input[value=Principal]").attr("disabled", false);
      $(".type_row").find("input[value=Non-Operational-Party]").attr("disabled", false);
    } else if (val == "factorating-Country") {
      $(tab_1).show();
      $(tab_2).hide();
      $(tab_3).show();
      $(tab_4).hide();
      $(tab_5).show();
      $(tab_6).hide();
      $(tab_7).show();
      $(tab_8).show();
      $(".type_row").find("input[value=Overseas-Agent]").attr("disabled", false);
      $(".type_row").find("input[value=Principal]").attr("disabled", false);
      $(".type_row").find("input[value=Non-Operational-Party]").attr("disabled", false);
    } else {
      $(tab_1).show();
      $(tab_2).show();
      $(tab_3).show();
      $(tab_4).show();
      $(tab_5).show();
      $(tab_6).show();
      $(tab_7).show();
      $(tab_8).show();
      $(".type_row").find("input[value=Overseas-Agent]").attr("disabled", false);
      $(".type_row").find("input[value=Principal]").attr("disabled", false);
      $(".type_row").find("input[value=Non-Operational-Party]").attr("disabled", false);
    }
    
    $(".type_row input").parent().css("opacity", "1");
    $(".type_row input[disabled=disabled]").parent().css("opacity", "0.5");
  }

  cusType($("#defaultRadio4"));

  $("#submitButton").click(function () {
    $("#myForm").submit();
  });

  function edit_row(e, data) {
    data = JSON.parse(data);
    if (data) {
      // PARTY BASIC INFO
      $(".party_code").val(data.party_code);
      $(".party_name").val(data.party_name);
      $(".party_inactive").val(data.party_inactive);
      $(".short_name").val(data.short_name);
      $(".reg_date").val(data.reg_date);
      $(".license_no").val(data.license_no);
      $(".contact_person").val(data.contact_person);
      $(".ntn").val(data.ntn);
      $(".strn").val(data.strn);
      $(".address1").val(data.address1);
      $(".address2").val(data.address2);
      $(".address3").val(data.address3);
      $(".city").val(data.city);
      $(".zipcode").val(data.zipcode);
      $(".tel_1").val(data.tel_1);
      $(".tel_2").val(data.tel_2);
      $(".facsimile").val(data.facsimile);
      $(".mobile").val(data.mobile);
      $(".website").val(data.website);
      $(".email").val(data.email);
      $(".acc_dept_email").val(data.acc_dept_email);
      $(".operation").val(data.operation);

      $(".operation_check").removeAttr("checked");
      $(`.operation_check[value=${data.operation_check}]`).attr(
        "checked",
        true
      );

      $(".Type").removeAttr("checked");
      $(`.Type[value=${data.Type}]`).attr("checked", true);

      $(".nomination").removeAttr("checked");
      $(`.nomination[value=${data.nomination}]`).attr("checked", true);

      $(".scac_iata_code").val(data.scac_iata_code);

      $(".restriction").removeAttr("checked");
      $(`.restriction[value=${data.restriction}]`).attr("checked", true);
      // PARTY BASIC INFO END

      // PARTY OTHER INFO
      $(".ownership").removeAttr("checked");
      $(`.ownership[value=${data.ownership}]`).attr("checked", true);
      $(".affiliated_companies").val(data.affiliated_companies);
      $(".fed_id").val(data.fed_id);
      $(".business_type").val(data.business_type);
      $(".year_company_establised").val(data.year_company_establised);
      $(".no_of_employee").val(data.no_of_employee);
      $(".est_annual_sales").val(data.est_annual_sales);
      $(".d_b").val(data.d_b);
      $(".ntn_name").val(data.ntn_name);
      $(".buyer_type").val(data.buyer_type);
      $(".specific_credit_card").val(data.specific_credit_card);
      $(".due_days").val(data.due_days);
      $(".credit_unit").val(data.credit_unit);
      $(".expiry_date").val(data.expiry_date);
      // PARTY BASIC INFO END

      // PARTY ACCOUNT DETAIL INFO
      $(".manual_account").removeAttr("checked");
      $(`.manual_account[value=${data.manual_account}]`).attr("checked", true);

      $(".parent_account").val(data.parent_account);
      $(".account").val(data.account);
      $(".sale_rep").val(data.sale_rep);
      $(".doc_rep").val(data.doc_rep);
      $(".account_rep").val(data.account_rep);
      $(".referred_by").val(data.referred_by);
      $(".currency").val(data.currency);
      $(".customer_grp").val(data.customer_grp);

      $(".sub_type").removeAttr("checked");
      $(`.sub_type[value=${data.sub_type}]`).attr("checked", true);

      $(".sub_type_input").removeAttr("checked");
      $(`.sub_type_input[value=${data.sub_type_input}]`).attr("checked", true);
      // PARTY ACCOUNT DETAIL INFO END

      // ACH BANK DETAIL INFO
      $(".ach_authority").removeAttr("checked");
      $(`.ach_authority[value=${data.ach_authority}]`).attr("checked", true);
      $(".account_title").val(data.account_title);
      $(".bank").val(data.bank);
      $(".bank_name").val(data.bank_name);
      $(".account_no").val(data.account_no);
      $(".iban").val(data.iban);
      $(".branch_code").val(data.branch_code);
      $(".swift_code").val(data.swift_code);
      $(".routing_no").val(data.routing_no);
      $(".ifsc_code").val(data.ifsc_code);
      $(".micr_code").val(data.micr_code);
      $(".remarks").val(data.remarks);
      $(".auth_date").val(data.auth_date);
      $(".auth_by").val(data.auth_by);
      // ACH BANK DETAIL INFO END

      $("#myForm").attr("action", "{{ route('admin.party.update') }}");
      $("input[name=id]").val(data.id);
    }
  }

  $(".navigation").click(function () {
    let id = $("input[name=id]").val();
    let route = "/admin/party/get";
    let type = $(this).attr("data-type");
    let data = getList(route, type, id);
    if (data != null) {
      edit_row("", JSON.stringify(data));
    }
  });
</script>
@endpush
