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
        date_default_timezone_set('Asia/Jakarta');
    }

    public function laporan_gaji($filter)
    {   
        $data['data_karyawan'] = $this->Model_karyawan->get_data_karyawan()->result_array();
        $data['gaji_karyawan'] = $this->Model_laporan->get_gaji_karyawan($filter)->result_array();
        $data['bulan'] = $filter;

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/laporan/laporan_gaji', $data);
        $this->load->view('admin/template/footer');
    }

    public function gaji_lunas($idKaryawan_bulan)
    {   
        $idKaryawan  = strstr($idKaryawan_bulan, '_', true);
        $bulan_tahun = substr($idKaryawan_bulan, strpos($idKaryawan_bulan, "_") + 1);

        $gaji = $this->Model_laporan->get_gaji($idKaryawan)->row();
        foreach ($gaji as $gj_karyawan);

        $data = array(
            'idKaryawan' => $idKaryawan,
            'uangGaji'   => $gj_karyawan,
            'bulan'      => $bulan_tahun,
        );
        
        $this->db->insert('gaji_karyawan', $data);
        $this->session->set_flashdata('gaji_karyawan',
                '<script type ="text/JavaScript">  
                    swal("Sukses","Data gaji berhasil diupdate","success"); 
                </script>'  
        );
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }

    public function hapus_gaji($idGaji)
    {
        $where = array('idGaji' => $idGaji);
        
        $this->db->delete('gaji_karyawan', $where);
        $this->session->set_flashdata('gaji_karyawan',
                '<script type ="text/JavaScript">  
                    swal("Sukses","Data gaji berhasil diupdate","success"); 
                </script>'  
        );

        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
    
    public function laporan_penjualan($filter)
    {
        $data['data_transaksi']   = $this->Model_laporan->get_transaksi_langsung($filter)->result_array();
        $data['detail_transaksi'] = $this->Model_laporan->get_detail_transaksi_langsung()->result_array();
        $data['data_preorder']   = $this->Model_laporan->get_transaksi_preorder($filter)->result_array();
        $data['detail_preorder'] = $this->Model_laporan->get_detail_transaksi_preorder()->result_array();
        $data['bulan'] = $filter;

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/laporan/laporan_penjualan', $data);
        $this->load->view('admin/template/footer');
    }

	public function laporan_keuntungan($filter)
    {
        $data['data_transaksi']     = $this->Model_laporan->total_transaksi_langsung($filter)->result_array();
        $data['data_preorder']      = $this->Model_laporan->total_transaksi_preorder($filter)->result_array();
        $data['data_modal']         = $this->Model_laporan->total_pengeluaran_modal($filter)->result_array();
        $data['data_gaji']          = $this->Model_laporan->total_pengeluaran_gaji($filter)->result_array();        
        $data['bulan'] = $filter;
        //echo "<pre>"; print_r($data); exit;
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/laporan/laporan_keuntungan', $data);
        $this->load->view('admin/template/footer');
    }
}
