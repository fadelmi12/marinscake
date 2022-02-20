<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	
	public function index()
	{
		$this->load->view('template/header2');
		$this->load->view('checkout');
		$this->load->view('template/footer');
	}
}