<nav class="navbar navbar-expand-md navbar-light navbar-laravel m-0 px-2">
    <div class="container-fluid px-2">
        <a class="pl-0 pr-3 font-weight-bold" href="#" id="sidebarCollapse" role="button">
            {{-- <i class="pe-7s-menu"></i> --}}
            [][]
            {{-- <i class="fas fa-bars"></i> --}}
            {{-- <span class="navbar-toggler-icon"></span> --}}
        </a>
        <a class="navbar-brand text-uppercase " href="#" style="font-family: 'sans'">
            {{ config('app.name', 'Laravel') }}
        </a>



        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @else
            <li class="nav-item dropdown d-sm-none d-lg-inline">
                <a id="navbarDropdown" class="small nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        <li class="nav-item dropdown d-lg-none">
            <a  class="nav-link small" >
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
        </li>
        @endguest
    </ul>

</div>
</nav>