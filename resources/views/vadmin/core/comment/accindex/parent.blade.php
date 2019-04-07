@extends('templates.admin.master')
@section('content')
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Comment<small> List</small></h3>
    </div>
    <div class="title_right">
        @include('templates.admin.topsearch')
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>



        @if (Session::has('msg'))
        <div class="alert alert-success alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <strong>{{ Session::get('msg') }}</strong>
        </div>
        @endif
      <div class="x_content">
          <br>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            @php
                $colspan = 7;
            @endphp
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <th class="column-title">ID</th>
                  <th class="column-title">Người bình luận</th>
                  <th class="column-title">Email</th>
                  <th class="column-title">SĐT</th>
                  <th class="column-title">Nội dung bình luận</th>
                  <th class="column-title">Trạng thái</th>
                  <th class="column-title">Ngày bình luận</th>
                  <th class="column-title" style="width: 200px">Của bài viết</th>
                  <th class="column-title" style="width: 100px"><span class="nobr">Action</span></th>
                  <th class="bulk-actions" colspan="{{ $colspan }}">
                    <a class="antoo" style="color:#fff; font-weight:500;">Choose ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                  </th>
                </tr>
              </thead>

              <tbody>
              @if (!$objItems->first())
                <tr class="even pointer">
                  <td class="a-center " colspan="{{ $colspan }}">
                     <p>No data</p>
                  </td>
                </tr>
              @else
                @foreach ($objItems as $key => $objItem)
                    @php
                        $fcomment_id = $objItem->fcomment_id;
                        $content = $objItem->content;
                        $content = $objItem->email;
                        $content = $objItem->sdt;
                        $active = $objItem->active;
                        $aname = $objItem->aname;
                        $active = $objItem->active;
                        $fullname = $objItem->fullname ;
                        $created_at = date("d-m-Y", strtotime( $objItem->created_at));
                        $updated_at = date("d-m-Y", strtotime( $objItem->updated_at));
                        $urlDel = route('vadmin.core.comment.del', $fcomment_id);
                        $trrow = "odd"
                    @endphp
                    @if ($key % 2 == 0)
                        @php
                            $trrow = "even";
                        @endphp
                    @endif
                <tr class="{{ $trrow }} pointer">
                  <td class=" "><a href="" target="_blank" title="" rel="nofollow">{{ $fcomment_id }}</a></td>
                  <td class=" ">
                    <a href="" target="_blank" title="" rel="nofollow">{{ $fullname }}</a>
                  </td>
                  <td class=" ">
                    <a href="" target="_blank" title="" rel="nofollow">{{ $content }}</a>
                  </td>
                  <td class="active-comment-{{ $fcomment_id }}" >
                    @if ($active == 0)
                      <a href="#" onclick="return active('{{ $fcomment_id }}')" style="font-size: 23px;"> <i class="glyphicon glyphicon-remove" style="color: #f1635f;"></i></a>
                    @else
                      <a href="#" onclick="return active('{{ $fcomment_id }}')" style="font-size: 23px;"> <i class="glyphicon glyphicon-ok" style="color: #3795f4;"></i></a>
                    @endif
                  </td>
                  <td class=" ">
                    <a href="" target="_blank" title="" rel="nofollow">{{ $created_at }}</a>
                  </td>
                  <td class=" ">
                    <a href="" target="_blank" title="" rel="nofollow">{{ str_limit($aname, 50) }}</a>
                  </td>
                  <td style="font-size: 11px">
                      <a href="{{$urlDel}}"><i class="fa fa-trash"></i> Xóa</a>
                  </td>
                </tr>
                @endforeach
              @endif
              </tbody>
            </table>
            <div class="form-group">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <a href="{{ url()->previous() }}"><i class="fa fa-mail-reply"></i> Quay lại</a>
              </div>
            </div>
          </div>

          <div class="row">
                <div class="col-sm-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="datatable-responsive_paginate">
                        {{ $objItems->links() }}
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section("js")
  <script>
      function active(id){
          $.ajax({
              url: "{{ route('vadmin.core.comment.activestatus') }}",
              type: 'GET',
              cache: false,
              data: {aid:id},
              success: function(data){
                  $('.active-comment-'+id+' a').html(data);
              },
              error: function (){
                  alert('Có lỗi xảy ra');
              }
          });
          return false;
      };
  </script>
@stop