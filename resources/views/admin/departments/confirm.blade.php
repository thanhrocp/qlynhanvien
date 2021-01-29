@extends('admin.layout.master')
@section('title','Thêm mới phòng ban')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="x_panel">
        <div class="x_title">
          <h2>Màn hình xác nhận</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên phòng / ban
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <span>{{$result['department_name'] ?? null}}</span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Số điện thoại
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <span>{{$result['department_phone'] ?? null}}</span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Số nhân viên
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <span>{{$result['department_number_person'] ?? null}}</span>
              </div>
            </div>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ghi chú</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <span>{{$result['department_note'] ?? null}}</span>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <form method="POST" action="/department/confirm">
                  <input type="submit" class="btn btn-success" value="Lưu">
                  {{CsrfTokenUtil::csrfToken()}}
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
