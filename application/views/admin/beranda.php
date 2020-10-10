  <?php if ($this->session->userdata('role_id') == 1) : ?>
  <div class="main-content">
      <!-- Navbar -->
      <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
          <div class="container-fluid">
              <!-- Brand -->
              <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                  href="<?= base_url('admin/index'); ?>">Home</a>

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
          <div class="container-fluid">
              <div class="header-body">
                  <!-- Card stats -->
                  <div class="row">
                      <div class="col-xl-3 col-lg-6">
                          <div class="card card-stats mb-4 mb-xl-0">
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col">
                                          <h5 class="card-title text-uppercase text-muted mb-0">User</h5>
                                          <span
                                              class="h2 font-weight-bold mb-0"><?= $this->db->get('user')->num_rows();  ?></span>
                                      </div>
                                      <div class="col-auto">
                                          <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                              <i class="fas fa-users"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-3 col-lg-6">
                          <div class="card card-stats mb-4 mb-xl-0">
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col">
                                          <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Pesanan</h5>
                                          <span
                                              class="h2 font-weight-bold mb-0"><?= $this->db->get('pesan')->num_rows(); ?></span>
                                      </div>
                                      <div class="col-auto">
                                          <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                              <i class="fas fa-chart-bar"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- <div class="flash-data5" data-flashdata5="<?= $this->session->flashdata('message5'); ?>">
      </div> -->
      <div class="container-fluid mt--3">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-header bg-transparent">
                          <h1>Selamat Datang <?= $panggilan['nama']; ?></h1>
                      </div>
                  </div>
              </div>
          </div>
          <?php else : ?>
          <?= redirect('auth/block'); ?>
          <?php endif; ?>