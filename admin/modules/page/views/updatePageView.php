<?php
get_header();
?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
           
            <h3 id="index" class="fl-left">CẬP NHẬT TRANG</h3>
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
                    <input type="hidden" name="id" value="<?php echo  $info_page['id'] ?>" />
                        <label for="page_name" >Page_name </label>
                     
                        <input type="text" name="page_name" id="page_name"  value="<?php echo  $info_page['page_name'] ?>">
                        <!-- <?php echo form_error('page_name');?> -->

                        <label for="friendly_url">friendly_url</label>
                        <input type="text" name="friendly_url" id="friendly_url"  value="<?php echo  $info_page['friendly_url'] ?>">
                        <?php echo form_error('friendly_url');?>

                        <label for="creator">creator</label>
                        <input type="text" name="creator" id="creator"  value="<?php echo  $info_page['creator'] ?>">
                        <?php echo form_error('creator');?>

                        <label for="date_created">date_created</label>
                        <input type="date" name="date_created" id="date_created" value="<?php echo  $info_page['date_created'] ?>">
                        <?php echo form_error('date_created');?>

                        
                        <button type="submit" name="btn-update-page" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?> 