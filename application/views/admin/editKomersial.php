<?php if ($this->session->userdata('role_id') == 1) : ?>
<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="<?= base_url('admin/siaran'); ?>">Siaran</a>
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
                        <a href="<?= base_url('admin/myProfile'); ?>" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My profile</span>
                        </a>
                        <a href="<?= base_url('admin/ubahPassword'); ?>" class="dropdown-item">
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

    </div>
    <div class="container-fluid mt--3">
        <div class="row">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Edit Data Komersial</h3>
                    </div>
                    <form action="" method="POST">
                        <input type="hidden" name="idkomersial" id="id" value="<?= $komersial['idkomersial']; ?>">
                        <div class="form-group">
                            <label for="pengumuman">Nama Pengumuman</label>
                            <input type="text" class="form-control" id="pengumuman" name="pengumuman"
                                value="<?= $komersial['nmPengumuman']; ?>">
                            <?= form_error('pengumuman', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control" id="satuan" name="satuan"
                                value="<?= $komersial['satuan']; ?>">
                            <?= form_error('satuan', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga"
                                value="<?= $komersial['harga']; ?>">
                            <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <a href="<?= base_url('admin/siaran'); ?>">
                            <badge class="btn btn-info">Kembali</badge>
                        </a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <?php else : ?>
        <?= redirect('auth/block'); ?>
        <?php endif; ?>