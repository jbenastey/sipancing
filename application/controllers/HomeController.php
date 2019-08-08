<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$model = array('CRUDModel');
		$helper = array('nominal');
		$this->load->model($model);
		$this->load->helper($helper);
	}
	public function index()
	{
		$data = array(
			'title' => 'Toko Aj. Pancing',
			'produk' => $this->CRUDModel->view_produk()
		);
		$this->load->view('frontend/templates/header',$data);
		$this->load->view('frontend/index',$data);
		$this->load->view('frontend/templates/footer');
	}
	public function cari($id){
		$kategori = $this->CRUDModel->view_data_by_id($id,'kategori_id','sipancing_kategori');
		$data = array(
			'title' => 'Toko Aj. Pancing',
			'produk' => $this->CRUDModel->view_produk_by_kategori($id),
			'kategori' => $kategori['kategori_nama'],
		);
		$this->load->view('frontend/templates/header',$data);
		$this->load->view('frontend/cari',$data);
		$this->load->view('frontend/templates/footer');
	}
}
