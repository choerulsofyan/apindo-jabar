<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand" style="background-color: #fcfcfc">
        <a href="../index.html" class="brand-link">
            <img src="{{ asset('assets/images/logo-apindo.jpg') }}" alt="AdminLTE Logo" class="brand-image" />
            {{-- <span class="brand-text fw-light">APINDO JABAR</span> --}}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="../generate/theme.html"
                        class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @canany(['USER_LIST', 'GRUP_USER_LIST', 'HAK_AKSES_LIST'])
                    <li class="nav-item {{ Request::is('users*', 'roles*', 'permissions*') ? 'menu-open' : '' }}">
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
                                    <a href="{{ route('users.index') }}"
                                        class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                                        <i class="nav-icon fa-solid fa-user"></i>
                                        <p>User</p>
                                    </a>
                                </li>
                            @endcan
                            @can('GRUP_USER_LIST')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}"
                                        class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
                                        <i class="nav-icon fa-solid fa-people-group"></i>
                                        <p>Grup User</p>
                                    </a>
                                </li>
                            @endcan
                            @can('HAK_AKSES_LIST')
                                <li class="nav-item">
                                    <a href="{{ route('permissions.index') }}"
                                        class="nav-link {{ Request::is('permissions*') ? 'active' : '' }}">
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
                        <a href="{{ route('news.index') }}" class="nav-link {{ Request::is('news*') ? 'active' : '' }}">
                            <i class="nav-icon fa-regular fa-newspaper"></i>
                            <p>Berita</p>
                        </a>
                    </li>
                @endcan
                @can('KEANGGOTAAN_LIST')
                    <li class="nav-item">
                        <a href="{{ route('members.index') }}"
                            class="nav-link {{ Request::is('members*') ? 'active' : '' }}">
                            <i class="nav-icon fa-regular fa-user"></i>
                            <p>Keanggotaan</p>
                        </a>
                    </li>
                @endcan
                @can('REGULASI_LIST')
                    <li class="nav-item">
                        <a href="{{ route('regulations.index') }}"
                            class="nav-link {{ Request::is('regulations*') ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fa-file-contract"></i>
                            <p>Regulation</p>
                        </a>
                    </li>
                @endcan
                @can('LOG_LIST')
                    <li class="nav-item">
                        <a href="{{ route('activity-logs.index') }}"
                            class="nav-link {{ Request::is('activity-logs*') ? 'active' : '' }}">
                            <i class="nav-icon fa-solid fa-clock-rotate-left"></i>
                            <p>Logs</p>
                        </a>
                    </li>
                @endcan
                @canany(['BIDANG_LIST', 'DEWAN_LIST', 'JABATAN_LIST', 'KEPENGURUSAN_LIST'])
                    <li
                        class="nav-item {{ Request::is('managements*', 'sectors*', 'organizational-positions*', 'councils*') ? 'menu-open' : '' }}">
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
                                    <a href="{{ route('sectors.index') }}"
                                        class="nav-link {{ Request::is('sectors*') ? 'active' : '' }}">
                                        <i class="nav-icon fa-solid fa-sitemap"></i>
                                        <p>Bidang</p>
                                    </a>
                                </li>
                            @endcan
                            @can('DEWAN_LIST')
                                <li class="nav-item">
                                    <a href="{{ route('councils.index') }}"
                                        class="nav-link {{ Request::is('councils*') ? 'active' : '' }}">
                                        <i class="nav-icon fa-solid fa-users-rectangle"></i>
                                        <p>Dewan</p>
                                    </a>
                                </li>
                            @endcan
                            @can('JABATAN_LIST')
                                <li class="nav-item">
                                    <a href="{{ route('organizational-positions.index') }}"
                                        class="nav-link {{ Request::is('organizational-positions*') ? 'active' : '' }}">
                                        <i class="nav-icon fa-solid fa-user-tie"></i>
                                        <p>Jabatan</p>
                                    </a>
                                </li>
                            @endcan
                            @can('KEPENGURUSAN_LIST')
                                <li class="nav-item">
                                    <a href="{{ route('managements.index') }}"
                                        class="nav-link {{ Request::is('managements*') ? 'active' : '' }}">
                                        <i class="nav-icon fa-solid fa-people-roof"></i>
                                        <p>Kepengurusan</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
            </ul>
        </nav>
    </div>
</aside>
