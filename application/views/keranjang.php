<div class="ps-hero bg--cover" data-background="<?= base_url() ?>assets/client/images/hero/product.jpg">
    <div class="ps-hero__content ">
        <h1> Keranjang</h1>
        <div class="text-center">
            Home > Keranjang
        </div>
    </div>
</div>
<main class="ps-main">
    <div class="container">
        <div class="ps-cart-listing">
            <div id="detail_keranjang"></div>
            <!-- <div class="table-responsive">
                <table class="table ps-table ps-table--listing">
                    <thead>
                        <tr class="text-center">
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0;
                        foreach ($cart as $ca) : ?>
                            <tr class="text-center">
                                <td class="text-left">
                                    <a class="ps-product--table" href="<?= base_url('produk/detail/') . $ca['id'] ?>">
                                        <img class="mr-15" src="<?= base_url() ?>uploads/gambar_produk/<?= $ca['gambar'] ?>" alt="">
                                        <?= $ca['name'] ?>
                                    </a>
                                </td>
                                <td>
                                    Rp <?= number_format($ca['price'], '0', ',', '.') ?>
                                </td>
                                <td>
                                    <div class="form-group--number">
                                        <button class="minus"><span>-</span></button>
                                        <input class="form-control" type="text" min="5" value="<?= $ca['qty'] ?>">
                                        <button class="plus"><span>+</span></button>
                                    </div>
                                </td>
                                <td>
                                    <strong>Rp <?= number_format($ca['price'] * $ca['qty'], '0', ',', '.') ?>
                                    </strong>
                                </td>
                                <td>
                                    <a href="">
                                        <div class="ps-remove">
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        <?php $total += number_format($ca['price'] * $ca['qty'], '0', ',', '.');
                        endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="ps-cart__actions pt-2">
                <div class="ps-cart__promotion">
                </div>
                <div class="ps-cart__total">
                    <h3>
                        Total Price: <span>
                            Rp <?= number_format($this->cart->total(), '0', ',', '.') ?>
                        </span>
                    </h3>
                    <a class="ps-btn" href="<?= base_url('checkout') ?>">Process to checkout</a>
                </div>
            </div> -->
        </div>
    </div>
