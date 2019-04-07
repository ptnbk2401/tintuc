@extends('templates.core.master')
@section('css')
<link type="text/css" rel="stylesheet" href="/templates/core/js/rateit/scripts/rateit.css">
<style>
  #detailtext img {
    width: 80% !important;
    
  }
  #detailtext {
    text-align: center !important;
  }
  #detailtext p {
    text-align: justify !important;
  }
  div.bigstars div.rateit-range
  {
      background: url(/templates/core/js/rateit/scripts/star-white32.png);
      height: 32px;
  }
   
  div.bigstars div.rateit-hover
  {
      background: url(/templates/core/js/rateit/scripts/star-gold32.png);
  }
   
  div.bigstars div.rateit-selected
  {
      background: url(/templates/core/js/rateit/scripts/star-red32.png);
  }
   
  div.bigstars div.rateit-reset
  {
      background: url(/templates/core/js/rateit/scripts/star-black32.png);
      width: 32px;
      height: 32px;
  }
   
  div.bigstars div.rateit-reset:hover
  {
      background: url(/templates/core/js/rateit/scripts/star-white32.png);
  }

</style>
@stop

@section('main')
<div class="row"> 
    <!-- post details start -->
    @php
        $FileUtils = new App\Classes\Utils\FileUtils();
        Carbon\Carbon::setLocale('en');
        $now = Carbon\Carbon::now();
        $hinhanh = $objItem->picture;
        $aname = $objItem->aname ;
        $preview_text = $objItem->preview_text ;
        // $path = storage_path('app/media/files/article/'.$hinhanh );
        // if( file_exists( $path ) && !empty($hinhanh) ) {
        //     $anh = $FileUtils->resizeResultPathFile($hinhanh, 'article', 771, 467) ;
        //     $title = "Ảnh sản phẩm";
        // }
        // else {
        //     $anh = $FileUtils->resizeResultPathFile('nopicture.jpg', 'display', 771, 467);
        //     $title = "Không có hình ảnh";
        // }
        $dt = Carbon\Carbon::createFromTimeString($objItem->created_at);
        $stars = $objItem->star_num;
        $dem=0;
    @endphp
    <div class="col-sm-16">
      <div class="row">
        <div class="sec-topic col-sm-16  wow fadeInDown animated " data-wow-delay="0.5s">
          <div class="row">
            <div class="col-sm-16 sec-info">
              <h1 style="color: black">{{ $aname }}</h1>
              <div class="text-danger sub-info-bordered">
                <div class="author"><span class="ion-person icon"></span>By: {{ ucwords($objItem->username) }}</div>
                @if ( $now->diffInHours($dt) <= 23 ) 
                <div class="time"><span class="ion-android-data icon"></span>{{ $dt->diffForHumans($now) }}</div>
                @else 
                <div class="time"><span class="ion-android-data icon"></span>{{ date('M d, Y',strtotime($dt)) }}</div>
                @endif
                <div class="comments"><span class="ion-chatbubbles icon"></span>{{ coutCmtPost($objItem->article_id) }}</div>
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
             {{-- <div class="col-sm-16" style="margin-bottom: 20px"><img alt="{{ $title }}" title="{{ $title }}" src="{{ $anh }}"  class="img-thumbnail"></div> --}}
            <div class="col-sm-16" id="detailtext" style="text-align: justify; ">{!! $objItem->detail_text !!}</div>
            <div class="col-sm-16">
              @if (!empty($linknguon))
              @php
                $linknguon   = $objItem->linknguon;
                $tmp = explode('/', $linknguon);
                $website = $tmp[2];
                $nguon= $website;
              @endphp
              <div class="pull-right"><strong style="color: black">Nguồn: {{ $nguon }}</strong> </div>
              {{-- expr --}}
              @endif
              @php
                if( !empty($objStar = getStar($objItem->article_id)) ){
                  $countStar = $objStar->count;
                  $avgStar = round($objStar->avg) ;
                } else {
                  $countStar = 10;
                  $avgStar = 4;
                }
              @endphp

            </div>
            <hr>
            <div class="col-sm-16">
              <hr>
              @if (!empty($objItem->has_video))
              <h2>Video: </h2>
              <div class="text-center">
                <iframe width="600" height="300" src="https://www.youtube.com/embed/{{ $objItem->ID_video }}" frameborder="1" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
              </div>
              @endif
            </div>
            <hr>
        </div>
    </div>
