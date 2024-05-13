@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus">
            <i class="fa fa-square-plus"></i>
        </div>
        <div class="save">
            <i class="fa fa-save"></i>
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
            <div class="col-md-5">
                <form method="post" action="{{ route('admin.commodity.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                            <!--<hr />-->
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Vessel:</label>
                                        <input name="vessel" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Voyage</label>
                                        <input name="voyage" type="text" class="form-control" placeholder="" />
                                    </div>    
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Port of Dischage</label>
                                        <input name="port_of_discharge" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Port of Loading</label>
                                        <input name="port_of_loading" type="text" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                
                                 <div class="col-md-8 col-12">
                                    <label class="form-check-label mb-2">Type:</label>
                                    <div class="d-flex">
                                        <div class="mb-2">
                                            <input name="type" type="radio" class="form-check-input" value="Import" id="defaultRadio1" />
                                            <label class="form-check-label" for="defaultRadio1">Import</label>
                                        </div>
                                        <div class="mb-2 px-3">
                                            <input name="type" type="radio" class="form-check-input" value="Export" id="defaultRadio2" />
                                            <label class="form-check-label" for="defaultRadio2">Export</label>
                                        </div>
                                        <div class="mb-2 px-3">
                                            <input name="type" type="radio" class="form-check-input" value="Both" id="defaultRadio3" />
                                            <label class="form-check-label" for="defaultRadio3">Both</label>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    
                    
                   
                </form>
            </div>
            <div class="col-md-7">
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
            
            <div class="card mb-4">
                <div class="p-3">
                    <table class="datatables-basic table">
                        <thead>
                          <tr>
                            <th>...</th>
                            <th>S.No</th>
                            <th>Currency</th>
                            <th>Selling</th>
                            <th>Buying</th>
                            <th>Sline/Carrier Code</th>
                            <th>Sline/Carrier Name</th>
                          </tr>
                        </thead>
                        <tbody>
                            <td><i class="fa fa-circle-xmark fa-lg text-danger"></i></td>
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
@endsection

@push('script')
<script>
    $('#submitButton').click(function(){
        // Trigger form submission
        $('#myForm').submit();
      });
      


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
            "url": "{{ route('admin.voyage.create') }}",
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
                data: 'vessel',
                title: 'Vessel'
            },
            {
                data: 'voyage',
                title: 'Voyage'
            },
            {
                data: 'port_of_discharge',
                title: 'Port of Dischage'
            },
            {
                data: 'port_of_loading',
                title: 'Port of Loading'
            },
            {
                data: 'type',
                title: 'Type'
            },
            
        ],          
         "rowCallback": function(row, data) {}
    });
});





</script>
@endpush









