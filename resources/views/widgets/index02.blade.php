@if(isset($objCatLeft))
<div class="col-xs-16 col-sm-8  wow fadeInLeft animated science" data-wow-delay="0.5s" data-wow-offset="130">
  <div class="main-title-outer pull-left">
    <div class="main-title">{{ $objCatLeft->cname }}</div>
  </div>
  @if (!empty($objItemsLeft{0}))
  <div class="row">
    @php
      $item = $objItemsLeft{0};
       $hinhanh = $item->picture;
       $alt = str_limit($item->aname,50);
       $path = storage_path('app/media/files/article/'.$item->picture );
       if( !empty( $item->picture ) && (file_exists( $path )) ) {
          $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile($hinhanh, 'article', 375, 142) ;
          $title = $item->aname;
      }
      else {
          $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile('nopicture.jpg', 'display',  375, 142);
          $title = $item->aname;
      }
      $stars = $item->star_num;
      $dem=0;
     @endphp 
    <div class="topic col-sm-16"> <a href="{{ route('vpublic.core.pcbloglist.detail',[$item->ccode,$item->code,$item->article_id]) }}"  title="{{ $title }}"><img class=" img-thumbnail" src="{{ $anh }}" alt="{{ $alt }}" title="{{ $title }}" />
      <h3> {{ str_limit($item->aname,70) }}</h3>
      <div class="text-danger sub-info-bordered ">
        <div class="time"><span class="ion-android-data icon"></span>{{ date('M d, Y',strtotime($item->created_at)) }}</div>
        <div class="comments"><span class="ion-chatbubbles icon"></span>{{ $item->view }}</div>
        <div class="stars">
          @for ($i = 1; $i <= floor($stars) ; $i++)
            @php
              $dem++;
            @endphp
            <span class="ion-ios7-star"></span>
          @endfor
          @if ($i < $stars +1)
            @php
              $dem++;
            @endphp
            <span class="ion-ios7-star-half"></span>
          @endif
          @while ($dem!=5)
            <span class="ion-ios7-star-outline"></span>
            @php
              $dem++;
            @endphp
          @endwhile
        </div> 
      </div>
    </a>
    <p style="min-height: 60px;">{{ str_limit($item->preview_text,160) }}</p>
  </div>
  <div class="col-sm-16">
    <ul class="list-unstyled  top-bordered ex-top-padding">
      @foreach ($objItemsLeft as $key=>$item)
       @if ($key>0)
       @php
         $hinhanh = $item->picture;
         $alt = str_limit($item->aname,50);
         $path = storage_path('app/media/files/article/'.$item->picture );
         if( !empty( $item->picture ) && (file_exists( $path )) ) {
            $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile($hinhanh, 'article', 54, 54) ;
            $title = $item->aname;
        }
        else {
            $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile('nopicture.jpg', 'display',  54, 54);
            $title = $item->aname;
        }
        $stars = $item->star_num;
        $dem=0;
       @endphp 
      <li> <a href="{{ route('vpublic.core.pcbloglist.detail',[$item->ccode,$item->code,$item->article_id]) }}"  title="{{ $title }}">
        <div class="row">
          <div class="col-lg-3 col-md-4 hidden-sm  "><img src="{{ $anh }}" alt="{{ $alt }}" title="{{ $title }}" class="img-thumbnail pull-left"> </div>
          <div class="col-lg-13 col-md-12">
            <h4>{{ str_limit($item->aname,35) }}</h4>
            <div class="text-danger sub-info">
              <div class="time"><span class="ion-android-data icon"></span>{{ date('M d, Y',strtotime($item->created_at)) }}</div>
              <div class="comments"><span class="ion-chatbubbles icon"></span>{{ $item->view }}</div>
              <div class="stars">
              @for ($i = 1; $i <= floor($stars) ; $i++)
                @php
                  $dem++;
                @endphp
                <span class="ion-ios7-star"></span>
              @endfor
              @if ($i < $stars +1)
                @php
                  $dem++;
                @endphp
                <span class="ion-ios7-star-half"></span>
              @endif
              @while ($dem!=5)
                <span class="ion-ios7-star-outline"></span>
                @php
                  $dem++;
                @endphp
              @endwhile
            </div>
            </div>
          </div>
        </div>
      </a> </li>
      @endif
      @endforeach
    </ul>
  </div>
