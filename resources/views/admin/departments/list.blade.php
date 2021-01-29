@extends('admin.layout.master')
@section('title','Danh sách phòng')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="x_panel">
        <div class="x_title">
          <h2>Màn hình danh sách</h2>
          <ul class="nav navbar-right panel_toolbox">
            <button class="btn btn-danger" onclick="window.location='{{ url('/department/new') }}'">
              <img src="{{asset('/master/build/icons/plus.svg')}}" width="13px" class="mr-5 mt--2"><a
                class="text-white">Thêm mới</a>
            </button>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form method="POST" action="/department">
            <div class="row">
              <div class="col-md-1 col-sm-1 col-xs-1">
                <input type="submit" value="Submit" class="btn btn-success">
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <input type="text" class="form-control" name="search_record" placeholder="Search" />
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action table-bordered">
                <thead>
                  <tr class="headings">
                    <th class="column-title">No </th>
                    <th class="column-title">Tên phòng </th>
                    <th class="column-title">Số điện thoại </th>
                    <th class="column-title">Số nhân viên </th>
                    <th class="column-title">Ghi chú </th>
                    <th class="column-title">Người cập nhật</th>
                    <th class="column-title">Thời gian </th>
                    <th class="column-title" colspan="3" style="width: 5%"><span class="nobr">Thao tác</span></th>
                    <th class="bulk-actions" colspan="9">
                      <button type="submit" class="btn btn-success btn-xs">Xóa</button>
                      <a class="antoo" style="color:#fff;">Chọn ( <span class="action-cnt"> </span>)</a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($result as $key => $item)
                  <tr class="odd pointer">
                    <td>{{ ++$key + $result->perPage() * ($result->currentPage() - 1) }}</td>
                    <td>{{$item['department_name']}}</td>
                    <td>{{$item['department_phone']}}</td>
                    <td>{{$item['department_number_person']}}</td>
                    <td>{{$item['department_note']}}</td>
                    <td>{{$item['updated_by']}}</td>
                    <td>
                      {{Carbon\Carbon::createFromTimestamp(strtotime($item['created_at']))->diffForHumans()}}
                    </td>
                    <td>
                      <form method="POST" action="/department/detail" name="viewDetail{{$item['id']}}">
                        <input type="hidden" name="request_department_id" value="{{$item['id']}}" />
                        <a href="javascript:document.viewDetail{{$item['id']}}.submit();" class="btn btn-info btn-xs"><i
                            class="fa fa-pencil"></i></a>
                        {{CsrfTokenUtil::csrfToken()}}
                      </form>
                    </td>
                    <td><a class="btn btn-danger btn-xs delete_part" data-id="{{$item['id']}}"><i
                          class="fa fa-close"></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-between">
                <div class="select-record">
                  <select name="show_record" class="form-control">
                    @foreach(Lang::get('database.common.page_parts.page_row') as $key => $val)
                    <option value="{{$key}}" @if ((string)$show_record==(string)$key) selected @endif>
                      {{Lang::get('database.common.page_parts.page_row.' . $key)}}</option>
                    @endforeach
                  </select>
                </div>
                {{CsrfTokenUtil::csrfToken()}}
                @if ($result->lastPage() > 1)
                <div class="paginate">
                  <ul class="crumbs">
                    <li class="{{ ($result->currentPage() == 1) ? 'disabled-paginate' : '' }}">
                      <a href="{{ $result->url(1) }}">&laquo;</a>
                    </li>
                    @for ($i = 1; $i <= $result->lastPage(); $i++)
                      <?php
                      $halfTotalLinks = floor(7 / 2);
                      $from = $result->currentPage() - $halfTotalLinks;
                      $to = $result->currentPage() + $halfTotalLinks;
                      if ($result->currentPage() < $halfTotalLinks) {
                      $to += $halfTotalLinks - $result->currentPage();
                      }
                      if ($result->lastPage() - $result->currentPage() < $halfTotalLinks) {
                          $from -= $halfTotalLinks - ($result->lastPage() - $result->currentPage()) - 1;
                      }
                      ?>
                      @if ($from < $i && $i < $to) <li
                        class="{{ ($result->currentPage() == $i) ? ' active-paginate' : '' }}">
                        <a href="{{ $result->url($i) }}">{{ $i }}</a>
                        </li>
                        @endif
                        @endfor
                        <li class="{{ ($result->currentPage() == $result->lastPage()) ? 'disabled-paginate' : '' }}">
                          <a href="{{ $result->url($result->lastPage()) }}">&raquo;</a>
                        </li>
                  </ul>
                </div>
                @endif
              </div>
            </div>
            <form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
