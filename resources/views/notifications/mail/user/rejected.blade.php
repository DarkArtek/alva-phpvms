@component('mail::message')
  # Hi {{ $user->name }},

  Your registration to our community was denied. To appeal, email us at staff@flyspark.org.

  Thanks,<br>
  Management, {{ config('app.name') }}
@endcomponent
