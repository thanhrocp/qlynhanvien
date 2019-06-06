<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <base href="{{asset('')}}">
  <!--===============================================================================================-->
  <title>@yield('title')</title>
  <!--===============================================================================================-->
  <link rel="icon" href="master/production/images/25694.png" type="image/gif" sizes="16x16">
  <!--===============================================================================================-->
  <link href="master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!--===============================================================================================-->
  <link href="master/docs/css/sweetalert2.min.css" rel="stylesheet">
  <!--===============================================================================================-->
  <link href="master/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!--===============================================================================================-->
  <link href="master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!--===============================================================================================-->
  <link href="master/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!--===============================================================================================-->
  <link href="master/build/css/custom.min.css" rel="stylesheet">
  <!--===============================================================================================-->
  <link href="master/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <!--===============================================================================================-->
  <link href="master/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <!--===============================================================================================-->
  <link href="master/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <!--===============================================================================================-->
  <link href="master/docs/css/bootstrap-select.min.css" rel="stylesheet">
  <!--===============================================================================================-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <!--===============================================================================================-->
  <link href="master/build/css/mystyle.css" rel="stylesheet">
  @yield('css')
</head>
<body class="nav-md" style="font-family: 'Dancing Script', cursive;">
  <div class="container body">
    <div class="main_container">

      <!--================================Page Menu========================================-->

      @include('manage.layout.menu')

      <!--================================Page Menu========================================-->

      <!--================================Page Header======================================-->

      @include('manage.layout.header')

      <!--================================Page Header======================================-->

      <!--================================Page Content=====================================-->

      @yield('content')

      <!--================================Page Content=====================================-->

      <!--================================Page Footer======================================-->

      @include('manage.layout.footer')

      <!--================================Page Footer======================================-->

    </div>
  </div>
  <!--===============================================================================================-->
  <script src="master/vendors/jquery/dist/jquery.min.js"></script>
  <!--===============================================================================================-->
  <script src="master/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="master/docs/js/sweetalert2.min.js"></script>
  <!--===============================================================================================-->
  <script src="master/vendors/fastclick/lib/fastclick.js"></script>
  <!--===============================================================================================-->
  <script src="master/vendors/nprogress/nprogress.js"></script>
  <!--===============================================================================================-->
  <script src="master/vendors/iCheck/icheck.min.js"></script>
  <!--===============================================================================================-->
  <script src="master/build/js/custom.min.js"></script>
  <!--===============================================================================================-->
  <script src="master/docs/js/bootstrap-select.min.js"></script>
  <!--===============================================================================================-->
  <script src="master/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <!--===============================================================================================-->
  <script src="master/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <!--===============================================================================================-->
  @include('manage.layout.crud')
  <!--===============================================================================================-->
  @include('sweet::alert')
  <!--===============================================================================================-->
  <script>
    $('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
  });
  </script>
  @yield('script')
</body>
</html>