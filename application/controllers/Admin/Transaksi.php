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
        $post_tgl = $this->input->post('filter_tanggal');

        if ($post_tgl == null) {
            $tanggal = date('Y-m-d');
        }else{
            $tanggal = $post_tgl;
        }

        $data['tanggal'] = $tanggal;
        $data['riwayat_transaksi'] = $this->Model_transaksi->get_riwayat_transaksi($tanggal)->result_array();
        $data['detail_transaksi'] = $this->Model_transaksi->detail_riwayat_transaksi()->result_array();
        
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/transaksi/daftar_transaksi', $data);
        $this->load->view('admin/template/footer');
    }

    public function update_transaksi($idTransaksi)
    {
        $total_belanja  = $this->input->post('total_belanja');
        $metode         = $this->input->post('metode');
        $pembayaran     = $this->input->post('pembayaran');
        $status         = $this->input->post('status');
        $tanggal        = $this->input->post('tanggal');

        $data = array(
            'total_belanja' => $total_belanja,
            'metode'        => $metode,
            'pembayaran'    => $pembayaran,
            'status'        => $status,
            'tanggal'       => $tanggal,
        );

        $where = array('idTransaksi' => $idTransaksi);

        $this->db->update('transaksi', $data, $where);
        $this->session->set_flashdata('transaksi',
                        '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                        <script type ="text/JavaScript">  
                        swal("Berhasil","Data transaksi berhasil diupdate","success")  
                        </script>'  
                );
        redirect('admin/transaksi/index/');
    }

    public function hapus_transaksi($idTransaksi)
    {
        $where = array('idTransaksi' => $idTransaksi);

        $this->db->delete('transaksi', $where);
        $this->session->set_flashdata('transaksi',
                        '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                        <script type ="text/JavaScript">  
                        swal("Berhasil","Data transaksi berhasil dihapus","success")  
                        </script>'  
                );
        redirect('admin/transaksi/index/');
    }

    public function preorder()
    {
        
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/transaksi/preorder');
        $this->load->view('admin/template/footer');
    } 
}
