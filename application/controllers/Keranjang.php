<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{


	public function index()
	{
		$this->load->view('template/header2');
		$this->load->view('keranjang');
		$this->load->view('template/footer');
	}

	function add_to_cart()
	{
		$data = array(
			'id' => $this->input->post('produk_id'),
			'name' => $this->input->post('produk_nama'),
			'price' => $this->input->post('produk_harga'),
			'gambar' => $this->input->post('produk_gambar'),
			'qty' => $this->input->post('quantity'),
		);
		$this->cart->insert($data);
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
}
