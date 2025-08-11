<?php

namespace App\Services;

class NavService
{
    protected $generalLedger;
    protected $seaExport;
    protected $seaImport;
    protected $containerInventory;
    protected $principalAccount;
    protected $crm;
    protected $depo;
    protected $edi;
    protected $utilities;
    protected $payroll;
    protected $setups;
    protected $common;

    public function get_nav()
    {
        $merged = array_merge(
            $this->general_ledger(),
            $this->sea_export(),
            $this->sea_import(),
            $this->container_inventory(),
            $this->principal_account(),
            $this->crm(),
            $this->depo(),
            $this->edi(),
            $this->utilities(),
            $this->payroll(),
            $this->setups(),
            $this->common()
        );

        return $merged;
    }

    public function general_ledger()
    {
        $this->generalLedger = [
            "General Ledger" => [
                "Setup" => [
                    "chart_of_account" => "Chart of Account",
                    "voucher_properties" => "Voucher Properties",
                    "opening_balance" => "Opening Balance",
                    "account_integrate" => "Account Integration"
                ],
                "Transaction" => [
                    "voucher" => "Voucher",
                    "invoice" => "Invoice",
                    "bill" => "Bill",
                    "receipt" => "Receipt",
                    "payment" => "Payment",
                    "bank_reconsilation" => "Bank Reconsilation",
                    "check_book_stock" => "Check Book Stock",
                    "budget" => "Budget",
                    "cash_denomination_record" => "Cash Denomination Record",
                    "cheques_opening" => "Cheques Opening",
                    "reconsilation_date_setup" => "Reconsilation Date Setup",
                    "payment_requisition_setup" => "Payment Requisition Setup",
                    "payment_requisition" => "Payment Requisition",
                    "check_delivery_marking" => "Check Delivery Marking",
                    "check_deposite_marking" => "Check Deposite Marking",
                    "recall_memo_voucher" => "Recall Memo Voucher",
                    "voucher_approval_dashboard" => "Voucher Approval Dashboard",
                    "voucher_history" => "Voucher History",
                    "wht_deposite" => "WHT Deposite"
                ],
                "Reports" => [
                    "account_activity" => "Account Activity",
                    "account_activity_costcenter_wise" => "Account Activity Costcenter Wise",
                    "account_ledger" => "Account Ledger",
                    "debitor_list" => "Debitor List",
                    "pdcm" => "Pdcm",
                    "open_pdc_cheque_report" => "Open Pdc Cheque Report",
                    "balance_sheet" => "Balance Sheet",
                    "trial_sheet" => "Trial Sheet",
                    "cash_flow_income_statement" => "Cash Flow Income Statement",
                    "bank_reconsilation_statement" => "Bank Reconsilation Statement",
                    "bank_position_statement" => "Bank Position Statement",
                    "chart_of_account_list" => "Chart Of Account List",
                    "cash_book" => "Cash Book",
                    "budget_variance_report" => "Budget Variance Report",
                    "ageing_report" => "Ageing Report",
                    "check_printing" => "Check Printing",
                    "voucher_audit_report" => "Voucher Audit Report",
                    "invoice_settlement" => "Invoice Settlement",
                    "continue_voucher_printing" => "Continue Voucher Printing",
                    "clear_unclear_report" => "Clear/Unclear Report"
                ]
            ]
        ];

        return $this->generalLedger;
    }

