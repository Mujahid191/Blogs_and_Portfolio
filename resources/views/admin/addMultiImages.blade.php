@extends('admin.master')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Add Multi Image</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Upcube</a></li>
                        <li class="breadcrumb-item active">Add Multi Image</li>
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
                    <form method="post" action="{{ route('addMultiImages') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Slider Image</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="file" onchange="showImage()" name="multiImage[]" class="form-control" id="image" multiple/>
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Preview</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" id="preview_container">
                                    <img id="preview" class="border" src="{{ asset('images/no_image.jpg') }}" alt="profile Picture" width="100">
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
    const showImage = () => {
        let image = document.getElementById('image');
        let previewContainer = document.getElementById('preview_container');

        if (previewContainer) {
            // Clear existing previews
            previewContainer.innerHTML = '';

            if (image.files && image.files.length > 0) {
                image.files.forEach(file => {
                    const reader = new FileReader();
                    const img = document.createElement('img');
                    img.className = 'preview-image'; // Optional: Apply a class for styling
                    reader.onload = function (e) {
                        img.src = e.target.result;
                    };
                    reader.readAsDataURL(file);

                    // Append the img element to the container
                    previewContainer.appendChild(img);
                });
            }
        }
    }
</script>
@endsection