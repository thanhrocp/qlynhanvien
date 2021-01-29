@extends('admin.layout.master')
@section('title','Thêm mới tài khoản')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Thêm mới tài khoản</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <button class="btn btn-danger" onclick="window.location='{{ url('/user') }}'">
                <a class="text-white">Danh sách</a>
              </button>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data"
              action="/user/new">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Quyền <span
                    class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="role_id">
                    <?php $role = DB::table('roles')->where('role_name', '!=', 'Administrator')->get() ?>
                    @foreach($role as $rl)
                    <option value="{{$rl->id}}">{{ $rl->role_name }}</option>
                    @endforeach
                  </select>
                  <span class="text-red">{{$errors->first('department_name')}}</span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên tài khoản
                  <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="name" class="form-control" placeholder="Nhập tên">
                  <span class="text-red">{{$errors->first('name')}}</span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="email" class="form-control" placeholder="Nhập email">
                  <span class="text-red">{{$errors->first('email')}}</span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mật khẩu <span
                    class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                  <span class="text-red">{{$errors->first('password')}}</span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nhập lại mật
                  khẩu <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="password" name="passwordagain" class="form-control" placeholder="Nhập lại mật khẩu">
                  <span class="text-red">{{$errors->first('passwordagain')}}</span>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success">Lưu</button>
                  <button type="reset" class="btn btn-danger">Hủy</button>
                </div>
              </div>
              {{CsrfTokenUtil::csrfToken()}}
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
