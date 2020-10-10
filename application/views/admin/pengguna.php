<?php if ($this->session->userdata('role_id') == 1) : ?>
<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="<?= base_url('admin/pengguna'); ?>">User Manajemen</a>
            <!-- Form -->
            <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto"
                action="<?= base_url('admin/pengguna'); ?>" method="POST">
                <div class="form-group mb-0">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control" placeholder="Search" type="text" name="keyword" autocomplete="off">
                    </div>
                    <input type="submit" class="btn btn-success" name="submit" value="cari">
                </div>
            </form>
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
    <div class="flash-data24" data-flashdata24="<?= $this->session->flashdata('message24'); ?>">
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <a href="<?= base_url('admin/addUser') ?>" class="btn btn-primary mb-3">
                            <i class="fas fa-plus"></i>Tambah Admin</a>
                        <h3 class="mb-0">User Information</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                        foreach ($pengguna as $s) : ?>
                                    <td>
                                        <?= ++$start; ?>
                                    </td>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="mb-0 text-sm"><?= $s->nama; ?></span>
                                            </div>
                                        </div>
                                    </th>
                                    <td>
                                        <?= $s->username; ?>
                                    </td>
                                    <td>
                                        <?= $s->role; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            <?= $this->pagination->create_links(); ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <?php else : ?>
        <?= redirect('auth/block'); ?>
        <?php endif; ?>