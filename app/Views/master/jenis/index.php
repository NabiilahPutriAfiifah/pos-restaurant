<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<?= $this->include('component/alert') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Jenis</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('master/create_jenis') ?>" method="POST">
                    <div class="form-group">
                        <label for="jenis">Jenis : </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-arrows-alt-h"></i></span>
                            </div>
                            <input type="text" class="form-control" name="jenis" id="jenis"
                                placeholder="Masukan Jenis Menu" required>
                        </div>
                    </div>
                    <button type="submit" class="btn text-light" style="background-color: #55596b;"><i
                            class="fas fa-plus"></i>
                        Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Jenis</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" style="background-color: #f3f3f3;">
                            <colgroup>
                                <col width="10%">
                                <col width="40%">
                                <col width="40%">
                            </colgroup>
                            <thead style="color: white; background-color: #55596b;">
                                <tr>
                                    <th>#</th>
                                    <th>Jenis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($jenis) > 0): 
                                        $i = 1;
                                ?>
                                <?php foreach($jenis as $u) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $u->jenis ?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?= base_url('/master/edit_jenis/'.$u->id) ?>"
                                                class="btn text-light rounded mx-1" title="Edit Data"
                                                style="background-color: #445199;">
                                                <i class="fa fa-edit"></i> Edit Data
                                            </a>
                                            <a href="<?= base_url('/master/delete_jenis/'.$u->id) ?>"
                                                onclick="if(confirm('Are you sure to delete this data?') === false) event.preventDefault()"
                                                class="btn text-light rounded mx-1" title="Delete Data"
                                                style="background-color: #8080ed;">
                                                <i class="fa fa-trash"></i> Delete Data
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-md m-0 mx-auto">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>