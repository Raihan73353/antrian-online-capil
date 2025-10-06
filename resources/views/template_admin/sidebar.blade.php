<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ANTREANKU <sup></sup></div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
        <!-- Menu Pendaftaran -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePendaftaran"
        aria-expanded="false" aria-controls="collapsePendaftaran">
        <i class="fas fa-fw fa-clipboard-list"></i>
        <span>PENDAFTARAN</span>
    </a>
    <div id="collapsePendaftaran" class="collapse" aria-labelledby="headingPendaftaran" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('dukcapil.index') }}">Dukcapil</a>
            <a class="collapse-item" href="{{ route('pencatatan_sipil.index') }}">Pencatatan Sipil</a>
        </div>
    </div>
</li>


        </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('jadwal.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Pengaturan jadwal</span>
        </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('laporan.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Laporan</span>
        </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('register') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>regis-warga</span>
        </a>


    <!-- ...lanjutkan menu sesuai kebutuhan... -->
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
