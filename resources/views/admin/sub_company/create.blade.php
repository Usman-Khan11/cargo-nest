@extends('admin.layouts.app')

@section('top_nav_panel')
<div class="col-md-4">
    <div class="d-flex">
        <div class="plus" onclick="formReset('/admin/sub_company/store')">
            <i class="fa fa-square-plus" title="Add"></i>
        </div>
        <div class="save">
            <i class="fa fa-save" id="submitButton" title="Save"></i>
        </div>
        <div class="xmark" onclick="deleteData('/admin/sub_company/delete')">
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
            <div class="col-md-12">
                <form id="myForm" method="post" action="{{ route('admin.sub_company.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="fw-bold" style="margin-bottom: 0rem;">{{ $page_title }}</h4>
                            <!--<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Show List</button>-->
                        </div>
                        <div class="card-body">
                            <input name="id" type="hidden" value="0" />
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <label class="form-label">Name:</label>
                                                <input name="name" type="text" class="form-control name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <label class="form-label">Display Name:</label>
                                                <input name="displayName" type="text" class="form-control displayName">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-2">
                                                <label class="form-label">Short Name:</label>
                                                <input name="shortName" type="text" class="form-control shortName">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="mb-2">
                                                <label class="form-label">Address:</label>
                                                <input name="address" type="text" class="form-control address">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label class="form-label">Phone:</label>
                                                <input name="phone" type="tel" class="form-control phone">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label class="form-label">Email:</label>
                                                <input name="email" type="email" class="form-control email">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label class="form-label">Fax:</label>
                                                <input name="fax" type="text" class="form-control fax">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-2">
                                                <label class="form-label">Website:</label>
                                                <input name="website" type="url" class="form-control website">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-2">
                                                <label class="form-label">S.T / VAT / CIN:</label>
                                                <input name="taxNumber" type="text" class="form-control taxNumber">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <label class="form-label">NTN / PAN / Reg No:</label>
                                                <input name="regNumber" type="text" class="form-control regNumber">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <label class="form-label">Localization:</label>
                                                <select name="localization" class="form-select localization">
                                                    <option value="localization1">Localization 1</option>
                                                    <option value="localization2">Localization 2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <label class="form-label">Region:</label>
                                                <select name="region" class="form-select region">
                                                    <option value="hjhjh">jhbj</option>
                                                    <option value="vhhv">vvjhb</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3 text-center">
                                    <h5>Company Logo</h5>
                                    
                                    <div id="imageContainer" style="width:100%; height:200px; border:1px solid #dbdade; border-radius:7px; margin-bottom:10px;">
                                        <img id="uploadedImage1" src="" width="75%" class="mb-2">
                                    </div>
                                    
                                    <div class="main-image" >
                                        <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('uploadInput1').click()">Upload</button>
                                        <input type="file" hidden class="form-control" name="company_logo" id="uploadInput1" accept="image/*" />
                                        <button id="removeButton1" type="button" class="btn btn-danger btn-sm">Remove</button>
                                    </div>
                                    
                                </div>
                                
                                <div class="col-md-3 text-center">
                                    <h5>Report Header</h5>
                                    
                                    <div id="imageContainer" style="width:100%; height:200px; border:1px solid #dbdade; border-radius:7px; margin-bottom:10px;">
                                        <img id="uploadedImage2" src="" width="75%" class="mb-2">
                                    </div>
                                    
                                    <div class="main-image" >
                                        <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('uploadInput2').click()">Upload</button>
                                        <input type="file" hidden class="form-control" name="report_header" id="uploadInput2" accept="image/*" />
                                        <button id="removeButton2" type="button" class="btn btn-danger btn-sm">Remove</button>
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-2">
                                                    <label class="form-label">Default Currency:</label>
                                                    <select name="currency" class="form-control currency">
                                                        <option value="usd">USD</option>
                                                        <option value="eur">EUR</option>
                                                        <option value="gbp">GBP</option>
                                                        <option value="inr">INR</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-2">
                                                    <label class="form-label">Code:</label>
                                                    <input name="c_code" type="text" class="form-control c_code">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <label class="form-label">Country:</label>
                                                    <input name="country" type="text" class="form-control country">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <div class="mb-2 mt-3">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name="manual_header" value="Manual-Header" class="form-check-input manual_header">
                                                        Manual Header
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="mb-2 mt-3">
                                                    <input name="manualHeader1" type="text" class="form-control manualHeader1">
                                                </div>
                                                <div class="mb-2">
                                                    <input name="manualHeader2" type="text" class="form-control manualHeader2">
                                                </div>
                                                <div class="mb-2">
                                                    <input name="manualHeader3" type="text" class="form-control manualHeader3">
                                                </div>
                                                <div class="mb-2">
                                                    <input name="manualHeader4" type="text" class="form-control manualHeader4">
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        
                                        <button type="button" class="btn btn-primary btn-sm">Cost Center Logo / Report Header Defination</button><br>
                                        <button type="button" class="btn btn-primary btn-sm mt-3">Copy From Other Companies</button>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive w-100">
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
        </div>        
    </div>
    
    
    

    <!--<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
    <!--  <div class="modal-dialog modal-lg">-->
    <!--    <div class="modal-content">-->
    <!--      <div class="modal-header">-->
    <!--        <h5 class="modal-title" id="exampleModalLabel">Sub Company List</h5>-->
    <!--        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
    <!--      </div>-->
    <!--      <div class="modal-body">-->
            
    <!--        <div class="table-responsive w-100">-->
    <!--            <table class="table table-bordered table-sm quotation_record">-->
    <!--                <thead class="table-primary">-->
    <!--                    <tr>-->
    <!--                        <th></th>-->
    <!--                        <th></th>-->
    <!--                        <th></th>-->
    <!--                        <th></th>-->
    <!--                        <th></th>-->
    <!--                        <th></th>-->
    <!--                    </tr>-->
    <!--                </thead>-->
    <!--                <tbody>-->
    <!--                    <tr>-->
    <!--                        <td></td>-->
    <!--                        <td></td>-->
    <!--                        <td></td>-->
    <!--                        <td></td>-->
    <!--                        <td></td>-->
    <!--                        <td></td>-->
    <!--                    </tr>-->
    <!--                </tbody>-->
    <!--            </table>-->
    <!--        </div>-->
            
    <!--      </div>-->
          
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->


    
    
    
    
    
    
