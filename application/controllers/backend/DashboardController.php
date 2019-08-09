<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$model = array('CRUDModel');
		$this->load->model($model);
		if (!$this->session->has_userdata('session_id')) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('admin/login'));
		}
	}
	public function index(){
		$data = array(
			'kategori' => $this->CRUDModel->view_data('sipancing_kategori','kategori_date_created'),
			'produk' => $this->CRUDModel->view_data('sipancing_produk','produk_date_created'),
			'pelanggan' => $this->CRUDModel->view_data('sipancing_pengguna','pengguna_date_created'),
			'transaksi' => $this->CRUDModel->view_data('sipancing_faktur','faktur_date_created')
		);
		$this->load->view('backend/templates/header');
		$this->load->view('backend/index',$data);
		$this->load->view('backend/templates/footer');
	}
}
