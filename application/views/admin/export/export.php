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
                        <h4 class="page-title">Export Data</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Export Data</li>
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
                                <h3 class="mb-4">Export Data</h3>
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="form-group form-inline col-md-4">
                                            <label class="mr-3">Data</label>
                                            <select name="data" class="form-control col-md-6" required>
                                                <option value="<?= NULL ?>">-Pilih Data-</option>
                                                <option value="masuk">Cap Masuk</option>
                                                <option value="keluar">Cap Keluar</option>
                                                <option value="jenis">Jenis Cap</option>
                                                <option value="order">Order Cap</option>
                                            </select>
                                        </div>
                                        <div class="form-group form-inline col-md-4">
                                            <label class="mr-3">Bulan</label>
                                            <select name="bulan" class="form-control col-md-6" required>
                                                <option value="<?= NULL ?>">-Pilih Bulan-</option>
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                                <option value="all">Semua Bulan</option>
                                            </select>
                                        </div>
                                        <div class="form-group form-inline col-md-4">
                                            <label class="mr-3">Tahun</label>
                                            <select name="tahun" class="form-control col-md-6" required>
                                                <option value="<?= NULL ?>">-Pilih Tahun-</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                            </select>
                                        </div>
                                    </div>
                                    <center>
                                        <button class="btn btn-outline-success btn-rounded col-4 mt-5" type="submit"><i class="mdi mdi-file-excel"></i> Export</button>
                                    </center>
                                </form>
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