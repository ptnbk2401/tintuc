@extends('templates.core.master')
@section('css')
    <style>
        .post-thumb:hover{
          -webkit-filter: none;
        }

    </style>
@stop
@section('main')
  <div class="row">
    @php
        $FileUtils = new App\Classes\Utils\FileUtils();
        Carbon\Carbon::setLocale('en');
        $now = Carbon\Carbon::now();
    @endphp
    @if (!count($objItems))
        <div class="col-sm-16">
          <h3>There are currently no posts in this category</h3>
        </div>
    @endif
    @foreach ($objItems as $key=>$item)
        @php
            $i = ($key+1)%2;
            $hinhanh = $item->picture;
            $aname = $item->aname ;
            $preview_text = $item->preview_text ;
            $path = storage_path('app/media/files/article/'.$hinhanh );
            if( file_exists( $path ) && !empty($hinhanh) ) {
                $anh = $FileUtils->resizeResultPathFile($hinhanh, 'article', 375, 227) ;
                $title = $aname;
                $alt = str_limit($aname,55) ;
            }
            else {
                $anh = $FileUtils->resizeResultPathFile('nopicture.jpg', 'display', 375, 227);
                $title = $aname;
                $alt = str_limit($aname,55) ;
            }
            $stars = $item->star_num;
            $dem=0;
            $dt = Carbon\Carbon::createFromTimeString($item->created_at);
        @endphp
        <div class="sec-topic col-sm-16 col-md-8 wow fadeInDown animated " data-wow-delay="0.5s"> 
            <a href="{{ route('vpublic.core.pcbloglist.detail',[$item->ccode,$item->code,$item->article_id]) }}" title="{{ $item->aname }}">
                <img alt="{{ $alt }}" title="{{ $title }}" src="{{ $anh }}" class="img-thumbnail">
                <div class="sec-info">
                    <h3>{{ $aname }}</h3>
                    <div class="text-danger sub-info-bordered">
                        @if ( $now->diffInHours($dt) <= 23 ) 
                        <div class="time"><span class="ion-android-menu icon"></span>{{ $dt->diffForHumans($now) }}</div>
                        @else 
                            <div class="time"><span class="ion-ios-time-outline icon"></span>{{ date('M d, Y',strtotime($dt)) }}</div>
                        @endif
                      <div class="comments"><span class="ion-chatbubbles icon"></span>{{ coutCmtPost($item->article_id) }}</div>
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
            </a>
            <p>{{ str_limit( $preview_text,160 ) }}</p>
        </div>
        @if ($i == 0)
            <div class="clearfix"></div>
        @endif
    @endforeach
    

    <div class="col-sm-16">
      <hr>
      {{ $objItems->appends(request()->input())->links() }}
    </div>
  </div>
@stop

<?php
    
    function coutCmtPost($article_id) {
        $objmComments = new App\Model\Vadmin\Core\Comment\AccIndex() ;
        $count = $objmComments->coutItemsByPost($article_id);
        return $count;
    }  


?>