<?= $this->session->flashdata('preorder') ?>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>
                            Daftar Transaksi Preorder
                        </h4>
                        <button class="btn btn-success d-flex" type="button" onclick="window.location.href='<?php echo base_url('admin/transaksi/barang_belum_dikirim/') ?>'">
                            Barang belum dikirim
                            <div class="bg-white text-dark ml-2" style="width: 25px; height: auto; border-radius: 100%;">
                                <strong><?= count($barang_belum_dikirim) ?></strong>
                            </div>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="form-group d-flex align-items-center mr-3 mb-0">
                                <h6 class="w-100 mr-3 my-0" style="color:black">Pilih Tanggal : </h6>
                                <div class="input-group">
                                    <input type="month" class="form-control mr-3" value="<?= $tanggal; ?>" id="filter_tanggal">
                                </div>
                                <button class="btn btn-primary d-flex h-100 " type="button" onclick="filter()"><i class="fas fa-filter my-auto mr-2"></i>Filter</button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            ID
                                        </th>
                                        <th>Jumlah Transaksi</th>
                                        <th>Metode</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Tanggal Dikirim</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($riwayat_preorder as $rw_pr) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                Rp <?= number_format($rw_pr['jumlah'], 0, '', '.') ?>
                                            </td>
                                            <td>
                                                <?= $rw_pr['metode'] ?>
                                            </td>
                                            <td>
                                                <?= $rw_pr['tanggal_pesan'] ?>
                                            </td>
                                            <td>
                                                <?= $rw_pr['tanggal_dikirim'] ?>
                                            </td>
                                            <td>
                                                <?= $rw_pr['status'] ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-around">
                                                    <button class="btn btn-info" data-toggle="modal" data-target="#modal_detail_preorder<?= $rw_pr['id_preorder'] ?>">
                                                        <i class="fas fa-search"></i> Detail</button>
                                                    <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modal_edit_preorder<?php echo $rw_pr['id_preorder'] ?>">
                                                        <i class="fas fa-pen"></i> Edit</button>
                                                    <button class="btn btn-danger" onclick="hapus_riwayat_preorder(<?php echo $rw_pr['id_preorder']; ?>)" type="button">
                                                        <i class="fas fa-trash"></i> Hapus</button>
                                                </div>
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


<!-- modal detail Transaksi -->
<?php foreach ($riwayat_preorder as $rw_pr) : ?>
    <div class="modal fade bd-example-modal-lg" id="modal_detail_preorder<?= $rw_pr['id_preorder'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Detail preorder</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label>
                                    No Hp
                                </label>
                                <input type="text" name="metode" class="form-control" readonly value="<?= $rw_pr['no_hp'] ?>">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>
                                    Nama Penerima
                                </label>
                                <input type="text" name="metode" class="form-control" readonly value="<?= $rw_pr['nama'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>
                                    Alamat Pengiriman
                                </label>
                                <input type="text" name="metode" class="form-control" readonly value="<?= $rw_pr['alamat'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="form-group py-0 m-0">
                            <label>Daftar Produk</label>
                        </div>

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga Satuan</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($detail_preorder as $dt_tr) :
                                    if ($rw_pr['id_preorder'] == $dt_tr['id_preorder']) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <?= $dt_tr['nama_produk'] ?>
                                            </td>
                                            <td>
                                                <?= $dt_tr['jumlah'] ?>
                                            </td>
                                            <td>
                                                Rp <?= number_format($dt_tr['harga'], 0, '', '.') ?>
                                            </td>
                                            <td>
                                                Rp <?= number_format($dt_tr['total'], 0, '', '.') ?>
                                            </td>
                                        </tr>
                                <?php endif;
                                endforeach; ?>
                            </tbody>
                            <tfooter>
                                <td class="text-center" colspan="4"><strong>Total Belanja</strong></td>
                                <td><strong>Rp <?= number_format($rw_pr['jumlah'], 0, '', '.') ?></strong></td>
                            </tfooter>
                        </table>
                    </div>
                    <div align="right">
                        <button class="btn btn-info" type="button" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal edit preorder-->
<?php foreach ($riwayat_preorder as $rw_pr) : ?>
    <div class="modal fade" id="modal_edit_preorder<?php echo $rw_pr['id_preorder'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Preorder</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/transaksi/update_preorder/') . $rw_pr['id_preorder']; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>
                                Jumlah Transaksi
                            </label>
                            <input type="date" class="form-control mr-3" value="<?= $tanggal; ?>" name="filter_tanggal" hidden>
                            <input type="text" name="jumlah" class="form-control" oninvalid="this.setCustomValidity('Form input tidak boleh kosong!')" oninput="setCustomValidity('')" disabled value="<?= $rw_pr['jumlah'] ?>">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>
                                        Metode
                                    </label>
                                    <input type="text" name="metode" class="form-control" disabled value="<?= $rw_pr['metode'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>
                                        Pembayaran
                                    </label>
                                    <?php if ($rw_pr['metode'] == 'Online') :
                                        $pembayaran = 'Transfer';
                                    else :
                                        $pembayaran = 'Tunai';
                                    endif;
                                    ?>
                                    <input type="text" name="pembayaran" class="form-control" disabled value="<?= $pembayaran ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>
                                        Status
                                    </label>
                                    <select class="form-control selectric" name="status" oninvalid="this.setCustomValidity('Form input tidak boleh kosong!')" oninput="setCustomValidity('')" required>
                                        <option <?php if ($rw_pr['status'] == 'Selesai') : echo "selected";
                                                endif; ?>>
                                            Selesai
                                        </option>
                                        <option <?php if ($rw_pr['status'] == 'Menunggu Pengiriman') : echo "selected";
                                                endif; ?>>
                                            Menunggu Pengiriman
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>
                                        Tanggal Pengiriman
                                    </label>
                                    <input type="date" min="<?= date('Y-m-d', strtotime($rw_pr['tanggal_pesan'])) ?>" name="tanggalDikirim" class="form-control" oninvalid="this.setCustomValidity('Form input tidak boleh kosong!')" oninput="setCustomValidity('')" required value="<?= $rw_pr['tanggal_dikirim'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <button type="button" class="btn btn-danger mr-3" data-dismiss="modal">
                                <i class="fas fa-check mr-1"></i>
                                Batal
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-1"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Pop up hapus transaksi-->
<script type="text/javascript">
    function hapus_riwayat_preorder($idPreorder) {
        swal({
            title: "Hapus Transaksi Preorder",
            text: "Apakah anda yakin ingin menghapus transaksi preorder ini ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location = "<?php echo base_url('admin/transaksi/hapus_preorder/') ?>" + $idPreorder;
            } else {
                swal("Data preorder batal dihapus");
            }
        });
    }

    function filter() {
        var tanggal = document.getElementById('filter_tanggal').value;
        window.location = "<?php echo base_url('admin/transaksi/preorder/') ?>" + tanggal;
    }
</script>