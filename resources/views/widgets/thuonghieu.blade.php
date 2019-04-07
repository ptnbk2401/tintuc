<div class="section-brand style1">
    <div class="owl-carousel nav-style3" data-nav="true" data-autoplay="true" data-dots="true" data-loop="true" data-margin="2" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":4},"1000":{"items":6}}'>
        @foreach ($ThuongHieuItems as $thitem)
            <a href="{{$thitem->domain}}" target="_blank" class="item-brand">
                <img height="70px" src="{{asset('/storage/app/media/files/thuonghieu/'.$thitem->picture)}}" alt="{{ $thitem->domain }}">
            </a>
        @endforeach
    </div>
</div>