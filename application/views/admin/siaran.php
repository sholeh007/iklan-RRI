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
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <a href="<?= base_url('admin/tambahKomersial') ?>" class="btn btn-primary mb-3">
                            <i class="fas fa-plus"></i>Tambah data</a>
                        <h3 class="mb-0">Informasi Komersial</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <?= $this->session->flashdata('flash'); ?>
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pengumuman</th>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                        $no = 1;
                                        foreach ($komersial as $k) : ?>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="mb-0 text-sm"><?= $k->nmPengumuman; ?></span>
                                            </div>
                                        </div>
                                    </th>
                                    <td>
                                        <?= $k->satuan; ?>
                                    </td>
                                    <td>
                                        Rp. <?= number_format($k->harga, 2, ',', '.'); ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/deleteKomersial/'); ?><?= $k->idkomersial; ?>"
                                            class="badge badge-danger" onclick="return confirm('Anda yakin?');">
                                            <i class="fa fa-trash "></i> hapus</a>,<a
                                            href="<?= base_url('admin/editKomersial/'); ?><?= $k->idkomersial; ?>"
                                            class="badge badge-info">
                                            <i class="fa fa-edit "></i> edit</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <a href="<?= base_url('admin/tambahNonKomersial') ?>" class="btn btn-primary mb-3">
                            <i class="fas fa-plus"></i>Tambah data</a>
                        <h3 class="mb-0">Informasi Non Komersial</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <?= $this->session->flashdata('flash2'); ?>
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pengumuman</th>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                        $no = 1;
                                        foreach ($nonKomersial as $n) : ?>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="mb-0 text-sm"><?= $n->nmPengumuman; ?></span>
                                            </div>
                                        </div>
                                    </th>
                                    <td>
                                        <?= $n->satuan; ?>
                                    </td>
                                    <td>
                                        Rp. <?= number_format($n->harga, 2, ',', '.'); ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/deleteNonKomersial/'); ?><?= $n->idnon_komersial; ?>"
                                            class="badge badge-danger" onclick="return confirm('Anda yakin?');">
                                            <i class="fa fa-trash "></i> hapus</a>, <a
                                            href="<?= base_url('admin/editNonKomersial/'); ?><?= $n->idnon_komersial; ?>"
                                            class="badge badge-info">
                                            <i class="fa fa-edit "></i> edit</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php else : ?>
        <?= redirect('auth/block'); ?>
        <?php endif; ?>