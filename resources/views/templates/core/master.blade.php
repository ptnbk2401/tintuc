
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from webyzona.com//templates/themeforest/globalnews/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Jan 2019 08:01:29 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
{!! SEO::generate() !!}
{{-- @hasSection('title')
<title>@yield('title') - CoffeeStar</title>
<meta itemprop="name" content="@yield('title') - CoffeeStar">
<meta property="og:title" content="@yield('title') - CoffeeStar"/>
@else
<title>CoffeeStar - Entertainment news In the World</title>
<meta property="og:title" content="CoffeeStar - Entertainment news In the World"/>
<meta itemprop="name" content="CoffeeStar - Entertainment news In the World">
@endif
@hasSection('description')
<meta itemprop="description" content="@yield('description') - CoffeeStar">
<meta name="description" content="@yield('description') - CoffeeStar" >
<meta property="og:description" content="@yield('description') - CoffeeStar"/>
@else
<meta itemprop="description" content="CoffeeStar - Entertainment news, celebrities, celeb news, and celebrity gossip. Check out the hottest photos, movies, fashion and TV shows In the World">
<meta name="description" content="CoffeeStar - Entertainment news, celebrities, celeb news, and celebrity gossip. Check out the hottest photos, movies, fashion and TV shows In the World" >
<meta property="og:description" content="CoffeeStar - Entertainment news, celebrities, celeb news, and celebrity gossip. Check out the hottest photos, movies, fashion and TV shows In the World"/>
@endif
<!-- Open Graph data -->
@hasSection('image')
<meta property="og:image" content="{{ Request::root() }}@yield('image')" />
<meta itemprop="image" content="{{ Request::root() }}@yield('image')">
@else
<meta itemprop="image" content="{{ Request::root() }}/storage/app/media/files/display/display.png">
<meta property="og:image" content="{{ Request::root() }}/storage/app/media/files/display/display.png" />
@endif
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:site_name" content="CoffeeStar" >
<meta property="fb:admins" content="100007336908490" />
<meta content="entertainment news, celebrity news, pop culture, photos, movies, fashion and TV shows @yield('keywords')" name="keywords"> --}}

<!-- Khai bao trang có nội dung tương tự, tránh việc quét trùng lặp+ -->
<link rel = "canonical" href = "{{ Request::root() }}" />



<link rel="shortcut icon" href="/templates/core/images/general/favicon.png" type="image/x-icon">
<link rel="icon" href="/templates/core/images/general/favicon.png" type="image/x-icon">
<!-- bootstrap styles-->
<link href="/templates/core/css/bootstrap.min.css" rel="stylesheet">
<!-- google font -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
<!-- ionicons font -->
<link href="/templates/core/css/ionicons.min.css" rel="stylesheet">
<link href="/templates/core/css/font-awesome.css" rel="stylesheet">
<!-- animation styles -->
<link rel="stylesheet" href="/templates/core/css/animate.css" />
<!-- custom styles -->
<link href="/templates/core/css/custom-red.css" rel="stylesheet" id="style">
<!-- owl carousel styles-->
<link rel="stylesheet" href="/templates/core/css/owl.carousel.css">
<link rel="stylesheet" href="/templates/core/css/owl.transitions.css">
<!-- magnific popup styles -->
<link rel="stylesheet" href="/templates/core/css/magnific-popup.css">
<link rel="stylesheet" href="/templates/core/css/bootstrap-social.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      .carousel-caption {
        text-shadow: #26D 0.2em 0.2em 0.1em !important;
      }
      p {
        color: #000;
      }
      .quangcao:hover img {
        border: 0;
      }
      .header {
        padding-top: 5px;
        padding-bottom: 5px;
      }
      .navbar-brand {
        margin-top: 25px;
      }
      .media {
        padding: 1px 5px;
        font-size: 12px;
      }
    </style>
    @yield('css')
</head>
<body> 
<!-- preloader start -->
<div id="preloader">
  <div id="status"></div>
