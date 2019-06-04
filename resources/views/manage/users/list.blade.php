 @extends('manage.layout.master')
 @section('title','Danh sách nhân viên')
 @section('content')
 <div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="panel panel-success">
        <div class="panel-heading text-right">
          <a href="" class="btn btn-info btn-xs"><i class="fa fa-home"> Home</i></a>
          <a href="javascript:void(0)" class="btn btn-primary btn-xs"><i class="fa fa-arrows-h"></i></a>
          <a class="btn btn-success btn-xs"><i class="fa fa-user"> User </i></a>
        </div>
        <div class="panel-body"><a href="{{url('users/add')}}" title="Thêm mới" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a></div>
      </div>
      <form method="post">
        {!! csrf_field() !!}
        <div class="x_panel">
          <div class="x_title">
            <h2>List User <small>(Danh sách tài khoản)</small></h2>
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
                        <button title="Reset password" class="btn btn-success btn-xs" type="submit">Reset</button>
                    </th>
                    <th class="column-title">Số thứ tự </th>
                    <th class="column-title">Tên tài khoản</th>
                    <th class="column-title">Email </th>
                    <th class="column-title">Quyền </th>
                    <th class="column-title">Cập nhật </th>
                    <th class="column-title" colspan="2" style="width: 5%"><span class="nobr">Thao tác</span></th>
                    <th class="bulk-actions" colspan="9">
                      <button type="submit" class="btn btn-info btn-xs">Reset</button>
                      <a class="antoo" style="color:#fff; font-weight:500;">Chọn ( <span class="action-cnt"> </span> )</a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($list as $key => $lt)
                  <tr class="odd pointer">
                    <td class="a-center ">
                      <input type="checkbox" id="check-all" class="flat" name="resetPass[]" value="{{$lt->email}}">
                    </td>
                    <td>{{ ++$key }}</td>
                    <td>{{ $lt->name }}</td>
                    <td>{{ $lt->email }}</td>
                    <td>{{ $lt->permission }}</td>
                    <td>
                      <?php 
                      echo Carbon\Carbon::createFromTimestamp(strtotime($lt->created_at))->diffForHumans();
                      ?>
                    </td>
                    <td><a class="btn btn-info btn-xs" href="{{url('users/edit',$lt->id)}}"><i class="fa fa-pencil"></i></a></td>
                    <td><a class="btn btn-danger btn-xs delete_users" data-id="{{$lt->id}}"><i class="fa fa-close"></i></a></td>
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