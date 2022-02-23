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

<?php echo $this->session->flashdata('edit_modal'); ?>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>
                            Edit Modal
                        </h4>
                    </div>
                    <div class="card-body">
                        <!-- Header -->
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
                        <!-- body -->
                    <form id="form_editBahan" method="post" enctype="multipart/form-data">
                    <?php $a=0; $b = 0; $c = 0; $d = 0; $e = 0; $f = 0; $g = 0; $h = 0; $i = 0;
                    foreach($detail_modal as $dtl_modal): ?>
                        <div id="tampil_bahan<?= $dtl_modal['id_detailModal']?>">
                            <div class="row">
                                <div class="col-3">
                                    <input value="<?= $dtl_modal['id_detailModal']?>" required hidden class="form-control" type="text" name="id_detailModal">
                                    <input value="<?= $dtl_modal['idModal']?>" required hidden class="form-control" type="text" name="idModal">
                                    <input value="<?= $dtl_modal['namaBahan']?>" required class="form-control" type="text" name="namaBahan[<?= $a++ ?>]">
                                </div>
                                <div class="col-2 ">
                                    <input value="<?= $dtl_modal['jumlah']?>" required class="form-control" type="number" id="jumlah<?= $b++ ?>" onkeyup="jumlah(<?= $c++ ?>)" name="jumlah[<?= $d++ ?>]">
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input value="<?= $dtl_modal['hargaSatuan']?>" required class="form-control" type="number" id="hargaSatuan<?= $e++ ?>" onkeyup="hargaSatuan(<?= $f++ ?>)" name="hargaSatuan[<?= $g++ ?>]">
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
                                            <input value="<?= $dtl_modal['totalHarga']?>" readonly class="form-control" type="text" id="totalHarga<?= $h++ ?>"  name="totalHarga[<?= $i++ ?>]">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <button type="button" onclick="hapus_bahan(<?= $dtl_modal['id_detailModal']?>)" class="btn btn-danger mt-1"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                        <input id="idModal" value="<?= $dtl_modal['idModal']?>" required hidden class="form-control" type="text" name="idModal">
                        <div class="input_fields_wrap">
                            
                        </div>
                        <div class="text-center">
                            <button class="btn btn-info add_field_button" type="button"><i class="fas fa-plus mr-2"></i>Tambah Bahan</button>
                        </div>
                        <div class="d-flex justify-content-around mt-3">
                            <button type="button" class="btn btn-danger col-2" onclick="window.location.href='javascript:history.go(-1)'">
                                <i class="fas fa-arrow-left"></i>
                                Kembali
                            </button>
                            <button type="button" onclick="simpan_perubahan()" class="btn btn-primary col-2">
                                <i class="fas fa-save mr-1"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
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

    function hapus_bahan($idDetailModal)
    {
        var id_modal = document.getElementById("idModal").value;
        $.ajax({
            url      :"<?php echo base_url('admin/modal/hapus_bahan') ?>",
            type     :"POST",
            dataType : "text",
            data     :{
                idDetailModal : $idDetailModal,
                idModal       : id_modal,
            },

            success:function(data) {
                document.getElementById("tampil_bahan"+$idDetailModal).innerHTML = data;
                swal("Berhasil","Bahan berhasil dihapus","success");
            },

            error:function(){
                alert("error");
            }
        });
    }

    function simpan_perubahan()
    {
        var data = $("#form_editBahan").serialize();
        $.ajax({
            url      :"<?php echo base_url('admin/modal/update_bahan') ?>",
            type     :"POST",
            dataType :"text",
            data     : data,

            success:function(data) {
                swal("Berhasil","Perubahan berhasil disimpan","success");
            },

            error:function(){
                alert("error");
            }
        });
    }

    $(document).ready(function() {
        var max_fields = 20; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        a = 100; b = 100; c = 100; d = 100; j = 100; f = 100; g = 100; h = 100; i = 100;
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
</script>