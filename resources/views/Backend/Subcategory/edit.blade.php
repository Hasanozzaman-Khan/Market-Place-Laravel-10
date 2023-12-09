@extends('Backend.Layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">


        <div class="row justify-content-center">
            <div class="col-md-8 grid-margin">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Update Subcategory</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-sample" action="{{route('subcategory.update',[$subcategory->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="category_id">Choose Category</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                    <option value="">Select Category</option>
                                    @foreach(App\Models\Category::all() as $category)
                                        <option value="{{$category->id}}" {{$category->id == $subcategory->category_id ? 'selected':''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$subcategory->name}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
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
