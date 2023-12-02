<?php
get_header();
?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
           
            <h3 id="index" class="fl-left">CẬP NHẬT ĐƠN HÀNG</h3>
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
                    <input type="hidden" name="id_order" value="<?php echo  $info_order['id_order'] ?>" />

                        <label for="id_customer" >Id_customer </label>
                        <input type="text" name="id_customer" id="id_customer"  value="<?php echo  $info_order['id_customer'] ?>">
                        <!-- <?php echo form_error('id_customer');?> -->

                        <label for="order_name">Order_name</label>
                        <input type="text" name="order_name" id="order_name"  value="<?php echo  $info_order['order_name'] ?>">
                        <?php echo form_error('order_name');?>

                        <label for="code_order">Code_order</label>
                        <input type="text" name="code_order" id="code_order"  value="<?php echo  $info_order['code_order'] ?>">
                        <?php echo form_error('code_order');?>

                        <label for="product_number">Product_number</label>
                        <input type="text" name="product_number" id="product_number" value="<?php echo  $info_order['product_number'] ?>">
                        <?php echo form_error('product_number');?>

                        <label for="total_price">Total_price</label>
                        <input type="text" name="total_price" id="total_price" value="<?php echo  $info_order['total_price'] ?>">
                        <?php echo form_error('total_price');?>

                        <label for="order_date">Order_date</label>
                        <input type="date" name="order_date" id="order_date" value="<?php echo  $info_order['order_date'] ?>">
                        <?php echo form_error('order_date');?>

                        

                        <label for="order_status">Order_status</label>
                        <input type="text" name="order_status" id="order_status" value="<?php echo  $info_order['order_status'] ?>">
                        <?php echo form_error('order_status');?>

                        <label for="order_detail">Order_detail</label>
                        <input type="text" name="order_detail" id="order_detail" value="<?php echo  $info_order['order_detail'] ?>">
                        <?php echo form_error('order_detail');?>

                        <button type="submit" name="btn-update-order" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?> 