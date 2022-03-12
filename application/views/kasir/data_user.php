<?php echo $this->session->flashdata('akun'); ?>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Profil
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" type="text" name="name" value="<?= $user->nama ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" value="<?= $user->email ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Nomor HP</label>
                            <input class="form-control" type="number" name="no_hp" value="<?= $user->no_hp ?>" disabled>
                        </div>
                        <a href="<?= base_url() ?>kasir/akun/edit_user" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Edit</a>
                        <!-- <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Simpan</button> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Foto Profil</h4>
                    </div>
                    <div class="card-body">
                        <img id="gambar_slider" src="<?= base_url() ?>uploads/user/<?= $user->foto ?>" alt="" style="border-radius:5px;max-height: 200px;" class="img-fluid my-2">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>