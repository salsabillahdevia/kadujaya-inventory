<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('User_model');
		$this->load->library('form_validation');
	}


	//ini halaman login
	public function index()
	{
		//catatan
		if ($this->session->userdata('kode_petugas') == "admin") {
			redirect('admin');
		} elseif ($this->session->userdata('kode_petugas') == "ppic") {
			redirect('ppic');
		} elseif ($this->session->userdata('kode_petugas') == "gudang") {
			redirect('gudang');
		}

		$this->form_validation->set_rules('kode_petugas', 'Kode Petugas', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');



		if ($this->form_validation->run() == false) {
			$data['title'] = "Login Petugas";
			$this->load->view('auth/index', $data);
		} else {
			//nanti kita bikin method nya privat, di tandain nama methodnya pake _. jadi method nya cuma bisa diakses di kontroler ini aja dan gabisa di ketik di url
			$this->_login();
		}
	}



	private function _login()
	{
		date_default_timezone_set('Asia/Jakarta');
		$funct = time();
		$time = "%W";
		$week = mdate($time, $funct);

		$kode = $this->input->post('kode_petugas');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['kode_petugas' => $kode])->row_array();


		// jika usernya ada
		if ($user['kode_petugas']) {
			//cek password
			if ($password == $user['password']) {
				//ini bikin data buat session
				$data = [
					'kode_petugas' => $user['kode_petugas'],
					'posisi' => $user['posisi'],
					'minggu' => $week,
				];
				$this->session->set_userdata($data);
				//kode jabatan : 1->KL, 2->PL, 3->monev
				if ($user['kode_petugas'] == "admin") {
					redirect('admin');
				} elseif ($user['kode_petugas'] == "ppic") {
					redirect('ppic');
				} elseif ($user['kode_petugas'] == "gudang") {
					redirect('gudang');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kode petugas salah!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('kode_petugas');
		$this->session->unset_userdata('posisi');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah logout!</div>');
		redirect('auth');
	}


	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
