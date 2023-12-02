<?php
get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">THÊM KHÁCH HÀNG</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">

                        <label for="fullname"  style="margin-right: 1400px;">Họ và tên</label>
                        <input type="text" name="fullname" id="fullname">
                        <?php echo form_error('fullname'); ?>

                        <label for="phone_number"  style="margin-right: 1400px;">Số điện thoại</label>
                        <input type="text" name="phone_number" id="phone_number">
                        <?php echo form_error('phone_number'); ?>

                        <label for="address"  style="margin-right: 1500px;">Địa chỉ</label>
                        <input type="text" name="address" id="address">
                        <?php echo form_error('address'); ?>

                        <label for="email" style="margin-right: 1500px;">Email</label>
                        <input type="text" name="email" id="email">
                        <?php echo form_error('email'); ?>

                        
                        <label for="date_created" style="margin-right: 1500px;">Date_created</label>
                        <input type="date" name="date_created" id="date_created">
                        <?php echo form_error('date_created'); ?>


                        <button type="submit" name="btn-add-customer" id="btn-submit">Thêm mới</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>