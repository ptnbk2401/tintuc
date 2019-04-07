@extends('templates.core.master')
@section('main')
<div class="row">
    <div id="map_canvas" class="col-sm-16"> 
        <iframe src="https://regiohelden.de/google-maps/map_en.php?hl=en&amp;q=Tôn Đức Thắng Liên chiểu Đà Nẵng +(Tôn Đức Thắng Liên chiểu Đà Nẵng )&amp;ie=UTF8&amp;&amp;z=14&amp;output=embed"  frameborder="0" style="border:0;width: 100%;height: 100%;" allowfullscreen></iframe>

</div>
<div class="col-sm-16">
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif
  @if(session('msg-er'))
  <div class="alert alert-danger">
    {{ session('msg-er') }}
  </div>
  @endif
  @if(session('msg'))
  <div class="alert alert-success">
    {{ session('msg') }}
  </div>
  @endif
  <div class="row">
    <div class="main-title-outer pull-left">
      <div class="main-title">Liên Hệ</div>
    </div>
      
      
  <div class="col-sm-11">
      <form action="{{ route('vpublic.core.pccontact.index') }}" method="POST" class="comment-form">
        {{ csrf_field() }}
        <div class="row">
          <div class="form-group col-xs-16 col-sm-8 name-field">
            <input type="text" placeholder="Name*" required name="fullname" class="form-control" value="{{ old('fullname') }}">
        </div>
        <div class="form-group col-xs-16 col-sm-8 email-field">
            <input type="email" placeholder="Email*" required name="email" class="form-control" value="{{ old('email') }}" >
        </div>
        <div class="form-group col-xs-16 col-sm-16">
            <textarea placeholder="Your Message" rows="8" class="form-control" required id="message" name="content">{{ old('content') }}</textarea>
        </div>
        </div>
        <div class="form-group">
          <button class="btn btn-danger" type="submit">Send Message</button>
        </div>
    </form>
</div>
<div class="col-sm-4  adress">
  <address>
      <strong>Adress</strong><br>
      Tôn Đức Thắng Liên Chiểu<br>
      Đà Nẵng, Việt Nam<br>
      Phone: (+84) 373099406
  </address>
  <address>
      <strong>Email</strong><br>
      <a href="mailto:#">ptnbk2401@gmail.com</a>
  </address>
  <strong>Social</strong><br>
  <ul class="list-inline">
    <li><a href="#"><span class="ion-social-twitter"></span></a></li>
    <li><a href="#"><span class="ion-social-facebook"></span></a></li>
    <li><a href="#"><span class="ion-social-googleplus"></span></a></li>
</ul>
</div>
</div>
</div>
</div>
@stop
@section('js')

@endsection
