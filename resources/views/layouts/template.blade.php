<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monitoring | PT. Riau Samudra Mandiri</title>
  @include('partials.style')
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('partials.navbar')

  @include('partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


     @yield('content')

  </div>
  <!-- /.content-wrapper -->

  @include('partials.footer')

</div>
<!-- ./wrapper -->
</body>
<!-- REQUIRED SCRIPTS -->
@include('partials.script')

</html>

@include('sweetalert::alert')