</div>
@endif
</div>
@endif
@if(isset($objCatRight))
<div class="col-sm-8 col-xs-16 wow fadeInRight animated" data-wow-delay="0.5s" data-wow-offset="130">
  <div class="main-title-outer pull-left">
    <div class="main-title">{{ $objCatRight->cname }}</div>
  </div>
  @if (!empty($objItemsRight{0}))
  <div class="row left-bordered">
    @php
      $item = $objItemsRight{0};
       $hinhanh = $item->picture;
       $alt = str_limit($item->aname,50);
       $path = storage_path('app/media/files/article/'.$item->picture );
       if( !empty( $item->picture ) && (file_exists( $path )) ) {
          $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile($hinhanh, 'article', 375, 142) ;
          $title = $item->aname;
      }
      else {
          $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile('nopicture.jpg', 'display',  375, 142);
          $title = $item->aname;
      }
      $stars = $item->star_num;
      $dem=0;
     @endphp 
    <div class="topic col-sm-16"> <a href="{{ route('vpublic.core.pcbloglist.detail',[$item->ccode,$item->code,$item->article_id]) }}"  title="{{ $title }}"><img class=" img-thumbnail" src="{{ $anh }}" alt="{{ $alt }}" title="{{ $title }}" />
      <h3> {{ str_limit($item->aname,70) }}</h3>
      <div class="text-danger sub-info-bordered">
        <div class="time"><span class="ion-android-data icon"></span>{{ date('M d, Y',strtotime($item->created_at)) }}</div>
        <div class="comments"><span class="ion-chatbubbles icon"></span>{{ $item->view }}</div>
        <div class="stars">
          @for ($i = 1; $i <= floor($stars) ; $i++)
            @php
              $dem++;
            @endphp
            <span class="ion-ios7-star"></span>
          @endfor
          @if ($i < $stars +1)
            @php
              $dem++;
            @endphp
            <span class="ion-ios7-star-half"></span>
          @endif
          @while ($dem!=5)
            <span class="ion-ios7-star-outline"></span>
            @php
              $dem++;
            @endphp
          @endwhile
        </div>
      </div>
    </a>
    <p style="min-height: 60px;">{{ str_limit($item->preview_text,160) }}</p>
  </div>
  <div class="col-sm-16">
    <ul class="list-unstyled top-bordered ex-top-padding">
       @foreach ($objItemsRight as $key=>$item)
       @if ($key>0)
       @php
         $hinhanh = $item->picture;
         $alt = str_limit($item->aname,50);
         $path = storage_path('app/media/files/article/'.$item->picture );
         if( !empty( $item->picture ) && (file_exists( $path )) ) {
            $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile($hinhanh, 'article', 54, 54) ;
            $title = $item->aname;
        }
        else {
            $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile('nopicture.jpg', 'display',  54, 54);
            $title = $item->aname;
        }
        $stars = $item->star_num;
        $dem=0;
       @endphp 
      <li> <a href="{{ route('vpublic.core.pcbloglist.detail',[$item->ccode,$item->code,$item->article_id]) }}"  title="{{ $title }}">
        <div class="row">
          <div class="col-lg-3 col-md-4 hidden-sm  "><img src="{{ $anh }}" alt="{{ $alt }}" title="{{ $title }}" class="img-thumbnail pull-left"> </div>
          <div class="col-lg-13 col-md-12">
            <h4>{{ str_limit($item->aname,35) }}</h4>
            <div class="text-danger sub-info">
              <div class="time"><span class="ion-android-data icon"></span>{{ date('M d, Y',strtotime($item->created_at)) }}</div>
              <div class="comments"><span class="ion-chatbubbles icon"></span>{{ $item->view }}</div>
              <div class="stars">
                @for ($i = 1; $i <= floor($stars) ; $i++)
                  @php
                    $dem++;
                  @endphp
                  <span class="ion-ios7-star"></span>
                @endfor
                @if ($i < $stars +1)
                  @php
                    $dem++;
                  @endphp
                  <span class="ion-ios7-star-half"></span>
                @endif
                @while ($dem!=5)
                  <span class="ion-ios7-star-outline"></span>
                  @php
                    $dem++;
                  @endphp
                @endwhile
              </div>
            </div>
          </div>
        </div>
      </a> </li>
      @endif
      @endforeach
    </ul>
  </div>
</div>
  @endif
</div>
@endif