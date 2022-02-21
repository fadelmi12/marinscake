<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir_page extends CI_Controller
{


    public function index()
    {
        $data['jenis_produk'] = $this->Model_produk->get_kategori_produk()->result_array();
        $data['daftar_produk'] = $this->Model_produk->get_produk()->result_array();

        $this->load->view('kasir/template/header');
        $this->load->view('kasir/template/sidebar');
        $this->load->view('kasir/kasir_page', $data);
        $this->load->view('kasir/template/footer');
    }
}
