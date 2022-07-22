<?php
require_once '../../global.php';
require_once '../../Dao/Pdo.php';
require_once '../../Dao/Author.php';
extract($_REQUEST);
/* 
* @param string
* Xử lý đăng ký
*/
if (exist_params('btn_register')) {

    if (
        isset($_POST['name']) &&
        isset($_POST['email']) &&
        isset($_POST['pass']) &&
        isset($_POST['phone']) &&
        !empty($_POST['name']) &&
        !empty($_POST['email']) &&
        !empty($_POST['pass']) &&
        !empty($_POST['phone'])

    ) {        /* 
    * @param string
    * Kiểm tra email có tồn tại trong dtb hay không
    */
        $total =  select_author($_POST['email']);
        // var_dump($total);die;
        /* 
    * Nếu chưa tồn tại thì sẽ cho phép đăng kí
    */
        if ($total < 1) {
            $path = $_FILES['img']['tmp_name'];
            $uploads = '../../Content/Images/Uploads/';
            $nameimg = $_FILES['img']['name'];
            $img =  handel_img($path, $uploads, $nameimg);
            $data = [
                'name_author' => test_input($_POST['name']),
                'email' => test_input($_POST['email']),
                'pass' => md5(test_input($_POST['pass'])),
                'img' => $img,
                'phone' => intval(test_input($_POST['phone']))
            ];
            insert_author($data);
            echo "
                    <script>
                    window.history.back();
                    </script>
        ";
            die;
        } else {
            $_SESSION['err'] = 'Email đã tồn tại';
            echo "
                    <script>
                    window.history.back();
                    </script>
        ";
            die;
        }
    } else {
        $_SESSION['err'] = 'Vui lòng không để trông đăng kí!';
        echo "
                    <script>
                    window.history.back();
                    </script>
        ";
        die;
    }
}
/* 
* @param string
* Xử lý đăng nhập
*/ elseif (exist_params('btn_login')) {
    if (
        !isset($_POST['email']) ||
        !isset($_POST['pwd']) ||
        empty($_POST['email']) ||
        empty($_POST['pwd'])
    ) {
        $_SESSION['err'] = "Không được để trống!";
        echo "
                    <script>
                    window.history.back();
                    </script>
        ";
        die;
    } else {
        $user = login($_POST['email'], $_POST['pwd']);
        if ($user['status'] == 0) {
            $_SESSION['err'] = "Tài khoản của bạn đã bị khóa vui lòng liên hệ lại với chúng tôi để mở lại tài khoản!";
            echo "
            <script>
            window.history.back();
            </script>
";
            die;
        }
        if (empty($user) == true) {
            $_SESSION['err'] = "Sai tài khoản hoặc mật khẩu";
            echo "
                    <script>
                    window.history.back();
                    </script>
        ";
            die;
        } else {
            $_SESSION['user'] = $user;
            echo "
                    <script>
                    window.history.back();
                    </script>
        ";
            die;
        }
    }
}
//update customers
elseif (exist_params('btn_edit')) {
    $id = $_GET['btn_edit'];
    $data = [
        'id' => $id
    ];
    $VIEW_NAME = 'edit_customer.php';
} elseif (exist_params('btn_update')) {
    $data = [
        'email' => test_input($_POST['email']),
        'phone' => test_input($_POST['phone']),
        'name' => test_input($_POST['name']),
        'address' => test_input($_POST['address']),
        'id_customers' => test_input($_POST['id_customers'])
    ];
    update_customers($data);
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Cập Nhật Thành Công!</h7>";
    header('location: ' . $ADMIN_URL . '/Author');
    die;
} elseif (exist_params('btn_update_login')) {
    $path = $_FILES['img']['tmp_name'];
    $uploads = '../../Content/Images/Uploads/';
    $nameimg = $_FILES['img']['name'];
    $img =  handel_img($path, $uploads, $nameimg);
    $data = [
        'name' => test_input($_POST['name']),
        'email' => test_input($_POST['email']),
        'pass' => test_input($_POST['pass']),
        'img' =>  $img,
        'phone' => test_input($_POST['phone']),
        'address' => test_input($_POST['address']),
        'id_customers' => test_input($_POST['id_customers'])
    ];
    update_customers_login($data);
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Cập Nhật Thành Công!</h7>";
    header('location: ' . $LAYOUT_URL . '/login.php');
    die;
}
//delete customer
elseif (exist_params('btn_lock')) {
    $id = $_GET['btn_lock'];
    lock_customer($id);
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Khóa Thành Công!</h7>";
    header('location: ' . $ADMIN_URL . '/Author');
    die;
} elseif (exist_params('btn_unlock')) {
    $id = $_GET['btn_unlock'];
    unlock_customer($id);
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Mở Thành Công!</h7>";
    header('location: ' . $ADMIN_URL . '/Author');
    die;
} elseif (exist_params('btn_forgot')) {
    if (
        empty($_POST['email']) ||
        empty($_POST['pwd']) ||
        empty($_POST['re_pwd'])

    ) {
        $_SESSION['err'] = 'Không được để trống!';
        echo "
                    <script>
                    window.history.back();
                    </script>
        ";
        die;
    }
    if (
        $_POST['re_pwd'] !== $_POST['pwd']
    ) {
        $_SESSION['err'] = 'Nhập lại mật khẩu không trùng khớp!';
        echo "
                    <script>
                    window.history.back();
                    </script>
        ";
        die;
    }

    $data = [
        'email' => test_input($_POST['email']),
        'pwd' => md5($_POST['pwd'])
    ];



    forgot_password($data);
    $_SESSION['err'] = 'Lấy lại tài khoản thành công!';
    echo "
                <script>
                window.history.back();
                </script>
    ";
    die;
} else {
    $VIEW_NAME = 'author.php';
}
require_once '../layouts.php';
