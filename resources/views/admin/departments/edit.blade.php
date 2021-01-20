 @extends('admin.layout.master')
 @section('title','Chỉnh sửa')
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
      <div class="x_panel">
        <div class="x_title">
          <h2>Edit Department</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form class="form-horizontal form-label-left" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên phòng / ban <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value="{{$result->depart_name ?? null}}" placeholder="Ghi tên phòng" class="form-control" name="depart_name">
              </div>
              @if($errors->has('depart_name'))
              <p style="color:red">{{$errors->first('depart_name')}}</p>
              @endif
            </div>
            <!--======================================================================================================-->
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Số điện thoại <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="number" value="{{$result->depart_phone ?? null}}" placeholder="Nhập số điện thoại" name="depart_phone" class="form-control">
              </div>
              @if($errors->has('depart_phone'))
              <p style="color:red"> {{ $errors->first('depart_phone')}}</p>
              @endif
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Số nhân viên <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="number" value="{{$result->depart_number_persion ?? null}}" placeholder="Nhập số điện thoại" name="depart_number_persion" class="form-control">
              </div>
              @if($errors->has('depart_number_persion'))
              <p style="color:red"> {{ $errors->first('depart_number_persion')}}</p>
              @endif
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Ghi chú <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea class="form-control" placeholder="Nhập ghi chú" name="depart_note">{{$result->depart_note ?? null}}</textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Lưu</button>
                <button type="reset" class="btn btn-danger">Hủy</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
