<nav id="sidebar">

    <div class="text-center pt-3 m-0">
        <h5 class="font-weight-bold">S.P.K</h5>
    </div>
    <hr class="col-8 my-1">

    <ul class="list-unstyled components">

        <li >
            <a href="{{ route('home') }}" >Home</a>
        </li>
        <li>
            <a href="{{ route('criteriaPreference') }}">Criteria-Preference</a>
        </li>
        {{-- <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Portfolio</a>
        </li> --}}

        <li>
            <a  href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>

</nav>