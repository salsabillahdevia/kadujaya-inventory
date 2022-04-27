<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Orders_model');
        $this->load->model('Caps_model');
        if ($this->session->userdata('kode_petugas') == "gudang") {
            redirect('gudang');
        }
    }

    public function index()
    {
        $data['title'] = "Data Order";
        $data['css'] = "<link href='" .  base_url() . "assets/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css' rel='stylesheet'>
        <link href='" .  base_url() . "assets/assets/libs/toastr/build/toastr.min.css' rel='stylesheet'>";
        $data['js'] = '<script src="' . base_url() . 'assets/assets/extra-libs/DataTables/datatables.min.js"></script>
        <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $("#zero_config").DataTable();
        </script>
        <script src="' . base_url() . 'assets/assets/libs/toastr/build/toastr.min.js"></script>';

        $data['orders'] = $this->Orders_model->orderAll();
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/admin_sidebar');
        $this->load->view('admin/orders/index', $data);
        $this->load->view('layouts/footer');
    }
}
