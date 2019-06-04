 @extends('manage.layout.master')
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
 						<h2>Update Employee Contact <small>(Thêm mới / cập nhật thông tin liên hệ)</small></h2>
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
                
                <label class="control-label col-md-3 col-sm-3 col-xs-12">ĐT di động <span class="required">*</span></label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="number" value="{{isset($info)?$info->ct_phone:old('ct_phone')}}" class="form-control col-md-7 col-xs-12" name="ct_phone" placeholder="Nhập số điện thoại">

                </div>

                @if($errors->has('ct_phone'))

                <p style="color:red">{{$errors->first('ct_phone')}}</p>

                @endif

              </div>
              <!---========================================================================================================================================-->
              <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email cá nhân <span class="required">*</span></label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="text" value="{{isset($info)?$info->ct_email:old('ct_email')}}" class="form-control col-md-7 col-xs-12" name="ct_email" placeholder="Nhập email của bạn">

                </div>

                @if($errors->has('ct_email'))

                <p style="color:red">{{$errors->first('ct_email')}}</p>

                @endif

              </div>
              <!---========================================================================================================================================-->
              <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12">Facebook cá nhân <span class="required">*</span></label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="text" value="{{isset($info)?$info->ct_facebook:old('ct_facebook')}}" class="form-control col-md-7 col-xs-12" name="ct_facebook" placeholder="Nhập facebook của bạn">

                </div>

                @if($errors->has('ct_facebook'))

                <p style="color:red">{{$errors->first('ct_facebook')}}</p>

                @endif

              </div>
              <!---========================================================================================================================================-->
              <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Liên hệ khác</label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="text" class="form-control" value="{{isset($info)?$info->ct_other:old('ct_other')}}" name="ct_other" placeholder="Skype - Instagram - Twiter - Orther">

                </div> 

                @if($errors->has('ct_other'))

                <p style="color:red"> {{ $errors->first('ct_other') }}</p>   

                @endif 

              </div>
              <!---========================================================================================================================================-->
              <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12">Quốc tịch <span class="required">*</span></label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                  <select class="form-control selectpicker" name="ct_nationality" data-live-search="true" data-style="btn-success">

                    <?php $national = DB::table('country')->get()  ?>

                    @foreach( $national as $nl )

                      <option value="{{$nl->id}}" @if( $nl->id == (isset($info)?$info->ct_nationality:null)) selected @endif {{ old('ct_nationality')==$nl->id?'selected':'' }}>{{$nl->name}}</option>

                    @endforeach

                  </select>

                </div>

              </div>
              <!---========================================================================================================================================-->
              <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tỉnh - Thành phố</label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="text" class="form-control" value="{{isset($info)?$info->ct_city:old('ct_city')}}" name="ct_city" placeholder="Nhập tỉnh - thành phố">

                </div> 

                @if($errors->has('ct_city'))

                <p style="color:red"> {{ $errors->first('ct_city') }}</p> 

                @endif 

              </div>
              <!---========================================================================================================================================-->
              <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12">Quận huyện (Thành phố)</label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="text" class="form-control" value="{{isset($info)?$info->ct_town:old('ct_town')}}" name="ct_town" placeholder="Nhập quận huyện (Thành phố)">

                </div> 

                @if($errors->has('ct_town'))

                <p style="color:red"> {{ $errors->first('ct_town') }}</p>    

                @endif 

              </div>
              <!---========================================================================================================================================-->
              <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12">Phường xã, thị trấn</label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="text" class="form-control" value="{{isset($info)?$info->ct_village:old('ct_village')}}" name="ct_village" placeholder="Nhập phường xã">

                </div> 

                @if($errors->has('ct_village'))

                <p style="color:red"> {{ $errors->first('ct_village') }}</p>  

                @endif 

              </div>
              <!---========================================================================================================================================-->
              <div class="form-group">

                <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ hiện tại</label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                  <input type="text" class="form-control" value="{{isset($info)?$info->ct_address:old('ct_address')}}" name="ct_address" placeholder="Nhập địa chỉ">

                </div> 

                @if($errors->has('ct_address'))

                <p style="color:red"> {{ $errors->first('ct_address') }}</p> 

                @endif 

              </div>
              <!---========================================================================================================================================-->
              <div class="form-group">

               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tên người liên hệ</label>

               <div class="col-md-6 col-sm-6 col-xs-12">

                <input type="text" name="ct_name_fl" value="{{isset($info)?$info->ct_name_fl:old('ct_name_fl')}}" class="form-control col-md-7 col-xs-12" placeholder="Nơi báo tin">

              </div>

              @if($errors->has('ct_name_fl'))

              <p style="color:red"> {{ $errors->first('ct_name_fl') }}</p>  

              @endif

            </div>
            <!---========================================================================================================================================-->
            <div class="form-group">

              <label class="control-label col-md-3 col-sm-3 col-xs-12">Quan hệ <span class="required">*</span></label>

              <div class="col-md-6 col-sm-6 col-xs-12">

                <select class="form-control selectpicker" name="ct_rlts_fl" data-live-search="true" data-style="btn-info">

                  <?php $rlt_family = DB::table('relationship_family')->get() ?>

                  @foreach($rlt_family as $rf)

                    <option value="{{$rf->id}}" @if( $rf->id == (isset($info)?$info->ct_rlts_fl:null)) selected @endif {{ old('ct_rlts_fl')==$rf->id?'selected':'' }}>{{$rf->rlts_name}}</option>

                  @endforeach

                </select>

              </div>

            </div>
            <!---========================================================================================================================================-->
            <div class="form-group">

             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Số điện thoại</label>

             <div class="col-md-6 col-sm-6 col-xs-12">

              <input type="number" name="ct_phone_fl" value="{{isset($info)?$info->ct_phone_fl:old('ct_phone_fl')}}" class="form-control col-md-7 col-xs-12" placeholder="Nhập số điện thoại">

            </div>

            @if($errors->has('ct_phone_fl'))

              <p style="color:red"> {{ $errors->first('ct_phone_fl') }}</p>   

            @endif

          </div>
          <!---========================================================================================================================================-->
          <div class="form-group">

            <label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ báo tin gấp</label>

            <div class="col-md-6 col-sm-6 col-xs-12">

              <input type="text" name="ct_address_fl" value="{{isset($info)?$info->ct_address_fl:old('ct_address_fl')}}" class="form-control col-md-7 col-xs-12" placeholder="Địa chỉ">

            </div>
            @if($errors->has('ct_address_fl'))

            <p style="color:red"> {{ $errors->first('ct_address_fl') }}</p> 

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