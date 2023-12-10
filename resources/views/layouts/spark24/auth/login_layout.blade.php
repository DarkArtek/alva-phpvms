<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/frontend/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/frontend/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
  <title>@yield('title') - {{ config('app.name') }}</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport'/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:slnt,wght@-10,400;-10,700;0,400;0,700&display=swap" rel="stylesheet">
  <link href="{{ public_mix('/assets/frontend/css/spark24.css') }}" rel="stylesheet"/>
  @yield('css')
  <style>
    a {
      color: #a00000;
    }
  </style>
</head>

<body class="login-page" style="background: url('{{ asset('/assets/spark24/login_01.png') }}') center no-repeat; background-size: cover;">
<!-- Navbar -->

<!-- End Navbar -->
<div class="page-header">

  <div class="container d-flex justify-content-center flex-column" style="height: 100vh">
    @yield('content')
    <div class="copyright text-center text-white">
      &copy;
      <script>
        document.write(new Date().getFullYear())
      </script>
      Spark Virtual, powered by <a href="http://www.phpvms.net" target="_blank">phpvms</a>.
    </div>
  </div>
  <footer class="footer">
    <div class="container">

    </div>
  </footer>
</div>
</body>

<script src="{{ public_asset('/assets/global/js/jquery.js') }}" type="text/javascript"></script>

@yield('scripts')

</html>
