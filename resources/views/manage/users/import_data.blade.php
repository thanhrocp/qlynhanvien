@extends('manage.layout.master')
@section('title','Import data from file Excel')
@section('content')
<div class="right_col" role="main">
	<div class="">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-success">
					<div class="panel-heading text-right">
						<a href="" class="btn btn-info btn-xs"><i class="fa fa-home"> Home</i></a>
						<a href="javascript:void(0)" class="btn btn-primary btn-xs"><i class="fa fa-arrows-h"></i></a>
						<a class="btn btn-success btn-xs"><i class="fa fa-user"> Users </i></a>
					</div>
					<div class="panel-body">
						<h2>Import excel data User</h2>
						<hr>
						<form method="post" enctype="multipart/form-data" action="{{route('importUser')}}">
							@csrf
							<input type="file" id="real-file" name="ExcelUser" class="hidden" />
							<button type="button" id="custom-button">Chọn file</button>
							<span id="custom-text">Chưa chọn file.</span>
								@foreach($errors->all() as $errors)
								<p style="color:red"> {{ $errors }} </p>
								@endforeach
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-xs">Upload <i class="fa fa-upload"></i></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('css')
<style type="text/css">
	#custom-button {
		padding: 6px;
		color: white;
		background-color: #009578;
		border: 1px solid;
		border-radius: 5px;
		cursor: pointer;
	}

	#custom-button:hover {
		background-color: #00b28f;
	}

	#custom-text {
		margin-left: 10px;
		font-family: sans-serif;
		color: #aaa;
	}
</style>
@endsection
@section('script')
<script type="text/javascript">
	const realFileBtn = document.getElementById("real-file");
	const customBtn = document.getElementById("custom-button");
	const customTxt = document.getElementById("custom-text");

	customBtn.addEventListener("click", function() {
		realFileBtn.click();
	});

	realFileBtn.addEventListener("change", function() {
		if (realFileBtn.value) {
			customTxt.innerHTML = realFileBtn.value.match(
				/[\/\\]([\w\d\s\.\-\(\)]+)$/
				)[1];
		} else {
			customTxt.innerHTML = "No file chosen, yet.";
		}
	});

</script>
@endsection