</div>
<!-- preloader end --> 
<!-- style switcher start -->
<div class="switcher" style="left:-50px;"> <a id="switch-panel" class="hide-panel"> <i class="ion-gear-a"></i> </a>
  <div id="switcher">
    <ul class="colors-list">
      <li><a href="javascript:void(0)" class="red" id="custom-red"></a></li>
      <li><a href="javascript:void(0)" class="green" id="custom-green"></a></li>
      <li><a href="javascript:void(0)" class="purple" id="custom-purple"></a></li>
      <li><a href="javascript:void(0)" class="blue" id="custom-blue"></a></li>
    </ul>
  </div>
</div>
<!-- style switcher end --> 
<!-- wrapper start -->
<div class="wrapper"> 
  <!-- header toolbar start -->
  <div class="header-toolbar">
    <div class="container">
      <div class="row">
        <div class="col-md-16 text-uppercase">
          <div class="row">
            <div class="col-sm-8 col-xs-16">
              <ul id="inline-popups" class="list-inline">
                @if (Auth::check())
                @php
                  $user = Auth::user();
                  $avatar = $user->avatar;
                   if($avatar != '') {
                      if (file_exists(storage_path("app/media/files/users/{$avatar}"))) {
                          $avatar_url = \App\Classes\Utils\FileUtils::resizeResultPathFile($avatar , 'users', 124, 124);
                      }else {
                          $avatar_url = \App\Classes\Utils\FileUtils::resizeResultPathFile('avatar.png' , 'display', 124, 124);
                      }
                  } else {
                  if (file_exists(storage_path("app/media/files/display/avatar.png")))
                      {
                          $avatar_url = \App\Classes\Utils\FileUtils::resizeResultPathFile('avatar.png' , 'display', 124, 124);
                      }
                  }
                @endphp
                <li>

                  <a href="{{ route('vpublic.profile.index') }}" ><img src="{{ $avatar_url }}" class="img-thumbnail img-responsive "  width="45px" style="padding: 0"> {{ !empty($user->display_name) ? $user->display_name : $user->last_name }}</a>
                </li>
                <li><a href="{{ route('vpublic.pauth.logout') }}" > Logout</a></li>
                @else
                {{-- <li class="hidden-xs"><a href="javascript:void(0)">đăng ký quảng cáo</a></li> --}}
                <li><a id="showlogin" class="open-popup-link" href="#log-in" data-effect="mfp-zoom-in">login</a></li>
                <li><a id="showregister"  class="open-popup-link" href="#create-account" data-effect="mfp-zoom-in">register</a></li>
                {{-- <li><a id="showregister"  class="open-popup-link"  href="#success-lg"  data-effect="mfp-zoom-in">Thông tin</a></li> --}}
                @endif
              </ul>
            </div>
            <div class="col-xs-16 col-sm-8">
              <div class="row">
                <div id="weather" class="col-xs-16 col-sm-8 col-lg-9"></div>
                <div id="time-date" class="col-xs-16 col-sm-8 col-lg-7"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- header toolbar end --> 
  
  <!-- sticky header start -->
  <div class="sticky-header"> 
    <!-- header start -->
    <div class="container header">
      <div class="row">
        <div class="col-sm-5 col-md-5 wow fadeInUpLeft animated"><a class="navbar-brand" href="{{ route('vpublic.core.pcindex.index') }}">CoffeeStar</a></div>
        <div class="col-sm-11 col-md-11 hidden-xs text-right">
          @widget('AdsPublic',['vitri'=>'top'])
        </div>
      </div>
    </div>
    <!-- header end --> 
    <!-- nav and search start -->
    <div class="nav-search-outer"> 
      <!-- nav start -->
      @widget('MenuTop')
      <!--nav end--> 
    </div>
    <!-- nav and search end--> 
  </div>
  <!-- sticky header end --> 
  <!-- top sec start -->


  <div class="container">
    @if ( strpos(Route::currentRouteName(), '.pcindex.index') )
        <div class="row"> 
            @widget('Slider')
        </div>
    @else
        <div class="page-header">
          <h3 class="pagename">@yield('pagename')</h3>
          <ol class="breadcrumb">
            <li><a href="{{ route('vpublic.core.pcindex.index') }}">Home</a></li>
            <li class="active">@yield('pagename')</li>
          </ol>
        </div>  
    @endif  
  </div>

  <!-- top sec end --> 
  
  <!-- data start -->
