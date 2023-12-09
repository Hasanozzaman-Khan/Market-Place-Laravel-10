@extends('Backend.Layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">


        <div class="row justify-content-center">
            <div class="col-md-8 grid-margin">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Update Childcategory</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-sample" action="{{route('childcategory.update',[$childcategory->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="subcategory_id">Choose Subcategory</label>
                                <select class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id" id="subcategory_id">
                                    <option value="">Select Subcategory</option>
                                    @foreach(App\Models\Subcategory::all() as $subcategory)
                                        <option value="{{$subcategory->id}}" {{$subcategory->id == $childcategory->subcategory_id ? 'selected':''}}>{{$subcategory->name}}</option>
                                    @endforeach
                                </select>
                                @error('subcategory_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$childcategory->name}}">
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
