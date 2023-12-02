<?php
get_header();
?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
           
            <h3 id="index" class="fl-left">CẬP NHẬT KHÁCH HÀNG</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php
        get_sidebar();
        ?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                <form method="POST" enctype="multipart/form-data" >
                    <input type="hidden" name="id_customer" value="<?php echo  $info_customer['id_customer'] ?>" />
                        <label for="fullname" >Họ và Tên </label>
                     
                        <input type="text" name="fullname" id="fullname"  value="<?php echo  $info_customer['fullname'] ?>">
                        <!-- <?php echo form_error('fullname');?> -->

                        <label for="phone_number">Số điện thoại</label>
                        <input type="text" name="phone_number" id="phone_number"  value="<?php echo  $info_customer['phone_number'] ?>">
                        <?php echo form_error('phone_number');?>

                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address" id="address"  value="<?php echo  $info_customer['address'] ?>">
                        <?php echo form_error('address');?>

                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" value="<?php echo  $info_customer['email'] ?>">
                        <?php echo form_error('email');?>                   
                        
                     

                        
                        <label for="date_created">Thời gian</label>
                        <input type="date" name="date_created" id="date_created" value="<?php echo  $info_customer['date_created'] ?>">
                       <?php echo form_error('date_created'); ?>
                        <button type="submit" name="btn-update-customer" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?> 