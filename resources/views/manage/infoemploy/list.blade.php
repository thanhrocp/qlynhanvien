 @extends('manage.layout.master')
 @section('title','Thông tin nhân viên')
 @section('content')
 <div class="right_col" role="main">
 	<div class="">
 		<div class="clearfix"></div>
 		<div class="row">
 			@can('view-info')
 			<div class="col-md-12 col-sm-12 col-xs-12">
 				<div class="panel panel-success">
 					<div class="panel-heading text-right">
 						<a href="" class="btn btn-info btn-xs"><i class="fa fa-home"> Home</i></a>
 						<a href="javascript:void(0)" class="btn btn-primary btn-xs"><i class="fa fa-arrows-h"></i></a>
 						<a class="btn btn-success btn-xs"> Thông tin nhân viên </i></a>
 					</div>
 					<div class="panel-body">
 						<a href="{{route('export')}}" class="btn btn-success btn-xs">Excel <i class="fa fa-download"></i></a>
 					</div>
 				</div>
 				<div class="x_panel">
 					<div class="x_title">
 						<h2 class="btn btn-primary"> Thông tin nhân viên <i class="fa fa-question"></i></small></h2>
 						<div class="clearfix"></div>
 					</div>
 					<div class="x_content">
 						<table id="datatable-checkbox" class="table table-striped table-bordered table-hover">
 							<thead style="background-color: rgba(52,73,94,.94); color: white">
 								<tr>
 									<th>
 										No.
 									</th>
 									<th>Mã Nv</th>
 									<th>Họ tên</th>
 									<th>Bộ phận</th>
 									<th>Chức vụ</th>
 									<th>Ngày sinh</th>
 									<th>Email</th>
 									<th>Giới tính</th>
 									<th style="width: 8%">Thao tác</th>
 								</tr>
 							</thead>
 							<tbody>
 								@foreach($info as $no => $info)
 								<tr>
 									<td> {{ ++$no }} </td>
 									<td> {{ $info->work_code }} </td>
 									<td> {{ $info->full_name }} </td>
 									<td> {{ $info->depart_name }} </td>
 									<td> {{ $info->position }} </td>
 									<td> {{ $info->birth_date }} </td>
 									<td> {{ $info->work_email }} </td>
 									<td> {{ $info->sex }} </td>
 									<td> 
 										<a class="btn btn-success btn-xs" href="#exampleModalCenter{{$info->id}}" data-toggle="modal" title="Thông tin"><i class="fa fa-link"></i></a>
 									</td>
 								</tr>
 								<!-- Modal -->
 								<div class="modal fade" id="exampleModalCenter{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 									<div class="modal-dialog modal-dialog-centered" role="document">
 										<div class="modal-content">
 											<div class="modal-header" style="background-color: #333;color: white">
 												<h4 class="modal-title text-center" id="exampleModalLongTitle">Thông tin nhân viên</h4>
 												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 													<span aria-hidden="true">&times;</span>
 												</button>
 											</div>
 											<div class="modal-body">
 												<div class="row">
 													<div class="col-md-6 col-sm-6 col-xs-6">
 														<div class="form-group">
 															<label>Mã nhân viên</label>
 															<input type="text" value="{{isset($info)?$info->work_code:null}}" class="form-control">
 														</div>
 													</div>
 													<div class="col-md-6 col-sm-6 col-xs-6">
 														<div class="form-group">
 															<label>Mã thẻ</label>
 															<input type="text" value="<?php echo isset($info)?substr($info->work_code,6,4):null; ?>" class="form-control">
 														</div>
 													</div>
 													<div class="col-md-6 col-sm-6 col-xs-6">
 														<div class="form-group">
 															<label>Bộ phận</label>
 															<input type="text" value="{{isset($info)?$info->depart_name:null}}" class="form-control">
 														</div>
 													</div>
 													<div class="col-md-6 col-sm-6 col-xs-6">
 														<div class="form-group">
 															<label>Chức vụ</label>
 															<input type="text" value="{{isset($info)?$info->position:null}}" class="form-control">
 														</div>
 													</div>
 													<div class="col-md-6 col-sm-6 col-xs-6">
 														<div class="form-group">
 															<label>Họ tên</label>
 															<input type="text" value="{{isset($info)?$info->full_name:null}}" class="form-control">
 														</div>
 													</div>
 													<div class="col-md-6 col-sm-6 col-xs-6">
 														<div class="form-group">
 															<label>Email</label>
 															<input type="text" value="{{isset($info)?$info->work_email:null}}" class="form-control">
 														</div>
 													</div>
 													<div class="col-md-6 col-sm-6 col-xs-6">
 														<div class="form-group">
 															<label>Giới tính</label>
 															<input type="text" value="{{isset($info)?$info->sex:null}}" class="form-control">
 														</div>
 													</div>
 													<div class="col-md-6 col-sm-6 col-xs-6">
 														<div class="form-group">
 															<label>Số điện thoại</label>
 															<input type="text" value="{{isset($info)?$info->ct_phone:null}}" class="form-control">
 														</div>
 													</div>
 													<div class="col-md-6 col-sm-6 col-xs-6">
 														<div class="form-group">
 															<label>Quê quán</label>
 															<input type="text" value="{{isset($info)?$info->ct_city:null}}" class="form-control">
 														</div>
 													</div>
 													<div class="col-md-6 col-sm-6 col-xs-6">
 														<div class="form-group">
 															<label>Địa chỉ</label>
 															<input type="text" value="{{isset($info)?$info->address:null}}" class="form-control">
 														</div>
 													</div>
 												</div>
 											</div>
 											<div class="modal-footer" style="background-color: #333;color: white">
 												<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
 											</div>
 										</div>
 									</div>
 								</div>
 								@endforeach
 							</tbody>
 						</table>
 					</div>
 				</div>
 			</div>
 			@else
 			<h1>Bạn éo có quyền xem</h1>
 			@endcan
 		</div>
 	</div>
 </div>
 @endsection