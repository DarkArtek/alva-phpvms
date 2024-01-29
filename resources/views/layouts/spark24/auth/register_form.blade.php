<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
    @include('auth.register_welcome')
    {{ Form::open(['url' => '/register', 'class' => 'form-signin']) }}

    <div class="card periodic-login">
      <div class="card-body">
        <h2>@lang('common.register')</h2>

        <div class="form-group form-group-no-border {{ $errors->has('name') ? 'has-danger' : '' }}">
          <label for="name" class="control-label">@lang('auth.fullname')</label>
          {{ Form::text('name', null, ['class' => 'form-control']) }}
          @if ($errors->has('name'))
            <div class="text-danger">{{ $errors->first('name') }}</div>
          @endif
        </div>

        <div class="form-group form-group-no-border {{ $errors->has('email') ? 'has-danger' : '' }}">
          <label for="email" class="control-label">@lang('auth.emailaddress')</label>
          {{ Form::text('email', null, ['class' => 'form-control']) }}
          @if ($errors->has('email'))
            <div class="text-danger">{{ $errors->first('email') }}</div>
          @endif
        </div>

        <input name="airline_id" type="hidden" value="0">
        <input name="home_airport_id" type="hidden" value="KLAX">

        <div class="form-group form-group-no-border {{ $errors->has('country') ? 'has-danger' : '' }}">
          <label for="country" class="control-label">@lang('common.country')</label>
          {{ Form::select('country', $countries, null, ['class' => 'form-control select2' ]) }}
          @if ($errors->has('country'))
            <div class="text-danger">{{ $errors->first('country') }}</div>
          @endif
        </div>
        <div class="form-group form-group-no-border {{ $errors->has('timezone') ? 'has-danger' : '' }}">
          <label for="timezone" class="control-label">@lang('common.timezone')</label>
          {{ Form::select('timezone', $timezones, null, ['id'=>'timezone', 'class' => 'form-control select2' ]) }}
          @if ($errors->has('timezone'))
            <p class="text-danger">{{ $errors->first('timezone') }}</p>
          @endif
        </div>
        @if (setting('pilots.allow_transfer_hours') === true)
          <div class="form-group form-group-no-border {{ $errors->has('transfer_time') ? 'has-danger' : '' }}">
            <label for="transfer_time" class="control-label">@lang('auth.transferhours')</label>
            {{ Form::number('transfer_time', 0, ['class' => 'form-control']) }}
            @if ($errors->has('transfer_time'))
              <div class="text-danger">{{ $errors->first('transfer_time') }}</div>
            @endif
          </div>

        @endif


        <div class="form-group form-group-no-border {{ $errors->has('password') ? 'has-danger' : '' }}">
          <label for="password" class="control-label">@lang('auth.password')</label>
          {{ Form::password('password', ['class' => 'form-control']) }}
          @if ($errors->has('password'))
            <div class="text-danger">{{ $errors->first('password') }}</div>
          @endif
        </div>



        <div class="form-group form-group-no-border {{ $errors->has('password_confirmation') ? 'has-danger' : '' }}">
          <label for="password_confirmation" class="control-label">@lang('passwords.confirm')</label>
          {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
          @if ($errors->has('password_confirmation'))
            <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
          @endif
        </div>


        @if($userFields)
          @foreach($userFields as $field)
            <div class="form-group form-group-no-border {{ $errors->has('field_'.$field->slug) ? 'has-danger' : '' }}">
              <label for="field_{{ $field->slug }}" class="control-label">{{ $field->name }}</label>
              {{ Form::text('field_'.$field->slug, null, ['class' => 'form-control']) }}
              @if ($errors->has('field_'.$field->slug))
                <div class="text-danger">{{ $errors->first('field_'.$field->slug) }}</div>
              @endif
            </div>

          @endforeach
        @endif

        @if($captcha['enabled'] === true)
          <label for="h-captcha" class="control-label">@lang('auth.fillcaptcha')</label>
          <div class="h-captcha" data-sitekey="{{ $captcha['site_key'] }}"></div>
          @if ($errors->has('h-captcha-response'))
            <p class="text-danger">{{ $errors->first('h-captcha-response') }}</p>
          @endif
        @endif

        <div>
          @include('auth.toc')
          <br/>
        </div>

        <table>
          <tr>
            <td style="vertical-align: top; padding: 5px 10px 0 0">
              <div class="form-group form-group-no-border">
                {{ Form::hidden('toc_accepted', 0, false) }}
                {{ Form::checkbox('toc_accepted', 1, null, ['id' => 'toc_accepted']) }}
              </div>
            </td>
            <td style="vertical-align: top;">
              <label for="toc_accepted" class="control-label">@lang('auth.tocaccept')</label>
              @if ($errors->has('toc_accepted'))
                <p class="text-danger">{{ $errors->first('toc_accepted') }}</p>
              @endif
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-group form-group-no-border">
                {{ Form::hidden('opt_in', 0, false) }}
                {{ Form::checkbox('opt_in', 1, null) }}
              </div>
            </td>
            <td>
              <label for="opt_in" class="control-label">@lang('profile.opt-in-descrip')</label>
            </td>
          </tr>
        </table>

        <div style="width: 100%; text-align: right; padding-top: 20px;">
          {{ Form::submit(__('auth.register'), [
              'id' => 'register_button',
              'class' => 'btn btn-primary',
              'disabled' => true,
             ]) }}
        </div>

      </div>
    </div>
    {{ Form::close() }}
  </div>
  <div class="col-sm-4"></div>
</div>
