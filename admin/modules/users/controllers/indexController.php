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
    $list_users = get_list_users();
    //    show_array($list_users);
    $data['list_users'] = $list_users;
    load_view('index', $data);
}


function loginAction()
{
    // echo time();
    echo date("d/m/Y h:m:s");
    global $error, $username, $password;
    if (isset($_POST['btn_login'])) {
        $error = array();

        if (empty($_POST['username'])) {
            $error['username'] = "Không được để trống username";
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = "Không đúng định dạng username";
            }
            $username = $_POST['username'];
        }
        if (empty($_POST['password'])) {
            $error['password'] = "Không được để trống password";
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = "Không đúng định dạng password";
            }
            $password = md5($_POST['password']);
        }
        if (empty($error)) {
            // Xử lý đăng nhập
            if (check_login($username, $password)) {
                // Lưu trữ phiên đăng nhập trong session
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                // Chuyển hướng đến trang home
                redirect();
            } else {
                $error['account'] = "Tên đăng nhập hoặc mật khẩu không chính xác";
            }
        }
    }
    load_view('login');
}

function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect("?mod=users&action=login");
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

function resetAction()
{
    global $error, $password_old, $password_new, $confirm_pass;
    if (isset($_POST['btn-submit'])) {
        $error = array();
        if (empty($_POST['pass-old'])) {
            $error['pass-old'] = "Không được để trống password";

        } else {
            if (!is_password($_POST['pass-old'])) {
                $error['pass-old'] = "Password không đúng định dạng";
            }
            $password_old = md5($_POST['pass-old']);

        }

        if (empty($_POST['pass-new'])) {
            $error['pass-new'] = "Không được để trống password";

        } else {
            if (!is_password($_POST['pass-new'])) {
                $error['pass-new'] = "Password không đúng định dạng";
            }
            $password_new = md5($_POST['pass-new']);
        }

        if (empty($_POST['confirm-pass'])) {
            $error['confirm-pass'] = "Không được để trống password";

        } else {
            if (!is_password($_POST['confirm-pass'])) {
                $error['confirm-pass'] = "Password không đúng định dạng";
            }
            $confirm_pass = md5($_POST['confirm-pass']);

        }

        if (empty($error)) {
            $data = array(
                'pass-old' => $password_old,
                'pass-new' => $password_new,
                'confirm-pass' => $confirm_pass
            );
            update_password(user_login(), ['password' => $password_new]);

        }

    }
    load_view('reset');

}

function users_ajaxAction()
{
   
    global $error, $username, $password;

    $username = $_POST['username'];
    $password = md5($_POST['password']); // Lưu ý: md5 không nên sử dụng cho mục đích bảo mật cao

    // Thực hiện kiểm tra tên đăng nhập và mật khẩu trong cơ sở dữ liệu
    if (check_login($username, $password)) {
        $user = info_userlogin($username);
        if ($user) {
            // Trả về thông tin người dùng dưới dạng JSON
            echo json_encode(array("status" => "success", "message" => "Đăng nhập thành công", "user" => $user));
        }
    } else {
        echo $error = "Tên đăng nhập hoặc mật khẩu không chính xác";
    }

}