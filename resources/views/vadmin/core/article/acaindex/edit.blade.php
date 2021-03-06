@extends('templates.admin.master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Article <small>Edit</small></h3>
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
                        <form action="{{ route('vadmin.core.article.edit',[$objItemOld->article_id,$page]) }}" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Article name</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="aname" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)" value="{{ old('aname', $objItemOld->aname)}}" class="form-control" placeholder="Article name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Code</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="code"  id="slug-text" value="{{ old('code', $objItemOld->code)}}" class="form-control" placeholder="Code" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Thể loại</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="radio">
                                  @php
                                    $has_video = empty(old('has_video'))? $objItemOld->has_video : old('has_video');
                                    $checked_bviet = empty($has_video)? 'checked' : '';
                                    $checked_video = empty($has_video)? '' : 'checked';
                                  @endphp
                                  <label>
                                    <input type="radio" name="has_video" id="type_bviet" value="0"  onclick="checkRadio(0)" {{ $checked_bviet }}>
                                    Bài viết thường
                                  </label> 
                                  <label>
                                    <input type="radio" name="has_video" id="type_video" value="1"  onclick="checkRadio(1)" {{ $checked_video }}>
                                    Video
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group" id="url_video_div" style="display: none;">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Url Video(Youtube)</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                @php
                                    if(empty(old('url'))) {
                                        $url = 'https://www.youtube.com/watch?v='.$objItemOld->ID_video;
                                    } else {
                                        $url = old('url');
                                    }

                                @endphp
                                <input type="url" name="url" value="{{ $url }}" placeholder="Link video youtube" class="form-control" onload="youtube_parser(this.value)" onkeyup="youtube_parser(this.value)">
                              </div>
                              <div class="col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3 col-xs-12">
                                <input type="text" name="ID_Video" id="ID_Video" value="{{ old('ID_Video',$objItemOld->ID_video)}}" class="form-control" readonly> 
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
									<input type="number" name="sort" value="{{ old('sort', $objItemOld->sort)}}" class="form-control" placeholder="Enter sort">
								</div>
							</div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Preview picture</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="file" name="picture" value="Upload file" class="form-control">
                                    @if(!empty($objItemOld->picture))
                                        <a href="{{asset('/storage/app/media/files/article/'.$objItemOld->picture)}}" target="_blank"><img height="100px" src="{{asset('/storage/app/media/files/article/'.$objItemOld->picture)}}" alt=""></a>
                                        
                                    @else
                                        <input type="hidden" name="delPic" value="">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea  class="form-control" rows="3" name="preview_text" placeholder="Enter description">{{old('preview_text', $objItemOld->preview_text)}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nguồn tin: </label>
                              <div  class="col-md-9 col-sm-9 col-xs-12">
                                <a href="{{ $objItemOld->linknguon }}" target="_blank">{{ empty($objItemOld->linknguon)? 'Tự soạn' : $objItemOld->linknguon }}</a>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Chi tiết: </label>
                                <div  class="col-md-9 col-sm-9 col-xs-12">
                                    <a href="javascript:void(0)" class=" btn-sm btn btn-warning" onclick="getDetail('{{ $objItemOld->linknguon }}')">Lấy chi tiết</a>
                                    <span id="loading" style="display: none;" >
                                      <img src="/images/loading.gif" style="width: 35px;" >
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">

                                @if (empty($objItemOld->detail_text))
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <textarea name="detail_text" id="ckeditor" placeholder="Chi tiết bài viết">{{ old('detail_text',$objItemOld->detail_text) }}</textarea>
                                    {{-- <textarea name="detail_text" id="ckeditor1" placeholder="Chi tiết bài viết">{{ old('detail_text') }}</textarea> --}}
                                </div>
                                @else
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                    <textarea name="detail_text" id="ckeditor" placeholder="Chi tiết bài viết">{{ old('detail_text',$objItemOld->detail_text ) }}</textarea>
                                  </div>
                                @endif
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="submit" class="btn btn-success">Save</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                                    <button type="button" id="lfm" class="btn btn-primary">Upload Images</button>
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
    <script src="/js/ckeditor/ckeditor.js"></script>
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

        $(function(){
            var type = {{ $has_video }};
            checkRadio(type);   
        });
        function checkRadio(type) {
            if( type != 0 ) {
              $('#url_video_div').show();
            } else {
              $('#url_video_div').hide();
            }
        }

    function youtube_parser(link){
        var url = link.trim();
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
        var match = url.match(regExp);
        if (match&&match[7].length==11){
            var b=match[7];
            $('#ID_Video').val(b);
        }else{
            alert("Đường dẫn video Youtube không tồn tại! Vui lòng kiểm tra lại");
        }
    } 
var ajax_sendding = false;
function getDetail(url){
    if (ajax_sendding == true){
      alert('Đang xác Lấy tin!!');
      return false;
    }
    ajax_sendding = true;
    $('#loading').show();
    $.ajax({
      url: "{{ route('vadmin.core.article.getDetailEdit') }}",
      type: 'GET',
      cache: false,
      data: {url:url},
      success: function(data){
          // $('#ckeditor1').text(data);
          CKEDITOR.instances.ckeditor.setData(data);
          // alert($('#ckeditor').text());
      },
      error: function (){
        alert('Có lỗi');
      }
    }).always(function(){
        $('#loading').hide();
        ajax_sendding = false
        // alert('Hoàn Thành')
    });
    return false;
};

</script>

@stop



    
        