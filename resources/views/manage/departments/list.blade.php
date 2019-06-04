@extends('manage.layout.master')
@section('title','Danh sách phòng')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="panel panel-success">
        <div class="panel-heading text-right">
          <a href="" class="btn btn-info btn-xs"><i class="fa fa-home"> Home</i></a>
          <a href="javascript:void(0)" class="btn btn-primary btn-xs"><i class="fa fa-arrows-h"></i></a>
          <a class="btn btn-success btn-xs"> Departments </i></a>
        </div>
      </div>
      <form method="POST" action="{{route('depart_delete')}}">
        {!! csrf_field() !!}
      <div class="x_panel">
        <div class="x_title">
          <span><a href="{{url('departments/add')}}" title="Thêm mới" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a></span>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action table-bordered">
              <thead>
                <tr class="headings">
                  <th>
                    <button class="btn btn-success btn-xs" type="submit">Xóa</button>
                  </th>
                  <th class="column-title">Số thứ tự </th>
                  <th class="column-title">Tên phòng </th>
                  <th class="column-title">Số điện thoại </th>
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
                  <td class="a-center ">
                    <input type="checkbox" id="check-all" class="flat" name="departdelete[]" value="{{$lt->id}}">
                  </td>
                  <td>{{ ++$key }}</td>
                  <td>{{ $lt->depart_name }}</td>
                  <td>{{ $lt->depart_phone }}</td>
                  <td>
                    <?php 
                    echo Carbon\Carbon::createFromTimestamp(strtotime($lt->created_at))->diffForHumans();
                    ?>
                  </td>
                  <td><a class="btn btn-success btn-xs"><i class="fa fa-search"></i></a></td>
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