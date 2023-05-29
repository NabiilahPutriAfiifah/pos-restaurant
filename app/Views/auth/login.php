<?= $this->extend('auth/templates') ?>
<?= $this->section('content') ?>


<div class="login-box">
    <div class="login-logo" style="color:white;">
        <a><b>Pos</b>Restaurant</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to dashboard</p>
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo session()->getFlashdata('error'); ?>
            </div>
            <?php endif; ?>

            <form action="<?= base_url('/login/process'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">

                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn text-light btn-block" style="background-color: #55596b;">Sign
                            In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->

            <!-- <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="register.html" class="text-center">Register a new membership</a>
            </p> -->
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->


<?= $this->endSection() ?>