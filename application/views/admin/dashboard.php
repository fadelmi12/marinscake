<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-4">
                <div class="card p-3 py-4 text-center">
                    <h5 class="m-0 text-dark">Total Produk</h5>
                    <h5 class="mb-0 mt-3 text-dark"><?= count($produk);?></h5>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card p-3 py-4 text-center">
                    <h5 class="m-0 text-dark">Total Transaksi Langsung</h5>
                    <h5 class="mb-0 mt-3 text-dark"><?= count($transaksi_langsung);?></h5>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card p-3 py-4 text-center">
                    <h5 class="m-0 text-dark">Total Transaksi Preorder</h5>
                    <h5 class="mb-0 mt-3 text-dark"><?= count($transaksi_preorder);?></h5>
                </div>
            </div>
        </div>
    </section>
</div>