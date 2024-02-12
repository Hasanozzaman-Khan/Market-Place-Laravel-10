@extends('Layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-white bg-danger">
                    <a class="nav-link" href="{{route('product.subcategory',[$subcategory->category->slug, $subcategory->slug])}}"><h3>{{$subcategory->name}}</h3></a>

                </div>
                <div class="card-body">
                    @forelse($childcategories as $childcategory)
                        <p>
                            <a href="{{route('product.childcategory',[$childcategory->childcategories->subcategory->category->slug, $childcategory->childcategories->subcategory->slug, ($childcategory->childcategories->slug)??''])}}" class="nav-link">{{$childcategory->childcategories->name??''}}</a>
                            <!-- <a href=" {{($childcategory->childcategories->slug)??''}}" class="nav-link">{{$childcategory->childcategories->name??''}}</a> -->
                        </p>
                    @empty
                        <span>Subcategory not found!.</span>
                    @endforelse
                </div>
            </div>
            <br>
            <div class="card">
                <form class="" action="{{url()->current()}}" method="GET">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="minPrice">Minimum Price</label>
                            <input type="text" name="minPrice" id="minPrice" class="form-control" value="{{old('minPrice')}}">
                        </div>
                        <div class="form-group">
                            <label for="maxPrice">Maximum Price</label>
                            <input type="text" name="maxPrice" id="maxPrice" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary mt-2">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-9">
            @include('breadcrumb')
            <div class="row">
                @forelse($advertisements as $ad)
                    <div class="col-md-3">
                        <a href="{{route('product.show',[$ad->id,$ad->slug])}}">
                            <img src="{{Storage::url($ad->feature_image)}}" class="img-thumbnail" alt="...">
                            <p class="text-center card-footer" style="color:#222;">{{$ad->name}}/${{$ad->price}}</p>
                        </a>
                    </div>
                @empty
                    <span>Sorry, We are unable to find any product based on this subcategory.</span>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
