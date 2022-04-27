<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Orders_model');
        $this->load->model('Caps_model');
        if ($this->session->userdata('kode_petugas') == "admin") {
            redirect('admin');
        }
    }


    public function index()
    {
        $data['title'] = "Dashboard Gudang";
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

        $data['orders'] = $this->Orders_model->orders('order.status', 'Proses');
        $data['caps'] = $this->Caps_model->Caps();
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/gudang_sidebar');
        $this->load->view('gudang/index', $data);
        $this->load->view('layouts/footer');
    }

    public function order($id_order, $id_cap)
    {
        $this->Orders_model->order_gudang($id_order, $id_cap);
        $this->session->set_flashdata('message', 'berhasil');
        redirect('gudang');
    }

    public function real_stock($id_cap)
    {
        $this->Caps_model->real_stock($id_cap);
        $this->session->set_flashdata('message', 'berhasil');
        redirect('gudang');
    }
}
