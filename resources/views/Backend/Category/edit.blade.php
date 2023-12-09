@extends('Backend.Layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">


        <div class="row justify-content-center">
            <div class="col-md-8 grid-margin">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Update Category</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-sample" action="{{route('category.update',[$category->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$category->name}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" value="{{ $category->image }}" class="form-control @error('name') is-invalid @enderror">
                                <img src="{{Storage::url($category->image)}}" style="width:75px; height:75px;">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
