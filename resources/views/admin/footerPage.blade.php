@extends('admin.master')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Footer Setup Page</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Upcube</a></li>
                        <li class="breadcrumb-item active">Footer Page</li>
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
                    <form method="post" action="{{ route('updateFooter') }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Number</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="number" class="form-control" value="{{ $footer->number }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Short Title</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="short_title" class="form-control" value="{{ $footer->short_title }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Country</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="country" class="form-control" value="{{ $footer->country }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="address" class="form-control" value="{{ $footer->address }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="email" class="form-control" value="{{ $footer->email }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Facebook Link</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="facebook" class="form-control" value="{{ $footer->facebook }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Twitter Link</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="twitter" class="form-control" value="{{ $footer->twitter }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">LinkedIn Link</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="linkedin" class="form-control" value="{{ $footer->linkedin }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Instagram Link</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="instagram" class="form-control" value="{{ $footer->instagram }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Copyright</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="copyright" class="form-control" value="{{ $footer->copyright }}" />
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
@endsection