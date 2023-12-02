<?php

function get_list_users() {
    $result = db_fetch_array("SELECT * FROM `tbl_user`");
    return $result;
}

function get_user_by_id($id) {
    $item = db_fetch_row("SELECT * FROM `tbl_user` WHERE `user_id` = {$id}");
    return $item;
}

function get_list_order($start = 1, $num_per_page = 10, $where = "") {
    if (!empty($where))
        $where = "WHERE {$where}";
    $list_list_order = db_fetch_array("SELECT * FROM `tbl_list_order` {$where} LIMIT {$start}, {$num_per_page}");
    return $list_list_order;
}