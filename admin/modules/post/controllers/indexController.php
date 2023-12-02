<?php

function construct()
{
    // echo "Dùng chung, load đầu tiên";
    load_model('index');
    load('lib', 'validation');
}

function indexAction()
{
    load('helper', 'format');
    $list_users = get_list_users();
    //    show_array($list_users);
    $data['list_users'] = $list_users;
    load_view('index', $data);
}

function list_postAction()
{
    load_view('list_post');
}

function list_post_catAction()
{
    
    load_view('list_post_cat');
}
