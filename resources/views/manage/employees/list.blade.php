 @extends('manage.layout.master')
 @section('title','Danh nhân viên')
 @section('content')
 <div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="panel panel-success">
        <div class="panel-heading text-right">
          <a href="" class="btn btn-info btn-xs"><i class="fa fa-home"> Home</i></a>
          <a href="javascript:void(0)" class="btn btn-primary btn-xs"><i class="fa fa-arrows-h"></i></a>
          <a class="btn btn-success btn-xs"><i class="fa fa-user"> Employee </i></a>
        </div>
        <div class="panel-body"><a href="{{url('employees/add')}}" title="Thêm mới" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a></div>
      </div>
      <div class="x_panel">
        <div class="x_title">
          <h2>List Employees <small>(Danh sách nhân viên)</small></h2>
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
                    <input type="checkbox" id="check-all" class="flat">
                  </th>
                  <th class="column-title"> Số thứ tự </th>
                  <th class="column-title"> Tên phòng </th>
                  <th class="column-title"> Họ và tên </th>
                  <th class="column-title"> Ngày sinh </th>
                  <th class="column-title"> Giới tính </th>
                  <th class="column-title"> Cập nhật </th>
                  <th class="column-title" colspan="3" style="width: 5%"><span class="nobr"> Thao tác </span></th>
                  <th class="bulk-actions" colspan="9">
                    <a class="antoo" style="color:#fff; font-weight:500;">Chọn ( <span class="action-cnt"> </span> )</a>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach( $list as $key => $lt)
                <tr class="odd pointer">
                  <td class="a-center ">
                    <input type="checkbox" class="flat" name="table_records">
                  </td>
                  <td>{{ ++$key }}</td>
                  <td>{{ $lt->depart_name }}</td>
                  <td>{{ $lt->full_name }}</td>
                  <td>
                    <?php
                    echo Carbon\Carbon::create($lt->birth_date)->toFormattedDateString();
                    ?>
                  </td>
                  <td>{{ $lt->sex }}</td>
                  <td>
                    <?php 
                    echo Carbon\Carbon::createFromTimestamp(strtotime($lt->created_at))->diffForHumans();
                    ?>
                  </td>
                  <td><a class="btn btn-success btn-xs" href="#modal-info{{$lt->id}}" data-toggle="modal"><i class="fa fa-link"></i></a></td>
                  <td><a class="btn btn-info btn-xs" href="{{url('employees/edit',$lt->id)}}"><i class="fa fa-pencil"></i></a></td>
                  <td><a class="btn btn-danger btn-xs delete_employ" data-id="{{$lt->id}}"><i class="fa fa-close"></i></a></td>
                </tr>
                <div class="modal modal-primary fade" id="modal-info{{$lt->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: #34C1DA; color: white">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center">Thông tin nhân viên</h4>
                      </div>
                      <div class="modal-body">
                          <span style="color:red">Bộ phận : </span>{{ $lt->depart_name }}<br/>
                          <span style="color:red">Họ Tên : </span> {{ $lt->full_name }}<br/>
                          <span style="color:red">Ngày sinh : </span> {{ $lt->birth_date }}<br/>
                          <span style="color:red">Giới tính : </span> {{ $lt->sex }}<br/>
                          <span style="color:red">Chứng minh ND : </span> {{ $lt->identity_card }}<br/>
                          <span style="color:red">Ngày cấp : </span> {{ $lt->dateofissue }}<br/>
                          <span style="color:red">Nơi cấp : </span> {{ $lt->issued_by }}<br/>
                          <span style="color:red">Tôn giáo : </span> {{ $lt->religion }}<br/> 
                          <span style="color:red">Dân tộc : </span> {{ $lt->nation }}<br/>
                          <span style="color:red">Tình trạng hôn nhân : </span> {{ $lt->marital_status }}<br/> 
                      </div>
                      <div class="modal-footer" style="background-color: #9A9292">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Đóng</button>
                      </div>
                    </div>
                  </div>
                </div>
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