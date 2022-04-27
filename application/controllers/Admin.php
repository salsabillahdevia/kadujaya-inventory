<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Caps_model');
        $this->load->model('Orders_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('kode_petugas') == "ppic") {
            redirect('ppic');
        } elseif ($this->session->userdata('kode_petugas') == "gudang") {
            redirect('gudang');
        }
    }


    public function index()
    {
        $data['title'] = "Dashboard Admin";
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

        $data['caps'] = $this->Caps_model->caps();
        $where = 'order.status';
        $val = 'Diupdate';
        $data['orders'] = $this->Orders_model->orders($where, $val);
        $data['orderData'] = $this->Orders_model->orderData();
        // cap masuk keluar mingguan
        $date = $this->Orders_model->timeStamp();
        $week = nice_date($date, 'W');
        $data['cap_in'] = $this->Caps_model->cap_in_out('id_masuk', 'cap_masuk');
        $data['cap_out'] = $this->Caps_model->cap_in_out('id_keluar', 'cap_keluar');

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/admin_sidebar');
        $this->load->view('admin/index', $data);
        $this->load->view('layouts/footer');
    }

    public function order($id_cap, $id_order = 0)
    {
        $this->Orders_model->order_cap($id_cap, $id_order);
        $this->session->set_flashdata('message', 'berhasil');
        redirect('admin');
    }
}
