@extends('Backend.Layouts.master')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">

            <div class="col-md-3">
                <div class="card" style="background-color:blue; color:#fff">
                    <div class="card-body text-center">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <p class="lead">User</p>
                        <p class="lead">{{App\Models\User::count()}}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card" style="background-color:blue; color:#fff">
                    <div class="card-body text-center">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <p class="lead">Advertisement</p>
                        <p class="lead">{{App\Models\Advertisement::count()}}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card" style="background-color:blue; color:#fff">
                    <div class="card-body text-center">
                        <i class="mdi mdi-briefcase"></i>
                        <p class="lead">Category</p>
                        <p class="lead">{{App\Models\Category::count()}}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card" style="background-color:blue; color:#fff">
                    <div class="card-body text-center">
                        <i class="mdi mdi-apps"></i>
                        <p class="lead">Subcategory</p>
                        <p class="lead">{{App\Models\Subcategory::count()}}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card" style="background-color:blue; color:#fff">
                    <div class="card-body text-center">
                        <i class="mdi mdi-apps"></i>
                        <p class="lead">Childcategory</p>
                        <p class="lead">{{App\Models\Childcategory::count()}}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
