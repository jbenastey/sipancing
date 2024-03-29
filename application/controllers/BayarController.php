<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BayarController extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$model = array('BayarModel','CRUDModel');
		$helper = array('nominal');
		$this->load->model($model);
		$this->load->helper($helper);
		if (!$this->session->has_userdata('session_id')) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('login'));
		}
	}
	public function keranjang(){
		$keranjang = $this->BayarModel->lihat_keranjang_status($this->session->userdata('session_id'),'belum')->row_array();
		$data = array(
			'keranjang' => $keranjang,
			'pesanan' => $this->BayarModel->lihat_keranjang_produk($this->session->userdata('session_id'),'belum',$keranjang['keranjang_id'])->result_array(),
			'title' => 'Keranjang | Toko Aj. Pancing'
		);
		$this->load->view('frontend/templates/header',$data);
		$this->load->view('frontend/pembayaran/keranjang',$data);
		$this->load->view('frontend/templates/footer');
	}
	public function bayar($id){
		$keranjang = $this->BayarModel->lihat_keranjang_status($this->session->userdata('session_id'),'belum')->row_array();
		$data = array(
			'keranjang' => $keranjang,
			'pesanan' => $this->BayarModel->lihat_keranjang_produk($this->session->userdata('session_id'),'belum',$keranjang['keranjang_id'])->result_array(),
			'title' => 'Pembayaran | Toko Aj. Pancing'
		);
		if (isset($_POST['selesai'])){
			$fakturId = 'INV-' . substr(time(), 5);
			$bank = $this->input->post('tipebayar');
			$dataBayar = array(
				'keranjang_status' => 'sudah'
			);
			$dataFaktur = array(
				'faktur_id' => $fakturId,
				'faktur_keranjang_id' => $id,
				'faktur_bank' => $bank
			);
			foreach ($data['pesanan'] as $key=>$value){
				$produkId = $value['produk_id'];
				$jumlah = $value['pesanan_jumlah'];
				$stok = $value['produk_stok'] - $jumlah;
				$dataStok = array(
					'produk_stok' => $stok
				);
				$this->CRUDModel->update('produk_id',$produkId,'sipancing_produk',$dataStok);
			}
			$this->BayarModel->update_keranjang($id,$dataBayar);
			$this->BayarModel->simpan_faktur($dataFaktur);
			$this->session->set_flashdata('alert', 'bayar_sukses');
			redirect('selesai/'.$bank.'/'.$id);
		}
		$this->load->view('frontend/templates/header',$data);
		$this->load->view('frontend/pembayaran/bayar',$data);
		$this->load->view('frontend/templates/footer');
	}
	public function selesai($bank,$id){
		$kata = array(
			'bni' => 'Silahkan transfer ke rekening ',
			'bri' => 'Silahkan transfer ke rekening ',
			'cod' => 'Silahkan datang ke alamat '
		);
		$dataBank = array(
			'bni' => 'Bank BNI 123456789 Atas Nama Yosi Sepriani ',
			'bri' => 'Bank BRI 115511026 Atas Nama Yosi Sepriani ',
			'cod' => 'Toko Aj. Pancing dengan membayar '
		);
		$data = array(
			'kata' => $kata[$bank],
			'bank' => $dataBank[$bank],
			'pesanan' => $this->BayarModel->lihat_keranjang_status_selesai($this->session->userdata('session_id'),'sudah',$id)->row_array(),
			'title' => 'Terima Kasih | Toko Aj. Pancing'
		);
		$this->load->view('frontend/templates/header',$data);
		$this->load->view('frontend/pembayaran/selesai',$data);
		$this->load->view('frontend/templates/footer');
	}
	public function konfirmasi($id,$bank){
		if (isset($_POST['konfirmasi'])){
			if ($bank != 'cod'){
				$konfirmasiId = 'CFM-' . substr(time(), 5);
				$rekening = $this->input->post('rekening');
				$atas_nama = $this->input->post('atas_nama');
				$nominal = $this->input->post('nominal');

				$config['upload_path'] = './assets/images/struk/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('struk')) {
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
				} else {
					$struk = $this->upload->data('file_name');

					$data = array(
						'konfirmasi_id' => $konfirmasiId,
						'konfirmasi_faktur_id' => $id,
						'konfirmasi_rekening' => $rekening,
						'konfirmasi_atas_nama' => $atas_nama,
						'konfirmasi_nominal' => $nominal,
						'konfirmasi_struk' => $struk
					);

					$dataFaktur = array(
						'faktur_status' => 'tunggu'
					);

					$this->BayarModel->simpan_konfirmasi($data);
					$this->BayarModel->update_faktur($id,$dataFaktur);
					$this->session->set_flashdata('alert', 'konfirmasi_sukses');
					redirect('pesanan');
				}
			} else {
				$dataFaktur = array(
					'faktur_status' => 'sudah'
				);

				$this->BayarModel->update_faktur($id,$dataFaktur);
				$this->session->set_flashdata('alert', 'konfirmasi_sukses');
				redirect('pesanan');
			}
		} else {
			$data = array(
				'title' => 'Konfirmasi Pembayaran | Toko Aj. Pancing',
				'pesanan' => $this->BayarModel->lihat_keranjang_faktur_by_id($id,$this->session->userdata('session_id'),'belum')->row_array(),
			);
			$this->load->view('frontend/templates/header',$data);
			$this->load->view('frontend/pembayaran/konfirmasi',$data);
			$this->load->view('frontend/templates/footer');
		}
	}
}
