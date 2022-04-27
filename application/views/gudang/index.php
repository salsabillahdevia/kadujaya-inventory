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

                <!-- order -->
                <h5>Data Order Cap</h5>
                <div class="row">
                    <?php foreach ($orders as $order) :
                        if ($order['warna'] == 'Kuning') {
                            $bg = 'btn-warning';
                        } elseif ($order['warna'] == 'Merah') {
                            $bg = 'btn-danger';
                        } elseif ($order['warna'] == 'Hijau') {
                            $bg = 'btn-success';
                        } elseif ($order['warna'] == 'Hitam') {
                            $bg = 'btn-secondary';
                        } elseif ($order['warna'] == 'Putih') {
                            $bg = 'btn-light';
                        } else {
                            $bg = 'btn-info';
                        }
                    ?>

                        <div class="col-md-3">
                            <button type="button" data-toggle="modal" data-target="#Order<?= $order['id_order']; ?>" class="btn <?= $bg; ?> card-hover col-md-12 mt-3 mb-3">
                                <h6><?= $order['warna'] . ' ' . $order['nama_cap']; ?></h6>
                                <h6><?= $order['jumlah_order']; ?> pcs</h6>
                                <h6><?= $order['tgl_order']; ?></h6>
                            </button>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- end order -->

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
                                        <th>Stok Gudang</th>
                                        <th>Update Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($caps as $cap) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $cap['warna'] . ' ' . $cap['nama_cap']; ?></td>
                                            <td><?= $cap['real_stock_terbaru']; ?></td>
                                            <td><button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#Stok<?= $cap['id_cap']; ?>">Update</button></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Item</th>
                                        <th>Stok Gudang</th>
                                        <th>Update Stok</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end persediaan cap -->
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
        <?php foreach ($orders as $order) : ?>
            <div class="modal fade" id="Order<?= $order['id_order']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
                <div class="modal-dialog" role="document ">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Order Cap <?= $order['id_order']; ?></h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true ">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url() ?>gudang/order/<?= $order['id_order'] . '/' . $order['id_cap']; ?>" method="post">
                                <div class="form-group row">
                                    <label class="col-md-3 mt-1">Nama Cap</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nama_cap" class="form-control" value="<?= $order['warna'] . ' ' . $order['nama_cap']; ?>" readonly required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 mt-1">Jumlah Order</label>
                                    <div class="col-md-9">
                                        <input type="number" name="jumlah_order" class="form-control" value="<?= $order['jumlah_order']; ?>" min="0" readonly required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 mt-1">Jumlah Stok</label>
                                    <div class="col-md-9">
                                        <input type="number" name="real_stock_terbaru" class="form-control" required>
                                        <small>Terakhir diupdate oleh gudang : <?= $order['update_real_stock']; ?> </small>
                                        <br>
                                        <small>Terakir cap masuk : <?= $cap['update_stok_awal']; ?></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 mt-1">Catatan</label>
                                    <div class="col-md-9">
                                        <input type="text" name="catatan" class="form-control">
                                    </div>
                                </div>
                                <button class="btn btn-info btn-rounded col-md-12 mt-4" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <!-- End modal order cap -->

        <!-- Modal Stok cap -->
        <?php foreach ($caps as $cap) : ?>
            <div class="modal fade" id="Stok<?= $cap['id_cap']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Data Cap</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true ">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url() ?>gudang/real_stock/<?= $cap['id_cap']; ?>" method="post">
                                <div class="form-group row">
                                    <label class="col-md-3 mt-1">Nama Cap</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nama_cap" class="form-control" value="<?= $cap['warna'] . ' ' . $cap['nama_cap']; ?>" readonly required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 mt-1">Jumlah Stok</label>
                                    <div class="col-md-9">
                                        <input type="number" name="real_stock_terbaru" class="form-control" min="0" required>
                                        <small>Terakhir diupdate oleh gudang : <?= nice_date($cap['update_real_stock'], 'd M Y - H:i:s'); ?> </small>
                                        <br>
                                        <small>Terakir cap masuk : <?= nice_date($cap['update_stok_awal'], 'd M Y - H:i:s'); ?></small>
                                    </div>
                                </div>
                                <button class="btn btn-success btn-rounded col-md-12 mt-4" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <!-- End modal data cap -->