<?php

use WindowsAzure\ServiceManagement\Models\Location;

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
    $list_users = get_list_users();
    //    show_array($list_users);
    $data['list_users'] = $list_users;
    load_view('index', $data);
}

function deleteProductAction()
{

    deleteProduct($_GET['id_product']);
    load_view('list_product');
}




function deletePageAction()
{


    deletePage($_GET['id']);
    load_view('list_page');


}

function deleteCustomerAction()
{
    deleteCustomer($_GET['id_customer']);
    load_view('list_customer');
}

function orderdetailAction()
{


    load_view('list_orderdetail');
}

function deleteOrderAction()
{
    deleteOrder($_GET['id_order']);
    load_view('list_order');
}





function add_productAction()
{
    global $error, $id_product_cat, $product_name, $product_title, $prices, $prices_new, $prices_old, $product_desc, $images, $product_content;
    $uploadimg = "testimage";

    if (isset($_POST['btn-add-product'])) {
        $error = array();

        if (isset($_POST['id_product_cat'])) {
            $id_product_cat = $_POST['id_product_cat'];

        } else {
            $error['id_product_cat'] = "Không được để trống id_product_cat";

        }

        if (isset($_POST['product_title'])) { // Đã sửa tên biến ở đây
            $product_name = $_POST['product_name'];

        } else {
            $error['product_name'] = "Không được để trống product_name";

        }

        if (isset($_POST['product_title'])) {
            $product_title = $_POST['product_title'];

        } else {
            $error['product_title'] = "Không được để trống product_title";

        }

        if (empty($_POST['prices'])) {

            $error['prices'] = "Không được để trống prices";
        } else {
            $prices = $_POST['prices'];
        }

        if (empty($_POST['prices_new'])) {

            $error['prices_new'] = "Không được để trống prices_new";
        } else {
            $prices_new = $_POST['prices_new'];
        }

        if (empty($_POST['prices_old'])) {

            $error['prices_old'] = "Không được để trống prices_old";
        } else {
            $prices_old = $_POST['prices_old'];
        }



        if (empty($_POST['product_desc'])) {

            $error['product_desc'] = "Không được để trống product_desc";
        } else {
            $product_desc = $_POST['product_desc'];
        }

        if (empty($_FILES['image']['name'])) {

            $error['image'] = "Không được để trống product_thumb";
        } else {
            $images = $_FILES['image']['name'];
            $targetDir = "public/images/img-product/";
            $targetFile = $targetDir . basename($images);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $uploadimg = $targetFile;

            } else {
                $error['images'] = "Xảy ra lỗi khi tải lên tệp hình ảnh.";
            }
        }

        if (empty($_POST['product_content'])) {

            $error['product_content'] = "Không được để trống product_content";
        } else {
            $product_content = $_POST['product_content'];
        }




        $data = array(
            'id_product_cat' => $id_product_cat,
            'product_name' => $product_name,
            // Đã sửa tên biến ở đây
            'product_title' => $product_title,
            'prices' => $prices,
            'prices_new' => $prices_new,
            'prices_old' => $prices_old,
            'product_desc' => $product_desc,
            'images' => $uploadimg,
            'product_content' => $product_content
        );

        add_product($data);
        // viet ham  product
        //Dựa vào username truy xuất vào database lấy nó ra
        $info_product = get_code_by_product($_POST['id_product']);
        //truyền dữ liệu qua form
        $data['info_product'] = $info_product;
        load_view('add_product', $data);
    } else {
        $data = [];
        load_view('add_product', $data);

    }
}


