<header class="bg-dark shadow-sm">

  <nav class="navbar navbar-expand-md navbar-light">

    <div class="container nw100 m0 no-wrap">

        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <div class="logo w-25">
              <img class="logo-img" src="{{ asset('deliveboo-white-no-background.png') }}">
            </div>
            {{-- config('app.name', 'Laravel') --}}
        </a>

        <div class=" nd-right-bar navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ms-auto ndm-18">
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="{{ route('home') }}">Home</a>
                </li>
                @auth()
                {{-- <li class="nav-item ndm-18">
                    <a class="nav-link" href="{{ route('admin.stats') }}">Statistiche</a>
                </li> --}}
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Accedi</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown me-5" id="pr">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fa-solid fa-user-secret" style="color: #ffffff;"></i>   {{ Auth::user()->name }}
                    </a>

                    <div id="dropdown" class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown">
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
