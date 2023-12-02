<?php

// function get_list_users() {
//     $result = db_fetch_array("SELECT * FROM `tbl_user`");
//     return $result;
// }

// function get_user_by_id($id) {
//     $item = db_fetch_row("SELECT * FROM `tbl_user` WHERE `user_id` = {$id}");
//     return $item;
// }

function get_info_cat($id_product_cat) {
    $item = db_fetch_row("SELECT `id_product_cat`,`name_product_cat`  WHERE `id_product_cat` = {$id_product_cat}");
    return $item;
}

function get_list_product($id_product) {
    $item = db_fetch_row("SELECT `id_product`,`product_name`,`prices_new`,`prices_old`  WHERE `id_product` = {$id_product}");
    return $item;
}

function get_product($start = 1, $num_per_page = 10, $where = "") {
    if (!empty($where))
        $where = "WHERE {$where}";
    // $sql = "SELECT * FROM `tbl_product` {$where} LIMIT {$start}, {$num_per_page}";
    // echo $sql; die;

    $list_product = db_fetch_array("SELECT * FROM `tbl_product` {$where} LIMIT {$start}, {$num_per_page}");
    return $list_product;
}
//thêm 2 hàm 
function get_catList() {
    $list_product = db_fetch_array("SELECT id_product_cat, name_product_cat FROM `tbl_product_cat`");
    return $list_product;
}
function get_productList($id, $keyword = "") {
    if (empty($keyword)) {
        $list_product = db_fetch_array("SELECT * FROM `tbl_product` where id_product_cat=".$id );
    } else {
        $list_product = db_fetch_array("SELECT * FROM `tbl_product` where id_product_cat=$id AND product_name LIKE '%$keyword%'" );
    }
        
    return $list_product;
}

function get_total_cart() {
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['info']['total'];
        
    }
    return FALSE;
}


function currency_formats($number,$unit = ' đ'){
    return number_format($number).$unit;
}
