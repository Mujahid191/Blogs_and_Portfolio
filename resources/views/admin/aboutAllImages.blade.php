@extends('admin.master')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">About All Images</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Upcube</a></li>
                        <li class="breadcrumb-item active">About All Images</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row"> 
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Image Preview</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php( $no = 1 )
                            @foreach ($images as $image)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td class="p-0"><img src="{{ asset('images/multiImages/' . $image->multi_image) }}" alt="image" width="70"></td>
                                    <td>
                                        <a href="{{ route('editMultiImages', $image->id) }}" class="btn btn-info sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('deleteMultiImages', $image->id) }}" class="ms-5 btn btn-danger sm" id="delete"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>
@endsection