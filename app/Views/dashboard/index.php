<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<?= $this->include('component/alert') ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box" style="background-color:#209cd8;">
                    <div class="inner">
                        <h3><?= $menu ?></h3>
                        <p>Jumlah Menu</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cube"></i>
                    </div>

                    <a <?php if(session()->get('role_id') == 1 || session()->get('role_id') == 2) { ?>
                        href="<?=base_url('master/menu')?>" <?php } ?> class="small-box-footer">Selengkapnya... <i
                            class="fas fa-arrow-circle-right"></i></a>

                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box" style="background-color:#d79ee8;">
                    <div class="inner">
                        <h3><?= $supplier ?></h3>
                        <p>Jumlah Supplier</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-truck"></i>
                    </div>

                    <a <?php if(session()->get('role_id') == 1 || session()->get('role_id') == 2) { ?>
                        href="<?=base_url('supplier')?>" <?php } ?> class="small-box-footer">Selengkapnya... <i
                            class="fas fa-arrow-circle-right"></i></a>

                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box" style="background-color:#f6acb9;">
                    <div class="inner">
                        <h3><?= $pelanggan ?></h3>
                        <p>Pelanggan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>

                    <a <?php if(session()->get('role_id') == 1 || session()->get('role_id') == 2) { ?>
                        href="<?=base_url('pelanggan')?>" <?php } ?> class="small-box-footer">Selengkapnya... <i
                            class="fas fa-arrow-circle-right"></i></a>

                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box" style="background-color:#f6d3aa;">
                    <div class="inner">
                        <h3><?= $users ?></h3>
                        <p>Pengguna</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>

                    <a <?php if(session()->get('role_id') == 1 || session()->get('role_id') == 2) { ?>
                        href="<?=base_url('user/user_manage')?>" <?php } ?> class="small-box-footer">Selengkapnya... <i
                            class="fas fa-arrow-circle-right"></i></a>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-6 text-center">
                        <h1>POS-RESTAURANT</h1>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <img src="/asset/image/restaurant2.png" alt="Gambar" class="img-fluid">
                    </div>
                </div>
            </div>
            <!-- <section class="col-lg-12 connectedSortable">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-chart-pie mr-1"></i>Sales</h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <div class="chart tab-pane active" id="revenue-chart"
                                style="position: relative; height: 300px;">
                                <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                            </div>
                            <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                            </div>
                        </div>
                    </div>
            </section> -->
        </div>
    </div>
</section>

<?= $this->endSection() ?>