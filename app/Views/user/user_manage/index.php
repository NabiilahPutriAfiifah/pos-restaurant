<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Data Pengguna</h3>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('user/create_user') ?>" class="btn text-light mb-3"
                            style="background-color: #55596b;"><i class="fas fa-plus"></i> Tambah Data</a>
                        <table class="table table-bordered table-striped" style="background-color: #f3f3f3;">
                            <colgroup>
                                <col width="5%">
                                <col width="15%">
                                <col width="20%">
                                <col width="15%">
                                <col width="15%">
                                <col width="20%">
                            </colgroup>
                            <thead style="color: white; background-color: #55596b;">
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($users) > 0): 
                                        $i = 1;
                                ?>
                                <?php foreach($users as $us): ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $us->username ?></td>
                                    <td><?= $us->email ?></td>
                                    <td><?= $us->status ?></td>
                                    <td><?= $us->role ?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?= base_url('user/update_user/'.$us->id) ?>"
                                                class="btn text-light rounded mx-1" title="Edit Data"
                                                style="background-color: #445199;">
                                                <i class="fa fa-edit"></i> Edit Data
                                            </a>
                                            <a href="<?= base_url('user/delete_user/'.$us->id) ?>"
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
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>