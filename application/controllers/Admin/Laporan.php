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
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('gaji_karyawan', 'gaji_karyawan.idKaryawan = karyawan.idKaryawan');
        $data['gaji_karyawan'] = $this->db->get()->result_array();
        
        //echo "<pre>"; print_r($data); exit;
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/laporan/laporan_gaji', $data);
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
