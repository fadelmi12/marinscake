<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{


	public function index()
	{
		$data['kategori']	= $this->Model_produk->get_kategori_produk()->result_array();
		// $data['produk']		= $this->Model_produk->get_produk()->result_array();
		// $data['gambar'] 	= $this->Model_produk->get_gambar()->result_array();
		$data['max']		= $this->Model_produk->get_max_harga()->row();

		// echo json_encode($data['produk']);
		// exit;

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
		// $data['gambar_rekom'] = $this->Model_produk->get_gambar()->result_array();

		// echo json_encode($data['produk']);
		// exit;

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
		$kategori = $this->input->post('kategori_box');
		$min_price = $this->input->post('min_price');
		$max_price = $this->input->post('max_price');

		$where = null;

		if ($kategori != null) {
			foreach ($kategori as $ktg) {
				$where[] = array(
					'idJenis' => $ktg
				);
			}
		}

		// $data['produk'] 	= $this->Model_produk->get_filter($where, $min_price, $max_price)->result_array();
		$data['kategori']	= $this->Model_produk->get_kategori_produk()->result_array();
		// $data['gambar'] 	= $this->Model_produk->get_gambar()->result_array();
		$data['max']		= $this->Model_produk->get_max_harga()->row();
		$data['where']		= $where;
		$data['min_price']	= $min_price;
		$data['max_price']	= $max_price;

		// echo json_encode($data);
		// exit;

		$this->load->view('template/header2');
		$this->load->view('filter_produk', $data);
		$this->load->view('template/footer');

		// echo json_encode($data);
	}

	public function filter_page($rowno = 0)
	{
		$min_price = $this->input->post('min_price');
		$max_price = $this->input->post('max_price');

		// $min_price = 8000;
		// $max_price = 10000;

		// item yang diambil di tiap page
		$rowperpage = 6;

		// Row position
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}

		// All records count
		$allcount = $this->Model_produk->getFilterCount($min_price, $max_price);

		// Get records
		// $users_record = $this->Model_produk->getData($rowno, $rowperpage);

		// Pagination Configuration
		$config['base_url'] = base_url() . 'Produk/filter_page';
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;

		$config['first_link']       = '<i class="fa fa-angle-double-left"></i>';
		$config['last_link']        = '<i class="fa fa-angle-double-right"></i>';
		$config['next_link']        = '<i class="fa fa-angle-right"></i>';
		$config['prev_link']        = '<i class="fa fa-angle-left"></i>';
		$config['full_tag_open']    = '<div class="ps-pagination mb-lg-5 "><ul class="pagination">';
		$config['full_tag_close']   = '</ul></div>';
		$config['num_tag_open']     = '<li>';
		$config['num_tag_close']    = '</li>';
		$config['cur_tag_open']     = '<li class="active"><a>';
		$config['cur_tag_close']    = '</a></li>';
		$config['next_tag_open']    = '<li>';
		$config['next_tagl_close']  = '</li>';
		$config['prev_tag_open']    = '<li>';
		$config['prev_tagl_close']  = '</li>';
		$config['first_tag_open']   = '<li>';
		$config['first_tagl_close'] = '</li>';
		$config['last_tag_open']    = '<li>';
		$config['last_tagl_close']  = '</li>';

		// Initialize
		$this->pagination->initialize($config);

		// Initialize $data Array
		$data['pagination'] = $this->pagination->create_links();
		// $data['result'] = $this->Model_produk->getData($rowno, $rowperpage);
		$data['result'] 	= $this->Model_produk->get_filter($min_price, $max_price, $rowperpage, $rowno)->result_array();
		$data['row'] = $rowno;

		echo json_encode($data);
	}

	public function pagination($rowno = 0)
	{
		// item yang diambil di tiap page
		$rowperpage = 6;

		// Row position
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}

		// All records count
		$allcount = $this->Model_produk->getrecordCount();

		// Get records
		// $users_record = $this->Model_produk->getData($rowno, $rowperpage);

		// Pagination Configuration
		$config['base_url'] = base_url() . 'Produk/pagination';
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;

		$config['first_link']       = '<i class="fa fa-angle-double-left"></i>';
		$config['last_link']        = '<i class="fa fa-angle-double-right"></i>';
		$config['next_link']        = '<i class="fa fa-angle-right"></i>';
		$config['prev_link']        = '<i class="fa fa-angle-left"></i>';
		$config['full_tag_open']    = '<div class="ps-pagination mb-lg-5 "><ul class="pagination">';
		$config['full_tag_close']   = '</ul></div>';
		$config['num_tag_open']     = '<li>';
		$config['num_tag_close']    = '</li>';
		$config['cur_tag_open']     = '<li class="active"><a>';
		$config['cur_tag_close']    = '</a></li>';
		$config['next_tag_open']    = '<li>';
		$config['next_tagl_close']  = '</li>';
		$config['prev_tag_open']    = '<li>';
		$config['prev_tagl_close']  = '</li>';
		$config['first_tag_open']   = '<li>';
		$config['first_tagl_close'] = '</li>';
		$config['last_tag_open']    = '<li>';
		$config['last_tagl_close']  = '</li>';

		// Initialize
		$this->pagination->initialize($config);

		// Initialize $data Array
		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $this->Model_produk->getData($rowno, $rowperpage);
		$data['row'] = $rowno;

		echo json_encode($data);
	}
}
