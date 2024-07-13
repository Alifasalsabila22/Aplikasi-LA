<div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            {{-- <a class="navbar-brand brand-logo mr-5" href="#">
                <div class="d-flex align-items-center">
                    <img src="/dashboard/images/logointan.png" class="mr-2 logo-adjust" alt="logo"
                        style="width: 40px; height: 40px;" />
                    <p class="mb-0 ml-2">PT INTAN PARIWARA PALEMBANG</p>
                </div>
            </a> --}}

            <a class="navbar-brand brand-logo mr-5" href="#">
                <div class="d-flex flex-column align-items-center">
                    <img src="/dashboard/images/logointan.png" class="mb-2 logo-adjust" alt="logo"
                        style="width: 40px; height: 40px;" />
                </div>
            </a>


            <a class="navbar-brand brand-logo-mini" href="#">
                <img src="/dashboard/images/logointan.png" class="logo-adjust-mini" alt="logo" />
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
            </div>
            <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                        <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                            <span class="input-group-text" id="search">
                                <i class="icon-search"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now"
                            aria-label="search" aria-describedby="search">
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown">
                    <i class="icon-user"></i> Admin Gudang
                </li>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('logout') }}">
                            <i class="ti-power-off text-primary"></i> Logout
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
        </div>
    </nav>
</div>

<style>
    .logo-adjust {
        margin-right: 20px;
        /* Sesuaikan nilai jika diperlukan */
    }

    .logo-adjust-mini {
        margin-right: 20px;
        /* Sesuaikan nilai jika diperlukan */
    }
</style>
