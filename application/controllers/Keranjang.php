<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{


	public function index()
	{
		$cart = $this->cart->contents();
		foreach ($cart as $key) {
			echo json_encode($key['id']);
		}
		// echo json_encode($cart);
		exit;
		$this->load->view('template/header2');
		$this->load->view('keranjang');
		$this->load->view('template/footer');
	}

	function add_to_cart()
	{
		$id		= $this->input->post('produk_id');
		$name 	= $this->input->post('produk_nama');
		$price 	= $this->input->post('produk_harga');
		$gambar	= $this->input->post('produk_gambar');
		$stok	= $this->input->post('produk_stok');
		$qty 	= $this->input->post('quantity');

		// $ada = false;
		// foreach ($this->cart->contents() as $items) {
		// 	if ($items['id'] == $id) {
		// 		$ada = true;
		// 	}
		// }
		// if ($ada == true) {
		// 	$qty_new = $items['qty'] + $qty;
		// 	if ($qty_new <= $stok) {
		// 		$data = array(
		// 			'id' => $id,
		// 			'name' => $name,
		// 			'price' => $price,
		// 			'gambar' => $gambar,
		// 			'qty' => $qty
		// 		);
		// 		$this->cart->insert($data);
		// 		$proses = true;
		// 		$this->session->set_flashdata(
		// 			'keranjang',
		// 			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
		//                     <script type ="text/JavaScript">  
		//                     swal("Sukses","Produk ditambahkan ke keranjang","success"); 
		//                     </script>'
		// 		);
		// 	} else {
		// 		$proses = false;
		// 		$this->session->set_flashdata(
		// 			'keranjang',
		// 			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
		//                     <script type ="text/JavaScript">  
		//                     swal("Gagal","Stok produk tidak cukup","warning"); 
		//                     </script>'
		// 		);
		// 	}
		// } else {
		$data = array(
			'id'		=> $id,
			'name' 		=> $name,
			'price' 	=> $price,
			'gambar'	=> $gambar,
			'qty' 		=> $qty
		);
		$this->cart->insert($data);
		// $this->session->set_flashdata(
		// 	'keranjang',
		// 	'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
		//                     <script type ="text/JavaScript">  
		//                     swal("Sukses","Produk ditambahkan ke keranjang","success"); 
		//                     </script>'
		// );
		// }
		echo $this->show_cart(); //tampilkan cart setelah added
	}

	function show_cart()
	{ //Fungsi untuk menampilkan Cart
		$output = '';
		$no = 0;
		$total_item = 0;
		foreach ($this->cart->contents() as $items) {
			$no++;
			$total_item += $items['qty'];
			$output .= '
				<div class="ps-cart__content">
					<div class="ps-cart-item">
						<button type="button" id="' . $items['rowid'] . '" class="hapus_cart ps-cart-item__close" ></button>
						<div class="ps-cart-item__thumbnail"><a href="' . base_url() . 'produk/detail/' . $items['id'] . '"></a><img src="' . base_url() . 'uploads/gambar_produk/' . $items['gambar'] . '" alt="">
						</div>
						<div class="ps-cart-item__content"><a class="ps-cart-item__title" href="' . base_url() . 'produk/detail/' . $items['id'] . '">' . $items['name'] . '</a>
							<p><span>Quantity:<i>' . $items['qty'] . '</i></span><br><span>Harga:<i>Rp ' . number_format($items['price'], '0', ',', '.') . '</i></span><br><span>Subtotal:<i>Rp ' . number_format($items['subtotal'], '0', ',', '.') . '</i></span></p>
						</div>
					</div>
				</div>
			';
		}
		if ($total_item > 0) {
			$output .= '
				<div class="ps-cart__total">
					<p>Number of items:<span>' . $total_item . '</span></p>
					<p>Item Total:<span>Rp ' . number_format($this->cart->total(), '0', ',', '.') . '</span></p>
				</div>
				<div class="ps-cart__footer"><a href="' . base_url() . 'checkout">Check out</a></div>
			';
		} else {
			$output .= '
				<div class="ps-cart__footer"><a href="#">Keranjang Kosong</a></div>
			';
		}


		return $output;
		// return $proses;
	}

	function load_cart()
	{ //load data cart
		echo $this->show_cart();
	}

	function hapus_cart()
	{ //fungsi untuk menghapus item cart
		$data = array(
			'rowid' => $this->input->post('row_id'),
			'qty' => 0,
		);
		$this->cart->update($data);
		echo $this->show_cart();
	}

	function get_cart()
	{
		$id_produk = $this->input->post('produk_id');
		$cart = $this->cart->contents();
		$nilai = 0;
		foreach ($cart as $key) {
			if ($id_produk == $key['id']) {
				$nilai = 1;
			}
		}

		echo $nilai;
	}
}
