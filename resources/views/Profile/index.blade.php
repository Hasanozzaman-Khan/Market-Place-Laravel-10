@extends('Layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('sidebar')
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-white bg-danger">
                        <h5 class="text-center">Update Profile</h5>
                    </div>
                    <div class="card-body">
                        <form class="" action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="{{Auth()->user()->name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" value="{{Auth()->user()->address}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image">Profile Picture</label>
                                <input type="file" name="image" id="image" value="" class="form-control">
                                <img name="avatar" id="avatar" src="{{Auth()->user()->avatar}}" alt="">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary mt-2">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @if(session('status') === 'password-updated')
                    <div class="alert alert-success">Password Changed Successfully.</div>
                @endif
                <div class="card">
                    <div class="card-header text-white bg-danger">
                        <h5 class="text-center">Change Password</h5>
                    </div>
                    <div class="card-body">
                        <form class="" action="{{route('user-password.update')}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="text" name="current_password" id="current_password" class="form-control">
                                @error('current_password')
                                    <div class="">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="text" name="password" id="password" class="form-control">
                                @error('password')
                                    <div class="">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="text" name="password_confirmation" id="password_confirmation" class="form-control">
                                @error('password_confirmation')
                                    <div class="">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary mt-2">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
