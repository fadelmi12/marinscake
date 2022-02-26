<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		if ($this->session->userdata('nama') == null) {
			redirect('admin/auth/login');
		}
	}

    public function index()
	{
		$data['produk'] 			= $this->Model_dashboard->get_produk()->result_array();
        $data['transaksi_langsung'] = $this->Model_dashboard->transaksi_langsung()->result_array();
		$data['transaksi_preorder'] = $this->Model_dashboard->transaksi_preorder()->result_array();
		//echo "<pre>"; print_r($data); exit;
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/template/footer');
    }
}
