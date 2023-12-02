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

    //    show_array($list_users);
    load_view('index');
}

