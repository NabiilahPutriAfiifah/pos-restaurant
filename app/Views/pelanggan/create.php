<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <form action="<?= base_url('/pelanggan/submit_changes_pelanggan') ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="tipe">Tipe : </label>
                    <input type="text" class="form-control" name="tipe" id="tipe"
                        placeholder="Masukkan Nama Tipe Pelanggan" required>
                </div>
                <div class="form-group">
                    <label for="nama">Penawaran Diskon : </label>
                    <input type="text" step="0.01" min="0" class="form-control" name="discount" id="discount"
                        placeholder="Masukkan Penawaran Discount" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn text-lght" style="background-color: #55596b;">Submit</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>