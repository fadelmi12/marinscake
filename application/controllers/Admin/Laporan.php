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

    public function laporan_modal()
    {   
        $data['data_modal'] = $this->Model_laporan->get_data_modal()->result_array();
        $data['detail_modal'] = $this->Model_laporan->get_detail_modal()->result_array();
        //echo "<pre>"; print_r($data); exit;
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/laporan/laporan_modal', $data);
        $this->load->view('admin/template/footer');
    }


    public function laporan_gaji()
    {   
        $data['data_karyawan'] = $this->Model_karyawan->get_data_karyawan()->result_array();
        $data['gaji_karyawan'] = $this->Model_laporan->get_gaji_karyawan(date('Y-m'));

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/laporan/laporan_gaji', $data);
        $this->load->view('admin/template/footer');
    }

    public function gaji_lunas($idKaryawan)
    {
        $data = array(
            'idKaryawan' => $idKaryawan,
            'status'     => 1,
            'bulan'      => date('Y-m'),
        );

        $this->db->insert('gaji_karyawan', $data);
        $this->session->set_flashdata('gajiLunas',
                            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data gaji berhasil diupdate","success"); 
                            </script>'  
                    );
        redirect('admin/laporan/laporan_gaji/');
    }

    public function filter_gaji_lunas($idKaryawan_blnTh)
    {
        $idKaryawan = strstr($idKaryawan_blnTh, '_', true);
        $blnTh      = substr($idKaryawan_blnTh, strpos($idKaryawan_blnTh, "_") + 1);

        $data = array(
            'idKaryawan' => $idKaryawan,
            'status'     => 1,
            'bulan'      => $blnTh,
        );
        
        $this->db->insert('gaji_karyawan', $data);
        $this->session->set_flashdata('filterBulan',
                            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data gaji berhasil diupdate","success"); 
                            </script>'  
                    );
        redirect('admin/laporan/gaji_filter_bulan/'.$blnTh);
    }

    public function gaji_filter_bulan($blnTh)
    {   
        $query = $blnTh;
        $data['data_karyawan'] = $this->Model_karyawan->get_data_karyawan()->result_array();
        $data['gaji_karyawan'] = $this->Model_laporan->search_bulan($query);
        $data['bulan_tahun']   = $query;
        
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/laporan/laporan_gaji_filter', $data);
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
