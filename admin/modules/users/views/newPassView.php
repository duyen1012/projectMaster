<html>
    <head>
        <title>Thiết lập mật khẩu mới</title>
        <link href="public/css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/login.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <div id="wp_form_login">
            <h1 class="page_title"> MẬT KHẨU MỚI</h1>
            <form action="" id="form_login" method="POST">
                <input type="password" name="password" id="password" value="" placeholder="password" />
                <?php echo form_error('password'); ?>
                <input type="submit" value="LƯU" id="btn_login" name="btn_new_pass">
                <?php echo form_error('account') ?>
            </form>
            <a href="<?php echo base_url("?mod=users&action=login") ?>">Đăng Nhập</a>
            <a href="<?php echo base_url("?mod=users&action=reg") ?>">Đăng Ký</a>

        </div>
    </body>
</html>



