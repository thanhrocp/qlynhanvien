 @extends('admin.layout.master')
 @section('title','Cập nhật')
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
 						<h2>Update Employee Work <small>(Thêm mới / cập nhật thông tin công việc)</small></h2>
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
               <!---========================================================================================================================================-->
               <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã nhân viên <span class="required">*</span></label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="text" value="{{isset($info)?$info->work_code:old('work_code')}}" class="form-control col-md-7 col-xs-12" name="work_code" disabled="">

                </div>

                @if($errors->has('work_code'))

                <p style="color:red">{{$errors->first('work_code')}}</p>

                @endif

              </div>
              <!---========================================================================================================================================-->
              <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="email" required="required" value="{{isset($info)?$info->work_email:old('work_email')}}" class="form-control col-md-7 col-xs-12" name="work_email" placeholder="Nhập email">

                </div>

                @if($errors->has('work_email'))

                <p style="color:red">{{$errors->first('work_email')}}</p>

                @endif

              </div>
              <!---========================================================================================================================================-->
              <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ngày gia nhập</label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="date" class="form-control has-feedback-left" value="{{isset($info)?$info->joining_date:old('joining_date')}}" name="joining_date">

                  <span class="fa fa-calendar-check-o form-control-feedback left" aria-hidden="true"></span>

                </div>

                @if($errors->has('joining_date'))

                <p style="color:red"> {{ $errors->first('joining_date') }}</p>

                @endif

              </div>
              <!---========================================================================================================================================-->
              <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày thử việc <span class="required">*</span></label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="date" required="required" value="{{isset($info)?$info->probationary_day:old('probationary_day')}}" class="form-control has-feedback-left" name="probationary_day" placeholder="Nhập facebook của bạn">

                  <span class="fa fa-calendar-check-o form-control-feedback left" aria-hidden="true"></span>

                </div>

                @if($errors->has('probationary_day'))

                <p style="color:red">{{$errors->first('probationary_day')}}</p>

                @endif

              </div>
              <!---========================================================================================================================================-->
              <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12">Loại hợp đồng <span class="required">*</span></label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                  <select class="form-control" name="contract_type" data-live-search="true">

                    <?php $contract = DB::table('contract_type')->get()  ?>

                    @foreach( $contract as $ct )

                    <option value="{{$ct->id}}" @if( $ct->id == (isset($info)?$info->contract_type:null)) selected @endif {{ old('contract_type')==$ct->id?'selected':'' }}>{{$ct->name}}</option>

                    @endforeach

                  </select>

                </div>

              </div>
              <!---========================================================================================================================================-->
              <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tài khoản ngân hàng</label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="text" class="form-control" value="{{isset($info)?$info->bank_account:old('bank_account')}}" name="bank_account" placeholder="Tài khoản ngân hàng">

                </div>

                @if($errors->has('bank_account'))

                <p style="color:red"> {{ $errors->first('bank_account') }}</p>

                @endif

              </div>
              <!---========================================================================================================================================-->
              <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên ngân hàng</label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="text" class="form-control" value="{{isset($info)?$info->bank_name:old('bank_name')}}" name="bank_name" placeholder="Nhập tên ngân hàng">

                </div>

                @if($errors->has('bank_name'))

                <p style="color:red"> {{ $errors->first('bank_name') }}</p>

                @endif

              </div>
              <!---========================================================================================================================================-->
              <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày nghỉ việc</label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="date" class="form-control has-feedback-left" value="{{isset($info)?$info->day_off:old('day_off')}}" name="day_off" placeholder="Ngày nghỉ">

                  <span class="fa fa-calendar-check-o form-control-feedback left" aria-hidden="true"></span>

                </div>

                @if($errors->has('day_off'))

                <p style="color:red"> {{ $errors->first('day_off') }}</p>

                @endif

              </div>
              <!---========================================================================================================================================-->
              <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12">Lý do nghỉ</label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                  <textarea type="text" class="form-control" name="reason_leave" placeholder="Lý do">{{isset($info)?$info->reason_leave:old('reason_leave')}}</textarea>

                </div>

                @if($errors->has('reason_leave'))

                <p style="color:red"> {{ $errors->first('reason_leave') }}</p>

                @endif

              </div>
              <!---=====================================================Button=============================================================-->
              <div class="form-group">

               <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                <button type="submit" class="btn btn-success">Lưu</button>

                <button type="reset" class="btn btn-danger">Hủy</button>

              </div>

            </div>

          </form>
          <!---=====================================================Form=============================================================-->
        </div>

      </div>

    </div>

  </div>

</div>
@endsection
