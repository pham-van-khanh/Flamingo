<?php
require_once '../../global.php';
require_once '../../Dao/Pdo.php';
require_once '../../Dao/logo.php';
extract($_REQUEST);
if (exist_params('btn_insert')) {

    $path = $_FILES['img']['tmp_name'];
    $uploads = '../../Content/Images/Uploads/';
    $nameimg = $_FILES['img']['name'];
    $img =  handel_img($path, $uploads, $nameimg);
    $data = [
        'img' => $img,
        'status' => +$_POST['status']
    ];
    // var_dump($data );die;
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Thêm Thành Công!</h7>";
    insert_logo($data);
    header('location: ' . $ADMIN_URL . '/Logo/index.php');
    die;
}
//update news
elseif (exist_params('btn_edit')) {
    $id = $_GET['btn_edit'];
    update_logo($id);
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Cập nhật Thành Công!</h7>";
    header('location: ' . $ADMIN_URL . '/Logo/index.php');
    die;
} //delete news
elseif (exist_params('btn_delete')) {
    $id = $_GET['btn_delete'];
    delete_logo($id);
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Xóa Thành Công!</h7>";
    header('location: ' . $ADMIN_URL . '/Logo/index.php');
    die;
} else {
    $data = select_all_logo();
    $VIEW_NAME = 'list.php';
}
require_once '../layouts.php';
