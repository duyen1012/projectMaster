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
?>
<div id="main-content-wp" class="checkout-page ">
    <div class="wp-inner clearfix">
        <div id="sidebar" class="fl-left">
            <div id="main-menu-wp">
                <ul class="list-item">
                    <li class="active">
                        <a href="?page=home" title="Trang chủ">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?page=detail_news" title="Giới thiệu">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title="">Laptop</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title="">Điện thoại</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title="">Máy tính bảng</a>
                    </li>
                    <li>
                        <a href="?page=detail_news" title="Liên hệ">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="content" class="fl-right">
            <a href="?mod=users&controller=index&action=login">Đăng nhập</a>
            <div class="section" id="checkout-wp">
                <div class="section-head">
                    <h3 class="section-title">Thanh toán</h3>
                </div>
                <div class="section-detail">
                    <div class="wrap clearfix">
                        <form method="POST">
                            <div id="custom-info-wp" class="fl-left">
                                <h3 class="title">Thông tin khách hàng</h3>
                                <div class="detail">
                                    <div class="field-wp">
                                        <label>Họ tên</label>
                                        <input type="text" name="fullname" id="fullname">
                                        <?php echo form_error('fullname'); ?>
                                    </div>
                                    <div class="field-wp">
                                        <label>Email</label>
                                        <input type="email" name="email" id="email">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                    <div class="field-wp">
                                        <label>Địa chỉ nhận hàng</label>
                                        <input type="text" name="address" id="address">
                                        <?php echo form_error('address'); ?>
                                    </div>
                                    <div class="field-wp">
                                        <label>Số điện thoại</label>
                                        <input type="tel" name="phone_number" id="phone_number">
                                        <?php echo form_error('phone_number'); ?>
                                    </div>
                                    <div class="field-full-wp">
                                        <label>Ghi chú</label>
                                        <textarea name="note"></textarea>
                                        <?php echo form_error('note'); ?>
                                    </div>

                                </div>
                            </div>
                            <div id="order-review-wp" class="fl-right">
                                <h3 class="title">Thông tin đơn hàng</h3>
                                <div class="detail">
                                    <table class="shop-table">

                                        <thead>
                                            <tr>
                                                <td>Sản phẩm</td>
                                                <td>Tổng</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            foreach ($cartItems as $tt) {

                                                ?>
                                                <tr class="cart-item">
                                                    <td class="product-name">
                                                        <?php echo $tt['product_name']; ?><strong class="product-quantity">
                                                            <?php echo $tt['qty'] ?>
                                                        </strong>
                                                    </td>
                                                    <td id="sub-total-<?php echo $tt['id_product'] ?>">
                                                        <?php echo currency_format($tt['sub_total']); ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="order-total">
                                                <td>Tổng đơn hàng:</td>
                                                <td><strong class="total-price">
                                                        <?php echo currency_format(get_total_cart()) ?>
                                                    </strong></td>
                                            </tr>
                                        </tfoot>


                                    </table>
                                    <div id="payment-checkout-wp">
                                        <ul id="payment_methods">
                                            <li>
                                                <input type="radio" checked="checked" id="direct-payment"
                                                    name="payment-method" value="direct-payment">
                                                <label for="direct-payment">Thanh toán tại cửa hàng</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="payment-home" name="payment-method"
                                                    value="payment-home">
                                                <label for="payment-home">Thanh toán tại nhà</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="place-order-wp clearfix">
                                        <button type="submit" name="checkout">Đặt hàng</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>