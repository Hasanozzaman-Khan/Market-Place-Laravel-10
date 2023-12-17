@extends('Layouts.app')

@section('content')
<example-component/>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <img src="/img/pp.jpg" alt="" class="mx-auto d-block img-thumbnail" width="130">
                        <p class="text-center"><b>Mal Tos</b></p>
                        <hr style="border:2px solid blue">
                        <div class="vartical-menu">
                            <a href="#">Dashboard</a>
                            <a href="#">Profile</a>
                            <a href="#">Create ads</a>
                            <a href="#">Publish ads</a>
                            <a href="#">Pending ads</a>
                            <a href="#">Message</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @if($errors->any())
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <!-- <button type="button" class="close" data-dismis="alert" aria-label="close" name="button"> -->

                        </button>
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
                        <form class="" action="{{route('ads.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row form-inline form-group mt-2">
                                <label for="feature_image" class="mt-1"><b>Upload 3 images</b></label>
                                <div class="col-md-4">
                                    <input type="file" name="feature_image" value="" class="form-control" id="feature_image" accept="image/*">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" name="first_image" value="" class="form-control" id="first_image" accept="image/*">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" name="second_image" value="" class="form-control" id="second_image" accept="image/*">
                                </div>
                            </div>
                            <div class="row form-inline form-group mt-2">
                                <div class="col-md-4">
                                    <label for="category_id" class=""><b>Category</b></label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="">Choose Category</option>
                                        @foreach(App\Models\Category::orderBy('name')->get() as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="subcategory_id" class=""><b>Subcategory</b></label>
                                    <select class="form-control" name="subcategory_id" id="subcategory_id">
                                        <option value="">Choose Subcategory</option>
                                        @foreach(App\Models\Subcategory::orderBy('name')->get() as $subcategory)
                                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="childcategory_id" class=""><b>Childcategory</b></label>
                                    <select class="form-control" name="childcategory_id" id="childcategory_id">
                                        <option value="">Choose Childcategory</option>
                                        @foreach(App\Models\Childcategory::orderBy('name')->get() as $childcategory)
                                            <option value="{{$childcategory->id}}">{{$childcategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="name"><b>Name</b></label>
                                <input type="text" name="name" value="" class="form-control" placeholder="Product name" id="name">
                            </div>
                            <div class="form-group mt-2">
                                <label for="description"><b>Description</b></label>
                                <textarea type="text" name="description" value="" class="form-control" id="description">
                                </textarea>
                            </div>
                            <div class="form-group mt-2">
                                <label for="price"><b>Price</b></label>
                                <input type="text" name="price" value="" class="form-control" id="price">
                            </div>
                            <div class="form-group mt-2">
                                <label for="price_status"><b>Price Status</b></label>
                                <select class="form-control" name="price_status" id="price_status">
                                    <option value="negotiable">Negotiable</option>
                                    <option value="fixed">Fixed</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="product_condition"><b>Product Condition</b></label>
                                <select class="form-control" name="product_condition" id="product_condition">
                                    <option value="">Select Product Condition</option>
                                    <option value="likenew">Looks Like New</option>
                                    <option value="heavilyused">Heavily Used</option>
                                    <option value="new">New</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="listing_location"><b>Listing Location</b></label>
                                <input type="text" name="listing_location" value="" class="form-control" id="listing_location">
                            </div>
                            <div class="row form-inline form-group mt-2">
                                <div class="col-md-4">
                                    <label for="country_id" class=""><b>Country</b></label>
                                    <select class="form-control" name="country_id" id="country_id">
                                        <option value="">Choose Country</option>
                                        @foreach(App\Models\Country::orderBy('name')->get() as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="state_id" class=""><b>State</b></label>
                                    <select class="form-control" name="state_id" id="state_id">
                                        <option value="">Choose State</option>
                                        @foreach(App\Models\State::orderBy('name')->get() as $state)
                                            <option value="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="city_id" class=""><b>City</b></label>
                                    <select class="form-control" name="city_id" id="city_id">
                                        <option value="">Choose City</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="phone_number"><b>Phone Number</b></label>
                                <input type="text" name="phone_number" value="" class="form-control" id="phone_number">
                            </div>
                            <div class="form-group mt-2">
                                <label for="link"><b>Link</b></label>
                                <input type="text" name="link" value="" class="form-control" id="link">
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-outline-danger">Publish</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style media="screen">
        .vartical-menu a{
            background-color: #fff;
            color: #000;
            display: block;
            padding: 12px;
            text-decoration: none;
        }
        .vartical-menu a:hover{
            background-color: red;
            color: #fff;
        }
    </style>
@endsection
