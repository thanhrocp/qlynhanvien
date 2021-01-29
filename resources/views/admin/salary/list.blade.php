@extends('admin.layout.master')
@section('title','Danh sách lương')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-success">
					<div class="panel-heading text-right">
						<a href="" class="btn btn-info btn-xs"><i class="fa fa-home"> Home</i></a>
						<a href="javascript:void(0)" class="btn btn-primary btn-xs"><i class="fa fa-arrows-h"></i></a>
						<a class="btn btn-success btn-xs"> Salary </i></a>
					</div>
				</div>
				<div class="x_panel">
					<div class="x_title">
						<h2>Danh sách lương nhân viên <i class="fa fa-question"></i></small></h2>
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
									<th style="width: 9%">Thao tác</th>
								</tr>
							</thead>
							<tbody>
								@foreach($info as $no => $info)
								<tr>
									<td> {{ ++$no }} </td>
									<td> {{ $info->work_code }} </td>
									<td> {{ $info->full_name }} </td>
									<td> {{ $info->department_name }} </td>
									<td> {{ $info->position }} </td>
									<td> {{ $info->birth_date }} </td>
									<td> {{ $info->work_email }} </td>
									<td> {{ $info->sex }} </td>
									<td>
										<a class="btn btn-warning btn-xs" href="#exampleModalCenter{{$info->id}}" data-toggle="modal" title="Thông tin"><i class="fa fa-search"></i></a>
										<a title="Thêm lương" class="btn btn-success btn-xs modal-salary" data-id="{{$info->id}}"><i class="fa fa-plus"></i></a>
										<a title="Chỉnh sửa" class="btn btn-info btn-xs salary-modal" data-id="{{$info->ids}}" data-numberofday="{{$info->numberofday}}" data-numberofot="{{$info->numberofot}}" data-lateday="{{$info->lateday}}" data-salary="{{$info->salary}}" data-allowance="{{$info->allowance}}" title="Thông tin"><i class="fa fa-pencil"></i></a>
									</td>
								</tr>
								<!-- Modal -->
								<div class="modal fade" id="exampleModalCenter{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header" style="background-color: #333;color: white">
												<h4 class="modal-title text-center" id="exampleModalLongTitle">Thông tin lương nhân viên</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6 col-sm-6 col-xs-6">
														<div class="form-group">
															<label>Mã nhân viên</label>
															<input type="text" value="{{isset($info)?$info->work_code:null}}" readonly class="form-control">
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<div class="form-group">
															<label>Mã thẻ</label>
															<input type="text" value="<?php echo isset($info)?substr($info->work_code,6,4):null; ?>" readonly class="form-control">
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<div class="form-group">
															<label>Bộ phận</label>
															<input type="text" value="{{isset($info)?$info->department_name:null}}" readonly class="form-control">
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<div class="form-group">
															<label>Chức vụ</label>
															<input type="text" value="{{isset($info)?$info->position:null}}" readonly class="form-control">
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<div class="form-group">
															<label>Họ tên</label>
															<input type="text" value="{{isset($info)?$info->full_name:null}}" readonly class="form-control">
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<div class="form-group">
															<label>Email</label>
															<input type="text" value="{{isset($info)?$info->work_email:null}}" readonly class="form-control">
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<div class="form-group">
															<label>Giới tính</label>
															<input type="text" value="{{isset($info)?$info->sex:null}}" readonly class="form-control">
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<div class="form-group">
															<label>Số điện thoại</label>
															<input type="text" value="{{isset($info)?$info->ct_phone:null}}" readonly class="form-control">
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<div class="form-group">
															<label>Số ngày làm</label>
															<input type="text" value="{{isset($info)?$info->numberofday:null}} ngày" readonly class="form-control">
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<div class="form-group">
															<label>Số giờ OT</label>
															<input type="text" value="{{isset($info)?$info->numberofot:null}} giờ" readonly class="form-control">
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<div class="form-group">
															<label>Số ngày đi muộn</label>
															<input type="text" value="{{isset($info)?$info->lateday:null}} ngày" readonly class="form-control">
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<div class="form-group">
															<label>Lương cơ bản</label>
															<input type="text" value="<?php echo isset($info)?number_format($info->salary,'0','.','.'):null ?> vnđ" readonly class="form-control">
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<div class="form-group">
															<label>Phụ cấp</label>
															<input type="text" value="<?php echo isset($info)?number_format($info->allowance,'0','.','.'):null ?> vnđ" readonly class="form-control">
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<div class="form-group">
															<label>Tổng tiền còn lại</label>
															<?php
																$total = $info->salary+($info->allowance)-($info->lateday*20000)+($info->numberofot*20000)*1.5;
															?>
															<input type="text" value="<?php echo isset($info)?number_format($total,'0','.','.'):null ?> vnđ" readonly class="form-control">
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
		</div>
	</div>
</div>
<!-- Thêm mới -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #333;color: white">
				<h4 class="modal-title text-center" id="exampleModalLongTitle">Thêm lương nhân viên</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form-salary" method="POST" action="{{route('salary.store')}}">
				@csrf
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<p class="alert alert-danger hidden" id="message-salary"></p>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>Số ngày làm</label>
									<input type="number" id="numberofday" class="form-control" name="numberofday" placeholder="Số ngày làm">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>Số giờ OT</label>
									<input type="number" id="numberofot" class="form-control" name="numberofot" placeholder="Số giờ làm thêm">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>Số ngày đi muộn</label>
									<input type="number" id="lateday" class="form-control" name="lateday" placeholder="Số ngày đi muộn">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>Lương cơ bản</label>
									<input type="number" id="salary" class="form-control" name="salary" placeholder="Lương cơ bản">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>Phụ cấp</label>
									<input type="number" id="allowance" class="form-control" name="allowance" placeholder="Phụ cấp">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group hidden">
									<label>ID Nhân viên</label>
									<input type="text" value="" id="employ_id" name="employ_id" disabled="" class="form-control">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer" style="background-color: #333;color: white">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
					<button type="button" class="btn btn-primary" id="save-salary">Thêm</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Chỉnh sửa -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #333;color: white">
				<h4 class="modal-title text-center" id="exampleModalLongTitle">Chỉnh sửa lương nhân viên</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{url('salary')}}">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<p class="alert alert-danger hidden" id="message-salary1"></p>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>Số ngày làm</label>
									<input type="number" id="up_numberofday" class="form-control" name="up_numberofday" placeholder="Số ngày làm">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>Số giờ OT</label>
									<input type="number" id="up_numberofot" class="form-control" name="up_numberofot" placeholder="Số giờ làm thêm">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>Số ngày đi muộn</label>
									<input type="number" id="up_lateday" class="form-control" name="up_lateday" placeholder="Số ngày đi muộn">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>Lương cơ bản</label>
									<input type="number" id="up_salary" class="form-control" name="up_salary" placeholder="Lương cơ bản">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>Phụ cấp</label>
									<input type="number" id="up_allowance" class="form-control" name="up_allowance" placeholder="Phụ cấp">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group hidden">
									<label>ID Nhân viên</label>
									<input type="text" value="" id="up_id" name="up_id" disabled="" class="form-control">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer" style="background-color: #333;color: white">
					<button type="button" class="btn btn-primary" id="edit-salary">Lưu</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /page content -->
@endsection