    public function sea_export()
    {
        $this->seaExport = [
            "Sea Export" => [
                "se_manifest" => "Se Manifest",
                "se_job" => "Se Job",
                "cro" => "Cro",
                "se_bl" => "Se B/L",
                "se_switch_bl" => "Se Switch B/L",
                "stuffing_plan" => "Stuffing Plan",
                "se_milestone" => "Se milestone",
                "se_invoice" => "Se Invoice",
                "se_receipt" => "Se Receipt",
                "se_bill" => "Se Bill",
                "se_payment" => "Se Payment",
                "se_agent_invoice" => "Se Agent Invoice",
                "se_agent_receipt_payment" => "Se Agent Receipt / Payment",
                "se_query" => "Se Query",
                "se_letter_template" => "Se Letter Template",
                "se_letter_list" => "Se Letter List",
                "se_quotation" => "Se Quotation",
                "se_query_customer_service" => "Se Query (Customer Service)",
                "shipping_instruction" => "Shipping Instruction",
                "export_booking_request" => "Export Booking Request",
                "se_payment_requisition" => "Se Payment Requisition",
                "agent_payment_requisition" => "Agent Payment Requisition",
                "se_console_release_instruction" => "Se Console Release Instruction",
                "se_noc" => "Se Noc",
                "fixed_salestax" => "Fixed Salestax",
                "se_loading_updation" => "Se Loading Updation",
                "se_loading_dashboard" => "Se Loading Dashboard",
                "loading_program" => "Loading Program",
                "Reports" => [
                    "se_job_balancing" => "Se Job Balancing",
                    "se_job_list" => "Se Job List",
                    "se_job_wise_container_list" => "Se Job Wise Container List",
                    "se_charges_wise_job_report" => "Se Charges Wise Job Report",
                    "se_job_profit_and_loss_report" => "Se Job Profit & Loss Report",
                    "party_soa" => "Party Soa",
                    "party_audit" => "Party Audit",
                    "loading_list" => "Loading List",
                    "se_agent_invoice_balancing" => "Se Agent Invoice Balancing",
                    "se_job_statistics" => "Se Job Statistics",
                    "se_vat_report" => "Se Vat Report",
                    "se_client_exposure_report" => "Se Client Exposure Report",
                    "export_booking_list" => "Export Booking List",
                    "bl_release_status_report" => "BL Release Status Report",
                    "se_cargo_movement" => "Se Cargo Movement",
                    "stuffing_report" => "Stuffing Report",
                    "se_milestone_status" => "Se Milestone Status",
                    "se_debit_credit_notes_list" => "Se Debit Credit Notes List"
                ]
            ]
        ];

        return $this->seaExport;
    }

    public function sea_import()
    {
        $this->seaImport = [
            "Sea Import" => [
                'si_manifest' => 'Si Manifest',
                'si_job' => 'Si Job',
                'arrival_notice' => 'Arrival Notice',
                'epass_weboc' => 'Epass Weboc',
                'si_milestone' => 'Si Milestone',
                'si_bl' => 'Si B/L',
                'pre_alert_input' => 'Pre Alert Input',
                'si_invoice' => 'Si Invoice',
                'si_receipt' => 'Si Receipt',
                'si_delivery_order' => 'Si Delivery Order',
                'advance_detention_invoice' => 'Advance Detention Invoice',
                'equipment_invoice' => 'Equipment Invoice',
                'equipment_invoice_process' => 'Equipment Invoice Process',
                'auto_detension_process' => 'Auto Detention Process',
                'si_bill' => 'Si Bill',
                'si_payment' => 'Si Payment',
                'si_agent_invoice' => 'Si Agent Invoice',
                'si_agent_receipt_payment' => 'Si Agent Receipt/Payment',
                'si_query' => 'Si Query',
                'si_letter_template' => 'Si Letter Template',
                'si_letter_process' => 'Si Letter Process',
                'si_letters' => 'Si Letters',
                'si_letter_list' => 'Si Letter List',
                'si_quotation' => 'Si Quotation',
                'si_query_customer_services' => 'Si Query (Customer Services)',
                'si_bl_amendment' => 'Si Bl Amendment',
                'si_equipment_invoice_other' => 'Si Equipment Invoice Other',
                'si_payment_requisition' => 'Si Payment Requisition',
                'terminal_stock_requirement' => 'Terminal Stock Requirement',
                'detention_summary' => 'Detention Summary',
                'Security Deposit' => [
                    'security_deposite' => 'Security Deposite',
                    'refund_requisition' => 'Refund Requisition',
                    'security_deposite_refund_utility' => 'Security Deposite Refund Utility',
                    'security_deposite_status_report' => 'Security Deposite Status Report',
                    'refund_requisition_report' => 'Refund Requisition Report',
                    'security_deposite_activity_report' => 'Security Deposite Activity Report'
                ],
                'Guarantee Filing' => [
                    'guarantee_filling_extension_cancellation' => 'Guarantee Filing/Extension/Cancellation',
                    'guarantee_letter_template' => 'Guarantee Letter Template',
                    'guarantee_letter_process' => 'Guarantee Letter Process',
                    'guarantee_letter' => 'Guarantee Letters',
                    'guarantee_letter_list' => 'Guarantee Letter list',
                    'vessel_arrival_departure_report' => 'Vessel Arrival/Departure Report(Cvhm)'
                ],
                "Reports" => [
                    'si_job_balancing' => 'Si Job Balancing',
                    'si_job_list' => 'Si Job List',
                    'si_job_wise_container_list' => 'Si Job Wise Container List',
                    'si_job_charges_wise_job_report' => 'Si Job Charges Wise Job Report',
                    'si_job_profit_loss_report' => 'Si Job Profit & Loss Report',
                    'import_cargo_book' => 'Import Cargo Book',
                    'import_igm' => 'Import Igm',
                    'si_agent_invoice_balancing' => 'Si Agent Invoice Balancing',
                    'si_job_statistics' => 'Si Job Statistics',
                    'pre_alert_report' => 'Pre-Alert Report',
                    'si_delivery_order_report' => 'Si Delivery Order Report',
                    'container_list' => 'Container List',
                    'si_client_exposure_report' => 'Si Clent Exposure Report',
                    'lcl_storage_tariff_report' => 'Lcl Storage Tariff Report',
                    'si_milestone_status' => 'Si Milestone Status',
                    'si_debit_credit_notes_list' => 'Si Debit Credit Notes List',
                    'console_audit_summary_report' => 'Console Audit Summary Report',
                    'si_outward_security_deposit_report' => 'Si Outward Security Deposit Report',
                    'freight_collect_report' => 'Freight Collect Report'
                ]
            ]
        ];

        return $this->seaImport;
    }

