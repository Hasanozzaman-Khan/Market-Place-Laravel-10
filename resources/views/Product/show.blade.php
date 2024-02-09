@extends('Layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{Storage::url($advertisement->feature_image)}}" height="400" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{Storage::url($advertisement->first_image)}}" height="400" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{Storage::url($advertisement->second_image)}}" height="400" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    {!! $advertisement->description !!}
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header">More Info</div>
                <div class="card-body">

                    <iframe  src="{{$advertisement->displayVideo()}}" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"></iframe>
                    <p>Video Link: <a href="{{$advertisement->link}}">{{$advertisement->name}}</a></p>
                    <p>Listing Location : {{$advertisement->listing_location}}</p>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="px-3">
                <h1>{{$advertisement->name}}</h1>
                <p>Price : ${{$advertisement->price}}</p>
                <p>Price Status : {{$advertisement->price_status}}</p>
                <p>Product Condition : {{$advertisement->product_condition}}</p>
                <p>Childcategory : {{$advertisement->childcategories->name??''}}</p>
                <p>Subcategory : {{$advertisement->subcategories->name??''}}</p>
                <p>Category : {{$advertisement->categories->name??''}}</p>
                <p>Posted : {{$advertisement->created_at->diffForHumans()}}</p>
                @if(Auth::check())
                @if(!$advertisement->didUserSavedAd() && Auth()->user()->id != $advertisement->user_id)
                <div id="save_ad">
                    <save-ad :ad-id="{{$advertisement->id}}" :user-id="{{auth()->user()->id}}"></save-ad>
                </div>
                @endif
                @endif
            </div>
            <hr>
            <div class="px-3">
                @if(!$advertisement->user->avatar)
                    <img src="/img/pp.jpg" alt="" width="120">
                @else
                <img src="{{Storage::url($advertisement->user->avatar)}}" alt="" width="120">
                @endif
                <p><a href="{{route('show.user.ads', [$advertisement->user_id])}}" class="">Seller Name : {{$advertisement->user->name??''}}</a></p>

                @if($advertisement->phone_number)
                <p id="show_phone_number"><show-phone-number :phone-number="{{$advertisement->phone_number}}"></show-phone-number></p>
                @endif

                <p>City : {{$advertisement->cities->name??''}}</p>
                <p>State : {{$advertisement->states->name??''}}</p>
                <p>Country : {{$advertisement->countries->name??''}}</p>
                <p id="message">
                    @if(Auth()->check() && Auth()->user()->id != $advertisement->user_id)
                        <message seller-name="{{$advertisement->user->name}}"
                            :user-id="{{Auth()->user()->id}}"
                            :receiver-id="{{$advertisement->user->id}}"
                            :ad-id="{{$advertisement->id}}">
                        </message>
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
