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
                <div class="card-header text-white bg-danger">
                    <h3 class="text-center">Saved Advertisements</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="">Image</th>
                                <th scope="col" class="">Name</th>
                                <th scope="col" class="">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ads as $key => $ad)

                                <tr class="">

                                    <!-- <th scope="row" class="text-center">{{$key + 1}}</th> -->
                                    <td scope="col"><a class="nav-link" href="{{route('product.show',[$ad->id, $ad->slug])}}" target="_blank"><img src="{{Storage::url($ad->feature_image)}}" width="100" height="80" alt="..."></a></td>
                                    <td><a class="nav-link" href="{{route('product.show',[$ad->id, $ad->slug])}}" target="_blank">{{$ad->name}}</a></td>
                                    <td>
                                        <form class="" action="{{route('my.saved.ad.destroy')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="adId" value="{{$ad->id}}">
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
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
