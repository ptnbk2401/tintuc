<li><a><i class="glyphicon glyphicon-user"></i> Quản lý sản phẩm <span class="fa fa-chevron-down"></span></a>
  <ul class="nav child_menu">
    <li><a><i class="glyphicon glyphicon-user"></i> Danh mục <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('vadmin.core.pcat.index') }}">Danh sách</a></li>
          <li><a href="{{ route('vadmin.core.pcat.add') }}">Thêm</a></li>
          <li style="display: none"><a href="{{ route('vadmin.core.pcat.edit', Request::segment(5)) }}">Sửa</a></li>
        </ul>
    </li>
    <li><a><i class="glyphicon glyphicon-user"></i> Sản phẩm <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('vadmin.core.product.index') }}">Danh sách</a></li>
          <li><a href="{{ route('vadmin.core.product.add') }}">Thêm</a></li>
          <li style="display: none"><a href="{{ route('vadmin.core.product.edit', Request::segment(5)) }}">Sửa</a></li>
          <li style="display: none"><a href="{{ route('vadmin.core.product.htmldom') }}">HTML</a></li>
        </ul>
    </li>
    <li><a><i class="glyphicon glyphicon-user"></i> Thương hiệu<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('vadmin.core.thuonghieu.index') }}">Danh sách</a></li>
          <li><a href="{{ route('vadmin.core.thuonghieu.add') }}">Thêm</a></li>
          <li style="display: none"><a href="{{ route('vadmin.core.thuonghieu.edit', Request::segment(5)) }}">Sửa</a></li>
        </ul>
    </li>
	
  </ul>
</li>