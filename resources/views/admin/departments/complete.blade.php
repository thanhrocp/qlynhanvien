@extends('admin.layout.master')
@section('title','Màn hình xác nhận')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="x_panel">
        <div class="x_title">
          <h2>Màn hình hoàn thành</h2>
          <ul class="nav navbar-right panel_toolbox">
            <button class="btn btn-danger" onclick="window.location='{{url('/department')}}'">
              <a class="text-white">Danh sách</a>
            </button>
          </ul>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
