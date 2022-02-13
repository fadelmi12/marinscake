<?php echo $this->session->flashdata('filterBulan'); ?>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>
                            Laporan Gaji
                        </h4>
                        <!-- <button class="btn btn-danger btn-sm" type="button" onclick="window.location.href='<?php echo base_url('admin/cetak_pdf/cetak_gaji_pdf/') ?>'"> <i class="fas fa-file mr-2"></i>  Export pdf</button> -->
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
	                        <div class="form-group d-flex align-items-center">
	                            <label class="mr-3 mb-0">Pilih Bulan :</label>
	                                <input id="bulan2" type="month" name="search_bulan" class="form-control mr-3" style="width:max-content" oninvalid="this.setCustomValidity('Form input tidak boleh kosong!')" oninput="setCustomValidity('')" required value="<?php echo $bulan_tahun; ?>">
	                                <button type="button" onclick="ambil_bulan2()" class="btn btn-primary"><i class="fas fa-align-center mr-2"></i>Filter</button>
	                                <button class="btn btn-warning ml-3" type="button" onclick="window.location.href='<?php echo base_url('admin/cetak_pdf/cetak_gaji_pdf/'.$bulan_tahun); ?>'"> <i class="fas fa-file mr-2"></i>  Export pdf</button>
	                        </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Nama Karyawan</th>
                                        <th>Gaji</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($data_karyawan as $data_kr): ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $data_kr['nama'] ?>
                                        </td>
                                        <td>
                                            Rp <?php echo number_format($data_kr['gaji'], 0, '', '.') ?>
                                        </td>
                                        <td>
                                            <?php 
                                                if ($gaji_karyawan == null) {
                                                    echo "Belum terbayar";
                                                }else{
                                                    foreach ($gaji_karyawan as $gaji_kr):
                                                        $gj_kr[] = $gaji_kr['idKaryawan'].$gaji_kr['bulan'];
                                                    endforeach;

                                                    if (in_array($data_kr['idKaryawan'].$bulan_tahun, $gj_kr))
                                                        {echo "Terbayar";}
                                                    else{echo "Belum terbayar";}
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="dropdown" align="center">
                                                <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Options</a>
                                                <div class="dropdown-menu">
                                                    <?php 
                                                        if ($gaji_karyawan == null):?>
                                                            <a href="<?= base_url('admin/laporan/filter_gaji_lunas/'. $data_kr['idKaryawan'].'_'.$bulan_tahun) ?>" class="dropdown-item has-icon"><i class="far fa-edit"></i>Bayar</a>
                                                        <?php else:
                                                            foreach ($gaji_karyawan as $gaji_kr):
                                                                $gj_kr[] = $gaji_kr['idKaryawan'].$gaji_kr['bulan'];
                                                            endforeach;

                                                            if (in_array($data_kr['idKaryawan'].$bulan_tahun, $gj_kr)):?>
                                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-check"></i>Terbayar</a>
                                                            <?php else: ?>
                                                                <a href="<?= base_url('admin/laporan/filter_gaji_lunas/'.$data_kr['idKaryawan'].'_'.$bulan_tahun) ?>" class="dropdown-item has-icon"><i class="far fa-edit"></i>Bayar</a>
                                                            <?php endif;
                                                        endif; ?>
                                                </div>
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

<script type="text/javascript">
    function ambil_bulan2(){
        var bulan2 = document.getElementById('bulan2').value;
        if (bulan2 != '') {
            window.location="<?php echo base_url('admin/laporan/gaji_filter_bulan/')?>"+bulan2;
        }else{
            swal('Informasi','Bulan dan tahun tidak ditemukan', 'info');
        }
    }
</script>