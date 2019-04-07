 <!-- hot news start -->
 <div class="col-sm-16 hot-news hidden-xs">
  <div class="row">
    <div class="col-sm-15"> <span class="ion-ios7-timer icon-news pull-left"></span>
      <ul id="js-news" class="js-hidden">
        @foreach ($objItemsNew7 as $item7)
            <li class="news-item" style="color:black"><a href="{{ route('vpublic.core.pcbloglist.detail',[$item7->ccode,$item7->code,$item7->article_id]) }}" title="{{ $item7->aname }}">{{ str_limit($item7->aname,100) }}</a></li>
        @endforeach
      </ul>
    </div>
    <div class="col-sm-1 shuffle text-right"><a href="javascript:void(0)"><span class="ion-shuffle"></span></a></div>
  </div>
</div>
<!-- hot news end --> 
<!-- banner outer start -->
<div  class="col-sm-16 banner-outer wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="50">
  <div class="row">
    <div class="col-sm-16 col-md-10 col-lg-8"> 
      <!-- carousel start -->
      <div id="sync1" class="owl-carousel">
        @foreach ($objItemsSlide as $item)
          @php
             $hinhanh = $item->picture;
             $alt = str_limit($item->aname,50);
             $path = storage_path('app/media/files/slide/'.$item->picture );
             if( !empty( $item->picture ) && (file_exists( $path )) ) {
                $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile($hinhanh, 'slide', 565, 343) ;
                $anh_small = \App\Classes\Utils\FileUtils::resizeResultPathFile($hinhanh, 'slide', 134, 81) ;
                $title = $item->aname;
            }
            else {
                $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile('nopicture.jpg', 'display',  565, 343);
                $anh_small = \App\Classes\Utils\FileUtils::resizeResultPathFile('nopicture.jpg', 'display',  134, 81);
                $title = $item->aname;
            }
            $arPic[] = $anh_small;
           @endphp 
          <div class="box item">
            <a href="{{ route('vpublic.core.pcbloglist.detail',[$item->ccode,$item->code,$item->article_id]) }}">
              <div class="carousel-caption">{{ $item->aname }}</div>
              <img class="img-responsive" src="{{ $anh }}" alt="{{ $alt }}" title="{{ $title }}"/>
              <div class="overlay"></div>
              <div class="overlay-info">
                <div class="cat">
                  <p class="cat-data"><span class="ion-model-s"></span>{{ $item->cname }}</p>
                </div>
                <div class="info">
                  <p><span class="ion-android-data"></span>{{ date('M d, Y',strtotime($item->created_at)) }} <span class="ion-chatbubbles"></span>{{ $item->view }}</p>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
      @if (!empty($arPic))
      <div class="row">
        <div id="sync2" class="owl-carousel">
          @foreach ($arPic as $img)
            <div class="item">
              <img class=" img-responsive" src="{{ $img }}"/>
            </div>
          @endforeach
        </div>
      </div>
      @endif
    </div>
    @if (!empty($objItemsLeft{0}))
    <div class="col-sm-6 col-md-6 col-lg-8 hidden-sm hidden-xs">
      <div class="row">
        <div class="col-lg-6 hidden-md">
          <a href="{{ route('vpublic.core.pcbloglist.detail',[$objItemsLeft{0}->ccode,$objItemsLeft{0}->code,$objItemsLeft{0}->article_id]) }}">
          <div class="box">
            <div class=" carousel-caption">{{ $objItemsLeft{0}->aname }}</div>
            <img class="match-height" src="/storage/app/media/files/slide/{{ $objItemsLeft{0}->picture }}" style="width:236px; height:434px" alt="{{ $alt }}" />
            <div class="overlay"></div>
            <div class="overlay-info">
              <div class="cat">
                <p class="cat-data"><span class="ion-model-s"></span>{{ $objItemsLeft{0}->cname }}</p>
              </div>
              <div class="info">
                <p><span class="ion-android-data"></span>{{ date('M d, Y',strtotime($objItemsLeft{0}->created_at)) }} <span class="ion-chatbubbles"></span>{{ $item->view }}</p>
              </div>
            </div>
          </div>
        </a> </div>
        <div class="col-md-16 col-lg-10">
          <div class="row">
            @foreach ($objItemsLeft as $key=>$left)
              @if ($key>0)
                <div class="col-sm-16 right-img-top "> 
                <a href="{{ route('vpublic.core.pcbloglist.detail',[$left->ccode,$left->code,$left->article_id]) }}">
                  <div class="box">
                    @php
                      $alt = str_limit($left->aname,50);
                    @endphp
                    <div class="carousel-caption">{{ $left->aname }}</div>
                    <img class="img-responsive" src="/storage/app/media/files/slide/{{ $left->picture }}" style="width:347px; height:232px" alt="{{ $alt }}" />
                    <div class="overlay"></div>
                    <div class="overlay-info">
                      <div class="cat">
                        <p class="cat-data"><span class="ion-model-s"></span>{{ $left->cname }}</p>
                      </div>
                      <div class="info">
                        <p><span class="ion-android-data"></span>{{ date('M d, Y',strtotime($left->created_at)) }}<span class="ion-chatbubbles"></span>{{ $item->view }}</p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              @endif
            @endforeach
            
          </div>
        </div>
      </div>
    </div>
    {{-- expr --}}
    @endif
  </div>
</div>
<!-- banner outer end --> 