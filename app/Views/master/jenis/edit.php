<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <form action="<?= base_url('master/update_jenis/'.$data['id']) ?>" method="post">
            <div class="card-body">

                <div class="form-group">
                    <label for="nama">Jenis :</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-arrows-alt-h"></i></span>
                        </div>
                        <input type="text" class="form-control" name="jenis" id="jenis"
                            placeholder="Masukan Ukuran Baru" required
                            value="<?= isset($data['jenis']) ? $data['jenis'] : '' ?>">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn text-light" style="background-color: #55596b;">Submit</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>