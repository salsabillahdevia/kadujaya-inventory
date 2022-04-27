<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Export extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Export_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('kode_petugas') == "gudang") {
            redirect('gudang');
        }
    }


    public function index()
    {
        $data['title'] = "Export Data";
        $data['css'] = "<link href='" .  base_url() . "assets/assets/libs/toastr/build/toastr.min.css' rel='stylesheet'>";
        $data['js'] = '<script src="' . base_url() . 'assets/assets/libs/toastr/build/toastr.min.js"></script>';

        $this->form_validation->set_rules('data', 'Data', 'trim|required');
        $this->form_validation->set_rules('bulan', 'Bulan', 'trim|required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/admin_sidebar');
            $this->load->view('admin/export/export', $data);
            $this->load->view('layouts/footer');
        } else {
            $this->Export_model->export();
            $this->session->set_flashdata('message', 'berhasil');
            redirect('export');
        }
    }
}
