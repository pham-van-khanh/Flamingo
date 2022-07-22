<?php
require_once '../../global.php';
require_once '../../Dao/Pdo.php';
require_once '../../Dao/Voucher.php';
extract($_REQUEST);
if (exist_params('btn_add')) {
    $VIEW_NAME = 'add.php';
} elseif (exist_params('btn_insert')) {

    if (
        !empty($_POST['title']) ||
        !empty($_POST['content']) ||
        !empty($_POST['price'])
    ) {
        $path = $_FILES['img']['tmp_name'];
        $uploads = '../../Content/Images/Uploads/';
        $nameimg = $_FILES['img']['name'];
        $img =  handel_img($path, $uploads, $nameimg);
        $data = [
            'title' => test_input($_POST['title']),
            'content' => test_input($_POST['content']),
            'price' => test_input($_POST['price']),
            'discount' => test_input($_POST['discount']),
            'img' => $img
        ];
        $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Thêm Thành Công!</h7>";
        insert_voucer($data);
        $VIEW_NAME = 'add.php';
    } else {
        $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Không bỏ trống!</h7>";
        $VIEW_NAME = 'add.php';
    }
} elseif (exist_params('btn_edit')) {
    $id = $_GET['btn_edit'];
    $item = select_one_voucher($id);
    $VIEW_NAME = 'edit.php';
} elseif (exist_params('btn_update')) {
    if (is_file($_FILES['img']['tmp_name'])) {
        $path = $_FILES['img']['tmp_name'];
        $uploads = '../../Content/Images/Uploads/';
        $nameimg = $_FILES['img']['name'];
        $img =  handel_img($path, $uploads, $nameimg);
        $data = [
            'title' => test_input($_POST['title']),
            'content' => test_input($_POST['content']),
            'price' => test_input($_POST['price']),
            'discount' => test_input($_POST['discount']),
            'img' => $img,
            'id' => $_POST['id']
        ];
        update_voucher($data);
        $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Cập Nhật Thành Công!</h7>";
        $VIEW_NAME = 'list.php';
    } else {
        $data = [
            'title' => test_input($_POST['title']),
            'content' => test_input($_POST['content']),
            'price' => test_input($_POST['price']),
            'discount' => test_input($_POST['discount']),
            'img' => test_input($_POST['img_base']),
            'id' => $_POST['id']
        ];
        update_voucher($data);
        $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Cập Nhật Thành Công!</h7>";
        $VIEW_NAME = 'list.php';
    }
}
//delete news
elseif (exist_params('btn_delete')) {
    $id = $_GET['btn_delete'];
    delete_one($id);
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Xóa Thành Công!</h7>";
    header('location: ' . $ADMIN_URL . '/Voucher/index.php');
    die;
} elseif (exist_params('btn_change')) {
    update_voucher_change($_GET['btn_change']);
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Chuyển trạng thái thành công!</h7>";
    header('location: ' . $ADMIN_URL . '/Voucher/index.php');
    die;
} else {
    $VIEW_NAME = 'list.php';
}
require_once '../layouts.php';
