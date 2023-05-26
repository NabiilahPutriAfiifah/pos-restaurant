<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <form action="<?= base_url('master/submit_changes_menu') ?>" method="post">
            <input type="hidden" name="id" value="<?= isset($data['id']) ? $data['id'] : '' ?>">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Kode Menu : </label>
                    <input type="text" class="form-control" name="kode_menu" id="kode_menu"
                        placeholder="Masukan Kode menu" required
                        value="<?= isset($data['kode_menu']) ? $data['kode_menu'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Menu : </label>
                    <input type="text" class="form-control" name="nama_menu" id="nama_menu"
                        placeholder="Masukan Nama menu" required
                        value="<?= isset($data['nama_menu']) ? $data['nama_menu'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori:</label>
                    <select class="form-control select2" name="kategori" id="kategori">
                        <option disabled selected hidden>Pilih Kategori</option>
                        <?php foreach($kategori as $key => $value){?>
                        <option value="<?= $value->id; ?>"
                            <?= isset($data['id_kategori']) && $data['id_kategori'] == $value->id ? 'selected' : ''; ?>>
                            <?= $value->kategori; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kategori">Jenis : </label>
                    <select class="form-control select2" name="jenis" id="jenis">
                        <option disabled selected hidden>Pilih jenis</option>
                        <?php foreach($jenis as $key => $value){?>
                        <option value="<?= $value->id; ?>"
                            <?= isset($data['id_jenis']) && $data['id_jenis'] == $value->id ? 'selected' : ''; ?>>
                            <?= $value->jenis; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kategori">Supplier : </label>
                    <select class="form-control select2" name="supplier" id="supplier">
                        <option disabled selected hidden>Pilih Supplier</option>
                        <?php foreach($supplier as $key => $value){?>
                        <option value="<?= $value->id; ?>"
                            <?= isset($data['id_supplier']) && $data['id_supplier'] == $value->id ? 'selected' : ''; ?>>
                            <?= $value->nama; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga">Harga Produk : </label>
                    <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukan Harga Produk"
                        required value="<?= isset($data['harga']) ? $data['harga'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="stok">Stok Produk : </label>
                    <input type="number" class="form-control" name="stok" id="stok" placeholder="Masukan Stok Produk"
                        required value="<?= isset($data['stok']) ? $data['stok'] : '' ?>">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>