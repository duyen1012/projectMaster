<?php
get_header();
$list_admin = db_fetch_array("SELECT * FROM `tbl_list_customer`");
// show_array($list_admin);
#số bản ghi 
$number_page = 10;
#tổng số bản ghi
$total_rơw = db_num_rows("SELECT * FROM `tbl_list_customer`");
#só trang 
$num_page = ceil($total_rơw / $number_page);
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
#trang bắt đâu
$start = ($page - 1) * $number_page;
$list_admin = get_list_customer($start, $number_page, "");

?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">DANH SÁCH KHÁCH HÀNG</h3>
                    <a href="?mod=page&controller=product&action=add_customer" title="" id="add-new" class="fl-left">Thêm
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
                                    <th><span class="thead-text">Customer_Name</span></th>
                                    <th><span class="thead-text">Phone</span></th>
                                    <th><span class="thead-text">Address</span></th>
                                    <th><span class="thead-text">Email</span></th>
                                    <th><span class="thead-text">Time</span></th>
                                    <th><span class="thead-text"></span></th>


                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $temp = 0;
                                foreach ($list_admin as $cr) {
                                    $temp++;
                                    ?>

                                    <tr>

                                        <td><span class="tbody-text">
                                                <?php echo $temp; ?>
                                                </h3>
                                            </span></td>

                                        <td><span class="tbody-text">
                                                <?php echo $cr['fullname'] ?>
                                            </span></td>
                                        <td><span class="tbody-text">
                                                <?php echo $cr['phone_number'] ?>
                                            </span></td>
                                        <td><span class="tbody-text">
                                                <?php echo $cr['address'] ?>
                                            </span></td>
                                        <td><span class="creator">
                                                <?php echo $cr['email'] ?>
                                            </span></td>
                                        <td><span class="tbody-text">
                                                <?php echo $cr['date_created'] ?>
                                            </span></td>

                                        <td class="clearfix">
                                            <ul class="list-operation fl-right">
                                                <li><a href="?mod=page&controller=product&action=updateCustomer&id_customer=<?php echo $cr['id_customer'] ?>"
                                                        title="Sửa" class="edit"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i></a></li>
                                                <li><a href="?mod=page&controller=product&action=deleteCustomer&id_customer=<?php echo $cr['id_customer'] ?> "
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