<header class="bg-dark shadow-sm">
  <nav class="navbar navbar-expand-md navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <div class="logo w-25">
               <img class="w-100" src="{{ asset('deliveboo-white-no-background.png') }}">
            </div>
            {{-- config('app.name', 'Laravel') --}}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    {{-- scritta in questo modo richiama varivbili per sito multilanguage
                    <a class="nav-link" href="{{url('/') }}">{{ __('Home') }}</a> --}}
                    <a class="nav-link" target="_blank" href="{{ route('home') }}">Home</a>
                </li>
                @auth()
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.stats') }}">Statistiche</a>
                </li> --}}
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown me-5">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fa-solid fa-user-secret" style="color: #ffffff;"></i>   {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('dashboard') }}"><i class="fa-solid fa-chart-column"></i>   {{__('Dashboard')}}</a>
                        <a class="dropdown-item" href="{{ url('profile') }}"><i class="fa-solid fa-id-card"></i>   {{__('Profile')}}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>   {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
  </nav>
</header>
