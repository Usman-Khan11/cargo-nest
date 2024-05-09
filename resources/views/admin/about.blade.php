@extends('admin.layouts.app')
@section('title')
{{ $top_title }}
@endsection

@section('breadcrumb-panel')


<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form" method="Post" enctype="multipart/form-data" action="{{ route('admin.about.store') }}">
                        @csrf
                        <div class="row">
                            
                            <div class="col-md-6 col-12">
                                <img src="{{ asset('frontend/images/about/'.$about->bg_img) }}" width="100%" />
                                <div class="my-1">
                                    <label class="form-label">Background Image</label>
                                    <input type="file" class="form-control" name="bg_image">
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-12">
                                <img src="{{ asset('frontend/images/about/'.$about->ceo_img) }}" width="60%" />
                                <div class="my-1">
                                    <label class="form-label">CEO Image</label>
                                    <input type="file" class="form-control" name="ceo_image">
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label">CEO MESSAGE</label>
                                    <textarea class="form-control" placeholder="CEO MESSAGE" rows="6" name="ceo_msg" required>{{ $about->ceo_msg }}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label">WHO WE ARE</label>
                                    <textarea class="form-control" placeholder="WHO WE ARE" rows="6" name="who_we_are">{{ $about->who_we_are }}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label">WHY US</label>
                                    <textarea class="form-control" placeholder="WHY US" rows="6" name="why_us">{{ $about->why_us }}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label">VISION</label>
                                    <textarea class="form-control" placeholder="VISION" rows="6" name="vision">{{ $about->vision }}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label">MISSION</label>
                                    <textarea class="form-control" placeholder="MISSION" rows="6" name="mission">{{ $about->mission }}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label">Meta Title</label>
                                    <input name="meta_title" type="text" class="form-control" 
                                    placeholder="Meta Title" value="{{ $about->meta_title }}">
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label">Meta Keywords</label>
                                    <textarea class="form-control" placeholder="Meta Keywords"
                                        name="meta_keywords" rows="4">{{ $about->meta_keywords }}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label">Meta Description</label>
                                    <textarea class="form-control" placeholder="Meta Description"
                                        name="meta_desc" rows="6">{{ $about->meta_desc }}</textarea>
                                </div>
                            </div>

                            <div class="col-12 mt-1">
                                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light" name="btnord">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
                
@endsection

@push('script') 
@if(Session::has('success'))
    <script type="text/javascript">
        toastr.success("{{ Session::get('success') }}");
    </script>
@endif
@endpush