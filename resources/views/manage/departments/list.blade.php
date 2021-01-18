@extends('manage.layout.master')
@section('title','Danh sách phòng')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <form method="POST" action="{{route('depart_delete')}}">
      @csrf
      <div class="x_panel">
        <div class="x_title">
          <h2>List of departments</h2>
          <ul class="nav navbar-right panel_toolbox">
            <button class="btn btn-danger">
              <a class="text-white" href="{{URL::to('/departments/create')}}">Thêm mới</a>
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
                  <th class="column-title">Cập nhật </th>
                  <th class="column-title" colspan="3" style="width: 5%"><span class="nobr">Thao tác</span></th>
                  <th class="bulk-actions" colspan="9">
                    <button type="submit" class="btn btn-success btn-xs">Xóa</button><a class="antoo" style="color:#fff;">Chọn ( <span class="action-cnt"> </span> )</a>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($list as $key => $lt)
                <tr class="odd pointer">
                  <td>{{ ++$key }}</td>
                  <td>{{ $lt->depart_name }}</td>
                  <td>{{ $lt->depart_phone }}</td>
                  <td>{{ $lt->depart_number_persion }}</td>
                  <td>
                    <?php 
                    echo Carbon\Carbon::createFromTimestamp(strtotime($lt->created_at))->diffForHumans();
                    ?>
                  </td>
                  <td><a class="btn btn-info btn-xs" href="{{url('departments/edit',$lt->id)}}"><i class="fa fa-pencil"></i></a></td>
                  <td><a class="btn btn-danger btn-xs delete_part" data-id="{{$lt->id}}"><i class="fa fa-close"></i></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection