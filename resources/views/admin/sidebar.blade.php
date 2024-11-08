<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false">
                        <i class="mdi me-2 mdi-gauge"></i><span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('pages-profile') ? 'active' : '' }}">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-profile.html" aria-expanded="false">
                        <i class="mdi me-2 mdi-account-check"></i><span class="hide-menu">Profile</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('tabel*') ? 'active' : '' }}">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi me-2 mdi-table"></i><span class="hide-menu">Tabel</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item {{ Request::is('types') ? 'active' : '' }}">
                        <a href="{{ route('types.index') }}" class="sidebar-link">
                            <i class="mdi mdi-table-large"></i><span class="hide-menu">Tabel Tipe</span>
                        </a>
                    </li>

                        <li class="sidebar-item {{ Request::is('quizzes') ? 'active' : '' }}">
                            <a href="{{ route('quizzes.index') }}" class="sidebar-link">
                                <i class="mdi mdi-table-large"></i><span class="hide-menu">Tabel Kuis</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Request::is('questions') ? 'active' : '' }}">
                            <a href="{{ route('questions.index') }}" class="sidebar-link">
                                <i class="mdi mdi-table-large"></i><span class="hide-menu">Tabel Pertanyaan</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Request::is('scores') ? 'active' : '' }}">
                            <a href="{{ route('scores.index') }}" class="sidebar-link">
                                <i class="mdi mdi-table-large"></i><span class="hide-menu">Tabel Skor</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <div class="sidebar-footer">
        <div class="row">
            <div class="col-4 link-wrap">
                <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="ti-settings"></i></a>
            </div>
            <div class="col-4 link-wrap">
                <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="mdi mdi-gmail"></i></a>
            </div>
            <div class="col-4 link-wrap">
                <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="mdi mdi-power"></i></a>
            </div>
        </div>
    </div>
</aside>
