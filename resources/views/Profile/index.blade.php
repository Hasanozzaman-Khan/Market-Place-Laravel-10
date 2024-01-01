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
                        Hello, {{Auth()->user()->name}}.
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @if(session('error'))
                    <div class="alert alert-dnager">
                        {{session('error')}}
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-white bg-danger">
                        <h5 class="text-center">Change Password</h5>
                    </div>
                    <div class="card-body">
                        <form class="" action="index.html" method="post">
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="text" name="current_password" id="current_password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="text" name="new_password" id="new_password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="text" name="confirm_password" id="confirm_password" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="button" class="btn btn-outline-primary mt-2">Change Password</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
