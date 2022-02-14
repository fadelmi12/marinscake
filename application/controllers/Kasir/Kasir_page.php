<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir_page extends CI_Controller
{


    public function index()
    {
        $this->load->view('kasir/template/header');
        $this->load->view('kasir/template/sidebar');
        $this->load->view('kasir/kasir_page');
        $this->load->view('kasir/template/footer');
    }
}
