@extends('admin.master')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">All Portfolio</h4>

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
                            <th>Portfolio Name</th>
                            <th>Portfolio Title</th>
                            <th>Portfolio Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($portfolios as $key => $portfolio)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $portfolio->portfolio_name }}</td>
                                    <td>{{ $portfolio->portfolio_title }}</td>
                                    <td><img src="{{ asset('images/portfolio/' . $portfolio->portfolio_image ) }}" alt="image" width="70"></td>
                                    <td>
                                        <a href="{{ route('editPortfolio', $portfolio->id) }}" class="btn btn-info sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('deletePortfolio', $portfolio->id) }}" class="ms-5 btn btn-danger sm" id="delete"><i class="fas fa-trash"></i></a>
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