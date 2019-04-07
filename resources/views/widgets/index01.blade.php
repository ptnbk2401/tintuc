@if(isset($objCat))
<div class="main-title-outer pull-left">
  <div class="main-title">{{ $objCat->cname }}</div>
</div>
<div class="row">
  <div class="col-md-11 col-sm-16">
    <div class="row">
      @if (!empty($objItems))
        
      <div class="col-md-8 col-sm-9 col-xs-16">
        @php
          $item = $objItems{0};
           $hinhanh = $item->picture;
           $alt = str_limit($item->aname,50);
           $path = storage_path('app/media/files/article/'.$item->picture );
           if( !empty( $item->picture ) && (file_exists( $path )) ) {
              $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile($hinhanh, 'article', 252, 167) ;
              $title = $item->aname;

          }
          else {
              $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile('nopicture.jpg', 'display',  252, 167);
              $title = $item->aname;
          }
          $stars = $item->star_num;
          $dem=0;
         @endphp 
        <div class="topic"> <a href="{{ route('vpublic.core.pcbloglist.detail',[$item->ccode,$item->code,$item->article_id]) }}" title="{{ $title }}" ><img class="img-thumbnail" src="{{ $anh }}" alt="{{ $alt }}" title="{{ $title }}" />
          <h3>{{ $item->aname }}</h3>
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
        <p>{{ str_limit($item->preview_text,100) }}</p>
      </div>
    </div>
    @endif
    <div class="col-md-8 col-sm-7 col-xs-16">
      <ul class="list-unstyled">
        @foreach ($objItems as $key=>$item)
           @if ($key>0)
           @php
             $hinhanh = $item->picture;
             $alt = str_limit($item->aname,50);
             $path = storage_path('app/media/files/article/'.$item->picture );
             if( !empty( $item->picture ) && (file_exists( $path )) ) {
                $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile($hinhanh, 'article', 65, 65) ;
                $title = $item->aname;
            }
            else {
                $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile('nopicture.jpg', 'display',  65, 65);
                $title = $item->aname;
            }
            $stars = $item->star_num;
            $dem = 0;
           @endphp 
             <li> <a href="{{ route('vpublic.core.pcbloglist.detail',[$item->ccode,$item->code,$item->article_id]) }}" title="{{ $item->aname }}">
                <div class="row">
                  <div class="col-sm-5 hidden-sm hidden-md"><img class="img-thumbnail pull-left" src="{{ $anh }}" alt="{{ $alt }}" title="{{ $title }}" /> </div>
                  <div class="col-sm-16 col-md-16 col-lg-11">
                    <h4>{{ str_limit($item->aname,41 ) }}</h4>
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
              </a></li>
           @endif
        @endforeach
        
      </ul>
    </div>
  </div>
</div>
@endif
<div class="col-md-5 col-sm-16 hidden-sm hidden-xs  left-bordered">
  <div id="vid-thumbs" class="owl-carousel">
    @php
        $i = 1 ;
        $n = count($objItemsVideo);
    @endphp
    @if (!empty($n))
    @foreach ($objItemsVideo as $key=>$item)
    @php
        $du = $key%2;
        if($du == 0) {
            $mo = 1;
            $i = 1;
        } else {
            $i++;
            $mo = 0;
        }
        $dong = $i==2 ? 1 : 0;
        if( $key == $n - 1 && $dong != 1 ) {
            $dong = 1;
        }
    @endphp
    @php
       $hinhanh = $item->picture;
       $alt = str_limit($item->aname,50);
       $path = storage_path('app/media/files/article/'.$item->picture );
       if( !empty( $item->picture ) && (file_exists( $path )) ) {
          $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile($hinhanh, 'article', 226, 129) ;
          $title = $item->aname;
      }
      else {
          $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile('nopicture.jpg', 'display', 226, 129);
          $title = $item->aname;
      }
     @endphp 
    @if($mo)
      <div class="item">
        <div class="vid-thumb-outer">
    @endif
          <div class="vid-thumb">
              <a class="popup-youtube" href="https://www.youtube.com/watch?v={{ $item->ID_video }}">
              <div class="vid-box"><span class="ion-ios7-film"></span><img class="img-thumbnail img-responsive" src="{{ $anh }}" alt="{{ $alt }}" title="{{ $title }}" /> </div>
              <h4>{{ str_limit($item->aname,50 ) }}</h4>
            </a>
          </div>
    @if($dong)    
        </div>
      </div>
    @endif       
        
    @endforeach
    @endif
  </div>
</div>
</div>
<hr>