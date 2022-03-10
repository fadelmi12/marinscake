<div class="main-content">
    <section class="section">
        <?php echo $this->session->flashdata('gagal_edit_produk');
        foreach ($produk as $data_produk) : ?>
            <div class="row">
                <div class="col-lg-6">
                    <form action="<?php echo base_url("Admin/Produk/update_produk/") . $data_produk['idProduk']; ?>" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    Edit Produk
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Nama Produk</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-quote-left"></i>
                                                </div>
                                            </div>
                                            <input required type="text" class="form-control" name="nama_produk" value="<?php echo $data_produk['namaProduk'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Harga</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input required type="text" class="form-control" name="harga" value="<?php echo $data_produk['harga'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Kategori</label>
                                        <select class="form-control selectric" name="kategori">
                                            <?php foreach ($kategori as $ktg) : ?>
                                                <option value="<?php echo $ktg['idJenis'] ?>" <?php if ($data_produk['idJenis'] == $ktg['idJenis']) : echo "selected";
                                                                                                endif; ?>>
                                                    <?php echo $ktg['namaJenis'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Status</label>
                                        <select class="form-control selectric" name="status">
                                            <option <?php if ($data_produk['status'] == 'Preorder') : echo "selected";
                                                    endif; ?>>Preorder</option>
                                            <option <?php if ($data_produk['status'] == 'Ready') : echo "selected";
                                                    endif; ?>> Ready</option>
                                            <option <?php if ($data_produk['status'] == 'Kosong') : echo "selected";
                                                    endif; ?>>Kosong</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Stok</label>
                                        <input required type="number" class="form-control" name="stok" value="<?php echo $data_produk['stok'] ?>">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Minimal Order</label>
                                        <input required type="number" class="form-control" name="min_order" value="<?= $data_produk['min_order'] ?>">
                                    </div>
                                </div>
                                <div class="form-group " style="height: auto;">
                                    <label>Deskripsi Produk</label>
                                    <textarea style="resize: none;" class="form-control" cols="59" rows="5" name="deskripsi">
                                    <?= $data_produk['deskripsi'] ?>
                                </textarea>
                                </div>
                                <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Gambar Produk</h4>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid" style="overflow-y: auto; height: 380px;">
                                <div class="row mb-2">
                                    <div class="col-4 text-center">
                                        <strong>Gambar</strong>
                                    </div>
                                    <div class="col-6 text-center">
                                        <strong>Input File</strong>
                                    </div>
                                    <div class="col-2 text-center">
                                        <strong>Aksi</strong>
                                    </div>
                                </div>
                                <!-- id produk -->
                                <input hidden id="id_produk" type="text" value="<?= $data_produk['idProduk'] ?>">
                                <!-- total gambar -->
                                <input hidden id="total_gambar" type="text" value="">
                                <div class="col-12 input_gambar" id="jumlah_gambar">
                                    <?php foreach ($gambar as $gb_produk) :
                                        if ($data_produk['idProduk'] == $gb_produk['id_produk']) : ?>
                                            <form onsubmit="return false" id="form_gambar<?= $gb_produk['id_gambarProduk'] ?>" method="POST" enctype="multipart/form-data">
                                                <div class="row mb-2" id="row_gambar<?= $gb_produk['id_gambarProduk']; ?>">
                                                    <div class="col-4 col align-self-center" align="center">
                                                        <img id="gambar<?= $gb_produk['id_gambarProduk'] ?>" alt="your image" width="100" height="auto" src="<?php echo base_url() . '/uploads/gambar_produk/' . $gb_produk["gambar"]; ?>" />
                                                    </div>
                                                    <div class="col-6 col align-self-center">
                                                        <input name="gambar" id="upload<?= $gb_produk['id_gambarProduk'] ?>" class="form-control-file" type="file" accept="image/*" onchange="update_gambar(<?= $gb_produk['id_gambarProduk'] ?>)">
                                                    </div>
                                                    <div class="col-2 col align-self-center">
                                                        <button type="button" class="btn btn-danger" onclick="hapus_gambar(<?= $gb_produk['id_gambarProduk'] ?>)">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                    <?php endif;
                                    endforeach; ?>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="text-center mt-4">
                                    <button class="btn btn-info tambah_gambar" type="button"><i class="fas fa-plus mr-2"></i>Tambah Gambar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var max_fields = 20; //maximum input boxes allowed
        var wrapper = $(".input_gambar"); //Fields wrapper
        var add_button = $(".tambah_gambar"); //Add button ID
        var jumlah = document.getElementById('jumlah_gambar');

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            //max input box allowed
            x++; //text box increment 
            var random_kode = Math.floor((Math.random() * 1000000) + 1); //random_kode
            $(wrapper).append('' +
                '<form onsubmit="return false" id="form_gambar'+ random_kode +'" method="POST" enctype="multipart/form-data"> ' +
                    '<div class="row mb-2" id="row_gambar'+ random_kode +'">' +
                        '<div class="col-4 col align-self-center" align="center">' +
                            '<img id="gambar'+ random_kode +'" alt="your image" width="100" height="auto"/>' +
                        '</div>' +
                        '<div class="col-6 col align-self-center">' +
                            '<input required id="upload'+ random_kode +'" class="form-control-file" type="file" accept="image/*" name="gambar" onchange="insert_gambar('+ random_kode +')">' +
                        '</div>' +
                        '<div class="col-2 col align-self-center">' +
                            '<button id="hapus'+ random_kode +'" type="button" class="btn btn-danger remove_field"><i class="fas fa-trash"></button>' +
                        '</div>' +
                    '</div>' +
                '</form>'
            ); // add input boxes.
            $("#upload"+ random_kode).focus();
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            total_gambar = document.getElementById('total_gambar').value;
            if(total_gambar <= 1){
                swal('Gagal hapus','Produk minimal memiliki 1 gambar','error');
            }else{
                e.preventDefault();
                $(this).parent('div').parent('div').parent('form').remove();
                x--;
            }
        })

        setInterval(function(){
            var box = document.getElementById('jumlah_gambar');
            var directChildren = box.children.length;
            document.getElementById('total_gambar').value = directChildren;
        },500);
    });

    function update_gambar(id) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("upload" + id).files[0]);

        oFReader.onload = function(oFREvent) {
            document.getElementById("gambar" + id).src = oFREvent.target.result;
        };

        fetch('<?php echo base_url("admin/produk/update_gambar/") ?>' + id, {
            method: "POST",
            body: new FormData(document.getElementById("form_gambar" + id)),
        });
    };

    function insert_gambar(id) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("upload" + id).files[0]);

        oFReader.onload = function(oFREvent) {
            document.getElementById("gambar" + id).src = oFREvent.target.result;
        };

        var id_produk = document.getElementById('id_produk').value; //get id produk

        $.ajax({
                url: '<?php echo base_url("admin/produk/insert_gambar/") ?>' + id_produk,
                type: "POST",
                data: new FormData(document.getElementById("form_gambar" + id)),
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {
                    var data2 = Object.entries(data)[0][1];
                    var btn_hapus = document.getElementById("hapus"+id);
                    btn_hapus.setAttribute('onclick','hapus_gambarLangsung('+ String(data2) +')')
                },
            });
    };

    function hapus_gambar(id_gambar) {
        total_gambar = document.getElementById('total_gambar').value;
        if(total_gambar <= 1){
            swal('Gagal hapus','Produk minimal memiliki 1 gambar','error');
        }else{
            $.ajax({
                url: "<?php echo base_url('admin/produk/hapus_gambar') ?>",
                type: "POST",
                dataType: "text",
                data: {
                    id_gambarProduk: id_gambar,
                },
                success: function(data) {
                    document.getElementById("row_gambar" + id_gambar).innerHTML = data;
                    document.getElementById("form_gambar" + id_gambar).remove();
                },
                error: function() {
                    alert("error");
                }
            });
        }
    }

    function hapus_gambarLangsung(id_gambar) {
        total_gambar = document.getElementById('total_gambar').value;
        if(total_gambar <= 1){
            swal('Gagal hapus','Produk minimal memiliki 1 gambar','error');
        }else{
            $.ajax({
                url: "<?php echo base_url('admin/produk/hapus_gambar') ?>",
                type: "POST",
                dataType: "text",
                data: {
                    id_gambarProduk: id_gambar,
                },
                success: function(data) {
                    //document.getElementById("row_gambar" + id_gambar).innerHTML = data;
                },
                error: function() {
                    alert("error");
                }
            });
        }
    }

</script>