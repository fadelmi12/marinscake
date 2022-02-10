<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        if ($this->session->userdata('idUser') == null) {
            redirect('admin/auth/login');
        }
    }


    public function laporan_gaji()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/laporan/laporan_gaji');
        $this->load->view('admin/template/footer');
    }

    public function laporan_penjualan()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/laporan/laporan_penjualan');
        $this->load->view('admin/template/footer');
    }
	public function laporan_keuntungan()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/laporan/laporan_keuntungan');
        $this->load->view('admin/template/footer');
    }

}
