<?php
get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">THÊM SLIDER</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_slider" id="id_slider">
                        <label for="slider_img" style="margin-right: 1500px;">Slider_img</label>
                        <input type="text" name="slider_img" id="slider_img">
                        <?php echo form_error('slider_img'); ?>

                        <label for="link" style="margin-right: 1500px;">Link</label>
                        <input type="text" name="link" id="link">
                        <?php echo form_error('link'); ?>

                        <label for="number_order" style="margin-right: 1500px;">Number_order</label>
                        <input type="text" name="number_order" id="number_order">
                        <?php echo form_error('number_order'); ?>

                        <label for="creator" style="margin-right: 1500px;">Creator</label>
                        <input type="text" name="creator" id="creator">
                        <?php echo form_error('creator'); ?>

                        <label for="date_created" style="margin-right: 1500px;">Date_created</label>
                        <input type="date" name="date_created" id="date_created">
                        <?php echo form_error('date_created'); ?>

                        <label for="status" style="margin-right: 1500px;">Status</label>
                        <input type="text" name="status" id="status">
                        <?php echo form_error('status'); ?>
                        <button type="submit" name="btn-add-slider" id="btn-submit">Thêm mới</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>