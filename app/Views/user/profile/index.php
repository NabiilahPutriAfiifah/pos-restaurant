<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="img-fluid img-circle avatar" src="/public/asset/image/avatar.jpg">
                    </div>
                    <h3 class="profile-username text-center"></h3>
                    <p class="text-muted text-center">Tanggal Daftar :
                        <?= esc(date('d M Y', strtotime($user->created_at))); ?></p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" id="nama"
                                value="<?= isset($data['nama']) ? $data['nama'] : '' ?>">
                            <small class="invalid-feedback"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" id="username"
                                value="<?= isset($data['username']) ? $data['username'] : '' ?>">
                            <small class="invalid-feedback"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Alamat Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email"
                                value="<?= isset($data['email']) ? $data['email'] : '' ?>">
                            <small class="invalid-feedback"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="password"
                                autocomplete="off">
                            <small class="text-danger">Kosongkan jika tidak ingin di ganti!</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea name="alamat" id="alamat"
                                class="form-control"><?= isset($data['alamat']) ? $data['alamat'] : ''; ?></textarea>
                            <small class="invalid-feedback"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="avatar" class="col-sm-2 col-form-label">Photo Profile</label>
                        <div class="col-sm-2 d-none">
                            <img class="img-thumbnail" id="img-preview">
                        </div>
                        <div class="col-sm-4">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="avatar" name="avatar">
                                <label class="custom-file-label" for="avatar">Upload Photo</label>
                                <small class="invalid-feedback"></small>
                            </div>
                        </div>
                    </div>

                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<?= $this->endSection() ?>