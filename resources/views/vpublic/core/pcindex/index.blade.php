@extends('templates.core.master')

@section('css')
<style>
  .top-margin {
      margin-top: 56px !important;
    }
</style>
@stop
@section('main')
    <div class="row"> 
          <!-- business start -->
          <div class="col-sm-16 business  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="50">
            @widget('Index01')
          </div>
          <!-- business end --> 
          
          <!-- Science & Travel start -->
          <div class="col-sm-16">
            <div class="row">
              @widget('Index02')
            </div>
            <hr>
          </div>
          <!-- Scince & Travel end --> 
          <!-- lifestyle start-->
          <div class="col-sm-16 wow fadeInUp animated " data-wow-delay="0.5s" data-wow-offset="100">
            @widget('Index03')
            <hr>
          </div>
          <!-- lifestyle end --> 

          <!--wide ad start-->
          <div class="col-sm-16 wow fadeInDown animated " data-wow-delay="0.5s" data-wow-offset="25">
            @widget('AdsPublic',['vitri'=>'bottom'])
            
          </div>
          <!--wide ad end--> 
          
        </div>
    
@stop
@section('js')
   
@endsection
