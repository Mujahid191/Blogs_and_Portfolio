@extends('admin.master')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">About Page</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Upcube</a></li>
                        <li class="breadcrumb-item active">About Page</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- Profile area -->
    <div class="main-body">
        <div class="row">
            <div class="col">
                <div class="card">
                    <form method="post" action="{{ route('updateAbout') }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Title</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="hidden" name="id" class="form-control" value="{{ $about->id }}" />
                                    <input type="text" name="title" class="form-control" value="{{ $about->title }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Short Title</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="short_title" class="form-control" value="{{ $about->short_title }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Short Description</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <textarea id="textarea" name="short_description" class="form-control" maxlength="255" rows="3">{{ $about->short_description }}</textarea>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Long Description</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <div class="card">
                                        <div class="card-body">
                                            <textarea id="elm1" name="long_description"> {!! $about->long_description !!} </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Slider Image</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="file" onchange="showImage()" name="new_image" class="form-control" id="image"/>
                                    <input type="hidden" name="old_image" value="{{ $about->image }}">
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Preview</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <img id="preview" class="border" src="{{ !(empty( $about->image ) )? asset('images/about/' . $about->image) : asset('images/no_image.jpg') }}" alt="profile Picture" width="100">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile area -->
</div>
<script>
    const showImage = () =>{
        let image = document.getElementById('image');
        let preview = document.getElementById('preview');
        console.log(preview);
        if(image.files && image.files[0]){
            const reader = new FileReader();
            reader.onload = function(e){
                preview.src = e.target.result;
            }
            reader.readAsDataURL(image.files[0]);
        }
    }
</script>
@push('aboutJs')
        <!--tinymce js-->
        <script src="{{ asset('backend/libs/tinymce/tinymce.min.js')}}"></script>

        <!-- init js -->
        <script src="{{ asset('backend/js/pages/form-editor.init.js')}}"></script>
@endpush
@endsection