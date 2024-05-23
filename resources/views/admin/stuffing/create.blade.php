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


@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-7">
                <form id="myForm" method="post" action="{{ route('admin.stuffing.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bold">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Tran#</label>
                                        <input name="tran_number" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Date</label>
                                        <input name="date" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Type</label>
                                        <select name="type1" class="form-select">
                                            <option value="">Job Wise</option>
                                            <option value="">Container Wise</option>
                                            <option value="">FCL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Type</label>
                                        <select name="type2" class="form-select">
                                            <option value="">Console</option>
                                            <option value="">Coload</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Container</label>
                                        <input name="container" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Seal No</label>
                                        <input name="seal_number" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Vessel</label>
                                        <input name="vessel" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Overseas Agent</label>
                                        <input name="overseas_agent" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Shipping Line</label>
                                        <input name="shipping_line" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Sales Rep</label>
                                        <input name="sales_rep" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label">Remarks</label>
                                        <textarea name="remarks" class="form-control" rows="6"></textarea>
                                    </div>
                                </div>
                                
                            </div>
                             <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Stuffing Date</label>
                                        <input name="stuffing_date" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Cut Off Date</label>
                                        <input name="cut_off_date" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Port of Discharge</label>
                                        <input name="port_of_discharge" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Size Type</label>
                                        <select name="size_type" class="form-select">
                                            <option value=""></option>
                                            <option value=""></option>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Job#</label>
                                        <input name="job_number" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Voyage</label>
                                        <input name="voyage" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Sailing Date</label>
                                        <input name="sailing_date" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Delivery</label>
                                        <input name="delivery" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Print</label>
                                        <input name="print" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Serial No</label>
                                        <input name="serial_number" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <button class="btn btn-primary btn-sm mb-2">Update Details On Booking</button>
                                        <button class="btn btn-primary btn-sm">Vessel And Voyage Update</button>
                                        <button class="btn btn-primary btn-sm">Excel Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="responsive text-nowrap">
                            <table class="table table-bordered table-sm quotation_record">
                                <thead class="table-primary">
                                    <tr>
                                        <th></th>
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
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="card-datatable table-responsive pt-0">
                            <table class="datatables-basic table" style="width: 200%;">
                            <thead>
                              <tr>
                                <th>Email</th>
                                <th>Send Email</th>
                                <th>...</th>
                                <th>S.No</th>
                                <th>Job No</th>
                                <th>B/L #</th>
                                <th>Shipper</th>
                                <th>Final Destination</th>
                                <th>Sales Man</th>
                                <th>M3 Initial</th>
                                <th>M3 Shipper</th>
                                <th>Client Name</th>
                                <th>M3 Manifest</th>
                                <th>Gross Weight</th>
                                <th>Net Weight</th>
                                <th>No of Package</th>
                                <th>Terminal</th>
                                <th>Remarks</th>
                              </tr>
                            </thead>
                            <tbody>
                                <td class="text-center"><input type="checkbox" style="width:16px; height:16px;"/></td>
                                <td><input type="text" style="width: 100%;"/></td>
                                <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
                                <td><input type="text" style="width: 100%;"/></td>
                                <td><input type="text" style="width: 100%;"/></td>
                                <td><input type="text" style="width: 100%;"/></td>
                                <td><input type="text" style="width: 100%;"/></td>
                                <td><input type="text" style="width: 100%;"/></td>
                                <td><input type="text" style="width: 100%;"/></td>
                                <td><input type="text" style="width: 100%;"/></td>
                                <td><input type="text" style="width: 100%;"/></td>
                                <td><input type="text" style="width: 100%;"/></td>
                                <td><input type="text" style="width: 100%;"/></td>
                                <td><input type="text" style="width: 100%;"/></td>
                                <td><input type="text" style="width: 100%;"/></td>
                                <td><input type="text" style="width: 100%;"/></td>
                                <td><input type="text" style="width: 100%;"/></td>
                                <td><input type="text" style="width: 100%;"/></td>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script') 
<script type="text/javascript">
$(document).ready(function(){
    var datatable = $('.quotation_record').DataTable({
        select: {
            style: 'api'
        },
        "processing": true,
        "serverSide": true,
        "lengthChange": false,
        "pageLength": 15,
        "scrollX": true,
        "ajax": {
            "url": "{{ route('admin.stuffing.create') }}",
            "type": "get",
            "data": function(d) {
                var frm_data = $('#result_report_form').serializeArray();
                $.each(frm_data, function(key, val) {
                    d[val.name] = val.value;
                });
            },
        },
        columns: [
            {
                data: 'DT_RowIndex',
                title: 'Sr No'
            },
            {
                data: 'tran_number',
                title: 'Tran #'
            },
            {
                data: 'date',
                title: 'Date'
            },
            {
                data: 'seal_number',
                title: 'Seal #'
            },
            {
                data: 'vessel',
                title: 'Vessel'
            },
            {
                data: 'overseas_agent',
                title: 'Overseas Agent'
            },
        ],          
         "rowCallback": function(row, data) {}
    });
});

$('#submitButton').click(function(){
    // Trigger form submission
    $('#myForm').submit();
});

</script>

@endpush