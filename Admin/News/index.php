<?php
require_once '../../global.php';
require_once '../../Dao/Pdo.php';
require_once '../../Dao/News.php';
extract($_REQUEST);
if (exist_params('btn_add')) {
    $VIEW_NAME = 'add.php';
} elseif (exist_params('btn_insert')) {

    $path = $_FILES['img']['tmp_name'];
    $uploads = '../../Content/Images/Uploads/';
    $nameimg = $_FILES['img']['name'];
    $img =  handel_img($path, $uploads, $nameimg);
    $data = [
        'title' => test_input($_POST['title']),
        'img' => $img,
        'content' => test_input($_POST['content'])
    ];
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Thêm Thành Công!</h7>";
    insert_new($data);
    $VIEW_NAME = 'add.php';
}
//update news
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
        $img_hand =handel_img($path, $uploads, $nameimg);
        $data = [
            'title' => test_input($_POST['title']),
            'img' => $img_hand,
            'content' => test_input($_POST['content']),
            'id_news' => test_input($_POST['id_news'])
        ];
    } else {
        $data = [
            'title' => test_input($_POST['title']),
            'img' => test_input($_POST['img_base']),
            'content' => test_input($_POST['content']),
            'id_news' => test_input($_POST['id_news'])
        ];
    }
    update_news($data);
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Cập Nhật Thành Công!</h7>";
    header('location: ' . $ADMIN_URL . '/News/index.php');
    die;
}
//delete news
elseif (exist_params('btn_delete')) {
    $id = $_GET['btn_delete'];
    $data = [
        'id' => $id
    ];
    $message = "<h7 class='font-weight-bold text-center text-success p-3'>Xóa Thành Công!</h7>";
    //delete on 'villa'
    $news =   delete_news($id);
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Xóa Thành Công!</h7>";
    header('location: ' . $ADMIN_URL . '/News/index.php');
    die;
} elseif (exist_params('view')) {
    $id = $_GET['view'];
    $data = [
        'id' => $id
    ];
    $news_item = select_one_new($id);
    // var_dump($new);die;
    $VIEW_NAME = 'list.php';
} else {
    $VIEW_NAME = 'list.php';
}
require_once '../layouts.php';
