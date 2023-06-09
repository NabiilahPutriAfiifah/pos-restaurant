<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <form action="<?= base_url('/supplier/submit_changes_supplier') ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group">
                    <label for="nama">No.Telp/WA</label>
                    <input type="number" class="form-control" name="no_telp" id="no_telp"
                        placeholder="Masukkan Nomor Telepon" required>
                </div>
                <div class="form-group">
                    <label for="nama">email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan Email"
                        required>
                </div>
                <div class="form-group">
                    <label for="nama">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn text-light" style="background-color: #55596b;">Submit</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>