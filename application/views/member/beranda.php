<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="<?= base_url('user/index'); ?>">Home</a>
            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img src="<?= base_url('assets/img/profile/') . $panggilan['image']; ?>">
                            </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold"><?= $panggilan['nama']; ?></span>
                            </div>
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
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">

                </div>
            </div>
        </div>
    </div>
    <!-- <div class="flash-data5" data-flashdata5="<?= $this->session->flashdata('message5'); ?>">
    </div> -->
    <div class="container-fluid mt--3">
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-danger pb-5">
                    <div class="card-header bg-transparent">
                        <h2 class="text-light">Tanggal <?= date('d-m-Y'); ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header bg-transparent">
                        <h1>Selamat Datang <?= $panggilan['nama']; ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header bg-transparent">
                        <h2>LEMBAGA PENYIARAN PUBLIK
                        </h2>
                        <H2>RADIO REPUBLIK INDONESIA</H2>
                        <H2>NUSANTARA 1 JAYAPURA</H2>
                        <h3>Alamat : Jl. Tasangkapura No. 23 Jayapura - Papua</h3>
                        <h5>Telp. xxxx-xxxx-xxxx</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>