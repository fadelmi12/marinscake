<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{


	public function index()
	{
		$data['keranjang'] 	= $this->cart->contents();
		$data['kota']		= $this->Model_kota->get_kota()->result_array();

		$this->load->view('template/header2');
		$this->load->view('checkout', $data);
		$this->load->view('template/footer');
	}

	public function save_order() {
		$total_belanja 	= $this->input->post('total_order');
	}
}
