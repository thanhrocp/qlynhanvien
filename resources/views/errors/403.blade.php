 @extends('admin.layout.master')

 @section('content')
 <!-- page content -->
 <div class="right_col" role="main">
 	<div class="">
 		<div class="row">
 			<div class="col-md-12">
 				<div class="col-middle">
 					<div class="text-center text-center">
 						<h1 class="error-number">403</h1>
 						<h2>{{$exception->getMessage()}}</h2>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>
 <!-- /page content -->
 @endsection
