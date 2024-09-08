@extends('admin.master')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Edit Portfolio Page</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('allPortfolio')}}">All Portfolio</a></li>
                        <li class="breadcrumb-item active">Edit Portfolio Page</li>
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
                    <form method="post" action="{{ route('updatePortfolio') }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Portfolio Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="hidden" name="id" class="form-control" value="{{ $portfolio->id }}"/>
                                    <input type="text" name="portfolio_name" class="form-control" value="{{ $portfolio->portfolio_name }}"/>
                                    @error('portfolio_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Portfolio Title</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="portfolio_title" class="form-control" value="{{ $portfolio->portfolio_title }}"/>
                                    @error('portfolio_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Portfolio Description</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <div class="card">
                                        <div class="card-body">
                                            <textarea id="elm1" name="portfolio_description"> {{ $portfolio->portfolio_description }} </textarea>
                                            @error('portfolio_description')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Portfolio Image</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="file" onchange="showImage()" name="portfolio_image" class="form-control" id="image"/>
                                    <input type="hidden" name="old_image" value="{{ $portfolio->portfolio_image }}">
                                    @error('portfolio_image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Preview</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <img id="preview" class="border" src="{{ asset('images/portfolio/' . $portfolio->portfolio_image) }}" alt="profile Picture" width="100">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <button type="submit" class="btn btn-primary">Update Portfolio</button>
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