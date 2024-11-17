<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::is('Home_user') ? 'active' : '' }}"
                        href="/Home_user" aria-expanded="false">
                        <i class="mdi me-2 mdi-gauge"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('pages-profile') ? 'active' : '' }}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/profile" aria-expanded="false">
                        <i class="mdi me-2 mdi-account-check"></i><span class="hide-menu">Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi me-2 mdi-table"></i>
                        <span class="hide-menu">Kuis</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="/kuis-kecerdasan" class="sidebar-link {{ Request::is('kuis-kecerdasan') ? 'active' : '' }}">
                            <i class="mdi mdi-lightbulb-on"></i>
                                <span class="hide-menu">Kuis Kecerdasan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/kuis-kecerdasan" class="sidebar-link {{ Request::is('kuis-kepribadian') ? 'active' : '' }}">
                            <i class="mdi mdi-heart"></i>
                                <span class="hide-menu">Kuis Kepribadian</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/kuis-kecerdasan" class="sidebar-link {{ Request::is('kuis-kecermatan') ? 'active' : '' }}">
                            <i class="mdi mdi-eye"></i>
                                <span class="hide-menu">Kuis Kecermatan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/kuis-kecerdasan" class="sidebar-link {{ Request::is('kuis-cpns') ? 'active' : '' }}">
                            <i class="mdi mdi-clipboard-check"></i>
                                <span class="hide-menu">Kuis CPNS</span>
                            </a>
                        </li>
                    </ul>
                </li>
               
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::is('riwayat-skor') ? 'active' : '' }}"
                        href="/riwayat-skor" aria-expanded="false">
                        <i class="mdi mdi-history"></i>
                        <span class="hide-menu">Riwayat Kuis</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::is('login') ? 'active' : '' }}"
                        href="/login" aria-expanded="false">
                        <i class="mdi me-2 mdi-logout"></i>
                        <span class="hide-menu">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
