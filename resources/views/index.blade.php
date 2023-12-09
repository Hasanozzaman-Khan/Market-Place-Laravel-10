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
        <h3>Car</h3>
        <a href="#" class="float-right">View all</a>
    </span>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-interval="1500">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-3">
                        <img src="/product/Car01.jpg" class="img-thumbnail" alt="...">
                        <p class="text-center card-footer" style="color:#222;">Name of Product/$5000</p>
                    </div>
                    <div class="col-3">
                        <img src="/product/Car02.jpg" class="img-thumbnail" alt="...">
                        <p class="text-center card-footer" style="color:#222;">Name of Product/$5000</p>
                    </div>
                    <div class="col-3">
                        <img src="/product/Car01.jpg" class="img-thumbnail" alt="...">
                        <p class="text-center card-footer" style="color:#222;">Name of Product/$5000</p>
                    </div>
                    <div class="col-3">
                        <img src="/product/Car03.jpg" class="img-thumbnail" alt="...">
                        <p class="text-center card-footer" style="color:#222;">Name of Product/$5000</p>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="row">
                    <div class="col-3">
                        <img src="/product/Car03.jpg" class="img-thumbnail" alt="...">
                        <p class="text-center card-footer" style="color:#222;">Name of Product/$5000</p>
                    </div>
                    <div class="col-3">
                        <img src="/product/Car02.jpg" class="img-thumbnail" alt="...">
                        <p class="text-center card-footer" style="color:#222;">Name of Product/$5000</p>
                    </div>
                    <div class="col-3">
                        <img src="/product/Car03.jpg" class="img-thumbnail" alt="...">
                        <p class="text-center card-footer" style="color:#222;">Name of Product/$5000</p>
                    </div>
                    <div class="col-3">
                        <img src="/product/Car03.jpg" class="img-thumbnail" alt="...">
                        <p class="text-center card-footer" style="color:#222;">Name of Product/$5000</p>
                    </div>
                </div>
            </div>
            <!-- <div class="carousel-item">
                <img src="/slider/Slider20.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/slider/Slider21.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/slider/Slider07.jpg" class="d-block w-100" alt="...">
            </div> -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
    <!-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

            </div>
        </div>
    </div> -->


@endsection
