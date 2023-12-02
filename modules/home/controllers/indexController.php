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

function add_ajaxAction(){

    $id_product = $_POST['id_product'];
    $qty = $_POST['qty'];
    $item = $_SESSION['cart']['buy'][$id_product];

    if(isset($_SESSION['cart']) && array_key_exists($id_product, $_SESSION['cart']['buy']));
    //Cập nhật số lượng
    $_SESSION['cart']['buy'][$id_product]['qty'] = $qty;

      //Cập nhật tổng tiền
    $sub_total = $qty * $item['prices'];
    $_SESSION['cart']['buy'][$id_product]['sub_total'] = $sub_total;

    //Cập nhật toàn bộ giỏ hàng
   update_info_cart();

    //Gía trị trả về
    $data = [
        'sub_total' => currency_format($sub_total),
        'total' => currency_format($_SESSION['cart']['info']['total'])

    ];
    echo json_encode($data);

}
