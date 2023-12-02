<?php

function get_product_by_id($id) {
    global $list_product;
    if (array_key_exists($id, $list_product)) {
        $list_product[$id]['url_add_cart'] = "?mod=cart&act=add&id={$id}";
        $list_product[$id]['url'] = "?mod=product&act=detail&id={$id}";

        return $list_product[$id];
    }
    return FALSE;
}

function get_product($start = 1, $num_per_page = 10, $where = "") {
    if (!empty($where))
        $where = "WHERE {$where}";
    $list_product = db_fetch_array("SELECT * FROM `tbl_product` {$where} LIMIT {$start}, {$num_per_page}");
    return $list_product;
}

function get_product_cat($start = 1, $num_per_page = 10, $where = "") {
    if (!empty($where))
        $where = "WHERE {$where}";
    $list_product_cat = db_fetch_array("SELECT * FROM `tbl_product_cat` {$where} LIMIT {$start}, {$num_per_page}");
    return $list_product_cat;
}


function get_page($start = 1, $num_per_page = 10, $where = "") {
    if (!empty($where))
        $where = "WHERE {$where}";
    $list_page = db_fetch_array("SELECT * FROM `tbl_page` {$where} LIMIT {$start}, {$num_per_page}");
    return $list_page;
}

function get_slider($start = 1, $num_per_page = 10, $where = "") {
    if (!empty($where))
        $where = "WHERE {$where}";
    $list_slider = db_fetch_array("SELECT * FROM `tbl_sliders` {$where} LIMIT {$start}, {$num_per_page}");
    return $list_slider;
}

function get_post($start = 1, $num_per_page = 10, $where = "") {
    if (!empty($where))
        $where = "WHERE {$where}";
    $list_post = db_fetch_array("SELECT * FROM `tbl_post` {$where} LIMIT {$start}, {$num_per_page}");
    return $list_post;
}

function get_list_order($start = 1, $num_per_page = 10, $where = "") {
    if (!empty($where))
        $where = "WHERE {$where}";
    $list_list_order = db_fetch_array("SELECT * FROM `tbl_list_order` {$where} LIMIT {$start}, {$num_per_page}");
    return $list_list_order;
}

function get_list_orderdetail($start, $num_per_page , $where = "") {
    if (!empty($where))
        $where = "WHERE {$where}";
       
    $list_list_order = db_fetch_array("SELECT * FROM `tbl_order_detail` {$where}  LIMIT {$start}, {$num_per_page}");
    return $list_list_order;
}

function get_list_customer($start, $num_per_page , $where) {
    if (!empty($where))
        $where = "WHERE {$where}";
    $list_list_order = db_fetch_array("SELECT * FROM `tbl_list_customer` {$where} LIMIT {$start}, {$num_per_page}");
    return $list_list_order;
}
function add_product($data) {
    
    return db_insert('tbl_product', $data);
}


function add_page($data) {
    return db_insert('tbl_page', $data);
}

function add_slider($data) {
    return db_insert('tbl_sliders', $data);
}

function add_post($data) {
    return db_insert('tbl_post', $data);
}

function add_orderdetail($data) {
    return db_insert(' tbl_order_detail', $data);
}
function add_customer($data) {
    return db_insert('tbl_list_customer', $data);
}

function add_order($data) {
    return db_insert('tbl_list_order', $data);
}

function get_code_by_product($id_product){
   
    $item = db_fetch_row("SELECT *  FROM `tbl_product` WHERE `id_product` = '{$id_product}'");
    if(!empty($item))
    return $item;
}



function get_code_by_page($id){
   
    $item = db_fetch_row("SELECT * FROM `tbl_page` WHERE `id` = '{$id}'");
    if(!empty($item))
    return $item;
}

function get_code_by_slider($id_slider){
   
    $item = db_fetch_row("SELECT * FROM `tbl_sliders` WHERE `id_slider` = '{$id_slider}'");
    if(!empty($item))
    return $item;
}


function get_code_by_customer($id_customer){
   
    $item = db_fetch_row("SELECT * FROM `tbl_list_customer` WHERE `id_customer` = '{$id_customer}'");
    if(!empty($item))
    return $item;
}

function get_code_by_order($id_order){
   
    $item = db_fetch_row("SELECT * FROM `tbl_list_order` WHERE `id_order` = '{$id_order}'");
    if(!empty($item))
    return $item;
}

function get_code_by_orderdetail($order_detail_id ){
   
    $item = db_fetch_row("SELECT * FROM `tbl_order_detail` WHERE `order_detail_id ` = '{$order_detail_id}'");
    if(!empty($item))
    return $item;
}


function get_code_by_post($post_id){
   
    $item = db_fetch_row("SELECT * FROM `tbl_post` WHERE `post_id` = '{$post_id}'");
    if(!empty($item))
    return $item;
}

function get_code_by_post_cat($post_cat_id){
   
    $item = db_fetch_row("SELECT * FROM `tbl_post_cat` WHERE `post_cat_id` = '{$post_cat_id}'");
    if(!empty($item))
    return $item;
}
function currency_format($number) {
    $floatNumber = floatval($number); // Chuyển đổi chuỗi thành số thực
    return number_format($floatNumber).'đ'; // Sử dụng hàm number_format() với số thực và kết hợp với ký tự 'đ'
  }
  


function info_user($label = 'id'){
    $user_login = $_SESSION['user_login'];
    $user = db_fetch_array("SELECT * FROM `tbl_product` WHERE `` = '{$user_login}'");
    return $user($label);
 }

function updateProduct($id_product, $data) {
    update_product($id_product, $data);
}

function updateCustomer($id_customer, $data) {
    update_customer($id_customer, $data);
}

function updatePage($id, $data) {
    update_page($id, $data);
}

function updateOrder($id_order, $data) {
    update_order($id_order, $data);
}

function updatePost($post_id, $data) {
    update_post($post_id, $data);
}

function deleteProduct($id_product){
    //var_dump($id);die;
    db_delete('tbl_product', "`id_product` = '{$id_product}'");
}

function deleteOrder($id_order){
    //var_dump($id);die;
    db_delete('tbl_list_order', "`id_order` = '{$id_order}'");
}

function deleteCustomer($id_customer){
    //var_dump($id);die;
    db_delete('tbl_list_customer', "`id_customer` = '{$id_customer}'");
}


function deletePage($id){
    
    db_delete('tbl_page', "`id` = '{$id}'");
}

function deleteListorder($id){
    db_delete('tbl_list_order', "`id` = '{$id}'");
}



function update_product($id_product, $data){
    db_update('tbl_product' , $data, "`id_product` = '{$id_product}'");
}

function update_page($id, $data){
    db_update('tbl_page' , $data, "`id` = '{$id}'");
}

function update_customer($id_customer, $data){
    db_update('tbl_list_customer' , $data, "`id_customer` = '{$id_customer}'");
}

function update_order($id_order, $data){
    db_update('tbl_list_order' , $data, "`id_order` = '{$id_order}'");
}

function update_post($post_id, $data){
    db_update('tbl_post' , $data, "`post_id` = '{$post_id}'");
}

