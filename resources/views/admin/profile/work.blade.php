@extends('admin.layout.master')
@section('title','Thông tin công việc')
@section('content')
<div class="right_col" role="main">

	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-12">

			<div class="panel panel-success">

				<div class="panel-heading text-right">

					<a href="{{URL::to('/index')}}" class="btn btn-info btn-xs"><i class="fa fa-home"> Home</i></a>

					<a href="javascript:void(0)" class="btn btn-primary btn-xs"><i class="fa fa-arrows-h"></i></a>

					<a class="btn btn-success btn-xs"> Work </i></a>

				</div>

			</div>

			<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST">

				{!! csrf_field() !!}

				<div class="x_panel">

					<div class="x_title">

						<ul class="nav navbar-left panel_toolbox">

							<li><span style="font-size: 20px;color: orange">Thông tin công việc <i class="fa fa-question"></i></span></li>
						</ul>

						<ul class="nav navbar-right panel_toolbox">

							<li><button class="btn btn-success" type="submit" disabled="">Lưu</button></a></li>

						</ul>

						<div class="clearfix"></div>

					</div>

					<div class="x_content">
						<!-------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">

							<div class="form-group">

								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mã nhân viên <span class="required">*</span></label>

								<div class="col-md-6 col-sm-6 col-xs-12">

									<input type="email" value="{{isset($work)?$work->work_code:null}}" readonly name="work_code" class="form-control" placeholder="Nhập chứng minh thư nhân dân">

								</div>

							</div>

						</div>
						<!-------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">

							<div class="form-group">

								<label class="control-label col-md-3 col-sm-3 col-xs-12">Tên ngân hàng <span class="required">*</span></label>

								<div class="col-md-6 col-sm-6 col-xs-12">

									<input type="text" value="{{isset($work)?$work->bank_name:null}}" disabled="" name="bank_name" class="form-control" placeholder="Tên ngân hàng">

								</div>

								@if($errors->has('bank_name'))

								<p style="color:red"> {{ $errors->first('bank_name') }}</p>

								@endif

							</div>

						</div>
						<!-------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">

							<div class="form-group">

								<label class="control-label col-md-3 col-sm-3 col-xs-12">Mã thẻ <span class="required">*</span></label>

								<div class="col-md-6 col-sm-6 col-xs-12">

									<input type="email" value="<?php echo isset($work)?substr($work->work_code,6,4):null; ?>" readonly name="work_code" class="form-control" placeholder="Nhập chứng minh thư nhân dân">

								</div>

							</div>

						</div>
						<!-------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">

							<div class="form-group">

								<label class="control-label col-md-3 col-sm-3 col-xs-12">Tài khoản NH <span class="required">*</span></label>

								<div class="col-md-6 col-sm-6 col-xs-12">

									<input type="text" required="required" disabled="" value="{{isset($work)?$work->bank_account:null}}" class="form-control" name="bank_account" placeholder="Nhập tài khoản ngân hàng">

								</div>

								@if($errors->has('bank_account'))

								<p style="color:red">{{$errors->first('bank_account')}}</p>

								@endif

							</div>

						</div>
						<!---------------------------------------------------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">

							<div class="form-group">

								<label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày gia nhập <span class="required">*</span></label>

								<div class="col-md-6 col-sm-6 col-xs-12">

									<input type="date" value="{{isset($work)?$work->joining_date:null}}" disabled="" name="joining_date" class="form-control has-feedback-left">
									<span class="fa fa-calendar-check-o form-control-feedback left" aria-hidden="true"></span>

								</div>

								@if($errors->has('joining_date'))

								<p style="color:red"> {{ $errors->first('joining_date') }}</p>

								@endif

							</div>

						</div>
						<!-------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">

							<div class="form-group">

								<label class="control-label col-md-3 col-sm-3 col-xs-12">Loại hợp đồng <span class="required">*</span></label>

								<div class="col-md-6 col-sm-6 col-xs-12">

									<select class="form-control" disabled="">

										<?php $contract = DB::table('contract_type')->get(); ?>

										@foreach($contract as $ct)

										<option value="{{$ct->id}}" @if($ct->id == $work->contract_type) selected @endif>{{$ct->name}}</option>

										@endforeach

									</select>

								</div>

								@if($errors->has('work_email'))

								<p style="color:red"> {{ $errors->first('work_email') }}</p>

								@endif

							</div>

						</div>
						<!------------------------------------------------------------------------------------------------------------------------------------------>
						<div class="col-md-6 col-sm-6 col-xs-6">

							<div class="form-group">

								<label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày thử việc <span class="required">*</span></label>

								<div class="col-md-6 col-sm-6 col-xs-12">

									<input type="date" value="{{isset($work)?$work->probationary_day:null}}" disabled="" name="probationary_day" class="form-control has-feedback-left">

									<span class="fa fa-calendar-check-o form-control-feedback left" aria-hidden="true"></span>

								</div>

								@if($errors->has('probationary_day'))

								<p style="color:red"> {{ $errors->first('probationary_day') }}</p>

								@endif

							</div>

						</div>
						<!-------------------------------------------------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">

							<div class="form-group">

								<label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày nghỉ việc <span class="required">*</span></label>

								<div class="col-md-6 col-sm-6 col-xs-12">

									<input type="date" value="{{isset($work)?$work->day_off:null}}" disabled="" name="day_off" class="form-control has-feedback-left">

									<span class="fa fa-calendar-check-o form-control-feedback left" aria-hidden="true"></span>

								</div>

								@if($errors->has('day_off'))

								<p style="color:red"> {{ $errors->first('day_off')}}</p>

								@endif
							</div>

						</div>
						<!-------------------------------------------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">

							<div class="form-group">

								<label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>

								<div class="col-md-6 col-sm-6 col-xs-12">

									<input type="email" value="{{isset($work)?$work->work_email:null}}" readonly name="work_email" class="form-control">

								</div>

							</div>
						</div>
						<!-------------------------------------------------------------------------------------------------------------------------------------->
						<div class="col-md-6 col-sm-6 col-xs-6">

							<div class="form-group">

								<label class="control-label col-md-3 col-sm-3 col-xs-12">Lý do nghỉ <span class="required">*</span></label>

								<div class="col-md-6 col-sm-6 col-xs-12">

									<input type="text" value="{{isset($work)?$work->reason_leave:null}}" disabled="" name="reason_leave" class="form-control" placeholder="Lý do">

								</div>

								@if($errors->has('reason_leave'))

								<p style="color:red"> {{ $errors->first('reason_leave') }}</p>

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
