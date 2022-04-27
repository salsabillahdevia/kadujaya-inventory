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
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>stokcap">Stok Cap</a></li>
                                    <li class="breadcrumb-item active">Cap Keluar</li>
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
                    <div class="col-12">

                        <!-- persediaan cap -->
                        <div class="card">
                            <div class="card-body">
                                <h3>Riwayat Cap Keluar Jenis <?= $cap['warna'] . ' ' . $cap['nama_cap']; ?></h3>
                                <div class="row mt-5">
                                    <h5 class="col-6">Stok Awal : <?= $cap['stok_awal_terbaru']; ?> Pcs</h5>
                                    <h5 class="col-6">Real Stock : <?= $cap['real_stock_terbaru']; ?> <small>(Terakhir diupdate gudang : <?= nice_date($cap['update_real_stock'], 'd M Y-H:i:s'); ?>)</small></h5>
                                </div>
                                <?php if ($keluar) : ?>
                                <?php else : ?>
                                    <hr>

                                    <div class="card-body bg-warning">
                                        <h4 class="text-center">Tambah Data Keluar</h4>
                                        <form action="" method="post">
                                            <input type="hidden" name="stok_awal" value="<?= $cap['stok_awal_terbaru']; ?>" required>
                                            <input type="hidden" name="real_stock" value="<?= $cap['real_stock_terbaru']; ?>" required>
                                            <div class="row input-group col-md-12 mt-3">
                                                <label class="col-md-4 text-right">Jumlah/Tanggal Order</label>
                                                <input type="text" class="form-control col-md-4" name="jumlah_order" value="<?= $order['jumlah_order'] . ' Pcs / ' . nice_date($order['tgl_order'], 'd M Y - H:i:s'); ?>" min="0" required readonly>
                                            </div>
                                            <div class="row input-group col-md-12 mt-3">
                                                <label class="col-md-4 text-right">Jumlah Cap Keluar</label>
                                                <input type="number" class="form-control col-md-4" name="cap_keluar" min="0" required>
                                            </div>
                                            <div class="row input-group col-12 mt-3">
                                                <label class="col-md-4 text-right">Catatan</label>
                                                <input type="text" class="form-control col-md-4" name="catatan">
                                            </div>
                                            <center>
                                                <button class="btn btn-success btn-rounded col-md-4 mt-4">Simpan</button>
                                            </center>
                                        </form>
                                    </div>
                            </div>
                            <hr>
                        <?php endif ?>

                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="font-weight: bold;">No</th>
                                        <th style="font-weight: bold;">Tanggal</th>
                                        <th style="font-weight: bold;">Stok Awal</th>
                                        <th style="font-weight: bold;">Jumlah Keluar</th>
                                        <th style="font-weight: bold;">Total</th>
                                        <th style="font-weight: bold;">Real Stock</th>
                                        <th style="font-weight: bold;">Catatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($cap_out as $out) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $out['tgl_keluar']; ?></td>
                                            <td><?= $out['stok_awal']; ?></td>
                                            <td><?= $out['cap_keluar']; ?></td>
                                            <td><?= $out['total']; ?></td>
                                            <td><?= $out['real_stock']; ?></td>
                                            <td><?= $out['catatan']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="font-weight: bold;">No</th>
                                        <th style="font-weight: bold;">Tanggal</th>
                                        <th style="font-weight: bold;">Jumlah Keluar</th>
                                        <th style="font-weight: bold;">Stok Awal</th>
                                        <th style="font-weight: bold;">Total</th>
                                        <th style="font-weight: bold;">Real Stock</th>
                                        <th style="font-weight: bold;">Catatan</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        </div>
                    </div>
                    <!-- end persediaan cap -->
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