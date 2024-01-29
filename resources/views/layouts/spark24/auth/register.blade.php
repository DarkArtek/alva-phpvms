@extends('app')
@section('title', __('auth.register'))

@section('content')

  @include('auth.register_form')
@endsection

@section('scripts')
  @if ($captcha['enabled'])
    <script src="https://hcaptcha.com/1/api.js" async defer></script>
  @endif

  <script>
    $('#toc_accepted').click(function () {
      if ($(this).is(':checked')) {
        $('#register_button').removeAttr('disabled');
      } else {
        $('#register_button').attr('disabled', 'true');
      }
    });
  </script>
@include('scripts.airport_search')
@endsection
