<style>
    #navbar_search_result_area {
        position: absolute;
        top: 84%;
        background-color: #fff;
        width: 100%;
        left: 0px;
        border-radius: 5px;
        z-index: 99;
        overflow: hidden;
        display:none;
        box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.25);
    }
</style>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{route('admin.dashboard')}}" class="app-brand-link">
            <img src="{{ asset('assets/img/logo/logo.png') }}" width="85%" />
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <!--<i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>-->
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>
    
    <div class="flex-grow-1 input-group input-group-merge rounded-pill" style="width: 90%; margin: 0 auto;">
      <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
      <input
        type="text"
        id="navbar-search__field"
        class="form-control chat-search-input"
        placeholder="Search..."
        aria-label="Search..."
        aria-describedby="basic-addon-search31" />
        <div id="navbar_search_result_area">
            <ul class="navbar_search_result"></ul>
        </div>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 mt-2">
        <li class="menu-item {{menuActive('admin.dashboard')}}">
            <a href="{{route('admin.dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
       
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="General Setting">General Ledger</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item ">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Setup</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Chart of Account</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Voucher Properties</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Opening Balance</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Account Integration</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item ">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Transaction</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Voucher</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Invoice</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Bill</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Receipt</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Payment</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Bank Reconsilation</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Check Book Stock</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Budget</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Cash Denomination Record</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Cheques Opening</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Reconsilation Date Setup</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Payment Requisition Setup</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Payment Requisition</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Check Delivery Marking</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Check Deposite Marking</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Recall Memo Voucher</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Voucher Approval Dashboard</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Voucher History</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">WHT Deposite</div>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="menu-item ">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Reports</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Account Activity</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Account Activity Costcenter Wise</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Account Ledger</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Debitor List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Pdcm</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Open Pdc Cheque Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Balance Sheet</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Trial Sheet</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Cash Flow Income Statement</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Bank Reconsilation Statement</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Bank Position Statement</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Chart Of Account List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Cash Book</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Budget Variance Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Ageing Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Check Printing</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Voucher Audit Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Invoice Settlement</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Continue Voucher Printing</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Clear/Unclear Report</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>    
        </li>
        
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="General Setting">Sea Export</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{menuActive('admin.manifest.create')}}">
                    <a href="{{route('admin.manifest.create')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se Manifest</div>
                    </a>
                </li>
                <li class="menu-item {{menuActive('admin.job.create')}}">
                    <a href="{{route('admin.job.create')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se Job</div>
                    </a>
                </li>
                <li class="menu-item {{menuActive('admin.cro.create')}}">
                    <a href="{{route('admin.cro.create')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Cro</div>
                    </a>
                </li>
                <li class="menu-item {{menuActive('admin.bl.create')}}">
                    <a href="{{route('admin.bl.create')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se B/L</div>
                    </a>
                </li>
                <li class="menu-item {{menuActive('admin.switchbl.create')}}">
                    <a href="{{route('admin.switchbl.create')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se Switch B/L</div>
                    </a>
                </li>
                <li class="menu-item {{menuActive('admin.stuffing.create')}}">
                    <a href="{{route('admin.stuffing.create')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Stuffing Plan</div>
                    </a>
                </li>
                <li class="menu-item {{menuActive('admin.milestone.create')}}">
                    <a href="{{route('admin.milestone.create')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se milestone</div>
                    </a>
                </li>
                <li class="menu-item {{menuActive('admin.invoice.create')}}">
                    <a href="{{route('admin.invoice.create')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se Invoice</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se Receipt</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se Bill</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se Payment</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se Agent Invoice</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se Agent Receipt / Payment</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se Query</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se Letter Template</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se Letter List</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se Quotation</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se Query (Customer Service)</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Shipping Instruction</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Export Booking Request </div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se Payment Requisition</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Agent Payment Requisition</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se Console Release Instruction</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se Noc</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Fixed Salestax</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se Loading Updation</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Se Loading Dashboard</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Reports</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Se Job Balancing</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Se Job List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Se Job Wise Container List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Se Charges Wise Job Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Se Job Profit & Loss Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Party Soa</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Party Audit</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Loading List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Se Agent Invoice Balancing</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Se Job Statistics</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Se Vat Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Se Client Exposure Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Export Booking List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">BL Release Status Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Se Cargo Movement</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Stuffing Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Se Milestone Status</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Se Debit Credit Notes List</div>
                            </a>
                        </li>
                    </ul>    
                </li>
            </ul>
        </li>
        
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="General Setting">Sea Import</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Manifest</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Job</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Arrival Notice</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Epass Weboc</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Milestone</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si B/L</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Pre Alert Input</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Invoice</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Receipt</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Delivery Order</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Advance Detention Invoice</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Equipment Invoice</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Equipment Invoice Process</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Auto Detention Process</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Bill</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Payment</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Agent Invoice</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Agent Receipt/Payment</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Query</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Letter Template</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Letter Process</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Letters</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Letter List</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Qoutation</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Query (Customer Services)</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Bl Amendment</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Equipment Invoice Other</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Si Payment Requisition</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Terminal Stock Requirement</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Detention Summary</div>
                    </a>
                </li>
                
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Security Deposit</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Security Deposite</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Refund Requisition</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Security Deposite Refund Utility</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Security Deposite Status Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Refund Requisition Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Security Deposite Activity Report</div>
                            </a>
                        </li>
                    </ul>
                </li>  
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Guarantee Filing</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Guarantee Filing/Extension/Cancellation</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Guarantee Letter Template</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Guarantee Letter Process</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Guarantee Letters</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Guarantee Letter list</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Vissel Arrival/Departure Report(Cvhm)</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Reports</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Si Job Balancing</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Si Job List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Si Job Wise Container List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Si Job Charges Wise Job Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Si Job Profit & Loss Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Import Cargo Book</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Import Igm</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Si Agent Invoice Balancing</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Si Job Statistics</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Pre-Alert Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Si Delivery Order Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Container List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Si Clent Exposure Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Lcl Storage Tariff Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Si Milestone Status</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Si Debit Credit Notes List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Console Audit Summary Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Si Outward Security Deposit Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Freight Collect Report</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="General Setting">Container Inventary</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-settings"></i>
                        <div data-i18n="General Setting">Container Activity</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-settings"></i>
                        <div data-i18n="General Setting">Container Query</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-settings"></i>
                        <div data-i18n="General Setting">Bulk Delete Container Activity</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Setup</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Container Register</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Activity</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item ">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Reports</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Container Inventary / Movement Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Principal / Depo Wise Inventary</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Container Size / Type Wise Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Container Stock Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Ctrk Container List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Container Activity Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Vessel Wise Container Cancellation Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Storage Report</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>    
        </li>
        
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="General Setting">Principal Account</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-settings"></i>
                        <div data-i18n="General Setting">Principal Manual Soa</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-settings"></i>
                        <div data-i18n="General Setting">Principal Soa</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-settings"></i>
                        <div data-i18n="General Setting">Principal Receipt / Payment</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-settings"></i>
                        <div data-i18n="General Setting">Crt/ Edi</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-settings"></i>
                        <div data-i18n="General Setting">Reports</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-settings"></i>
                                <div data-i18n="General Setting">Principal Balancing</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-settings"></i>
                                <div data-i18n="General Setting">Principal Receipt / Payment Report</div>
                            </a>
                        </li>
                    </ul>    
                </li>
           </ul>
        </li>
        
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="General Setting">CRM</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Setup</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Event</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Quote Charge Template</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Transaction</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Planning</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Activity</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Opportunity</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Customer Inquiry</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Request To Vendors</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Rate From Vendors</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Rate To Customer</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Reports</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Crm Reports</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Dashboard</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li> 
        
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="General Setting">Depo</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Depo Container Opening</div>
                    </a>
                </li>    
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Depo Container Activity</div>
                    </a>
                </li>    
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Depo Receipt</div>
                    </a>
                </li>    
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Cro Balancing Inquiry</div>
                    </a>
                </li>    
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Setup</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Depo Sub line</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Depo Container</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Depo Activity</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Depo Line Tariff</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Depo Container Hold</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Depo Shift Setup</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Depo Stacking Area</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Depo Menufacture Area</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Reports</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Depo Receipt Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Depo Container Activity</div>
                            </a>
                        </li>
                    </ul>
                </li>    
            </ul>
        </li>  
        
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="General Setting">Edi</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Edi Data</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Edi Mapping</div>
                    </a>
                </li>
            </ul>
        </li> 
        
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="General Setting">Utilities</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">User Rights</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Fiscal Year</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Fiscal Year Selection</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">System Policy</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Sub Company</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">User Dashboard</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Voucher Delink</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">User Setup</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Security Role</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Security Role Viewer</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Audit Log Report</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Job Wise Audit Log</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">GL Process Log Report</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Data Removal Form</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Voucher Approval Dashboard</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Bulk Process Log</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Freedays Update Utility</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Case Conversion</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">File No.Sequence</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Data Base Maintainance</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Edi Format</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">TPGL Integration</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Module Integration</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Module Integration Setup</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Edo Process</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Api Key Tracking</div>
                    </a>
                </li>
            </ul>
        </li>   
        
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="General Setting">Payroll</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Setup</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Employee Designation</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Employee</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Allowence</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Deduction</div>
                            </a>
                        </li>
                    </ul>    
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Transaction</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Employee Attendance</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Salary Advance</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Loan</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Employee Salary</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Employee Processing</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Extra Deduction</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Extra Payment</div>
                            </a>
                        </li>
                        
                    </ul>    
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Reports</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Employee List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Salary Advance List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Pay slip</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-user"></i>
                                <div data-i18n="General Setting">Loan Balancing</div>
                            </a>
                        </li>
                    </ul>    
                </li>
            </ul>
        </li> 
        
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="General Setting">Setups</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Customer Group</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Vendor Group</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Overseas Agent Network</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Line Manager Selection</div>
                    </a>
                </li>
                <li class="menu-item {{menuActive('admin.party.create')}}">
                    <a href="{{route('admin.party.create')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Party</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Employee</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Taz Authority</div>
                    </a>
                </li>
                <li class="menu-item {{menuActive('admin.charges.create')}}">
                    <a href="{{route('admin.charges.create')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Charges</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Charger Category</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Charger Tariff</div>
                    </a>
                </li>
                <li class="menu-item {{menuActive('admin.vessel.create')}}">
                    <a href="{{route('admin.vessel.create')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Vessel</div>
                    </a>
                </li>
                <li class="menu-item {{menuActive('admin.voyage.create')}}">
                    <a href="{{route('admin.voyage.create')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Voyage</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Stamp</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Un location</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Local Custom Coding</div>
                    </a>
                </li>
                <li class="menu-item {{menuActive('admin.equipment.create')}}">
                    <a href="{{route('admin.equipment.create')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Equipment Size Type</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Milestone</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Cargo/ Frieght Manifest</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Commodity Group</div>
                    </a>
                </li>
                <li class="menu-item {{menuActive('admin.commodity.create')}}">
                    <a href="{{route('admin.commodity.create')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Commodity</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Port Exception</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Port Country Exception</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Port Category</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Credit Authorization Request Form</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Exchange Rate Range</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Opening Invoices</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Opening Bills</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Opening Agent Invoice</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Opening Principal Soa</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Flight Schedule</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Nearby Port</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Team</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Active In-active Reason</div>
                    </a>
                </li>
                <li class="menu-item {{menuActive('admin.currency.create')}}">
                    <a href="{{route('admin.currency.create')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Currency Market Rate</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Report Fixed Text</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">B/L Template</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Airport</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Shipping Agency License</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Slab Type</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="General Setting">Rate Group</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-file"></i>
                        <div data-i18n="DETENTION / DEMURRAGE TARIFF">Detention / Demurrage Tariff</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-barcode"></i>
                        <div data-i18n="HS CODE">HS Code</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-email"></i>
                        <div data-i18n="EMAIL TEMPLATE">Email Template</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-book"></i>
                        <div data-i18n="PRINCIPAL MANUAL SOA">Principal Manual SOA</div>
                    </a>
                </li>
                <li class="menu-item {{menuActive('admin.location.create')}}">
                    <a href="{{route('admin.location.create')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-location-pin"></i>
                        <div data-i18n="PARTY LOCATIONS">Party Locations</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-file-text"></i>
                        <div data-i18n="LETTER TEMPLATE">Letter Template</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-id-badge"></i>
                        <div data-i18n="SALE REP STATUS">Sale Rep Status</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-receipt"></i>
                        <div data-i18n="BL QUERY FORM">BL Query Form</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-plane"></i>
                        <div data-i18n="AIR QUERY FORM">Air Query Form</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-anchor"></i>
                        <div data-i18n="WHARF">Wharf</div>
                    </a>
                </li>
                <li class="menu-item {{menuActive('admin.packages.create')}}">
                    <a href="{{route('admin.packages.create')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-package"></i>
                        <div data-i18n="PACKAGES CODING">Packages Coding</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-briefcase"></i>
                        <div data-i18n="BANK DETAIL REGISTER">Bank Detail Register</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-map-alt"></i>
                        <div data-i18n="INCO TERM">Incoterm</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-world"></i>
                        <div data-i18n="LOCALIZATION SETUP">Localization Setup</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-package"></i>
                        <div data-i18n="COMMODITY MAPPING">Commodity Mapping</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="EMPLOYEE MAPPING">Employee Mapping</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-settings"></i>
                        <div data-i18n="EQUIPEMENT SIZETYPE MAPPING">Equipment Size/Type Mapping</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-user"></i>
                        <div data-i18n="PARTY MAPPING">Party Mapping</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-ship"></i>
                        <div data-i18n="VESSEL MAPPING">Vessel Mapping</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-file"></i>
                        <div data-i18n="PARTIES AND SALARIES REPORT">Parties and Salaries Report</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-pie-chart"></i>
                        <div data-i18n="TAX REVENUE DISTRIBUTION">Tax Revenue Distribution</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-pencil"></i>
                        <div data-i18n="PARTY MANDATORY FIELDS SETUP">Party Mandatory Fields Setup</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-pencil-alt"></i>
                        <div data-i18n="MANDATORY FIELDS SETUP">Mandatory Fields Setup</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-bar-chart"></i>
                        <div data-i18n="COST CENTER GROUP">Cost Center Group</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-credit-card"></i>
                        <div data-i18n="DRAWN BANK">Drawn Bank</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-settings"></i>
                        <div data-i18n="FTP SETTING">FTP Setting</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-layout-grid3"></i>
                        <div data-i18n="GRID REPORT CONFIGURATION SETUP">Grid Report Configuration Setup</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-list"></i>
                        <div data-i18n="CHARGES LIST REPORT">Charges List Report</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-id-badge"></i>
                        <div data-i18n="PARTY SCAC / IATA CODE">Party SCAC / IATA Code</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-email"></i>
                        <div data-i18n="EMAIL CREDENTIALS">Email Credentials</div>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="General Setting">Common</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-pencil"></i>
                        <div data-i18n="LETTER PROCESS">Letter Process</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-settings"></i>
                        <div data-i18n="DASHBOARD SETUP POLICY">Dashboard Setup Policy</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-files"></i>
                        <div data-i18n="LETTERS">Letters</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-file-text"></i>
                        <div data-i18n="PARTY OUTSTANDING DETAILS">Party Outstanding Details</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-money"></i>
                        <div data-i18n="DIRECT JOB EXPENSE REVENUE">Direct Job Expense Revenue</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-clipboard"></i>
                        <div data-i18n="JOB INVOICE">Job Invoice</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-receipt"></i>
                        <div data-i18n="JOB RECEIPT">Job Receipt</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-layers"></i>
                        <div data-i18n="ONLINE PAYMENT DASHBOARD">Online Payment Dashboard</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-file"></i>
                        <div data-i18n="JOB BILL">Job Bill</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-credit-card"></i>
                        <div data-i18n="JOB PAYMENT">Job Payment</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-receipt"></i>
                        <div data-i18n="AGENT INVOICE">Agent Invoice</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-credit-card"></i>
                        <div data-i18n="AGENT RECEIPT / PAYMENT">Agent Receipt / Payment</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-clipboard"></i>
                        <div data-i18n="JOB SETTLEMENT">Job Settlement</div>
                    </a>
                </li>
                <li class="menu-item {{menuActive('admin.quotation.create')}}">
                    <a href="{{route('admin.quotation.create')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-book"></i>
                        <div data-i18n="QUOTATION">Quotation</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-search"></i>
                        <div data-i18n="TRACING">Tracing</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-credit-card"></i>
                        <div data-i18n="JOB PAYMENT REQUISITION">Job Payment Requisition</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-layout-grid2"></i>
                        <div data-i18n="SEA PUBLISH RATE (LIVE RATE)">Sea Publish Rate (Live Rate)</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-upload"></i>
                        <div data-i18n="SEA INTERIOR RATE (UPLOAD RATE)">Sea Interior Rate (Upload Rate)</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-money"></i>
                        <div data-i18n="SEA ACCESSORIAL CHARGE (ACCESSORIAL CHARGES)">Sea Accessorial Charge (Accessorial Charges)</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-history"></i>
                        <div data-i18n="HISTORY VIEWER">History Viewer</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-search"></i>
                        <div data-i18n="PARTY PROFILE QUERY">Party Profile Query</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-receipt"></i>
                        <div data-i18n="TERMINAL INVOICE">Terminal Invoice</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-briefcase"></i>
                        <div data-i18n="BULK PROCESS">Bulk Process</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-layout"></i>
                        <div data-i18n="E-INVOICE DASHBOARD">E-Invoice Dashboard</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-export"></i>
                        <div data-i18n="EXPORT BOOKING REQUEST">Export Booking Request</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-folder"></i>
                        <div data-i18n="PROJECT">Project</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-stats-up"></i>
                        <div data-i18n="REPORTS">Reports</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-briefcase"></i>
                                <div data-i18n="JOB BALANCING">Job Balancing</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-receipt"></i>
                                <div data-i18n="JOB RECEIPT PAYMENT REPORT">Job Receipt Payment Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-list"></i>
                                <div data-i18n="JOB LIST">Job List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-archive"></i>
                                <div data-i18n="JOB WISE CONTAINER LIST">Job Wise Container List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-bar-chart"></i>
                                <div data-i18n="CHARGES WISE JOB REPORT">Charges Wise Job Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-stats-down"></i>
                                <div data-i18n="JOB PROFIT AND LOSS REPORT">Job Profit and Loss Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-folder"></i>
                                <div data-i18n="CLIENT STATEMENT OF ACCOUNT">Client Statement of Account</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-receipt"></i>
                                <div data-i18n="AGENT INVOICE BALANCING">Agent Invoice Balancing</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-pie-chart"></i>
                                <div data-i18n="JOB STATISTICS">Job Statistics</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-receipt"></i>
                                <div data-i18n="AGENT RECEIPT PAYMENT REPORT">Agent Receipt Payment Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-eye"></i>
                                <div data-i18n="JOB AUDIT">Job Audit</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-receipt"></i>
                                <div data-i18n="DELIVERY ORDER REPORT">Delivery Order Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-book"></i>
                                <div data-i18n="QUOTATION LIST">Quotation List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-files"></i>
                                <div data-i18n="LETTER LIST">Letter List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-bar-chart"></i>
                                <div data-i18n="DIRECT JOB CONTAINER WISE PROFIT AND LOSS">Direct Job Container Wise Profit and Loss</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-receipt"></i>
                                <div data-i18n="VAT REPORT">VAT Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-pie-chart"></i>
                                <div data-i18n="CLIENT EXPOSURE REPORT">Client Exposure Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-alert"></i>
                                <div data-i18n="PARTIES ALERT REPORT">Parties Alert Report</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-stats-up"></i>
                                <div data-i18n="MILESTONE STATUS">Milestone Status</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-files"></i>
                                <div data-i18n="DEBIT CREDIT NOTES LIST">Debit Credit Notes List</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-bookmark"></i>
                                <div data-i18n="REQUISITION FOR COURT STAMPING">Requisition for Court Stamping</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-file"></i>
                                <div data-i18n="TERMINAL INVOICE LOG">Terminal Invoice Log</div>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                
            </ul>
        </li>
        
        
        
        
        <li class="menu-item {{menuActive('admin.general_setting')}}">
            <a href="{{route('admin.general_setting')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="General Setting">General Setting</div>
            </a>
        </li>
        
        <li class="menu-item {{menuActive('admin.logout')}}">
            <a href="{{route('admin.logout')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-logout"></i>
                <div data-i18n="Logout">Logout</div>
            </a>
        </li>
    </ul>
</aside>
