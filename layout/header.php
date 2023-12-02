<!DOCTYPE html>
<html>

<head>
    <title>ISMART STORE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="public/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/import/checkout.css" rel="stylesheet" type="text/css" />
    <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css" />
    <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="public/style.css" rel="stylesheet" type="text/css" />
    <link href="public/responsive.css" rel="stylesheet" type="text/css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="public/css/login.css" rel="stylesheet" type="text/css"/>
    <!------ Include the above in your HEAD tag ---------->
    
    <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
    <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
    <script src="public/js/main.js" type="text/javascript"></script>

</head>

<body>

    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div id="head-top" class="clearfix">
                    <div class="wp-inner">
                        <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                        <div id="main-menu-wp" class="fl-right">
                            <ul id="main-menu" class="clearfix">
                                <li>
                                    <a href="?mod=home&action=index" title="">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="?mod=page&action=category_product" title="">Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="?mod=page&action=blog" title="">Blog</a>
                                </li>
                                <li>
                                    <a href="?mod=page&action=detail_blog" title="">Giới thiệu</a>
                                </li>
                                <li>
                                    <a href="?mod=page&action=detail_contact" title="">Liên hệ</a>
                                </li>
                                <li>
                                    <a  onclick="document.getElementById('user_id').style.display='block'" title="">Đăng nhập</a>
                                </li>
                            </ul>
                            <div id="user_id" class="modal">
        <span onclick="document.getElementById('user_id').style.display='none'" class="close"
            title="Close Modal">&times;</span>

        <!-- Modal Content -->
        <form class="modal-content animate" method="post">

          

            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" id="username" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id="password" required>

                <button type="submit" id="login_btn" name="btn_login">Login</button>
        </form>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
    </div>
                        </div>
                    </div>
                </div>
                <div id="head-body" class="clearfix">
                    <div class="wp-inner">
                        <a href="?mod=home&action=index" title="" id="logo" class="fl-left"><img src="public/images/logo.png" /></a>
                        <div id="search-wp" class="fl-left">
                            <form method="get" action="">
                                <input type="text" name="s" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                <button type="submit" id="sm-s">Tìm kiếm</button>
                            </form>
                        </div>
                        <div id="action-wp" class="fl-right">
                            <div id="advisory-wp" class="fl-left">
                                <span class="title">Tư vấn</span>
                                <span class="phone">0987.654.321</span>
                            </div>
                            <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                            <a href="<?php base_url('?id=') ?>" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span id="num">2</span>
                            </a>
                            <div id="cart-wp" class="fl-right">
                                <div id="btn-cart">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num">2</span>
                                </div>
                                <div id="dropdown">
                                    <p class="desc">Có <span>2 sản phẩm</span> trong giỏ hàng</p>
                                    <ul class="list-cart">
                                        <?php
                                        foreach ($_SESSION['cart']['buy'] as $cart) {
                                            ?>
                                              <li class="clearfix">
                                            <a href="" title="" class="thumb fl-left">
                                                <img src="<?php echo $cart['images']?>" alt="">
                                            </a>
                                            <div class="info fl-right">
                                                <a href="" title="" class="product-name"><?php echo $cart['product_name']?></a>
                                                <p class="price"><?php currency_format($cart['prices'])?></p>
                                                <p class="qty">Số lượng: <span><?php echo $cart['qty'] ?></span></p>
                                            </div>
                                        </li>
                                            <?php
                                        }
                                        ?>
                                      

                                    </ul>
                                    <div class="total-price clearfix">
                                        <p class="title fl-left">Tổng:</p>
                                        <p class="price fl-right"><?php echo currency_format($_SESSION['cart']['info']['total'])?></p>
                                    </div>
                                    <dic class="action-cart clearfix">
                                        <a href="?mod=cart&action=cart" title="Giỏ hàng" class="view-cart fl-left">Giỏ
                                            hàng</a>
                                        <a href="?mod=cart&action=checkout" title="Thanh toán" class="checkout fl-right">Thanh
                                            toán</a>
                                    </dic>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>