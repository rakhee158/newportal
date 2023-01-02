<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{url('/')}}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{url('/')}}/dist/css/adminlte.min.css">
  
 @yield('style')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('admin.layouts.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.layouts.sidebar')
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    @yield('content')
    
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  @include('admin.layouts.aside')
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
      V 1.0.0
    </div>
    <strong>Copyright &copy; 2022 <a href="">Rakhi</a>.</strong> All rights reserved.
  </footer>
</div>
 @yield('script')
<!-- REQUIRED SCRIPTS -->
<script src="{{url('/')}}/plugins/jquery/jquery.min.js"></script>
<script src="{{url('/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{url('/')}}/dist/js/adminlte.min.js"></script>


</body>
</html>
