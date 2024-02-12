@extends('Layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{Storage::url($advertisement->feature_image)}}" height="400" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{Storage::url($advertisement->first_image)}}" height="400" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{Storage::url($advertisement->second_image)}}" height="400" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    {!! $advertisement->description !!}
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header">More Info</div>
                <div class="card-body">

                    <iframe  src="{{$advertisement->displayVideo()}}" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"></iframe>
                    <p>Video Link: <a href="{{$advertisement->link}}">{{$advertisement->name}}</a></p>
                    <p>Listing Location : {{$advertisement->listing_location}}</p>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="px-3">
                <h1>{{$advertisement->name}}</h1>
                <p>Price : ${{$advertisement->price}}</p>
                <p>Price Status : {{$advertisement->price_status}}</p>
                <p>Product Condition : {{$advertisement->product_condition}}</p>
                <p>Childcategory : {{$advertisement->childcategories->name??''}}</p>
                <p>Subcategory : {{$advertisement->subcategories->name??''}}</p>
                <p>Category : {{$advertisement->categories->name??''}}</p>
                <p>Posted : {{$advertisement->created_at->diffForHumans()}}</p>
                @if(Auth::check())
                @if(!$advertisement->didUserSavedAd() && Auth()->user()->id != $advertisement->user_id)
                <div id="save_ad">
                    <save-ad :ad-id="{{$advertisement->id}}" :user-id="{{auth()->user()->id}}"></save-ad>
                </div>
                @endif
                @endif
            </div>
            <hr>
            <div class="px-3">
                @if(!$advertisement->user->avatar)
                    <img src="/img/pp.jpg" alt="" width="120">
                @else
                <img src="{{Storage::url($advertisement->user->avatar)}}" alt="" width="120">
                @endif
                <p><a href="{{route('show.user.ads', [$advertisement->user_id])}}" class="">Seller Name : {{$advertisement->user->name??''}}</a></p>

                @if($advertisement->phone_number)
                <p id="show_phone_number"><show-phone-number :phone-number="{{$advertisement->phone_number}}"></show-phone-number></p>
                @endif

                <p>City : {{$advertisement->cities->name??''}}</p>
                <p>State : {{$advertisement->states->name??''}}</p>
                <p>Country : {{$advertisement->countries->name??''}}</p>
                <p id="message">
                    @if(Auth()->check() && Auth()->user()->id != $advertisement->user_id)
                        <message seller-name="{{$advertisement->user->name}}"
                            :user-id="{{Auth()->user()->id}}"
                            :receiver-id="{{$advertisement->user->id}}"
                            :ad-id="{{$advertisement->id}}">
                        </message>
                    @endif
                </p>
                <span>
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$advertisement->id}}">Report This Ad</a>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$advertisement->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{route('report.this.ad')}}" method="post">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Report, What's wrong with this ad</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="reason">Select Reason</label>
                                            <select class="form-control" name="reason" required>
                                                <option value="">Select</option>
                                                <option value="Fraud">Fraud</option>
                                                <option value="Duplicate">Duplicate</option>
                                                <option value="Spam">Spam</option>
                                                <option value="Wrong Category">Wrong Category</option>
                                                <option value="Offensive">Offensive</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Your Email</label>
                                            @if(Auth()->check())
                                                <input type="email" name="email" class="form-control" value="{{auth()->user()->email}}" readonly required>
                                            @else
                                                <input type="email" name="email" class="form-control" value="" required>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Your Message</label>
                                            <textarea name="message" class="form-control" rows="4" cols="80" required></textarea>
                                        </div>
                                        <input type="hidden" name="ad_id" value="{{$advertisement->id}}">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-outline-danger">Report this ad</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </span>
            </div>
            <div class="px-3">
                <div id="disqus_thread"></div>
                <script>
                    /**
                    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://markerplacelaravel10.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            </div>
        </div>
    </div>
</div>

@endsection
