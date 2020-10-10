<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="<?= base_url('user/index'); ?>">
            <img src="<?= base_url('assets/img/brand/RRI.jpg'); ?>" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder"
                                src="<?= base_url('assets/img/profile/') . $panggilan['image']; ?>">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>
                    <a href="<?= base_url('user/myProfile'); ?>" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>
                    <a href="<?= base_url('user/ubahPassword'); ?>" class="dropdown-item">
                        <i class="ni ni-key-25"></i>
                        <span>Change Password</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="<?= base_url('user/index'); ?>">
                            <img src="<?= base_url('assets/img/brand/RRI.jpg'); ?>">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class=" nav-link " href=" <?= base_url('user/index'); ?>"> <i
                            class="ni ni-tv-2 text-primary"></i>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('user/order'); ?>">
                        <i class="ni ni-basket text-warning"></i> Pemesanan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('user/riwayat'); ?>">
                        <i class="fas fa-history text-info"></i> Riwayat Pemesanan
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                        <i class="ni ni-spaceship text-info"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>