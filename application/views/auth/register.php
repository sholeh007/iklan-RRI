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
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <!-- Table -->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <h2>Sign Up</h2>
                            </div>
                            <form role="form" action="<?= base_url('auth/register'); ?>" method="post">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Name" type="text" name="nama"
                                            value="<?= set_value('nama'); ?>">
                                    </div>
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Username" type="text" name="username"
                                            value="<?= set_value('username'); ?>">
                                    </div>
                                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Email" type="text" name="email"
                                            value="<?= set_value('email'); ?>">
                                    </div>
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
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
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Repeat Password" type="password"
                                            name="password2">
                                    </div>
                                    <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="row my-3">
                                    <a class="nav-link" href="<?= base_url('auth/index'); ?>">
                                        <small>Sudah punya akun?Login!</small>
                                    </a>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4">Create account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>