</div>
<div class="col-sm-16 author-box">
  <hr>
  <div class="row">
    <div class=" col-xs-4 col-sm-2"><img class="img-thumbnail" src="/storage/app/media/files/users/{{ $objItem->avatar }}" width="128" height="128" alt=""/></div>
    <div class="col-xs-12 col-sm-14">
      <h4><a href="javascript:void(0)">{{ ucwords( $objItem->username) }}</a></h4>
      <p>Sometimes I want to shout to the whole world how lucky I am to have you as my friend but sometimes I want to hush, afraid that somebody might take you away from me.</p>
  </div>
</div>
</div>
@if (!empty($objItem->tags))
<div class="col-sm-16 related">
  <div class="main-title-outer pull-left">
    <div class="main-title">Tags</div>
  </div>
  <div class="row">
    @php
      $arTags = explode(',', $objItem->tags);
    @endphp
    @foreach ($arTags as $tag)
      <a href="">
        <span class="label label-default" title="{{ $tag }}" style="margin-left: 10px;">{{ $tag }}</span>
      </a>
    @endforeach
  </div>
</div>
@endif
<div class="clearfix"></div>
<hr>
<div class="col-sm-16 related">
  <div class="main-title-outer pull-left">
    <div class="main-title">How useful was this post</div>
  </div>
  <div class="row">
    <div class="text-center"><p>Click on a star to rate it: </p>
      <select name="rateit" id="backing3c" onchange="rateit(this.value)" >
        @for ($i = 1; $i <= 5 ; $i++)
          <option value="{{ $i }}" {{ $i == $avgStar ? 'selected' : '' }}></option>
          @endfor
      </select>
      <div class="rateit  bigstars" data-rateit-starwidth="32" data-rateit-starheight="32"  data-rateit-backingfld="#backing3c" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"> </div>
      <p>Average rating {{ $avgStar }}/5. Vote count: {{ 10 + $countStar }}</p>
    </div>
    
  </div>
</div>
<div class="clearfix"></div>
<hr>
<div class="col-sm-16 related">
  <div class="main-title-outer pull-left">
    <div class="main-title">RELATED TOPICS</div>
  </div>
  <div class="row">
    @foreach ($objItemLQ as $item)
      @php
        $hinhanh = $item->picture;
        $aname = $item->aname ;
        $path = storage_path('app/media/files/article/'.$hinhanh );
        if( file_exists( $path ) && !empty($hinhanh) ) {
            $anh = $FileUtils->resizeResultPathFile($hinhanh, 'article', 227, 100) ;
            $title = $aname;
        }
        else {
            $anh = $FileUtils->resizeResultPathFile('nopicture.jpg', 'display', 227, 100);
            $title = $aname;
        }
        $stars = $item->star_num;
        $dem=0;
        $dt = Carbon\Carbon::createFromTimeString($item->created_at);
      @endphp
       <div class="item topic col-sm-5 col-xs-16"> <a href="{{ route('vpublic.core.pcbloglist.detail',[$item->ccode,$item->code,$item->article_id]) }}" title="{{ $item->aname }}" >
          <img width="274" height="121" alt="{{ $item->aname }}" title="{{ $item->aname }}" src="{{ $anh }}" class="img-thumbnail">
          <h3>{{ $aname }}</h3>
          <div class="text-danger sub-info-bordered remove-borders">
            @if ( $now->diffInHours($dt) <= 23 ) 
            <div class="time"><span class="ion-android-data icon"></span>{{ $dt->diffForHumans($now) }}</div>
            @else 
                <div class="time"><span class="ion-android-data icon"></span>{{ date('M d, Y',strtotime($dt)) }}</div>
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
          </a>
        </div>
    @endforeach
   
  </div>
</div>
<div class="clearfix"></div>
<div class="col-sm-16 comments-area">
  <div class="main-title-outer pull-left">
    <div class="main-title" id="comments">comments</div>
