<?php
require '../global.php';
require_once '../Dao/Pdo.php';
require_once '../Dao/Employee.php';
if (isset($_POST['submit'])) {
    if (
        !isset($_POST['email']) ||
        !isset($_POST['pass']) ||
        empty($_POST['email']) ||
        empty($_POST['pass'])
    ) {
        $_SESSION['err'] = "Không được để trống!";
        header('location: ' . $ADMIN_URL . '/login_employee.php');
        die;
    } else {
        $employee = login_employee($_POST['email'], $_POST['pass']);
        if (empty($employee) == true) {
            $_SESSION['err'] = "Sai tài khoản hoặc mật khẩu";
            header('location: ' . $ADMIN_URL . '/login_employee.php');
            die;
        } else {
            $_SESSION['employee'] = $employee;
            header('location: ' . $ADMIN_URL . '/Reserver_employee/index.php');
            die;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/login.css">
</head>

<body>
    <div class="center">
        <?php
        if (isset($_SESSION['err'])) {
            echo "<h3>" . $_SESSION['err'] . "</h3>";
            unset($_SESSION['err']);
        }
        ?>
        <h1>Đăng nhập nhân viên</h1>
        <form method="post" method="post" action="<?= $ADMIN_URL ?>/login_employee.php">
            <div class="txt_field">
                <input type="email" name="email" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="password" name="pass" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="pass">
                <a href="<?= $LAYOUT_URL ?>/index.php" class="signup_link">Quay lại trang chủ</a>
            </div>
            <input type="submit" name="submit" value="Đăng nhập">
            <div class="signup_link">
            </div>
        </form>
    </div>
</body>

</html>