@extends('app_pages')
@section('title', __('home.welcome.title'))

@section('content')
  <div class="d-flex flex-column" style="width: 100%; height: 80vh; min-height: 300px; overflow: hidden; background: url('{{ asset('assets/spark24/header_01.png') }}') no-repeat center; position: relative; background-size: cover;">
    <div class="white-text mt-auto mx-auto mb-2">
      <h2>Re-Igniting Virtual Aviation</h2>
    </div>
    <div class="container mb-4">
      <div class="row">
        <div class="col-lg-4">
          <div class="card h-100">
            <div class="card-body text-center">
              <h3>Modern Website</h3>
              <div>Built on phpVMS 7 with in-house custom modules to provide you with a unique experience you won't get anywhere else, with both smartCARS 3 and vmsACARS.</div>
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
    <h1 class="text-center">What We Do</h1>
    <!-- What you can do -->
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="sp-tab" data-toggle="tab" data-target="#sp" type="button" role="tab" aria-controls="home" aria-selected="true">Scheduled Passenger</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="shuttle-tab" data-toggle="tab" data-target="#charter" type="button" role="tab" aria-controls="profile" aria-selected="false">Charters</button>
      </li>
      {{--
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="glow-tab" data-toggle="tab" data-target="#soa" type="button" role="tab" aria-controls="contact" aria-selected="false">Special Operations</button>
      </li>
      --}}
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="elite-tab" data-toggle="tab" data-target="#events" type="button" role="tab" aria-controls="contact" aria-selected="false">Events</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="sp" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
          <div class="col-md-8">
            <p>
              Spark's bread and butter is our scheduled passenger offerings. At Spark, you can enjoy a hand-curated route experience
              centered around the United States with destinations around the world.
            </p>
            <p>
              Our mainline passenger operations centers around a Boeing, Airbus, and McDonald-Douglas fleet, providing you with choice
              on how you want to fly, with routes allowing a wide diversity of aircraft.
            </p>
            <div class="d-flex justify-content-around flex-md-row flex-sm-column">
              <div class="text-center">
                <h5>Routes</h5>
                <h3>{{\App\Models\Flight::where('flight_type', \App\Models\Enums\FlightType::SCHED_PAX)->count()}}</h3>
              </div>
              <div class="text-center">
                <h5>Destinations</h5>
                <h3>{{\App\Models\Flight::where('flight_type', \App\Models\Enums\FlightType::SCHED_PAX)->distinct()->count('dpt_airport_id')}}</h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 hidden-sm">
            <img src="{{asset('assets/spark24/spark_img.png')}}" style="width: 100%; display: block;"/>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="charter" role="tabpanel" aria-labelledby="profile-tab">
        <p>
          Spark's Charter Operations aim to provide a unique and curated experiences based on real world events.
        </p>
        <p>
          Whether it's taking oil executives to Alaska or shipping relief supplies to natural disaster areas, Spark will
          be there to create memorable experiences role-playing as a pilot in our virtual world.
        </p>
      </div>
      {{--
      <div class="tab-pane fade" id="soa" role="tabpanel" aria-labelledby="contact-tab">
        <p>
          Mark Fill This Out
        </p>
      </div>
      --}}
      <div class="tab-pane fade" id="events" role="tabpanel" aria-labelledby="contact-tab">
        <p>
          Flying together is the backbone of any online flight simulator community. At Spark, you can expect a wide range
          of events, from large fly-ins with commercial planes, to poker runs in prop planes.
        </p>
      </div>
    </div>
    <h1>Fleet</h1>
    @php
      $airlines = \App\Models\Airline::whereHas('subfleets')->with((array('subfleets' => function($query) {
        $query->orderBy('name', 'ASC');
      })))->get();
    @endphp
    <div class="row">
      <div class="col-4">
        <div class="list-group" id="list-tab" role="tablist">
          @foreach($airlines as $airline)
            <a class="list-group-item list-group-item-action @if($airline->id == 1) active @endif" id="list-{{$airline->icao}}-list" data-toggle="list" href="#list-{{$airline->icao}}" role="tab" aria-controls="home">{{$airline->name}}</a>
          @endforeach
        </div>
      </div>
      <div class="col-8">
        <div class="tab-content" id="nav-tabContent">
          @foreach($airlines as $airline)
            <div class="tab-pane fade show @if($airline->id == 1) active @endif" id="list-{{$airline->icao}}" role="tabpanel" aria-labelledby="list-home-list">
              <ul style="columns: 2">
                @foreach($airline->subfleets as $sf)
                  <li>{{$sf->name}}</li>
                @endforeach
              </ul>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- Subsideries -->
    {{--
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#mainline" type="button" role="tab" aria-controls="home" aria-selected="true">Spark Airlines</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="shuttle-tab" data-toggle="tab" data-target="#shuttle" type="button" role="tab" aria-controls="profile" aria-selected="false">Spark Shuttle</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="glow-tab" data-toggle="tab" data-target="#glow" type="button" role="tab" aria-controls="contact" aria-selected="false">Glow By Spark</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="elite-tab" data-toggle="tab" data-target="#elite" type="button" role="tab" aria-controls="contact" aria-selected="false">Elite By Spark</button>
      </li>
    </ul>
    @php
      $airlines = \App\Models\Airline::with((array('subfleets' => function($query) {
  $query->orderBy('name', 'ASC');
})))->get();
    @endphp
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="mainline" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
          <div class="col-md-8">
            <p>
              Spark Virtual Mainline serves as the flagship division of the airline, offering full-service flights to major
              hubs and focus cities. The airline strategically operates out of key airports, including Boston Logan
              International (BOS), Los Angeles International (LAX), Denver International (DEN),
              Seattle-Tacoma International (SEA), Anchorage (ANC), and Honolulu (HNL).
            </p>
            <p>
              This mainline service delivers a premium travel experience, with a diverse fleet, professional flight crews,
              and a commitment to punctuality and customer satisfaction.
            </p>
          </div>
          <div class="col-md-4 hidden-sm">
            <img src="{{asset('assets/spark24/spark_img.png')}}" style="width: 100%; display: block;"/>
          </div>
        </div>

        <h3>Fleet</h3>
        <ul>
          @foreach($airlines->where('id', 1)->first()->subfleets as $sf)
            <li>{{$sf->name}}</li>
          @endforeach
        </ul>
      </div>
      <div class="tab-pane fade" id="shuttle" role="tabpanel" aria-labelledby="profile-tab">
        <p>
          The Spark Shuttle subsidiary is designed to cater to both leisure travelers and those seeking high-demand routes.
          Featuring an all-coach configuration, Spark Shuttle provides a comfortable and affordable travel option for a variety of destinations.
          Premium seating options are available for those looking to enhance their journey.
        </p>
        <p>
          Passengers on Spark Shuttle flights enjoy complimentary snacks, beverages, in-flight entertainment (IFE), and
          Wi-Fi services, ensuring a pleasant and enjoyable travel experience.
        </p>
      </div>
      <div class="tab-pane fade" id="glow" role="tabpanel" aria-labelledby="contact-tab">
        <p>
          GLOW by Spark represents Spark Virtual Airlines' commuter subsidiary, connecting regional airports to the main hubs. This subsidiary focuses on serving smaller communities and enhancing accessibility to larger airports within the network. GLOW flights are designed for efficiency and convenience, providing frequent and reliable connections for passengers traveling to and from regional airports. The commuter subsidiary plays a crucial role in expanding Spark's reach and fostering connectivity across a broader range of locations.
        </p>
      </div>
      <div class="tab-pane fade" id="elite" role="tabpanel" aria-labelledby="contact-tab">...</div>
    </div>
    --}}
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
