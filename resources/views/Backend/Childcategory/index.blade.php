@extends('Backend.Layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        @include('Backend.Inc.message')
        <h3>Manage Childcategory</h3>
        <div class="row justify-content-center">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Subcategory</th>
                                        <th>Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($childcategories as $childcategory)
                                        <tr>
                                            <td class="category_{{$childcategory->id}}">{{$childcategory->subcategory->name}}</td>
                                            <td>{{$childcategory->name}}</td>
                                            <td><a href="{{route('childcategory.edit',[$childcategory->id])}}"><button class="btn btn-info"><i class="mdi mdi-table-edit"></i></button></a></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$childcategory->id}}">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$childcategory->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                      <form class="" action="{{route('childcategory.destroy',[$childcategory->id])}}" method="post">@csrf
                                                          @method('DELETE')
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                  </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                  Are you Sure to delete {{$childcategory->name}} ?
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
                                        <td>No Childcategory is displayed here</td>
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