@if ( !strpos(Route::currentRouteName(), '.pcindex.index') )
  <section>
@endif
  <div class="container ">
    <div class="row "> 
      <!-- left sec start -->
      @if ( !strpos(Route::currentRouteName(), '.pccontact.index'))
      <div class="col-md-11 col-sm-11">
        @yield('main')
      </div>
      <!-- left sec end --> 
      <!-- right sec start -->
      <div class="col-sm-5 hidden-xs right-sec">
        @widget('RightBar')
      </div>
      <!-- right sec end --> 
      @else
        <div class="col-sm-16">
            @yield('main')
        </div>   
      @endif
    </div>
  </div>
@if ( !strpos(Route::currentRouteName(), '.pcindex.index') )
  </section>
    <!-- data end --> 
@endif
 
  <!-- Footer start -->
  @widget('Footer')
  <!-- Footer end -->

  @include('templates.core.login-register')
</div>
<!-- wrapper end --> 

<!-- jQuery --> 
<script src="/templates/core/js/jquery.min.js"></script> 
<!--jQuery easing--> 
<script src="/templates/core/js/jquery.easing.1.3.js"></script> 
<!-- bootstrab js --> 
<script src="/templates/core/js/bootstrap.js"></script> 
<!--style switcher--> 
<script src="/templates/core/js/style-switcher.js"></script> <!--wow animation--> 
<script src="/templates/core/js/wow.min.js"></script> 
<!-- time and date --> 
<script src="/templates/core/js/moment.min.js"></script> 
<!--news ticker--> 
<script src="/templates/core/js/jquery.ticker.js"></script> 
<!-- owl carousel --> 
<script src="/templates/core/js/owl.carousel.js"></script> 
<!-- magnific popup --> 
<script src="/templates/core/js/jquery.magnific-popup.js"></script> 
<!-- weather --> 
{{-- <script src="/templates/core/js/jquery.simpleWeather.min.js"></script>  --}}
<!-- calendar--> 
<script src="/templates/core/js/jquery.pickmeup.js"></script> 
<!-- go to top --> 
<script src="/templates/core/js/jquery.scrollUp.js"></script> 
<!-- scroll bar --> 
<script src="/templates/core/js/jquery.nicescroll.js"></script> 
<script src="/templates/core/js/jquery.nicescroll.plus.js"></script> 
<!--masonry--> 
<script src="/templates/core/js/masonry.pkgd.js"></script> 
<!--media queries to js--> 
<script src="/templates/core/js/enquire.js"></script> 
<!--custom functions--> 
<script src="/templates/core/js/custom-fun.js"></script>
    @yield('js')
    <script>
      $(document).ready(function() {
          $('#close').click(function() {
              $.magnificPopup.close();
          });
      });
      @if (session('msgErlg'))
      $.magnificPopup.open({
        items: {
            src: '#log-in' 
        },
        type: 'inline'
      });
      @endif
      @if (session('msgErrgSu') || session('msgScAc'))
      $.magnificPopup.open({
        items: {
            src: '#success-lg' 
        },
        type: 'inline'
      });
      @endif
      @if (session('msgErrgc') || $errors->any() || session('msgErrg'))
      $.magnificPopup.open({
        items: {
            src: '#create-account' 
        },
        type: 'inline'
      });
      @endif

    </script>
    <script>
      $('#refresh').click(function(){
        $.ajax({
            type:'GET',
            url:'{{route('vpublic.core.pccindex.refreshCaptcha')}}',
            success:function(data){
                $("#cap").html(data);
            }
        });
      });
    </script>
</body>

<!-- Mirrored from webyzona.com//templates/themeforest/globalnews/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Jan 2019 08:04:11 GMT -->
</html>