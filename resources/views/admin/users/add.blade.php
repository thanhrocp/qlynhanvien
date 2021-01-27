 @extends('admin.layout.master')
 @section('title','Thêm mới tài khoản')
 @section('content')
 <div class="right_col" role="main">
 	<div class="">
 		<div class="row">
 			<div class="col-md-12 col-sm-12 col-xs-12">
 				<div class="panel panel-success">
 					<div class="panel-heading text-right">
 						<a href="" class="btn btn-info btn-xs"><i class="fa fa-home"> Home</i></a>
 						<a href="javascript:void(0)" class="btn btn-primary btn-xs"><i class="fa fa-arrows-h"></i></a>
 						<a class="btn btn-success btn-xs"> User </i></a>
 					</div>
 				</div>
        <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
         <div class="x_panel">
          <div class="x_title">
           <h2>Create a new User <small>(Thêm mới tài khoản)</small></h2>
           <ul class="nav navbar-right panel_toolbox">
            <li><button type="submit" class="btn btn-success">Lưu</button></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
         <br />
         {!! csrf_field() !!}
            <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Quyền <span class="required">*</span>
             </label>
             <div class="col-md-6 col-sm-6 col-xs-12">

              <select class="form-control" name="role_id">

               <?php $role = DB::table('roles')->where('role_name', '!=', 'Administrator')->get() ?>

               @foreach($role as $rl)

               <option value="{{$rl->id}}">{{ $rl->role_name }}</option>

               @endforeach

             </select>

           </div>
           @if($errors->has('depart_name'))
           <p style="color:red">{{$errors->first('depart_name')}}</p>
           @endif
         </div>
         <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên tài khoản <span class="required">*</span>
           </label>
           <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
            <input type="text" name="name" class="form-control has-feedback-left" placeholder="Nhập tên">
            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
          </div>
          @if($errors->has('name'))
          <p style="color:red">{{$errors->first('name')}}</p>
          @endif
        </div>
        <div class="form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
         </label>
         <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
          <input type="email" name="email" class="form-control has-feedback-left" placeholder="Nhập email">
          <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
        </div>
        @if($errors->has('email'))
        <p style="color:red"> {{ $errors->first('email')}}</p>
        @endif
      </div>
      <div class="form-group">
       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mật khẩu <span class="required">*</span>
       </label>
       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
        <input type="password" name="password" class="form-control has-feedback-left" placeholder="Nhập mật khẩu">
        <span class="fa fa-unlock form-control-feedback left" aria-hidden="true"></span>
      </div>
      @if($errors->has('password'))
      <p style="color:red"> {{ $errors->first('password')}}</p>
      @endif
    </div>
    <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nhập lại mật khẩu <span class="required">*</span>
     </label>
     <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
      <input type="password" name="passwordagain" class="form-control has-feedback-left" placeholder="Nhập lại mật khẩu">
      <span class="fa fa-unlock form-control-feedback left" aria-hidden="true"></span>
    </div>
    @if($errors->has('passwordagain'))
    <p style="color:red"> {{ $errors->first('passwordagain')}}</p>
    @endif
  </div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection
