<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Caps extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Caps_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('kode_petugas') == "ppic") {
            redirect('ppic');
        } elseif ($this->session->userdata('kode_petugas') == "gudang") {
            redirect('gudang');
        }
    }


    public function index()
    {
        $data['title'] = "Data Cap";
        $data['css'] = "<link href='" .  base_url() . "assets/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css' rel='stylesheet'>
        <link href='" .  base_url() . "assets/assets/libs/toastr/build/toastr.min.css' rel='stylesheet'>";
        $data['js'] = '<script src="' . base_url() . 'assets/assets/extra-libs/DataTables/datatables.min.js"></script>
        <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $("#zero_config").DataTable();
        </script>
        <script src="' . base_url() . 'assets/assets/libs/toastr/build/toastr.min.js"></script>
        ';

        $data['caps'] = $this->Caps_model->caps();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/admin_sidebar');
        $this->load->view('admin/caps/caps', $data);
        $this->load->view('layouts/footer');
    }

    public function masuk($id_cap)
    {
        $data['title'] = "Cap Masuk";
        $data['css'] = "<link href='" .  base_url() . "assets/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css' rel='stylesheet'>";
        $data['js'] = '<script src="' . base_url() . 'assets/assets/extra-libs/DataTables/datatables.min.js"></script>
        <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $("#zero_config").DataTable();
        </script>';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/admin_sidebar');
        $this->load->view('admin/stok-cap/masuk', $data);
        $this->load->view('layouts/footer');
    }

    public function keluar($id_cap)
    {
        $data['title'] = "Cap Keluar";
        $data['css'] = "<link href='" .  base_url() . "assets/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css' rel='stylesheet'>";
        $data['js'] = '<script src="' . base_url() . 'assets/assets/extra-libs/DataTables/datatables.min.js"></script>
        <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $("#zero_config").DataTable();
        </script>';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/admin_sidebar');
        $this->load->view('admin/stok-cap/keluar', $data);
        $this->load->view('layouts/footer');
    }

    public function save($id_cap)
    {
        $this->Caps_model->save($id_cap);
        $this->session->set_flashdata('message', 'berhasil');
        redirect('caps');
    }
}
