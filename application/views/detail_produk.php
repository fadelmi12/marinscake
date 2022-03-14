<div class="ps-hero bg--cover" data-background="<?= base_url() ?>assets/client/images/hero/about.jpg">
    <div class="ps-hero__content ">
        <h1> Detail Produk</h1>
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
                                <?php foreach ($gambar as $gbr) : ?>
                                    <div class="item"><a href="<?= base_url() ?>uploads/gambar_produk/<?= $gbr['gambar'] ?>"><img src="<?= base_url() ?>uploads/gambar_produk/<?= $gbr['gambar'] ?>" alt=""></a></div>
                                <?php endforeach ?>
                            </div>
                            <div class="ps-product__preview">
                                <div class="ps-product__variants">
                                    <?php foreach ($gambar as $gbr) : ?>
                                        <div class="item"><img src="<?= base_url() ?>uploads/gambar_produk/<?= $gbr['gambar'] ?>" alt=""></div>
                                    <?php endforeach ?>
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
                            <div class="ps-product__status">
                                <h5>Min order : <span> <?= $prd['min_order'] ?></span></h5>
                            </div>
                            <div class="ps-product__shopping">
                                <form class="ps-form--shopping" id="cart" action="" method="post">
                                    <div class="form-group--number">
                                        <button class="minus"><span>-</span></button>
                                        <input id="<?= $prd['idProduk'] ?>" class="form-control" type="text" value="<?= $prd['min_order'] ?>">
                                        <button class="plus"><span>+</span></button>
                                    </div>
                                </form>
                            </div>
                            <div class="ps-product__shopping">
                                <?php $i = 0;
                                foreach ($gambar as $gbr) :
                                    if ($i == 0) : ?>
                                        <button class="add_cart ps-btn ps-btn--yellow" data-produkid="<?= $prd['idProduk'] ?>" data-produknama="<?= $prd['namaProduk'] ?>" data-produkharga="<?= $prd['harga'] ?>" data-produkgambar="<?= $gbr['gambar'] ?>" data-produkstok="<?= $prd['stok'] ?>" data-minorder="<?= $prd['min_order'] ?>">Masukkan Keranjang</button>
                                <?php endif;
                                    $i++;
                                endforeach; ?>
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
                            <div class="ps-product__thumbnail">
                                <img src="<?= base_url() ?>uploads/gambar_produk/<?= $rkm['gambar'] ?>" alt="">
                                <a class="ps-product__overlay" href="<?= base_url() ?>produk/detail/<?= $rkm['idProduk'] ?>"></a>
                                <ul class="ps-product__actions">
                                    <li><a href="<?= base_url() ?>produk/detail/<?= $rkm['idProduk'] ?>" data-tooltip="Quick View"><i class="ba-magnifying-glass"></i></a></li>
                                    <!-- <li><a href="#" data-tooltip="Favorite"><i class="ba-heart"></i></a></li> -->
                                    <li>
                                        <a class="tambah_cart" data-tooltip="Add to Cart" data-produkid="<?= $rkm['idProduk'] ?>" data-produknama="<?= $rkm['namaProduk'] ?>" data-produkharga="<?= $rkm['harga'] ?>" data-produkgambar="<?= $rkm['gambar'] ?>" data-produkstok="<?= $rkm['stok'] ?>" data-minorder="<?= $rkm['min_order'] ?>"><i class="ba-shopping"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="ps-product__content"><a class="ps-product__title" href="<?= base_url() ?>produk/detail/<?= $rkm['idProduk'] ?>"><?= $rkm['namaProduk'] ?></a>
                                <p><a href="">Min order : <?= $rkm['min_order'] ?></a></p>
                                <p class="ps-product__price">Rp <?= number_format($rkm['harga'], 0, ',', '.') ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <div id="btn_load" class="ps-section__footer text-center mt-0 pt-0">
                <a class="ps-btn">Load more</a>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type='text/javascript'>
    $(document).ready(function() {
        $('#btn_load').click(function() {
            var id_produk = ['<?= $this->uri->segment("3") ?>'];
            alert(id_produk);
        });
    });

    loadRekom();

    function loadRekom() {
        $.ajax({
            url: '<?= base_url() ?>Produk/load_rekom/',
            type: 'get',
            dataType: 'json',
            success: function(response) {
                $('#pagination').html(response.pagination);
                createTable(response.result, response.row);
            }
        });
    }
</script>