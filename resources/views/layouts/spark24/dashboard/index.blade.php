@extends('app')
@section('title', __('common.dashboard'))

@section('content')
  <div class="row">
    <div class="col-sm-8">

      @if(Auth::user()->state === \App\Models\Enums\UserState::ON_LEAVE)
        <div class="row">
          <div class="col-sm-12">
            <div class="alert alert-warning" role="alert">
              You are on leave! File a PIREP to set your status to active!
            </div>
          </div>
        </div>
      @endif
      <div class="card mb-4">
        <div class="card-body text-center">
          <h3>Welcome To {{ \App\Models\Airport::find($current_airport)->name }}</h3>
          <div class="row">
            <div class="col-lg-4 col-sm-12">
              <a href="{{route('frontend.flights.search', ['dep_icao' => $current_airport])}}">
                <div style="background: #333; text-align: center; display: flex; justify-content: center; flex-direction: column; height: 100px;">
                  <div>All Flights</div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-sm-12">
              <a href="#">
                <div style="background: #333; text-align: center; display: flex; justify-content: center; flex-direction: column; height: 100px;">
                  <div>Free Flight</div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-sm-12">
              <a href="#">
                <div style="background: #333; text-align: center; display: flex; justify-content: center; flex-direction: column; height: 100px;">
                  <div>My Trips</div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="card border-blue-bottom mt-4">
        <div class="card-header">@lang('dashboard.recentreports')</div>
        <div class="card-body">
          {{ Widget::latestPireps(['count' => 5]) }}
        </div>

      </div>
      <div class="mt-4">
        {{ Widget::latestNews(['count' => 1]) }}
      </div>


    </div>

    {{-- Sidebar --}}
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex flex-row">
            <div>
              @if (Auth::user()->avatar == null)
                <img src="{{ Auth::user()->gravatar(80) }}" style="height: 80px; width: 80px;"/>
              @else
                <img src="{{ Auth::user()->avatar->url }}" style="height: 80px; width: 80px;"/>
              @endif
            </div>
            <div class="d-flex flex-column justify-content-center ml-2">
              <div style="font-size: 24px;">{{ Auth::user()->name }}</div>
              <div style="font-size: 16px">{{ Auth::user()->rank->name }}</div>
            </div>
          </div>
          <h5 class="mt-4">My Statistics</h5>
          <div class="d-flex flex-row justify-content-between">
            <span class="title">{{ trans_choice('common.flight', $user->flights) }}</span>
            <a href="{{route('frontend.pireps.index')}}">{{$user->flights}}</a>
          </div>
          <div class="d-flex flex-row justify-content-between">
            <span class="title">@lang('dashboard.totalhours')</span>
            <span>@minutestotime($user->flight_time)</span>
          </div>
          <div class="d-flex flex-row justify-content-between">
            <span class="title">@lang('dashboard.yourbalance')</span>
            <span>{{ optional($user->journal)->balance ?? 0 }}</span>
          </div>

        </div>

      </div>
      <div class="card mt-4">
        <div class="card-header" role="tablist">
          @lang('dashboard.yourlastreport')
        </div>
        <div class="card-body">
          <!-- Tab panes -->
          <div class="tab-content">
            @if($last_pirep === null)
              <div class="card-body" style="text-align:center;">
                @lang('dashboard.noreportsyet') <a
                  href="{{ route('frontend.pireps.create') }}">@lang('dashboard.fileonenow')</a>
              </div>
            @else
              @include('dashboard.pirep_card', ['pirep' => $last_pirep])
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
