<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        if ($this->session->userdata('idUser') == null) {
        	redirect('admin/auth/login');
        }
    }

    public function index()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/transaksi/daftar_transaksi');
        $this->load->view('admin/template/footer');
    }

    public function preorder()
    {
        
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/transaksi/preorder');
        $this->load->view('admin/template/footer');
    }

    
}
