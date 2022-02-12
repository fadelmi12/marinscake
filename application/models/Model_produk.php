<?php

class Model_produk extends CI_Model
{
	public function get_produk()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('jenis_produk','jenis_produk.idJenis = produk.idJenis');
		return $this->db->get();
	}

	public function get_produk_where($id_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('jenis_produk','jenis_produk.idJenis = produk.idJenis');
		$this->db->where('idProduk', $id_produk);
		return $this->db->get();
	}

	public function get_kategori_produk()
	{
		return $this->db->get('jenis_produk');
	}
}