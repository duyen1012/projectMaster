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
                        <input type="hidden" name="id" id="id">
                        <label for="page_name" style="margin-right: 1500px;">Page_Name</label>
                        <input type="text" name="page_name" id="page_name">
                        <?php echo form_error('page_name'); ?>

                        <label for="friendly_url" style="margin-right: 1500px;">Friendly_Url</label>
                        <input type="text" name="friendly_url" id="friendly_url">
                        <?php echo form_error('friendly_url'); ?>

                        <label for="creator" style="margin-right: 1500px;">Creator</label>
                        <input type="text" name="creator" id="creator">

                        <?php echo form_error('creator'); ?>

                        <label for="date_created" style="margin-right: 1500px;">Date_Created</label>
                        <input type="date" name="date_created" id="date_created">
                        <?php echo form_error('date_created'); ?>

                        <button type="submit" name="btn-add-page" id="btn-submit">Thêm mới</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>