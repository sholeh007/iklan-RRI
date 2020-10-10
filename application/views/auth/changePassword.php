<div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container mt--8 pb-5">
    <!-- Notification -->
    <div class="flash-data18" data-flashdata18="<?= $this->session->flashdata('message18'); ?>">
    </div>
    <div class="flash-data19" data-flashdata19="<?= $this->session->flashdata('message19'); ?>">
    </div>
    <!-- Akhir Notification -->
    <!-- Table -->
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        <h2>Reset Password untuk <?= $this->session->userdata('reset_email'); ?> </h2>
                    </div>
                    <form role="form" action="<?= base_url('auth/changePassword') ?>" method="post">
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                <input class="form-control" placeholder="Masukkan password baru" type="password"
                                    name="password">
                            </div>
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                <input class="form-control" placeholder="Konfirmasi password baru" type="password"
                                    name="password2">
                            </div>
                            <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-4">Ubah Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>