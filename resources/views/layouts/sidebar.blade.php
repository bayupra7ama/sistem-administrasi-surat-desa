<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SD</a>
        </div>
        <ul class="sidebar-menu">
            @if (auth()->user()->role == 'penduduk')
                <li class="menu-header">Dashboard</li>
                <li class="{{ request()->routeIs('dashboard.penduduk') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('dashboard.penduduk') }}"><i class="fas fa-home"></i>
                        <span>Dashboard</span></a>
                </li>
                <li class="menu-header">Layanan</li>
                <li class="dropdown {{ request()->is('penduduk/pengajuan/*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i>
                        <span>Pengajuan Surat</span></a>
                    <ul class="dropdown-menu">
                        @foreach (\App\Models\JenisSurat::all() as $item)
                            <li
                                class="{{ Route::currentRouteName() == 'pengajuan.form' && request()->route('kode') == $item->kode ? 'active' : '' }}">
                                <a class="nav-link"
                                    href="{{ route('pengajuan.form', $item->kode) }}">{{ $item->kode }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="{{ request()->routeIs('penduduk.riwayat.surat') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('penduduk.riwayat.surat') }}"><i class="fas fa-qrcode"></i>
                        <span>Riwayat
                            Surat</span></a></li>
            @endif

            @if (auth()->user()->role == 'admin')
                <li class="menu-header">Dashboard</li>
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('dashboard') }}"><i class="fas fa-home"></i>
                        <span>Dashboard</span></a>
                </li>
                <li class="menu-header">Profil</li>
                <li
                    class="{{ request()->is('admin/profilDesa') || request()->is('admin/profilDesa/*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('profilDesa.index') }}"><i class="fas fa-fire"></i> <span>Profil
                            Desa</span></a>
                </li>
                <li class="menu-header">User & Master</li>
                <li
                    class="dropdown {{ request()->is('admin/penduduk') ||
                    request()->is('admin/penduduk/*') ||
                    request()->is('admin/admin') ||
                    request()->is('admin/admin/*')
                        ? 'active'
                        : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i>
                        <span>Data User</span></a>
                    <ul class="dropdown-menu">
                        <li
                            class="{{ request()->is('admin/penduduk') || request()->is('admin/penduduk/*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('penduduk.index') }}">Penduduk</a>
                        </li>
                        <li
                            class="{{ request()->is('admin/admin') || request()->is('admin/admin/*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.index') }}">Pengurus</a>
                        </li>
                    </ul>
                </li>
                <li
                    class="dropdown {{ request()->is('admin/waktu-pelayanan') ||
                    request()->is('admin/waktu-pelayanan/*') ||
                    request()->is('admin/jenis-surat') ||
                    request()->is('admin/jenis-surat/*')
                        ? 'active'
                        : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                        <span>Data Master</span></a>
                    <ul class="dropdown-menu">
                        <li
                            class="{{ request()->is('admin/jenis-surat') || request()->is('admin/jenis-surat/*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('jenis-surat.index') }}">Surat</a>
                        </li>
                        <li
                            class="{{ request()->is('admin/waktu-pelayanan') || request()->is('admin/waktu-pelayanan/*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('waktu-pelayanan.index') }}">Waktu Pelayanan</a>
                        </li>

                    </ul>
                </li>
                <li class="menu-header">Layanan</li>
                <li class="dropdown {{ request()->is('admin/pengajuan/*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i>
                        <span>Pengajuan Surat</span></a>
                    <ul class="dropdown-menu">
                        @foreach (\App\Models\JenisSurat::all() as $item)
                            <li
                                class="{{ Route::currentRouteName() == 'pengajuan.list' && request()->route('kode') == $item->kode ? 'active' : '' }}">
                                <a class="nav-link"
                                    href="{{ route('pengajuan.list', $item->kode) }}">{{ $item->kode }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="menu-header">Laporan & Grafik</li>
                <li class="{{ request()->routeIs('grafik.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('grafik.index') }}">
                        <i class="fas fa-chart-line"></i>
                        <span>Performa Kinerja</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.pengajuan.riwayat') ? 'active' : '' }}"><a class="nav-link "
                        href="{{ route('admin.pengajuan.riwayat') }}"><i class="fas fa-qrcode"></i>
                        <span>Riwayat Surat</span></a></li>
            @endif
        </ul>
    </aside>

</div>
