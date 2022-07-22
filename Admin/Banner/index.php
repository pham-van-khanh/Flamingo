<?php
require_once '../../global.php';
require_once '../../Dao/Pdo.php';
require_once '../../Dao/banner.php';
extract($_REQUEST);
if (exist_params('btn_insert')) {
    $path = $_FILES['img']['tmp_name'];
    $uploads = '../../Content/Images/Uploads/';
    $nameimg = $_FILES['img']['name'];
    $img =  handel_img($path, $uploads, $nameimg);
    $data = [
        'img' => $img,
        'status' => $_POST['status']
    ];
    insert_banner($data);
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Thêm Thành Công!</h7>";
    header('location: http://localhost/du_an_flamingo/Admin/Banner/index.php');
    die;
} elseif (exist_params('btn_update')) {
    if ($_GET['status'] == 0) {
        update_banner_block($_GET['btn_update']);
        $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Cập nhật Thành Công!</h7>";
        header('location: http://localhost/du_an_flamingo/Admin/Banner/index.php');
        die;
    } else {
        update_banner_hiden($_GET['btn_update']);
        $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Cập nhật Thành Công!</h7>";
        header('location: http://localhost/du_an_flamingo/Admin/Banner/index.php');
        die;
    }
} elseif (exist_params('btn_delete')) {
    delete_banner($_GET['btn_delete']);
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Xóa Thành Công!</h7>";
    header('location: http://localhost/du_an_flamingo/Admin/Banner/index.php');
    die;
} else {
    $data = select_all_banner();
    $VIEW_NAME = 'list.php';
}
require_once '../layouts.php';
