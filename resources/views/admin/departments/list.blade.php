@extends('admin.layout.master')
@section('title','Danh sách phòng')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="x_panel">
        <div class="x_title">
          <h2>List of departments</h2>
          <ul class="nav navbar-right panel_toolbox">
            <button class="btn btn-danger">
              <a class="text-white" href="{{URL::to('/departments/new')}}">Thêm mới</a>
            </button>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action table-bordered">
              <thead>
                <tr class="headings">
                  <th class="column-title">Số thứ tự </th>
                  <th class="column-title">Tên phòng </th>
                  <th class="column-title">Số điện thoại </th>
                  <th class="column-title">Số nhân viên </th>
                  <th class="column-title">Ghi chú </th>
                  <th class="column-title">Cập nhật </th>
                  <th class="column-title" colspan="3" style="width: 5%"><span class="nobr">Thao
                      tác</span></th>
                  <th class="bulk-actions" colspan="9">
                    <button type="submit" class="btn btn-success btn-xs">Xóa</button><a class="antoo"
                      style="color:#fff;">Chọn ( <span class="action-cnt"> </span>
                      )</a>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($result as $key => $item)
                <tr class="odd pointer">
                  <td>{{ ++$key }}</td>
                  <td>{{ $item->depart_name }}</td>
                  <td>{{ $item->depart_phone }}</td>
                  <td>{{ $item->depart_number_persion }}</td>
                  <td>{{ $item->depart_note }}</td>
                  <td>
                    {{Carbon\Carbon::createFromTimestamp(strtotime($item->created_at))->diffForHumans()}}
                  </td>
                  <td>
                    <form method="POST" action="/departments/detail" name="viewDetail{{$item['id']}}">
                      <input type="hidden" name="request_department_id" value="{{$item['id']}}" />
                      <a href="javascript:document.viewDetail{{$item['id']}}.submit();" class="btn btn-info btn-xs"><i
                          class="fa fa-pencil"></i></a>
                      {{CsrfTokenUtil::csrfToken()}}
                    </form>
                  </td>
                  <td><a class="btn btn-danger btn-xs delete_part" data-id="{{$item->id}}"><i
                        class="fa fa-close"></i></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
