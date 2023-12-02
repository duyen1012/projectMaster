<?php

function is_username($username) {
    $pattern = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (!preg_match($pattern, $username))
        return FALSE;
    return TRUE;
}

function is_password($password) {
    $pattern = "/^[A-Za-z0-9_\.!@#$%^&()]{6,32}$/";
    if (!preg_match($pattern, $password))
        return FALSE;
    return TRUE;
}

function is_email($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return FALSE;
    }
    return TRUE;
}

function form_error($label_field){
    global $error;
    if(!empty($error[$label_field]))
    return "<p class='erorr'>{$error[$label_field]}";
}

function set_value($label_field) {
    global $$label_field;
    if (!empty($$label_field))
        return $$label_field;
}
