<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand" style="background-color: #fcfcfc">
        <a href="{{ route('mindo.home') }}" class="brand-link">
            <img src="{{ asset('assets/images/logo-apindo.jpg') }}" alt="AdminLTE Logo" class="brand-image" />
            {{-- <span class="brand-text fw-light">APINDO JABAR</span> --}}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('mindo.home') }}"
                        class="nav-link {{ Request::routeIs('mindo/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @canany(['USER_LIST', 'GRUP_USER_LIST', 'HAK_AKSES_LIST'])
                    <li
                        class="nav-item {{ Request::is('mindo/users*', 'mindo/roles*', 'mindo/permissions*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa-solid fa-users"></i>
                            <p>
                                Manajemen User
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('USER_LIST')
                                <li class="nav-item">
                                    <a href="{{ route('mindo.users.index') }}"
                                        class="nav-link {{ Request::is('mindo/users*') ? 'active' : '' }}">
                                        <i class="nav-icon fa-solid fa-user"></i>
                                        <p>User</p>
                                    </a>
                                </li>
                            @endcan
                            @can('GRUP_USER_LIST')
                                <li class="nav-item">
                                    <a href="{{ route('mindo.roles.index') }}"
                                        class="nav-link {{ Request::is('mindo/roles*') ? 'active' : '' }}">
                                        <i class="nav-icon fa-solid fa-people-group"></i>
                                        <p>Grup User</p>
                                    </a>
                                </li>
                            @endcan
                            @can('HAK_AKSES_LIST')
                                <li class="nav-item">
                                    <a href="{{ route('mindo.permissions.index') }}"
                                        class="nav-link {{ Request::is('mindo/permissions*') ? 'active' : '' }}">
                                        <i class="nav-icon fa-solid fa-user-shield"></i>
                                        <p>Hak Akses</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                @can('BERITA_LIST')
                    <li class="nav-item">
                        <a href="{{ route('mindo.news.index') }}"
                            class="nav-link {{ Request::is('mindo/news*') ? 'active' : '' }}">
                            <i class="nav-icon fa-regular fa-newspaper"></i>
                            <p>Berita</p>
                        </a>
                    </li>
                @endcan

                @can('KEGIATAN_LIST')
                    <li class="nav-item">
                        <a href="{{ route('mindo.activities.index') }}"
                            class="nav-link {{ Request::is('mindo/activities*') ? 'active' : '' }}">
                            <i class="nav-icon fa-regular fa-calendar-days"></i>
                            <p>Kegiatan</p>
                        </a>
                    </li>
                @endcan

                @can('KEANGGOTAAN_LIST')
                    <li class="nav-item">
                        <a href="{{ route('mindo.members.index') }}"
                            class="nav-link {{ Request::is('mindo/members*') ? 'active' : '' }}">
                            <i class="nav-icon fa-regular fa-user"></i>
                            <p>Keanggotaan</p>
                        </a>
                    </li>
                @endcan

                @can('REGULASI_LIST')
                    <li class="nav-item">
                        <a href="{{ route('mindo.regulations.index') }}"
                            class="nav-link {{ Request::is('mindo/regulations*') ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fa-file-contract"></i>
                            <p>Regulasi</p>
                        </a>
                    </li>
                @endcan
                @can('LOG_LIST')
                    <li class="nav-item">
                        <a href="{{ route('mindo.activity-logs.index') }}"
                            class="nav-link {{ Request::is('mindo/activity-logs*') ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fa-clock-rotate-left"></i>
                            <p>Logs</p>
                        </a>
                    </li>
                @endcan
                @canany(['BIDANG_LIST', 'DEWAN_LIST', 'JABATAN_LIST', 'KEPENGURUSAN_LIST'])
                    <li
                        class="nav-item {{ Request::is('mindo/managements*', 'mindo/sectors*', 'mindo/organizational-positions*', 'mindo/councils*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa-solid fa-users"></i>
                            <p>
                                Kepengurusan
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('BIDANG_LIST')
                                <li class="nav-item">
                                    <a href="{{ route('mindo.sectors.index') }}"
                                        class="nav-link {{ Request::is('mindo/sectors*') ? 'active' : '' }}">
                                        <i class="nav-icon fa-solid fa-sitemap"></i>
                                        <p>Bidang</p>
                                    </a>
                                </li>
                            @endcan
                            @can('DEWAN_LIST')
                                <li class="nav-item">
                                    <a href="{{ route('mindo.councils.index') }}"
                                        class="nav-link {{ Request::is('mindo/councils*') ? 'active' : '' }}">
                                        <i class="nav-icon fa-solid fa-users-rectangle"></i>
                                        <p>Dewan</p>
                                    </a>
                                </li>
                            @endcan
                            @can('JABATAN_LIST')
                                <li class="nav-item">
                                    <a href="{{ route('mindo.organizational-positions.index') }}"
                                        class="nav-link {{ Request::is('mindo/organizational-positions*') ? 'active' : '' }}">
                                        <i class="nav-icon fa-solid fa-user-tie"></i>
                                        <p>Jabatan</p>
                                    </a>
                                </li>
                            @endcan
                            @can('KEPENGURUSAN_LIST')
                                <li class="nav-item">
                                    <a href="{{ route('mindo.managements.index') }}"
                                        class="nav-link {{ Request::is('mindo/managements*') ? 'active' : '' }}">
                                        <i class="nav-icon fa-solid fa-people-roof"></i>
                                        <p>Kepengurusan</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                @can('GALERI_LIST')
                    <li class="nav-item">
                        <a href="{{ route('mindo.galeri.index') }}"
                            class="nav-link {{ Request::is('mindo/galeri*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-image"></i>
                            <p>Galeri</p>
                        </a>
                    </li>
                @endcan

                @can('PESAN_LIST')
                    <li class="nav-item">
                        <a href="{{ route('mindo.pesan.index') }}"
                            class="nav-link {{ Request::is('mindo/pesan*') ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fa-file-contract"></i>
                            <p>Pesan</p>
                        </a>
                    </li>
                @endcan

                @can('TESTIMONI_LIST')
                    <li class="nav-item">
                        <a href="{{ route('mindo.testimoni.index') }}"
                            class="nav-link {{ Request::is('mindo/testimoni*') ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fa-comment-dots"></i>
                            <p>Testimoni</p>
                        </a>
                    </li>
                @endcan

            </ul>
        </nav>
    </div>
</aside>
