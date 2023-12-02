<html>
    <head>
        <title>Chức năng đăng nhập</title>
        <link href="public/css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/login.css" rel="stylesheet" type="text/css"/>

        <!--<link href="public/css/style.css" rel="stylesheet" type="text/css"/>-->


    </head>
    <body>
        <div id="wp_form_login">
            <h1 class="page_title">Đăng kí tài khoản</h1>
            <form action="" id="form_login" method="POST">
                <input type="text" name="fullname" id="fullname" value="<?php echo set_value('fullname') ?>" placeholder="fullname">
                <?php echo form_error('fullname') ?>
                <input type="text" name="email" id="email" value="<?php echo set_value('email') ?>" placeholder="email">
                <?php echo form_error('email') ?>
                <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>" placeholder="username">
                <?php echo form_error('username') ?>
                <input type="password" name="password" id="password" value="<?php echo set_value('password') ?>" placeholder="password">
                <?php echo form_error('password') ?>
                <input type="submit" value="Đăng ký" id=btn_login name="btn_reg">
                <?php echo form_error('account') ?>
            </form>
            <a href="<?php echo base_url("?mod=users&action=login") ?>">Đăng Nhập</a>
        </div>
    </body>
</html>


