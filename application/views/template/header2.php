<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link href="apple-touch-icon.png" rel="apple-touch-icon" />
    <link href="favicon.png" rel="icon" />
    <meta name="author" content="" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <title>Marins Cake</title>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script%7CLora:400,700" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/client/plugins/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/client/plugins/bakery-icon/style.css" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/client/plugins/owl-carousel/assets/owl.carousel.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/client/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/client/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/client/plugins/jquery-ui/jquery-ui.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/client/plugins/slick/slick/slick.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/client/plugins/lightGallery-master/dist/css/lightgallery.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/client/css/style.css" />

    <!-- swal -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <!-- header-->
    <header class="header header--3" data-sticky="false">
        <nav class="navigation">
            <div class="container"><a class="ps-logo" href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/client/images/logo-light3.svg" alt=""></a>
                <div class="menu-toggle"><span></span></div>
                <div class="header__actions">
                    <a class="ps-search-btn" href="#"><i class="ba-magnifying-glass"></i></a>
                    <div class="ps-cart"><a class="ps-cart__toggle" href="#"><i class="ba-shopping"></i></a>
                        <div class="ps-cart__listing">
                            <div id="detail_cart"></div>
                        </div>
                    </div>
                </div>
                <ul class="menu">
                    <li><a href="about.html">About</a></li>
                    <li class="menu-item-has-children"><a href="about.html">Pages</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                        <ul class="sub-menu">
                            <li><a href="menu.html">Menu</a></li>
                            <li><a href="cart.html">Shopping Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="whishlist.html">Whishlist</a></li>
                            <li><a href="compare.html">Compare</a></li>
                            <li><a href="404-page.html">Page 404</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="blog-grid.html">Blogs</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                        <ul class="sub-menu">
                            <li><a href="blog-grid.html">Blog Grid</a></li>
                            <li class="menu-item-has-children"><a href="blog-list.html">Blog Listing</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                <ul class="sub-menu">
                                    <li><a href="blog-list.html">Blog List Has Sidebar</a></li>
                                    <li><a href="blog-list.html">Blog List No Sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="blog-detail.html">Blog Detail</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </div>
        </nav>
    </header>