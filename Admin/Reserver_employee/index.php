<?php
require_once '../../global.php';
require_once '../../Dao/Pdo.php';
require_once '../../Dao/Author.php';
require_once '../../Dao/Reserve.php';
extract($_REQUEST);
if (exist_params('btn_insert')) {
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    if (isset($_POST["id_voucher"]) && !empty($_POST["id_voucher"])) {
        $data = [
            "id_customers" => $_POST["id_customers"],
            "start_date" => $start_date,
            "end_date" => $end_date,
            "status" => 'Chờ xác nhận',
            "id_voucher" => $_POST["id_voucher"],
            "number_people" => $_POST['quantity']
        ];
        if (insert_reserve($data) == true) {
            $id_reserver = select_one_reserve();
            foreach ($_SESSION['cart'] as $key => $value) {
                if (isset($_SESSION['cart_option']) || !empty($_SESSION['cart_option'])) {
                    foreach ($_SESSION['cart_option'] as $key => $value_option) {
                        insert_id_villa_reserve(intval($id_reserver['id_reserver']), intval($value['id_villa']), intval($value_option['id']));
                    }
                } else {
                    insert_id_villa_not_service_reserve(intval($id_reserver['id_reserver']), intval($value['id_villa']));
                }
            }
            $_SESSION['message'] = "Đặt thành công!";
            unset($_SESSION['cart']);
            unset($_SESSION['cart_option']);
            unset($_SESSION['voucher']);
            unset($_SESSION['voucher_sales']);
            header('location: ' . $LAYOUT_URL . '/login.php');
            die;
        }
    } else {
        $data = [
            "id_customers" => $_POST["id_customers"],
            "start_date" => $start_date,
            "end_date" => $end_date,
            "status" => 'Chờ xác nhận',
            "number_people" => $_POST['quantity']
        ];

        if (insert_not_voucher_reserve($data) == true) {
            $id_reserver = select_one_reserve();
            foreach ($_SESSION['cart'] as $key => $value) {
                if (isset($_SESSION['cart_option']) || !empty($_SESSION['cart_option'])) {
                    foreach ($_SESSION['cart_option'] as $key => $value_option) {
                        insert_id_villa_reserve(intval($id_reserver['id_reserver']), intval($value['id_villa']), intval($value_option['id']));
                    }
                } else {
                    insert_id_villa_not_service_reserve(intval($id_reserver['id_reserver']), intval($value['id_villa']));
                }
            }
            $_SESSION['message'] = "Đặt thành công!";
            unset($_SESSION['cart']);
            unset($_SESSION['cart_option']);
            unset($_SESSION['voucher']);
            unset($_SESSION['voucher_sales']);
            header('location: ' . $LAYOUT_URL . '/login.php');
            die;
        }
    }
} elseif (exist_params('change_status_reserver')) {
    $status = $_POST['status'];
    $id_reserver = intval($_POST['id_reserver']);
    change_status($status, $id_reserver);
    if (isset($_POST['id_villa_hidden'])) {
        hidden_villa($_POST['id_villa_hidden']);
    }
    if (isset($_POST['id_villa_block'])) {
        block_villa($_POST['id_villa_block']);
    }
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>" . $status . " thành công!</h7>";
    echo "<script>
        window.history.back();
        </script>";
    die;
} elseif (exist_params('confirmed')) {
    $data = select_all_reserver_where("Đặt thành công");
    $VIEW_NAME = 'confirmed.php';
} elseif (exist_params('active')) {
    $data = select_all_reserver_where("Đang hoạt động");
    $VIEW_NAME = 'active.php';
} elseif (exist_params('cancel')) {
    $data = select_all_reserver_where("Hủy");
    $VIEW_NAME = 'cancel.php';
} elseif (exist_params('completed')) {
    $data = select_all_reserver_where("Hoàn thành");
    $VIEW_NAME = 'completed.php';
} elseif (exist_params('details')) {
    $id = $_GET['details'];
    $data = select_one_villa_reserver($id);
    $VIEW_NAME = 'details.php';
} else {
    $data = select_all_reserver_where("Chờ xác nhận");
    // echo "<pre>"; var_dump($data);die;
    $VIEW_NAME = 'list.php';
}
require_once '../employee_layout.php';
