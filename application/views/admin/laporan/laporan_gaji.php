<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Daftar Produk
                        </h4>
                        <button class="btn btn-danger btn-sm" type="button" onclick="window.location.href='<?php echo base_url('admin/cetak_pdf/cetak_gaji_pdf/') ?>'">Export pdf</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Nama Karyawan</th>
                                        <th>Posisi</th>
                                        <th>Bulan</th>
                                        <th>Gaji</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($gaji_karyawan as $gaji): ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $gaji['nama'] ?>
                                        </td>
                                        <td>
                                            <?= $gaji['posisi'] ?>
                                        </td>
                                        <td>
                                            <?= $gaji['bulan'] ?>
                                        </td>
                                        <td>
                                            <?= $gaji['gaji'] ?>
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