@extends('Layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('sidebar')
        </div>
        <div class="col-md-9">
            @include('Backend.Inc.message')
            @if($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
            @endif
            <div class="card">
                <div class="card-header text-white" style="background-color:red;">
                    <h3 class="text-center">Post your ad</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Edit</th>
                                <th scope="col">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ads as $key => $ad)
                                <tr>
                                    <th scope="row">{{$key + 1}}</th>
                                    <td style="width:150px; height:100px;">
                                        <div id="carouselExampleControls{{$ad->id}}" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <!-- <img src="..." class="d-block w-100" alt="..."> -->
                                                    <img src="{{Storage::url($ad->feature_image)}}" width="150" height="100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{Storage::url($ad->first_image)}}" width="150" height="100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{Storage::url($ad->second_image)}}" width="150" height="100" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls{{$ad->id}}" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls{{$ad->id}}" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>



                                    </td>
                                    <td>{{$ad->name}}</td>
                                    <td class="text-primary">USD{{$ad->price}}</td>
                                    <td>
                                        @if($ad->published==1)
                                            <span class="badge bg-primary">Published</span>
                                        @else
                                            <span class="badge bg-danger">Pending</span>
                                        @endif
                                    </td>
                                    <td><a href="{{route('ads.edit',[$ad->id])}}"><button class="btn btn-outline-warning">Edit</button></a></td>
                                    <td><button class="btn btn-outline-info">View</button></td>
                                </tr>
                            @empty
                                <td>No Ads Found!</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
