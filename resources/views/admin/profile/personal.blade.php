@extends('admin.layout.master')
@section('title','Thông tin cá nhân')
@section('content')
<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-success">
				<div class="panel-heading text-right">
					<a href="{{{{URL::to('/index')}}}}" class="btn btn-info btn-xs"><i class="fa fa-home"> Home</i></a>
					<a href="javascript:void(0)" class="btn btn-primary btn-xs"><i class="fa fa-arrows-h"></i></a>
					<a class="btn btn-success btn-xs"> Personal </i></a>
				</div>
			</div>
			<form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
				{!! csrf_field() !!}
				<div class="x_panel">
					<div class="x_title">
						<ul class="nav navbar-left panel_toolbox">
							<li><span style="font-size: 20px;color: orange">Thông tin cá nhân <i class="fa fa-question"></i></span></li>
						</ul>
						<ul class="nav navbar-right panel_toolbox">
							<li><button class="btn btn-success" type="submit">Lưu</button></a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<!--------------------------------------Avatar--------------------------------------------->
						<div class="avatar-wrapper">
							<img class="profile-pic" src="upload/avatar/{{isset($personal)?$personal->avatar:null}}"/>
							<div class="upload-button">
								<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
							</div>
							<input class="file-upload" type="file" name="avatar" accept="image/*"/>
						</div>
						<!-------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bộ phận <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control" disabled="">
										<option value="">{{isset($personal)?$personal->depart_name:null}}</option>
									</select>
								</div>
							</div>
						</div>
						<!-------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">CMND <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="number" value="{{isset($personal)?$personal->identity_card:null}}" name="identity_card" class="form-control col-md-7 col-xs-12" placeholder="Nhập chứng minh thư nhân dân">
								</div>
								@if($errors->has('identity_card'))
								<p style="color:red"> {{ $errors->first('identity_card') }}</p>
								@endif
							</div>
						</div>
						<!-------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Chức vụ<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control" disabled="">
										<option>{{isset($personal)?$personal->position:null}}</option>
									</select>
								</div>
							</div>
						</div>
						<!-------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ngày cấp<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="date" value="{{isset($personal)?$personal->dateofissue:null}}" name="dateofissue" class="form-control has-feedback-left">
									<span class="fa fa-calendar-check-o form-control-feedback left" aria-hidden="true"></span>
								</div>
								@if($errors->has('dateofissue'))
								<p style="color:red"> {{ $errors->first('dateofissue')}}</p>
								@endif
							</div>
						</div>
						<!---------------------------------------------------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Họ và đệm <span class="required">*</span></label>
								<div class="col-md-6 xdisplay_inputx has-feedback">
									<input type="text" class="form-control" value="{{isset($personal)?$personal->first_name:null}}" name="first_name" placeholder="Nhập họ và đệm">
								</div>
								@if($errors->has('birth_date'))
								<p style="color:red"> {{ $errors->first('birth_date') }}</p>
								@endif
							</div>
						</div>
						<!------------------------------------------------------------------------------------------------------------------------------------------>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nơi cấp <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" required="required" value="{{isset($personal)?$personal->issued_by:null}}" class="form-control" name="issued_by" placeholder="Nhập nơi cấp">
								</div>
								@if($errors->has('issued_by'))
								<p style="color:red">{{$errors->first('issued_by')}}</p>
								@endif
							</div>
						</div>
						<!-------------------------------------------------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Tên<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{isset($personal)?$personal->last_name:null}}" name="last_name" class="form-control" placeholder="Nhập tên">
								</div>
								@if($errors->has('last_name'))
								<p style="color:red"> {{ $errors->first('last_name')}}</p>
								@endif
							</div>
						</div>
						<!--------------------------------------------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Tôn giáo<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" required="required" value="{{isset($personal)?$personal->religion:null}}" class="form-control" name="religion" placeholder="Nhập tôn giáo">
								</div>
							</div>
						</div>
						<!------------------------------------------------------------------------------------------------------------------------------------------>
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ngày sinh <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="date" value="{{isset($personal)?$personal->birth_date:null}}" name="birth_date" class="form-control has-feedback-left">
									<span class="fa fa-calendar-check-o form-control-feedback left" aria-hidden="true"></span>
								</div>
								@if($errors->has('birth_date'))
								<p style="color:red"> {{ $errors->first('birth_date') }}</p>
								@endif
							</div>
						</div>
						<!-------------------------------------------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Dân tộc <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{isset($personal)?$personal->nation:null}}" name="nation" class="form-control" placeholder="Nhập dân tộc">
								</div>
								@if($errors->has('nation'))
								<p style="color:red"> {{ $errors->first('nation') }}</p>
								@endif
							</div>
						</div>
						<!-------------------------------------------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Giới tính<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control" name="gender">
										<option value="1" @if(isset($personal)?$personal->gender==1:null) selected @endif>Nam</option>
										<option value="2" @if(isset($personal)?$personal->gender==2:null) selected @endif>Nữ</option>
									</select>
								</div>
							</div>
						</div>
						<!--------------------------------------------------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Hôn nhân <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{ isset($personal)?$personal->marital_status:null }}" name="marital_status" class="form-control" placeholder="Tình trạng hôn nhân">
								</div>
								@if($errors->has('marital_status'))
								<p style="color:red"> {{ $errors->first('marital_status') }}</p>
								@endif
							</div>
						</div>
						<!--------------------------------------------------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Học vấn <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" value="{{$personal->education ?? null}}" name="education" class="form-control" placeholder="Trình độ học vấn">
								</div>
								@if($errors->has('education'))
									<p style="color:red"> {{ $errors->first('education') }}</p>
								@endif
							</div>
						</div>
						<!-------------------------------------------------------------------------------------------------------------------------------------->
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
