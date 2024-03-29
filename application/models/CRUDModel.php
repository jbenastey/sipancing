<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CRUDModel extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function view_data($table,$order){
		$this->db->order_by($order,'DESC');
		return $this->db->get($table)->result_array();
	}
	function view_produk(){
		$this->db->from('sipancing_produk');
		$this->db->join('sipancing_kategori','sipancing_kategori.kategori_id = sipancing_produk.produk_kategori_id');
		$this->db->order_by('produk_date_created','DESC');
		return $this->db->get()->result_array();
	}
	function view_data_by_id($id,$key,$table){
		$this->db->where($key,$id);
		return $this->db->get($table)->row_array();
	}
	function view_produk_by_id($id){
		$this->db->from('sipancing_produk');
		$this->db->join('sipancing_kategori','sipancing_kategori.kategori_id = sipancing_produk.produk_kategori_id');
		$this->db->where('produk_id',$id);
		return $this->db->get()->row_array();
	}
	function view_produk_by_kategori($id){
		$this->db->from('sipancing_produk');
		$this->db->join('sipancing_kategori','sipancing_kategori.kategori_id = sipancing_produk.produk_kategori_id');
		$this->db->where('produk_kategori_id',$id);
		return $this->db->get()->result_array();
	}
	function view_testimoni($id){
		$this->db->from('sipancing_testimoni');
		$this->db->join('sipancing_pengguna','sipancing_pengguna.pengguna_id = sipancing_testimoni.testimoni_pengguna_id');
		$this->db->order_by('testimoni_date_created','ASC');
		$this->db->where('testimoni_produk_id',$id);
		return $this->db->get()->result_array();
	}
	function insert($table,$data){
		return $this->db->insert($table,$data);
	}
	function delete($key,$id,$table){
		$this->db->where($key,$id);
		return $this->db->delete($table);
	}
	function update($key,$id,$table,$data){
		$this->db->where($key,$id);
		return $this->db->update($table,$data);
	}

}
