<div class="ps-hero bg--cover" data-background="<?= base_url() ?>assets/client/images/hero/about.jpg">
    <div class="ps-hero__content ">
        <h1> Produk Preorder</h1>
        <div class="text-center">
            Home > Detail Produk
        </div>
    </div>
</div>
<main class="ps-main">
    <div class="container">
        <div class="ps-product--detail py-0 my-0">
            <div class="row">
                <?php foreach ($produk as $prd) : ?>
                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 ">
                        <div class="ps-product__thumbnail">
                            <!-- <span class="ps-badge"><img src="<?= base_url() ?>assets/client/images/icons/badge-red.png" alt=""><i>New</i></span><span class="ps-badge ps-badge--sale"><img src="<?= base_url() ?>assets/client/images/icons/badge-brown.png" alt=""><i>50%</i></span> -->
                            <div class="ps-product__image">
                                <div class="item"><a href="<?= base_url() ?>uploads/gambar_produk/<?= $prd['gambar'] ?>"><img src="<?= base_url() ?>uploads/gambar_produk/<?= $prd['gambar'] ?>" alt=""></a></div>
                                <?php if ($prd['gambar2'] != null) : ?>
                                    <div class="item"><a href="<?= base_url() ?>uploads/gambar_produk/<?= $prd['gambar2'] ?>"><img src="<?= base_url() ?>uploads/gambar_produk/<?= $prd['gambar2'] ?>" alt=""></a></div>
                                <?php elseif ($prd['gambar3'] != null) : ?>
                                    <div class="item"><a href="<?= base_url() ?>uploads/gambar_produk/<?= $prd['gambar3'] ?>"><img src="<?= base_url() ?>uploads/gambar_produk/<?= $prd['gambar3'] ?>" alt=""></a></div>
                                <?php elseif ($prd['gambar4'] != null) : ?>
                                    <div class="item"><a href="<?= base_url() ?>uploads/gambar_produk/<?= $prd['gambar4'] ?>"><img src="<?= base_url() ?>uploads/gambar_produk/<?= $prd['gambar4'] ?>" alt=""></a></div>
                                <?php endif ?>
                            </div>
                            <div class="ps-product__preview">
                                <div class="ps-product__variants">
                                    <div class="item"><img src="<?= base_url() ?>uploads/gambar_produk/<?= $prd['gambar'] ?>" alt=""></div>
                                    <?php if ($prd['gambar2'] != null) : ?>
                                        <div class="item"><img src="<?= base_url() ?>uploads/gambar_produk/<?= $prd['gambar2'] ?>" alt=""></div>
                                    <?php elseif ($prd['gambar3'] != null) : ?>
                                        <div class="item"><img src="<?= base_url() ?>uploads/gambar_produk/<?= $prd['gambar3'] ?>" alt=""></div>
                                    <?php elseif ($prd['gambar4'] != null) : ?>
                                        <div class="item"><img src="<?= base_url() ?>uploads/gambar_produk/<?= $prd['gambar4'] ?>" alt=""></div>
                                    <?php endif ?>
                                    <!-- <div class="item">
                                        <div class="ps-video"><a class="popup-youtube ps-product__video" href="https://www.youtube.com/watch?v=kJQP7kiw5Fk"><img src="<?= base_url() ?>assets/client/images/products/detail/variant-4.png" alt=""><i class="fa fa-play"></i></a></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 ">
                        <div class="ps-product__info">
                            <h1 class="text-uppercase"><?= $prd['namaProduk'] ?></h1>
                            <div class="ps-product__rating">
                            </div>
                            <h3 class="ps-product__price"><span>Rp <?= number_format($prd['harga'], '0', ',', '.') ?></span></h3>
                            <div class="ps-product__desc">
                                <h5>DESKRIPSI</h5>
                                <p><?= $prd['deskripsi'] ?></p>
                            </div>
                            <!-- <div class="ps-product__status">
                                <h5>Stok : <span> <?= $prd['stok'] ?></span></h5>
                            </div> -->
                            <div class="ps-product__shopping">
                                <form class="ps-form--shopping" id="cart" action="" method="post">
                                    <div class="form-group--number">
                                        <button class="minus"><span>-</span></button>
                                        <input id="<?= $prd['idProduk'] ?>" class="form-control" type="text" value="1">
                                        <button class="plus"><span>+</span></button>
                                    </div>
                                </form>
                            </div>
                            <div class="ps-product__shopping">
                                <?php if ($prd['stok'] > 0) : ?>
                                    <button class="add_cart ps-btn ps-btn--yellow" data-produkid="<?= $prd['idProduk'] ?>" data-produknama="<?= $prd['namaProduk'] ?>" data-produkharga="<?= $prd['harga'] ?>" data-produkgambar="<?= $prd['gambar'] ?>" data-produkstok="<?= $prd['stok'] ?>">Masukkan Keranjang</button>
                                <?php else : ?>
                                    <button class="ps-btn ps-btn--yellow">Stok Kosong</button>
                                <?php endif; ?>
                            </div>
                            <div class="ps-product__sharing">
                                <!-- <a class="ps-btn ps-btn--yellow" href="onclick=" document.getElementById('cart').submit();"">Order Now</a> -->
                                <p class="text-right">Bagikan<a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </div>
    </div>
