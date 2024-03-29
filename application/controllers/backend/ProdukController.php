<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukController extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$model = array('PenggunaModel','CRUDModel');
		$helper = array('nominal');
		$this->load->model($model);
		$this->load->helper($helper);
		if (!$this->session->has_userdata('session_id')) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('admin/login'));
		}
	}
	public function index(){
		$data = array(
			'produk' => $this->CRUDModel->view_produk()
		);
		$this->load->view('backend/templates/header');
		$this->load->view('backend/produk/index',$data);
		$this->load->view('backend/templates/footer');
	}
	public function tambah(){
		if (isset($_POST['simpan'])){
			$id =  'PRD-' .  substr(time(), 5);
			$nama = $this->input->post('nama');
			$kategori = $this->input->post('kategori');
			$harga = $this->input->post('harga');
			$deskripsi = $this->input->post('deskripsi');
			$stok = $this->input->post('stok');

			$config['upload_path'] = './assets/images/produk/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('foto')) {
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
			} else {
				$foto = $this->upload->data('file_name');

				$data = array(
					'produk_id' => $id,
					'produk_nama' => $nama,
					'produk_kategori_id' => $kategori,
					'produk_harga' => $harga,
					'produk_deskripsi' => $deskripsi,
					'produk_foto' => $foto,
					'produk_stok' => $stok
				);
				$this->CRUDModel->insert('sipancing_produk',$data);
				redirect('admin/produk');
			}
		} else {
			$data = array(
				'kategori' => $this->CRUDModel->view_data('sipancing_kategori','kategori_date_created')
			);
			$this->load->view('backend/templates/header');
			$this->load->view('backend/produk/tambah',$data);
			$this->load->view('backend/templates/footer');
		}
	}
	public function lihat($id){
		$data = array(
			'kategori' => $this->CRUDModel->view_data('sipancing_kategori','kategori_date_created'),
			'produk' => $this->CRUDModel->view_produk_by_id($id)
		);
		$this->load->view('backend/templates/header');
		$this->load->view('backend/produk/lihat',$data);
		$this->load->view('backend/templates/footer');
	}
	public function ubah($id){
		if (isset($_POST['simpan'])){
			$nama = $this->input->post('nama');
			$kategori = $this->input->post('kategori');
			$harga = $this->input->post('harga');
			$deskripsi = $this->input->post('deskripsi');
			$stok = $this->input->post('stok');
			$diskon = $this->input->post('diskon');

			$config['upload_path'] = './assets/images/produk/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('foto')) {
				$data = array(
					'produk_nama' => $nama,
					'produk_kategori_id' => $kategori,
					'produk_harga' => $harga,
					'produk_deskripsi' => $deskripsi,
					'produk_stok' => $stok,
					'produk_diskon' => $diskon
				);
				$this->CRUDModel->update('produk_id',$id,'sipancing_produk',$data);
				redirect('admin/produk');
			} else {
				$foto = $this->upload->data('file_name');

				$data = array(
					'produk_nama' => $nama,
					'produk_kategori_id' => $kategori,
					'produk_harga' => $harga,
					'produk_deskripsi' => $deskripsi,
					'produk_foto' => $foto,
					'produk_stok' => $stok,
					'produk_diskon' => $diskon
				);
				$this->CRUDModel->update('produk_id',$id,'sipancing_produk',$data);
				redirect('admin/produk');
			}
		} else {
			$data = array(
				'kategori' => $this->CRUDModel->view_data('sipancing_kategori','kategori_date_created'),
				'produk' => $this->CRUDModel->view_produk_by_id($id)
			);
			$this->load->view('backend/templates/header');
			$this->load->view('backend/produk/ubah',$data);
			$this->load->view('backend/templates/footer');
		}
	}
	public function hapus($id){
		$this->CRUDModel->delete('produk_id',$id,'sipancing_produk');
		redirect('admin/produk');
	}
}
