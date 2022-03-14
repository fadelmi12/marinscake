<?php

class Model_produk extends CI_Model
{
	// get data produk dan jenis produk join
	public function get_produk()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('gambar_produk', 'produk.idProduk = gambar_produk.id_produk');
		$this->db->join('jenis_produk', 'jenis_produk.idJenis = produk.idJenis');
		$this->db->group_by('id_produk');
		return $this->db->get();
	}

	// get data harga termahal pada tb produk
	public function get_max_harga()
	{
		$this->db->select_max('harga');
		$this->db->from('produk');
		return $this->db->get();
	}

	// get data produk dan jenis produk join where id produk sesuai param
	public function get_produk_where($id_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('jenis_produk', 'jenis_produk.idJenis = produk.idJenis');
		$this->db->where('idProduk', $id_produk);
		return $this->db->get();
	}

	// get data produk where parameter
	public function get_filter($min_price, $max_price, $rowperpage, $rowno)
	{
		$this->db->select('*');
		$this->db->from('produk');
		// if ($where != null) {
		// 	foreach ($where as $whr) {
		// 		$this->db->where($whr);
		// 	}
		// }
		if ($min_price != null) {
			$this->db->where('harga >=', $min_price);
		}
		if ($max_price != null) {
			$this->db->where('harga <=', $max_price);
		}
		$this->db->join('gambar_produk', 'produk.idProduk = gambar_produk.id_produk');
		$this->db->order_by('gambar_produk.id_produk');
		$this->db->limit($rowperpage, $rowno);
		return $this->db->get();
	}

	public function getFilterCount($min_price, $max_price)
	{

		$this->db->select('count(*) as allcount');
		$this->db->from('produk');
		// foreach ($where as $whr) {
		// 	$this->db->where($whr);
		// }
		if ($min_price != null) {
			$this->db->where('harga >=', $min_price);
		}
		if ($max_price != null) {
			$this->db->where('harga <=', $max_price);
		}
		$query = $this->db->get();
		$result = $query->result_array();

		return $result[0]['allcount'];
	}

	// get data produk limit 6
	public function get_produk_terbaru()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->limit(6);
		$this->db->order_by('idProduk', 'DESC');
		return $this->db->get();
	}

	// get data produk sesuai kategori dan id produk limit 4
	public function get_produk_kategori($id_kategori, $id_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('gambar_produk', 'produk.idProduk = gambar_produk.id_produk');
		$this->db->group_by('id_produk');
		$this->db->where('idJenis', $id_kategori);
		$this->db->where('idProduk!=', $id_produk);
		$this->db->limit(4);
		$this->db->order_by('idProduk', 'random');
		return $this->db->get();
	}

	// get data produk sesuai kategori
	public function get_per_kategori($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('idJenis', $id_kategori);
		return $this->db->get();
	}

	// get data jenis produk
	public function get_kategori_produk()
	{
		return $this->db->get('jenis_produk');
	}

	// get data produk sesuai parameter
	public function cari_produk($keyword)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('gambar_produk', 'produk.idProduk = gambar_produk.id_produk');
		$this->db->order_by('gambar_produk.id_produk');
		$this->db->like('namaProduk', $keyword);
		return $this->db->get();
	}

	// get data gambar produk dengan kelompok sesuai id produk
	public function get_gambar()
	{
		$this->db->select('*');
		$this->db->from('gambar_produk');
		$this->db->group_by('id_produk');
		return $this->db->get();
	}

	// get gambar produk sesuai parameter
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
		$this->db->join('gambar_produk', 'produk.idProduk = gambar_produk.id_produk', 'l');
		$this->db->group_by('id_produk');
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
