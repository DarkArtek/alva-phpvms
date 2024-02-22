@component('mail::message')
  # PIREP Rejected!

  Your PIREP for {{$pirep->ident}}, filed on {{\Carbon\Carbon::parse($pirep->submitted_at)->toDateString()}} has been rejected
  @if($pirep->comments->count() > 0)
    ## Comments
    @foreach($pirep->comments as $comment)
      - {{ $comment->comment }}
    @endforeach
  @endif
  @component('mail::button', ['url' => route('frontend.pireps.show', [$pirep->id])])
    View PIREP
  @endcomponent

  Thanks,<br>
  {{ config('app.name') }}
@endcomponent
