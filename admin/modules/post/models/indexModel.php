<?php

function get_list_users() {
    $result = db_fetch_array("SELECT * FROM `tbl_user`");
    return $result;
}

function get_user_by_id($id) {
    $item = db_fetch_row("SELECT * FROM `tbl_user` WHERE `user_id` = {$id}");
    return $item;
}
function get_post($start = 1, $num_per_page = 10, $where = "") {
    if (!empty($where))
        $where = "WHERE {$where}";
    $list_post = db_fetch_array("SELECT * FROM `tbl_post` {$where} LIMIT {$start}, {$num_per_page}");
    return $list_post;
}

function add_post($data) {
    return db_insert('tbl_post', $data);
}

function get_code_by_post($post_id){
   
    $item = db_fetch_row("SELECT * FROM `tbl_post` WHERE `post_id` = '{$post_id}'");
    if(!empty($item))
    return $item;
}

function update_post($post_id, $data){
    db_update('tbl_post' , $data, "`post_id` = '{$post_id}'");
}

function updatePost($post_id, $data) {
    update_post($post_id, $data);
}

function deletePost($post_id){
    //var_dump($id);die;
    db_delete('tbl_post', "`post_id` = '{$post_id}'");
}

function get_post_cat($start = 1, $num_per_page = 10, $where = "") {
    if (!empty($where))
        $where = "WHERE {$where}";
    $list_category = db_fetch_array("SELECT * FROM `tbl_post_cat` {$where} LIMIT {$start}, {$num_per_page}");
    return $list_category;
}