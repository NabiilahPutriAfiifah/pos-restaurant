<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <form action="<?= base_url('master/submit_changes_menu') ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Kode menu : </label>
                    <input type="text" class="form-control" name="kode_menu" id="kode_menu"
                        placeholder="Masukan Kode menu" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama menu : </label>
                    <input type="text" class="form-control" name="nama_menu" id="nama_menu"
                        placeholder="Masukan Nama menu" required>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori:</label>
                    <select class="form-control select2" name="kategori" id="kategori">
                        <option disabled selected hidden>Pilih Kategori</option>
                        <?php foreach($kategori as $k){?>
                        <option value="<?= $k->id; ?>"><?= $k->kategori; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis">jenis : </label>
                    <select class="form-control select2" name="jenis" id="jenis">
                        <option disabled selected hidden>Pilih jenis</option>
                        <?php foreach($jenis as $u){?>
                        <option value="<?php echo $u->id; ?>"><?php echo $u->jenis; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="supplier">Supplier : </label>
                    <select class="form-control select2" name="supplier" id="supplier">
                        <option disabled selected hidden>Pilih Supplier</option>
                        <?php foreach($supplier as $s){?>
                        <option value="<?php echo $s->id; ?>"><?php echo $s->nama; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga">Harga menu : </label>
                    <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukan Harga menu"
                        required>
                </div>
                <div class="form-group">
                    <label for="stok">Stok menu : </label>
                    <input type="number" class="form-control" name="stok" id="stok" placeholder="Masukan Stok menu"
                        required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn text-light" style="background-color: #55596b;">Submit</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>