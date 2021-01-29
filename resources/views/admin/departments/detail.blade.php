@extends('admin.layout.master')
@section('title','Thêm mới phòng ban')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="x_panel">
        <div class="x_title">
          <h2>Màn hình chi tiết</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên phòng / ban <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <span>{{$result['department_name'] ?? null}}</span>
              </div>
              @if($errors->has('department_name'))
              <p style="color:red">{{$errors->first('department_name')}}</p>
              @endif
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Số điện thoại <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <span>{{$result['department_phone'] ?? null}}</span>
              </div>
              @if($errors->has('department_phone'))
              <p style="color:red"> {{ $errors->first('department_phone')}}</p>
              @endif
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Số nhân viên <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <span>{{$result['department_number_person'] ?? null}}</span>
              </div>
            </div>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ghi chú <span
                  class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <span>{{$result['department_note'] ?? null}}</span>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <form method="POST" action="/department/edit">
                  <input type="hidden" name="request_department_id" value="{{$result['id']}}" />
                  <input type="submit" class="btn btn-success" value="Chỉnh sửa">
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
