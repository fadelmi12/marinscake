<?php

class Model_produk extends CI_Model
{
	public function get_produk()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('jenis_produk', 'jenis_produk.idJenis = produk.idJenis');
		return $this->db->get();
	}

	public function get_produk_where($id_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('jenis_produk', 'jenis_produk.idJenis = produk.idJenis');
		$this->db->where('idProduk', $id_produk);
		return $this->db->get();
	}
	public function get_produk_kategori($id_kategori, $id_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('idJenis', $id_kategori);
		$this->db->where('idProduk!=', $id_produk);
		$this->db->limit(4);
		$this->db->order_by('idProduk', 'random');
		return $this->db->get();
	}

	public function get_kategori_produk()
	{
		return $this->db->get('jenis_produk');
	}

	public function cari_produk($keyword)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->like('namaProduk', $keyword);
		return $this->db->get();
	}
}
