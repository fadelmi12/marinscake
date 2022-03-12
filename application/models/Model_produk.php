<?php

class Model_produk extends CI_Model
{
	public function get_produk()
	{
		$this->db->select('*');
		$this->db->from('produk');
		// $this->db->join('gambar_produk', 'gambar_produk.id_produk = produk.idProduk');
		$this->db->join('jenis_produk', 'jenis_produk.idJenis = produk.idJenis');
		return $this->db->get();
	}

	public function get_max_harga()
	{
		$this->db->select_max('harga');
		$this->db->from('produk');
		return $this->db->get();
	}

	public function get_produk_where($id_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		// $this->db->join('gambar_produk', 'produk.idProduk = gambar_produk.id_produk', 'left');
		$this->db->join('jenis_produk', 'jenis_produk.idJenis = produk.idJenis');
		$this->db->where('idProduk', $id_produk);
		return $this->db->get();
	}

	public function get_filter($where)
	{
		$this->db->select('*');
		$this->db->from('produk');
		foreach ($where as $whr) {
			$this->db->where($whr);
		}
		return $this->db->get();
	}

	public function get_produk_terbaru()
	{
		$this->db->select('*');
		$this->db->from('produk');
		// $this->db->join('gambar_produk', 'gambar_produk.id_produk = produk.idProduk');
		$this->db->limit(6);
		$this->db->order_by('idProduk', 'DESC');
		return $this->db->get();
	}

	public function get_produk_kategori($id_kategori, $id_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		// $this->db->join('gambar_produk', 'gambar_produk.id_produk = produk.idProduk');
		$this->db->where('idJenis', $id_kategori);
		$this->db->where('idProduk!=', $id_produk);
		$this->db->limit(4);
		$this->db->order_by('idProduk', 'random');
		return $this->db->get();
	}

	public function get_per_kategori($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('idJenis', $id_kategori);
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
		// $this->db->join('gambar_produk', 'gambar_produk.id_produk = produk.idProduk');
		$this->db->like('namaProduk', $keyword);
		return $this->db->get();
	}

	public function get_gambar()
	{
		$this->db->select('*');
		$this->db->from('gambar_produk');
		$this->db->group_by('id_produk');
		// $this->db->where('id_produk', $idProduk);
		return $this->db->get();
	}

	public function get_gambar_produk($id_produk)
	{
		$this->db->select('*');
		$this->db->from('gambar_produk');
		$this->db->where('id_produk', $id_produk);
		return $this->db->get();
	}

	// Fetch records
	public function getData($rowno, $rowperpage)
	{

		$this->db->select('*');
		$this->db->from('produk');
		$this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();

		return $query->result_array();
	}

	// Select total records
	public function getrecordCount()
	{

		$this->db->select('count(*) as allcount');
		$this->db->from('produk');
		$query = $this->db->get();
		$result = $query->result_array();

		return $result[0]['allcount'];
	}
}
