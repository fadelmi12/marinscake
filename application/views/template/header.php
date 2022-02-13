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
</head>

<body>
    <div class="ps-search">
        <div class="ps-search__content">
            <a class="ps-search__close" href="#"><span></span></a>
            <form class="ps-form--search-2" action="do_action" method="post">
                <h3>Enter your keyword</h3>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="" />
                    <button class="ps-btn active ps-btn--fullwidth">Search</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Header-->
    <header class="header header--1">
        <nav class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-5 d-flex align-items-center pr-5">
                        <ul class="menu d-flex justify-content-between w-100">
                            <li class="menu-item-has-children current-menu-item">
                                <a href="index.html">Homepage</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Homepage 1</a></li>
                                    <li><a href="homepage-2.html">Homepage 2</a></li>
                                    <li><a href="homepage-3.html">Homepage 3</a></li>
                                </ul>
                            </li>
                            <li><a href="#company-info">About</a></li>
                            <li>
                                <a href="product-listing.html">Product</a>
                                <ul class="sub-menu">
                                    <li><a href="product-listing.html">Product Listing</a></li>
                                    <li><a href="product-detail.html">Product Detail</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-2 d-flex align-items-center">
                        <a class="ps-logo" href="index.html"><img src="<?= base_url() ?>assets/client/images/logo-light.png" alt="" /></a>
                    </div>
                    <div class="col-5 d-flex align-items-center justify-content-between pl-5">
                        <ul class="menu d-flex justify-content-between w-75">
                            <li><a href="#">Preorder</a></li>
                            <li><a href="contact.html">kontak</a></li>
                        </ul>
                        <div class="header__actions w-50 text-right">
                            <a class="ps-search-btn" href="#"><i class="ba-magnifying-glass"></i></a>
                            <div class="ps-cart">
                                <a class="ps-cart__toggle" href="#"><span><i>20</i></span><i class="ba-shopping"></i></a>
                                <div class="ps-cart__listing">
                                    <div class="ps-cart__content">
                                        <div class="ps-cart-item">
                                            <a class="ps-cart-item__close" href="#"></a>
                                            <div class="ps-cart-item__thumbnail">
                                                <a href="product-detail.html"></a><img src="<?= base_url() ?>assets/client/images/shopping-cart/3.png" alt="" />
                                            </div>
                                            <div class="ps-cart-item__content">
                                                <a class="ps-cart-item__title" href="product-detail.html">Todd Snyder</a>
                                                <p>
                                                    <span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="ps-cart-item">
                                            <a class="ps-cart-item__close" href="#"></a>
                                            <div class="ps-cart-item__thumbnail">
                                                <a href="product-detail.html"></a><img src="<?= base_url() ?>assets/client/images/shopping-cart/1.png" alt="" />
                                            </div>
                                            <div class="ps-cart-item__content">
                                                <a class="ps-cart-item__title" href="product-detail.html">Todd Snyder</a>
                                                <p>
                                                    <span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-cart__total">
                                        <p>Number of items:<span>36</span></p>
                                        <p>Item Total:<span>£528.00</span></p>
                                    </div>
                                    <div class="ps-cart__footer">
                                        <a href="cart.html">Check out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <nav class="navigation--mobile">
            <div class="ps-container">
                <a class="ps-logo" href="#"><img src="<?= base_url() ?>assets/client/images/logo-light.png" alt="" /></a>
                <ul class="menu menu--mobile">
                    <li class="current-menu-item menu-item-has-children">
                        <a href="#">Homepage</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                        <ul class="sub-menu">
                            <li><a href="index.html">Homepage 1</a></li>
                            <li><a href="homepage-2.html">Homepage 2</a></li>
                            <li><a href="homepage-3.html">Homepage 3</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">About</a></li>
                    <li class="menu-item-has-children">
                        <a href="product-listing.html">product</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                        <ul class="sub-menu">
                            <li><a href="product-listing.html">Product List</a></li>
                            <li><a href="product-detail.html">Product Detail</a></li>
                            <li><a href="order-form.html">Order Form</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="about.html">Pages</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                        <ul class="sub-menu">
                            <li><a href="menu.html">Menu</a></li>
                            <li><a href="cart.html">Shopping Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="whishlist.html">Whishlist</a></li>
                            <li><a href="compare.html">Compare</a></li>
                            <li><a href="404-page.html">Page 404</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="blog-grid.html">Blogs</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                        <ul class="sub-menu">
                            <li><a href="blog-grid.html">Blog Grid</a></li>
                            <li class="menu-item-has-children">
                                <a href="blog-list.html">Blog Listing</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
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
                <div class="menu-toggle"><span></span></div>
                <div class="header__actions">
                    <a class="ps-search-btn" href="#"><i class="ba-magnifying-glass"></i></a>
                    <div class="ps-cart">
                        <a class="ps-cart__toggle" href="#"><span><i>20</i></span><i class="ba-shopping"></i></a>
                        <div class="ps-cart__listing">
                            <div class="ps-cart__content">
                                <div class="ps-cart-item">
                                    <a class="ps-cart-item__close" href="#"></a>
                                    <div class="ps-cart-item__thumbnail">
                                        <a href="product-detail.html"></a><img src="<?= base_url() ?>assets/client/images/shopping-cart/1.png" alt="" />
                                    </div>
                                    <div class="ps-cart-item__content">
                                        <a class="ps-cart-item__title" href="product-detail.html">Kingsman</a>
                                        <p>
                                            <span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="ps-cart-item">
                                    <a class="ps-cart-item__close" href="#"></a>
                                    <div class="ps-cart-item__thumbnail">
                                        <a href="product-detail.html"></a><img src="<?= base_url() ?>assets/client/images/shopping-cart/2.png" alt="" />
                                    </div>
                                    <div class="ps-cart-item__content">
                                        <a class="ps-cart-item__title" href="product-detail.html">Joseph</a>
                                        <p>
                                            <span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="ps-cart-item">
                                    <a class="ps-cart-item__close" href="#"></a>
                                    <div class="ps-cart-item__thumbnail">
                                        <a href="product-detail.html"></a><img src="<?= base_url() ?>assets/client/images/shopping-cart/3.png" alt="" />
                                    </div>
                                    <div class="ps-cart-item__content">
                                        <a class="ps-cart-item__title" href="product-detail.html">Todd Snyder</a>
                                        <p>
                                            <span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="ps-cart-item">
                                    <a class="ps-cart-item__close" href="#"></a>
                                    <div class="ps-cart-item__thumbnail">
                                        <a href="product-detail.html"></a><img src="<?= base_url() ?>assets/client/images/shopping-cart/1.png" alt="" />
                                    </div>
                                    <div class="ps-cart-item__content">
                                        <a class="ps-cart-item__title" href="product-detail.html">Todd Snyder</a>
                                        <p>
                                            <span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="ps-cart-item">
                                    <a class="ps-cart-item__close" href="#"></a>
                                    <div class="ps-cart-item__thumbnail">
                                        <a href="product-detail.html"></a><img src="<?= base_url() ?>assets/client/images/shopping-cart/1.png" alt="" />
                                    </div>
                                    <div class="ps-cart-item__content">
                                        <a class="ps-cart-item__title" href="product-detail.html">Todd Snyder</a>
                                        <p>
                                            <span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="ps-cart-item">
                                    <a class="ps-cart-item__close" href="#"></a>
                                    <div class="ps-cart-item__thumbnail">
                                        <a href="product-detail.html"></a><img src="<?= base_url() ?>assets/client/images/shopping-cart/1.png" alt="" />
                                    </div>
                                    <div class="ps-cart-item__content">
                                        <a class="ps-cart-item__title" href="product-detail.html">Todd Snyder</a>
                                        <p>
                                            <span>Quantity:<i>12</i></span><span>Total:<i>£176</i></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-cart__total">
                                <p>Number of items:<span>36</span></p>
                                <p>Item Total:<span>£528.00</span></p>
                            </div>
                            <div class="ps-cart__footer">
                                <a href="cart.html">Check out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>