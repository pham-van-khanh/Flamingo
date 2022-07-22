<?php
require '../global.php';
if (!isset($_SESSION['admin']) && empty($_SESSION['admin'])) {
    header('Location: login.php');
    die;
}
require_once '../Dao/Pdo.php';
require_once '../Dao/Villa.php';
require_once '../Dao/Admin.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị</title>
    <!-- CDn icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js">
    </script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Bootrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/admins.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body id="body-pd">
    <?php
    require_once './nav.php';
    ?>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4>Chỉnh sửa website</h4>
        <div class="container">
            <div class="d-flex flex-wrap text-center justify-content-around">
                <div style="width: 150px; height: 150px;" class="p-3 rounded bg-primary">
                    <ion-icon name="build-outline" class="text-white h3"></ion-icon>
                    <br>
                    <a href="<?= $ADMIN_URL ?>/Banner/index.php" class="font-weight-bold text-center text-white">Tùy chỉnh banner</a>
                </div>
                <!--        <div style="width: 150px; height: 150px;" class="p-3 rounded bg-success">
                    <ion-icon name="build-outline" class="text-white h3"></ion-icon>
                    <br>
                    <a href="<?= $ADMIN_URL ?>/Footer/index.php" class="font-weight-bold text-center text-white">Tùy chỉnh footer</a>
                </div> -->
                <div style="width: 150px; height: 150px;" class="p-3 rounded bg-info">
                    <ion-icon name="build-outline" class="text-white h3"></ion-icon>
                    <br>
                    <a href="<?= $ADMIN_URL ?>/Logo/index.php" class="font-weight-bold text-center text-white">Tùy chỉnh logo</a>
                </div>

            </div>
        </div>
        <?php
        // $data = select_all_reserver();
        // // echo '<pre>';
        // // var_dump($data);die;
        ?>
        <hr>

    </div>
    <!--Container Main end-->

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src='<?= $CONTENT_URL ?>/JS/admin.js'></script>
    <script>
        function alter_delete() {
            return confirm('Bạn có muốn xóa không');
        }

        function sigout() {
            return confirm('Bạn có muốn đăng xuất');
        }
    </script>
</body>

</html>