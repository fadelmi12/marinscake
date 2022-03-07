<div class="ps-hero bg--cover" data-background="<?= base_url() ?>assets/client/images/hero/product.jpg">
    <div class="ps-hero__content ">
        <h1> Daftar Produk</h1>
        <div class="text-center">
            Home > Shop Page
        </div>
    </div>
</div>
<main class="ps-shop">

    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-last">

                <!-- <div class="ps-shop__sort">
                    <select class="ps-select" title="Default Sorting">
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div> -->
                <div class="row">
                    <?php foreach ($produk as $prd) : ?>
                        <div class="col-lg-4">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <?php foreach ($gambar as $gbr) :
                                        if ($gbr['id_produk'] == $prd['idProduk']) : ?>
                                            <img src="<?= base_url() ?>uploads/gambar_produk/<?= $gbr['gambar'] ?>" alt="">
                                    <?php endif;
                                    endforeach ?>
                                    <a class="ps-product__overlay" href="<?= base_url() ?>produk/detail/<?= $prd['idProduk'] ?>"></a>
                                    <ul class="ps-product__actions">
                                        <li><a href="<?= base_url() ?>produk/detail/<?= $prd['idProduk'] ?>" data-tooltip="Quick View"><i class="ba-magnifying-glass"></i></a></li>
                                        <li>
                                            <?php foreach ($gambar_rekom as $gbr2) :
                                                if ($gbr2['id_produk'] == $prd['idProduk']) : ?>
                                                    <a class="tambah_cart" data-tooltip="Add to Cart" data-produkid="<?= $prd['idProduk'] ?>" data-produknama="<?= $prd['namaProduk'] ?>" data-produkharga="<?= $prd['harga'] ?>" data-produkgambar="<?= $gbr2['gambar'] ?>" data-produkstok="<?= $prd['stok'] ?>" data-minorder="<?= $prd['min_order'] ?>"><i class="ba-shopping"></i></a>
                                            <?php endif;
                                            endforeach ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ps-product__content"><a class="ps-product__title" href="<?= base_url() ?>produk/detail/<?= $prd['idProduk'] ?>"><?= $prd['namaProduk'] ?></a>
                                    <p>Min Order : <?= $prd['min_order'] ?> pcs</p>
                                    <p class="ps-product__price">Rp <?= number_format($prd['harga'], 0, ',', '.') ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    <div class="col-lg-12 mb-lg-5">
                        <div class="ps-pagination mb-lg-5 ">
                            <ul class="pagination">
                                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 order-lg-first mt-5 mt-lg-0">
                <div class="ps-sidebar">
                    <div class="widget widget_sidebar widget_category">
                        <h3 class="widget-title">Kategori</h3>
                        <ul class="ps-list--checked">
                            <?php foreach ($kategori as $ktg) : ?>
                                <li><a href=""><?= $ktg['namaJenis'] ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="widget widget_filter widget_sidebar">
                        <h3 class="widget-title">Filter Price</h3>
                        <div class="ps-slider" data-default-min="0" data-default-max="500" data-max="1000" data-step="100" data-unit="$"></div>
                        <p class="ps-slider__meta">Price:<span class="ps-slider__value ps-slider__min"></span>-<span class="ps-slider__value ps-slider__max"></span></p><a class="ac-slider__filter ps-btn ps-btn--sm" href="#">Filter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>