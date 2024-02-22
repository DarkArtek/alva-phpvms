@component('mail::message')
  # Thanks for signing up, {{ $user->name }}!

  You will be notified as soon as your account is approved within the next 72 hours!

  Please watch your email if we need to follow up regarding your application.

  Thanks,<br>
  Management, {{ config('app.name') }}
@endcomponent
