<aside class="main-sidebar sidebar-light-primary elevation-4 sidebar-fixed" style="position: fixed; height: 100%">
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('AdminLTE/dist/img/logo.png') }}" alt="AdminLTE" class="brand-image" style="opacity: .8;">
        <span class="brand-text font-bold"><strong>Beauty</strong> Skincare</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p><strong>Dashboard</strong></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.kriteria') }}" class="nav-link {{ Request::routeIs('admin.kriteria') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p><strong>Kriteria</strong></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.alternatif') }}" class="nav-link {{ Request::routeIs('admin.alternatif') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-store"></i>
                        <p><strong>Alternatif</strong></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.pembobotan') }}" class="nav-link {{ Request::routeIs('admin.pembobotan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-coins"></i>
                        <p><strong>Pembobotan</strong></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.perhitungan') }}" class="nav-link {{ Request::routeIs('admin.perhitungan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p><strong>Perhitungan</strong></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::routeIs('admin.pengaturan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p><strong>Pengaturan</strong>
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-2">
                        @if( Auth::user()->role == 'Administrator')
                        <li class="nav-item">
                            <a href="{{ route('admin.akun') }}" class="nav-link">
                                <i class="far fas fa-fw fa-users nav-icon"></i>
                                <p>Akun</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <i class="far fas fa-fw fa-sign-out-alt nav-icon"></i>
                                <p>Keluar</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>