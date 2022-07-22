<?php
require_once '../../global.php';
require_once '../../Dao/Pdo.php';
require_once '../../Dao/Employee.php';
require_once '../../Dao/Admin.php';

extract($_REQUEST);
// thêm nhan viên
if (exist_params('btn_add')) {
    $VIEW_NAME = 'add.php';
} elseif (exist_params('btn_insert')) {
    if (isset($_POST['submit'])) {
        if (
            empty($_POST['email']) ||
            empty($_POST['pass']) ||
            empty($_POST['phone']) ||
            empty($_POST['name']) ||
            empty($_POST['address'])
        ) {
            $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-danger p-3'>Kiểm tra lại!</h7>";
            header('location: http://localhost/du_an_flamingo/Admin/Employee/?btn_add');
            die;
        } else {
            $path = $_FILES['avatar']['tmp_name'];
            $uploads = '../../Content/Images/Uploads/';
            $nameimg = $_FILES['avatar']['name'];
            $img =  handel_img($path, $uploads, $nameimg);
            $data = [
                'name' => test_input($_POST['name']),
                'email' => test_input($_POST['email']),
                'pass' => md5(test_input($_POST['pass'])),
                'avatar' => $img,
                'phone' => test_input($_POST['phone']),
                'address' => test_input($_POST['address'])

            ];
            $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Thêm Thành Công!</h7>";
            insert_employee($data);
            $VIEW_NAME = 'add.php';
        }
    }
}
//update employee
elseif (exist_params('btn_edit')) {
    $id = $_GET['btn_edit'];
    $data = [
        'id' => $id
    ];
    $VIEW_NAME = 'edit.php';
} elseif (exist_params('btn_update')) {
    $data = [
        'email' => test_input($_POST['email']),
        'phone' => test_input($_POST['phone']),
        'name' => test_input($_POST['name']),
        'address' => test_input($_POST['address']),
        'id_employee' => test_input($_POST['id_employee'])
    ];
    update_employee($data);
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Cập Nhật Thành Công!</h7>";
    header('location: http://localhost/du_an_flamingo/Admin/Employee/');
    die;
}
//delete customer
elseif (exist_params('btn_delete')) {
    $id = $_GET['btn_delete'];
    $data = [
        'id' => $id
    ];
    // $message = "<h7 class='font-weight-bold text-center text-success p-3'>Xóa Thành Công!</h7>";
    //delete on 'villa'
    $news =   delete_employee($id);
    $_SESSION['message'] = "<h7 class='text-center text-success p-3'>Xóa Thành Công!</h7>";
    header('location: http://localhost/du_an_flamingo/Admin/Employee/');
    die;
} elseif (exist_params('admin')) {
    $VIEW_NAME = 'admin.php';
} elseif (exist_params('admin_id')) {
    $id = $_GET['admin_id'];
    $item_admin = select_one_admin($id);
    $VIEW_NAME = 'admin.php';

    // var_dump($item_admin);die;
} else {
    $VIEW_NAME = 'list.php';
}
require_once '../layouts.php';
