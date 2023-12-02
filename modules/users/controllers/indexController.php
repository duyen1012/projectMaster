

<?php

function construct() {
    // echo "Dùng chung, load đầu tiên";
    load_model('index');
    load('lib', 'validation');
    load('lib', 'email');
}

function indexAction() {
    load('helper', 'format');
    $list_users = get_list_users();
    //    show_array($list_users);
    $data['list_users'] = $list_users;
    load_view('index', $data);
}

function regAction() {
    global $error, $username, $password, $email, $fullname;
    if (isset($_POST['btn_reg'])) {
        $error = array();

        if (empty($_POST['fullname'])) {
            $error['fullname'] = "Không được để trống fullname";
        } else {
            $fullname = $_POST['fullname'];
        }

        if (empty($_POST['username'])) {
            $error['username'] = "Không được để trống username";
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = "Tên đăng nhập không chính xác";
            } else {
                $username = $_POST['username'];
            }
        }

        if (empty($_POST['password'])) {
            $error['password'] = "Không được để trống password";
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = "Mật khẩu không đúng định dạng";
            } else {
                $password = md5($_POST['password']);
            }
        }

        if (empty($_POST['email'])) {
            $error['email'] = "Không được để trống email";
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = "Email không đúng định dạng";
            } else {
                $email = ($_POST['email']);
            }
        }

        if (empty($error)) {
            if (!user_exíts($username, $email)) {
                $active_token = md5($username . time()); # Dùng để bảo mật
                $data = array(
                    'fullname' => $fullname,
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'active_token' => $active_token
                );
                add_user($data);
                $link_active = base_url("?mod=users&action=active&active_token={$active_token}");
                $content = "<p>Chào Bạn {$fullname}</p>
                <p>Bạn vui lòng click vào đây để kích hoạt tài khoản: {$link_active}</p>
                <p>Nếu không phải bạn vui lòng bỏ qua mail</p>
                <P>team support Unitop.vn</p>";
                send_mail($email, "test", 'kích hoạt tài khoản master', $content);

                // Thông báo
                // redirect("?mod=users&action=login");
            } else {
                $error['account'] = "Email hoặc username đã tồn tại trên hệ thống";
            }
        }
    }

    load_view('reg');
}

function loginAction() {
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

function logoutAction() {
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect("?mod=users&action=login");
}

function activeAction() {
    global $conn;
    $link_login = base_url("?mod=users&action=login");
    $active_token = $_GET['active_token'];
    if (check_active_token($active_token)) {
        active_user($active_token);

        echo "Bạn đã kích hoạt thành công, vui lòng click vào link sau để đăng nhập: <a href='{$link_login}'>Đăng nhập</a>";
    } else {
        echo "Yêu cầu kích hoạt không hợp lệ hoặc tài khoản đã được kích hoạt trước đó!, vui lòng click vào link sau để đăng nhập: <a href='{$link_login}'>Đăng nhập</a>";
    }
}

function resetAction() {
    global $error, $username, $password;
    $reset_token = $_GET['reset_token'];
    if (!empty($reset_token)) {
        if (check_reset_token($reset_token)) {
            if (isset($_POST['btn_new_pass'])) {
                $error = array();
                if (empty($_POST['password'])) {
                    $error['password'] = "Không được để trống password";
                } else {
                    if (!is_password($_POST['password'])) {
                        $error['password'] = "Mật khẩu không đúng định dạng";
                    } else {
                        $password = md5($_POST['password']);
                    }
                }
                if(empty($error)){
                    $data = array(
                        'password' => $password
                    );
                    update_pass($data, $reset_token);
                    redirect("?mod=user&action=reset0k");
                }
            }
            load_view('newPass');
        } else {
            echo 'Yêu cầu lấy lại mật khẩu không hợp lệ';
        }
    } else {
        if (isset($_POST['btn_reset'])) {
            $error = array();

            if (empty($_POST['email'])) {
                $error['email'] = "Không được để trống email";
            } else {
                if (!is_email($_POST['email'])) {
                    $error['email'] = "Email không đúng định dạng";
                } else {
                    $email = ($_POST['email']);
                }
            }
            if (empty($error)) {
                // Xử lý đăng nhập
                if (check_email($email)) {
                    $reset_token = md5($email . time());
                    $data = array(
                        'reset_token' => $reset_token
                    );
                    //Cập nhật mã reset pas cho user cần khôi phục mật khẩu
                    update_reset_token($data, $email);
                    //Gửi link khôi phục vào email của người dùng
                    $link = base_url("?mod=users&action=reset&reset_token = {$reset_token}");
                    $content = "<p>Bạn vui lòng click vào link sau để khôi phục mật khẩu: {$link} </p>
                     <p>Nếu không phải yêu cầu của bạn , bạn vui lòng bỏ qua email này</p>
                     <p>Unitop Team Support</p>";

                    send_mail($email, '', 'Khôi phục mật khẩu PHP MATER', $content);
                } else {
                    $error['account'] = "Email không tồn tại trên hệ thống";
                }
            }
        }


        load_view('reset');
    }
}

function resetOKAction() {
    load_view('resetOK');
}

function users_ajaxAction()
{
    $username = $_POST['username'];
    $password = md5($_POST['password']); 
    if (check_login($username, $password)) {
        // Lấy thông tin người dùng dưới dạng một mảng từ hàm info_userlogin
        $user = info_userlogin($username);

        // Kiểm tra xem người dùng có tồn tại hay không
        if ($user) {
            // Trả về thông tin người dùng dưới dạng JSON
            echo json_encode(array("status" => "success", "message" => "login success", "user" => $user));
         
        }  
    } else {
        echo json_encode(array("status" => "error", "message" => "login false"));
    }
}
