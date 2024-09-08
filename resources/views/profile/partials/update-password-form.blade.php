@extends('admin.master')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Change Password</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Upcube</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- Profile area -->
    <div class="main-body">
        <div class="row">
            <div class="col-lg-10">
                <div class="card py-4">
                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Current Password</h6>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    <input id="current_password" name="current_password" type="password"  class="form-control"/>
                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="text-danger m-0 p-0 list-unstyled" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">New Password</h6>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    <input id="password" name="password" type="password"  class="form-control"/>
                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="text-danger m-0 p-0 list-unstyled" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Confirm Password</h6>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    <input id="password_confirmation" name="password_confirmation" type="password"  class="form-control"/>
                                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="text-danger m-0 p-0 list-unstyled" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <button type="submit" class="btn btn-primary">Update Password</button>
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
@endsection