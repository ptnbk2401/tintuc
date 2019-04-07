
<div id="create-account" class="white-popup mfp-with-anim mfp-hide">
    <form role="form" action="{{ route('vpublic.pauth.register') }}" method="post">
      {{ csrf_field() }}
      <h3>Create Account</h3>
      @if (session('msgErrgc') || $errors->any() ||  session('msgErrg'))
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Error!</strong> {{ session('msgErrgc') }}  {{  session('msgErrg') }} 
        <ul>
        @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
        @endforeach
        </ul>
      </div>
      {{-- expr --}}
      @endif
      <hr>
      <div class="row">
        <div class="col-sm-8">
          <div class="form-group">
            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" tabindex="1" value="{{ session('objOld')['first_name'] }}">
          </div>
        </div>
        <div class="col-sm-8">
          <div class="form-group">
            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" tabindex="2" value="{{ session('objOld')['last_name'] }}">
          </div>
        </div>
      </div>
      <div class="form-group">
        <input type="text" name="display_name" id="display_name" class="form-control" placeholder="Display Name" tabindex="3" value="{{ session('objOld')['display_name'] }}">
      </div>
      <div class="form-group">
        <input type="email" name="email" id="email" class="form-control " placeholder="Email Address" tabindex="4" value="{{ session('objOld')['email'] }}">
      </div>
      <div class="row">
        <div class="col-sm-8">
          <div class="form-group">
            <input type="password" name="password" class="form-control " placeholder="Password" tabindex="5">
          </div>
        </div>
        <div class="col-sm-8">
          <div class="form-group">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" tabindex="6">
          </div>
        </div>
      </div>
      <div class="row captcha clear_fix u-mb-20x">
          <figure class="clear_fix form-group">
              <span id="cap">{!! captcha_img('flat') !!}</span>
              <button type="button" class="btn btn-success" id="refresh">
                    <img src="/templates/core/images/other_page/icon-reload.png" alt="" width="18" height="18" class="img_reloadCapcha">
              </button>
          </figure>
          <div class="form-group">
              <input id="captcha" value="{{old('captcha')}}"  type="text" class="form-control" placeholder="Captcha" name="captcha">
          </div>
          
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-16">
          <input type="submit" value="Register" class="btn btn-danger btn-block btn-lg" tabindex="7">
        </div>
      </div>
    </form>
  </div>
  <div id="log-in" class="white-popup mfp-with-anim mfp-hide">
    <form role="form" action="{{ route('vpublic.pauth.login') }}" method="post">
      {{ csrf_field() }}
      <h3>Log In Your Account</h3>
      @if (session('msgErlg') )
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Error!</strong> {{ session('msgErlg') }} 
      </div>
      {{-- expr --}}
      @endif
      <hr>
      <div class="form-group">
        <input type="email" name="email" id="access_name" class="form-control" placeholder="Email" tabindex="3" value="{{ old('email') }}">
      </div>
      <div class="form-group">
        <input type="password" name="password"  class="form-control " placeholder="Password" tabindex="4">
      </div>
      
      <hr>
      <div class="row">
        <div class="col-sm-16">
          <input type="submit" value="Log In" class="btn btn-danger btn-block btn-lg" tabindex="7">
        </div>
      </div>
      <div >
        <h5 class="text-center">--Or--</h5>
        <a href="{{ route('auth.auth.redirect','facebook') }}" class="btn btn-block btn-sm btn-social btn-facebook">
          <span class="fa fa-facebook"></span>
          Sign in with Facebook
        </a>
        <a href="{{route('auth.auth.redirect','google')}}" class="btn btn-block btn-sm btn-social btn-google">
          <span class="fa fa-google"></span>
          Sign in with Google
        </a>
        {{ session('msgError') }} {{ session('msgSuccess') }}
    </div>
    </form>
  </div>
  <div id="success-lg" class="white-popup mfp-with-anim mfp-hide">
      <h3>Congratulations</h3>
      @if (session('msgErrgSu') || session('msgScAc') || session('msgError') )
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>{{ session('msgScAc') }}{{ session('msgError') }}!</strong>
      </div>
      {{-- expr --}}
      @endif
      <div class="row">
        <div class="col-sm-16">
          <input id="close" type="button" value="OK" class="btn btn-danger btn-block btn-lg" tabindex="7">
        </div>
      </div>
  </div>