function updateProductAction()
{
    if (isset($_POST['btn-update-product'])) {

        global $error, $id_product_cat, $product_name, $product_title, $prices, $prices_new, $prices_old, $product_desc, $images, $product_content;
        $uploadimg = $_POST['image_url'];

        if (isset($_POST['id_product_cat'])) {
            $id_product_cat = $_POST['id_product_cat'];

        } else {
            $error['id_product_cat'] = "Không được để trống id_product_cat";

        }

        if (isset($_POST['product_title'])) { // Đã sửa tên biến ở đây
            $product_name = $_POST['product_name'];

        } else {
            $error['product_name'] = "Không được để trống product_name";

        }

        if (isset($_POST['product_title'])) {
            $product_title = $_POST['product_title'];

        } else {
            $error['product_title'] = "Không được để trống product_title";

        }

        if (empty($_POST['prices'])) {

            $error['prices'] = "Không được để trống prices";
        } else {
            $prices = $_POST['prices'];
        }

        if (empty($_POST['prices_new'])) {

            $error['prices_new'] = "Không được để trống prices_new";
        } else {
            $prices_new = $_POST['prices_new'];
        }

        if (empty($_POST['prices_old'])) {

            $error['prices_old'] = "Không được để trống prices_old";
        } else {
            $prices_old = $_POST['prices_old'];
        }



        if (empty($_POST['product_desc'])) {

            $error['product_desc'] = "Không được để trống product_desc";
        } else {
            $product_desc = $_POST['product_desc'];
        }

        if (!empty($_FILES['image']['name'])) {

            $images = $_FILES['image']['name'];
            $targetDir = "public/images/img-product/";
            $targetFile = $targetDir . basename($images);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $uploadimg = $targetFile;

            } else {
                $error['images'] = "Xảy ra lỗi khi tải lên tệp hình ảnh.";
            }
        }

        if (empty($_POST['product_content'])) {

            $error['product_content'] = "Không được để trống product_content";
        } else {
            $product_content = $_POST['product_content'];
        }




        $data = array(
            'id_product_cat' => $id_product_cat,
            'product_name' => $product_name,
            // Đã sửa tên biến ở đây
            'product_title' => $product_title,
            'prices' => $prices,
            'prices_new' => $prices_new,
            'prices_old' => $prices_old,
            'product_desc' => $product_desc,
            'images' => $uploadimg,
            'product_content' => $product_content
        );

        updateProduct($_POST['id_product'], $data);


        load_view('list_product', $data);
    }



    if (isset($_GET['id_product'])) {
        $product_id = $_GET['id_product'];

        $info_product = get_code_by_product($product_id);
        $data['info_product'] = $info_product;
        load_view('updateProduct', $data);
    } else {
        echo "Missing product ID";
    }

}


// create function save product before edit product


function saveProductAction()
{
    global $id_Product, $error, $id_product_cat, $product_name, $product_title, $prices, $prices_new, $prices_old, $product_desc, $images, $product_content;


    echo "<script>alert('" . $_POST['product_name'] . "');</script>";

}

function add_postAction()
{
    global $error, $post_cat_id, $post_name, $post_title;

    if (isset($_POST['btn-add-post'])) {
        $error = array();


        if (empty($_POST['post_cat_id'])) {

            $error['post_cat_id'] = "Không được để trống post_cat_id";
        } else {
            $post_cat_id = $_POST['post_cat_id'];
        }



        if (empty($_POST['post_name'])) {

            $error['post_name'] = "Không được để trống post_name";
        } else {
            $post_name = $_POST['post_name'];
        }

        if (empty($_POST['post_title'])) {

            $error['post_title'] = "Không được để trống post_title";
        } else {
            $post_title = $_POST['post_title'];
        }

        $data = array(

            'post_cat_id' => $post_cat_id,
            'post_name' => $post_name,
            'post_title' => $post_title


        );


        add_post($data);


        $info_post = get_code_by_post($_POST['post_id']);

        //truyền dữ liệu qua form
        // var_dump($info_page);die;
        $data['info_post'] = $info_post;
        load_view('add_post', $data);

    } else {
        $data = [];

        load_view('add_post', $data);


    }
}

function updatePostAction()
{
    global $error, $post_cat_id, $post_name, $post_title;

    if (isset($_POST['btn-update-post'])) {
        $error = array();



        if (empty($_POST['post_cat_id'])) {

            $error['post_cat_id'] = "Không được để trống post_cat_id";
        } else {
            $post_cat_id = $_POST['post_cat_id'];
        }



        if (empty($_POST['post_name'])) {

            $error['post_name'] = "Không được để trống post_name";
        } else {
            $post_name = $_POST['post_name'];
        }

        if (empty($_POST['post_title'])) {

            $error['post_title'] = "Không được để trống post_title";
        } else {
            $post_title = $_POST['post_title'];
        }

        $data = array(
            'post_cat_id' => $post_cat_id,
            'post_name' => $post_name,
            'post_title' => $post_title

        );
        updatePost($_POST['post_id'], $data);
        // load_view('list_page', $data);


    }

    if (isset($_GET['post_id'])) {
        $post_id = $_GET['post_id'];

        $info_post = get_code_by_post($post_id);

        $data['info_post'] = $info_post;
        load_view('updatePost', $data);
    } else {
        echo "Missing post ID";
    }


}

