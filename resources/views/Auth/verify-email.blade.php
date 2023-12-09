@extends('Layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif

            <div class="card">
                <div class="card-header mt-2">Verify Your Account</div>
                <div class="card-body">
                    <form class="" action="{{route('verification.send')}}" method="POST">
                        @csrf


                        <div class="form-group row mt-2 mb-0">
                            <div class="col-md-7">
                                <button type="submit" class="btn btn-primary">Verify</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
