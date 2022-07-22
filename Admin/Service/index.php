<?php
require_once '../../global.php';
require_once '../../Dao/Pdo.php';
require_once '../../Dao/service.php';
extract($_REQUEST);
if (exist_params('btn_add')) {
    $VIEW_NAME = 'add.php';
} elseif (exist_params('btn_insert')) {

    if (
        !empty($_POST['title']) ||
        !empty($_POST['img']) ||
        !empty($_POST['price'])
    ) {
        $path = $_FILES['img']['tmp_name'];
        $uploads = '../../Content/Images/Uploads/';
        $nameimg = $_FILES['img']['name'];
        $img =  handel_img($path, $uploads, $nameimg);
        $data = [
            'title' => test_input($_POST['title']),
            'price' => test_input($_POST['price']),
            'img' => $img
        ];
        $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Thêm Thành Công!</h7>";
        insert_service($data);
        $VIEW_NAME = 'add.php';
    } else {
        $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Không bỏ trống!</h7>";
        $VIEW_NAME = 'add.php';
    }
} elseif (exist_params('btn_edit')) {
    $id = $_GET['btn_edit'];
    $item = select_one_service($id);
    $VIEW_NAME = 'edit.php';
} elseif (exist_params('btn_update')) {
    if (is_file($_FILES['img']['tmp_name'])) {
        $path = $_FILES['img']['tmp_name'];
        $uploads = '../../Content/Images/Uploads/';
        $nameimg = $_FILES['img']['name'];
        $img =  handel_img($path, $uploads, $nameimg);
        $data = [
            'title' => test_input($_POST['title']),
            'price' => test_input($_POST['price']),
            'img' => $img,
            'id' => $_POST['id']
        ];
        update_service($data);
        $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Cập Nhật Thành Công!</h7>";
        header('location: ' . $ADMIN_URL . '/Service/index.php');
        die;
    } else {
        $data = [
            'title' => test_input($_POST['title']),
            'price' => test_input($_POST['price']),
            'img' => test_input($_POST['img_base']),
            'id' => $_POST['id']
        ];
        update_service($data);
        $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Cập Nhật Thành Công!</h7>";
        header('location: ' . $ADMIN_URL . '/Service/index.php');
        die;
    }
}
//delete news
elseif (exist_params('btn_delete')) {
    $id = $_GET['btn_delete'];
    delete_service($id);
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Xóa Thành Công!</h7>";
    header('location: ' . $ADMIN_URL . '/Service/index.php');
    die;
} else {
    $VIEW_NAME = 'list.php';
}
require_once '../layouts.php';
