<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{


	public function index()
	{
		$data['kategori']	= $this->Model_produk->get_kategori_produk()->result_array();
		$data['produk']		= $this->Model_produk->get_produk()->result_array();
		$data['gambar'] 	= $this->Model_produk->get_gambar()->result_array();
		$data['max']		= $this->Model_produk->get_max_harga()->row();

		$this->load->view('template/header2');
		$this->load->view('daftar_produk', $data);
		$this->load->view('template/footer');
	}

	public function detail($id_produk)
	{
		$data['produk']	= $this->Model_produk->get_produk_where($id_produk)->result_array();
		$id_kategori	= $this->Model_produk->get_produk_where($id_produk)->row()->idJenis;
		$data['rekom']	= $this->Model_produk->get_produk_kategori($id_kategori, $id_produk)->result_array();
		$data['gambar'] = $this->Model_produk->get_gambar_produk($id_produk)->result_array();
		$data['gambar_rekom'] = $this->Model_produk->get_gambar()->result_array();

		$this->load->view('template/header2');
		$this->load->view('detail_produk', $data);
		$this->load->view('template/footer');
	}

	public function cari()
	{
		$cari = $this->input->post('cari');
		$data['pencarian'] 	= $this->Model_produk->cari_produk($cari)->result_array();
		$data['gambar'] = $this->Model_produk->get_gambar()->result_array();
		$data['kategori']	= $this->Model_produk->get_kategori_produk()->result_array();

		$this->load->view('template/header2');
		$this->load->view('cari_produk', $data);
		$this->load->view('template/footer');
	}

	public function kategori_produk($id_jenis)
	{
		$data['produk'] 	= $this->Model_produk->get_per_kategori($id_jenis)->result_array();
		$data['gambar'] = $this->Model_produk->get_gambar()->result_array();
		$data['kategori']	= $this->Model_produk->get_kategori_produk()->result_array();

		$this->load->view('template/header2');
		$this->load->view('daftar_produk', $data);
		$this->load->view('template/footer');
	}

	public function filter()
	{
		$kategori = $this->input->post('checkbox_ktg');
		foreach ($kategori as $ktg) {
			$where[] = array(
				'idJenis' => $ktg
			);
		}

		$data['produk'] 	= $this->Model_produk->get_filter($where)->result_array();
		$data['kategori']	= $this->Model_produk->get_kategori_produk()->result_array();
		$data['gambar'] 	= $this->Model_produk->get_gambar()->result_array();
		$data['max']		= $this->Model_produk->get_max_harga()->row();
		// foreach ($where as $whr) {
		$data['cek_ktg']	= $where;
		// }

		// echo json_encode($data['cek_ktg']);
		// exit;

		$this->load->view('template/header2');
		$this->load->view('daftar_produk', $data);
		$this->load->view('template/footer');

		// echo json_encode($data);
	}

	public function loadRecord($rowno = 0)
	{

		// Row per page
		$rowperpage = 5;

		// Row position
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}

		// All records count
		$allcount = $this->Model_produk->getrecordCount();

		// Get records
		$users_record = $this->Model_produk->getData($rowno, $rowperpage);

		// Pagination Configuration
		$config['base_url'] = base_url() . 'produk/loadRecord';
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;

		// Initialize
		$this->pagination->initialize($config);

		// Initialize $data Array
		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $users_record;
		$data['row'] = $rowno;

		echo json_encode($data);
	}
}
