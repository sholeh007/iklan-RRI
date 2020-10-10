<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="<?= base_url('user/myProfile'); ?>">User
                Profile</a>

            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder"
                                    src="<?= base_url('assets/img/profile/') . $panggilan['image']; ?>">
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
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
        style="min-height: 600px; background-image: url(<?= base_url('assets/img/profile/') . $panggilan['image']; ?>); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->

    </div>
    <!-- Page content -->
    <div class="flash-data8" data-flashdata8="<?= $this->session->flashdata('message8'); ?>">
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">My account</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('user/editProfile'); ?>
                        <h6 class="heading-small text-muted mb-4">Edit Profile</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Username</label>
                                        <input type="text" class="form-control form-control-alternative "
                                            value="<?= $panggilan['username']; ?>" name="username" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Email address</label>
                                        <input type="email" class="form-control form-control-alternative"
                                            value="<?= $panggilan['email']; ?>" name="email" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Nama</label>
                                        <input type="text" class="form-control form-control-alternative"
                                            value="<?= $panggilan['nama']; ?>" name="nama">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Gambar</label>
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/img/profile/') . $panggilan['image']; ?>"
                                                class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-12 pt-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="gambar">
                                                <label for="gambar" class="custom-file-label">Pilih File</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary mt-3">Edit</button>
                                    <a href="<?= base_url('user/myProfile'); ?>">
                                        <button type="button" class="btn btn-danger mt-3">Kembali</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>