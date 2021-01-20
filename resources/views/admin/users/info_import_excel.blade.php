 @extends('admin.layout.master')
 @section('title','Danh sách nhân viên')
 @section('content')
 <div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
      <form method="post">
        {!! csrf_field() !!}
        <div class="x_panel">
          @foreach($errors->all() as $errors)
            <p class="alert alert-danger">{{ $errors }}</p>
          @endforeach
          <div class="x_title">
            <h2>File Upload</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action table-bordered">
                <thead>
                  <tr class="headings">
                    <th class="column-title">Số thứ tự </th>
                    <th class="column-title">Tên tài khoản</th>
                    <th class="column-title">Email </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users[0] as $no => $row)
                  <tr class="odd pointer">
                    <td>{{ ++$no }}</td>
                    <td>{{ $row[1] }} @if($row[1]==null) <span style="color:red">Ô này bị trống</span> @endif</td>
                    <td>{{ $row[2] }}
                      @if($row[2]==null) <span style="color:red">Ô này bị trống</span> @endif
                      <?php
                        $email = !preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$row[2]);
                      ?>
                      @if($email)<p style="color:red">sai định dạng email</p> @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
 @endsection
