<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir_page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('idUser') == null) {
            redirect('admin/auth/login');
        }
        date_default_timezone_set('Asia/Jakarta');
    }

    public function dashboard()
    {
        $id_user        = $this->session->userdata('idUser');
        $data['user']   = $this->Model_user->get_user_id($id_user)->row();

        $this->load->view('kasir/template/header');
        $this->load->view('kasir/template/sidebar');
        $this->load->view('kasir/dashboard', $data);
        $this->load->view('kasir/template/footer');
    }

    public function langsung()
    {
        $data['jenis_produk']   = $this->Model_produk->get_kategori_produk()->result_array();
        $data['daftar_produk']  = $this->Model_produk->get_produk()->result_array();
        $data['gambar']         = $this->Model_produk->get_gambar()->result_array();

        $this->load->view('kasir/template/header');
        $this->load->view('kasir/template/sidebar');
        $this->load->view('kasir/kasir_page', $data);
        $this->load->view('kasir/template/footer');
    }
    public function preorder()
    {
        $data['jenis_produk']   = $this->Model_produk->get_kategori_produk()->result_array();
        $data['daftar_produk']  = $this->Model_produk->get_produk()->result_array();
        $data['gambar']         = $this->Model_produk->get_gambar()->result_array();

        $this->load->view('kasir/template/header');
        $this->load->view('kasir/template/sidebar');
        $this->load->view('kasir/preorder', $data);
        $this->load->view('kasir/template/footer');
    }

    // tambah data transaksi
    public function terjual_atau_preorder()
    {
        if ($this->input->post('tglDikirim') != null) {

            // Pembelian Preorder

            $tanggalDikirim = $this->input->post('tglDikirim');
            $total_belanja = $this->input->post('total_belanja');

            $data = array(
                'jumlah'             => $total_belanja,
                'metode'            => "Offline",
                // 'pembayaran'		=> "Tunai",
                'tanggalPesan'        => date("Y-m-d"),
                'tanggalDikirim'    => $tanggalDikirim,
                'status'            => "Menunggu Pengiriman",

            );

            $simpan = $this->db->insert('preorder', $data);
            $insert_id = $this->db->insert_id();

            if ($simpan) {
                $data2 = array();
                foreach ($_POST['namaProduk'] as $key => $val) :
                    $ttProduk     = $_POST['totalProduk'][$key];
                    $rpl1         = str_replace('Rp. ', '', $ttProduk);
                    $rpl2         = str_replace('.00', '', $rpl1);
                    $data2[]     = array(
                        'idPreorder'    => $insert_id,
                        'idProduk'        => $_POST['idProduk'][$key],
                        'namaProduk'    => $_POST['namaProduk'][$key],
                        'jumlah'        => $_POST['jumlahProduk'][$key],
                        'total'            => $rpl2,
                    );
                endforeach;

                $this->db->insert_batch('detail_preorder', $data2);
                $this->session->set_flashdata(
                    'berhasil_preorder',
                    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
	                            <script type ="text/JavaScript">  
	                            swal("Berhasil","Data Preorder berhasil ditambahkan","success")  
	                            </script>'
                );
                header("Location: ".$_SERVER['HTTP_REFERER']);
            }
        } else {

            // Pembelian Langsung
            $total_belanja = $this->input->post('total_belanja');
            $data = array(
                'total_belanja' => $total_belanja,
                'metode'        => "Offline",
                'pembayaran'	=> "Tunai",
                'status'        => "Selesai",
                'tanggal'        => date("Y-m-d"),
            );

            $simpan = $this->db->insert('transaksi', $data);
            $insert_id = $this->db->insert_id();

            if ($simpan) {
                $data2 = array();
                foreach ($_POST['namaProduk'] as $key => $val) :
                    $ttProduk     = $_POST['totalProduk'][$key];
                    $rpl1         = str_replace('Rp. ', '', $ttProduk);
                    $rpl2         = str_replace('.00', '', $rpl1);
                    $data2[]     = array(
                        'idTransaksi'    => $insert_id,
                        'idProduk'        => $_POST['idProduk'][$key],
                        'namaProduk'    => $_POST['namaProduk'][$key],
                        'jumlah'        => $_POST['jumlahProduk'][$key],
                        'total'            => $rpl2,
                    );
                endforeach;

                $this->db->insert_batch('detail_transaksi', $data2);
                $this->session->set_flashdata(
                    'berhasil_beli',
                    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
	                            <script type ="text/JavaScript">  
	                            swal("Berhasil","Pembelian berhasil dilakukan","success")  
	                            </script>'
                );
                header("Location: ".$_SERVER['HTTP_REFERER']);
            }
        }
    }
}
