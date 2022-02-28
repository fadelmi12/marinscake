<footer class="ps-footer">
  <div class="ps-footer__content">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <div class="ps-site-info">
            <a class="ps-logo mb-3" href="index.html"><img src="<?= base_url() ?>assets/client/images/logo-dark.png" alt="" /></a>
            <p class="mt-0">
              The secret to having an epically beloved bakery is
              consistency.
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
          <form class="ps-form--subscribe-offer" action="do_action" method="post">
            <h4>Kritik dan Saran</h4>
            <div class="form-group">
              <input class="form-control" type="text" placeholder="Email Anda ...." />
              <button>Subscribe</button>
            </div>
          </form>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
          <div class="ps-footer__open">
            <h4 class="mb-4">Sosial Media</h4>
            <ul class="ps-list--social mt-0">
              <li>
                <a href="#"><i class="fa fa-facebook"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-twitter"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-dribbble"></i></a>
              </li>
            </ul>
          </div>
          <ul class="ps-list--payment">
            <li>
              <a href="#"><img src="<?= base_url() ?>assets/client/images/payment-method/visa.png" alt="" /></a>
            </li>
            <li>
              <a href="#"><img src="<?= base_url() ?>assets/client/images/payment-method/master-card.png" alt="" /></a>
            </li>
            <li>
              <a href="#"><img src="<?= base_url() ?>assets/client/images/payment-method/paypal.png" alt="" /></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="ps-footer__copyright">
    <div class="container">
      <p>
        © Copyright by <strong>Bready Store</strong>. Design by<a href="#">
          Alena Studio.</a>
      </p>
    </div>
  </div>
</footer>
<div id="back2top"><i class="fa fa-angle-up"></i></div>

<script src="<?= base_url() ?>assets/client/plugins/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/client/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/client/plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/client/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?= base_url() ?>assets/client/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script src="<?= base_url() ?>assets/client/plugins/jquery.waypoints.min.js"></script>
<script src="<?= base_url() ?>assets/client/plugins/jquery.countTo.js"></script>
<script src="<?= base_url() ?>assets/client/plugins/jquery.matchHeight-min.js"></script>
<script src="<?= base_url() ?>assets/client/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>assets/client/plugins/gmap3.min.js"></script>
<script src="<?= base_url() ?>assets/client/plugins/lightGallery-master/dist/js/lightgallery-all.min.js"></script>
<script src="<?= base_url() ?>assets/client/plugins/slick/slick/slick.min.js"></script>
<script src="<?= base_url() ?>assets/client/plugins/slick-animation.min.js"></script>
<script src="<?= base_url() ?>assets/client/plugins/jquery.slimscroll.min.js"></script>
<!-- Custom scripts-->
<script src="<?= base_url() ?>assets/client/js/main.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsUcTjt43mTheN9ruCsQVgBE-wgN6_AfY&amp;region=GB"></script>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.add_cart').click(function() {
      var produk_id = $(this).data("produkid");
      var produk_nama = $(this).data("produknama");
      var produk_harga = $(this).data("produkharga");
      var produk_gambar = $(this).data("produkgambar");
      var quantity = $('#' + produk_id).val();
      $.ajax({
        url: "<?php echo base_url(); ?>keranjang/add_to_cart",
        method: "POST",
        data: {
          produk_id: produk_id,
          produk_nama: produk_nama,
          produk_harga: produk_harga,
          produk_gambar: produk_gambar,
          quantity: quantity
        },
        success: function(data) {
          $('#detail_cart').html(data);
        }
      });
    });

    // Load shopping cart
    $('#detail_cart').load("<?php echo base_url(); ?>keranjang/load_cart");

    //Hapus Item Cart
    $(document).on('click', '.hapus_cart', function() {
      var row_id = $(this).attr("id"); //mengambil row_id dari artibut id
      $.ajax({
        url: "<?php echo base_url(); ?>keranjang/hapus_cart",
        method: "POST",
        data: {
          row_id: row_id
        },
        success: function(data) {
          $('#detail_cart').html(data);
        }
      });
    });
  });
</script>
</body>

</html>