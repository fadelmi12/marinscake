<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

	
	public function index()
	{
		$this->load->view('template/header2');
		$this->load->view('keranjang');
		$this->load->view('template/footer');
	}
}