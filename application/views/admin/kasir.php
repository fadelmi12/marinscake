<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-7">
                <div class="card" style="overflow: hidden;">
                    <div class="card-header">
                        <h4>
                            Daftar Produk
                        </h4>
                    </div>
                    <?php foreach($jenis_produk as $js_produk): ?>
                        <div class="card-body " style="max-height: 82vh; overflow-y:scroll">
                            <form action="" method="post">
                                <h6 class="text-dark"><?= $js_produk['namaJenis'] ?></h6>
                                <div class="row">
                                    <!-- <div class="col-lg-3">
                                        <div class="form-group text-center">
                                            <a href="#" data-name="<?php echo str_replace(' ', '', 'Kue Pisang'); ?>" data-price="10000" class="add-to-cart"><img src="https://www.harapanrakyat.com/wp-content/uploads/2019/12/Suka-Donat-Topping-Meses.jpg" alt="" style="border-radius:5px;" class="img-fluid"></a>
                                            <h6 class="font-weight-normal mt-2 mb-0 font-14 text-dark">Kue Pisang</h6>
                                            <h6 class="text-dark font-15">Rp 2.500</h6>
                                        </div>
                                    </div> -->
                                    <?php foreach($daftar_produk as $dt_produk): ?>
                                        <?php if ($dt_produk['idJenis'] == $js_produk['idJenis']): ?>
                                            <div class="col-lg-3">
                                                <div class="form-group text-center">
                                                    <a href="#" data-name="<?php echo str_replace(" ", "", $dt_produk['namaProduk']); ?>" data-price="<?= $dt_produk['harga'] ?>" class="add-to-cart"><img src="<?php echo base_url().'/uploads/gambar_produk/'.$dt_produk["gambar"]; ?>" alt="" style="border-radius:5px;" class="img-fluid"></a>
                                                    <h6 class="font-weight-normal mt-2 mb-0 font-14 text-dark"><?= $dt_produk['namaProduk'] ?></h6>
                                                    <h6 class="text-dark font-15">Rp. <?= number_format($dt_produk['harga'], 0, '', '.') ?></h6>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    <?php endforeach;?>
                                </div>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card h-100" style="overflow: hidden;">
                            <div class="card-header">
                                <h4>
                                    Transaksi
                                </h4>

                            </div>
                            <div class="card-body" style="height: 25vh;overflow-y:scroll">
                                <div class="container">
                                    <div class="row py-1 border-bottom border-top text-dark font-weight-bold">
                                        <div class="col-4 my-auto  font-16">
                                            Nama
                                        </div>
                                        <div class="col-3 my-auto  font-16 text-center">
                                            Jumlah
                                        </div>
                                        <div class="col-3 my-auto  font-16">
                                            Total
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="show-cart table">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="card h-100">
                            <div class="card-header">
                                <h4>
                                    Pembayaran
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-2">
                                    <label for="">Total Belanja</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input type="text" class="form-control " id="total-cart" name="nama" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Uang</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="nama">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="btn btn-danger mr-3">
                                        Batal
                                    </div>
                                    <div class="btn btn-info mr-3">
                                        Preorder
                                    </div>
                                    <div class="btn btn-primary">
                                        Lanjut ke Pembayaran
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/cart.js"></script>
</div>