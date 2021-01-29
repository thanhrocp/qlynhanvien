 @extends('admin.layout.master')
 @section('title','Chỉnh sửa nhân viên')
 @section('content')
 <div class="right_col" role="main">
 	<div class="">
 		<div class="row">
 			<div class="col-md-12 col-sm-12 col-xs-12">
 				<div class="panel panel-success">
 					<div class="panel-heading text-right">
 						<a href="{{URL::to('/index')}}" class="btn btn-info btn-xs"><i class="fa fa-home"> Home</i></a>
 						<a href="javascript:void(0)" class="btn btn-primary btn-xs"><i class="fa fa-arrows-h"></i></a>
 						<a class="btn btn-success "> Employee </i></a>
 					</div>
 				</div>
 				<div class="x_panel">
 					<div class="x_title">
 						<a class="btn btn-success" href="employees/edit/{{$update->id}}/work"> Công việc </i></a>
            <a class="btn btn-info" href="employees/edit/{{$update->id}}/contact"> Liên hệ </i></a>
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
           <form  class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
              <div class="avatar-wrapper">
                <img class="profile-pic" src="upload/avatar/{{$update->avatar}}" />
                <div class="upload-button">
                  <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                </div>
                <input class="file-upload" type="file" name="avatar" accept="image/*"/>
              </div>
              <!-------------------------------------------------------------------------------------------------->
              <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bộ phận <span class="required">*</span>
               </label>
               <div class="col-md-6 col-sm-6 col-xs-12">

                <select class="form-control" name="depart_id">

                 <?php $departments = DB::table('departments')->get() ?>

                 @foreach($departments as $dp)

                 <option value="{{ $dp->id }}" @if($dp->id == (isset($update)?$update->depart_id:null)) selected @endif>{{ $dp->department_name }}</option>

                 @endforeach

               </select>

             </div>

           </div>
           <!-------------------------------------------------------------------------------------------------->
           <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tài khoản nhân viên <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">

              <select class="form-control" disabled="">

                <?php $users = DB::table('users')->get() ?>

                @foreach($users as $users)

                <option value="{{$users->id}}" @if($update->user_id == $users->id) selected @endif>{{ $users->email }}</option>

                @endforeach

              </select>

            </div>
            @if($errors->has('user_id'))
            <p style="color:red">{{$errors->first('user_id')}}</p>
            @endif
          </div>
          <!-------------------------------------------------------------------------------------------------->
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Họ và đệm <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" required="required" value="{{isset($update)?$update->first_name:null}}" class="form-control col-md-7 col-xs-12" name="first_name" placeholder="Nhập họ và đệm">
            </div>
            @if($errors->has('first_name'))
            <p style="color:red">{{$errors->first('first_name')}}</p>
            @endif
          </div>
          <!-------------------------------------------------------------------------------------------------->
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" required="required" value="{{isset($update)?$update->last_name:null}}" class="form-control col-md-7 col-xs-12" name="last_name" placeholder="Nhập tên">
            </div>
            @if($errors->has('last_name'))
            <p style="color:red">{{$errors->first('last_name')}}</p>
            @endif
          </div>
          <!-------------------------------------------------------------------------------------------------->
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ngày sinh <span class="required">*</span>
            </label>
            <div class="col-md-6 xdisplay_inputx has-feedback">
              <input type="date" class="form-control has-feedback-left" value="{{isset($update)?$update->birth_date:null}}" name="birth_date" id="single_cal2" placeholder="Chọn ngày tháng" aria-describedby="inputSuccess2Status2">
              <span class="fa fa-calendar-check-o form-control-feedback left" aria-hidden="true"></span>
            </div>
            @if($errors->has('birth_date'))
            <p style="color:red"> {{ $errors->first('birth_date') }}</p>
            @endif
          </div>
          <!-------------------------------------------------------------------------------------------------->
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giới tính</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div id="gender" class="btn-group" data-toggle="buttons">
                <label class="btn btn-warning btn-sm">
                  <input type="radio" name="gender" value="1">Nam
                </label>
                <label class="btn btn-primary btn-sm">
                  <input type="radio" name="gender" value="2">&nbsp;Nữ&nbsp;
                </label>
              </div>
            </div>
          </div>
          <!-------------------------------------------------------------------------------------------------->
          <div class="form-group">
          	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Chứng minh thư ND <span class="required">*</span>
          	</label>
          	<div class="col-md-6 col-sm-6 col-xs-12">

          		<input type="number" value="{{isset($update)?$update->identity_card:null}}" name="identity_card" class="form-control" placeholder="Nhập chứng minh thư">

          	</div>
          	@if($errors->has('identity_card'))
          	<p style="color:red"> {{ $errors->first('identity_card')}}</p>
          	@endif
          </div>
          <!-------------------------------------------------------------------------------------------------->
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày cấp <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="date" value="{{isset($update)?$update->dateofissue:null}}" name="dateofissue" class="form-control" placeholder="Nhập nơi cấp">
            </div>
            @if($errors->has('dateofissue'))
            <p style="color:red"> {{ $errors->first('dateofissue') }}</p>
            @endif
          </div>
          <!-------------------------------------------------------------------------------------------------->
          <div class="form-group">
          	<label class="control-label col-md-3 col-sm-3 col-xs-12">Nơi cấp <span class="required">*</span>
          	</label>
          	<div class="col-md-6 col-sm-6 col-xs-12">

          		<input type="text" value="{{isset($update)?$update->issued_by:null}}" name="issued_by" class="form-control" placeholder="Nhập nơi cấp">

          	</div>
          	@if($errors->has('issued_by'))
          	<p style="color:red"> {{ $errors->first('issued_by') }}</p>
          	@endif
          </div>
          <!-------------------------------------------------------------------------------------------------->
          <div class="form-group">
          	<label class="control-label col-md-3 col-sm-3 col-xs-12">Tôn giáo <span class="required">*</span>
          	</label>

          	<div class="col-md-6 col-sm-6 col-xs-12">
          		<input type="text" value="{{isset($update)?$update->religion:null}}" name="religion" class="form-control col-md-7 col-xs-12" placeholder="Nhập tôn giáo">

          	</div>
          	@if($errors->has('religion'))
          	<p style="color:red"> {{ $errors->first('religion') }}</p>
          	@endif
          </div>
          <!-------------------------------------------------------------------------------------------------->
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Dân tộc <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">

              <input type="text" value="{{isset($update)?$update->nation:null}}" name="nation" class="form-control col-md-7 col-xs-12" placeholder="Nhập dân tộc">

            </div>
            @if($errors->has('nation'))
            <p style="color:red"> {{ $errors->first('nation') }}</p>
            @endif
          </div>
          <!-------------------------------------------------------------------------------------------------->
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tình trạng hôn nhân <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">

              <input type="text" value="{{isset($update)?$update->marital_status:null}}" name="marital_status" class="form-control" placeholder="Nhập tình trạng hôn nhân">

            </div>
            @if($errors->has('marital_status'))
            <p style="color:red"> {{ $errors->first('marital_status')}}</p>
            @endif
          </div>
          <!-------------------------------------------------------------------------------------------------->
          <div class="form-group">
          	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          		<button type="submit" class="btn btn-success">Lưu</button>
          		<button type="reset" class="btn btn-danger">Hủy</button>
          	</div>
          </div>
          <!-------------------------------------------------------------------------------------------------->
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
