 <div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Dư Công Thành !</span></a>
    </div>
    <div class="clearfix"></div>
    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <?php $user = Auth::user(); ?>
        <img src="{{$user->employees->avatar ?? null}}" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Xin chào</span>
        <h2>{{ @Auth::user()->name }}</h2>
      </div>
    </div>
    <!-- /menu profile quick info -->
    <br />
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a href="{{url('home')}}"><i class="fa fa-home"></i> Trang chủ </a></li>
          {{-- @can('crud') --}}
          <li><a><i class="fa fa-edit"></i> Phòng ban<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{URL::to('/departments')}}">Danh sách</a></li>
              <li><a href="{{URL::to('/departments/new')}}">Thêm mới</a></li>
            </ul>
          </li>
          <li>
            <a><i class="fa fa-user"></i> Tài khoản <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('userList')}}">Danh sách</a></li>
              <li><a href="{{route('userAdd')}}">Thêm mới</a></li>
            </ul>
          </li>
          <li>
            <a><i class="fa fa-user"></i> Nhân viên <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('employList')}}">Danh sách</a></li>
              <li><a href="{{route('employAdd')}}">Thêm mới</a></li>
            </ul>
          </li>
           <li>
            <a href="{{route('salary.index')}}"><i class="fa fa-money"></i> Danh sách lương</a>
          </li>
          {{-- @endcan --}}
           <li>
            <a href="{{route('personal')}}"><i class="fa fa-user"></i> Thông tin cá nhân</a>
          </li>
           <li>
            <a href="{{route('work')}}"><i class="fa fa-briefcase"></i> Thông tin công việc</a>
          </li>
           <li>
            <a href="{{route('contact')}}"><i class="fa fa-phone-square"></i> Thông tin liên hệ</a>
          </li>
            <li>
            <a href="{{ route('contactList') }}"><i class="fa fa-group"></i> Contacts</a>
          </li>
           </li>
            <li>
            <a href="{{ route('danhsach') }}"><i class="fa fa-user"></i> Danh sách nhân viên</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>

</div>
