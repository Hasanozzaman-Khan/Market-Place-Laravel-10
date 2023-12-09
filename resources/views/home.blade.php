@extends('Layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Home</h3>
                    </div>
                    <div class="card-body">
                        Hello, {{Auth()->user()->name}}.
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
