<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProfilController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = array('BayarModel','CRUDModel');
		$helper = array('nominal','tgl_indo');
		$this->load->model($model);
		$this->load->helper($helper);
		if (!$this->session->has_userdata('session_id')) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('login'));
		}
	}
	public function index(){
		$data = array(
			'title' => 'Profil | Toko Aj. Pancing'
		);
		$this->load->view('frontend/templates/header',$data);
		$this->load->view('frontend/profil/index');
		$this->load->view('frontend/templates/footer');
	}
	public function pesanan(){
		$data = array(
			'title' => 'Pesanan | Toko Aj. Pancing',
			'pesanan' => $this->BayarModel->lihat_keranjang_faktur($this->session->userdata('session_id'))->result_array(),
		);
		$this->load->view('frontend/templates/header',$data);
		$this->load->view('frontend/profil/pesanan',$data);
		$this->load->view('frontend/templates/footer');
	}
	public function detailPesanan($id){
		$pesanan = $this->BayarModel->lihat_keranjang_faktur_by_id($id,$this->session->userdata('session_id'))->row_array();
		$data = array(
			'title' => 'Detail Pesanan | Toko Aj. Pancing',
			'pesanan' => $pesanan,
			'produk' => $this->BayarModel->lihat_keranjang_produk($this->session->userdata('session_id'),'sudah',$pesanan['keranjang_id'])->result_array(),
		);
		$this->load->view('frontend/templates/header',$data);
		$this->load->view('frontend/profil/detail_pesanan',$data);
		$this->load->view('frontend/templates/footer');
	}
}
