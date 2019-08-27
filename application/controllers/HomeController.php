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

		$produk = $this->CRUDModel->view_produk();
		$pesanan = $this->CRUDModel->view_data('sipancing_pesanan','pesanan_date_created');

		$jumlah = array();
		foreach ($produk as $key=>$value) {
			$jumlahPesanan = 0;
			foreach ($pesanan as $key2=>$value2) {
				if ($value['produk_id'] == $value2['pesanan_produk_id']){
					$jumlahPesanan = $jumlahPesanan + $value2['pesanan_jumlah'];
				}
			}
			$produk[$key] += array(
				'jumlah_pesanan' => $jumlahPesanan
			);
		}

		$this->aasort($produk,'jumlah_pesanan');
//		echo '<pre>';
//		var_dump($produk);die;

		$data = array(
			'title' => 'Toko Aj. Pancing',
			'produk' => $this->CRUDModel->view_produk(),
			'best_seller' => $produk
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
	function aasort (&$array, $key) {
		$sorter=array();
		$ret=array();
		reset($array);
		foreach ($array as $ii => $va) {
			$sorter[$ii]=$va[$key];
		}
		arsort($sorter);
		foreach ($sorter as $ii => $va) {
			$ret[$ii]=$array[$ii];
		}
		$array=$ret;
	}
}
