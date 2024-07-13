<div class="container-scroller " >
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
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

                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " style="border: solid 1px; color: blueviolet     " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user mr-2"></i>{{auth()->user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <i class="ti-power-off text-primary"></i> Logout
                        </a>
                    </div>
                </div>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
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