</main>
<!-- Relate product-->
<div class="ps-related-product ">
    <div class="container">
        <div class="ps-section__header text-center">
            <h3 class="ps-section__title">Related Products</h3>
            <p>Maybe you like</p><span><img src="<?= base_url() ?>assets/client/images/icons/floral.png" alt=""></span>
        </div>
        <div class="ps-section__content">
            <div class="row">
                <?php foreach ($rekom as $rkm) : ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><img src="<?= base_url() ?>uploads/gambar_produk/<?= $rkm['gambar'] ?>" alt=""><a class="ps-product__overlay" href="<?= base_url() ?>produk/detail/<?= $rkm['idProduk'] ?>"></a>
                                <ul class="ps-product__actions">
                                    <li><a href="<?= base_url() ?>produk/detail/<?= $rkm['idProduk'] ?>" data-tooltip="Quick View"><i class="ba-magnifying-glass"></i></a></li>
                                    <!-- <li><a href="#" data-tooltip="Favorite"><i class="ba-heart"></i></a></li> -->
                                    <li><a class="tambah_cart" data-tooltip="Add to Cart" data-produkid="<?= $rkm['idProduk'] ?>" data-produknama="<?= $rkm['namaProduk'] ?>" data-produkharga="<?= $rkm['harga'] ?>" data-produkgambar="<?= $rkm['gambar'] ?>" data-produkstok="<?= $rkm['stok'] ?>"><i class="ba-shopping"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__content"><a class="ps-product__title" href="<?= base_url() ?>produk/detail/<?= $rkm['idProduk'] ?>"><?= $rkm['namaProduk'] ?></a>
                                <!-- <p><a href="">Stok Produk : <?= $rkm['stok'] ?></a></p> -->
                                <p class="ps-product__price">Rp <?= number_format($rkm['harga'], 0, ',', '.') ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <!-- <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="ps-product">
                        <div class="ps-product__thumbnail"><span class="ps-badge"><img src="<?= base_url() ?>assets/client/images/icons/badge-red.png" alt=""><i>New</i></span><img src="<?= base_url() ?>assets/client/images/products/2.png" alt=""><a class="ps-product__overlay" href="product-detail.html"></a>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-tooltip="Quick View"><i class="ba-magnifying-glass"></i></a></li>
                                <li><a href="#" data-tooltip="Favorite"><i class="ba-heart"></i></a></li>
                                <li><a href="#" data-tooltip="Add to Cart"><i class="ba-shopping"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__content"><a class="ps-product__title" href="product-detail.html">Red sugar flower</a>
                            <p><a href="product-list.html">Bakery</a> - <a href="product-list.html">Sweet</a> - <a href="product-list.html">Bio</a></p>
                            <p class="ps-product__price">£5.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="ps-product">
                        <div class="ps-product__thumbnail"><span class="ps-badge"><img src="<?= base_url() ?>assets/client/images/icons/badge-red.png" alt=""><i>New</i></span><img src="<?= base_url() ?>assets/client/images/products/3.png" alt=""><a class="ps-product__overlay" href="product-detail.html"></a>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-tooltip="Quick View"><i class="ba-magnifying-glass"></i></a></li>
                                <li><a href="#" data-tooltip="Favorite"><i class="ba-heart"></i></a></li>
                                <li><a href="#" data-tooltip="Add to Cart"><i class="ba-shopping"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__content"><a class="ps-product__title" href="product-detail.html">Red sugar flower</a>
                            <p><a href="product-list.html">Bakery</a> - <a href="product-list.html">Sweet</a> - <a href="product-list.html">Bio</a></p>
                            <p class="ps-product__price">£5.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="ps-product">
                        <div class="ps-product__thumbnail"><span class="ps-badge ps-badge--sale"><img src="<?= base_url() ?>assets/client/images/icons/badge-brown.png" alt=""><i>50%</i></span><img src="<?= base_url() ?>assets/client/images/products/4.png" alt=""><a class="ps-product__overlay" href="product-detail.html"></a>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-tooltip="Quick View"><i class="ba-magnifying-glass"></i></a></li>
                                <li><a href="#" data-tooltip="Favorite"><i class="ba-heart"></i></a></li>
                                <li><a href="#" data-tooltip="Add to Cart"><i class="ba-shopping"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__content"><a class="ps-product__title" href="product-detail.html">Red sugar flower</a>
                            <p><a href="product-list.html">Bakery</a> - <a href="product-list.html">Sweet</a> - <a href="product-list.html">Bio</a></p>
                            <p class="ps-product__price"><del>£8.50</del> £5.00</p>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="ps-section__footer text-center mt-0 pt-0"><a class="ps-btn" href="#">Load more</a></div>
        </div>
    </div>
</div>