</div>
<div class="opinion ">
  @if (!count($objItemsCmtCha))
      <small>No comments yet</small>
  @endif
  @foreach ($objItemsCmtCha as $cmt)
    @php
        $objItemsCmtSub = getCmtSub($cmt->article_id,$cmt->fcomment_id);
    @endphp
    <div class="media">
      <a href="#" class="pull-left"> 
        @php
          if(empty($cmt->avatar)) {
              $avatar = "https://www.gravatar.com/avatar/".md5( strtolower( trim( "$cmt->email") ) );
          } else {
              $avatar = '/storage/app/media/files/users/'.$cmt->avatar;
          }
        @endphp
        <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width:20px;height:20px;" src="{{ $avatar }}">
      </a>
      <div class="media-body">
          <div>
            <h4 class="media-heading" id="fullname{{$cmt->fcomment_id}}">{{ ucwords( $cmt->fullname) }}</h4>
            <div class="time text-danger">
              @php
                  $dt = Carbon\Carbon::createFromTimeString($cmt ->created_at);
                  if ( $now->diffInHours($dt) <= 23 ){
                      $date = $dt->diffForHumans($now) ;
                  }
                  else{
                      $date = date('H:i d/m/Y',strtotime($dt)) ;
                  } 
              @endphp
              <span class="ion-android-data icon"></span>{{ $date }}
            </div>
          </div><p  id="content{{ $cmt->fcomment_id }}">{!! $cmt->content !!}</p>
        <div class="col-sm-16">
          <a style="margin-left: 20px" data-toggle="collapse" href="#XemReply{{ $cmt->fcomment_id }}" aria-expanded="false" aria-controls="XemReply{{ $cmt->fcomment_id }}"><span class="ion-chatbubbles icon "></span>{{ count($objItemsCmtSub) }} </a> <a href="javascript:void(0)" style="margin-left: 15px" onclick="replyCmt({{ $cmt->fcomment_id }})"> <span class="reply pull-right ion-ios7-compose"></span></a>
        </div>
        <div class="collapse in" id="XemReply{{ $cmt->fcomment_id }}"><hr>
          @foreach ($objItemsCmtSub as $subcmt)
          <div class="media nested-rep pull-left col-sm-16 " style="margin-top: 1px"> 
              @php
              if(empty($subcmt->avatar)) {
                  $avatar = "https://www.gravatar.com/avatar/".md5( strtolower( trim( "$subcmt->email") ) );
              } else {
                  $avatar = '/storage/app/media/files/users/'.$subcmt->avatar;
              }
              @endphp
              <a href="javascript:void(0)" class="pull-left">
              <img alt="64x64" class="media-object" style="width: 20px; height: 20px;" src="{{ $avatar }}"> 
              </a>
              <div class="media-body ">
                  <div>
                      <h4 class="media-heading">{{ ucwords( $subcmt->fullname) }}</h4>
                      <div class="time text-danger">
                       @php
                          $dt = Carbon\Carbon::createFromTimeString($subcmt ->created_at);
                          if ( $now->diffInHours($dt) <= 23 ){
                              $date = $dt->diffForHumans($now) ;
                          }
                          else{
                              $date = date('M d, Y',strtotime($dt)) ;
                          } 
                      @endphp
                      <span class="ion-android-data icon"></span>{{ $date }}
                      </div>
                  </div>
                  <p>{!! $subcmt ->content !!}</p>
                  <div class="col-sm-16"><a href="javascript:void(0)" style="margin-left: 15px" onclick="replyCmt({{ $cmt->fcomment_id }})"> <span class="reply pull-right ion-ios7-compose"></span></a></div>
              </div>
          </div>
           @endforeach
      </div>
      </div>
    </div>  
  @endforeach
</div>
</div>
<div class="clearfix"></div>

<div class="col-sm-16">
  <div class="main-title-outer pull-left">
    <div class="main-title">LEAVE A COMMENT</div>
