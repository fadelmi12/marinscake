<?php

use LDAP\Result;

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
		// $id_kategori	= $this->Model_produk->get_produk_where($id_produk)->row()->idJenis;
		// $data['rekom']	= $this->Model_produk->get_rekom_all($id_kategori, $id_produk)->result_array();
		$data['gambar'] = $this->Model_produk->get_gambar_produk($id_produk)->result_array();

		$this->load->view('template/header2');
		$this->load->view('detail_produk', $data);
		$this->load->view('template/footer');
	}

	public function load_rekom($no = 0)
	{
		$id_produk = $this->input->post('id_produk');
		// $id_produk = 19;
		$id_kategori	= $this->Model_produk->get_produk_where($id_produk)->row()->idJenis;
		$limit = 4;
		if ($no != 0) {
			$limit = $limit * $no;
		}
		$no++;
		$rekom_all	= count($this->Model_produk->get_all_rekom($id_kategori, $id_produk)->result_array());
		$rekom	= $this->Model_produk->get_rekom_limit($id_kategori, $id_produk, $limit)->result_array();
		$tampil = '
			<div class="row">
		';
		foreach ($rekom as $val) {
			$tampil .= '
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
					<div class="ps-product">
						<div class="ps-product__thumbnail">
							<img src="' . base_url() . 'uploads/gambar_produk/' . $val['gambar'] . '" alt="">
							<a class="ps-product__overlay" href="' . base_url() . 'produk/detail/' . $val['idProduk'] . '"></a>
							<ul class="ps-product__actions">
								<li><a href="' . base_url() . 'produk/detail/' . $val['idProduk'] . '" data-tooltip="Quick View"><i class="ba-magnifying-glass"></i></a></li>
								<!-- <li><a href="#" data-tooltip="Favorite"><i class="ba-heart"></i></a></li> -->
								<li>
									<a class="tambah_cart" data-tooltip="Add to Cart" data-produkid="' . $val['idProduk'] . '" data-produknama="' . $val['namaProduk'] . '" data-produkharga="' . $val['harga'] . '" data-produkgambar="' . $val['gambar'] . '" data-minorder="' . $val['min_order'] . '"><i class="ba-shopping"></i></a>
								</li>
							</ul>
						</div>
						<div class="ps-product__content"><a class="ps-product__title" href="' . base_url() . 'produk/detail/' . $val['idProduk'] . '">' . $val['namaProduk'] . '</a>
							<p><a href="">Min order : ' . $val['min_order'] . '</a></p>
							<p class="ps-product__price">Rp ' . number_format($val['harga'], '0', ',', '.') . '</p>
						</div>
					</div>
				</div>
		';
		}

		if ($limit >= $rekom_all) {
			$tampil .= '
				</div>
				<div id="" data-no="" class="ps-section__footer text-center mt-0 pt-0">
					<a class="ps-btn">No More</a>
				</div>
			';
		} else {
			$tampil .= '
				</div>
				<div class="ps-section__footer text-center mt-0 pt-0">
					<a id="btn_load" data-no="' . $no . '" class="ps-btn">Load more</a>
				</div>
			';
		}

		echo $tampil;
	}

	public function cari()
	{
		$cari = $this->input->post('cari');
		// $data['pencarian'] 	= $this->Model_produk->cari_produk($cari)->result_array();
		// $data['gambar'] = $this->Model_produk->get_gambar()->result_array();
		$data['kategori']	= $this->Model_produk->get_kategori_produk()->result_array();
		$data['max']		= $this->Model_produk->get_max_harga()->row();
		$data['cari'] = $cari;
		// $data['result'] 	= $this->Model_produk->cari_produk($cari)->result_array();

		// echo json_encode($data['result']);
		// exit;

		$this->load->view('template/header2');
		$this->load->view('cari_produk', $data);
		$this->load->view('template/footer');
	}

	public function pencarian($rowno = 0)
	{
		$cari 	= $this->input->post('cari');

		// item yang diambil di tiap page
		$rowperpage = 6;

		// Row position
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}

		// All records count
		$allcount = $this->Model_produk->cari_count($cari);

		// Get records
		// $users_record = $this->Model_produk->getData($rowno, $rowperpage);

		// Pagination Configuration
		$config['base_url'] = base_url() . 'Produk/pencarian';
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
		$data['result'] 	= $this->Model_produk->cari_produk($cari, $rowno, $rowperpage)->result_array();
		$data['row'] = $rowno;
		$data['xxx'] = $allcount;

		echo json_encode($data);
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
		$kategori = $this->input->post('kategori');
		$min_price = $this->input->post('min_price');
		$max_price = $this->input->post('max_price');

		$whr = explode(",", $kategori);
		foreach ($whr as $key) {
			$send[] = array(
				'idJenis' => $key
			);
		}

		// $cout = array();

		// foreach ($whr as $val) {
		// 	array_push(
		// 		$cout,
		// 		$this->Model_produk->get_filter_count($val, $min_price, $max_price)->result_array()
		// 	);
		// }
		// // $data['result'] = $cout;
		// echo json_encode($cout);
		// exit;
		// foreach ($whr as $val) {
		// 	$cout[] = $this->Model_produk->get_filter_count($val, $min_price, $max_price)->result_array();
		// }
		// $total_where = $cout;
		// $data['cout'] = $cout;
		// $cout = $this->Model_produk->get_filter_count($ajg, $min_price, $max_price)->result_array();

		// $where = explode(",", $kategori);
		// $count = count($where);
		// for ($x = 0; $x < $count; $x++) {
		// 	$produk[] 	= $this->Model_produk->get_filter_where($where[$x], $min_price, $max_price)->result_array();
		// }

		// echo json_encode($cout);
		// exit;

		$data['kategori']	= $this->Model_produk->get_kategori_produk()->result_array();
		// $data['gambar'] 	= $this->Model_produk->get_gambar()->result_array();
		$data['max']		= $this->Model_produk->get_max_harga()->row();
		$data['where']		= $send;
		$data['min_price']	= $min_price;
		$data['max_price']	= $max_price;
		$data['jenis']		= $kategori;

		$this->load->view('template/header2');
		$this->load->view('filter_produk', $data);
		$this->load->view('template/footer');
	}

	public function filter_page($rowno = 0)
	{
		$min_price 	= $this->input->post('min_price');
		$max_price 	= $this->input->post('max_price');
		$kategori  	= $this->input->post('where');

		$where = explode(",", $kategori);

		// item yang diambil di tiap page
		$rowperpage = 6;

		// Row position
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}

		$cout = array();

		foreach ($where as $val) {
			$i = $this->Model_produk->get_filter_count($val, $min_price, $max_price)->result_array();

			$x = array_merge(
				$cout,
				$i
			);
			$cout += $i;
		}
		// All records count
		$allcount = count($x);

		$data['result'] = array_slice($x, $rowno, $rowperpage);

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
		$data['row'] = $rowno;
		$data['where'] = $where;

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
