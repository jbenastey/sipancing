<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BayarModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function lihat_keranjang(){
		$this->db->from('sipancing_keranjang');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function lihat_keranjang_by_id($id){
		$this->db->from('sipancing_keranjang');
		$this->db->where('keranjang_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function lihat_keranjang_status($pengguna_id,$status){
		$this->db->from('sipancing_keranjang');
		$this->db->where('keranjang_pengguna_id', $pengguna_id);
		$this->db->where('keranjang_status', $status);
		return $this->db->get();
	}
	public function lihat_keranjang_produk($pengguna_id,$status,$keranjang_id){
		$this->db->from('sipancing_pesanan');
		$this->db->join('sipancing_keranjang', 'sipancing_keranjang.keranjang_id = sipancing_pesanan.pesanan_keranjang_id');
		$this->db->join('sipancing_produk', 'sipancing_produk.produk_id = sipancing_pesanan.pesanan_produk_id');
		$this->db->join('sipancing_kategori', 'sipancing_kategori.kategori_id = sipancing_produk.produk_kategori_id');
		$this->db->where('keranjang_pengguna_id', $pengguna_id);
		$this->db->where('keranjang_id', $keranjang_id);
		$this->db->where('keranjang_status', $status);
		return $this->db->get();
	}
	public function lihat_keranjang_faktur($pengguna_id){
		$this->db->from('sipancing_keranjang');
		$this->db->join('sipancing_faktur', 'sipancing_faktur.faktur_keranjang_id = sipancing_keranjang.keranjang_id');
		$this->db->where('keranjang_pengguna_id', $pengguna_id);
		return $this->db->get();
	}
	public function lihat_keranjang_faktur_admin(){
		$this->db->from('sipancing_keranjang');
		$this->db->join('sipancing_faktur', 'sipancing_faktur.faktur_keranjang_id = sipancing_keranjang.keranjang_id');
		$this->db->join('sipancing_pengguna', 'sipancing_pengguna.pengguna_id = sipancing_keranjang.keranjang_pengguna_id');
		return $this->db->get();
	}
	public function lihat_keranjang_faktur_admin_by_id($id){
		$this->db->from('sipancing_keranjang');
		$this->db->join('sipancing_faktur', 'sipancing_faktur.faktur_keranjang_id = sipancing_keranjang.keranjang_id');
		$this->db->join('sipancing_pengguna', 'sipancing_pengguna.pengguna_id = sipancing_keranjang.keranjang_pengguna_id');
		$this->db->where('faktur_id', $id);
		return $this->db->get();
	}
	public function lihat_keranjang_faktur_konfirmasi_admin_by_id($id){
		$this->db->from('sipancing_keranjang');
		$this->db->join('sipancing_faktur', 'sipancing_faktur.faktur_keranjang_id = sipancing_keranjang.keranjang_id');
		$this->db->join('sipancing_pengguna', 'sipancing_pengguna.pengguna_id = sipancing_keranjang.keranjang_pengguna_id');
		$this->db->join('sipancing_konfirmasi', 'sipancing_konfirmasi.konfirmasi_faktur_id = sipancing_faktur.faktur_id');$this->db->where('faktur_id', $id);
		return $this->db->get();
	}
	public function lihat_keranjang_faktur_by_id($id,$pengguna_id){
		$this->db->from('sipancing_keranjang');
		$this->db->join('sipancing_faktur', 'sipancing_faktur.faktur_keranjang_id = sipancing_keranjang.keranjang_id');
		$this->db->where('keranjang_pengguna_id', $pengguna_id);
		$this->db->where('faktur_id', $id);
		return $this->db->get();
	}
	public function simpan_keranjang($data){
		$this->db->insert('sipancing_keranjang',$data);
		return $this->db->affected_rows();
	}
	public function update_keranjang($id,$data){
		$this->db->where('keranjang_id', $id);
		$this->db->update('sipancing_keranjang',$data);
		return $this->db->affected_rows();
	}
	public function simpan_faktur($data){
		$this->db->insert('sipancing_faktur',$data);
		return $this->db->affected_rows();
	}
	public function update_faktur($id,$data){
		$this->db->where('faktur_id', $id);
		$this->db->update('sipancing_faktur',$data);
		return $this->db->affected_rows();
	}
	public function simpan_konfirmasi($data){
		$this->db->insert('sipancing_konfirmasi',$data);
		return $this->db->affected_rows();
	}
}
