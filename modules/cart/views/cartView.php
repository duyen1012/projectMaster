<?php
get_header();
function sessionToCartArray()
{
    $cartArray = array();

    if (isset($_SESSION['cart']) && isset($_SESSION['cart']['buy'])) {
        foreach ($_SESSION['cart']['buy'] as $id => $item) {
            $cartArray[] = array(
                'id_product' => $item['id_product'],
                'id_product_cat' => $item['id_product_cat'],
         
                'product_name' => $item['product_name'],
                'product_title' => $item['product_title'],
                'prices' => $item['prices'],
                'product_desc' => $item['product_desc'],
                'images' => $item['images'],
                'product_content' => $item['product_content'],
                'qty' => $item['qty'],
                'sub_total' => $item['sub_total'],
            );
        }
    }

    return $cartArray;
}

$cartItems = sessionToCartArray();
// var_dump($_SESSION);
// var_dump($cartItems);die;
?>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Sản phẩm làm đẹp da</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <form action="?mod=cart&controller=index&action=update" method="post">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td>Ảnh sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá sản phẩm</td>
                                <td>Số lượng</td>
                                <td colspan="2">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cartItems as $item): ?>
                                <tr>
                                    <td>
                                        <?php echo $item['id_product']; ?>
                                    </td>
                                    <td>
                                        <a href="" title="" class="thumb">
                                            <img src="<?php echo $item['images']; ?>" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="" title="" class="name-product">
                                            <?php echo $item['product_name']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo currency_format($item['prices']); ?>
                                    </td>
                                    <td>
                                        <input type="number" min="1" max="10" data-id="<?php echo $item['id_product']; ?>"
                                            name="qty[<?php echo $item['id_product']; ?>]" value="<?php echo $item['qty'] ?>"
                                            class="num-order">
                                    </td>
                                    <td id="sub-total-<?php echo $item['id_product'] ?>">
                                        <?php echo currency_format($item['sub_total']); ?>
                                    </td>
                                    <td>
                                        <a href="?mod=cart&controller=index&action=delete&id_product=<?php echo $item['id_product'] ?>"
                                            title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <p id="total-price" class="fl-right">Tổng giá: <span>
                                                <?php echo currency_format(get_total_cart()) ?>
                                            </span></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <div class="fl-right">

                                            <input type="submit" id="update-cart" name="btn_update_cart"
                                                value="Cập nhật giỏ hàng">
                                            <a href="?mod=cart&action=checkout" title="" id="checkout-cart">Thanh
                                                Toán</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng
                    <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a href="?page=home" title="" id="buy-more">Mua tiếp</a><br />
                <a href="?mod=cart&controller=index&action=delete_all" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.num-order').on('change', function () {
            var $id = $(this).data('id'); // Lấy id từ thuộc tính data-id
            var $qty = $(this).val(); // Lấy số lượng mới từ trường số lượng


            var data = { id_product: $id, qty: $qty }
            debugger;
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
    });

</script>
<?php

get_footer();
?>