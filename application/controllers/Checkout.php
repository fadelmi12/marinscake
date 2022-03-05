<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['keranjang'] 	= $this->cart->contents();
		$data['kota']		= $this->Model_kota->get_kota()->result_array();

		$this->load->view('template/header2');
		$this->load->view('checkout', $data);
		$this->load->view('template/footer');
	}

	public function save_order()
	{
		$total_belanja 	= $this->input->post('total_belanja');
		$metode			= "Online";
		$status			= "Menunggu Pembayaran";
		$tanggal		= date('Y-m-d H:i:s');
		$tanggal_kirim	= $this->input->post('tanggal_kirim');
		$ongkir			= $this->input->post('ongkir');
		$data_preorder	= array(
			'jumlah'		=> $total_belanja,
			'metode'		=> $metode,
			'status'		=> $status,
			'tanggal'		=> $tanggal,
			'tgl_kirim'		=> $tanggal_kirim,
			'ongkir'		=> $ongkir
		);
		$insert_preorder = $this->db->insert('preorder', $data_preorder);
		if ($insert_preorder) {
			$id_preorder = $this->db->insert_id();

			$cart = $this->cart->contents();
			foreach ($cart as $key) {
				$data_detailPreorder = array(
					'idPreorder'	=> $id_preorder,
					'idProduk'		=> $key['id'],
					'namaProduk'	=> $key['name'],
					'jumlah'		=> $key['qty'],
					'total'			=> $key['price'] * $key['qty']
				);
				$insert_detailPreorder = $this->db->insert('detail_preorder', $data_detailPreorder);
			}
			if ($insert_detailPreorder) {
				$data_pengiriman = array(
					'idTransaksi' 	=> $id_preorder,
					'nama'			=> $this->input->post('nama'),
					'email'			=> $this->input->post('email'),
					'no_hp'			=> $this->input->post('no_hp'),
					'kota'			=> $this->input->post('kota'),
					'alamat'		=> $this->input->post('alamat'),
					'catatan'		=> $this->input->post('catatan')
				);
				$insert_pengiriman = $this->db->insert('pengiriman', $data_pengiriman);
				if ($insert_pengiriman) {
					$this->cart->destroy();
					redirect('checkout/pembayaran/' . $id_preorder);
				}
			}
		}
	}

	public function pembayaran($id_transaksi)
	{
		$data['transaksi'] 	= $this->Model_transaksi->get_transaksi($id_transaksi)->row();
		$data['detail'] 	= $this->Model_transaksi->get_detailTransaksi($id_transaksi)->result_array();
		$data['pengiriman'] = $this->Model_transaksi->get_pengiriman($id_transaksi)->result_array();
		$data['midtrans']	= $this->Model_transaksi->get_midtrans($id_transaksi)->row();

		$this->load->view('template/header2');
		$this->load->view('pembayaran', $data);
		$this->load->view('template/footer');
	}
}
