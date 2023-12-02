<html>
    <head>
        <title>Khôi phục mật khẩu</title>
        <link href="public/css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/login.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <div id="wp_form_login">
            <h1 class="page_title">KHÔI PHỤC MẬT KHẨU</h1>
            <form action="" id="form_login" method="POST">
                <input type="text" name="email" id="email" value="<?php echo set_value('email') ?>" placeholder="email">
                <?php echo form_error('email') ?>
                <input type="submit" value="GỬI YÊU CẦU" id="btn_login" name="btn_reset">
                <?php echo form_error('account') ?>
            </form>
            <a href="<?php echo base_url("?mod=users&action=login") ?>">Đăng Nhập</a>
            <a href="<?php echo base_url("?mod=users&action=reg") ?>">Đăng Ký</a>

        </div>
    </body>
</html>



