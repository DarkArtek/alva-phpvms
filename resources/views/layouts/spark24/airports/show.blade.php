@extends('app')
@section('title', $airport->full_name)

@section('content')
  <div class="row" style="margin-bottom: 30px;">
    <div class="col-12">
      <h2>
        {{ $airport->full_name }}
        @if(filled($airport->elevation))
          <span>{{'| '.$airport->elevation.'ft'}}</span>
        @endif
        <div class="btn-group float-right" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#metarModal">Weather</button>
        </div>
      </h2>
    </div>
    <div class="modal fade" id="metarModal" tabindex="-1" aria-labelledby="metarModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="metarModalLabel">METAR</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            {{ Widget::Weather(['icao' => $airport->icao]) }}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    {{-- Show the weather widget in one column --}}

    {{-- Show the airspace map in the other column --}}
    <div class="col-12">
      {{ Widget::AirspaceMap(['width' => '100%', 'height' => '400px', 'lat' => $airport->lat, 'lon' => $airport->lon]) }}
      @if(filled($airport->notes))
        <hr>
        {!! $airport->notes !!}
      @endif
    </div>
  </div>
  <div class="row">
    {{-- There are files uploaded and a user is logged in--}}
    @if(count($airport->files) > 0 && Auth::check())
      <div class="col-12">
        <h3>{{ trans_choice('common.download', 2) }}</h3>
        @include('downloads.table', ['files' => $airport->files])
      </div>
    @endif
  </div>

  <div class="row">
    <div class="col-6">
      <h5>@lang('flights.inbound')</h5>
      @if(!$inbound_flights)
        <div class="jumbotron text-center">
          @lang('flights.none')
        </div>
      @else
        <table class="table table-striped">
          <thead>
          <tr>
            <th class="text-left">@lang('airports.ident')</th>
            <th class="text-left">@lang('airports.departure')</th>
            <th>@lang('flights.dep')</th>
            <th>@lang('flights.arr')</th>
          </tr>
          </thead>
          @foreach($inbound_flights as $flight)
            <tr>
              <td class="text-left">
                <a href="{{ route('frontend.flights.show', [$flight->id]) }}">
                  {{ $flight->ident }}
                </a>
              </td>
              <td class="text-left">{{ optional($flight->dpt_airport)->name }}
                (<a href="{{route('frontend.airports.show',
                         ['id' => $flight->dpt_airport_id])}}">{{$flight->dpt_airport_id}}</a>)
              </td>
              <td>{{ $flight->dpt_time }}</td>
              <td>{{ $flight->arr_time }}</td>
            </tr>
          @endforeach
        </table>
      @endif
    </div>

    <div class="col-6">
      <h5>@lang('flights.outbound')</h5>
      @if(!$outbound_flights)
        <div class="jumbotron text-center">
          @lang('flights.none')
        </div>
      @else
        <table class="table table-striped">
          <thead>
          <tr>
            <th class="text-left">@lang('airports.ident')</th>
            <th class="text-left">@lang('airports.arrival')</th>
            <th>@lang('flights.dep')</th>
            <th>@lang('flights.arr')</th>
          </tr>
          </thead>
          @foreach($outbound_flights as $flight)
            <tr>
              <td class="text-left">
                <a href="{{ route('frontend.flights.show', [$flight->id]) }}">
                  {{ $flight->ident }}
                </a>
              </td>
              <td class="text-left">{{ $flight->arr_airport->name }}
                (<a href="{{route('frontend.airports.show',
                         ['id'=>$flight->arr_airport->icao])}}">{{$flight->arr_airport->icao}}</a>)
              </td>
              <td>{{ $flight->dpt_time }}</td>
              <td>{{ $flight->arr_time }}</td>
            </tr>
          @endforeach
        </table>
      @endif
    </div>
  </div>

@endsection
