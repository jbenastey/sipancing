<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$model = array('PenggunaModel','CRUDModel');
		$this->load->model($model);
	}
	public function login(){
		if ($this->session->has_userdata('session_id')) {
			$this->session->set_flashdata('alert', 'sudah_login');
			redirect(base_url());
		}
		if (isset($_POST['login'])) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$data = array(
				'pengguna_username' => $username,
				'pengguna_password' => md5($password)
			);
			$pengguna = $this->PenggunaModel->get_user_account($data);
			if ($pengguna != null) {
				if ($pengguna['pengguna_level'] == 'pemesan'){
					$session = array(
						'session_id' => $pengguna['pengguna_id'],
						'session_username' => $pengguna['pengguna_username'],
						'session_email' => $pengguna['pengguna_email'],
						'session_level' => $pengguna['pengguna_level'],
						'session_nama' => $pengguna['pengguna_nama'],
						'session_nomor_hp' => $pengguna['pengguna_nomor_hp'],
					);
					$this->session->set_userdata($session);
					$this->session->set_flashdata('alert', 'login_sukses');
					redirect(base_url());
				} else {
					$this->session->set_flashdata('alert', 'login_gagal');
					redirect(base_url('login'));
				}
			} else {
				$this->session->set_flashdata('alert', 'login_gagal');
				redirect(base_url('login'));
			}
		} else {
			$data = array(
				'title' => 'Login | Toko Aj. Pancing'
			);
			$this->load->view('frontend/templates/header',$data);
			$this->load->view('frontend/auth/login');
			$this->load->view('frontend/templates/footer');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('alert', 'logout_sukses');
		redirect(base_url());
	}
}
