<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Edit Produk
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php echo $this->session->flashdata('gagal_edit_produk'); 
                        foreach($produk as $data_produk):    ?>
                            <form action="<?php echo base_url("Admin/Produk/update_produk/").$data_produk['idProduk']; ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-quote-left"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="nama_produk" value="<?php echo $data_produk['namaProduk']?>">
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
                                                <input type="text" class="form-control" name="harga" value="<?php echo $data_produk['harga']?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control selectric" name="status">
                                                <option <?php if($data_produk['status'] == 'Preorder'): echo "selected"; endif;?> >Preorder</option>
                                                <option <?php if($data_produk['status'] == 'Ready'): echo "selected"; endif;?>> Ready</option>
                                                <option <?php if($data_produk['status'] == 'Kosong'): echo "selected"; endif;?> >Kosong</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control selectric" name="kategori">
                                                <?php foreach($kategori as $ktg):?>
                                                    <option value="<?php echo $ktg['idJenis'] ?>" <?php if($data_produk['idJenis'] == $ktg['idJenis']): echo "selected"; endif;?>>
                                                            <?php echo $ktg['namaJenis'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input type="number" class="form-control" name="stok" value="<?php echo $data_produk['stok']?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Gambar Produk</label>
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="<?php echo base_url().'/uploads/gambar_produk/'.$data_produk["gambar"]; ?>" alt="" style="border-radius:5px; width: 100%; height: auto;" class="img-fluid img-thumbnail" alt="Responsive image">
                                        </div>
                                        <div class="col-8">
                                            <small class="text-danger">*Jika ingin mengubah gambar silahkan mengupload file baru</small>
                                            <input type="file" name="gambar" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Simpan</button>

                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>