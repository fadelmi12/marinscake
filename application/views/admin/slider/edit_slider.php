<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Edit Slider
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php echo $this->session->flashdata('slider') ?>
                        <form action="<?= base_url("Admin/slider/update_slider/") . $slide->id_slider; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Gambar Slider</label>
                                <div class="row">
                                    <div class="col-4">
                                        <img src="<?php echo base_url() . '/uploads/slider/' . $slide->gambar; ?>" alt="" style="border-radius:5px; width: 100%; height: auto;" class="img-fluid img-thumbnail" alt="Responsive image">
                                    </div>
                                    <div class="col-8">
                                        <small class="text-danger">*Jika ingin mengubah gambar silahkan mengupload file baru</small>
                                        <input type="file" name="gambar" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Simpan</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Gambar Produk</h4>
                    </div>
                    <div class="card-body">
                        <img id="gambar_slider" src="<?= base_url() . 'uploads/slider/' . $slide->gambar ?>" alt="" style="border-radius:5px;max-height: 200px;" class="img-fluid my-2">
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>