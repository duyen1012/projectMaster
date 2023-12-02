<?php

ob_start();
get_header();

#số bản ghi 
$number_page = 10;
#tổng số bản ghi
$total_rơw = db_num_rows("SELECT * FROM `tbl_product`");
#só trang 
$num_page = ceil($total_rơw / $number_page);
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

#tim kiem
$keyword = '';
if(isset($_GET['s'])) {
    $keyword = $_GET['s'];
}

#trang bắt đâu
$start = ($page - 1) * $number_page;
if(empty($keyword)) {
    $list_admin = get_product($start, $number_page, "");
} else {
    $list_admin = get_product($start, $number_page, "product_name LIKE '%$keyword%'");
}
$info_cat = get_catList();

?>
<div id="content">
    <div id="main-content-wp" class="home-page clearfix">
        <div class="wp-inner">
            <div class="main-content fl-right">
                <div class="section" id="slider-wp">
                    <div class="section-detail">
                        <div class="item">
                            <img src="public/images/slider-01.png" alt="">
                        </div>

                    </div>
                </div>
                <div class="section" id="support-wp">
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <li>
                                <div class="thumb">
                                    <img src="public/images/icon-1.png">
                                </div>
                                <h3 class="title">Miễn phí vận chuyển</h3>
                                <p class="desc">Tới tận tay khách hàng</p>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="section" id="feature-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Sản phẩm nổi bật</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">
                            <li>
                                <a href="?page=detail_product" title="" class="thumb">
                                    <img src="public/images/img-pro-05.png">
                                </a>
                                <a href="?page=detail_product" title="" class="product-name">Laptop Lenovo IdeaPad
                                    120S</a>
                                <div class="price">
                                    <span class="new">5.190.000đ</span>
                                    <span class="old">6.190.000đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?id=2" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?page=checkout" title="" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

                <!-- sửa ở đây  -->
                <?php foreach ($info_cat as $cat) { ?>
                    <div class="section" id="list-product-wp">
                        <div class="section-head">
                            <h3 class="section-title">
                                <?php echo ($cat['name_product_cat']); ?>
                            </h3>
                        </div>

                        <div class="section-detail">
                            <ul class="list-item clearfix">
                                <?php foreach (get_productList($cat['id_product_cat'], $keyword) as $list_item) { ?>
                                    <li>
                                        <a href="?mod=cart&action=detail_product&id=<?php echo $list_item['id_product'] ?>"
                                            title="" class="thumb">
                                            <img src="<?php echo $list_item['images'] ?>">
                                        </a>
                                        <a href="?page=detail_product" title="" class="product-name">
                                            <?php echo $list_item['product_name'] ?>
                                        </a>
                                        <div class="action clearfix">
                                            <a href="?mod=cart&controller=index&action=add_cart&id_product=<?php echo $list_item['id_product'] ?>" data-href="?mod=cart&controller=index&action=add_cart&id_product=<?php echo $list_item['id_product'] ?>"
                                                title="Thêm giỏ hàng" class="add-cart fl-left themgiohang"
                                                data-id_product="<?php echo $list_item['id_product']; ?>">Thêm giỏ
                                                hàng</a>
                                            <a href="?mod=cart&action=cart" title="Mua ngay" class="buy-now fl-right">Mua
                                                ngay</a>
                                        </div>
                                    </li>
                                <?php } ?>
                        </div>

                    </div>
                <?php } ?>
            </div>
            <div class="sidebar fl-left">
                <div class="section" id="category-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Danh mục sản phẩm</h3>
                    </div>
                    <div class="secion-detail">
                        <ul class="list-item">
                            <li>
                                <a href="?mod=page&action=category_product" title="">Điện thoại</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?page=category_product" title="">Iphone</a>
                                    </li>
                                    <li>
                                        <a href="?page=category_product" title="">Samsung</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="?page=category_product" title="">Iphone X</a>
                                            </li>
                                            <li>
                                                <a href="?page=category_product" title="">Iphone 8</a>
                                            </li>
                                            <li>
                                                <a href="?page=category_product" title="">Iphone 8 Plus</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="?page=category_product" title="">Oppo</a>
                                    </li>
                                    <li>
                                        <a href="?page=category_product" title="">Bphone</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="?mod=page&action=category_product" title="">laptop</a>
                            </li>
                            <li>

                        </ul>
                    </div>
                </div>
                <div class="section" id="selling-wp">
                    <div class="section-head">
                        <h3 class="section-title">Sản phẩm bán chạy</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">
                            <li class="clearfix">
                                <a href="?page=detail_product" title="" class="thumb fl-left">
                                    <img src="public/images/img-pro-13.png" alt="">
                                </a>
                                <div class="info fl-right">
                                    <a href="?page=detail_product" title="" class="product-name">Laptop Asus A540UP
                                        I5</a>
                                    <div class="price">
                                        <span class="new">5.190.000đ</span>
                                        <span class="old">7.190.000đ</span>
                                    </div>
                                    <a href="" title="" class="buy-now">Mua ngay</a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="section" id="banner-wp">
                    <div class="section-detail">
                        <a href="" title="" class="thumb">
                            <img src="public/images/banner.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.add-cart fl-left').on('change', function () {
            var $id = $(this).data('id'); // Lấy id từ thuộc tính data-id
            var $qty = $(this).val(); // Lấy số lượng mới từ trường số lượng


            var data = { id_product: $id, qty: $qty }

            $.ajax({
                url: '?mod=cart&controller=index&action=update_ajax', //Trang xử lý, mặc định trang hiện tại
                method: 'POST', // Post hoặt Get, mặc định Get
                data: data, // Dữ liệu truyền lên sever
                dataType: 'json', //html,text,script hoặc json
                success: function (data) {
                    $("#sub-total-" + $id).text(data.sub_total);
                    $("#total-price span").text(data.total);
                    console.log(data.sub_total);


                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                }
            });
        });

        // $('.themgiohang').on('click', function() {
        //     var url = $(this).data('href');

        //     $.ajax({
        //         url: url, //Trang xử lý, mặc định trang hiện tại
        //         method: 'GET', // Post hoặt Get, mặc định Get
        //         success: function (data) {
        //             console.log(data);
                   
        //         },
        //         error: function (xhr, ajaxOptions, thrownError) {
        //             console.log(xhr.status);
        //             console.log(thrownError);
        //         }
        //     });
      //  });
    });

</script>

<?php
get_footer();
?>