<?php
require_once '../../global.php';
require_once '../../Dao/Pdo.php';
require_once '../../Dao/Category_Villa.php';
extract($_REQUEST);
if (exist_params('btn_add')) {
    if (
        isset($_POST['name_category']) &&
        isset($_POST['price']) &&
        is_file($_FILES['img']['tmp_name'])
    ) {
        $path = $_FILES['img']['tmp_name'];
        $uploads = '../../Content/Images/Uploads/';
        $nameimg = $_FILES['img']['name'];
        $img =  handel_img($path, $uploads, $nameimg);
        $data = [
            'name_category' => test_input($_POST['name_category']),
            'img' => $img,
            'price' => test_input($_POST['price'])
        ];
        insert_category($data);
        $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Thêm thành công!</h7>";
        header('location: index.php');
        die;
    } else {
        $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-danger p-3'>Không để trống!</h7>";
        header('location: index.php');
        die;
    }
} else if (exist_params('btn_delete')) {
    $id = $_GET['btn_delete'];
    delete_category($id);
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Xóa thành công</h7>";
    header('location: ' . $ADMIN_URL . '/Category_Villa/index.php');
    die;
} elseif (exist_params('btn_edit')) {
    $id = $_GET['btn_edit'];
    $VIEW_NAME = 'edit.php';
} elseif (exist_params('btn_update')) {
    $data = [
        'title' => test_input($_POST['title']),
        'id' => test_input($_POST['id'])
    ];
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Sửa thành công</h7>";
    update_category_villa($data);
    header('location: ' . $ADMIN_URL . '/Category_Villa/index.php');
} else {
    $data = select_all_category();
    $VIEW_NAME = 'Category.php';
}
require_once '../layouts.php';