</main>
<div class="ps-site-features">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
                <div class="ps-block--iconbox"><i class="ba-delivery-truck-2"></i>
                    <h4>Free Shipping <span> On Order Over$199</h4>
                    <p>Want to track a package? Find tracking information and order details from Your Orders.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
                <div class="ps-block--iconbox"><i class="ba-biscuit-1"></i>
                    <h4>Master Chef<span> WITH PASSION</h4>
                    <p>Shop zillions of finds, with new arrivals added daily.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
                <div class="ps-block--iconbox"><i class="ba-flour"></i>
                    <h4>Natural Materials<span> protect your family</h4>
                    <p>We always ensure the safety of all products of store</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
                <div class="ps-block--iconbox"><i class="ba-cake-3"></i>
                    <h4>Attractive Flavor <span>ALWAYS LISTEN</span></h4>
                    <p>We offer a 24/7 customer hotline so you’re never alone if you have a question.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.add_cart2').click(function() {
            var produk_id = $(this).data("produkid");
            var produk_nama = $(this).data("produknama");
            var produk_harga = $(this).data("produkharga");
            var produk_gambar = $(this).data("produkgambar");
            var min_order = $(this).data("minorder");
            var quantity = $('#' + produk_id).val();

            $.ajax({
                url: "<?php echo base_url(); ?>keranjang/get_cart",
                method: "POST",
                data: {
                    produk_id: produk_id
                },
                success: function(data) {
                    if (data == 0) {
                        if (quantity < min_order) {
                            swal('Gagal', 'Jumlah produk kurang dari minimal order', 'error');
                        } else {
                            $.ajax({
                                url: "<?php echo base_url(); ?>keranjang/add_to_cart",
                                method: "POST",
                                data: {
                                    produk_id: produk_id,
                                    produk_nama: produk_nama,
                                    produk_harga: produk_harga,
                                    produk_gambar: produk_gambar,
                                    min_order: min_order,
                                    quantity: quantity
                                },
                                dataType: 'json',
                                success: function(response) {
                                    $('#detail_cart').html(response.cart);
                                    $('#detail_cart2').html(response.cart);
                                    var a1 = ' ditambahkan ke keranjang ';
                                    var a2 = ' pcs';
                                    var text = produk_nama + a1 + quantity + a2;
                                    swal('Sukses', text, 'success');
                                }
                            });
                        }
                    } else {
                        $.ajax({
                            url: "<?php echo base_url(); ?>keranjang/add_to_cart",
                            method: "POST",
                            data: {
                                produk_id: produk_id,
                                produk_nama: produk_nama,
                                produk_harga: produk_harga,
                                produk_gambar: produk_gambar,
                                min_order: min_order,
                                quantity: quantity
                            },
                            dataType: 'json',
                            success: function(response) {
                                $('#detail_cart').html(response.cart);
                                $('#detail_cart2').html(response.cart);
                                var a1 = ' ditambahkan ke keranjang ';
                                var a2 = ' pcs';
                                var text = produk_nama + a1 + quantity + a2;
                                swal('Sukses', text, 'success');
                            }
                        });
                    }
                }
            });
        });

        $(document).on('click', '.tambah_cart2', function() {
            var produk_id = $(this).data("produkid");
            var produk_nama = $(this).data("produknama");
            var produk_harga = $(this).data("produkharga");
            var produk_gambar = $(this).data("produkgambar");
            var min_order = $(this).data("minorder");

            $.ajax({
                url: "<?php echo base_url(); ?>keranjang/get_cart",
                method: "POST",
                data: {
                    produk_id: produk_id
                },
                success: function(data) {
                    if (data == 0) {
                        quantity = min_order;
                    } else {
                        quantity = 1;
                    }
                    $.ajax({
                        url: "<?php echo base_url(); ?>keranjang/add_to_cart",
                        method: "POST",
                        data: {
                            produk_id: produk_id,
                            produk_nama: produk_nama,
                            produk_harga: produk_harga,
                            produk_gambar: produk_gambar,
                            min_order: min_order,
                            quantity: quantity
                        },
                        dataType: 'json',
                        success: function(response) {
                            $('#detail_cart').html(response.cart);
                            $('#detail_cart2').html(response.cart);
                            $('#detail_keranjang').html(response.cart2);
                        }
                    });
                }
            });

        });
        $(document).on('change', '.edit_qty', function() {
            var row_id = $(this).data("id");
            var produk_id = $(this).data("produkid");
            var produk_nama = $(this).data("produknama");
            var min_order = $(this).data("minorder");
            var qty = document.getElementById('qty' + produk_id).value;

            if (qty < min_order) {
                swal('Gagal', 'Minimal order ' + produk_nama + ' adalah ' + min_order + ' pcs', 'error');
            } else {
                $.ajax({
                    url: "<?php echo base_url(); ?>keranjang/update_cart",
                    method: "POST",
                    data: {
                        row_id: row_id,
                        quantity: qty
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#detail_cart').html(response.cart);
                        $('#detail_cart2').html(response.cart);
                        $('#detail_keranjang').html(response.cart2);
                    }
                })
            }
        });

        $(document).on('click', '.min_cart', function() {
            var row_id = $(this).data("id");
            var produk_id = $(this).data("produkid");
            var produk_nama = $(this).data("produknama");
            var min_order = $(this).data("minorder");
            var qty = document.getElementById('qty' + produk_id).value;

            if (qty <= min_order) {
                swal('Gagal', 'Minimal order ' + produk_nama + ' adalah ' + min_order + ' pcs', 'error');
            } else {
                qty--;
                $.ajax({
                    url: "<?php echo base_url(); ?>keranjang/update_cart",
                    method: "POST",
                    data: {
                        row_id: row_id,
                        quantity: qty
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#detail_cart').html(response.cart);
                        $('#detail_cart2').html(response.cart);
                        $('#detail_keranjang').html(response.cart2);
                    }
                });
            }
        });

        // Load shopping cart
        $('#detail_keranjang').load("<?php echo base_url(); ?>keranjang/load_cart2");

        //Hapus Item Cart
        $(document).on('click', '.hapus_cart2', function() {
            var row_id = $(this).attr("id"); //mengambil row_id dari artibut id
            var nama = $(this).attr("nama"); //mengambil row_id dari artibut id
            $.ajax({
                url: "<?php echo base_url(); ?>keranjang/hapus_cart",
                method: "POST",
                data: {
                    row_id: row_id
                },
                dataType: 'json',
                success: function(response) {
                    $('#detail_cart').html(response.cart);
                    $('#detail_cart2').html(response.cart);
                    $('#detail_keranjang').html(response.cart2);
                    swal('Hapus', nama + ' dikeluarkan dari keranjang', 'success');
                }
            });
        });
    });
</script>