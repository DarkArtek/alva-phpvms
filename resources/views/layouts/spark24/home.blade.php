@extends('app_pages')
@section('title', __('home.welcome.title'))

@section('content')
  <div class="d-flex flex-column" style="width: 100%; height: 80vh; min-height: 300px; overflow: hidden; background: url('{{ asset('assets/spark24/header_01.png') }}') no-repeat center; position: relative; background-size: cover;">
    <div class="white-text mt-auto mx-auto mb-2">
      <h2>Re-Igniting Virtual Aviation</h2>
    </div>
    <div class="container mb-2">
      <div class="row">
        <div class="col-lg-4">
          <div class="card h-100">
            <div class="card-body text-center">
              <h3>Modern Website</h3>
              <div>Built on phpVMS 7 with in-house custom modules to provide you with a unique experience you won't get anywhere else.</div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card h-100">
            <div class="card-body text-center">
              <h3>Free Flights</h3>
              <div>At Spark, you have the option of taking your flying to wherever you want, whenever you want.</div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card h-100">
            <div class="card-body text-center">
              <h3>Strong Community</h3>
              <div>A highly active Discord server, along with events to keep you involved.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-4">
    <h1 class="text-center">What</h1>
    <div>
      <div class="d-flex justify-content-center flex-row flex-sm-column">
        <div class="text-center">
          <h5>Routes</h5>
          <h3>{{\App\Models\Flight::where('flight_type', \App\Models\Enums\FlightType::SCHED_PAX)->count()}}</h3>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-lg-12">
        <h3 class="text-center">A Peek At Our Operations</h3>
        {{ Widget::liveMap(['wide' => true]) }}
      </div>
    </div>
  </div>
  <div style="background: url({{asset('assets/spark24/login_01.png')}}) center; background-size: cover;">
    <div class="container text-white" style="text-align: center; padding: 8rem 0;">
      <div style="font-size: 2rem; padding-bottom: 1rem;">Ready To See The Difference For Yourself?</div>
      <a href="{{ route('register') }}" class="btn btn-danger">Register Now</a>
    </div>
  </div>
@endsection