function savePostAction()
{
    global $error, $post_cat_id, $post_name, $post_title;


    echo "<script>alert('" . $_POST['post_name'] . "');</script>";

}
function add_pageAction()
{
    global $error, $page_name, $friendly_url, $creator, $date_created;

    if (isset($_POST['btn-add-page'])) {
        $error = array();


        if (empty($_POST['page_name'])) {

            $error['page_name'] = "Không được để trống page_name";
        } else {
            $page_name = $_POST['page_name'];
        }



        if (empty($_POST['friendly_url'])) {

            $error['friendly_url'] = "Không được để trống friendly_url";
        } else {
            $friendly_url = $_POST['friendly_url'];
        }

        if (empty($_POST['creator'])) {

            $error['creator'] = "Không được để trống creator";
        } else {
            $creator = $_POST['creator'];
        }

        if (empty($_POST['date_created'])) {

            $error['date_created'] = "Không được để trống date_created";
        } else {
            $date_created = $_POST['date_created'];
        }


        $data = array(

            'page_name' => $page_name,
            'friendly_url' => $friendly_url,
            'creator' => $creator,
            'date_created' => $date_created

        );


        add_page($data);


        $info_page = get_code_by_page($_POST['id']);

        //truyền dữ liệu qua form
        // var_dump($info_page);die;
        $data['info_page'] = $info_page;
        load_view('add_page', $data);


    } else {
        $data = [];

        load_view('add_page', $data);


    }
}

function add_customerAction()
{

    global $error, $fullname, $phone_number, $email, $address, $date_created;
    if (isset($_POST['btn-add-customer'])) {
        $error = array();
        if (empty($_POST['fullname'])) {

            $error['fullname'] = "Không được để trống fullname";
        } else {
            $fullname = $_POST['fullname'];
        }

        if (empty($_POST['phone_number'])) {

            $error['phone_number'] = "Không được để trống phone_number";
        } else {
            $phone_number = $_POST['phone_number'];
        }


        if (empty($_POST['address'])) {

            $error['address'] = "Không được để trống address";
        } else {
            $address = $_POST['address'];
        }


        if (empty($_POST['email'])) {

            $error['email'] = "Không được để trống email";
        } else {
            $email = $_POST['email'];
        }


        if (empty($_POST['date_created'])) {

            $error['date_created'] = "Không được để trống date_created";
        } else {
            $date_created = $_POST['date_created'];
        }


        $data = array(
            'fullname' => $fullname,
            'phone_number' => $phone_number,
            'address' => $address,
            'email' => $email,
            'date_created' => $date_created




        );
        add_customer($data);

        $info_customer = get_code_by_customer($_POST['id_customer']);
        //truyền dữ liệu qua form
        $data['info_customer'] = $info_customer;
        load_view('add_customer', $data);
        redirect();
    } else {
        $data = [];

        load_view('add_customer', $data);

    }
}

function updateCustomerAction()
{
    if (isset($_POST['btn-update-customer'])) {

        global $error, $fullname, $phone_number, $address, $email, $customer_order, $date_created;


        if (isset($_POST['fullname'])) {
            $fullname = $_POST['fullname'];

        } else {
            $error['fullname'] = "Không được để trống fullname";

        }

        if (isset($_POST['phone_number'])) { // Đã sửa tên biến ở đây
            $phone_number = $_POST['phone_number'];

        } else {
            $error['phone_number'] = "Không được để trống phone_number";

        }

        if (isset($_POST['address'])) {
            $address = $_POST['address'];

        } else {
            $error['address'] = "Không được để trống address";

        }

        if (empty($_POST['email'])) {

            $error['email'] = "Không được để trống email";
        } else {
            $email = $_POST['email'];
        }

        if (empty($_POST['customer_order'])) {

            $error['customer_order'] = "Không được để trống customer_order";
        } else {
            $customer_order = $_POST['customer_order'];
        }

        if (empty($_POST['date_created'])) {

            $error['date_created'] = "Không được để trống date_created";
        } else {
            $date_created = $_POST['date_created'];
        }




        $data = array(
            'fullname' => $fullname,
            'phone_number' => $phone_number,
            'address' => $address,
            'email' => $email,
            'customer_order' => $customer_order,
            'date_created' => $date_created

        );
        updateCustomer($_POST['id_customer'], $data);


        load_view('list_customer', $data);
    }

    if (isset($_GET['id_customer'])) {
        $id_customer = $_GET['id_customer'];

        $info_customer = get_code_by_customer($id_customer);
        $data['info_customer'] = $info_customer;
        load_view('updateCustomer', $data);
    } else {
        echo "Missing customer ID";
    }
}

