  <footer>
    <div class="top-sec">
      <div class="container ">
        <div class="row match-height-container">
          <div class="col-sm-6 subscribe-info wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="40">
            <div class="row">
              <div class="col-sm-16">
                <div class="f-title" style="color: #FFFFFF">CoffeeStar</div>
                @if (!empty($Item))
                	{!! $Item->content !!}
                @endif
              </div>
            </div>
          </div>
          <div class="col-sm-5 popular-tags  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="40">
            <div class="f-title">popular tags</div>
            <ul class="tags list-unstyled pull-left">
{{--               @php
                $arTags = ['Kinh Tế','Xã Hội','Bóng đá Việt Nam','Hài Hước','Hình Ảnh','Giáo dục','Tin Công Nghệ','Sao Hàn Quốc','BTS','Black Pink','Running man','Mỹ Tâm']
              @endphp --}}
              @foreach ($Tags as $tag)
                <li><a href="{{ route('vpublic.core.pcblog.tag') }}?c={{ str_replace(' ','+',$tag->tag) }}">{{ $tag->tag }}</a></li>
              @endforeach
            </ul>
          </div>
          <div class="col-sm-5 recent-posts  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="40">
            <div class="col-sm-16">
              <div class="f-title">subscribe to news letter</div>
              <form class="form-inline">
                <input type="email" class="form-control" id="input-email" placeholder="Type your e-mail adress">
                <button type="submit" class="btn"> <span class="ion-paper-airplane text-danger"></span> </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="btm-sec">
      <div class="container">
        <div class="row">
          <div class="col-sm-16">
            <div class="row">
              <div class="col-sm-10 col-xs-16 f-nav wow fadeInDown animated" data-wow-delay="0.5s" data-wow-offset="10">
                <ul class="list-inline ">
                  <li> <a href="{{ route('vpublic.core.pcindex.index') }}"> Home </a> </li>
                  @php
                    $arTags = ['Business','Science','Lifestyle','Politics','Sport','short codes']
                  @endphp
                  @foreach ($arTags as $tag)
                    <li><a href="{{ route('vpublic.core.pcblog.tag') }}?c={{ str_replace(' ','+',$tag) }}">{{ $tag }}</a></li>
                  @endforeach
                  <li> <a href="{{ route('vpublic.core.pccontact.index') }}"> Contact </a> </li>
                </ul>
              </div>
              <div class="col-sm-6 col-xs-16 copyrights text-right wow fadeInDown animated" data-wow-delay="0.5s" data-wow-offset="10">© 2018 CoffeeStar - Giải trí Sao tổng hợp</div>
            </div>
          </div>
          <div class="col-sm-16 f-social  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="10">
            <ul class="list-inline">
              <li> <a href="#"><span class="ion-social-twitter"></span></a> </li>
              <li> <a href="#"><span class="ion-social-facebook"></span></a> </li>
              <li> <a href="#"><span class="ion-social-instagram"></span></a> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>