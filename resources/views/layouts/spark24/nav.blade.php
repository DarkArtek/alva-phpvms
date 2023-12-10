<nav class="navbar navbar-expand-lg navbar-light" style="background: #eee">
  <a class="navbar-brand" href="/"><img src="https://flyspark.org/img/SparkLogo.svg" style="height: 50px;" alt="SPARK"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="form-inline my-2 my-lg-0 ml-auto">
      <ul class="navbar-nav">
        @if(Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="{{ route('frontend.dashboard.index') }}">
              <i class="fas fa-tachometer-alt"></i>
              @lang('common.dashboard')
            </a>
          </li>
        @endif

        <li class="nav-item">
          <a class="nav-link" href="{{ route('frontend.livemap.index') }}">
            <i class="fas fa-globe"></i>@lang('common.livemap')
          </a>
        </li>



        {{-- Show the module links that don't require being logged in --}}
        @foreach($moduleSvc->getFrontendLinks($logged_in=false) as &$link)
          <li class="nav-item">
            <a class="nav-link" href="{{ url($link['url']) }}">
              <i class="{{ $link['icon'] }}"></i>
              {{ ($link['title']) }}
            </a>
          </li>
        @endforeach

        @foreach($page_links as $page)
          <li class="nav-item">
            <a class="nav-link" href="{{ $page->url }}" target="{{ $page->new_window ? '_blank':'_self' }}">
              <i class="{{ $page['icon'] }}"></i>
              {{ $page['name'] }}
            </a>
          </li>
        @endforeach

        @if(!Auth::check())

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/register') }}">
              <i class="far fa-id-card"></i>
              @lang('common.register')
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/login') }}">
              <i class="fas fa-sign-in-alt"></i>
              @lang('common.login')
            </a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
              <span class="flag-icon flag-icon-{{ $languages[$locale]['flag-icon'] }}"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              @foreach ($languages as $lang => $language)
                @if ($lang != $locale)
                  <a class="dropdown-item" href="{{ route('frontend.lang.switch', $lang) }}">
                    <span class="flag-icon flag-icon-{{ $language['flag-icon'] }}"></span>&nbsp;&nbsp;{{ $language['display'] }}
                  </a>
                @endif
              @endforeach
            </div>
          </li>
        @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('frontend.pilots.index') }}">
                <i class="fas fa-users"></i>
                {{ trans_choice('common.pilot', 2) }}
              </a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('frontend.flights.index') }}">
              <i class="fab fa-avianex"></i>
              {{ trans_choice('common.flight', 2) }}
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('frontend.pireps.index') }}">
              <i class="fas fa-cloud-upload-alt"></i>
              {{ trans_choice('common.pirep', 2) }}
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('frontend.downloads.index') }}">
              <i class="fas fa-download"></i>
              {{ trans_choice('common.download', 2) }}
            </a>
          </li>

          {{-- Show the module links for being logged in --}}
          @foreach($moduleSvc->getFrontendLinks($logged_in=true) as &$link)
            <li class="nav-item">
              <a class="nav-link" href="{{ url($link['url']) }}">
                <i class="{{ $link['icon'] }}"></i>
                {{ ($link['title']) }}
              </a>
            </li>
          @endforeach

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
              <span class="flag-icon flag-icon-{{ $languages[$locale]['flag-icon'] }}"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              @foreach ($languages as $lang => $language)
                @if ($lang != $locale)
                  <a class="dropdown-item" href="{{ route('frontend.lang.switch', $lang) }}">
                    <span class="flag-icon flag-icon-{{ $language['flag-icon'] }}"></span>&nbsp;&nbsp;{{ $language['display'] }}
                  </a>
                @endif
              @endforeach
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
               data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
              @if (Auth::user()->avatar == null)
                <img src="{{ Auth::user()->gravatar(38) }}" style="height: 38px; width: 38px;">
              @else
                <img src="{{ Auth::user()->avatar->url }}" style="height: 38px; width: 38px;">
              @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right">

              <a class="dropdown-item" href="{{ route('frontend.profile.index') }}">
                <i class="far fa-user"></i>&nbsp;&nbsp;@lang('common.profile')
              </a>

              @ability('admin', 'admin-access')
              <a class="dropdown-item" href="{{ url('/admin') }}">
                <i class="fas fa-circle-notch"></i>&nbsp;&nbsp;@lang('common.administration')
              </a>
              @endability
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ url('/logout') }}">
                <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;@lang('common.logout')
              </a>
            </div>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
