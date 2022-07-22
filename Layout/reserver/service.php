<?php
require_once '../../global.php';
require_once '../../Dao/Pdo.php';
require_once '../../Dao/service.php';
require_once '../../Dao/Voucher.php';
// session_destroy();
if (isset($_POST['submit'])) {
    if (strtotime($_POST['start_date']) >= strtotime($_POST['date_end'])) {
        $_SESSION['err'] = "Ngày không hợp lệ!";
        header('location: ' . $LAYOUT_URL . '/stay.php');
        die;
    }
    if (isset($_SESSION['cart'])) {
        $id_villa =  array_column($_SESSION['cart'], 'id_villa');
        if (in_array($_POST['id_villa'], $id_villa)) {
            echo "<script>
                    alert('Đã tồn tại!');
                    window.location.href='" . $LAYOUT_URL . "/reserver/service.php';
                </script>";
        } else {
            $count = count($_SESSION['cart']);
            foreach ($_SESSION['cart'] as $key => $val) {
                if ($val['date_end'] != $_POST['date_end'] || $val['start_date'] != $_POST['start_date']) {
                    foreach ($_SESSION['cart'] as $key1 => $val1) {
                        $_SESSION['cart'][$key1]['start_date'] = $_POST['start_date'];
                        $_SESSION['cart'][$key1]['date_end'] = $_POST['date_end'];
                    }
                }
            }
            $_SESSION['cart'][$count] =  [
                'id_villa' => $_POST['id_villa'],
                'name' => $_POST['name'],
                'start_date' => $_POST['start_date'],
                'date_end' => $_POST['date_end'],
                'price' => $_POST['price'],
                'adults' => $_POST['adults'],
                'kids' => $_POST['kids']
            ];
        }
    } else {
        $arr_item = [
            'id_villa' => $_POST['id_villa'],
            'name' => $_POST['name'],
            'start_date' => $_POST['start_date'],
            'date_end' => $_POST['date_end'],
            'price' => $_POST['price'],
            'adults' => $_POST['adults'],
            'kids' => $_POST['kids']
        ];
        $_SESSION['cart'][0] = $arr_item;
    }
}
if (isset($_POST['option'])) {
    if (isset($_SESSION['cart_option'])) {
        $id_option =  array_column($_SESSION['cart_option'], 'id');
        if (in_array($_POST['id'], $id_option)) {
        } else {
            $count_option = count($_SESSION['cart_option']);
            $_SESSION['cart_option'][$count_option] =
                [
                    'title' => $_POST['title'],
                    'price' => $_POST['price'],
                    'id' => $_POST['id']
                ];
        }
    } else {
        $option_item = [
            'title' => $_POST['title'],
            'price' => $_POST['price'],
            'id' => $_POST['id']
        ];
        $_SESSION['cart_option'][0] = $option_item;
    }
}
/* 
* Xóa phần tử trong $_SESSION
*/
if (isset($_GET['remove'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['id_villa'] == $_GET['remove']) {
            unset($_SESSION['cart'][$key]);
            echo "<script>
                    window.location.href='" . $LAYOUT_URL . "/reserver/service.php';
                </script>";
        }
    }
} elseif (isset($_GET['remove_option'])) {
    foreach ($_SESSION['cart_option'] as $key => $value) {
        if ($value['id'] == $_GET['remove_option']) {
            unset($_SESSION['cart_option'][$key]);
            echo "<script>
                    window.location.href='" . $LAYOUT_URL . "/reserver/service.php';
                </script>";
        }
    }
}
/* 
* Kiểm tra giảm giá
*/ elseif (isset($_POST['discount'])) {
    $discount = $_POST['discount'];
    $item_discount = select_discount_voucher($discount);
    if (isset($item_discount)) {
        $_SESSION['voucher'] = $item_discount['id_voucher'];
        $_SESSION['voucher_sales'] = $item_discount['sales'];
    }
    if ($discount == '') {
        echo "<script>
        alert('Không để trông');        
            </script>";
    }
    if (!isset($item_discount) || empty($item_discount)) {
        echo "<script>
        alert('Không có mã này');        
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chọn dịch phòng</title>
    <!-- CDN ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only bootrap -->

    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/style.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/reserver.css">
</head>

<body>
    <main>
        <section class="booking header ">
            <nav class="navbar">
                <div class="container">
                    <a href="<?= $LAYOUT_URL ?>/reserver/reserver.php" class="btn">
                        <span class="fas fa-long-arrow-alt-left"></span>
                    </a>
                    <div class="navbar-content">
                        <a href="<?= $LAYOUT_URL ?>" class="fas fa-home mr-3"></a>
                        <button data-target="#exampleModalCenter" data-toggle="modal" class="fas fa-sign-in-alt"></button>
                    </div>
                </div>
            </nav>
        </section>
        <div class="container mt-5">
            <div class="row g-5 mt-3">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Chi tiết đặt phòng</span>
                        <!-- <span class="badge bg-primary rounded-pill">1</span> -->
                    </h4>
                    <form action="<?= $LAYOUT_URL ?>/reserver/checkout.php" method="post">
                        <ul class="list-group mb-3">
                            <?php
                            $room = 1;
                            $totals = [];
                            foreach ($_SESSION['cart'] as $item_cart) {
                            ?>
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div>
                                        <h6 class="my-0"><b>Phòng <?= $room++ ?></b></h6>
                                        <p style="font-size:13px" class="text-black">Tên phòng <?= $item_cart['name'] ?></p>
                                        <p style="font-size:13px" class="text-black"><strong>
                                                <?php $date = date_diff(date_create($item_cart['date_end']), date_create($item_cart['start_date']))->format('%a');
                                                echo $date; ?>
                                            </strong> Đêm<br><strong>Từ: </strong> <?= $item_cart['start_date'] ?> <br> <strong>Đến: </strong><?= $item_cart['date_end'] ?></p>
                                        <p style="font-size:13px" class="text-black"><?= $item_cart['adults'] ?> Người lớn + <?= $item_cart['kids'] ?> Trẻ em </p>
                                        <p style="font-size:13px" class="text-black"><i>x 500.000(Phụ thu sẽ được hoàn trả)</i></p>
                                        <p style="font-size:13px" class="text-black"><b>Tổng số người:</b> <?= $item_cart['adults'] + $item_cart['kids'] ?></p>
                                        <button onclick="return false" data-toggle="modal" data-target="#details_cart" class="text-success" style="font-size:13px">Xem chi tiết</button>
                                    </div>
                                    <span class="text-black font-weight-bold"><?php $price = $item_cart['price'] * $date + 500000;
                                                                                array_push($totals, $price);
                                                                                echo number_format($price) ?> </span>
                                    <span><a href="?remove=<?= $item_cart['id_villa'] ?>" class="fas fa-trash-alt text-danger"></a></span>
                                </li>
                            <?php } ?>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6><b>Dịch vụ</b></h6>
                                    <?php
                                    $price_option = 0;
                                    if (!isset($_SESSION['cart_option'])) {
                                        echo '<p style="font-size:13px" class="text-black my-0">' . $price_option . '</p>';
                                    } else {
                                        foreach ($_SESSION['cart_option'] as $item_option) {
                                            $price_option += $item_option['price'];
                                    ?>
                                            <p style="font-size:13px" class="text-black my-0"><a href="?remove_option=<?= $item_option['id'] ?> " class="fas fa-minus-circle text-danger"></a><?= $item_option['title'] ?> x <i><?= number_format($item_option['price']) ?></i> </p>
                                    <?php }
                                    } ?>
                                </div>
                                <span class="text-muted "><?php array_push($totals, $price_option);
                                                            echo  number_format($price_option); ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <div class="text-success">
                                    <h6 class="my-0">Giảm giá</h6>
                                    <?php
                                    $price_sale  = 1;
                                    if (isset($_SESSION['voucher_sales'])) {
                                        $price_sale = (100 - $_SESSION['voucher_sales']) / 100;
                                    }
                                    ?>
                                    <small>
                                        <input type="hidden" name="id_voucher" value="<?php
                                                                                        if (isset($item_discount)) {
                                                                                            echo $_SESSION['voucher'];
                                                                                        }
                                                                                        ?>"> </small>
                                </div>
                                <span class="text-success"><?php echo isset($_SESSION['voucher_sales']) ? $_SESSION['voucher_sales'] . '%' : '0%'; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tổng tiền</span>
                                <strong><?= number_format(array_sum($totals) * $price_sale); ?></strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <button <?php if (!isset($_SESSION['user'])) {
                                            echo "onclick='return false' data-target='#exampleModalCenter' data-toggle='modal'";
                                        } ?> class="btn btn-primary">Tiếp tục</button>
                            </li>
                        </ul>
                    </form>
                    <form href="<?= $LAYOUT_URL ?>/reserver/service.php?discount" method="POST" class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" name="discount" placeholder="Voucher">
                            <button type="submit" class="btn btn-secondary">Kiểm tra</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h2 class="mb-3">Dịch vụ</h2>
                    <div class="row g-3  bg-light">
                        <?php
                        $data = select_all_service();
                        foreach ($data as $item) {
                        ?>
                            <form action="<?= $LAYOUT_URL ?>/reserver/service.php" method="post">
                                <div class="col-12 d-flex p-3">
                                    <img src="<?= $CONTENT_URL ?>/Images/<?= $item['img'] ?>" width="200px" height="200px" alt="">
                                    <div style="margin-left: 10px;" class="content ">
                                        <h4><?= $item['name'] ?></h4>
                                        <h6><strong><?= number_format($item['price']) ?></strong></h6>
                                        <input type="hidden" name="title" value="<?= $item['name'] ?>">
                                        <input type="hidden" name="price" value="<?= $item['price'] ?>">
                                        <input type="hidden" name="id" value="<?= $item['id_villa_sv'] ?>">
                                        <button name="option" class="btn btn-primary">Chọn</button>
                                    </div>
                            </form>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
        </div>
    </main>
    <div id="details_cart" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                ...
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <!-- FOOTER -->
    <!-- FOOTER -->
    <?php
    require_once '../Site/footer.php';
    ?>