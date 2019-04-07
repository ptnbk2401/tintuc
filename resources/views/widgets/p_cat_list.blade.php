<div id="box-vertical-megamenus" class="box-vertical-megamenus nav-toggle-cat">
    <h4 class="title active">
        <span class="btn-open-mobile home-page">
            <span></span>
            <span></span>
            <span></span>
        </span>
        <span class="title-menu">Tất cả danh mục</span>   
    </h4>
    <div class="vertical-menu-content" >
        <span class="btn-close hidden-md"><i class="fa fa-times" aria-hidden="true"></i></span>
        <ul class="vertical-menu-list">
            @foreach ($objPcat as $parent)
                @php
                    $objScat = getSubCat($parent->cat_id);
                @endphp
                @if(count($objScat))
                <li class="menu-item-has-children arrow item-megamenu">
                <a href="#" class="dropdown-toggle">{{ $parent->cname }}</a>
                <span class="toggle-submenu hidden-md"></span>
                <div class="submenu parent-megamenu megamenu">
                    <div class="row">
                        <div class="submenu-banner submenu-banner-menu-1">
                            <div class="col-md-4">
                                <div class="dropdown-menu-info">
                                    <h6 class="dropdown-menu-title">{{ $parent->cname }}</h6>
                                    <div class="dropdown-menu-content">
                                        <ul class="menu">
                                            @foreach ($objScat as $item)
                                                <li class="menu-item">
                                                    <a href="#">{{ $item->cname }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </li>
                @else
                <li><a href="#">{{ $parent->cname }}</a></li>
                @endif
            @endforeach
        </ul>
    </div>
</div>