    public function container_inventory()
    {
        $this->containerInventory = [
            "Container Inventory" => [
                "container_activity" => "Container Activity",
                "container_query" => "Container Query",
                "bulk_delete_container_activity" => "Bulk Delete Container Activity",
                "Setup" => [
                    "container_register" => "Container Register",
                    "activity" => "Activity",
                    "container_movement" => "Global Container Inventory"
                ],
                "Reports" => [
                    "container_inventary_movement_report" => "Container Inventary / Movement Report",
                    "principal_depo_wise_inventary" => "Principal / Depo Wise Inventary",
                    "container_size_type_wise_report" => "Container Size / Type Wise Report",
                    "container_stock_report" => "Container Stock Report",
                    "ctrk_container" => "Ctrk Container",
                    "container_activity_report" => "Container Activity Report",
                    "vessel_wise_container_cancellation_report" => "Vessel Wise Container Cancellation Report",
                    "storage_report" => "Storage Report"
                ]
            ]
        ];

        return $this->containerInventory;
    }

    public function principal_account()
    {
        $this->principalAccount = [
            "Principal Account" => [
                "principal_manual_soa" => "Principal Manual Soa",
                "principal_soa" => "Principal Soa",
                "principal_receipt_payment" => "Principal Receipt / Payment",
                "crt_edi" => "Crt/ Edi",
                "Reports" => [
                    "principal_balancing" => "Principal Balancing",
                    "principal_receipt_payment_report" => "Principal Receipt / Payment Report"
                ]
            ]
        ];

        return $this->principalAccount;
    }

    public function crm()
    {
        $this->crm = [
            "CRM" => [
                "Setup" => [
                    "event" => "Event",
                    "quote_charge_template" => "Quote Charge Template"
                ],
                "Transaction" => [
                    'planning' => 'Planning',
                    'crm_activity' => 'Activity',
                    'opportunity' => 'Opportunity',
                    'customer_inquiry' => 'Customer Inquiry',
                    'request_to_vendors' => 'Request To Vendors',
                    'rate_from_vendors' => 'Rate From Vendors',
                    'rate_to_customer' => 'Rate To Customer'
                ],
                "Reports" => [
                    "crm_reports" => "Crm Reports",
                    "dashboard" => "Dashboard"
                ]
            ]
        ];

        return $this->crm;
    }

