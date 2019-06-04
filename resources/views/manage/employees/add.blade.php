@extends('manage.layout.master')
@section('title','Thêm mới nhân viên')
@section('content')
<div class="right_col" role="main">
	<div class="">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-success">
					<div class="panel-heading text-right">
						<a href="" class="btn btn-info btn-xs"><i class="fa fa-home"> Home</i></a>
						<a href="javascript:void(0)" class="btn btn-primary btn-xs"><i class="fa fa-arrows-h"></i></a>
						<a class="btn btn-success btn-xs"> Employee </i></a>
					</div>
				</div>
				<div class="x_panel">
					<div class="x_title">
						<h2>Create a new Employee <small>(Thêm mới nhân viên)</small></h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
          <!---------------------------------------------------------------------------------------------------------------------------->
          <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
           {!! csrf_field() !!}
           <!---------------------------------------------------------------------------------------------------------------------------->
           <div class="x_content">
            <div class="avatar-wrapper">
              <img class="profile-pic" src="" />
              <div class="upload-button">
                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
              </div>
              <input class="file-upload" type="file" name="avatar" accept="image/*"/>
            </div>
            <!---------------------------------------------------------------------------------------------------------------------------->
            <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Bộ phận <span class="required">*</span></label>
             <div class="col-md-6 col-sm-6 col-xs-12">

              <select class="form-control" name="depart_id">

               <?php $departments = DB::table('departments')->get() ?>

               @foreach($departments as $dp)

               <option value="{{ $dp->id }}" {{ old('depart_id')==$dp->id?'selected':'' }}>{{ $dp->depart_name }}</option>

               @endforeach

             </select>

           </div>

         </div>
         <!---------------------------------------------------------------------------------------------------------------------------->
         <div class="form-group">

          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tài khoản nhân viên <span class="required">*</span></label>

          <div class="col-md-6 col-sm-6 col-xs-12">

            <select class="form-control" name="user_id">

              <?php $users = DB::table('users')->get() ?>

              @foreach($users as $users)

              <option value="{{$users->id}}">{{ $users->email }}</option>

              @endforeach

            </select>

          </div>
          @if($errors->has('user_id'))

          <p style="color:red">{{$errors->first('user_id')}}</p>

          @endif
        </div>
        <!---------------------------------------------------------------------------------------------------------------------------->
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Họ và đệm <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" required="required" value="{{old('first_name')}}" class="form-control col-md-7 col-xs-12" name="first_name" placeholder="Nhập họ và đệm">
          </div>
          @if($errors->has('first_name'))
          <p style="color:red">{{$errors->first('first_name')}}</p>
          @endif
        </div>
        <!---------------------------------------------------------------------------------------------------------------------------->
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" required="required" value="{{old('last_name')}}" class="form-control col-md-7 col-xs-12" name="last_name" placeholder="Nhập tên">
          </div>
          @if($errors->has('last_name'))
          <p style="color:red">{{$errors->first('last_name')}}</p>
          @endif
        </div>
        <!---------------------------------------------------------------------------------------------------------------------------->
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày sinh
          </label>
          <div class="col-md-6 xdisplay_inputx has-feedback">
            <input type="text" required="required" class="form-control has-feedback-left datepicker" value="{{old('birth_date')}}" name="birth_date" placeholder="dd/mm/yyyy">
            <span class="fa fa-calendar-check-o form-control-feedback left" aria-hidden="true"></span>
          </div> 
          @if($errors->has('birth_date'))
          <p style="color:red"> {{ $errors->first('birth_date') }}</p>         
          @endif 
        </div>
        <!---------------------------------------------------------------------------------------------------------------------------->
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Giới tính</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div id="gender" class="btn-group" data-toggle="buttons">
              <label class="btn btn-warning btn-sm">
                <input type="radio" name="gender" checked="" value="1">Nam
              </label>
              <label class="btn btn-primary btn-sm">
                <input type="radio" name="gender" value="2">&nbsp;Nữ&nbsp;
              </label>
            </div>
          </div>
        </div>
        <!---------------------------------------------------------------------------------------------------------------------------->
        <div class="form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12">Chứng minh thư ND
         </label>
         <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="number" name="identity_card" required="required" value="{{old('identity_card')}}" class="form-control col-md-7 col-xs-12" placeholder="Nhập chứng minh thư">
        </div>
        @if($errors->has('identity_card'))
        <p style="color:red"> {{ $errors->first('identity_card')}}</p>         
        @endif
      </div>
      <!---------------------------------------------------------------------------------------------------------------------------->        <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày cấp
        </label>
        <div class="col-md-6 xdisplay_inputx has-feedback">
          <input type="text" class="form-control has-feedback-left datepicker" required="required" value="{{old('dateofissue')}}" placeholder="mm/dd/yyyy" name="dateofissue">
          <span class="fa fa-calendar-check-o form-control-feedback left" aria-hidden="true"></span>
        </div> 
        @if($errors->has('dateofissue'))
        <p style="color:red"> {{ $errors->first('dateofissue') }}</p>         
        @endif
      </div>
      <!---------------------------------------------------------------------------------------------------------------------------->
      <div class="form-group">
       <label class="control-label col-md-3 col-sm-3 col-xs-12">Nơi cấp
       </label>
       <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="issued_by" value="{{old('issued_by')}}" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nhập nơi cấp">
      </div>
      @if($errors->has('issued_by'))
      <p style="color:red"> {{ $errors->first('issued_by') }}</p>         
      @endif
    </div>
    <!---------------------------------------------------------------------------------------------------------------------------->
    <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tôn giáo
     </label>
     <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" name="religion" value="{{old('religion')}}" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nhập tôn giáo">
    </div>
    @if($errors->has('religion'))
    <p style="color:red"> {{ $errors->first('religion') }}</p>         
    @endif
  </div>
  <!---------------------------------------------------------------------------------------------------------------------------->
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Dân tộc
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" name="nation" value="{{old('nation')}}" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nhập dân tộc">
    </div>
    @if($errors->has('nation'))
    <p style="color:red"> {{ $errors->first('nation') }}</p>         
    @endif
  </div>
  <!---------------------------------------------------------------------------------------------------------------------------->
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tình trạng hôn nhân
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" name="marital_status" value="{{old('marital_status')}}" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nhập tình trạng hôn nhân">
    </div>
    @if($errors->has('marital_status'))
    <p style="color:red"> {{ $errors->first('marital_status')}}</p>         
    @endif
  </div>
  <!---------------------------------------------------------------------------------------------------------------------------->
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