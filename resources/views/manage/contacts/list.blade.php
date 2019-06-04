 @extends('manage.layout.master')
 @section('title','Danh sách liên hệ')
 @section('content')
 <!-- page content -->
 <div class="right_col" role="main">

 	<div class="">

 		<div class="page-title">

 			<div class="row">

 				<div class="col-md-12">

 					<div class="panel panel-success">

 						<div class="panel-heading text-right">

 							<a href="" class="btn btn-info btn-xs"><i class="fa fa-home"> Home</i></a>

 							<a href="javascript:void(0)" class="btn btn-primary btn-xs"><i class="fa fa-arrows-h"></i></a>

 							<a class="btn btn-success btn-xs"> Contacts </i></a>

 						</div>

 						<div class="panel-body"><h3>Contacts</h3></div>

 					</div>

 				</div>

 			</div>

 		</div>

 		<div class="clearfix"></div>

 		<div class="row">

 			<div class="col-md-12">

 				<div class="x_panel">

 					<div class="x_content">

 						<div class="row">

 							<div class="col-md-12 col-sm-12 col-xs-12 text-center">

 								<ul class="pagination pagination-split">

 								@if($info->currentPage() != 1)

									<li><a href="{!! str_replace('/?','?',$info->url($info->currentPage() -1 )) !!}">&laquo;</a></li>

								@endif

								@for($i=1 ; $i<=$info->lastPage() ; $i=$i+1)

 									<li><a href="{!! $info->url($i) !!}" class="{!! $info->currentPage() == $i ? 'active' : '' !!}">{{ $i }}</a></li>

								@endfor
									
								@if($info->currentPage() != $info->lastPage())

									<li><a href="{!! str_replace('/?','?',$info->url($info->currentPage() + 1)) !!}">&raquo;</a></li>

								@endif

 								</ul>

 							</div>

 							<div class="clearfix"></div>

 							@foreach($info as $info)

 							<div class="col-md-4 col-sm-4 col-xs-12 profile_details">

 								<div class="well profile_view">

 									<div class="col-sm-12">

 										<h4 class="brief"><i>{{ $info->depart_name }}</i></h4>

 										<div class="left col-xs-/">

 											<h2>
 												{{ $info->full_name }}
 											</h2>
 											
 											<p>
 												<i class="fa fa-user"></i> {{$info->position}}
 											</p>
 											
 											<p>
 												<i class="fa fa-envelope-o"></i><a href="mailto:{{$info->work_email}}"> {{$info->work_email}}</a>
 											</p>
 										
 											<p>
 												<i class="fa fa-skype"></i> {{ $info->ct_skype }}
 											</p>
								
 											<ul class="list-unstyled">

 												<li>
 													<i class="fa fa-birthday-cake"></i>
 													<?php echo Carbon\Carbon::create($info->birth_date)->toFormattedDateString() ?> 
 												</li>
 												

 												<li><i class="fa fa-phone"></i> {{ $info->ct_phone }}</li><br/>

 											</ul>

 										</div>

 										<div class="right col-xs-5 text-center">

 											<img src="upload/avatar/{{$info->avatar}}" alt="" class="img-circle img-responsive">

 										</div>

 									</div>

 									<div class="col-xs-12 bottom text-center">

 										<div class="col-xs-12 col-sm-6 emphasis">

 											<p class="ratings">

 												<a>4.0</a>

 												<a href="#"><span class="fa fa-star"></span></a>

 												<a href="#"><span class="fa fa-star"></span></a>

 												<a href="#"><span class="fa fa-star"></span></a>

 												<a href="#"><span class="fa fa-star"></span></a>

 												<a href="#"><span class="fa fa-star-o"></span></a>

 											</p>

 										</div>

 										<div class="col-xs-12 col-sm-6 emphasis">

 											<button type="button" class="btn btn-success btn-xs">
 												<i class="fa fa-user"></i><i class="fa fa-comments-o"></i>
 											</button>

 											<button type="button" class="btn btn-primary btn-xs">
 												<i class="fa fa-user"> </i> View Profile
 											</button>

 										</div>

 									</div>

 								</div>

 							</div>

 							@endforeach

 						</div>

 					</div>

 				</div>

 			</div>

 		</div>

 	</div>

 </div>

 <!-- /page content -->
 @endsection