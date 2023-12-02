<?php
get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar('users')?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Fullname</label>
                        <input type="text" name="fullname" id="fullname" >
                        <?php echo form_error('fullname');?>
                        <label for="title">Username</label>
                        <input type="text" name="username" id="username" placeholder="">
                        <?php echo form_error('username'); ?>
                        <label for="title">Password</label>
                        <input type="password" name="password" id="password" >
                        <?php echo form_error('password');?>
                        <label for="title">Email</label>
                        <input type="text" name="email" id="email" >
                        <?php echo form_error('email');?>
                        <label for="title">Phone_number</label>
                        <input type="phone" name="phone_number" id="phone_number" >
                        <?php echo form_error('phone_number');?>
                        <label for="title">Address</label>
                        <input type="text" name="address" id="address" >
                        <?php echo form_error('address');?>
                       
                        <button type="submit" name="btn-add-admin" id="btn-submit">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>