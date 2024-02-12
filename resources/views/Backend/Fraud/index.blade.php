@extends('Backend.Layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        @include('Backend.Inc.message')
        <h3>Manage Reports</h3>
        <div class="row justify-content-center">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Ad Name</th>
                                        <th>Email</th>
                                        <th>Reason</th>
                                        <th>Message</th>
                                        <th>View</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($ads as $ad)
                                        <tr>
                                            <td>{{$ad->fraudad->name}}</td>
                                            <td>{{$ad->email}}</td>
                                            <td>{{$ad->reason}}</td>
                                            <td>{{$ad->message}}</td>
                                            <td>
                                                <a target="_blank" href="{{route('product.show',[$ad->ad_id, $ad->fraudad->slug])}}"><button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button></a>
                                            </td>

                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$ad->ad_id}}">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$ad->ad_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                      <form class="" action="{{route('ads.destroy',[$ad->ad_id])}}" method="post">@csrf
                                                          @method('DELETE')
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                  </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                  Are you Sure to delete this ad?
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
                                        <td>No any reported Ads to display</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {!! $ads->links() !!}
    </div>
</div>

@endsection
