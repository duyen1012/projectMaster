<?php

function construct()
{
    // echo "Dùng chung, load đầu tiên";
    load_model('index');
    load('lib', 'validation');
    load('lib', 'email');
}

function indexAction()
{
    
    load('helper', 'format');
 
    load_view('index');
}

function category_productAction(){
    load_view('category_product');
}

function blogAction(){
    load_view('blog');
}