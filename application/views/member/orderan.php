<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="<?= base_url('user/order'); ?>">Pesanan</a>

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
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->

    </div>
    <!-- Page content -->
    <div class="flash-data11" data-flashdata11="<?= $this->session->flashdata('message11'); ?>">
    </div>
    <div class="container-fluid mt--7">
        <!-- Table -->
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">list harga Non Komersial <b>('Pemda, LSM $ Dunia Pendidikan')</b></h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pengumuman</th>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Tarif</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($komersial as $k) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $k->nmPengumuman; ?></td>
                                    <td><?= $k->satuan; ?></td>
                                    <td><?= number_format($k->harga, 2, ',', '.'); ?></td>
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
                        <h3 class="mb-0">list harga Komersial <b>('Swasta')</b></h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pengumuman</th>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Tarif</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($nonKomersial as $n) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $n->nmPengumuman; ?></td>
                                    <td><?= $n->satuan; ?></td>
                                    <td><?= number_format($n->harga, 2, ',', '.'); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3">
        <!-- Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Form Pemesanan Iklan</b></h3>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <form action="<?= base_url('user/order'); ?>" method="post">
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                value="<?= set_value('nama'); ?>">
                                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <legend class="col-form-label col-sm-4 pt-0">Pengumuman</legend>
                                            <div class="col-sm-8">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pengumuman"
                                                        id="pengumuman" value="Non Komersial"
                                                        <?= set_radio('pengumuman', 'Non Komersial'); ?> />
                                                    <label class="form-check-label" for="pengumuman">
                                                        Non Komersial
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pengumuman"
                                                        id="pengumuman2" value="Komersial"
                                                        <?= set_radio('pengumuman', 'Komersial'); ?> />
                                                    <label class="form-check-label" for="pengumuman2">
                                                        Komersial
                                                    </label>
                                                </div>
                                                <?= form_error('pengumuman', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group row">
                                        <label for="jenis" class="col-sm-4 col-form-label">Jenis Siaran</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="jenis" name="jenis">
                                                <option>-- pilih --</option>
                                                <?php foreach ($jenis as $j) : ?>
                                                <option value="<?= $j->idjenis_siaran; ?>"><?= $j->jasaSiaran; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="jumlah" name="jumlah"
                                                value="<?= set_value('jumlah'); ?>">
                                            <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="telpon" class="col-sm-4 col-form-label">No Telp</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="telpon" name="telpon"
                                                value="<?= set_value('telpon'); ?>">
                                            <?= form_error('telpon', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                value="<?= set_value('tanggal'); ?>">
                                            <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="waktu" class="col-sm-4 col-form-label">Waktu Tayang</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="waktu" name="waktu">
                                                <option>-- pilih --</option>
                                                <?php foreach ($jadwal as $j) : ?>
                                                <option value="<?= $j->idsiar; ?>"><?= $j->waktu; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Pesan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>