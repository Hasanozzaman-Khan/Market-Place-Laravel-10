@extends('Backend.Layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        @include('Backend.Inc.message')
        <h3>Manage Category</h3>
        <div class="row justify-content-center">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $category)
                                        <tr>
                                            <td><img src="{{Storage::url($category->image)}}"></td>
                                            <td>{{$category->name}}</td>
                                            <td><a href="{{route('category.edit',[$category->id])}}"><button class="btn btn-info"><i class="mdi mdi-table-edit"></i></button></a></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$category->id}}">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                      <form class="" action="{{route('category.destroy',[$category->id])}}" method="post">@csrf
                                                          @method('DELETE')
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                  </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                  Are you Sure to delete {{$category->name}} ?
                                                              </div>
                                                              <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                              </div>
                                                            </div>
                                                        </form>
                                                  </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <td>No Category</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
