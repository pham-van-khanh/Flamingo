<?php
require_once '../../global.php';
require_once '../../Dao/Pdo.php';
require_once '../../Dao/Villa.php';
extract($_REQUEST);
if (exist_params('btn_add')) {
    // var_dump($_GET['btn_add']);die;
    $VIEW_NAME = 'add.php';
}
/* 
* Thêm dữ liệu vào database
**/ elseif (exist_params('btn_insert')) {
    if (isset($_POST['submit'])) {
        if (
            empty($_POST['names']) ||
            empty($_POST['price_sale']) ||
            empty($_POST['price']) ||
            empty($_POST['description']) ||
            empty($_POST['quantity']) ||
            empty($_POST['area']) ||
            empty($_POST['view'])
        ) {
            $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-danger p-3'>Kiểm tra lại!</h7>";
            header('location: http://localhost/du_an_flamingo/Admin/Villa/?btn_add=' . $_GET['btn_insert']);
            die;
        } else {
            $path = $_FILES['img']['tmp_name'];
            $uploads = '../../Content/Images/Uploads/';
            $nameimg = $_FILES['img']['name'];
            $img =  handel_img($path, $uploads, $nameimg);
            // move_uploaded_file($path, '../../Content/Images/Uploads/' . $_FILES['img']['name']);
            // $img = 'Uploads/' . $_FILES['img']['name'];
            $data = [
                'names' => test_input($_POST['names']),
                'img' =>   $img,
                'villa_category_id' => $_GET['btn_insert'],
                'price_sale' => intval(test_input($_POST['price_sale'])),
                'price' => intval(test_input($_POST['price'])),
                'description' => test_input($_POST['description']),
                'quantity' => intval(test_input($_POST['quantity'])),
                'area' => intval(test_input($_POST['area'])),
                'view' => test_input($_POST['view']),
                'bedrooms' => intval(test_input($_POST['bedrooms']))

            ];
            insert_Villa($data);
            $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Thêm Thành Công!</h7>";
            header('location: http://localhost/du_an_flamingo/Admin/Villa/?btn_add=' . $_GET['btn_insert']);
            die;
        }
    }
}
//cập nhật flamingo
elseif (exist_params('btn_edit')) {
    $id = $_GET['btn_edit'];
    $data = [
        'id' => $id
    ];
    $VIEW_NAME = 'edit.php';
} elseif (exist_params('btn_update')) {
    if (is_file($_FILES['img']['tmp_name'])) {
        $path = $_FILES['img']['tmp_name'];
        $uploads = '../../Content/Images/Uploads/';
        $nameimg = $_FILES['img']['name'];
        $img_hand = handel_img($path, $uploads, $nameimg);
        $data = [
            'names' => test_input($_POST['names']),
            'price_sale' => intval(test_input($_POST['price_sale'])),
            'price' => intval(test_input($_POST['price'])),
            'description' => test_input($_POST['description']),
            'quantity' => intval(test_input($_POST['quantity'])),
            'area' => intval(test_input($_POST['area'])),
            'view' => test_input($_POST['view']),
            'img' => $img_hand,
            'id_villa' => test_input($_POST['id_villa'])
        ];
        update_villa($data);
        $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Cập Nhật Thành Công!</h7>";
        header('location: http://localhost/du_an_flamingo/Admin/Villa/?id=' . $_GET['btn_update']);
        die;
    } else {
        $data = [
            'names' => test_input($_POST['names']),
            'price_sale' => intval(test_input($_POST['price_sale'])),
            'price' => intval(test_input($_POST['price'])),
            'description' => test_input($_POST['description']),
            'quantity' => intval(test_input($_POST['quantity'])),
            'area' => intval(test_input($_POST['area'])),
            'view' => test_input($_POST['view']),
            'img' => test_input($_POST['img_base']),
            'id_villa' => test_input($_POST['id_villa'])
        ];
        update_villa($data);
        $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Cập Nhật Thành Công!</h7>";
        header('location: http://localhost/du_an_flamingo/Admin/Villa/?id=' . $_GET['btn_update']);
        die;
    }
}
//xóa flamingo theo id
elseif (exist_params('btn_delete')) {
    $id = $_GET['btn_delete'];
    $data = [
        'id' => $id
    ];
    $message = "<h7 class='font-weight-bold text-center text-success p-3'>Xóa Thành Công!</h7>";
    //delete on 'villa'
    $villa =   delete_villa($id);
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Xóa Thành Công!</h7>";
    header('location: http://localhost/du_an_flamingo/Admin/Villa/?id=' . $_GET['villa_category_id']);
    die;
} else {
    $VIEW_NAME = 'room.php';
}
/* 
Code logic
*/

require_once '../layouts.php';