@endsection

@push('script')
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
    //   scrollX: true,
      ajax: {
        url: "{{ route('admin.sub_company.create') }}",
        type: "get",
        data: function (d) {},
      },
      columns: [
        {
          data: "name",
          title: "Name",
        },
        {
          data: "shortName",
          title: "Short Name",
        },
        {
          data: "address",
          title: "Address",
        },
        {
          data: "phone",
          title: "Phone",
        },
        {
          data: "email",
          title: "Email",
        },
        {
          data: "company_logo",
          title: "Image",
          "render": function(data, type, full, meta) {
              return `<img src="{{ asset('assets/upload/') }}/${full.company_logo}" width="100px" loading="lazy" />`;
          }
        },
      ],
      rowCallback: function (row, data) {
        $(row).attr("onclick", `edit_row(this,'${JSON.stringify(data)}')`);
      },
    });
  });





    $('#submitButton').click(function(){
        // Trigger form submission
        $('#myForm').submit();
      });

function edit_row(e, data) {
    data = JSON.parse(data);
    if (data) {
        $(".name").val(data.name);
        $(".displayName").val(data.displayName);
        $(".shortName").val(data.shortName);
        $(".address").val(data.address);
        $(".phone").val(data.phone);
        $(".email").val(data.email);
        $(".fax").val(data.fax);
        $(".website").val(data.website);
        $(".taxNumber").val(data.taxNumber);
        $(".regNumber").val(data.regNumber);
        $(".localization").val(data.localization);
        $(".region").val(data.region);
        
        $(".currency").val(data.currency);
        $(".c_code").val(data.c_code);
        $(".country").val(data.country);
        $(".manual_header").val(data.manual_header);
        $(".manualHeader1").val(data.manualHeader1);
        $(".manualHeader2").val(data.manualHeader2);
        $(".manualHeader3").val(data.manualHeader3);
        $(".manualHeader4").val(data.manualHeader4);
        
        if(data.company_logo){
            $('#uploadedImage1').attr('src', "{{ asset('assets/upload/') }}/" + data.company_logo)
        }
        else{
            $('#uploadedImage1').attr('src', "https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png")
        }
        
        
        if(data.report_header){
            $('#uploadedImage2').attr('src', "{{ asset('assets/upload/') }}/" + data.report_header)
        }
        else{
            $('#uploadedImage2').attr('src', "https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png")
        }
        
        $("#myForm").attr("action", "{{ route('admin.sub_company.update') }}");
        $("input[name=id]").val(data.id);
    }
}


$(".navigation").click(function(){
    let id = $("input[name=id]").val();
    let route = '/admin/sub_company/get';
    let type = $(this).attr('data-type');
    let data = getList(route, type, id);
    if(data != null){
        edit_row('', JSON.stringify(data));
    }
})


    document.getElementById('uploadInput1').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (!file) return;
      
      const reader = new FileReader();

      reader.onload = function(e) {
        const imageUrl = e.target.result;
        const imageElement = document.createElement('img');
        imageElement.src = imageUrl;
        $('#uploadedImage1').attr('src',imageUrl)
      };

      reader.readAsDataURL(file);
    });
    
    document.getElementById('uploadInput2').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (!file) return;
      
      const reader = new FileReader();

      reader.onload = function(e) {
        const imageUrl = e.target.result;
        const imageElement = document.createElement('img');
        imageElement.src = imageUrl;
        $('#uploadedImage2').attr('src',imageUrl)
      };

      reader.readAsDataURL(file);
    });
    
    document.getElementById('removeButton1').addEventListener('click', function() {
      const imageContainer = document.getElementById('imageContainer');
      imageContainer.innerHTML = '<img id="uploadedImage" src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png" width="75%" class="mb-2" alt="Static Image">';
      document.getElementById('removeButton1').style.display = 'none'; 
      document.getElementById('uploadInput1').value = '';
    });

    document.getElementById('removeButton2').addEventListener('click', function() {
      const imageContainer = document.getElementById('imageContainer');
      imageContainer.innerHTML = '<img id="uploadedImage" src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png" width="75%" class="mb-2" alt="Static Image">';
      document.getElementById('removeButton2').style.display = 'none'; 
      document.getElementById('uploadInput2').value = '';
    });


</script>

@endpush









