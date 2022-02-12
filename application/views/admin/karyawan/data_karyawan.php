<?php echo $this->session->flashdata('karyawan'); ?>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <h4>
                            Daftar Karyawan
                        </h4>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_tambah_karyawan"><i class="fas fa-plus"></i> Tambah Karyawan</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">NO</th>
                                        <th >Nama</th>
                                        <th >Jenis Kelamin</th>
                                        <th >Posisi</th>
                                        <th >No HP</th>
                                        <th >Mulai Bekerja</th>
                                        <th class="text-center">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no=1;
                                    foreach($data_karyawan as $data_kr): ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $no++; ?>
                                        </td>
                                        <td>
                                            <?php echo $data_kr['nama'] ?>
                                        </td>
                                        <td>
                                            <?php echo $data_kr['jenisKelamin'] ?>
                                        </td>
                                        <td>
                                            <?php echo $data_kr['posisi'] ?>
                                        </td>
                                        <td>
                                            <?php echo $data_kr['noHp'] ?>
                                        </td>
                                        <td>
                                            <?php echo $data_kr['created_at'] ?>
                                        </td>
                                        <td class="bg-light justify-content-between">
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_edit_karyawan<?php echo $data_kr['idKaryawan'] ?>"><i class="fas fa-pen"></i> Edit</button>
                                            <button type="button" class="btn btn-sm btn-danger ml-5" data-toggle="modal" data-target="#modal_hapus_karyawan<?php echo $data_kr['idKaryawan'] ?>"><i class="fas fa-trash"></i> Hapus</button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal tambah Karyawan-->
<div class="modal fade" id="modal_tambah_karyawan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header text-center bg-light">
                <h4 class="modal-title" id="exampleModalLabel"><strong>Tambah Karyawan</strong></h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/karyawan/tambah_karyawan/'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label><h6>Nama</h6></label>
                        <input type="text" name="nama" class="form-control" oninvalid="this.setCustomValidity('Form input tidak boleh kosong!')" oninput="setCustomValidity('')" required>
                    </div>
                    <div class="form-group">
                        <label><h6>Jenis Kelamin</h6></label>
                        <select class="form-control selectric" name="kelamin" oninvalid="this.setCustomValidity('Form input tidak boleh kosong!')" oninput="setCustomValidity('')" required>
                            <option><h6>Laki-Laki</h6></option>
                            <option><h6>Perempuan</h6></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><h6>Posisi</h6></label>
                        <input type="text" name="posisi" class="form-control" oninvalid="this.setCustomValidity('Form input tidak boleh kosong!')" oninput="setCustomValidity('')" required>
                    </div>
                    <div class="form-group">
                        <label><h6>No. HP/WA</h6></label>
                        <input type="number" name="noHp" class="form-control" oninvalid="this.setCustomValidity('Form input tidak boleh kosong!')" oninput="setCustomValidity('')" required>
                    </div>
                    <div class="form-group">
                        <label><h6>Mulai Bekerja</h6></label>
                        <input type="date" name="tanggal" class="form-control datepicker" oninvalid="this.setCustomValidity('Form input tidak boleh kosong!')" oninput="setCustomValidity('')" required>
                    </div>
                    <div class="row justify-content-around">
                        <button type="button" class="btn btn-danger col-2" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary col-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit Karyawan-->
<?php foreach ($data_karyawan as $data_kr): ?>
<div class="modal fade" id="modal_edit_karyawan<?php echo $data_kr['idKaryawan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header text-center bg-light">
                <h4 class="modal-title" id="exampleModalLabel"><strong>Tambah Karyawan</strong></h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/karyawan/update_karyawan/').$data_kr['idKaryawan']; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label><h6>Nama</h6></label>
                        <input type="text" name="nama" class="form-control" oninvalid="this.setCustomValidity('Form input tidak boleh kosong!')" oninput="setCustomValidity('')" required value="<?= $data_kr['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label><h6>Jenis Kelamin</h6></label>
                        <select class="form-control selectric" name="kelamin" oninvalid="this.setCustomValidity('Form input tidak boleh kosong!')" oninput="setCustomValidity('')" required>
                            <option <?php if($data_kr['jenisKelamin'] == 'Laki-Laki'): echo "selected"; endif;?>><h6>Laki-Laki</h6></option>
                            <option <?php if($data_kr['jenisKelamin'] == 'Perempuan'): echo "selected"; endif;?>><h6>Perempuan</h6></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><h6>Posisi</h6></label>
                        <input type="text" name="posisi" class="form-control" oninvalid="this.setCustomValidity('Form input tidak boleh kosong!')" oninput="setCustomValidity('')" required  value="<?= $data_kr['posisi'] ?>">
                    </div>
                    <div class="form-group">
                        <label><h6>No. HP/WA</h6></label>
                        <input type="number" name="noHp" class="form-control" oninvalid="this.setCustomValidity('Form input tidak boleh kosong!')" oninput="setCustomValidity('')" required  value="<?= $data_kr['noHp'] ?>">
                    </div>
                    <div class="form-group">
                        <label><h6>Mulai Bekerja</h6></label>
                        <input type="date" name="tanggal" class="form-control datepicker" oninvalid="this.setCustomValidity('Form input tidak boleh kosong!')" oninput="setCustomValidity('')" required  value="<?= $data_kr['created_at'] ?>">
                    </div>
                    <div class="row justify-content-around">
                        <button type="button" class="btn btn-danger col-2" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary col-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Modal hapus Karyawan-->
<?php foreach ($data_karyawan as $data_kr): ?>
<div class="modal fade" id="modal_hapus_karyawan<?php echo $data_kr['idKaryawan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center bg-light">
                <h4 class="modal-title" id="exampleModalLabel"><strong>Tambah Karyawan</strong></h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/karyawan/hapus_karyawan/').$data_kr['idKaryawan']; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                       <h6>Apakah anda yakin ingin menghapus data karyawan ini ?</h6>
                    </div>
                    <div class="row justify-content-around">
                        <button type="button" class="btn btn-danger col-2" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary col-2">Iya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>