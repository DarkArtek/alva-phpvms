<div class="row">
  @foreach($pireps as $pirep)
    <div class="col-lg-6 col-sm-12">
      <div class="card">
        <div class="card-body" style="min-height: 0">
          <div class="row">
            <div class="col-sm-12">
              <div class="d-flex flex-row">
                <div class="mb-1">
                  @if ($pirep->user->avatar == null)
                    <img src="{{ $pirep->user->gravatar(40) }}" style="height: 40px; width: 40px;"/>
                  @else
                    <img src="{{ $pirep->user->avatar->url }}" style="height: 40px; width: 40px;"/>
                  @endif
                </div>
                <div class="my-auto ml-2" style="font-size: 24px">{{$pirep->user->name_private}}</div>
              </div>
              <div>{{ $pirep->airline->name }} <span class="float-right">{{\App\Models\Enums\FlightType::label($pirep->flight_type)}}</span></div>
              <div style="font-size: 36px; line-height: 36px;">
                {{ $pirep->ident }}
                <span class="float-right">{{$pirep->dpt_airport_id}}->{{$pirep->arr_airport_id}}</span>
              </div>
            </div>
            <div class="col-sm-3 align-top text-right">
              {{--
              !!! NOTE !!!
               Don't remove the "save_flight" class, or the x-id attribute.
               It will break the AJAX to save/delete

               "x-saved-class" is the class to add/remove if the bid exists or not
               If you change it, remember to change it in the in-array line as well
              --}}

            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              {{ optional($pirep->aircraft)->ident }}
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
