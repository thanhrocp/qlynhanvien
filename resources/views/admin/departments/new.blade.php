 @extends('admin.layout.master')
 @section('title','Thêm mới phòng ban')
 @section('content')
 <div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="x_panel">
        <div class="x_title">
          <h2>Thêm mới phòng ban</h2>
          <ul class="nav navbar-right panel_toolbox">
            <button class="btn btn-danger" onclick="window.location='{{ url('/department') }}'">
              <a class="text-white"><img src="{{asset('/master/build/icons/clipboard.svg')}}" width="20px" class="mr-5 mt--4"> Danh sách</a>
            </button>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="/department/new" method="POST">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên phòng / ban <span class="text-red">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value="{{old('department_name')}}" class="form-control" name="department_name">
                <span class="text-red">{{$errors->first('department_name')}}</span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Số điện thoại <span class="text-red">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value="{{old('department_phone')}}" name="department_phone" class="form-control">
                <span class="text-red">{{$errors->first('department_phone')}}</span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Số nhân viên <span class="text-red">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value="{{old('department_number_person')}}" name="department_number_person" class="form-control">
                <span class="text-red">{{$errors->first('department_number_person')}}</span>
              </div>
            </div>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ghi chú &nbsp;</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea class="form-control" type="text" rows="10" name="department_note">{{old('department_note')}}</textarea>
                <span class="text-red">{{$errors->first('department_note')}}</span>
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
@endsection
