<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // $this->load->model('Admin_model');
        // $this->load->model('Export_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('kode_petugas') == "ppic") {
            redirect('ppic');
        } elseif ($this->session->userdata('kode_petugas') == "gudang") {
            redirect('gudang');
        }
    }


    public function index()
    {
        $data['title'] = "Data User";
        $data['css'] = "";
        $data['js'] = '';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/admin_sidebar');
        $this->load->view('admin/users/users', $data);
        $this->load->view('layouts/footer');
    }
}
