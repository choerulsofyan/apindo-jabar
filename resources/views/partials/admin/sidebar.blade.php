<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand" style="background-color: #fcfcfc">
        <!--begin::Brand Link-->
        <a href="../index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{ asset('assets/images/logo-apindo.jpg') }}" alt="AdminLTE Logo" class="brand-image" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            {{-- <span class="brand-text fw-light">APINDO JABAR</span> --}}
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="../generate/theme.html"
                        class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('users*', 'roles*', 'permissions*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Manajemen User
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                                class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-user"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}"
                                class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-people-group"></i>
                                <p>Grup User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}"
                                class="nav-link {{ Request::is('permissions*') ? 'active' : '' }}">
                                <i class="nav-icon fa-solid fa-user-shield"></i>
                                <p>Hak Akses</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('news.index') }}" class="nav-link">
                        <i class="nav-icon fa-regular fa-newspaper"></i>
                        <p>Berita</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('organizational-positions.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-user-tie"></i>
                        <p>Jabatan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sectors.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-sitemap"></i>
                        <p>Bidang</p>
                    </a>
                </li>
                {{-- <li class="nav-header">EXAMPLES</li> --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Kepengurusan
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../index.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Bidang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../index2.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Jabatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../index3.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Kepengurusan</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
