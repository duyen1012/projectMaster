<?php
function get_detail_product($id_product)
{
    $item = db_fetch_row("SELECT *  FROM `tbl_product` WHERE `id_product` = '{$id_product}'");
    if (!empty($item))
        return $item;
}

function currency_format($number, $unit = 'đ')
{
    return number_format($number) . $unit;
}

function get_product($start = 1, $num_per_page = 10, $where = "")
{
    if (!empty($where))
        $where = "WHERE {$where}";
    $list_product = db_fetch_array("SELECT * FROM `tbl_product` {$where} LIMIT {$start}, {$num_per_page}");
    return $list_product;
}

function get_productList($id)
{
    $list_product = db_fetch_array("SELECT * FROM `tbl_product` where id_product_cat=" . $id);
    return $list_product;
}

function get_product_by_id($id_product)
{
    global $list_product;
    if (array_key_exists($id_product, $list_product)) {
        $list_product[$id_product]['url_add_cart'] = "?mod=cart&act=cart&id={$id_product}";
        // $list_product[$id_product]['url'] = "?mod=product&act=detail&id={$id_product}";

        return $list_product[$id_product];
    }
    return FALSE;
}

function add_cart($id)
{
    #Thêm thông tin vào giỏ hàng
    $item = get_detail_product($id);
    $qty = 1;
   
    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        $qty = $_SESSION['cart']['buy'][$id]['qty']+1;
        echo "<script type='text/javascript'>alert(".$_SESSION['cart']['buy'][$id]['qty'].");</script>";
  
    }
   
    $_SESSION['cart']['buy'][$id] = array(
        'id_product' => $item['id_product'],
        'id_product_cat' => $item['id_product_cat'],

        'product_name' => $item['product_name'],
        'product_title' => $item['product_title'],
        'prices' => $item['prices'],
        'product_desc' => $item['product_desc'],
        'images' => $item['images'],
        'product_content' => $item['product_content'],
        'qty' => $qty,
        'sub_total' => $item['prices'] * $qty,
    );
    update_info_cart();

}

function get_list_by_cart()
{
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart']['buy'] as &$item) {
            $item['url_delete_cart'] = "?mod=cart&act=delete&id={$item['id']}";
        }
        return $_SESSION['cart']['buy'];
    }
    return false;
}



function update_info_cart()
{
    if (isset($_SESSION['cart'])) {
        #Lưu trữ thông tin tổng kết đơn hàng
        $num_order = 0;
        $total = 0;
        //&: tham trị dùng dể cập nhật lại khi thay đổi
        foreach ($_SESSION['cart']['buy'] as &$item) {
            $num_order += $item['qty'];
            $total += $item['sub_total'];
        }
        $_SESSION['cart']['info'] = array(
            'num_order' => $num_order,
            'total' => $total
        );
    }
}

function update_cart($qty)
{
    foreach ($qty as $id => $new_qty) {
        $_SESSION['cart']['buy'][$id]['qty'] = $new_qty;
        $_SESSION['cart']['buy'][$id]['sub_total'] = $new_qty * $_SESSION['cart']['buy'][$id]['prices'];
    }
    update_info_cart();
}

function delete_cart($id)
{
    if (isset($_SESSION['cart'])) {
        #Xóa sản phẩm có $id trong giỏ hàng
        if (!empty($id)) {
            unset($_SESSION['cart']['buy'][$id]);
            update_info_cart();
        } else {
            unset($_SESSION['cart']);
        }
    }

}

function get_total_cart()
{
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['info']['total'];

    }
    return FALSE;
}

function get_list_buy_cart()
{
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart']['buy'] as &$item) {
            $item['url_delete_cart'] = "?mod=cart&controller=index&id_product={$item['id_product']}";
        }
        return $_SESSION['cart']['buy'];
    }
    return FALSE;
}
function redirects($url = 'page=home')
{
    global $list_product;
    if (!empty($url)) {
        header("Location: {$url}");
    }
}

function get_checkout($start = 1, $num_per_page = 10, $where = "")
{
    if (!empty($where))
        $where = "WHERE {$where}";
    $list_page = db_fetch_array("SELECT * FROM `tbl_checkout` {$where} LIMIT {$start}, {$num_per_page}");
    return $list_page;
}



?>