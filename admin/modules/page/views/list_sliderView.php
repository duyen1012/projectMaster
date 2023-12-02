<?php
get_header();
$list_admin = db_fetch_array("SELECT * FROM `tbl_sliders`");
// show_array($list_admin);
#số bản ghi 
$number_page = 10;
#tổng số bản ghi
$total_rơw = db_num_rows("SELECT * FROM `tbl_sliders`");
#só trang 
$num_page = ceil($total_rơw / $number_page);
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
#trang bắt đâu
$start = ($page - 1) * $number_page;
$list_admin = get_slider($start, $number_page, "");

?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">DANH SÁCH SLIDER</h3>
                    <a href="?mod=page&controller=product&action=add_slider" title="" id="add-new" class="fl-left">Thêm
                        mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th><span class="thead-text">STT</span></th>
                                    <th><span class="thead-text">Slider_img</span></th>
                                    <th><span class="thead-text">Link</span></th>
                                    <th><span class="thead-text">Number_order</span></th>
                                    <th><span class="thead-text">Creator</span></th>
                                    <th><span class="thead-text">Date_created</span></th>
                                    <th><span class="thead-text">Status</span></th>
                                    <th><span class="thead-text"></span></th>


                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $temp = 0;
                                foreach ($list_admin as $sl) {
                                    $temp++;
                                    ?>

                                    <tr>

                                        <td><span class="tbody-text">
                                                <?php echo $temp; ?>

                                            </span></td>

                                        <td><span class="slider_img">
                                                <?php echo $sl['slider_img'] ?>
                                            </span></td>
                                        <td><span class="tbody-text">
                                                <a href="<?php echo $sl['link'] ?>">
                                                    <?php echo $sl['link'] ?>
                                                </a>
                                            </span></td>
                                        <td><span class="number_order">
                                                <?php echo $sl['number_order'] ?>
                                            </span></td>
                                        <td><span class="creator">
                                                <?php echo $sl['creator'] ?>
                                            </span></td>
                                            
                                        <td><span class="date_created">
                                                <?php echo $sl['date_created'] ?>
                                            </span></td>
                                        <td><span class="status">
                                                <?php echo $sl['status'] ?>
                                            </span></td>

                                        <td class="clearfix">
                                            <ul class="list-operation fl-right">
                                                <li><a href="?mod=page&controller=product&action=updatePage&id=<?php echo $sl['id_slider '] ?>"
                                                        title="Sửa" class="edit"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i></a></li>
                                                <li><a href="?mod=page&controller=product&action=deletePage&id=<?php echo $sl['id_slider '] ?>"
                                                        title="Xóa" class="delete"><i class="fa fa-trash"
                                                            aria-hidden="true"></i></a>
                                            </ul>
                                        </td>
                                    </tr>


                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>



                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
get_footer();
?>