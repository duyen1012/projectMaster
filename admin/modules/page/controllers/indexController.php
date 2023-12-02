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



function list_post_pageAction()
{
    load_view('list_post_page');
}
function list_pageAction()
{
    load_view('list_page');
}

function add_pageAction()
{
    load_view('add_page');
}


function add_postAction()
{

    load_view('add_post');
}





function list_productAction()
{

    load_view('list_product');
}

function list_customerAction()
{

    load_view('list_customer');
}


function list_catAction(){
    load_view('list_cat');
}
function list_orderAction()
{
    load_view('list_order');
}

function menuAction()
{
    load_view('menu');
}

function list_sliderAction(){
    load_view('list_slider');
}