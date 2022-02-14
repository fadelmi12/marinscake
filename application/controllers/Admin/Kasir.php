<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		if ($this->session->userdata('idUser') == null) {
			redirect('admin/auth/login');
		}
	}

    public function index()
    {
    	$data['jenis_produk'] = $this->Model_produk->get_kategori_produk()->result_array();
    	$data['daftar_produk'] = $this->Model_produk->get_produk()->result_array();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/kasir', $data);
        $this->load->view('admin/template/footer');
    }
}