function saveCustomerAction()
{
    global $error, $fullname, $phone_number, $address, $email, $customer_order, $date_created;

    echo "<script>alert('" . $_POST['fullname'] . "');</script>";

}

function add_orderAction()
{

    global $error, $id_customer, $order_name, $code_order, $product_number, $total_price, $order_date, $order_status, $order_detail;
    if (isset($_POST['btn-add-order'])) {
        $error = array();
        if (empty($_POST['id_customer'])) {

            $error['id_customer'] = "Không được để trống id_customer";
        } else {
            $id_customer = $_POST['id_customer'];
        }

        if (empty($_POST['order_name'])) {

            $error['order_name'] = "Không được để trống order_name";
        } else {
            $order_name = $_POST['order_name'];
        }


        if (empty($_POST['code_order'])) {

            $error['code_order'] = "Không được để trống code_order";
        } else {
            $code_order = $_POST['code_order'];
        }


        if (empty($_POST['product_number'])) {

            $error['product_number'] = "Không được để trống product_number";
        } else {
            $product_number = $_POST['product_number'];
        }

        if (empty($_POST['total_price'])) {

            $error['total_price'] = "Không được để trống total_price";
        } else {
            $total_price = $_POST['total_price'];
        }

        if (empty($_POST['order_date'])) {

            $error['order_date'] = "Không được để trống order_date";
        } else {
            $order_date = $_POST['order_date'];
        }

        if (empty($_POST['order_status'])) {

            $error['order_status'] = "Không được để trống order_status";
        } else {
            $order_status = $_POST['order_status'];
        }

        if (empty($_POST['order_detail'])) {

            $error['order_detail'] = "Không được để trống order_detail";
        } else {
            $order_detail = $_POST['order_detail'];
        }


        $data = array(
            'id_customer' => $id_customer,
            'order_name' => $order_name,
            'code_order' => $code_order,
            'product_number' => $product_number,
            'total_price' => $total_price,
            'order_date' => $order_date,
            'order_status' => $order_status,
            'order_detail' => $order_detail




        );
        add_order($data);

        $info_order = get_code_by_order($_POST['id_order']);

        //truyền dữ liệu qua form

        $data['info_order'] = $info_order;
        load_view('add_order', $data);


    } else {
        $data = [];

        load_view('add_order', $data);

    }
}

function updateOrderAction()
{
    global $error, $id_customer, $order_name, $code_order, $product_number, $total_price, $order_date, $order_status, $order_detail;
    if (isset($_POST['btn-update-order'])) {
        $error = array();
        if (empty($_POST['id_customer'])) {

            $error['id_customer'] = "Không được để trống id_customer";
        } else {
            $id_customer = $_POST['id_customer'];
        }

        if (empty($_POST['order_name'])) {

            $error['order_name'] = "Không được để trống order_name";
        } else {
            $order_name = $_POST['order_name'];
        }


        if (empty($_POST['code_order'])) {

            $error['code_order'] = "Không được để trống code_order";
        } else {
            $code_order = $_POST['code_order'];
        }


        if (empty($_POST['product_number'])) {

            $error['product_number'] = "Không được để trống product_number";
        } else {
            $product_number = $_POST['product_number'];
        }

        if (empty($_POST['total_price'])) {

            $error['total_price'] = "Không được để trống total_price";
        } else {
            $total_price = $_POST['total_price'];
        }

        if (empty($_POST['order_date'])) {

            $error['order_date'] = "Không được để trống order_date";
        } else {
            $order_date = $_POST['order_date'];
        }

        if (empty($_POST['order_status'])) {

            $error['order_status'] = "Không được để trống order_status";
        } else {
            $order_status = $_POST['order_status'];
        }

        if (empty($_POST['order_detail'])) {

            $error['order_detail'] = "Không được để trống order_detail";
        } else {
            $order_detail = $_POST['order_detail'];
        }




        $data = array(
            'id_customer' => $id_customer,
            'order_name' => $order_name,
            'product_number' => $product_number,
            'total_price' => $total_price,
            'order_date' => $order_date,
            'order_status' => $order_status,
            'order_detail' => $order_detail

        );
        updateOrder($_POST['id_order'], $data);
        // load_view('list_page', $data);


    }

    if (isset($_GET['id_order'])) {
        $id_order = $_GET['id_order'];

        $info_order = get_code_by_order($id_order);

        $data['info_order'] = $info_order;
        load_view('updateOrder', $data);
    } else {
        echo "Missing Order ID";
    }




}

