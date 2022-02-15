<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	
	public function index()
	{
		$this->load->view('template/header2');
		$this->load->view('daftar_produk');
		$this->load->view('template/footer');
	}
}
