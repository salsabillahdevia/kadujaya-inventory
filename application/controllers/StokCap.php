<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StokCap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Orders_model');
        $this->load->model('Caps_model');
        $this->load->model('InOut_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('kode_petugas') == "ppic") {
            redirect('ppic');
        } elseif ($this->session->userdata('kode_petugas') == "gudang") {
            redirect('gudang');
        }
    }


    public function index()
    {
        $data['title'] = "Stok Cap";
        $data['css'] = "<link href='" .  base_url() . "assets/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css' rel='stylesheet'>";
        $data['js'] = '<script src="' . base_url() . 'assets/assets/extra-libs/DataTables/datatables.min.js"></script>
        <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $("#zero_config").DataTable();
        </script>';

        $data['caps'] = $this->Caps_model->caps();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/admin_sidebar');
        $this->load->view('admin/stok-cap/stok_cap', $data);
        $this->load->view('layouts/footer');
    }

    public function masuk($id_cap)
    {
        $data['title'] = "Cap Masuk";
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

        $data['cap'] = $this->Caps_model->cap($id_cap);
        $data['cap_in'] = $this->Caps_model->tbl_in_out($id_cap, 'id_masuk', 'cap_masuk');

        $this->form_validation->set_rules('cap_masuk', 'Jumlah Cap Masuk', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/admin_sidebar');
            $this->load->view('admin/stok-cap/masuk', $data);
            $this->load->view('layouts/footer');
        } else {
            $this->Caps_model->save_in_out($id_cap, 'cap_masuk', '');
            $this->session->set_flashdata('message', 'berhasil');
            redirect('stokcap/masuk/' . $id_cap);
        }
    }

    public function keluar($id_cap, $id_order)
    {
        $data['title'] = "Cap Keluar";
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

        $data['cap'] = $this->Caps_model->cap($id_cap);
        $data['cap_out'] = $this->Caps_model->tbl_in_out($id_cap, 'id_keluar', 'cap_keluar');
        $data['order'] = $this->Orders_model->order($id_order);
        $data['keluar'] = $this->InOut_model->keluar($id_cap, $id_order);

        $this->form_validation->set_rules('cap_keluar', 'Jumlah Cap Keluar', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/admin_sidebar');
            $this->load->view('admin/stok-cap/keluar', $data);
            $this->load->view('layouts/footer');
        } else {
            $this->Caps_model->save_in_out($id_cap, 'cap_keluar', $id_order);
            $this->session->set_flashdata('message', 'berhasil');
            redirect('stokcap/keluar/' . $id_cap . '/' . $id_order);
        }
    }
}
