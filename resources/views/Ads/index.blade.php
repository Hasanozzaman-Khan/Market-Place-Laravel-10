@extends('Layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('sidebar')
        </div>
        <div class="col-md-9">
            @if($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <!-- <button type="button" class="close" data-dismis="alert" aria-label="close" name="button"> -->
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
                                    <td><img src="{{Storage::url($ad->feature_image)}}" width="100" height="60" alt="..."></td>
                                    <td>{{$ad->name}}</td>
                                    <td class="text-primary">USD{{$ad->price}}</td>
                                    <td>
                                        @if($ad->published==1)
                                            <span class="badge bg-primary">Published</span>
                                        @else
                                            <span class="badge bg-danger">Pending</span>
                                        @endif
                                    </td>
                                    <td><button class="btn btn-outline-warning">Edit</button></td>
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