    public function depo()
    {
        $this->depo = [
            "Depo" => [
                'depo_container_opening' => 'Depo Container Opening',
                'depo_container_activity' => 'Depo Container Activity',
                'depo_receipt' => 'Depo Receipt',
                'cro_balancing_inquiry' => 'Cro Balancing Inquiry',
                "Setup" => [
                    'depo_sub_line' => 'Depo Sub line',
                    'depo_container' => 'Depo Container',
                    'depo_activity' => 'Depo Activity',
                    'depo_line_tariff' => 'Depo Line Tariff',
                    'depo_container_hold' => 'Depo Container Hold',
                    'depo_shift_setup' => 'Depo Shift Setup',
                    'depo_stacking_area' => 'Depo Stacking Area',
                    'depo_menufacture_area' => 'Depo Menufacture Area'
                ],
                "Reports" => [
                    "depo_receipt_report" => "Depo Receipt Report",
                    "depo_container_activity_report" => "Depo Container Activity",
                ]
            ]
        ];

        return $this->depo;
    }

    public function edi()
    {
        $this->edi = [
            "Edi" => [
                "edi_data" => "Edi Data",
                "edi_mapping" => "Edi Mapping"
            ]
        ];

        return $this->edi;
    }

    public function utilities()
    {
        $this->utilities = [
            "Utilities" => [
                "user_rights" => "User Rights",
                "fiscal_year" => "Fiscal Year",
                'system_policy' => 'System Policy',
                'sub_company' => 'Sub Company',
                'user_dashboard' => 'User Dashboard',
                'voucher_delink' => 'Voucher Delink',
                'user_setup' => 'User Setup',
                'security_role' => 'Security Role',
                'groups' => 'Groups',
                'security_role_viewer' => 'Security Role Viewer',
                'audit_log_report' => 'Audit Log Report',
                'job_wise_audit_log' => 'Job Wise Audit Log',
                'gl_process_log_report' => 'GL Process Log Report',
                'data_removal_form' => 'Data Removal Form',
                'voucher_approval_dashboard' => 'Voucher Approval Dashboard',
                'bulk_process_log' => 'Bulk Process Log',
                'freedays_update_utility' => 'Freedays Update Utility',
                'case_conversion' => 'Case Conversion',
                'file_no_sequence' => 'File No.Sequence',
                'data_base_maintainance' => 'Data Base Maintainance',
                'edi_format' => 'Edi Format',
                'tpgl_integration' => 'TPGL Integration',
                'module_integration' => 'Module Integration',
                'module_integration_setup' => 'Module Integration Setup',
                'edo_process' => 'Edo Process',
                'api_key_tracking' => 'Api Key Tracking'
            ]
        ];

        return $this->utilities;
    }

    public function payroll()
    {
        $this->payroll = [
            "Payroll" => [
                "Setup" => [
                    'employee_designation' => 'Employee Designation',
                    'employee' => 'Employee',
                    'allowence' => 'Allowence',
                    'deduction' => 'Deduction'
                ],
                "Transaction" => [
                    'employee_attendance' => 'Employee Attendance',
                    'salary_advance' => 'Salary Advance',
                    'loan' => 'Loan',
                    'employee_salary' => 'Employee Salary',
                    'employee_processing' => 'Employee Processing',
                    'extra_deduction' => 'Extra Deduction',
                    'extra_payment' => 'Extra Payment'
                ],
                "Reports" => [
                    'employee_list' => 'Employee List',
                    'salary_advance_list' => 'Salary Advance List',
                    'pay_slip' => 'Pay Slip',
                    'loan_balancing' => 'Loan Balancing'
                ]
            ]
        ];

        return $this->payroll;
    }

