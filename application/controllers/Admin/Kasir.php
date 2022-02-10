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

    public function index(){
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/kasir');
        $this->load->view('admin/template/footer');
    }
}
