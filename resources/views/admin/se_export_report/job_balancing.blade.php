@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus">
            <i class="fa fa-square-plus"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton"></i>
        </div>
        <div class="xmark">
            <i class="fa fa-circle-xmark"></i>
        </div>
        <div class="refresh">
            <i class="fa fa-refresh"></i>
        </div>
        <div class="lock">
            <i class="fa fa-lock"></i>
        </div>
        <div class="ban">
            <i class="fa fa-ban"></i>
        </div>
        <div class="backward">
            <i class="fa fa-backward-step"></i>
        </div>
        <div class="backward">
            <i class="fa fa-backward"></i>
        </div>
        <div class="forward">
            <i class="fa fa-forward"></i>
        </div>
        <div class="forward">
            <i class="fa fa-forward-step"></i>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="row">
        <div class="col-md-7">
            <div class="d-flex align-items-center">
                <label style="padding:0px 10px;">Search</label>
                <select class="form-select">
                    <option></option>
                    <option>Search</option>
                </select>
            </div>
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control"/>
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
@endsection


@section('style')
<style>
    p{
    padding-bottom: 0;
    margin-bottom: 0;
}
.first{
    border: 1px solid #ccc;
    border-radius: 4px solid #ccc;
}
.btn-secondary{
    background-color: #fff !important;
    border-radius: 2px solid black !important;
    color: #ccc !important;
}
.top{
    border: 1px solid #ccc;
    border-radius: 4px solid #ccc;
}
.oper{
    border: 1px solid #ccc;
    border-radius: 2px;
    font-size: 14px;
}
.bold{
    font-weight: 700;
}
.cate{
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 2px;
}
#num{
    width: 7rem;
}
.amount{
    border: 1px solid #ccc;
    border-radius: 2px;
    width: max-content;
}
.status{
    border: 1px solid #ccc;
    border-radius: 2px;
}
.Gro{
    padding-left: 0;
}
.group-by{
    width: 157px;
}
.groups{
    height: 146px;
    line-height: 20px;
}
.group-by .btn-group button{
    padding-left: 5rem !important;
    padding-right: 5rem !important;
}
.border{
    border: 1px solid #ccc !important;
    border-radius: 2px;
    width: max-content;
}
label{
    font-size: 14px;
}
.curr-btn button{
    padding-left: 5rem !important;
    padding-right: 5rem !important;
}
.border1{
    border: 1px solid #ccc;
    padding-left: 0.5rem ;
    padding-right: 0.5rem ;
}
#dropdown{
    padding-left: 3rem;
    padding-right: 3rem;
    font-size: 14px;
}
#dropdown1{
    padding-left: 1.5rem;
    padding-right: 1.5rem;
    font-size: 14px;
}
#dropdown2{
    padding-left: 1rem;
    padding-right: 1rem;
    font-size: 14px;
}
#dropdown3{
    padding-left: 0.8rem;
    padding-right: 0.8rem;
    font-size: 14px;
}
ul{
    list-style: none;
}
.height{
    height: max-content;
}
.type{
    gap: 20%;
}
</style>
@endsection

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        
                          <div class="row d-flex align-items-center top py-1">
                            <div class="col-md-4">
                              <div class="d-flex align-items-center">
                                <div class="text">
                                  <p>Date type : &nbsp;</p>
                                </div>
                                <div class="btn-group">
                                  <button
                                    class="btn btn-secondary btn-sm dropdown-toggle"
                                    type="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                  >
                                    Invoice Data
                                  </button>
                                  <ul class="dropdown-menu">
                                    ...
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="d-flex align-items-center">
                                <div class="text">
                                  <p>Date form : &nbsp;</p>
                                </div>
                                <input type="date" />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="d-flex align-items-center">
                                <div class="text">
                                  <p>Date till : &nbsp;</p>
                                </div>
                                <input type="date" />
                              </div>
                            </div>
                          </div>
                
                          <div class="row mt-2">
                            <div class="col-md-4">
                              <p class="bold">All Operation Types</p>
                              <div class="oper d-flex flex-column ps-2 pt-1">
                                <div>
                                  <input type="checkbox" class="form-check-input" id="sea" />
                                  <label for="sea">Sea Exports</label>
                                </div>
                                <div>
                                  <input type="checkbox" class="form-check-input" id="air" />
                                  <label for="air">Air Exports</label>
                                </div>
                                <div>
                                  <input type="checkbox" class="form-check-input" id="sea-imp" />
                                  <label for="sea-imp">Sea Imports</label>
                                </div>
                                <div>
                                  <input type="checkbox" class="form-check-input" id="air-imp" />
                                  <label for="air-imp">Air Imports</label>
                                </div>
                                <div>
                                  <input type="checkbox" class="form-check-input" id="logis" />
                                  <label for="logis">Logistics</label>
                                </div>
                                <div>
                                  <input type="checkbox" class="form-check-input" id="ware" />
                                  <label for="ware">Ware House</label>
                                </div>
                                <div>
                                  <input type="checkbox" class="form-check-input" id="house" />
                                  <label for="house">House</label>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <p class="bold">Sort By</p>
                              <div class="oper d-flex flex-column ps-2 pt-1">
                                <div>
                                  <input type="radio" class="form-check-input" class="form-check-input" id="job" name="oper" />
                                  <label for="job">Job No</label>
                                </div>
                                <div>
                                  <input type="radio" class="form-check-input" id="Invoice" name="oper" />
                                  <label for="Invoice">Invoice Date</label>
                                </div>
                                <div>
                                  <input type="radio" class="form-check-input" id="HBL" name="oper" />
                                  <label for="HBL">HBL/HAWB</label>
                                </div>
                                <div>
                                  <input type="radio" class="form-check-input" id="client" name="oper" />
                                  <label for="client">Client</label>
                                </div>
                                <div>
                                  <input type="radio" class="form-check-input" id="Final" name="oper" />
                                  <label for="Final">Final Destination</label>
                                </div>
                                <div>
                                  <input type="radio" class="form-check-input" id="ware" name="oper" />
                                  <label for="ware">Sales Rep</label>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="row">
                                <div class="category">
                                  <p class="bold">Category</p>
                                  <div class="d-flex flex-wrap column-gap-3 cate ps-2 pt-1">
                                    <div>
                                      <input type="checkbox" class="form-check-input" class="form-check-input" id="nor" value="cate1" />
                                      <label for="nor">Normal</label>
                                    </div>
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="dent" value="cate2" />
                                      <label for="dent">Detention</label>
                                    </div>
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="demur" value="cate3" />
                                      <label for="demur">Demurrage</label>
                                    </div>
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="secur" value="cate4" />
                                      <label for="secur">Security Dep</label>
                                    </div>
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="run" value="cate5" />
                                      <label for="run">Running Det</label>
                                    </div>
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="sect" value="cate6" />
                                      <label for="sect">Sect Owt</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="sub-category mt-1">
                                  <p class="bold">Sub-Type</p>
                                  <div class="d-flex flex-wrap column-gap-3 cate ps-2 pt-1">
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="lcl" value="cate1" />
                                      <label for="lcl">LCL</label>
                                    </div>
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="car" value="cate2" />
                                      <label for="car">Car</label>
                                    </div>
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="only" value="cate3" />
                                      <label for="only">Only Part FCL</label>
                                    </div>
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="fcl" value="cate4" />
                                      <label for="fcl">FCL</label>
                                    </div>
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="bulk" value="cate5" />
                                      <label for="bulk">BreakBulk</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                
                          <div class="row">
                            <div class="">
                              <div class="d-flex column-gap-1">
                                <div class="apply-date">
                                  <div class="d-flex">
                                    <input type="checkbox" class="form-check-input" name="" id="app-date" />
                                    <label for="app-date"
                                      >Apply Date RangeOnRec/Pay/Adj/Adv</label
                                    >
                                  </div>
                                  <div class="amount py-2 px-1 mt-2">
                                    <div>
                                      <input type="radio" class="form-check-input" id="Show" name="oper" />
                                      <label for="Show">Show All</label>
                                    </div>
                                    <div>
                                      <input type="radio" class="form-check-input" id="Exculde" name="oper" />
                                      <label for="Exculde">Exculde Zero Balance</label>
                                    </div>
                                    <div class="d-flex align-items-center column-gap-3">
                                      <div>
                                        <input type="radio" class="form-check-input" id="Balance" name="oper" />
                                        <label for="Balance">Balance Amount</label>
                                      </div>
                                      <div class="btn-group">
                                        <button
                                          class="btn btn-secondary btn-sm dropdown-toggle"
                                          type="button"
                                          data-bs-toggle="dropdown"
                                          aria-expanded="false"
                                        >
                                          >
                                        </button>
                                        <ul class="dropdown-menu">
                                          ...
                                        </ul>
                                      </div>
                                      <input type="number" id="num" />
                                    </div>
                                  </div>
                                  <div class="border mt-1 d-flex align-items-center gap-3 px-2">
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="Open" value="cate1" />
                                      <label for="Open">D/O Outstanding</label>
                                    </div>
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="Open" value="cate1" />
                                      <label for="Open">D/O Issued</label>
                                    </div>
                                  </div>
                                </div>
                
                                <div class="job-status">
                                  <p class="bold">Job Status</p>
                                  <div class="status px-2 py-1">
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="Open" value="cate1" />
                                      <label for="Open">Open</label>
                                    </div>
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="Closed" value="cate2" />
                                      <label for="Closed">Closed</label>
                                    </div>
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="Cancel" value="cate3" />
                                      <label for="Cancel">Canceled</label>
                                    </div>
                                  </div>
                                </div>
                
                                <div class="group-by d-flex flex-column">
                                  <p class="bold">Group by</p>
                                  <div class="btn-group">
                                    <button
                                      class="btn btn-secondary btn-sm dropdown-toggle"
                                      type="button"
                                      data-bs-toggle="dropdown"
                                      aria-expanded="false"
                                    >
                                      None
                                    </button>
                                    <ul class="dropdown-menu">
                                      ...
                                    </ul>
                                  </div>
                                  <div class="groups d-flex flex-column flex-wrap">
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="lcl" value="cate1" />
                                      <label for="lcl">Show Filter</label>
                                    </div>
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="car" value="cate2" />
                                      <label for="car">Only Advance</label>
                                    </div>
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="only" value="cate3" />
                                      <label for="only">Only Overdues</label>
                                    </div>
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="fcl" value="cate4" />
                                      <label for="fcl">Due Pays</label>
                                    </div>
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="bulk" value="cate5" />
                                      <label for="bulk">Exculde Advance</label>
                                    </div>
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="bulk" value="cate5" />
                                      <label for="bulk">Exculd Un-Settled</label>
                                    </div>
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="bulk" value="cate5" />
                                      <label for="bulk">Company</label>
                                    </div>
                                    <div>
                                      <input type="checkbox" class="form-check-input" id="bulk" value="cate5" />
                                      <label for="bulk">PDC</label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                
                          <div class="currency">
                            <div class="d-flex column-gap-1">
                              <div
                                class="border mt-1 px-2"
                                style="position: relative; top: -44px"
                              >
                                <div>
                                  <input type="radio" class="form-check-input" id="job" name="oper" />
                                  <label for="job">All</label>
                                </div>
                                <div>
                                  <input type="radio" class="form-check-input" id="Invoice" name="oper" />
                                  <label for="Invoice">Manifested</label>
                                </div>
                                <div>
                                  <input type="radio" class="form-check-input" id="HBL" name="oper" />
                                  <label for="HBL">NonManifested</label>
                                </div>
                              </div>
                              <div class="d-flex">
                                <div>
                                  <label for="curr">Currency</label>
                                  <select name="" id="dropdown">
                                    <option value=""></option>
                                  </select>
                                </div>
                                <div>
                                  <div class="border1 d-flex height column-gap-2 ms-3">
                                    <div>
                                      <input type="radio" class="form-check-input" id="c-all" name="oper" />
                                      <label for="c-all">All</label>
                                    </div>
                                    <div>
                                      <input type="radio" class="form-check-input" id="c-delivered" name="oper" />
                                      <label for="c-delivered">Delivered</label>
                                    </div>
                                    <div>
                                      <input type="radio" class="form-check-input" id="c-undelivered" name="oper" />
                                      <label for="c-undelivered">Un Delivered</label>
                                    </div>
                                  </div>
                                  <div class="d-flex mt-1">
                                    <div><p class="bold">Due Days Based On</p></div>
                                    <div class="border1 d-flex height column-gap-2 ms-3">
                                      <div>
                                        <input type="radio" class="form-check-input" id="c-invoice" name="oper" />
                                        <label for="c-invoice">Invoice Date</label>
                                      </div>
                                      <div>
                                        <input type="radio" class="form-check-input" id="c-due" name="oper" />
                                        <label for="c-due">Due Days</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                
                          <div class="row">
                            <div class="col-md-6">
                              <p class="bold">Job Type</p>
                              <div class="border" style="width: 80%">
                                <div class="d-flex flex-wrap column-gap-2 cate ps-2 pt-1">
                                  <div>
                                    <input type="checkbox" class="form-check-input" id="Direct" value="cate1" />
                                    <label for="Direct">Direct</label>
                                  </div>
                                  <div>
                                    <input type="checkbox" class="form-check-input" id="Coloaded" value="cate2" />
                                    <label for="Coloaded">Coloaded</label>
                                  </div>
                                  <div>
                                    <input type="checkbox" class="form-check-input" id="Cross" value="cate3" />
                                    <label for="Cross">Cross Trade</label>
                                  </div>
                                  <div>
                                    <input type="checkbox" class="form-check-input" id="Linear" value="cate4" />
                                    <label for="Linear">Linear Agency</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="d-flex mt-1">
                                <div><p class="bold">Ageing Based On</p></div>
                                <div class="border1 d-flex height column-gap-2 ms-3">
                                  <div>
                                    <input type="radio" class="form-check-input" id="c-Date" name="oper" />
                                    <label for="c-Date">Current Date</label>
                                  </div>
                                  <div>
                                    <input type="radio" class="form-check-input" id="c-Till" name="oper" />
                                    <label for="c-Till">Till Date</label>
                                  </div>
                                </div>
                              </div>
                              <div>
                                <p class="bold">Ageing Type</p>
                                <div class="border px-3">
                                  <div>
                                    <input type="radio" class="form-check-input" id="c-all" name="oper" />
                                    <label for="c-all">Client</label>
                                  </div>
                                  <div>
                                    <input type="radio" class="form-check-input" id="c-delivered" name="oper" />
                                    <label for="c-delivered">Sales Rep</label>
                                  </div>
                                  <div>
                                    <input type="radio" class="form-check-input" id="c-delivered" name="oper" />
                                    <label for="c-delivered">Sales Rep + Client</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                
                          <div class="row">
                            <div>
                              <div>
                                <label for="report-type">Report Type:</label>
                                <select name="" id="dropdown1">
                                  <option value="">Detail Report</option>
                                </select>
                              </div>
                              <div class="d-flex type mt-1">
                                <div>
                                  <label for="type">Type</label>
                                  <select name="" id="dropdown2">
                                    <option value="">Receviable</option>
                                  </select>
                                </div>
                                <div>
                                  <input type="checkbox" class="form-check-input" id="Forincomplete" />
                                  <label for="Forincomplete"
                                    >Only InComplete/Void Invoice</label
                                  >
                                </div>
                              </div>
                              <div class="d-flex gap-3 mt-1">
                                <div>
                                  <label for="Print">Print On</label>
                                  <select name="" id="dropdown3">
                                    <option value="">Viewer</option>
                                  </select>
                                </div>
                                <div>
                                  <input type="checkbox" class="form-check-input" />
                                  <label for="show-details">Show Details</label>
                                </div>
                                <div>
                                  <input type="checkbox" class="form-check-input" id="show-details" />
                                  <label for="show-details">Include Client Code</label>
                                </div>
                              </div>
                            </div>
                          </div>
                
                          <div class="row d-flex flex-column justify-content-end mt-3">
                            <div>
                              <input type="checkbox" class="form-check-input" id="Transhipment" />
                              <label for="Transhipment">Transhipment Cargo</label>
                            </div>
                            <div>
                              <input type="checkbox" class="form-check-input" id="Print" />
                              <label for="Print">Print each print in new page</label>
                            </div>
                            <div>
                              <input type="checkbox" class="form-check-input" id="Show-Only" />
                              <label for="Show-Only">Show Only Inative customer</label>
                            </div>
                          </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Company:</label>
                                <select name="Client" id="" class="form-select"></select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Client:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Vendor:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Job #:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>file #:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Multi CostCent:</label>
                                <select name="Client" id="" class="form-select"></select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Sales Rep:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mt-4">
                                <input type="checkbox" class="form-check-input" style="width:16px; height:16px;" Value="party" /><span>&nbsp;Party's Salesperson Instead of Job's Salesperson</span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>File Destination:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Overseas Agent:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Containers:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Vessel:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Shipping / Air Line:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Shipping / Air Line:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Principal:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Principal:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Consignee:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Consignee:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Forwarder/Coloader:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Clearing Agent:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Shipper:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Commodity:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Carrier Booking #:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>POL:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Terminal Name:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Air POL:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>AIR POD:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Flight #:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Manifest #:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Voyage:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Voyage:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Lg J/Typ:</label>
                                <select name="Client" id="" class="form-select"></select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Shipment Status:</label>
                                <select name="Client" id="" class="form-select"></select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Terminal Invoice #:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Nomination:</label>
                                <select name="Client" id="" class="form-select"></select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Customer Grp:</label>
                                <select name="Client" id="" class="form-select"></select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-2">
                                <label>Reference #:</label>
                                <input type="text" name="" id="" class="form-control" />
                              </div>
                            </div>
                          </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('script')

<script>
  
     
</script>

@endpush









