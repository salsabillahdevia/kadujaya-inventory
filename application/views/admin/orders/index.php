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
                                    <li class="breadcrumb-item active">Data Order</li>
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
                                <h3>Riwayat Data Order</h3>

                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="font-weight: bold;">No</th>
                                                <th style="font-weight: bold;">Jenis Cap</th>
                                                <th style="font-weight: bold;">Tanggal</th>
                                                <th style="font-weight: bold;">jumlah Order</th>
                                                <th style="font-weight: bold;">Catatan</th>
                                                <th style="font-weight: bold;">Status</th>
                                                <th style="font-weight: bold;">Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($orders as $order) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $order['warna'] . ' ' . $order['nama_cap']; ?></td>
                                                    <td><?= $order['tgl_order']; ?></td>
                                                    <td><?= $order['jumlah_order']; ?></td>
                                                    <td><?= $order['catatan']; ?></td>
                                                    <td><?= $order['status']; ?></td>
                                                    <td>
                                                        <a class="btn btn-outline-success" href="<?= base_url('stokcap/keluar/' . $order['id_cap'] . '/' . $order['id_order']) ?>">Lihat <i class="mdi mdi-magnify"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th style="font-weight: bold;">No</th>
                                                <th style="font-weight: bold;">Jenis Cap</th>
                                                <th style="font-weight: bold;">Tanggal</th>
                                                <th style="font-weight: bold;">jumlah Order</th>
                                                <th style="font-weight: bold;">Catatan</th>
                                                <th style="font-weight: bold;">Status</th>
                                                <th style="font-weight: bold;">Detail</th>
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