    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class=""></i>
            </div>
            <div class="sidebar-brand-text mx-3">Perpustakaan Politeknik Negeri Medan</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/anggota') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Data Anggota</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/buku') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Data Buku</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/peminjaman') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Data Peminjaman</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/pengembalian') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Data Pengembalian</span></a>
        </li>


    </ul>
    <!-- End of Sidebar -->