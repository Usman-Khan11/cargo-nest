@extends('admin.layouts.app')

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="post" action="{{ route('admin.staff.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $staff->id }}" />
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold">{{ $page_title }}</h4>
                    <hr />
                </div>
                <div class="card-body">
                     <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="mb-3">
                                <label class="form-label">Name*</label>
                                <input name="name" type="text" class="form-control" placeholder="Name*" value="{{ $staff->name }}" />
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input name="email" type="text" class="form-control" placeholder="Email" value="{{ $staff->email }}" />
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <div class="mb-3">
                                <label class="form-label">Role*</label>
                                <select name="group_id" class="form-control">
                                    <option selected disabled>Select Role</option>
                                    @foreach($roles as $role)
                                    <option @if($role->id == $staff->role_id) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <div class="mb-3">
                                <label class="form-label">Username*</label>
                                <input name="username" type="text" class="form-control" placeholder="Username*" value="{{ $staff->username }}" />
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12">
                            <div class="mb-3">
                                <label class="form-label">Password*</label>
                                <input name="password" type="password" class="form-control" placeholder="Password*" />
                            </div>
                        </div>

                        <div class="col-md-12 col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
