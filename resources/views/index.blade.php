@extends('Layouts.app')

@section('content')
<div class="slider" style="margin-top: -25px;">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/slider/Slider30.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/slider/Slider31.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/slider/Slider32.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/slider/Slider07.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
</div>


<div class="container mt-5">
    <span>
        <h3>{{$category->name}}</h3>
        <a href="{{route('product.category',[$category->slug])}}" class="float-right">View all</a>
    </span>

    <div id="carouselExampleControls{{$category->name}}" class="carousel slide" data-bs-ride="carousel" data-interval="1500">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    @forelse($firstAds as $fAd)
                    <div class="col-3">
                        <a href="{{route('product.show',[$fAd->id, $fAd->slug])}}">
                            <img src="{{Storage::url($fAd->feature_image)}}" class="img-thumbnail" alt="..." style="min-height:170px;max-height:200px;">
                        </a>
                        <p class="text-center card-footer" style="color:#222;">{{$fAd->name}}/${{$fAd->price}}</p>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>

            <div class="carousel-item">
                <div class="row">
                    @forelse($secondAds as $sAd)
                    <div class="col-3">
                        <a href="{{route('product.show',[$sAd->id, $sAd->slug])}}">
                            <img src="{{Storage::url($sAd->feature_image)}}" class="img-thumbnail" alt="..." style="min-height:170px;max-height:200px;">
                        </a>
                        <p class="text-center card-footer" style="color:#222;">{{$sAd->name}}/${{$sAd->price}}</p>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls{{$category->name}}" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls{{$category->name}}" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>





<div class="container mt-5">
    <span>
        <h3>{{$categoryElectronic->name}}</h3>
        <a href="{{route('product.category',[$categoryElectronic->slug])}}" class="float-right">View all</a>
    </span>

    <div id="carouselExampleControls{{$categoryElectronic->name}}" class="carousel slide" data-bs-ride="carousel" data-interval="1500">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    @forelse($firstAdsElectronic as $fAd)
                    <div class="col-3">
                        <a href="{{route('product.show',[$fAd->id, $fAd->slug])}}">
                            <img src="{{Storage::url($fAd->feature_image)}}" class="img-thumbnail" alt="..." style="min-height:170px;max-height:200px;">
                        </a>
                        <p class="text-center card-footer" style="color:#222;">{{$fAd->name}}/${{$fAd->price}}</p>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>

            <div class="carousel-item">
                <div class="row">
                    @forelse($secondAdsElectronic as $sAd)
                    <div class="col-3">
                        <a href="{{route('product.show',[$sAd->id, $sAd->slug])}}">
                            <img src="{{Storage::url($sAd->feature_image)}}" class="img-thumbnail" alt="..." style="min-height:170px;max-height:200px;">
                        </a>
                        <p class="text-center card-footer" style="color:#222;">{{$sAd->name}}/${{$sAd->price}}</p>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls{{$categoryElectronic->name}}" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls{{$categoryElectronic->name}}" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
@endsection
