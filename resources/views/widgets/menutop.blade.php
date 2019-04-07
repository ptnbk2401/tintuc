<nav class="navbar navbar-inverse" role="navigation">
  <div class="container">
    <div class="row">
      <div class="col-sm-16"> <a href="javascript:;" class="toggle-search pull-right"><span class="ion-ios7-search"></span></a>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav navbar-nav text-uppercase main-nav ">
            <li class="{{ strpos(Route::currentRouteName(), '.pcindex.index')? 'active' : '' }}"><a href="{{ route('vpublic.core.pcindex.index') }}">Home</a></li>
            @php
              $arID = [];
              $countID = count($objCat);
              $stt=0;
            @endphp
            @foreach ($objCat as $key => $cat)
            @php
              $objItems = countSubCat($cat->cat_id);
            @endphp
            @if ( !$cat->parent_id)
              @php
                if($stt==5) break;
                else $stt++;
              @endphp
              @if (!count($objItems))
                  <li class="{{ strpos(Request::path(),$cat->cat_id.'/'.str_slug($cat->cname))? 'active' : '' }}" > <a href="{{ route('vpublic.core.pcbloglist.index',[$cat->code]) }}">{{ $cat->cname }}</a></li>
                  @php
                    $arID[] = $cat->cat_id;
                  @endphp
              @else
                 <li class="dropdown {{ strpos(Request::path(),$cat->cat_id.'/'.str_slug($cat->cname))? 'active' : '' }}"> <a href="{{ route('vpublic.core.pcbloglist.index',[$cat->code]) }}" class="dropdown-toggle" data-toggle="">{{ $cat->cname }}<span class="ion-ios7-arrow-down nav-icn"></span></a>
                  @php
                    $arID[] = $cat->cat_id;
                  @endphp
                  <ul class="dropdown-menu text-capitalize" role="menu">
                  @foreach ($objItems as $item)
                    <li><a href="{{ route('vpublic.core.pcbloglist.index',[$item->code]) }}"><span class="ion-ios7-arrow-right nav-sub-icn"></span>{{ $item->cname }}</a></li>
                    @php
                      $arID[] = $item->cat_id;
                    @endphp
                  @endforeach
                  </ul>
                  </li>
              @endif
            @endif
            @endforeach
            @if ( $countID - count($arID) > 0 )
               <li class="dropdown "> <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="">Khác <span class="ion-ios7-arrow-down nav-icn"></span></a>
                  <ul class="dropdown-menu text-capitalize" role="menu">
                    @foreach ($objCat as $element)
                      @if ( !in_array($element->cat_id,$arID))
                        <li><a href="{{ route('vpublic.core.pcbloglist.index',[$element->code]) }}"><span class="ion-ios7-arrow-right nav-sub-icn"></span>{{ $element->cname }}</a></li>
                      @endif
                    @endforeach
                  </ul>
                </li>
            @endif
            <li class="{{ strpos(Route::currentRouteName(), '.pccontact.index')? 'active' : '' }}"> <a href="{{ route('vpublic.core.pccontact.index') }}">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- nav end --> 
  <!-- search start -->
  
  <div class="search-container ">
    <div class="container">
      <form action="{{ route('vpublic.core.pcblog.search') }}" method="get" role="search">
        {{-- {{ csrf_field() }} --}}
        <input id="search-bar" name="c" placeholder="Content & Hit Enter.." autocomplete="off">
      </form>
    </div>
  </div>
  <!-- search end --> 
</nav>


<?php
function countSubCat($cat_id) {
  $objmAccIndex = new \App\Model\Vadmin\Core\Cat\AccIndex();
  $objItems= $objmAccIndex->getSubCatActive($cat_id);
  return $objItems;
}

?>      