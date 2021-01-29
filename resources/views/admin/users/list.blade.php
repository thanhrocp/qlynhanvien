@extends('admin.layout.master')
@section('title','Danh sách nhân viên')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>List User <small>(Danh sách tài khoản)</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <button class="btn btn-danger" onclick="window.location='{{ url('/user/new') }}'">
                <img src="{{asset('/master/build/icons/plus.svg')}}" width="13px" class="mr-5 mt--2"><a
                  class="text-white">Thêm mới</a>
              </button>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form method="post">
              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action table-bordered">
                  <thead>
                    <tr class="headings">
                      <th>
                        <button title="Reset password" class="btn btn-success btn-xs" type="submit">Reset</button>
                      </th>
                      <th class="column-title">Số thứ tự </th>
                      <th class="column-title">Tên tài khoản</th>
                      <th class="column-title">Email </th>
                      <th class="column-title">Quyền </th>
                      <th class="column-title">Cập nhật </th>
                      <th class="column-title" colspan="2" style="width: 5%"><span class="nobr">Thao tác</span></th>
                      <th class="bulk-actions" colspan="9">
                        <button type="submit" class="btn btn-info btn-xs">Reset</button>
                        <a class="antoo" style="color:#fff; font-weight:500;">Chọn ( <span class="action-cnt"> </span>
                          )</a>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($result as $key => $item)
                    <tr class="odd pointer">
                      <td class="a-center ">
                        <input type="checkbox" id="check-all" class="flat" name="resetPass[]" value="{{$item['email']}}">
                      </td>
                      <td>{{++$key + $result->perPage() * ($result->currentPage() - 1) }}</td>
                      <td>{{$item['name']}}</td>
                      <td>{{$item['email']}}</td>
                      <td>{{$item['permission']}}</td>
                      <td>
                        {{Carbon\Carbon::createFromTimestamp(strtotime($item['created_at']))->diffForHumans()}}
                      </td>
                      <td><a class="btn btn-info btn-xs" href="{{url('users/edit', $item['id'])}}"><i
                            class="fa fa-pencil"></i></a></td>
                      <td><a class="btn btn-danger btn-xs delete_users" data-id="{{$item['id']}}"><i
                            class="fa fa-close"></i></a></td>
                    </tr>
                    @endforeach
                    {{$result->links()}}
                  </tbody>
                </table>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
