<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        if ($this->session->userdata('role') != 77) {
            redirect('admin/auth/login');
        }
        date_default_timezone_set('Asia/Jakarta');
    }

    // Tampil Data Transaksi Langsung
    public function langsung($tanggal)
    {
        $data['tanggal'] = $tanggal;
        $data['riwayat_transaksi'] = $this->Model_transaksi->get_riwayat_transaksi($tanggal)->result_array();
        $data['detail_transaksi'] = $this->Model_transaksi->detail_riwayat_transaksi()->result_array();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/transaksi/daftar_transaksi', $data);
        $this->load->view('admin/template/footer');
    }

    // Update Data Transaksi Langsung
    public function update_transaksi($idTransaksi)
    {
        $total_belanja  = $this->input->post('total_belanja');
        $metode         = $this->input->post('metode');
        $pembayaran     = $this->input->post('pembayaran');
        $status         = $this->input->post('status');
        // $tanggal        = $this->input->post('tanggal');

        $data = array(
            'total_belanja' => $total_belanja,
            'metode'        => $metode,
            'pembayaran'    => $pembayaran,
            'status'        => $status,
            // 'tanggal'       => $tanggal,
        );

        $where = array('id_transaksi' => $idTransaksi);

        $this->db->update('transaksi', $data, $where);
        $this->session->set_flashdata(
            'transaksi',
            '<script type ="text/JavaScript">  
                        swal("Berhasil","Data transaksi berhasil diupdate","success")  
                        </script>'
        );
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    // Hapus Data Transaksi langsung
    public function hapus_transaksi($idTransaksi)
    {
        $where = array('id_transaksi' => $idTransaksi);

        $this->db->delete('transaksi', $where);
        $this->session->set_flashdata(
            'transaksi',
            '<script type ="text/JavaScript">  
                        swal("Berhasil","Data transaksi berhasil dihapus","success")  
                        </script>'
        );
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    // Tampil Data Transaksi Preorder
    public function preorder($tanggal)
    {
        $data['tanggal'] = $tanggal;
        $data['riwayat_preorder']       = $this->Model_transaksi->get_riwayat_preorder($tanggal)->result_array();
        $data['detail_preorder']        = $this->Model_transaksi->detail_riwayat_preorder()->result_array();
        $data['barang_belum_dikirim']   = $this->Model_transaksi->barang_belum_dikirim()->result_array();
        $data['data_midtrans']          = $this->db->get('midtrans')->result_array();
        // echo json_encode($data['detail_preorder']);
        // exit('');
        //echo "<pre>"; print_r($data2);exit;
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/transaksi/preorder', $data);
        $this->load->view('admin/template/footer');
    }

    // Tampil Data Transaksi belum terkirim
    public function barang_belum_dikirim()
    {

        $data['detail_preorder']    = $this->Model_transaksi->detail_riwayat_preorder()->result_array();
        $data['riwayat_preorder']   = $this->Model_transaksi->barang_belum_dikirim()->result_array();
        $data['data_midtrans']          = $this->db->get('midtrans')->result_array();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/transaksi/barang_belum_dikirim', $data);
        $this->load->view('admin/template/footer');
    }

    // Update Data Transaksi Preorder
    public function update_preorder($idPreorder)
    {
        // $jumlah         = $this->input->post('jumlah');
        // $metode         = $this->input->post('metode');
        // $pembayaran     = $this->input->post('pembayaran');
        $status         = $this->input->post('status');
        $tanggalDikirim = $this->input->post('tanggalDikirim');
        // $filter_tanggal = $this->input->post('filter_tanggal');

        $data = array(
            // 'jumlah'        => $jumlah,
            // 'metode'        => $metode,
            // 'pembayaran'    => $pembayaran,
            'status'        => $status,
            'tanggal_dikirim' => $tanggalDikirim,
        );

        $where = array('id_preorder' => $idPreorder);

        $this->db->update('Preorder', $data, $where);
        $this->session->set_flashdata(
            'preorder',
            '<script type ="text/JavaScript">  
                        swal("Berhasil","Data preorder berhasil diupdate","success")  
                        </script>'
        );
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    // Update Data Transaksi Preorder
    public function hapus_preorder($idPreorder)
    {
        $where = array('id_preorder' => $idPreorder);

        $this->db->delete('preorder', $where);
        $this->session->set_flashdata(
            'preorder',
            '<script type ="text/JavaScript">  
                        swal("Berhasil","Data transaksi berhasil dihapus","success")  
                        </script>'
        );
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
