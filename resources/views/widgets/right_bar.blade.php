<div class="bordered top-margin" style="margin-top: 0;">
  <div class="row ">
    <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="50"> 
      @widget('AdsPublic',['vitri'=>'right-bar'])
      <a href="{{ route('vpublic.core.pccontact.index') }}" class="sponsored">Contact advertising</a> 
    </div>
    <div class="col-sm-16 bt-spac wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="150">
      <div class="table-responsive">
        <table class="table table-bordered social">
          <tbody>
            <tr>
              <td><a class="youtube" href="https://www.youtube.com/channel/UCvqQowY9Na_PJyGh3XU2OAg?view_as=subscriber" target="_blank">
                <p> <span class="ion-social-youtube"></span> 650<br>
                subscribers</p>
              </a></td>
              <td><a class="twitter" href="javascript:void(0)" target="_blank">
                <p><span class="ion-social-twitter"></span> 811,6
                followers</p>
              </a></td>
              <td><a class="facebook" href="https://www.facebook.com/Báo-Việt-Nam-Trong-Tôi-485532185309002" target="_blank">
                <p> <span class="ion-social-facebook"></span> 6958,56<br>
                fans</p>
              </a></td>
            </tr>
            <tr>
              <td><a class="googleplus" href="javascript:void(0)" target="_blank">
                <p> <span class="ion-social-googleplus"></span> 9625.56
                followers</p>
              </a></td>
              <td><a class="pinterest" href="javascript:void(0)" target="_blank">
                <p><span class="ion-social-pinterest"></span> 741,9
                followers</p>
              </a></td>
              <td><a class="instagram" href="javascript:void(0)" target="_blank">
                <p> <span class="ion-social-instagram"></span> 3548,7
                followers</p>
              </a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- activities start -->
    <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="130"> 
      <!-- Nav tabs -->
      <ul class="nav nav-tabs nav-justified " role="tablist">
        <li class="active"><a href="#popular" role="tab" data-toggle="tab">Phổ biến</a></li>
        <li><a href="#recent" role="tab" data-toggle="tab">Gần đây</a></li>
        <li><a href="#comments1" role="tab" data-toggle="tab">Comment</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active" id="popular">
          <ul class="list-unstyled">
            @foreach ($objPopular as $item)
            @php
             $hinhanh = $item->picture;
             $path = storage_path('app/media/files/article/'.$item->picture );
             if( !empty( $item->picture ) && (file_exists( $path )) ) {
                $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile($hinhanh, 'article', 67, 54) ;
                $title = $item->aname;
            }
            else {
                $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile('nopicture.jpg', 'display',  67, 54);
                $title = $item->aname;
            }
            $stars = $item->star_num;
            $dem=0;
           @endphp 
            <li> <a href="{{ route('vpublic.core.pcbloglist.detail',[$item->ccode,$item->code,$item->article_id]) }}" title="{{ $item->aname }}">
              <div class="row">
                <div class="col-sm-5 col-md-4"><img class="img-thumbnail pull-left" src="{{ $anh }}" alt="{{ $title }}" title="{{ $title }}"/> </div>
                <div class="col-sm-11 col-md-12">
                  <h4>{{ str_limit($item->aname,32 ) }}</h4>
                  <div class="text-danger sub-info">
                    <div class="time"><span class="ion-android-data icon"></span>{{ date('M d, Y',strtotime($item->created_at)) }}</div>
                    <div class="comments"><i class="icon ion-eye" style="font-size: 16px;   margin-left: 10px;"></i> {{ $item->view }}</div>
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
            @endforeach
          </ul>
        </div>
        <div class="tab-pane" id="recent">
          <ul class="list-unstyled">
            @foreach ($objNewPost as $item)
            @php

             $hinhanh = $item->picture;
             $path = storage_path('app/media/files/article/'.$item->picture );
             if( !empty( $item->picture ) && (file_exists( $path )) ) {
                $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile($hinhanh, 'article', 67, 54) ;
                $title = $item->aname;
            }
            else {
                $anh = \App\Classes\Utils\FileUtils::resizeResultPathFile('nopicture.jpg', 'display',  67, 54);
                $title = $item->aname;
            }
            $stars = $item->star_num;
            $dem=0;
           @endphp 
            <li> <a href="{{ route('vpublic.core.pcbloglist.detail',[$item->ccode,$item->code,$item->article_id]) }}" title="{{ $item->aname }}">
              <div class="row">
                <div class="col-sm-5 col-md-4"><img class="img-thumbnail pull-left" src="{{ $anh }}" alt="{{ $title }}" title="{{ $title }}"/> </div>
                <div class="col-sm-11 col-md-12">
                  <h4>{{ str_limit($item->aname,32 ) }}</h4>
                  <div class="text-danger sub-info">
                    <div class="time"><span class="ion-android-data icon"></span>{{ date('M d, Y',strtotime($item->created_at)) }}</div>
                    <div class="comments"><i class="icon ion-eye" style="font-size: 16px;   margin-left: 10px;"></i> {{ $item->view }}</div>
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
            @endforeach
          </ul>
        </div>
        <div class="tab-pane" id="comments1">
          <ul class="list-unstyled">
            @foreach ($objComment as $comment)
              @php
               $title = $comment->aname;
                if(empty($comment->avatar)) {
                    $avatar = "https://www.gravatar.com/avatar/".md5( strtolower(trim( "$comment->email") ) );
                } else {
                  $path = storage_path('app/media/files/users/'.$comment->avatar );
                  if( !empty( $comment->avatar ) && (file_exists( $path )) ) {
                    $avatar = \App\Classes\Utils\FileUtils::resizeResultPathFile($comment->avatar, 'users', 67, 67) ;
                  } 
                }
              @endphp
              <li> <a href="{{ route('vpublic.core.pcbloglist.detail',[$comment->ccode,$comment->code,$comment->article_id]) }}" title="{{ $comment->aname }}">
              <div class="row">
                <div class="col-sm-5  col-md-4 "><img class="img-thumbnail pull-left" src="{{ $avatar }}" alt="{{ $title }}" title="{{ $title }}"/> </div>
                <div class="col-sm-11  col-md-12 ">
                  <h4>{{ str_limit($comment->aname,32 ) }}</h4>
                  <p>{{ str_limit($comment->content,70) }}</p>
                </div>
              </div>
            </a> </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    <!-- activities end --> 

    <!-- calendar start -->
    <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="50">
      <div class="single pull-left"></div>
    </div>
    <!-- calendar end --> 

  </div>
</div>