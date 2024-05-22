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
        <div class="card">
            <div class="card-body">
                <div class="row">
            <div class="col-md-2">
                    <div class="mb-2">
                        <label class="form-check-label mb-2">
                            <input type="checkbox" class="form-check-input" class="form-check-input" name="All" value="Soc" class="form-check-input">
                            All
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                   <div class="mb-2">
                      <label for="cost" class="form-label">Date From:</label>
                      <input id="cost" name="Date From" type="date" step="0.01" class="form-control" required>
                   </div>
               </div>
               <div class="col-md-4">
                   <div class="mb-2">
                      <label for="cost" class="form-label">Date Till:</label>
                      <input id="cost" name="Date Till" type="date" step="0.01" class="form-control" required>
                   </div>
               </div>
           </div>
          <div class="row">
            <div class="col-md-6">
                <div class="mb-2">
                   <label for="cost" class="form-label">Report:</label>
                   <select name="Loading List" id="cars" step="0.01" class="form-control">
                       <option value="Loading List">Loading List</option>
                     </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-2">
                   <label for="cost" class="form-label">Vesel:</label>
                   <input id="cost" name="Vesel" type="text" step="0.01" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-2">
                   <label for="cost" class="form-label">Shpping Line:</label>
                   <input id="cost" name="Shpping Line" type="text" step="0.01" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-2">
                   <label for="cost" class="form-label">Client:</label>
                   <input id="cost" name="Client" type="text" step="0.01" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-2">
                   <label for="cost" class="form-label">Overseas Agent:</label>
                   <input id="cost" name="Overseas Agent" type="text" step="0.01" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-2">
                   <label for="cost" class="form-label">CostCenter:</label>
                   <input id="cost" name="CostCenter" type="text" step="0.01" class="form-control" required>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
                <label>Group On:</label>
            </div>
            <div class="col-md-8" style="border: 1px solid black; padding: 10px 20px; margin: 10px 0;">
                <div class="mb-2">
                    <input type="radio" class="form-check-input" class="form-check-input" id="Vissel Wise" name="fav_language" value="HTML">
                    <label for="Vissel Wise">Vissel Wise</label>
                    <input type="radio" class="form-check-input" id="Shiping Line Wise" name="fav_language" value="CSS">
                    <label for="Shiping Line Wise">Shiping Line Wise</label>
                    <input type="radio" class="form-check-input" id="No Grouping" name="fav_language" value="JavaScript">
                    <label for="No Grouping">No Grouping</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label>Report Type:</label>
            </div>
            <div class="col-md-8" style="border: 1px solid black; padding: 10px 20px; margin: 10px 0;">
                <div class="mb-2">
                    <input type="radio" class="form-check-input" id="Standerd" name="fav_language" value="HTML">
                    <label for="Standerd">Standerd</label>
                    <input type="radio" class="form-check-input" id="Extended" name="fav_language" value="CSS">
                    <label for="Extended">Extended</label>
                    <input type="radio" class="form-check-input" id="Extended 2" name="fav_language" value="JavaScript">
                    <label for="Extended 2">Extended 2</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-2">
                   <label for="cost" class="form-label">Print Out</label>
                   <select name="Viewer" id="cars" step="0.01" class="form-control">
                       <option value="Viewer">Viewer</option>
                     </select>
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









