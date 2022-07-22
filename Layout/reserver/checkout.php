<?php
require_once '../../global.php';
require_once '../../Dao/Pdo.php';
require_once '../../Dao/service.php';
require_once '../../Dao/Voucher.php';
require_once '../../Dao/Author.php';
$user = select_one_customer($_SESSION['user']['id_customers']);
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    $_SESSION['loi'] = "Vui lòng chọn biệt thự muốn đi!";
    header('location: ' . $LAYOUT_URL . '/stay.php');
    die;
}
if (!isset($_SESSION['cart_option'])) {
    $_SESSION['cart_option'][0] = [
        'title' => 'N/A',
        'price' => 0,
        'id' => 1
    ];
}
if (!isset($_SESSION['voucher'])) {
    $_SESSION['voucher'] = 1;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/style.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/reserver.css">
</head>

<body>

    <main>
        <section class="booking header ">
            <nav class="navbar">
                <div class="container">
                    <a href="<?= $LAYOUT_URL ?>/reserver/service.php" class="btn">
                        <span class="fas fa-long-arrow-alt-left"></span>
                    </a>
                    <div class="navbar-content">
                        <a href="<?= $LAYOUT_URL ?>" class="fas fa-home mr-3"></a>
                        <button class="fas fa-sign-in-alt"></button>
                    </div>
                </div>
            </nav>
        </section>
        <div class="container mt-5">
            <div class="row g-5 mt-3">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Chi tiết đặt phòng</span>
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
                                            <p style="font-size:13px" class="text-black my-0"><?= $item_option['title'] ?> x <i><?= number_format($item_option['price']) ?></i> </p>
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
                                <button class="btn btn-primary">Tiếp tục</button>
                            </li>
                        </ul>
                    </form>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3 d-flex justify-content-between">Hóa đơn
                        <!-- <div>Tự động hủy phòng sau: <span id="time"> 15:00</span></div> -->
                    </h4>
                    <h4>
                        <?php if (isset($_SESSION['thanks'])) {
                            echo $_SESSION['thanks'];
                            unset($_SESSION['thanks']);
                        } ?>
                    </h4>
                    <form class="needs-validation" action="<?= $ADMIN_URL ?>/Reserver/index.php?btn_insert" method="POST">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="email" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" name="name" value="<?php if (isset($user['full_name'])) : echo $user['full_name'];
                                                                                            endif ?>">
                                <input type="hidden" class="form-control" name="id_customers" value="<?php if (isset($user['id_customers'])) : echo $user['id_customers'];
                                                                                                        endif ?>">
                                <div class="invalid-feedback">
                                    Hello.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" value="<?php if (isset($user['email'])) : echo $user['email'];
                                                                                endif ?>" name="email" id="email" placeholder="abc@example.com">
                                <div class="invalid-feedback">
                                    Hello.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Số điện thoại</label>
                                <input type="number" name="sdt" value="<?php if (isset($user['sdt'])) : echo $user['sdt'];
                                                                        endif ?>" class="form-control" id="sdt">
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" value="<?php if (isset($user['address'])) : echo $user['address'];
                                                                                endif ?>" name="address" placeholder="1234 HaNoi" required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                            <input type="hidden" name="id_voucher" value="<?php if (isset($_SESSION['voucher'])) {
                                                                                echo $_SESSION['voucher'];
                                                                            }  ?>">
                            <input type="hidden" name="start_date" value="<?= $item_cart['start_date'] ?>">
                            <input type="hidden" name="end_date" value="<?= $item_cart['date_end'] ?>">
                            <input type="hidden" name="quantity" value="<?= $item_cart['adults'] + $item_cart['kids'] ?>">
                        </div>
                        <hr class="my-4">

                        <button <?php
                                if (!isset($user) && empty($user)) {
                                    echo 'disabled';
                                } ?> class="w-100 btn btn-primary btn-lg" type="submit">Hoàn tất đặt phòng</button>
                    </form>
                </div>
            </div>
    </main>
    </div>
    <script>
        function startTimer(duration, display) {
            var timer = duration,
                minutes, seconds;
            setInterval(function() {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        window.onload = function() {
            var fiveMinutes = 60 * 15,
                display = document.querySelector('#time');
            startTimer(fiveMinutes, display);
        };
    </script>
    <!-- FOOTER -->
    <!-- FOOTER -->
    <!-- FOOTER -->
    <!-- FOOTER -->
    <!-- FOOTER -->
    <?php
    require_once '../Site/footer.php';
