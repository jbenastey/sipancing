<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PesanController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = array('CRUDModel','BayarModel');
		$helper = array('nominal');
		$this->load->model($model);
		$this->load->helper($helper);
		if (!$this->session->has_userdata('session_id')) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('login'));
		}
	}

	public function pesan($id)
	{
		$pesanan = $this->CRUDModel->view_produk_by_id($id);
		if (isset($_POST['keranjang'])){
			$pesananId = 'ORD-' . substr(time(), 5);
			$jumlah = $this->input->post('jumlah');
			$total = $pesanan['produk_harga'] * $jumlah;

			$dataPesanan = array(
				'pesanan_id' => $pesananId,
				'pesanan_produk_id' => $id,
				'pesanan_jumlah' => $jumlah,
				'pesanan_total' => $total,
			);

			$allCart = $this->BayarModel->lihat_keranjang();
			$undoneCart = $this->BayarModel->lihat_keranjang_status($this->session->userdata('session_id'),'belum')->row_array();

			if ($allCart == null){
				$cartId = 'CRT-' . substr(time(), 5);
				$dataPesanan['pesanan_keranjang_id'] = $cartId;
				$dataCart = array(
					'keranjang_id' => $cartId,
					'keranjang_pengguna_id' => $this->session->userdata('session_id'),
					'keranjang_total' => $total,
				);
				$this->CRUDModel->insert('sipancing_pesanan',$dataPesanan);
				$this->BayarModel->simpan_keranjang($dataCart);
				$this->session->set_flashdata('alert', 'pesan_sukses');
				redirect('keranjang');
			} else {
				if ($undoneCart != null){
					$cartId = $undoneCart['keranjang_id'];
					$cartTotal = $undoneCart['keranjang_total'];
					$dataPesanan['pesanan_keranjang_id'] = $cartId;
					$dataCart['keranjang_total'] = $cartTotal + $total;

					$this->CRUDModel->insert('sipancing_pesanan',$dataPesanan);
					$this->BayarModel->update_keranjang($cartId,$dataCart);
					$this->session->set_flashdata('alert', 'pesan_sukses');
					redirect('keranjang');
				} else {
					$cartId = 'CRT-' . substr(time(), 5);
					$dataPesanan['pesanan_keranjang_id'] = $cartId;
					$dataCart = array(
						'keranjang_id' => $cartId,
						'keranjang_pengguna_id' => $this->session->userdata('session_id'),
						'keranjang_total' => $total,
					);
					$this->CRUDModel->insert('sipancing_pesanan',$dataPesanan);
					$this->BayarModel->simpan_keranjang($dataCart);
					$this->session->set_flashdata('alert', 'pesan_sukses');
					redirect('keranjang');
				}
			}
		} else {
			$data = array(
				'title' => 'Pesan Sekarang | Toko Aj. Pancing',
				'pesanan' => $pesanan,
			);
			$this->load->view('frontend/templates/header',$data);
			$this->load->view('frontend/pesanan/index',$data);
			$this->load->view('frontend/templates/footer');
		}
	}
}
