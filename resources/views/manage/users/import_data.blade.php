@extends('manage.layout.master')
@section('title','Import data from file Excel')
@section('content')
<div class="right_col" role="main">
	<div class="">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-success">
					<div class="panel-heading">
						@if(session('message'))<p class="alert alert-danger">{{ session('message') }}</p>@endif
					</div>
					<div class="panel-body">
						<h2>Import excel data User</h2>
						<hr>
						<form method="post" enctype="multipart/form-data" action="{{route('importUser')}}">
							@csrf
							<input type="file" id="real-file" name="ExcelUser" class="hidden" />
							<button type="button" id="custom-button" class="btn btn-info">Chọn file</button>
							<span id="custom-text">Chưa chọn file.</span>
								@foreach($errors->all() as $errors)
								<p style="color:red"> {{ $errors }} </p>
								@endforeach
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Upload <i class="fa fa-upload"></i></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection