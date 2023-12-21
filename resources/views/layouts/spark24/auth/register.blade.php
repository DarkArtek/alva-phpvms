@extends('app')
@section('title', __('auth.register'))

@section('content')

  @if(session()->has('discord_id') || request()->query('step') == 2)
    @include('auth.register_form')
  @else
    @include('auth.register_welcome')
  @endif
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
