<?php echo $this->session->flashdata('gajiLunas'); ?>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>
                            Laporan Modal
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group d-flex align-items-center col-9">
                            <label class="mr-3 mb-0">Pilih Bulan :</label>
                            <input id="bulan" type="month" name="search_bulan" class="form-control mr-3" style="width:max-content" oninvalid="this.setCustomValidity('Form input tidak boleh kosong!')" oninput="setCustomValidity('')" required value="<?php echo date('Y-m'); ?>">
                            <button type="button" onclick="ambil_bulan()" class="btn btn-primary"><i class="fas fa-align-center mr-2"></i>Filter</button>
                            <button class="btn btn-warning ml-3" type="button" onclick="window.location.href='<?php echo base_url('admin/cetak_pdf/cetak_gaji_pdf/' . date('Y-m')) ?>'"> <i class="fas fa-file mr-2"></i> Export pdf</button>
                            <button class="btn btn-success ml-3" data-toggle="modal" data-target="#biaya_produksi"><i class="fas fa-plus mr-1"></i> Tambah Data Modal</button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Total Modal</th>
                                        <th>Tanggal</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_modal as $dt_modal) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <?= $dt_modal['totalModal'] ?>
                                            </td>
                                            <td>
                                                <?= $dt_modal['tanggal'] ?>
                                            </td>
                                            <td>
                                                <div class="dropdown" align="center">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Options</a>
                                                    <div class="dropdown-menu">
                                                        <?php
                                                        if ($gaji_karyawan == null) : ?>
                                                            <a href="<?= base_url('admin/laporan/gaji_lunas/' . $dt_modal['idKaryawan']) ?>" class="dropdown-item has-icon"><i class="far fa-edit"></i>Bayar</a>
                                                            <?php else :
                                                            $bln_th = date('Y-m');

                                                            foreach ($gaji_karyawan as $gaji_kr) :
                                                                $gj_kr[] = $gaji_kr['idKaryawan'] . $gaji_kr['bulan'];
                                                            endforeach;

                                                            if (in_array($dt_modal['idKaryawan'] . $bln_th, $gj_kr)) : ?>
                                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-check"></i>Terbayar</a>
                                                            <?php else : ?>
                                                                <a href="<?= base_url('admin/laporan/gaji_lunas/' . $dt_modal['idKaryawan']) ?>" class="dropdown-item has-icon"><i class="far fa-edit"></i>Bayar</a>
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

<!-- modal tambah biaya produksi-->
<div class="modal fade bd-example-modal-xl" id="biaya_produksi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Biaya Produksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row ">
                    <div class="col-3">
                        <div class="form-group my-1">
                            <label>
                                Nama Bahan
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group my-1">
                            <label>
                                Jumlah
                            </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group my-1">
                            <label>
                                Harga Satuan
                            </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group my-1">
                            <label>
                                Total Harga
                            </label>
                        </div>
                    </div>
                    <div class="col-1">

                    </div>
                </div>
                <div class="input_fields_wrap">
                    <div class="row">
                        <div class="col-3">
                            <input class="form-control" type="text" name="namaBahan[0]">
                        </div>
                        <div class="col-2 ">
                            <input class="form-control" type="text" id="jumlah0" onkeyup="jumlah(<?= '0'?>)" name="jumlah[0]" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Rp
                                        </div>
                                    </div>
                                    <input class="form-control" type="text" id="hargaSatuan0" onkeyup="hargaSatuan(<?= '0'?>)" name="hargaSatuan[0]" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Rp
                                        </div>
                                    </div>
                                    <input readonly class="form-control" type="text" id="totalHarga0"  name="totalHarga[0]">
                                </div>
                            </div>
                        </div>
                        <div class="col-1">

                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-info add_field_button" type="button"><i class="fas fa-plus mr-2"></i>Tambah Bahan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var max_fields = 20; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        a = 1; b = 1; c = 1; d = 1; j = 1; f = 1; g = 1; h = 1; i = 1;
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            //max input box allowed
            x++; //text box increment
            $(wrapper).append(''+
                '<div class="row">'+
                    '<div class="col-3">'+
                        '<input class="form-control" type="text" name="namaBahan['+ a++ +']">'+
                    '</div>'+
                    '<div class="col-2 ">'+
                        '<input class="form-control" type="text" id="jumlah'+ g++ +'" onkeyup="jumlah('+ j++ +')" name="jumlah['+ b++ +']">'+
                    '</div>'+
                    '<div class="col-3">'+
                        '<div class="form-group">'+
                            '<div class="input-group">'+
                                '<div class="input-group-prepend">'+
                                    '<div class="input-group-text">Rp</div>'+
                                '</div>'+
                                '<input class="form-control" type="text" id="hargaSatuan'+ h++ +'" onkeyup="hargaSatuan('+ f++ +')" name="hargaSatuan['+ c++ +']">'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-3">'+
                        '<div class="form-group">'+
                            '<div class="input-group">'+
                                '<div class="input-group-prepend">'+
                                    '<div class="input-group-text">Rp</div>'+
                                '</div>'+
                                '<input readonly class="form-control" type="text" id="totalHarga'+ i++ +'" name="totalHarga['+ d++ +']">'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-1">'+
                        '<button href="#" class="btn btn-danger remove_field mt-1"><i class="fas fa-trash fa-1x"></button>'+
                    '</div>'+
                '</div>'
            ); // add input boxes.
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            x--;
        })
    });

    function jumlah($a){
        return hitung($a);
        //alert($a);
    }
    function hargaSatuan($b){
        return hitung($b);
    }
    function hitung($c){
        //alert($c);
        var jumlah      = document.getElementById("jumlah"+$c).value;
        var hargaSatuan = document.getElementById('hargaSatuan'+$c).value;
        total = jumlah * hargaSatuan;
        document.getElementById("totalHarga"+$c).value = total;
    }

    // function ambil_bulan(){
    //     var bulan = document.getElementById('bulan').value;
    //     if (bulan != '') {
    //         window.location="<?php echo base_url('admin/laporan/gaji_filter_bulan/') ?>"+bulan;
    //     }else{
    //         swal('Informasi','Bulan dan tahun tidak ditemukan', 'info');
    //     }
    // }
</script> -->