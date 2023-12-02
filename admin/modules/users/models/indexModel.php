<?php

function get_user_by_username($username){
   
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}'");
    if(!empty($item))
    return $item;
}

function update_user_login($username, $data){
    db_update('tbl_users' , $data, "`username` = '{$username}'");
}

function add_user($data) {
    return db_insert('tbl_users', $data);
}

//Kiểm tra trùng username and email
function user_exíts($username, $email) {
    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE email = '{$email}' OR username = '{$username}'");
    echo $check_user;
    if ($check_user > 0)
        return true;
    return false;
}

function info_user($label = 'id'){
   $user_login = $_SESSION['user_login'];
   $user = db_fetch_array("SELECT * FROM `tbl_users` WHERE `username` = '{$user_login}'");
   return $user($label);
}
function info_userlogin($user_login){
 
    $user = db_fetch_array("SELECT * FROM `tbl_users` WHERE `username` = '{$user_login}'");
    return $user;
 }

function get_list_users() {
    $result = db_fetch_array("SELECT * FROM `tbl_users`");
    return $result;
}

function get_user_by_id($id) {
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = {$id}");
}
function active_user($active_token){
    return db_update('tbl_users', array("is_active" => 1), "active_token = '{$active_token}'");

}


// function update_reset_token($data,$email){
//     db_update('tbl_users', $data, "`email` = '{$email}'");
// }
// function check_reset_token($reset_token){
//       $check = db_num_rows("SELECT * FROM `tbl_users` WHERE `reset_token` = '{$reset_token}'");
//     if ($check > 0) {
//         return true;
//     }
//     return false;
// }
function update_password($username, $data){
    db_update('tbl_users', $data, "`username` = '{$username}'"); 

}
function check_login($username, $password){
    $check_user = db_num_rows("SELECT * FROM `tbl_users` WHERE `username`='{$username}' AND `password`='{$password}'");
    echo $check_user;
    if($check_user >0)
    return true;
    return false;
}

function get_users($start = 1, $num_per_page = 10, $where = "") {
    if (!empty($where))
        $where = "WHERE {$where}";
    $list_user = db_fetch_array("SELECT * FROM `tbl_users` {$where} LIMIT {$start}, {$num_per_page}");
    return $list_user;
}



function get_pagging($num_page, $page, $base_url = ""){
    $str_pagging = "<ul class='pagging'>";
    if($page > 1){
        $page_prev = $page - 1;
         $str_pagging .= "<li><a href= \"{$base_url}&page={$page_prev}\">Trước</a></li>";
    }
    for($i = 1; $i <= $num_page; $i++){
        $active = "";
        if($i == $page)
            $active = "class = 'active'";
         $str_pagging .= "<li {$active}><a href= \"{$base_url}&page={$i}\">{$i}</a></li>";
    }
     if($page < $num_page){
        $page_next = $page + 1;
         $str_pagging .= "<li><a href=\"{$base_url}&page={$page_next}\">Sau</a></li>";

         
    }
     $str_pagging .=" </ul>";
     return $str_pagging;
}

function delete($user_id){
    db_delete('tbl_users', "`user_id` = '{$user_id}'");
}

