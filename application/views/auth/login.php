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
        <div class="flash-data6" data-flashdata6="<?= $this->session->flashdata('message6'); ?>">
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <!-- Notification -->
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>">
            </div>
            <div class="flash-data2" data-flashdata2="<?= $this->session->flashdata('message2'); ?>">
            </div>
            <div class="flash-data3" data-flashdata3="<?= $this->session->flashdata('message3'); ?>">
            </div>
            <div class="flash-data4" data-flashdata4="<?= $this->session->flashdata('message4'); ?>">
            </div>
            <div class="flash-data14" data-flashdata14="<?= $this->session->flashdata('message14'); ?>">
            </div>
            <div class="flash-data15" data-flashdata15="<?= $this->session->flashdata('message15'); ?>">
            </div>
            <div class="flash-data16" data-flashdata16="<?= $this->session->flashdata('message16'); ?>">
            </div>
            <div class="flash-data17" data-flashdata17="<?= $this->session->flashdata('message17'); ?>">
            </div>
            <div class="flash-data22" data-flashdata22="<?= $this->session->flashdata('message22'); ?>">
            </div>
            <div class="flash-data23" data-flashdata23="<?= $this->session->flashdata('message23'); ?>">
            </div>
            <!-- Akhir Notification -->
            <!-- Table -->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <h2>Login</h2>
                            </div>
                            <form role="form" action="<?= base_url('auth/index') ?>" method="post">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Username" type="text" name="username"
                                            value="<?= set_value('username') ?>">
                                    </div>
                                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Password" type="password"
                                            name="password">
                                    </div>
                                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="row">
                                    <a class="nav-link" href="<?= base_url('auth/register'); ?>">
                                        <small>Belum punya akun?Sign Up!</small>
                                    </a>
                                </div>
                                <div class="row">
                                    <a class="nav-link" href="<?= base_url('auth/lupaPassword'); ?>">
                                        <small>Lupa password?</small>
                                    </a>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>