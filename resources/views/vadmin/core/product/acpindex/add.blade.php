@extends('templates.admin.master')
@section('content')
<div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Product <small>Add</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="x_panel">
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
          @if (Request::has('msg'))
          <div class="alert alert-danger">
              <ul>
                  <li>{{ Request::get('msg') }}</li>
              </ul>
          </div> 
          @endif

          <div class="x_content">
            <br>
            <form action="{{ route('vadmin.core.product.add') }}" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
              {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên sản phẩm</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="pname" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)" value="{{ old('pname')}}" class="form-control" placeholder="Tên sản phẩm">
                    </div> 
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Code</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input readonly type="text" name="code"  id="slug-text" value="{{ old('code')}}" class="form-control" placeholder="Code">
                    </div>
                </div>
				
				        <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-6">Category</label>
                    <div class="col-md-5 col-sm-5 col-xs-6">
                        <select name="cat_id" class="form-control">
                            <option value="0" selected="selected">--Chọn danh mục--</option>
                            {!! $strOption !!}
                        </select>
                    </div>
  					       <label class="control-label col-md-3 col-sm-3 col-xs-6">Sort</label>
                      <div class="col-md-1 col-sm-1 col-xs-6">
                          <input type="number" name="sort" value="{{ old('sort', 500)}}" class="form-control" placeholder="Enter sort">
                      </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh hiển thị</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="file" name="picture" value="Upload file" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Hình ảnh Sản phẩm <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="file" name="slide[]"  class="form-control col-md-7 col-xs-12" placeholder="" multiple required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea  class="form-control" rows="5" name="preview_text" placeholder="Enter description"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Detail text</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea name="detail_text" id="ckeditor" placeholder="Enter detail text"></textarea>
                    </div>
                </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <button type="submit" name="submit" class="btn btn-success">Save</button>
                  <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>

    </div>
</div>
@endsection

@section('js')
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script src="/js/core.js"></script>
<script>
    $('#lfm').filemanager('image');

    CKEDITOR.replace( 'ckeditor', {
          height: 350,   
          entities: false,
          basicEntities: false,
          // Pressing Enter will create a new &lt;div&gt; element.
          enterMode: CKEDITOR.ENTER_BR,
          // Pressing Shift+Enter will create a new &lt;p&gt; element.
          shiftEnterMode: CKEDITOR.ENTER_P,

          filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
          filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
          filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
          filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    });

</script>

@stop
