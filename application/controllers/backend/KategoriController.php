<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriController extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$model = array('PenggunaModel','CRUDModel');
		$this->load->model($model);
		if (!$this->session->has_userdata('session_id')) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('admin/login'));
		}
	}
	public function index(){
		$data = array(
			'kategori' => $this->CRUDModel->view_data('sipancing_kategori','kategori_date_created')
		);
		$this->load->view('backend/templates/header');
		$this->load->view('backend/kategori/index',$data);
		$this->load->view('backend/templates/footer');
	}
	public function tambah(){
		if (isset($_POST['simpan'])){
			$id =  'CAT-' .  substr(time(), 5);
			$nama = $this->input->post('nama');
			$data = array(
				'kategori_id' => $id,
				'kategori_nama' => $nama,
			);
			$this->CRUDModel->insert('sipancing_kategori',$data);
			redirect('admin/kategori');
		} else {
			$this->load->view('backend/templates/header');
			$this->load->view('backend/kategori/tambah');
			$this->load->view('backend/templates/footer');
		}
	}
	public function ubah($id){
		if (isset($_POST['simpan'])){
			$nama = $this->input->post('nama');
			$data = array(
				'kategori_nama' => $nama,
			);
			$this->CRUDModel->update('kategori_id',$id,'sipancing_kategori',$data);
			redirect('admin/kategori');
		} else {
			$data = array(
				'kategori' => $this->CRUDModel->view_data_by_id($id,'kategori_id','sipancing_kategori')
			);
			$this->load->view('backend/templates/header');
			$this->load->view('backend/kategori/ubah',$data);
			$this->load->view('backend/templates/footer');
		}
	}
	public function hapus($id){
		$this->CRUDModel->delete('kategori_id',$id,'sipancing_kategori');
		redirect('admin/kategori');
	}
}
