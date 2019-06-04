 @extends('manage.layout.master')
 @section('title','Thêm mới phòng ban')
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
          <h2>Create a new Departments <small>(Thêm mới phòng / ban)</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
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