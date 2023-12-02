<?php
get_header();
$list_admin = db_fetch_array("SELECT * FROM `tbl_order_detail`");
// show_array($list_admin);
#số bản ghi 
$number_page = 10;
#tổng số bản ghi
$total_rơw = db_num_rows("SELECT * FROM `tbl_order_detail`");
#só trang 
$num_page = ceil($total_rơw / $number_page);
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
#trang bắt đâu
$start = ($page - 1) * $number_page;
$id = $_GET['id_order'];
$list_admin = get_list_orderdetail($start, $number_page, "id_order = ".$id);


?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">DANH SÁCH CHI TIẾT ĐƠN HÀNG</h3>
                 
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">

                        <table class="table list-table-wp">
                            <thead>
                                <tr>

                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Quantity_order</span></td>
                                    <td><span class="thead-text">unit_prices</span></td>
                                    <td><span class="thead-text">order_detail_status</span></td>
                                    <td><span class="thead-text">date_created</span></td>
                                    

                                    
                                </tr>
                            </thead>
                            <?php
                            $temp = 0;
                            foreach ($list_admin as $de) {
                                $temp++;
                                ?>
                                <tbody>
                                    <tr>

                                        <td><span class="tbody-text">
                                                <?php echo $temp; ?>
                                                </h3>
                                            </span></td>

                                
                                            <td><span class="tbody-text">
                                                <?php echo $de['quantity_order'] ?>
                                            </span></td>
                                        <td><span class="tbody-text">
                                                <?php echo currency_format($de['unit_prices']) ?>
                                            </span></td>
                                       
                                        <td><span class="tbody-text">
                                                <?php echo $de['order_detail_status'] ?>
                                            </span></td>
                                            <td><span class="tbody-text">
                                                <?php echo $de['date_created'] ?>
                                            </span></td>
                                    
                                       
                                       
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