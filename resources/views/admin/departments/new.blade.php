 @extends('admin.layout.master')
 @section('title','Thêm mới phòng ban')
 @section('content')
 <div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="x_panel">
        <div class="x_title">
          <h2>Create a new Departments</h2>
          <ul class="nav navbar-right panel_toolbox">
            <button class="btn btn-danger">
              <a class="text-white" href="{{URL::to('/departments')}}">Danh sách</a>
            </button>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên phòng / ban <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value="{{old('depart_name')}}" required="required" class="form-control" name="depart_name">
              </div>
              @if($errors->has('depart_name'))
              <p style="color:red">{{$errors->first('depart_name')}}</p>
              @endif
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Số điện thoại <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="number" value="{{old('depart_phone')}}" name="depart_phone" required="required" class="form-control">
              </div>
              @if($errors->has('depart_phone'))
              <p style="color:red"> {{ $errors->first('depart_phone')}}</p>
              @endif
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Số nhân viên <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="number" value="{{old('depart_number_persion')}}" name="depart_number_persion" required="required" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ghi chú <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea class="form-control" type="text" name="depart_note">{{old('depart_note')}}</textarea>
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
