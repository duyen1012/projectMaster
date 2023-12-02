<?php
get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">THÊM ĐƠN HÀNG</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_order" id="id_order">
                        
                        <label for="id_customer" style="margin-right: 1500px;">Id_customer</label>
                        <input type="text" name="id_customer" id="id_customer">
                        <?php echo form_error('id_customer'); ?>

                        <label for="order_name" style="margin-right: 1500px;">Order_name</label>
                        <input type="text" name="order_name" id="order_name">
                        <?php echo form_error('order_name'); ?>

                        <label for="code_order" style="margin-right: 1500px;">Code_order</label>
                        <input type="text" name="code_order" id="code_order">
                        <?php echo form_error('code_order'); ?>

                        <label for="product_number" style="margin-right: 1500px;">Product_number</label>
                        <input type="text" name="product_number" id="product_number">
                        <?php echo form_error('product_number'); ?>

                        <label for="total_price" style="margin-right: 1500px;">Total_price</label>
                        <input type="text" name="total_price" id="total_price">
                        <?php echo form_error('total_price'); ?>

                        <label for="order_date" style="margin-right: 1500px;">Order_date</label>
                        <input type="date" name="order_date" id="order_date">
                        <?php echo form_error('order_date'); ?>

                        <label for="order_status" style="margin-right: 1500px;">Order_status</label>
                        <input type="text" name="order_status" id="order_status">
                        <?php echo form_error('order_status'); ?>

                        <label for="order_detail" style="margin-right: 1500px;">Order_detail</label>
                        <input type="text" name="order_detail" id="order_detail">
                        <?php echo form_error('order_detail'); ?>

                        <button type="submit" name="btn-add-order" id="btn-submit">Thêm mới</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>