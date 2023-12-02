<?php
get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_product" id="id_product" />
                        <label for="id_product_cat">id_product_cat</label>
                        <input type="text" name="id_product_cat" id="id_product_cat">
                        <?php echo form_error('id_product_cat'); ?>

                        <label for="product_name">product_name</label>
                        <input type="text" name="product_name" id="product_name">
                        <?php echo form_error('product_name'); ?>

                        <label for="product_title">Product_title</label>
                        <input type="text" name="product_title" id="product_title">
                        <?php echo form_error('product_title'); ?>



                        <label for="prices">Prices</label>
                        <input type="text" name="prices" id="prices">
                        <?php echo form_error('prices'); ?>

                        <label for="prices_new">Prices_new</label>
                        <input type="text" name="prices_new" id="prices_new">
                        <?php echo form_error('prices_new'); ?>

                        <label for="prices_old">Prices_old</label>
                        <input type="text" name="prices_old" id="prices_old">
                        <?php echo form_error('prices_old'); ?>

                        <label for="product_desc">Product_desc</label>
                        <input type="text" name="product_desc" id="product_desc">
                        <label>Images</label>
                        <div style="width: 150px;">
                            <input type="file" name="image" id="fileimge" class="inputfile" style="display:none;" />
                            <label for="fileimge"> <img src="public/images/image.svg" id="image" height="150"
                                    width="150" /> </label>
                        </div>
                        <?php echo form_error('images'); ?>

                        <label for="product_content">Product_content</label>
                        <textarea name="product_content" id="product_content"></textarea>
                        <?php echo form_error('product_content'); ?>

                        <button type="submit" name="btn-add-product" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>