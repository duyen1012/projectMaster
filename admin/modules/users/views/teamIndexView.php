<?php
get_header();
$list_admin = db_fetch_array("SELECT * FROM `tbl_users`");
// show_array($list_admin);
#số bản ghi 
$number_page = 10;
#tổng số bản ghi
$total_rơw = db_num_rows("SELECT * FROM `tbl_users`");
#só trang 
$num_page = ceil($total_rơw / $number_page);
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
#trang bắt đâu
$start = ($page - 1) * $number_page;
$list_admin = get_users($start, $number_page, "");
?>
<div id="main-content-wp" class="list-post-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=users&controller=team&action=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Danh sách Quản trị</h3>

        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('users') ?>
        <div id="content" class="fl-right">

            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(10)</span></a> |</li>
                            <li class="publish"><a href="">Đã đăng <span class="count">(5)</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt <span class="count">(5)</span></a></li>
                            <li class="trash"><a href="">Thùng rác <span class="count">(0)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Chỉnh sửa</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Ảnh đại diện</span></td>
                                    <td><span class="thead-text">Tên đăng nhập</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Địa chỉ</span></td>
                                    <td><span class="thead-text">Ngày đăng ký</span></td>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $temp = 0;
                                foreach ($list_admin as $admin) {
                                    $temp++;
                                    ?>


                                    <tr>
                                        <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                        <td><span class="tbody-text">
                                                <?php echo $temp ?>
                                                </h3>
                                            </span>
                                        <td class="clearfix">
                                            <div class="tb-img fl-left">
                                                <img src="<?php if (!empty($admin['file']))
                                                    echo $admin['file']; ?>" alt=""
                                                    class="thumb-admin">
                                            </div>
                        </div>
                        <ul class="list-operation fl-right">
                            <li><a href="?mod=users&controller=team&action=update&id=<?php echo $admin['user_id']?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                            <li><a href="?mod=users&controller=team&action=delete&id=<?php echo $admin['user_id']?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                        </td>
                        <td><span class="tbody-text">
                                <?php echo $admin['username']; ?>
                            </span></td>
                        <td><span class="tbody-text">
                                <?php echo $admin['fullname']; ?>
                            </span></td>
                        <td><span class="tbody-text">
                                <?php echo $admin['email']; ?>
                            </span></td>
                        <td><span class="tbody-text">
                                <?php echo $admin['address']; ?>
                            </span></td>
                        <td><span class="tbody-text">
                                <?php echo date("Y-m-d H:i:s", strtotime($admin['created_date'])); ?>
                            </span></td>
                            
                        </tr>
                        <?php
                                }
                                ?>

                    </table>
                </div>

            </div>
        </div>
        <div class="section" id="paging-wp">
            <div class="section-detail clearfix">
                <?php echo get_pagging($num_page, $page, "?mod=users&controller=team&action=index") ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php
get_footer();
?>