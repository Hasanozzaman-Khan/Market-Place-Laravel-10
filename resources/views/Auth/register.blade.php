@extends('Layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-center mt-2">
                    <h4>Register</h4>
                </div>
                <div class="card-body">
                    <form class="" action="{{route('register')}}" method="POST">
                        @csrf

                        <div class="form-group row mt-2">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                @if($errors->has('name'))
                                  <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Password Confirmation</label>
                            <div class="col-md-6">
                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')

                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2 mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>


                    </form>
                    <hr>
                    <div class="form-group row mt-2 mb-0 justify-content-center">
                        <div class="col-md-7 offset-md-3">
                            <a href="{{ route('facebook.redirect')}}" class="btn btn-outline-primary"><i class="fa-brands fa-square-facebook"></i> Login with Facebook</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
