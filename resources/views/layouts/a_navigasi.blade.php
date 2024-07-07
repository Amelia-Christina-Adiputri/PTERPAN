<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img class="align-self-center mr-3" src="https://www.ukdw.ac.id/public_html/wp-content/uploads/2017/10/logo-ukdw.png" alt="Generic placeholder image" width="40" height="50">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link {{($key=='Home') ? 'active':''}}" href="/a_home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{($key=='Driver') ? 'active':''}}" href="/a_driver">Daftar Driver</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{($key=='Kendaraan') ? 'active':''}}" href="/a_kendaraan">Daftar Kendaraan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{($key=='Pengajuan') ? 'active':''}}" href="/a_pengajuan">Daftar Pengajuan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{($key=='Laporan') ? 'active':''}}" href="/a_laporan">Laporan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{($key=='Register') ? 'active':''}}" href="/register">Register</a>
            </li>
        </ul>

        <div class="d-flex justify-content-end">
            <div class="dropdown float-right">
                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-person-circle"></i> {{ Auth::user()->name ?? '' }} <!-- Copy Icon dari bootstrap -->
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <!-- <a class="dropdown-item" href="#">
                    <div class="media">
                        <img class="align-self-center mr-2">
                        <div class="media-body">
                        <h5 class="mt-2">{{ Auth::user()->name ?? '' }}</h5>
                        {{-- <h6 class="mt-2">{{ Auth::user()->id ?? '' }}</h6> --}}
                        </div>
                    </div>
                </a> -->
                <a class="dropdown-item border-top btn-dark" href="/logout"><i class="bi bi-power"></i> Log Out</a>
            </div>
        </div>
    </div>
</nav>