    public function setups()
    {
        $this->setups = [
            "Setups" => [
                'customer_group' => 'Customer Group',
                'vendor_group' => 'Vendor Group',
                'overseas_agent_network' => 'Overseas Agent Network',
                'line_manager_selection' => 'Line Manager Selection',
                'party' => 'Party',
                'taz_authority' => 'Taz Authority',
                'charges' => 'Charges',
                'charger_category' => 'Charger Category',
                'charger_tariff' => 'Charger Tariff',
                'vessel' => 'Vessel',
                'voyage' => 'Voyage',
                'stamp' => 'Stamp',
                'un_location' => 'Un location',
                'local_custom_coding' => 'Local Custom Coding',
                'equipment_size_type' => 'Equipment Size Type',
                'milestone' => 'Milestone',
                'cargo_frieght_manifest' => 'Cargo/ Frieght Manifest',
                'commodity_group' => 'Commodity Group',
                'commodity' => 'Commodity',
                'port_exception' => 'Port Exception',
                'port_country_exception' => 'Port Country Exception',
                'port_category' => 'Port Category',
                'credit_authorization_request_form' => 'Credit Authorization Request Form',
                'exchange_rate_range' => 'Exchange Rate Range',
                'opening_invoices' => 'Opening Invoices',
                'opening_bills' => 'Opening Bills',
                'opening_agent_invoice' => 'Opening Agent Invoice',
                'opening_principal_soa' => 'Opening Principal Soa',
                'flight_schedule' => 'Flight Schedule',
                'nearby_port' => 'Nearby Port',
                'team' => 'Team',
                'active_in_active_reason' => 'Active In-active Reason',
                'currency_market_rate' => 'Currency Market Rate',
                'currency' => 'Currency',
                'report_fixed_text' => 'Report Fixed Text',
                'bl_template' => 'B/L Template',
                'airport' => 'Airport',
                'shipping_agency_license' => 'Shipping Agency License',
                'slab_type' => 'Slab Type',
                'rate_group' => 'Rate Group',
                'detention_demurrage_tariff' => 'Detention / Demurrage Tariff',
                'hs_code' => 'HS Code',
                'email_template' => 'Email Template',
                'principal_manual_soa' => 'Principal Manual SOA',
                'party_locations' => 'Party Locations',
                'letter_template' => 'Letter Template',
                'sale_rep_status' => 'Sale Rep Status',
                'bl_query_form' => 'BL Query Form',
                'air_query_form' => 'Air Query Form',
                'wharf' => 'Wharf',
                'packages_coding' => 'Packages Coding',
                'bank_detail_register' => 'Bank Detail Register',
                'inco_term' => 'Incoterm',
                'service_type' => 'Service Type',
                'localization_setup' => 'Localization Setup',
                'commodity_mapping' => 'Commodity Mapping',
                'employee_mapping' => 'Employee Mapping',
                'equipment_sizetype_mapping' => 'Equipment Size/Type Mapping',
                'party_mapping' => 'Party Mapping',
                'vessel_mapping' => 'Vessel Mapping',
                'parties_and_salaries_report' => 'Parties and Salaries Report',
                'tax_revenue_distribution' => 'Tax Revenue Distribution',
                'party_mandatory_fields_setup' => 'Party Mandatory Fields Setup',
                'mandatory_fields_setup' => 'Mandatory Fields Setup',
                'cost_center_group' => 'Cost Center Group',
                'drawn_bank' => 'Drawn Bank',
                'ftp_setting' => 'FTP Setting',
                'grid_report_configuration_setup' => 'Grid Report Configuration Setup',
                'charges_list_report' => 'Charges List Report',
                'party_scac_iata_code' => 'Party SCAC / IATA Code',
                'email_credentials' => 'Email Credentials',
                'create_navigation' => 'Create Navigation'
            ]
        ];

        return $this->setups;
    }

    public function common()
    {
        $this->setups = [
            "Common" => [
                'letter_process' => 'Letter Process',
                'dashboard_setup_policy' => 'Dashboard Setup Policy',
                'letters' => 'Letters',
                'party_outstanding_details' => 'Party Outstanding Details',
                'direct_job_expense_revenue' => 'Direct Job Expense Revenue',
                'job_invoice' => 'Job Invoice',
                'job_receipt' => 'Job Receipt',
                'online_payment_dashboard' => 'Online Payment Dashboard',
                'job_bill' => 'Job Bill',
                'job_payment' => 'Job Payment',
                'agent_invoice' => 'Agent Invoice',
                'agent_receipt_payment' => 'Agent Receipt / Payment',
                'job_settlement' => 'Job Settlement',
                'quotation' => 'Quotation',
                'tracing' => 'Tracing',
                'job_payment_requisition' => 'Job Payment Requisition',
                'sea_publish_rate' => 'Sea Publish Rate (Live Rate)',
                'sea_interior_rate' => 'Sea Interior Rate (Upload Rate)',
                'sea_accessorial_charge' => 'Sea Accessorial Charge (Accessorial Charges)',
                'history_viewer' => 'History Viewer',
                'party_profile_query' => 'Party Profile Query',
                'terminal_invoice' => 'Terminal Invoice',
                'bulk_process' => 'Bulk Process',
                'e_invoice_dashboard' => 'E-Invoice Dashboard',
                'export_booking_request' => 'Export Booking Request',
                'project' => 'Project'
            ]
        ];

        return $this->setups;
    }
}
