<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = array('PenggunaModel','CRUDModel','BayarModel');
		$helper = array('nominal','tgl_indo');
		$this->load->model($model);
		$this->load->helper($helper);
		if (!$this->session->has_userdata('session_id')) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('admin/login'));
		}
	}
	public function index(){
		if (isset($_POST['lihat'])){
			$tahun = $this->input->post('tahun');
			$bulan = $this->input->post('bulan');
			$transaksi = $this->BayarModel->lihat_keranjang_faktur_admin()->result_array();
			$laporan = array();
			foreach ($transaksi as $key=>$value){
				if ($value['faktur_status'] == 'sudah'){
					$laporan[$key] = $value;
				}
			}
			$laporantransaksi = array();
			foreach ($laporan as $key=>$value){
				$datetime = explode(' ',$value['faktur_date_created']);
				$tanggal = explode('-',$datetime[0]);
				$tahuntransaksi = $tanggal[0];
				$bulantransaksi = $tanggal[1];
				if ($bulantransaksi == $bulan && $tahuntransaksi == $tahun){
					$laporantransaksi[$key] = $value;
				}
			}
			$bulanArr = array(' ','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
			$data = array(
				'laporan' => $laporantransaksi,
				'bulan' => $bulanArr[(int)$bulan],
				'tahun' => $tahun,
			);
			$this->load->view('backend/templates/header');
			$this->load->view('backend/laporan/lihat',$data);
			$this->load->view('backend/templates/footer');
		} else {
			$this->load->view('backend/templates/header');
			$this->load->view('backend/laporan/index');
			$this->load->view('backend/templates/footer');
		}
	}
}
