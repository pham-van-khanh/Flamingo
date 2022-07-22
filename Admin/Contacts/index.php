<?php
require_once '../../global.php';
require_once '../../Dao/Pdo.php';
require_once '../../Dao/Contact.php';

extract($_REQUEST);
if (exist_params('btn_insert')) {
    if (
        isset($_POST['name']) &&
        isset($_POST['sdt']) &&
        isset($_POST['email']) &&
        isset($_POST['noidung'])
    ) {
        $data = [
            'name' => test_input($_POST['name']),
            'sdt' => test_input($_POST['sdt']),
            'email' => test_input($_POST['email']),
            'noidung' => test_input($_POST['noidung']),
            'date_contacts' => date("Y-m-d")
        ];
        $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Cảm ơn bạn đã liên hệ!</h7>";
        insert_contacts($data);
        header('location: ' . $LAYOUT_URL . '/contact.php#contact');
        die;
    } else {
        $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Vui lòng không để trống!</h7>";
        header('location: ' . $LAYOUT_URL . '/contact.php#contact');
        die;
    }
} elseif (exist_params('contact_return')) {
    update_contact($_GET['contact_return']);
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Liên hệ  thành công!</h7>";
    header('location: ' . $ADMIN_URL . '/Contacts/index.php');
    die;
} elseif (exist_params('btn_delete')) {
    $data = [
        'id' => $_GET['btn_delete']
    ];
    delete_contacts($data);
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Xóa thành công!</h7>";
    header('location: ' . $ADMIN_URL . '/Contacts/index.php');
    die;
} else {
    $VIEW_NAME = 'list.php';
}
require_once '../layouts.php';
