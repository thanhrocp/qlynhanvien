@extends('admin.layout.master')
@section('title','Chỉnh sửa')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Màn hình chỉnh sửa</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
              <li><a class="close-link"><i class="fa fa-close"></i></a></li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form class="form-horizontal form-label-left" method="POST" action="/department/edit">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên phòng / ban <span
                    class="text-red">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" value="{{old('department_name', $result->department_name)}}" placeholder="Ghi tên phòng"
                    class="form-control" name="department_name">
                  <span class="text-red">{{$errors->first('department_name')}}</span>
                </div>
              </div>
              <!--======================================================================================================-->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Số điện thoại <span
                    class="text-red">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" value="{{old('department_phone', $result->department_phone)}}"
                    placeholder="Nhập số điện thoại" name="department_phone" class="form-control">
                  <span class="text-red">{{$errors->first('department_phone')}}</span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Số nhân viên <span
                    class="text-red">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" value="{{old('department_number_person', $result->department_number_person)}}"
                    placeholder="Nhập số điện thoại" name="department_number_person" class="form-control">
                  <span class="text-red">{{$errors->first('department_number_person')}}</span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ghi chú &nbsp;</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control" placeholder="Nhập ghi chú" rows="10"
                    name="department_note">{{old('department_note', $result->department_note)}}</textarea>
                  <span class="text-red">{{$errors->first('department_note')}}</span>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success">Lưu</button>
                  <button type="reset" class="btn btn-danger">Hủy</button>
                </div>
                <input type="hidden" name="department_id" value="{{$result['id']}}" />
              </div>
              {{CsrfTokenUtil::csrfToken()}}
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
