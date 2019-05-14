<nav id="sidebar">

    <div class="text-center pt-3 m-0">
        <h5 class="font-weight-bold">
            <i class="fas fa-brain fa-sm mr-1"></i>
            S.P.K
        </h5>
    </div>
    <hr class="col-8 my-1">

    <ul class="list-unstyled components" >

        <li >
            <a href="{{ route('home') }}" >
                <i class="fas fa-home"></i>
                <small>Home</small>
            </a>
        </li>

        <li >
            <a href="{{ route('mahasiswa') }}" >
                <i class="far fa-id-badge"></i>
                <small>Mahasiswa</small>
            </a>
        </li>

        @role('Penilai')
        <li >
            <a href="{{ route('penilaianAlternatif') }}" >
                <i class="far fa-heart"></i>
                <small>Penilaian</small>
            </a>
        </li>
        @endrole

        @role('Admin')
        <li>
            <a href="{{ route('user') }}" >
                <i class="far fa-user"></i>
                <small>User</small>
            </a>
        </li>
        <li>
            <a href="{{ route('criteriaPreference') }}" >
                <i class="far fa-chart-bar"></i>
                <small>Criteria-Prefference</small>
            </a>
        </li>
        <li>
            <a href="{{ route('decission') }}">
                <i class="fas fa-list-ol"></i>
                <small> Decission Making</small>
            </a>
        </li>
        @endrole
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
            <i class="fas fa-sign-out-alt"></i>
            <small>{{ __('Logout') }}</small>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>

</nav>