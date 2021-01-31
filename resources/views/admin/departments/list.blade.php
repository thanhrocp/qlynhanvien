@extends('admin.layout.master')
@section('title','Danh sách phòng')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="x_panel">
        <div class="x_title">
          <h2>Màn hình danh sách</h2>
          <ul class="nav navbar-right panel_toolbox">
            <button class="btn btn-danger" onclick="window.location='{{ url('/department/new') }}'">
              <img src="{{asset('/master/build/icons/plus.svg')}}" width="13px" class="mr-5 mt--2"><a
                class="text-white">Thêm mới</a>
            </button>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form method="POST" action="/department">
            <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-4">
                <input type="text" class="form-control" name="search_key" value="{{old('search_key', $search_key)}}" placeholder="Search" />
              </div>
              <div class="col-md-1 col-sm-2 col-xs-2">
                <input type="submit" value="Search" class="btn btn-danger">
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action table-bordered">
                <thead>
                  <tr class="headings">
                    <th class="column-title">No </th>
                    <th class="column-title">Tên phòng </th>
                    <th class="column-title">Số điện thoại </th>
                    <th class="column-title">Số nhân viên </th>
                    <th class="column-title">Ghi chú </th>
                    <th class="column-title">Người cập nhật</th>
                    <th class="column-title">Thời gian </th>
                    <th class="column-title" colspan="3" style="width: 5%"><span class="nobr">Thao tác</span></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($result as $key => $item)
                  <tr class="odd pointer">
                    <td>{{++$key + $result->perPage() * ($result->currentPage() - 1)}}</td>
                    <td>{{$item['department_name']}}</td>
                    <td>{{$item['department_phone']}}</td>
                    <td>{{$item['department_number_person']}}</td>
                    <td>{{$item['department_note']}}</td>
                    <td>{{$item['updated_by']}}</td>
                    <td>{{Carbon\Carbon::createFromTimestamp(strtotime($item['created_at']))->diffForHumans()}}</td>
                    <td>
                      <form method="POST" action="/department/detail" name="viewDetail{{$item['id']}}">
                        <input type="hidden" name="request_department_id" value="{{$item['id']}}" />
                        <a href="javascript:document.viewDetail{{$item['id']}}.submit();" class="btn btn-outline-info btn-xs"><i
                            class="fa fa-pencil"></i></a>
                        {{CsrfTokenUtil::csrfToken()}}
                      </form>
                    </td>
                    <td><a class="btn btn-outline-secondary btn-xs delete_part" data-id="{{$item['id']}}"><i class="fa fa-close"></i></a></td>
                  </tr>
                  @endforeach
                  @if (count($result) === 0)
                    <tr><td colspan='8' class='text-center'>Không có dữ liệu</td></tr>
                  @endif
                </tbody>
              </table>
              <div class="d-flex justify-content-between">
                @include('admin.common.page_limit', ['page_limit' => $page_limit])
                {{CsrfTokenUtil::csrfToken()}}
                @include('admin.common.pagination', ['result' => $result, 'search_key' => $search_key, 'page_limit' => $page_limit])
              </div>
            </div>
            <form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
