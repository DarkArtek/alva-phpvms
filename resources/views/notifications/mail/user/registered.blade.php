@component('mail::message')
  # Thanks for signing up, {{ $user->name }}!

  Welcome to Spark Aviation Group. A community of passionate aviation enthusiasts centered around MSFS, P3D, and X-Plane.

  Your account has been fully accepted, and you're now ready to fly with us!

  To get started, we recommend you join our Discord server, which contains links to our liveries and is the preferred
  method of communication.

  @component('mail::button', ['url' => "https://flyspark.org/discord"])
    Visit Discord
  @endcomponent

  Head over to our downloads page to get situated with our ACARS clients, liveries, and more!

  @component('mail::button', ['url' => "https://flyspark.org/downloads"])
    Download smartCARS 3
  @endcomponent

  One final thing, we do highly recommend, if you have not done so already, read up on our policies and procedures, located
  on our docs portal.

  @component('mail::button', ['url' => "https://docs.flyspark.org"])
    Download smartCARS 3
  @endcomponent

  If you have any questions, don't hesitate to reach out via discord, or email us at staff@flyspark.org.

  See you in the skies,<br>
  The Spark Executive Team
@endcomponent