function saveOrderAction()
{
    global $error, $id_customer, $order_name, $code_order, $product_number, $total_price, $order_date, $order_status, $order_detail;

    echo "<script>alert('" . $_POST['order_name'] . "');</script>";

}


function updatePageAction()
{
    global $error, $page_name, $friendly_url, $creator, $date_created;

    if (isset($_POST['btn-update-page'])) {
        $error = array();


        if (empty($_POST['page_name'])) {

            $error['page_name'] = "Không được để trống page_name";
        } else {
            $page_name = $_POST['page_name'];
        }



        if (empty($_POST['friendly_url'])) {

            $error['friendly_url'] = "Không được để trống friendly_url";
        } else {
            $friendly_url = $_POST['friendly_url'];
        }

        if (empty($_POST['creator'])) {

            $error['creator'] = "Không được để trống creator";
        } else {
            $creator = $_POST['creator'];
        }

        if (empty($_POST['date_created'])) {

            $error['date_created'] = "Không được để trống date_created";
        } else {
            $date_created = $_POST['date_created'];
        }


        $data = array(
            'page_name' => $page_name,
            'friendly_url' => $friendly_url,
            'creator' => $creator,
            'date_created' => $date_created




        );
        updatePage($_POST['id'], $data);
        // load_view('list_page', $data);


    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $info_page = get_code_by_page($id);

        $data['info_page'] = $info_page;
        load_view('updatePage', $data);
    } else {
        echo "Missing page ID";
    }




}



function savePageAction()
{
    global $id, $error, $page_name, $friendly_url, $creator, $date_created;


    echo "<script>alert('" . $_POST['page_name'] . "');</script>";

}

function add_sliderAction()
{
    global $error, $slider_img,$link, $number_order, $creator, $date_created, $status;

    if (isset($_POST['btn-add-slider'])) {
        $error = array();


        if (empty($_POST['slider_img'])) {

            $error['slider_img'] = "Không được để trống slider_img";
        } else {
            $slider_img = $_POST['slider_img'];
        }

        if (empty($_POST['link'])) {

            $error['link'] = "Không được để trống link";
        } else {
            $link = $_POST['link'];
        }


        if (empty($_POST['number_order'])) {

            $error['number_order'] = "Không được để trống number_order";
        } else {
            $number_order = $_POST['number_order'];
        }

        if (empty($_POST['creator'])) {

            $error['creator'] = "Không được để trống creator";
        } else {
            $creator = $_POST['creator'];
        }

        if (empty($_POST['date_created'])) {

            $error['date_created'] = "Không được để trống date_created";
        } else {
            $date_created = $_POST['date_created'];
        }

        if (empty($_POST['status'])) {

            $error['status'] = "Không được để trống status";
        } else {
            $status = $_POST['status'];
        }


        $data = array(

            'slider_img' => $slider_img,
            'link' => $link,
            'number_order' => $number_order,
            'creator' => $creator,
            'date_created' => $date_created,
            'status' => $status

        );


        add_slider($data);


        $info_page = get_code_by_slider($_POST['id_slider']);

        //truyền dữ liệu qua form
        // var_dump($info_page);die;
        $data['info_page'] = $info_page;
        load_view('add_slider', $data);


    } else {
        $data = [];

        load_view('add_slider', $data);


    }
}

?>