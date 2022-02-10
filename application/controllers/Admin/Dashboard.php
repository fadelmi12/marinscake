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

    public function index(){
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/template/footer');
    }
}
