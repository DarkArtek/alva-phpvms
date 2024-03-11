<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport'/>

  <title>@yield('title') - {{ config('app.name') }}</title>

  {{-- Start of required lines block. DON'T REMOVE THESE LINES! They're required or might break things --}}
  <meta name="base-url" content="{!! url('') !!}">
  <meta name="api-key" content="{!! Auth::check() ? Auth::user()->api_key: '' !!}">
  <meta name="csrf-token" content="{!! csrf_token() !!}">
  {{-- End the required lines block --}}

  <link rel="shortcut icon" type="image/png" href="{{ public_asset('/assets/img/favicon.png') }}"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:slnt,wght@-10,400;-10,700;0,400;0,700&display=swap" rel="stylesheet">
  <link href="{{ public_asset('/assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet"/>


  {{-- Start of the required files in the head block --}}
  <link href="{{ public_mix('/assets/global/css/vendor.css') }}" rel="stylesheet"/>
  @yield('css')
  @yield('scripts_head')
  {{-- End of the required stuff in the head block --}}
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    .nav-item {
      display: flex;
      justify-content: center;
      flex-direction: column;
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">
<!-- Navbar -->
@include('nav')
<!-- End Navbar -->
<div>

    {{-- These should go where you want your content to show up --}}
    @include('flash.message')
    @yield('content')
    {{-- End the above block--}}


</div>
<footer class="bg-dark text-center text-lg-start mt-auto">
  <!-- Grid container -->
  <div class="container p-4 text-center">
    <a href="https://vatsim.net/">
      <img src="{{asset('assets/spark24/VATSIM_Logo_White_500px.png')}}" alt="VATSIM Logo" style="max-width: 200px; width: 100%;"/>
    </a>
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="p-3 text-light">
    © 2018-2024 Spark Virtual Aviation. powered by <a href="http://www.phpvms.net" target="_blank">phpvms</a> and a copious amount of in-house developed modules.
  </div>
  <!-- Copyright -->
</footer>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

{{-- Start of the required tags block. Don't remove these or things will break!! --}}
<script src="{{ public_mix('/assets/global/js/vendor.js') }}"></script>
<script src="{{ public_mix('/assets/frontend/js/vendor.js') }}"></script>
<script src="{{ public_mix('/assets/frontend/js/app.js') }}"></script>
@yield('scripts')

{{--
It's probably safe to keep this to ensure you're in compliance
with the EU Cookie Law https://privacypolicies.com/blog/eu-cookie-law
--}}
<script>
  window.addEventListener("load", function () {
    window.cookieconsent.initialise({
      palette: {
        popup: {
          background: "#edeff5",
          text: "#838391"
        },
        button: {
          "background": "#067ec1"
        }
      },
      position: "top",
    })
  });
</script>
{{-- End the required tags block --}}

<script>
  $(document).ready(function () {
    $("select.select2").select2({width: 'resolve'});
  });
</script>

{{--
Google Analytics tracking code. Only active if an ID has been entered
You can modify to any tracking code and re-use that settings field, or
just remove it completely. Only added as a convenience factor
--}}
@php
$gtag = setting('general.google_analytics_id');
@endphp
@if($gtag)
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $gtag }}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '{{ $gtag }}');
</script>
@endif
{{-- End of the Google Analytics code --}}

</body>
</html>
