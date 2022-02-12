<?php echo $this->session->flashdata('produk'); ?>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>
                            Daftar Produk
                        </h4>
                        <a class="btn btn-primary d-flex" href="<?php echo base_url("admin/produk/tambah_produk") ?>">
                            <div class="fas fa-plus my-auto mr-2"></div>
                            Tambah Produk
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Stok</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($produk as $data_produk): ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $no++ ?>
                                        </td>
                                        <td>
                                            <?php echo $data_produk['namaProduk'] ?>
                                        </td>
                                        <td>
                                            <?php echo $data_produk['namaJenis'] ?>
                                        </td>
                                        <td>
                                            <?php echo "Rp. "; echo $data_produk['harga'] ?>
                                        </td>
                                        <td>
                                            <?php echo $data_produk['status'] ?>
                                        </td>
                                        <td>
                                            <?php echo $data_produk['stok'] ?>
                                        </td>
                                        <td class="w-25">
                                            <div>
                                                <img src="<?php echo base_url().'/uploads/gambar_produk/'.$data_produk["gambar"]; ?>" alt="" style="border-radius:5px;" class="img-fluid my-2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <button class="btn btn-success mr-2" onclick="window.location.href='<?php echo base_url('admin/produk/edit_produk/'.$data_produk['idProduk']) ?>'">
                                                    Edit
                                                </button>
                                                <button class="btn btn-danger" onclick="hapus_produk(<?php echo $data_produk['idProduk']; ?>)">
                                                    Hapus
                                                </button>
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
    function hapus_produk($idProduk){
        swal({
            title: "Hapus produk",
            text: "Apakah anda yakin ingin menghapus produk ini ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location="<?php echo base_url('admin/produk/hapus_produk/')?>"+$idProduk;
            } else {
                swal("Produk gagal dihapus");
            }
        });
    }
 </script>