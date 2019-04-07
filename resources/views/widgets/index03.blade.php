@if(isset($objCat))
<div class="main-title-outer pull-left">
  <div class="main-title">{{ $objCat->cname }}</div>
</div>
<div class="row">
  <div id="owl-lifestyle" class="owl-carousel owl-theme lifestyle pull-left">
  @foreach ($objItems as $key=>$item)
     @php
       $hinhanh = $item->picture;
       $alt = str_limit($item->aname,50);
       $path = storage_path('app/media/files/article/'.$item->picture );
       if( !empty( $item->picture ) && (file_exists( $path )) ) {
          $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile($hinhanh, 'article', 244, 107) ;
          $title = $item->aname;
      }
      else {
          $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile('nopicture.jpg', 'display',  244, 107);
          $title = $item->aname;
      }
      $stars = $item->star_num;
      $dem=0;
     @endphp 
     <div class="item topic"> <a href="{{ route('vpublic.core.pcbloglist.detail',[$item->ccode,$item->code,$item->article_id]) }}" title="{{ $item->aname }}"> 
      <img class="img-thumbnail"  src="{{ $anh }}" alt="{{ $alt }}" title="{{ $title }}" />
        <h4>{{ str_limit($item->aname,60 ) }}</h4>
        <div class="text-danger sub-info-bordered remove-borders">
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
      </a> </div>
  @endforeach
  </div>
</div>
@endif