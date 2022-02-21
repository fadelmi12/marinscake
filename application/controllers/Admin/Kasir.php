<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		if ($this->session->userdata('idUser') == null) {
			redirect('admin/auth/login');
		} elseif ($this->session->userdata('role') == 24) {
			redirect('kasir/kasir_page');
		}
	}

	public function index()
	{
		$data['jenis_produk'] = $this->Model_produk->get_kategori_produk()->result_array();
		$data['daftar_produk'] = $this->Model_produk->get_produk()->result_array();

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/kasir', $data);
		$this->load->view('admin/template/footer');
	}

	public function terjual_atau_preorder()
	{
		date_default_timezone_set('Asia/Jakarta');
		if ($this->input->post('tglDikirim') != null) {

			// Pembelian Preorder

			$tanggalDikirim = $this->input->post('tglDikirim');
			$total_belanja = $this->input->post('total_belanja');

			$data = array(
				'jumlah' 			=> $total_belanja,
				'metode'			=> "Offline",
				'tanggalPesan'		=> date("Y-m-d"),
				'tanggalDikirim'	=> $tanggalDikirim,
				'status'			=> "Belum Dikirim",

			);

			$simpan = $this->db->insert('preorder', $data);
			$insert_id = $this->db->insert_id();

			if ($simpan) {
				$data2 = array();
				foreach ($_POST['namaProduk'] as $key => $val) :
					$ttProduk 	= $_POST['totalProduk'][$key];
					$rpl1 		= str_replace('Rp. ', '', $ttProduk);
					$rpl2 		= str_replace('.00', '', $rpl1);
					$data2[] 	= array(
						'idPreorder'	=> $insert_id,
						'idProduk'		=> $_POST['idProduk'][$key],
						'namaProduk'	=> $_POST['namaProduk'][$key],
						'jumlah'    	=> $_POST['jumlahProduk'][$key],
						'total'			=> $rpl2,
					);
				endforeach;

				$this->db->insert_batch('detail_preorder', $data2);
				$this->session->set_flashdata(
					'berhasil_beli',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
	                            <script type ="text/JavaScript">  
	                            swal("Berhasil","Data Preorder berhasil ditambahkan","success")  
	                            </script>'
				);
				redirect('admin/kasir/index/');
			}
		} else {

			// Pembelian Langsung

			$total_belanja = $this->input->post('total_belanja');

			$data = array(
				'total_belanja' => $total_belanja,
				'metode'		=> "Offline",
				'pembayaran'	=> "Tunai",
				'status'		=> "Selesai",
				'tanggal'		=> date("Y-m-d"),
			);

			$simpan = $this->db->insert('transaksi', $data);
			$insert_id = $this->db->insert_id();

			if ($simpan) {
				$data2 = array();
				foreach ($_POST['namaProduk'] as $key => $val) :
					$ttProduk 	= $_POST['totalProduk'][$key];
					$rpl1 		= str_replace('Rp. ', '', $ttProduk);
					$rpl2 		= str_replace('.00', '', $rpl1);
					$data2[] 	= array(
						'idTransaksi'	=> $insert_id,
						'idProduk'		=> $_POST['idProduk'][$key],
						'namaProduk'	=> $_POST['namaProduk'][$key],
						'jumlah'    	=> $_POST['jumlahProduk'][$key],
						'total'			=> $rpl2,
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
				redirect('admin/kasir/index/');
			}
		}
	}
}
