@extends('Layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-center mt-2">
                    <h4>Login</h4>
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form class="" action="{{route('login')}}" method="POST">
                        @csrf

                        <div class="form-group row mt-2">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Email</label>
                            <div class="col-md-7">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="password" class="col-md-3 col-form-label text-md-right">Password</label>
                            <div class="col-md-7">
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control" @error('password') is-invalid @enderror>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <div class="col-md-7 offset-md-3">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" class="form-check-input" id="remember" {{old('remember')?'checked':''}}>
                                    <label for="remember" class="form-check-label">Remember me</label>
                                    <p><a href="{{ route('password.request')}}">Forgot password?</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mt-2 mb-0">
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>

                    </form>
                    <hr>
                    <div class="form-group row mt-2 mb-0 justify-content-center">
                        <div class="col-md-6">
                            <a href="{{ route('facebook.redirect')}}" class="btn btn-outline-primary"><i class="fa-brands fa-square-facebook"></i> Login with Facebook</a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('github.redirect')}}" class="btn btn-outline-primary"><i class="fa-brands fa-square-facebook"></i> Login with Github</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
