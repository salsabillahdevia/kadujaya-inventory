        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard <?= $this->session->userdata['posisi']; ?></h4>
                        <?php// get weekly data
                        //$day = '2021-11-15';
                        //echo nice_date($day, 'W');?>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Home</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-7">
                        <!-- Tabs -->
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item mr-3"> <a class="nav-link active btn btn-success" data-toggle="tab" href="#masuk" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Cap Masuk <i class="fa fa-sign-in-alt"></i></span></a> </li>

                                <li class="nav-item"><a class="nav-link btn btn-danger" data-toggle="tab" href="#keluar" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Cap Keluar <i class="fa fa-sign-out-alt"></i></span></a> </li>

                                <li class="nav-item ml-3"><a class="nav-link btn btn-primary" data-toggle="tab" href="#order" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Order Cap <i class="mdi mdi-truck-delivery"></i></span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border scrollable" style="height:300px">
                                <div class="tab-pane active" id="masuk" role="tabpanel">
                                    <div class="p-20">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Jenis Cap</th>
                                                    <th>Jumlah Masuk</th>
                                                    <th>Tanggal</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($cap_in as $in) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $in['warna']; ?> <?= $in['nama_cap']; ?></td>
                                                        <td><?= $in['cap_masuk']; ?></td>
                                                        <td><?= $in['tgl_masuk']; ?></td>
                                                        <td><?= $in['catatan']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="keluar" role="tabpanel">
                                    <div class="p-20">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Jenis Cap</th>
                                                    <th>Jumlah Keluar</th>
                                                    <th>Tanggal</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($cap_out as $out) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $out['warna']; ?> <?= $out['nama_cap']; ?></td>
                                                        <td><?= $out['cap_keluar']; ?></td>
                                                        <td><?= $out['tgl_keluar']; ?></td>
                                                        <td><?= $out['catatan']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="order" role="tabpanel">
                                    <div class="p-20">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal Order</th>
                                                    <th>Jenis Cap</th>
                                                    <th>Jumlah Order</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($orderData as $order) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $order['tgl_order']; ?></td>
                                                        <td><?= $order['warna']; ?> <?= $order['nama_cap']; ?></td>
                                                        <td><?= $order['jumlah_order']; ?></td>
                                                        <td><?= $order['status']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end tabs -->
                    </div>
                    <!-- catatan order -->
                    <div class="col-md-5">
                        <div class="card bg-primary text-white scrollable" style="height:340px">
                            <div class="card-body">
                                <h4>List Order Cap </h4><small>Bagian gudang sudah update real stock</small>
                                <table class="table">
                                    <?php foreach ($orders as $order) : ?>
                                        <tr>
                                            <td><a href="<?= base_url() ?>stokcap/keluar/<?= $order['id_cap'] . '/' . $order['id_order']; ?>" class="btn btn-light btn-sm btn-rounded"><?= $order['warna']; ?> <?= $order['nama_cap']; ?></a></td>
                                            <td><?= $order['jumlah_order']; ?> Pcs</td>
                                            <td><?= nice_date($order['tgl_order'], 'd/m/Y'); ?> </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end catatan order -->
                </div>

                <!-- persediaan cap -->
                <div class="card">
                    <div class="card-body">
                        <h4>Persediaan Cap (Tutup Luar)</h4>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Item</th>
                                        <th>Stok Awal</th>
                                        <th>Real Stock</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($caps as $cap) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $cap['warna']; ?> <?= $cap['nama_cap']; ?></td>
                                            <td><?= $cap['stok_awal_terbaru']; ?></td>
                                            <td><?= $cap['real_stock_terbaru']; ?></td>
                                            <td><button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#Order<?= $cap['id_cap']; ?>">Order <i class="mdi mdi-truck"></i></button></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Item</th>
                                        <th>Stok Awal</th>
                                        <th>Real Stock</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- end persediaan cap -->

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->

        <!-- Modal Order Cap -->
        <?php foreach ($caps as $cap) : ?>
            <div class="modal fade" id="Order<?= $cap['id_cap']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
                <div class="modal-dialog" role="document ">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Order Cap</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true ">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url() ?>admin/order/<?= $cap['id_cap']; ?>/" method="post">
                                <div class="form-group row">
                                    <label class="col-md-3 mt-1">Nama Cap</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nama_cap" class="form-control" value="<?= $cap['warna']; ?> <?= $cap['nama_cap']; ?>" readonly required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 mt-1">Stok Awal</label>
                                    <div class="col-md-9">
                                        <input type="number" name="stok_awal" class="form-control" value="<?= $cap['stok_awal_terbaru']; ?>" readonly required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 mt-1">Real Stock</label>
                                    <div class="col-md-9">
                                        <input type="number" name="real_stock" class="form-control" value="<?= $cap['real_stock_terbaru']; ?>" readonly required>
                                        <small>Terakhir diupdate oleh gudang : <b><?= nice_date($cap['update_real_stock'], 'd M Y - H:i:s'); ?></b> </small>
                                        <br>
                                        <small>Terakir cap masuk : <b><?= nice_date($cap['update_stok_awal'], 'd M Y - H:i:s'); ?></b></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 mt-1">Jumlah Order</label>
                                    <div class="col-md-9">
                                        <input type="number" name="jumlah_order" class="form-control" min="0" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 mt-1">Catatan</label>
                                    <div class="col-md-9">
                                        <input type="text" name="catatan" class="form-control">
                                    </div>
                                </div>
                                <button class="btn btn-success btn-rounded col-md-12 mt-4" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <?php endforeach; ?>
        <!-- End modal ubah cap -->