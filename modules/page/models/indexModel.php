<?php


function get_product($start = 1, $num_per_page = 10, $where = "") {
    if (!empty($where))
        $where = "WHERE {$where}";
    // $sql = "SELECT * FROM `tbl_product` {$where} LIMIT {$start}, {$num_per_page}";
    // echo $sql; die;

    $list_product = db_fetch_array("SELECT * FROM `tbl_product` {$where} LIMIT {$start}, {$num_per_page}");
    return $list_product;
}

function get_catList() {
    $list_product = db_fetch_array("SELECT id_product_cat, name_product_cat FROM `tbl_product_cat`");
    return $list_product;
}



?>