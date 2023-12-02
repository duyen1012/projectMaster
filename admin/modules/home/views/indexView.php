<?php
get_header();
$list_admin = db_fetch_array("SELECT * FROM `tbl_list_order`");
// show_array($list_admin);
#số bản ghi 
$number_page = 10;
#tổng số bản ghi
$total_rơw = db_num_rows("SELECT * FROM `tbl_list_order`");
#só trang 
$num_page = ceil($total_rơw / $number_page);
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
#trang bắt đâu
$start = ($page - 1) * $number_page;
$list_admin = get_list_order($start, $number_page, "");

?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">DANH SÁCH ĐƠN HÀNG</h3>
                    <!-- <a href="?mod=page&controller=product&action=add_order" title="" id="add-new"
                        class="fl-left">Thêm
                        mới</a> -->
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">

                        <table class="table list-table-wp">
                            <thead>
                                <tr>

                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Order_name</span></td>
                                    <td><span class="thead-text">Code_order</span></td>
                                    <td><span class="thead-text">Product_number</span></td>
                                    <td><span class="thead-text">Total_price</span></td>
                                    <td><span class="thead-text">Order_date</span></td>
                                    <td><span class="thead-text">Order_status</span></td>
                                    <td><span class="thead-text">Order_detail</span></td>

                                    
                                </tr>
                            </thead>
                            <?php
                            $temp = 0;
                            foreach ($list_admin as $or) {
                                $temp++;
                                ?>
                                <tbody>
                                    <tr>

                                        <td><span class="tbody-text">
                                                <?php echo $temp; ?>
                                                </h3>
                                            </span></td>

                                    
                                        <td><span class="tbody-text">
                                                <?php echo $or['order_name'] ?>
                                            </span></td>
                                        <td><span class="creator">
                                                <?php echo $or['code_order'] ?>
                                            </span></td>
                                      
                                            <td><span class="tbody-text">
                                                <?php echo $or['product_number'] ?>
                                            </span></td>
                                        <td><span class="tbody-text">
                                                <?php echo currency_format($or['total_price']) ?>
                                            </span></td>
                                       
                                        <td><span class="tbody-text">
                                                <?php echo $or['order_date'] ?>
                                            </span></td>
                                            <td><span class="tbody-text">
                                                <?php echo $or['order_status'] ?>
                                            </span></td>
                                            <td><span class="tbody-text">
                                                <?php echo $or['order_detail'] ?>
                                            </span></td>
                                       
                                        <!-- <td class="clearfix">
                                            <ul class="list-operation fl-right">
                                                <li><a href="?mod=page&controller=product&action=orderdetail&id_order=<?php echo $or['id_order'] ?>" title="detail" class="detail"><i class="fa fa-eye"
                                                            aria-hidden="true"></i></a></li>
                                               <li><a href="?mod=page&controller=product&action=updateOrder&id_order=<?php echo $or['id_order'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i></a></li>
                                                <li><a href="?mod=page&controller=product&action=deleteOrder&id_order=<?php echo $or['id_order'] ?> "
                                                        title="Xóa" class="delete"><i class="fa fa-trash"
                                                            aria-hidden="true"></i></a>
                                            </ul>
                                        </td> -->
                                    </tr>

                                </tbody>
                                <?php
                            }
                            ?>

                        </table>


                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title="">
                                << /a>
                        </li>
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                        <li>
                            <a href="" title="">></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>