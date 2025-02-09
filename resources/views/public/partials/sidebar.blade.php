<aside class="sticky-top">
    <div class="d-flex flex-column p-3" style="width: 280px; min-height: 100vh; background-color: #f8f9fa;">
        <h5 class="fw-bolder">TENTANG KAMI</h5>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('history') }}" class="nav-link {{ Request::routeIs('history') ? 'active' : '' }}"
                    aria-current="page">
                    Sejarah
                </a>
            </li>
            <li>
                <a href="{{ route('vision-mission') }}"
                    class="nav-link {{ Request::routeIs('vision-mission') ? 'active' : '' }}">
                    Visi & Misi
                </a>
            </li>
            <li>
                <a href="{{ route('sectors') }}" class="nav-link {{ Request::routeIs('sectors') ? 'active' : '' }}">
                    Bidang
                </a>
            </li>
            <li>
                <a href="{{ route('dpkApindoJabar') }}"
                    class="nav-link {{ Request::routeIs('dpkApindoJabar') ? 'active' : '' }}">
                    DPK APINDO Jabar
                </a>
            </li>
        </ul>
    </div>
</aside>
