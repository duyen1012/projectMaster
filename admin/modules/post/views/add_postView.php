<?php
get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">THÊM TRANG</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="post_id" id="post_id">

                        <label for="post_cat_id" style="margin-right: 1500px;">Post_cat_id</label>
                        <input type="text" name="post_cat_id" id="post_cat_id">
                        <?php echo form_error('post_cat_id'); ?>

                        <label for="post_name" style="margin-right: 1500px;">Post_name</label>
                        <input type="text" name="post_name" id="post_name">
                        <?php echo form_error('post_name'); ?>

                        <label for="post_title" style="margin-right: 1500px;">Post_title</label>
                        <input type="text" name="post_title" id="post_title">
                        <?php echo form_error('post_title'); ?>

                       

                        <button type="submit" name="btn-add-post" id="btn-submit">Thêm mới</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>