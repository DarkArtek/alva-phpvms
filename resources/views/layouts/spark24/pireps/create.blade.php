@extends('app')
@section('title', __('pireps.fileflightreport'))

@section('content')
  <div class="row">
    <div class="col-md-12">
      <h2>@lang('pireps.newflightreport')</h2>
      <div class="alert alert-warning" style="color: black;">
        <div style="font-size: 24px; font-weight: bold;">Notice Regarding Manual Filing</div>
        <p>
          As a reminder, all PIREPs should be filed via our approved ACARS clients (vmsACARS and smartCARS 3). However, we understand there are reasons why
          you may be using the following form.
        </p>
        <p>
          Each PIREP filed through this form must contain comments to justify filing manually in the Notes. Eg. you performed a flight
          that smartCARS can't track, flight tracking failed, etc.
        </p>
        <p>
          <span style="font-weight: 700">All submissions must contain a link to evidence that the flight was flown with the hours specified in the "Flight Time" field.</span>
        </p>
        <p>
          Any PIREPs found to have been faked will be addressed via the policies outlined in the Pilot Handbook, found at
          <a href="https://docs.flyspark.org/" target="_blank">https://docs.flyspark.org/</a>
        </p>
      </div>
      @include('flash::message')
      @if(!empty($pirep))
        {{ Form::model($pirep, ['route' => 'frontend.pireps.store']) }}
      @else
        {{ Form::open(['route' => 'frontend.pireps.store']) }}
      @endif

      @include('pireps.fields')

      {{ Form::close() }}
    </div>
  </div>
@endsection

@include('pireps.scripts')
