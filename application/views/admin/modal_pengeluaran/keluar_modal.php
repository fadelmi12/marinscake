<?php echo $this->session->flashdata('berhasil_tambah_modal'); ?>
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
                            <input id="tanggal_filter" type="month" name="tanggal" class="form-control mr-3" style="width:max-content" oninvalid="this.setCustomValidity('Form input tidak boleh kosong!')" oninput="setCustomValidity('')" required value="<?= $tanggal ?>">
                            <button type="button" onclick="filter()" class="btn btn-primary"><i class="fas fa-align-center mr-2"></i>Filter</button>
                            <!-- ekspor pdf -->
                            <a href="<?php echo base_url('admin/cetak_pdf/cetak_modal_pdf/'.$tanggal) ?>" target="_blank" class="btn btn-warning ml-3"><i class="fas fa-file mr-2"></i>Export pdf</a>
                            <!-- tambah data -->
                            <button class="btn btn-success ml-3" data-toggle="modal" data-target="#biaya_produksi"><i class="fas fa-plus mr-1"></i> Tambah Data Modal</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Tanggal</th>
                                        <th>Pengeluaran Modal</th>
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
                                                <?= $dt_modal['tanggal'] ?>
                                            </td>
                                            <td>
                                                Rp. <?php echo number_format($dt_modal['totalModal'], 0, '', '.') ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-around">
                                                    <button class="btn btn-info" data-toggle="modal" data-target="#detail_modal<?= $dt_modal['idModal'] ?>">
                                                        <i class="fas fa-search"></i> Detail</button>
                                                    <button class="btn btn-warning" type="button" onclick="window.location.href='<?php echo base_url('admin/modal/edit_modal/'.$dt_modal['idModal']) ?>'">
                                                        <i class="fas fa-pen"></i> Edit</button>
                                                    <button class="btn btn-danger" onclick="hapus_modal(<?= $dt_modal['idModal'];?>)" type="button">
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

<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>

<!-- modal tambah biaya produksi-->
<div class="modal fade bd-example-modal-xl" id="biaya_produksi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header ml-3">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Biaya Produksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ml-3">
                <form action="<?php echo base_url('admin/modal/tambah_data_modal') ?>" method="post" enctype="multipart/form-data">
                    <div class="row ">
                        <div class="col-3 text-center">
                            <div class="form-group my-1">
                                <label>
                                    Nama Bahan
                                </label>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <div class="form-group my-1">
                                <label>
                                    Jumlah
                                </label>
                            </div>
                        </div>
                        <div class="col-3 text-center">
                            <div class="form-group my-1">
                                <label>
                                    Harga Satuan
                                </label>
                            </div>
                        </div>
                        <div class="col-3 text-center">
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
                                <input required class="form-control" type="text" name="namaBahan[0]">
                            </div>
                            <div class="col-2 ">
                                <input required class="form-control" type="number" id="jumlah0" onkeyup="jumlah(<?= '0'?>)" name="jumlah[0]">
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input required class="form-control" type="number" id="hargaSatuan0" onkeyup="hargaSatuan(<?= '0'?>)" name="hargaSatuan[0]">
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
                    <div class="d-flex justify-content-around mt-3">
                        <button type="button" class="btn btn-danger col-2" data-dismiss="modal">
                            <i class="fas fa-times mr-1"></i>
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary col-2">
                            <i class="fas fa-save mr-1"></i>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal detail biaya produksi-->
<?php foreach ($data_modal as $dt_modal) : ?>
    <div class="modal fade bd-example-modal-lg" id="detail_modal<?= $dt_modal['idModal'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Detail Pengeluaran Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>Nama Bahan</th>
                                    <th>Jumlah</th>
                                    <th>Harga Satuan</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach($detail_modal as $dtl_modal): 
                                if ($dt_modal['idModal'] == $dtl_modal['idModal']):?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $no++?>
                                        </td>
                                        <td>
                                            <?= $dtl_modal['namaBahan'] ?>
                                        </td>
                                        <td>
                                            <?= $dtl_modal['jumlah'] ?>
                                        </td>
                                        <td>
                                            Rp <?= number_format($dtl_modal['hargaSatuan'], 0, '', '.') ?>
                                        </td>
                                        <td>
                                            Rp <?= number_format($dtl_modal['totalHarga'], 0, '', '.') ?>
                                        </td>
                                    </tr>
                                <?php endif; endforeach; ?>
                            </tbody>
                            <tfooter>
                                <td class="text-center" colspan="4"><strong>Total Pengeluaran</strong></td>
                                <td><strong>Rp <?= number_format($dt_modal['totalModal'], 0, '', '.') ?></strong></td>
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
                        '<input required class="form-control" type="text" name="namaBahan['+ a++ +']">'+
                    '</div>'+
                    '<div class="col-2 ">'+
                        '<input style="" required class="form-control" type="number" id="jumlah'+ g++ +'" onkeyup="jumlah('+ j++ +')" name="jumlah['+ b++ +']">'+
                    '</div>'+
                    '<div class="col-3">'+
                        '<div class="form-group">'+
                            '<div class="input-group">'+
                                '<div class="input-group-prepend">'+
                                    '<div class="input-group-text">Rp</div>'+
                                '</div>'+
                                '<input required class="form-control" type="number" id="hargaSatuan'+ h++ +'" onkeyup="hargaSatuan('+ f++ +')" name="hargaSatuan['+ c++ +']">'+
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
    }

    function hargaSatuan($b){
        return hitung($b);
    }

    function hitung($c){
        var jumlah      = document.getElementById("jumlah"+$c).value;
        var hargaSatuan = document.getElementById('hargaSatuan'+$c).value;
        total = jumlah * hargaSatuan;
        document.getElementById("totalHarga"+$c).value = total;
    }

    function hapus_modal($idModal) {
        var tanggal = document.getElementById('tanggal_filter').value;
        swal({
            title: "Hapus Modal",
            text: "Apakah anda yakin ingin menghapus data pengeluaran modal ini ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location = "<?php echo base_url('admin/modal/hapus_modal/') ?>" + $idModal +'_'+ tanggal;
            } else {
                swal("Data modal batal dihapus");
            }
        });
    }

    function filter(){
        var tanggal = document.getElementById('tanggal_filter').value;
        if (tanggal != '') {
            window.location="<?php echo base_url('admin/modal/pengeluaran_modal/') ?>"+tanggal;
        }else{
            swal('Informasi','Bulan dan tahun tidak ditemukan', 'info');
        }
    }
</script>