</div>
<div class="col-xs-16 wow zoomIn animated">
    <form action="{{ route('vpublic.core.pcbloglist.comment',[$objItem->article_id]) }}" method="post" name="" class="comment-form">

       {{ csrf_field() }}
        @php
            if($errors->any()) {
                $autofocus = 'autofocus';
            } else {
                $autofocus = '';
            }
        @endphp
        
        <div class="row">
          @if (!empty(old('parent_id')))
            <div class="form-group col-sm-16" style="" id="hiddenID">
              @php
                $objItemCmt = getCmt(old('parent_id'));
              @endphp
              <label class="traloibluan">Reply: <span id="namereply" style="color: #F60814">{{ ucwords($objItemCmt->fullname) }}</span> <small id="contentreply" style="color: #3796C7">{{ $objItemCmt->content }}</small></label>
              <input type="hidden" name="parent_id" id="inputParent_id" class="form-control" value="{{ old('parent_id',0) }}">
            </div>
          @else
            <div class="form-group col-sm-16" style="display: none;" id="hiddenID">
              <label class="traloibluan">Reply: <span id="namereply" style="color: #F60814"></span> <small id="contentreply" style="color: #3796C7"></small></label>
              <input type="hidden" name="parent_id" id="inputParent_id" class="form-control" value="{{ old('parent_id',0) }}">
            </div>
          @endif
          <div class="form-group col-sm-16">
              <textarea placeholder="Content" class="form-control" id="forContent" rows="4" name="content" id="content" required style="border: 1px solid #0121c1; color: #025cb3;" >{{ old('content') }}</textarea>
          </div>
        </div>
    <div class="form-group">
    @if(\Auth::check())
        @php
            $user= \Auth::user();
            $fullname = $user->first_name.' '.$user->last_name;
            $email = $user->email;
        @endphp
        <div class="row" style="display: none;">
          <div class="form-group col-sm-8 name-field">
            <input type="text"   name="fullname" value="{{ $fullname }}" {{ $autofocus }} placeholder="Nhập vào họ tên" class="form-control">
        </div>
        <div class="form-group col-sm-8 email-field" style="display: none;">
            <input type="email"  name="email" value="{{ $email }}" placeholder="Nhập vào email" class="form-control" >
        </div>
      </div>
      <button class="btn btn-danger " type="submit" >Comment</button>
    @else
      <a class="open-popup-link btn btn-danger " {{-- href="#login_comment" --}} data-effect="mfp-zoom-in" onclick="binhluan(this)">Comment</a>
    @endif
    </div>
</form>
</div>
</div>
</div>
</div>
<!-- post details end --> 
</div>
<div id="login_comment" class="white-popup mfp-with-anim mfp-hide" style="width: 600px; max-width: 600px;">
  <form action="{{ route('vpublic.core.pcbloglist.comment',[$objItem->article_id]) }}" method="post" name="" class="comment-form">
    {{ csrf_field() }}
    <h4>LEAVE A COMMENT</h4>
    <hr>
    <div class="col-sm-9">
        <h5>Your Information</h5>
        <div class="form-group">
          <input type="text" required name="fullname" id="forFullname" class="form-control" placeholder="Fullname" tabindex="3" value="{{ old('fullname') }}" {{ $autofocus }}>
        </div>
        <div class="form-group">
          <input type="email" required id="forEmail" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control" >
        </div>
        <div class="form-group">
          <input type="text" required id="forNumber" name="numberphone" value="{{ old('numberphone') }}" placeholder="Phone number" class="form-control" >
        </div>
        <textarea class="form-control" id="forContentNone" rows="4" name="content" id="content" style="border: 1px solid #0121c1; color: #025cb3; display: none;"   >{{ old('content') }}</textarea>
        <input type="hidden" name="parent_id" id="inputParent_id1" class="form-control" value="{{ old('parent_id',0) }}">
        <div class="form-group">
          <input type="submit" value="Comment" class="btn btn-danger btn-block btn-lg" tabindex="7">
        </div>
    </div>
    </form>
    <div class="col-sm-6 col-sm-offset-1 text-center">
        <h5>Or Login</h5>
        <a class="btn btn-danger btn-block btn-sm open-popup-link" tabindex="7" href="#log-in" data-effect="mfp-zoom-in">Login</a>
        
        <a href="{{ route('auth.auth.redirect','facebook') }}" class="btn btn-block btn-sm btn-social btn-facebook">
          <span class="fa fa-facebook"></span>
          Sign in with Facebook
        </a>
        <a href="{{ route('auth.auth.redirect','facebook') }}" class="btn btn-block btn-sm btn-social btn-google">
          <span class="fa fa-google"></span>
          Sign in with Google
        </a>
        <a class="btn btn-block btn-sm btn-social btn-twitter">
          <span class="fa fa-twitter"></span>
          Sign in with Twitter
        </a>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-16">
        {{-- <input type="submit" value="Bình luận" class="btn btn-danger btn-block btn-lg" tabindex="7"> --}}
      </div>
    </div>
  
