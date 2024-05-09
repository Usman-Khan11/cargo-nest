@extends('admin.layouts.app')

@section('panel')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form" method="post" enctype="multipart/form-data"
                            action="{{ route('admin.save_general_setting') }}">
                            @csrf
                            <div class="row">

                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Sitename</label>
                                        <input name="sitename" type="text" class="form-control" placeholder="Sitename"
                                            value="{{ $generalSetting->sitename }}">
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Logo</label>
                                        <input name="logo" type="file" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Footer Description</label>
                                        <textarea name="footer_desc" rows="4" class="form-control" placeholder="Footer Description">{{ $generalSetting->footer_desc }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Phone</label>
                                        <input name="phone" type="text" class="form-control" placeholder="Phone"
                                            value="{{ $generalSetting->phone }}">
                                    </div>
                                </div>

                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Whatsapp</label>
                                        <input name="whatsapp" type="text" class="form-control" placeholder="Whatsapp"
                                            value="{{ $generalSetting->whatsapp }}">
                                    </div>
                                </div>

                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Email</label>
                                        <input name="email" type="text" class="form-control" placeholder="Email"
                                            value="{{ $generalSetting->email }}">
                                    </div>
                                </div>

                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" rows="3" class="form-control" placeholder="Address">{{ $generalSetting->address }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Iframe Location</label>
                                        <textarea name="iframe" rows="5" class="form-control" placeholder="Iframe Location">{{ $generalSetting->iframe }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Facebook Link</label>
                                        <input name="facebook" type="text" class="form-control"
                                            placeholder="Facebook Link" value="{{ $generalSetting->facebook }}">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Twitter Link</label>
                                        <input name="twitter" type="text" class="form-control" placeholder="Twitter Link"
                                            value="{{ $generalSetting->twitter }}">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Linkedin Link</label>
                                        <input name="linkedin" type="text" class="form-control"
                                            placeholder="Linkedin Link" value="{{ $generalSetting->linkedin }}">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Youtube Link</label>
                                        <input name="youtube" type="text" class="form-control" placeholder="Youtube Link"
                                            value="{{ $generalSetting->youtube }}">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Instagram Link</label>
                                        <input name="instagram" type="text" class="form-control"
                                            placeholder="Instagram Link" value="{{ $generalSetting->instagram }}">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Pinterest Link</label>
                                        <input name="pinterest" type="text" class="form-control"
                                            placeholder="Pinterest Link" value="{{ $generalSetting->pinterest }}">
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Privacy Policy</label>
                                        <textarea class="form-control" placeholder="Privacy Policy" name="privacy_policy">{{ $generalSetting->privacy_policy }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Meta Title</label>
                                        <input name="meta_title" type="text" class="form-control"
                                            placeholder="Meta Title" value="{{ $generalSetting->meta_title }}">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Meta Keywords</label>
                                        <textarea class="form-control" placeholder="Meta Keywords" name="meta_keywords" rows="4">{{ $generalSetting->meta_keywords }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="mb-1">
                                        <label class="form-label">Meta Description</label>
                                        <textarea class="form-control" placeholder="Meta Description" name="meta_desc" rows="6">{{ $generalSetting->meta_desc }}</textarea>
                                    </div>
                                </div>

                                <div class="col-12 mt-1">
                                    <button type="submit"
                                        class="btn btn-primary me-1 waves-effect waves-float waves-light"
                                        name="btnord">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
