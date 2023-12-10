@extends('auth.login_layout')
@section('title', __('common.login'))

@section('content')
  <div class="col-md-4 ml-auto mr-auto content-center">
    <div class="card">
      {{ Form::open(['url' => url('/login'), 'method' => 'post', 'class' => 'form']) }}
      <div class="card-body">
        <h2 class="text-center">Flight Operations</h2>
        <div class="input-group form-group-no-border{{ $errors->has('email') ? ' has-error' : '' }} input-lg">

          {{
            Form::text('email', old('email'), [
              'id' => 'email',
              'placeholder' => __('common.email').' '.__('common.or').' '.__('common.pilot_id'),
              'class' => 'form-control',
              'required' => true,
            ])
          }}
        </div>
        @if ($errors->has('email'))
          <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif

        <div class="input-group form-group-no-border{{ $errors->has('password') ? ' has-error' : '' }} input-lg mt-2">

          {{
              Form::password('password', [
                  'name' => 'password',
                  'class' => 'form-control',
                  'placeholder' => __('auth.password'),
                  'required' => true,
              ])
          }}
        </div>
        @if ($errors->has('password'))
          <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
        <div class="mt-2">
          <button class="btn btn-primary btn-block">@lang('common.login')</button>
          <div class="d-flex flex-row justify-content-between mt-2">
            <div>
              <a href="{{ url('/register') }}" class="link">@lang('auth.createaccount')</a>
            </div>
            <div>
              <a href="{{ url('/password/reset') }}" class="link">@lang('auth.forgotpassword')?</a>
            </div>
          </div>
        </div>


      </div>
      <div class="footer text-center">

      </div>
      <div class="pull-left">
        <h6>

        </h6>
      </div>
      <div class="pull-right">
        <h6>

        </h6>
      </div>
      {{ Form::close() }}
    </div>
  </div>
@endsection
