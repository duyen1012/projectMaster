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

function deletePostAction()
{
    deletePost($_GET['post_id']);
    load_view('list_post');
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