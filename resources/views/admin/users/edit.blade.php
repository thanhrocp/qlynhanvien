   @extends('admin.layout.master')
   @section('title','Sửa tài khoản')
   @section('content')
   <div class="right_col" role="main">
   	<div class="">
   		<div class="row">
   			<div class="col-md-12 col-sm-12 col-xs-12">
   				<div class="panel panel-success">
   					<div class="panel-heading text-right">
   						<a href="" class="btn btn-info"><i class="fa fa-home"> Home</i></a>
   						<a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-arrows-h"></i></a>
   						<a class="btn btn-success"> User </i></a>
   					</div>
   				</div>
          <form class="form-horizontal form-label-left" method="POST">
           <div class="x_panel">
            <div class="x_title">
             <h2>Update <small>(Cập nhật tài khoản)</small></h2>
             <ul class="nav navbar-right panel_toolbox">
              <li><button type="submit" class="btn btn-success">Lưu</button></li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
           <br />

           {!! csrf_field() !!}

           <div class="form-group">

             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Quyền <span class="required">*</span></label>

             <div class="col-md-6 col-sm-6 col-xs-12">

              <select class="form-control" name="role_id">

               <?php $role = DB::table('roles')->get() ?>

               @foreach($role as $rl)

               <option value="{{$rl->id}}" @if($edit_user->role_id == $rl->id) selected @endif>{{ $rl->role_name }}</option>

               @endforeach

             </select>

           </div>
           @if($errors->has('department_name'))

           <p style="color:red">{{$errors->first('department_name')}}</p>

           @endif

         </div>

         <div class="form-group">

           <label class="control-label col-md-3 col-sm-3 col-xs-12">Họ tên <span class="required">*</span></label>

           <div class="col-md-6 col-sm-6 col-xs-12">

            <input type="text" value="{{isset($edit_user)?$edit_user->name:null}}" required="required" class="form-control" name="name" placeholder="Nhập tên">

          </div>

          @if($errors->has('name'))

          <p style="color:red">{{$errors->first('name')}}</p>

          @endif

        </div>

        <div class="form-group">

         <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>

         <div class="col-md-6 col-sm-6 col-xs-12">

          <input value="{{isset($edit_user)?$edit_user->email:null}}" readonly="" class="form-control">

        </div>

        @if($errors->has('email'))
        <p style="color:red"> {{ $errors->first('email')}}</p>
        @endif
      </div>
        {{--     <div class="form-group">
            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mật khẩu <span class="required">*</span>
            	</label>
            	<div class="col-md-6 col-sm-6 col-xs-12">
            		<input type="password" value="{{isset($edit_user)?$edit_user->password:null}}" name="password" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nhập mật khẩu">
            	</div>
            	@if($errors->has('password'))
            	<p style="color:red"> {{ $errors->first('password')}}</p>
            	@endif
            </div>
            <div class="form-group">
            	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nhập lại mật khẩu <span class="required">*</span>
            	</label>
            	<div class="col-md-6 col-sm-6 col-xs-12">
            		<input type="password" value="{{isset($edit_user)?$edit_user->password:null}}" name="passwordagain" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nhập lại mật khẩu">
            	</div>
            	@if($errors->has('passwordagain'))
            	<p style="color:red"> {{ $errors->first('passwordagain')}}</p>
            	@endif
            </div> --}}
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
