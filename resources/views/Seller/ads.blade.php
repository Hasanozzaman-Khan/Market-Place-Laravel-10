@extends('Layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        @if(!$user->avatar)
                            <img src="/img/pp.jpg" alt="" class="mx-auto d-block img-thumbnail" width="180">
                        @else
                            <img src="{{Storage::url($user->avatar)}}" alt="" class="mx-auto d-block img-thumbnail" width="180">
                        @endif
                        <p class="text-center"><b>{{$user->name}}</b></p>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @forelse($advertisements as $advertisement)
                                <div class="col-md-4">
                                    <a href="{{route('product.show',[$advertisement->id, $advertisement->slug])}}">
                                        <img src="{{Storage::url($advertisement->feature_image)}}" class="img-thumbnail" alt="..." style="min-height:170px;max-height:200px;">
                                    </a>
                                    <p class="text-center card-footer" style="color:#222;">{{$advertisement->name}}/${{$advertisement->price}}</p>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {!! $advertisements->links() !!}
                </div>

            </div>

        </div>
    </div>


@endsection
