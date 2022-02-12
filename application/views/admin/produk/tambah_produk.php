<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Tambah Produk
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php echo $this->session->flashdata('gagal_insert_produk'); ?>
                        <form action="<?php echo base_url("Admin/Produk/insert_produk") ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-quote-left"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="nama_produk">
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Harga</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="harga">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control selectric" name="status">
                                            <option>Preorder</option>
                                            <option>Ready</option>
                                            <option>Kosong</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control selectric" name="kategori">
                                            <?php foreach($kategori as $ktg):?>
                                                <option value="<?php echo $ktg['idJenis'] ?>"><?php echo $ktg['namaJenis'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="number" class="form-control" name="stok">
                                    </div>



                                </div>



                            </div>
                            <div class="form-group">
                                <label>Gambar Produk</label>
                                <!-- <button class="btn btn-info d-flex align-items-center">
                                    <i class="fas fa-plus mr-2"></i>
                                    Upload Gambar
                                </button> -->
                                <input type="file" name="gambar" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Simpan</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>