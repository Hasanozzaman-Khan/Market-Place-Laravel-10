<div class="">
    <ol class="breadcrumb">
        <i class="fa fa-home"></i><a class="nav-link" href="/">Home</a>
        @for($i=2; $i <= count(Request::segments()); $i++)
            @if($i < count(Request::segments()) && $i > 0)
                ><a class="nav-link" href="{{URL::to(implode('/', array_slice(Request::segments(),0,$i,true)))}}">{{ucwords(Request::segment($i))}}</a>
            @else
                >{{ucwords(str_replace('-',' ',Request::segment($i)))}}
            @endif
            <!-- <li>
                gg
            </li> -->
        @endfor
    </ol>
</div>
