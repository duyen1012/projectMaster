<!DOCTYPE html>
<html>

<head>

    <head>
        <title>Quản lý ISMART</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
        <link href="public/reset.css" rel="stylesheet" type="text/css" />
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="public/style.css" rel="stylesheet" type="text/css" />
        <link href="public/responsive.css" rel="stylesheet" type="text/css" />

       
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
        <link rel="stylesheet" href="public/css/imgcss.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- DataTables -->
        <link href="public/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="public/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="public/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />



    </head>
</head>

<body>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div class="wp-inner clearfix">
                    <a href="?mod=page&action=list_order" title="" id="logo" class="fl-left">ADMIN</a>
                    <ul id="main-menu" class="fl-left">
                        <li>
                            <a href="?mod=page&action=list_page" title="">Trang</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?mod=page&action=add_page" title="">Thêm mới</a>
                                </li>
                                <li>
                                    <a href="?mod=page&action=list_page" title="">Danh sách trang</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="?mod=post&action=list_post" title="">Bài viết</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?mod=post&controller=post&action=add_post" title="">Thêm mới</a>
                                </li>
                                <li>
                                    <a href="?mod=post&action=list_post" title="">Danh sách bài viết</a>
                                </li>
                                <li>
                                    <a href="?mod=post&action=list_post_cat" title="">Danh mục bài viết</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="?mod=page&action=list_product" title="">Sản phẩm</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?mod=page&controller=product&action=add_product" title="">Thêm mới</a>
                                </li>
                                <li>
                                    <a href="?mod=page&action=list_product" title="">Danh sách sản phẩm</a>
                                </li>
                                <li>
                                    <a href="?mod=page&action=list_cat" title="">Danh mục sản phẩm</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="" title="">Bán hàng</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?mod=page&action=list_order" title="">Danh sách đơn hàng</a>
                                </li>
                                <li>
                                    <a href="?mod=page&action=list_customer" title="">Danh sách khách hàng</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="?mod=page&action=menu" title="">Menu</a>
                        </li>
                    </ul>
                    <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                        <button class="dropdown-toggle clearfix" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true">
                            <div id="thumb-circle" class="fl-left">
                                <img src="public/images/img-admin.png">
                            </div>
                            <h3 id="account" class="fl-right">
                                <?php if (!empty(user_login()))
                                    echo user_login(); ?>
                            </h3>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="?mod=users&action=update" title="Thông tin cá nhân">Thông tin tài khoản</a>
                            </li>
                            <li><a href="?mod=users&action=login" title="Thoát">Thoát</a></li>
                        </ul>
                    </div>
                </div>
            </div>