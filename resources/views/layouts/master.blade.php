<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CluentasClaras</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  @include('layouts.includes.css')

</head>
<body class="hold-transition skin-black sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  @include('layouts.includes.header')

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->

  @include('layouts.includes.navigation')

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @yield('main')

  </div>
  <!-- /.content-wrapper -->

  @include('layouts.includes.footer')
  <!-- Footer -->

  <!-- include('layouts.includes.sidebar') -->
  <!-- Control Sidebar -->

</div>
<!-- ./wrapper -->

@include('layouts.includes.js')

</body>
</html>
