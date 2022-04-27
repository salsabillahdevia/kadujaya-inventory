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
                        <h4 class="page-title">Master Data User</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Data User</li>
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
                                <h3>Users</h3>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Petugas</th>
                                                <th>Bagian</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>admin</td>
                                                <td>Admin</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Ubah1"><i class="mdi mdi-pencil"></i> Ubah</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>ppic</td>
                                                <td>PPIC</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Ubah1"><i class="mdi mdi-pencil"></i> Ubah</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Petugas</th>
                                                <th>Bagian</th>
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

            <!-- Modal Ubah user -->
            <div class="modal fade" id="Ubah1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
                <div class="modal-dialog" role="document ">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Cap</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true ">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url() ?>users/ubah" method="post">
                                <div class="form-group row">
                                    <label class="col-md-3 mt-1">Kode Petugas</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="kode_petugas" value="admin" readonly required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 mt-1">Posisi</label>
                                    <div class="col-md-9">
                                        <input type="text" name="posisi" class="form-control" value="ADMIN" readonly required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 mt-1">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>
                                <button class="btn btn-warning btn-rounded col-md-12 mt-4" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End modal ubah cap -->