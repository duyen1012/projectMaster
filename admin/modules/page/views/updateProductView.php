<?php
get_header();
?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
           
            <h3 id="index" class="fl-left">CẬP NHẬT SẢN PHẨM</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php
        get_sidebar();
        ?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                <form method="POST"  enctype="multipart/form-data" >
                    <input type="hidden" name="id_product" value="<?php echo $info_product['id_product'] ?>" />
                    
                    <label for="id_product_cat">id_product_cat </label>
                    <input type="text" name="id_product_cat" id="id_product_cat" value="<?php echo $info_product['id_product_cat'] ?>">
                    <?php echo form_error('id_product_cat'); ?>
                
                
                    <label for="product_name">product_name</label>
                    <input type="text" name="product_name" id="product_name" value="<?php echo $info_product['product_name'] ?>">
                    <?php echo form_error('product_name'); ?>
                
                    <label for="product_title">product_title</label>
                    <input type="text" name="product_title" id="product_title" value="<?php echo $info_product['product_title'] ?>">
                    <?php echo form_error('product_title'); ?>
                
                    <label for="id_product_cat">Prices</label>
                    <input type="text" name="prices" id="prices" value="<?php echo $info_product['prices'] ?>">
                    <?php echo form_error('prices'); ?>
                
                    <label for="prices_new">Prices_new</label>
                    <input type="text" name="prices_new" id="prices_new" value="<?php echo $info_product['prices_new'] ?>">
                    <?php echo form_error('prices_new'); ?>
                
                    <label for="prices_old">Prices_old</label>
                    <input type="text" name="prices_old" id="prices_old" value="<?php echo $info_product['prices_old'] ?>">
                    <?php echo form_error('prices_old'); ?>
                
                    <label for="product_desc">Product_desc</label>
                    <input type="text" name="product_desc" id="product_desc" readonly="readonly"
                        value="<?php echo $info_product['product_desc'] ?>">
                    <?php echo form_error('product_desc'); ?>
                
                    <label>Images</label>
                    <div style="width: 150px;">
                        <input type="hidden" name="imageCu" value="<?php echo $info_product['images'] ?>" />
                        <input type="file" name="image" id="fileimge" class="inputfile" style="display:none;" />
                        <label for="fileimge">
                            <?php if (empty($info_product['images'])): ?>
                                <img src="public/images/image.svg" id="image" height="150" width="150" />
                            <?php else: ?>
                                <img src="<?= $info_product['images'] ?>" id="image" height="150" width="150" />
                            <?php endif; ?>
                        </label>
                    </div>
                    <input type="hide" name="image_url" value="<?php echo $info_product['images'] ?>" />
                    <label for="product_content">Product_content</label>
                    <textarea name="product_content" id="product_content"
                        readonly="readonly"><?php echo $info_product['product_content'] ?> </textarea>
                    <?php echo form_error('product_content'); ?>
                
                
                    <button type="submit" name="btn-update-product" id="btn-submit">Cập nhật</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>