</div>
@if ($errors->any() || Session::has('msg') || Session::has('msg-er') )
<div id="alertMSG"  class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog modal-sm" role="document" style="width: 500px;">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Alert <img src="/templates/core/images/ajax-loader.gif" width="20px" alt=""></h4>
      </div>
      <div class="modal-body">
        @if ($errors->any())
        <h5>Enter the Content<span class="required">*</span></h5>
        <div style=" text-align: left; padding-left: 20px">
          <ul class="list-group">
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div>
        @endif
        @if (session('msg'))
            <h4 style="color: green">{{ session('msg') }}</h4>
        @endif
        @if (session('msg-er'))
            <h4  style="color: red">{{ session('msg-er') }}</h4>
        @endif
      </div>
      <div class="modal-footer">
        <a class="btn btn-info" data-dismiss="modal" onclick="scrollWin()">OK</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endif
@stop
@section('js')
<script src="/templates/core/js/rateit/scripts/jquery.rateit.js"></script>

    <script>
        $('#alertMSG').modal({ 
            backdrop: 'static', 
            show: true, 
            keyboard: false 
        }) 
        function replyCmt(idCmt) {
            var fullname = $('#fullname'+idCmt).text();
            var content = $('#content'+idCmt).text();
            $('#hiddenID').show();
            $('#namereply').text(fullname);
            $('#contentreply').text(content);
            $('#inputParent_id').val(idCmt);
            $('#inputParent_id1').val(idCmt);
            $('textarea[name=content]').focus();
        }
        function scrollWin() {
          $('html, body').animate({
              scrollTop: $("#comments").offset().top
          }, 1000);
        }
        function binhluan(elem){
           var content = $('textarea[name=content]').val();
           content = content.trim();
           if(content == '') {
              alert('Enter the Content');
              $('textarea[name=content]').focus();
              return false;
           } else {
              $('#forContentNone').val(content);
              $(elem).attr("href","#login_comment").magnificPopup('open');
           }
        }
        function rateit(star){
            var article_id = {{ $objItem->article_id }};
            $.ajax({
              url: "{{ route('vpublic.core.pcsingle.star') }}",
              type: 'GET',
              cache: false,
              data: { star:star, article_id:article_id },
              success: function(data){
                if(data != 0) {
                  alert('Thank you for rating')
                } else {
                  alert('You were rate it');

                }
                
              },
              error: function (){
                  console.log('error');
              }
            }).always(function(data){
              
              
          });
          
        }
    </script>

@stop


<?php

    function getCmtSub($article_id,$parent_id) {
        $objmComments = new App\Model\Vadmin\Core\Comment\AccIndex() ;
        $objItemsCmtSub = $objmComments->getItemsByPost($article_id,$parent_id);
        return $objItemsCmtSub;
    } 
    function getCmt($fcomment_id) {
        $objItem = \App\Model\Vadmin\Core\Comment\AccIndex::find($fcomment_id);
        return $objItem;
    }  
    function coutCmtPost($article_id) {
        $objmComments = new App\Model\Vadmin\Core\Comment\AccIndex() ;
        $count = $objmComments->coutItemsByPost($article_id);
        return $count;
    }  
    function getStar($article_id) {
        $objmAcaIndex = new App\Model\Vadmin\Core\Article\AcaIndex() ;
        $ObjStar = $objmAcaIndex->getStar($article_id);
        return $ObjStar;
    }  

?>