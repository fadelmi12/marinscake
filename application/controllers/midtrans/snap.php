<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-QWkM1P8gDTi_0ehrXR3nf4N0', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('checkout_snap');
	}

	public function token()
	{
		$id_preorder	= $this->input->post('idPreorder');
		// $id_preorder	= 22;
		$total_bayar	= $this->input->post('total_bayar');
		$produk			= $this->Model_preorder->get_preorder($id_preorder)->row();
		$pengiriman		= $this->Model_preorder->get_pengiriman($id_preorder)->row();
		$item			= $this->Model_preorder->get_detailPreorder($id_preorder)->result_array();

		// Required
		$transaction_details = array(
			'order_id' => $id_preorder,
			'gross_amount' => $total_bayar, // no decimal allowed for creditcard
		);

		$item_details = array();
		foreach ($item as $xyz) {
			$item_details[] = array(
				'price'     => $xyz['total'] / $xyz['jumlah'],
				'quantity'  => $xyz['jumlah'],
				'name'      => $xyz['nama_produk'],
			);
		}
		$item_details[] = array(
			'price' => $pengiriman->ongkir,
			'quantity' => 1,
			'name' => "Ongkir"
		);

		// Optional
		$billing_address = array(
			'first_name'    => $pengiriman->nama,
			// 'last_name'     => "Litani",
			'address'       => $pengiriman->alamat,
			'city'          => $pengiriman->nama_kota,
			// 'postal_code'   => "16602",
			'phone'         => $pengiriman->no_hp,
			'country_code'  => 'IDN'
		);
		// $billing_address = array(
		// 	'first_name'    => "hasgjkdgsa",
		// 	// 'last_name'     => "Litani",
		// 	'address'       => "hgsdfsefud",
		// 	'city'          => "fdgfhksa",
		// 	// 'postal_code'   => "16602",
		// 	'phone'         => "dbshgfids",
		// 	'country_code'  => 'IDN'
		// );

		// Optional
		$shipping_address = array(
			'first_name'    => $pengiriman->nama,
			// 'last_name'     => "Litani",
			'address'       => $pengiriman->alamat,
			'city'          => $pengiriman->nama_kota,
			// 'postal_code'   => "16602",
			'phone'         => $pengiriman->no_hp,
			'country_code'  => 'IDN'
		);
		// $shipping_address = array(
		// 	'first_name'    => "hasgjkdgsa",
		// 	// 'last_name'     => "Litani",
		// 	'address'       => "hgsdfsefud",
		// 	'city'          => "fdgfhksa",
		// 	// 'postal_code'   => "16602",
		// 	'phone'         => "dbshgfids",
		// 	'country_code'  => 'IDN'
		// );

		// Optional
		$customer_details = array(
			'first_name'    => $pengiriman->nama,
			// 'last_name'     => "Litani",
			'email'         => $pengiriman->email,
			'phone'         => $pengiriman->no_hp,
			'billing_address'  => $billing_address,
			'shipping_address' => $shipping_address
		);
		// $customer_details = array(
		// 	'first_name'    => "hasgjkdgsa",
		// 	// 'last_name'     => "Litani",
		// 	'email'         => "jsafka@gmail.com",
		// 	'phone'         => "dbshgfids",
		// 	'billing_address'  => $billing_address,
		// 	'shipping_address' => $shipping_address
		// );

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'day',
			'duration'  => 1
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		$result = json_decode($this->input->post('result_data'), true);

		if ($result['payment_type'] == "gopay") {
			$data = array(
				'id_preorder' 		=> $result['order_id'],
				'status'			=> $result['status_code'],
				'total_bayar'		=> $result['gross_amount'],
				'metode'			=> $result['payment_type'],
				'waktu'				=> $result['transaction_time']
			);
		} elseif ($result['payment_type'] == "bank_transfer") {
			$data = array(
				'id_preorder' 		=> $result['order_id'],
				'status'			=> $result['status_code'],
				'total_bayar'		=> $result['gross_amount'],
				'metode'			=> $result['payment_type'],
				'waktu'				=> $result['transaction_time'],
				'url'				=> $result['pdf_url']
			);
		}

		$simpan = $this->db->insert('midtrans', $data);

		if ($simpan) {
			$id_preorder = $result['order_id'];
			redirect('checkout/pembayaran/' . $id_preorder);
		}
	}
}
