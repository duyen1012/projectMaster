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



function cartAction()
{
    load_view('cart');
}
function checkoutAction()
{
    load_view('checkout');
}

function updateAction()
{
    if (isset($_POST['btn_update_cart'])) {
        update_cart($_POST['qty']);

    }
    load_view('cart');
}

function deleteAction()
{
    if(!empty($_GET['id_product'])){
    $id =(int) $_GET['id_product'];
    delete_cart($id);
    load_view('cart');
    }
}

function delete_allAction()
{
    delete_cart("");

    load_view('cart');
}




function update_ajaxAction()
{
    $id = $_POST['id_product'];
    $qty = $_POST['qty'];
    $item = $_SESSION['cart']['buy'][$id];
    $newArr = [];

    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        //Cập nhật số luong 
        $_SESSION['cart']['buy'][$id]['qty'] = $qty;

        //Cập nhật tổng tiền
        $sub_total = $qty * $item['prices'];
        $_SESSION['cart']['buy'][$id]['sub_total'] = $sub_total;

        //Cập nhật toàn bộ giỏ hàng
        $newArr[$id] = $qty;
        update_cart($newArr);

        //Gía trị trả về
        $data = [
            'sub_total' => currency_format($sub_total),
            'total' => currency_format($_SESSION['cart']['info']['total'])
        ];
        echo json_encode($data);
    }
}

function add_cartAction(){
	$id = (int) $_GET['id_product'];
add_cart($id);
load_view('cart');
}