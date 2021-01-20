@extends('admin.layout.master')
@section('title','Thêm mới phòng ban')
@section('content')
<div class="right_col" role="main">
 <div class="">
   <div class="row">
     <div class="x_panel">
       <div class="x_title">
         <h2>Bạn đã thêm mới thành công</h2>
         <ul class="nav navbar-right panel_toolbox">
           <button class="btn btn-danger">
             <a class="text-white" href="{{URL::to('/departments')}}">Danh sách</a>
           </button>
         </ul>
         <div class="clearfix"></div>
       </div>
     </div>
   </div>
 </div>
</div>
@endsection
