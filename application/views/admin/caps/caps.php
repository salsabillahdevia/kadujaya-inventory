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
                <h4 class="page-title">Master Data Cap</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Data Cap</li>
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
                        <!-- <div id="ts-success"></div> -->
                        <h3>Jenis Cap</h3>
                        <?php
                        // date_default_timezone_set('Asia/Jakarta');
                        // $funct = time();
                        // $time = "%Y-%m-%d %H:%i:%s";

                        // $timestamp = mdate($time, $funct);
                        // var_dump($timestamp) 
                        ?>
                        <button type="button" class="btn btn-success mt-4 mb-3" data-toggle="modal" data-target="#Tambah"><i class="mdi mdi-plus"></i> Tambah</button>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Item</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($caps as $cap) :
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $cap['warna']; ?> <?= $cap['nama_cap']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Ubah<?= $cap['id_cap']; ?>"><i class="mdi mdi-pencil"></i> Ubah</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Item</th>
                                        <th>Aksi</th>
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

    <!-- Modal tambah Cap -->
    <div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
        <div class="modal-dialog" role="document ">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Cap</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true ">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>caps/save/0" method="post">
                        <div class="form-group row">
                            <label class="col-md-3 mt-1">Warna</label>
                            <div class="col-md-9">
                                <select class="form-control" name="warna" required>
                                    <option value="<?= NULL; ?>">-Pilih Warna-</option>
                                    <option value="Merah">Merah</option>
                                    <option value="Kuning">Kuning</option>
                                    <option value="Hijau">Hijau</option>
                                    <option value="Biru">Biru</option>
                                    <option value="Hitam">Hitam</option>
                                    <option value="Putih">Putih</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-1">Nama Cap</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_cap" class="form-control" required placeholder="Tanpa menyebutkan warna">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 mt-1">Stok Awal (Pcs)</label>
                            <div class="col-md-9">
                                <input type="number" name="stok_awal_terbaru" class="form-control" min="0" required>
                            </div>
                        </div>
                        <button class="btn btn-success btn-rounded col-md-12 mt-4" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End modal tambah cap -->

    <!-- Modal Ubah Cap -->
    <?php foreach ($caps as $cap) :  ?>
        <div class="modal fade" id="Ubah<?= $cap['id_cap']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
            <div class="modal-dialog" role="document ">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Cap</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true ">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url() ?>caps/save/<?= $cap['id_cap']; ?>" method="post">
                            <div class="form-group row">
                                <label class="col-md-3 mt-1">Warna</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="warna" required>
                                        <option value="<?= NULL; ?>">-Pilih Warna-</option>
                                        <option <?= ($cap['warna'] == "Merah" ? 'selected' : ''); ?> value="Merah">Merah</option>
                                        <option <?= ($cap['warna'] == "Kuning" ? 'selected' : ''); ?> value="Kuning">Kuning</option>
                                        <option <?= ($cap['warna'] == "Hijau" ? 'selected' : ''); ?> value="Hijau">Hijau</option>
                                        <option <?= ($cap['warna'] == "Biru" ? 'selected' : ''); ?> value="Biru">Biru</option>
                                        <option <?= ($cap['warna'] == "Hitam" ? 'selected' : ''); ?> value="Hitam">Hitam</option>
                                        <option <?= ($cap['warna'] == "Putih" ? 'selected' : ''); ?> value="Putih">Putih</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 mt-1">Nama Cap</label>
                                <div class="col-md-9">
                                    <input type="text" name="nama_cap" class="form-control" placeholder="Tanpa menyebutkan warna" value="<?= $cap['nama_cap']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 mt-1">Stok Awal (Pcs)</label>
                                <div class="col-md-9">
                                    <input type="number" name="stok_awal_terbaru" class="form-control" value="<?= $cap['stok_awal_terbaru']; ?>" min="0" required>
                                </div>
                            </div>
                            <button class="btn btn-warning btn-rounded col-md-12 mt-4" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- End modal ubah cap -->