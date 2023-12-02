<?php
session_start();
function construct()
{

    // echo "Dùng chung, load đầu tiên";
    load_model('index');
    load('lib', 'validation');
    load('lib', 'email');

}

function indexAction()
{
    load_view('teamIndex');
}

function add_catAction()
{
    global $error, $fullname, $username, $email, $password;

    if (isset($_POST['btn-add-admin'])) {
        $error = array();

        if (empty($_POST['fullname'])) {
            $error['fullname'] = "Không được để trống fullname";
        } else {
            $fullname = $_POST['fullname'];
        }


        if (empty($_POST['username'])) {
            $error['username'] = "Không được để trống username";
        } else {
            // Implement is_username() function before using it here
            if (!is_username($_POST['username'])) {
                $error['username'] = "Không đúng định dạng username";
            }
            $username = $_POST['username'];
        }

        if (empty($_POST['password'])) {
            $error['password'] = "Không được để trống password";
        } else {
            // Implement is_password() function before using it here
            if (!is_password($_POST['password'])) {
                $error['password'] = "Không đúng định dạng password";
            }
            $password = $_POST['password'];
        }

        if (empty($_POST['email'])) {
            $error['email'] = "Không được để trống email";
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = "Không đúng định dạng email";
            }
            $email = $_POST['email'];
        }

        if (empty($_POST['phone_number'])) {
            $error['phone_number'] = "Không được để trống phone_number";
        } else {

            $phone_number = ($_POST['phone_number']);

        }

        if (empty($_POST['address'])) {
            $error['address'] = "Không được để trống address";
        } else {

            $address = ($_POST['address']);
        }





        if (empty($error)) {
            $data = array(
                'fullname' => $fullname,
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'phone_number' => $phone_number,
                'address' => $address
            );

            add_user($data);

        } else {
            // show_array($error);
        }
    }
    //Dựa vào username truy xuất vào database lấy nó ra
    $info_user = get_user_by_username(user_login());
    //truyền dữ liệu qua form
    $data['info_user'] = $info_user;
    load_view('add_cat', $data);
}


function deleteAction()
{
    $user_id = $_GET['id'];
    delete($user_id);
    load_view('teamIndex');
}

function updateAction()
{
    global $error, $fullname, $phone_number, $address;
    if (isset($_POST['btn-update'])) {
        $error = array();
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "Không được để trống fullname";
        } else {
            $fullname = $_POST['fullname'];
        }


        if (empty($_POST['phone_number'])) {
            $error['phone_number'] = "Không được để trống phone_number";
        } else {

            $phone_number = ($_POST['phone_number']);

        }

        if (empty($_POST['address'])) {
            $error['address'] = "Không được để trống address";
        } else {

            $address = ($_POST['address']);
        }

        if (empty($error)) {
            //Cập nhật

            $data = array(
                'fullname' => $fullname,
                'address' => $address,
                'phone_number' => $phone_number
            );
            update_user_login(user_login(), $data);
        }

    }

    //Dựa vào username truy xuất vào database lấy nó ra
    $info_user = get_user_by_username(user_login());
    //truyền dữ liệu qua form
    $data['info_user'] = $info_user;
    load_view('update', $data);
}



?>