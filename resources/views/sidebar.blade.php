<div class="card">
    <div class="card-body">
        @if(!auth()->user()->avatar)
            <img src="/img/pp.jpg" alt="" class="mx-auto d-block img-thumbnail" width="130">
        @endif

        @if(auth()->user()->avatar && !auth()->user()->fb_id)
            <img src="{{Storage::url(auth()->user()->avatar)}}" alt="" class="mx-auto d-block img-thumbnail" width="130">
        @endif

        @if(auth()->user()->fb_id)
            <img src="{{auth()->user()->avatar}}" alt="" class="mx-auto d-block img-thumbnail" width="130">
        @endif

        <p class="text-center"><b>{{auth()->user()->name}}</b></p>
        <hr style="border:2px solid blue">
        <div class="vartical-menu">
            <a href="#">Dashboard</a>
            <a href="{{route('profile.index')}}" class="{{request()->is('profile')?'active':''}}">Profile</a>
            <a href="{{route('ads.index')}}" class="{{request()->is('ads')?'active':''}}">Publish ads</a>
            <a href="{{route('ads.create')}}" class="{{request()->is('ads/create')?'active':''}}">Create ads</a>
            <a href="{{route('ads.pending')}}" class="{{request()->is('ads/pending')?'active':''}}">Pending ads</a>
            <a href="{{route('my.saved.ad')}}" class="{{request()->is('my-saved-ad')?'active':''}}">Saved Advertisement</a>
            <a href="{{route('messages')}}" class="{{request()->is('messages')?'active':''}}">Message</a>
        </div>
    </div>
</div>
