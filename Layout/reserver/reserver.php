<?php
require_once '../../global.php';
require_once '../../Dao/Pdo.php';
require_once '../../Dao/Category_villa.php';
require_once '../../Dao/Villa.php';
if (isset($_POST['submit'])) {
    if (strtotime($_POST['date_start']) >= strtotime($_POST['date_end'])) {
        $_SESSION['err'] = "Ngày không hợp lệ!";
        header('location: ' . $LAYOUT_URL . '/index.php');
        die;
    }
}
$data_category = select_all_category();
if (isset($_GET['check'])) {
    $id_category = $_POST['id_category'];
    $number_people = $_POST['number_people'];
    $data =  select_all_where_category_villa($id_category, $number_people);
} else {
    $data = select_villa();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt phòng</title>
    <!-- CDN ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only bootrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/style.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/reserver.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="<?= $CONTENT_URL ?>/Images/logo.png" alt="logo" class="nav__logo">
                </a>
                <div class="navbar-content">
                    <a href="<?= $LAYOUT_URL ?>" class="fas fa-home mr-3"></a>
                    <button data-target="#exampleModalCenter" data-toggle="modal" class="fas fa-sign-in-alt"></button>
                </div>
            </div>
        </nav>
    </header>
    <!-- MAIN START -->
    <!-- MAIN START -->
    <main>
        <!-- HOTEL BOOKING START -->
        <!-- HOTEL BOOKING START -->
        <section class="booking">
            <div class="container">
                <form action="?check" method="POST">
                    <div class="row p-5">
                        <div class="col">
                            <div class="form-group">
                                <label for="hotel" class="text-white">Loại villa</label>
                                <select name="id_category" class="form-control " id="">
                                    <?php
                                    foreach ($data_category as $item_category) {
                                    ?>
                                        <option value="<?= $item_category['id'] ?>"><?= $item_category['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="start_date" class="text-white">Ngày bắt đầu</label>
                                <input class="form-control " type="date" name="start_date" value="<?php if (isset($_POST['submit'])) {
                                                                                                        echo $_POST['date_start'];
                                                                                                    } else {
                                                                                                        echo $date_start;
                                                                                                    } ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="date_end" class="text-white">Ngày kết thúc</label>
                                <input class="form-control " type="date" name="end_date" value="<?php if (isset($_POST['submit'])) {
                                                                                                    echo $_POST['date_end'];
                                                                                                } else {
                                                                                                    echo $date_end;
                                                                                                }  ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="hotel" class="text-white">Số phòng</label>
                                <select name="number_room" class="form-control " id="">
                                    <option value="1">1 phòng</option>
                                    <option value="2">2 phòng</option>
                                    <option value="3">3 phòng</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="hotel" class="text-white">Số lượng</label>
                                <input class="form-control " name="number_people" type="number" min="1" max="50" value="1" id="output-box">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for=""></label>
                                <input class="form-control btn btn-success" type="submit" value="Kiểm tra">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- HOTEL BOOKING START -->
        <!-- HOTEL BOOKING START -->
        <?php
        if (isset($data) && !empty($data)) :
            foreach ($data as $item) {  ?>
                <section class="villa m-5 p-3 bg-white">
                    <div class=" container">
                        <div class="row d-flex justify-content-between">
                            <div class="col-4">
                                <div class="col-img">
                                    <img src="<?= $CONTENT_URL ?>/Images/<?= $item['images'] ?>" alt="">
                                </div>
                                <div class="row">
                                    <h2 class="text-center heading-title mb-2 p-2">Dịch vụ chung</h2>
                                </div>
                                <div class="row d-flex justify-content-between">
                                    <div class="col d-flex flex-column text-center"><i class="fas fa-wifi size-icon"></i>
                                        <div class="col-conent mt-3">Wifi miễn phí</div>
                                    </div>
                                    <div class="col d-flex flex-column text-center"><i class="fas fa-bath size-icon"></i>
                                        <div class="col-conent mt-3">Phòng tắm riêng</div>
                                    </div>
                                    <div class="col d-flex flex-column text-center"><i class="fas fa-tv size-icon"></i>
                                        <div class="col-conent mt-3">Tivi</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 d-flex flex-column">
                                <h2 class="heading-title mb-2 font-weight-bold"><?= $item['name'] ?></h2>
                                <div class="row d-flex justify-content-between">
                                    <div class="col d-flex flex-column text-center"><i class="fas size-icon fa-user"></i>
                                        <div class="col-conent mt-3"><?= $item['quantity'] ?> người</div>
                                    </div>
                                    <div class="col d-flex flex-column text-center"><i class="fas size-icon fa-bed"></i>
                                        <div class="col-conent mt-3"><?= $item['bedrooms'] ?> Giường</div>
                                    </div>
                                    <div class="col d-flex flex-column text-center"><i class="fas size-icon fa-ruler-vertical"></i>
                                        <div class="col-conent mt-3"><?= $item['area'] ?>m<sup>2</sup></div>
                                    </div>
                                </div>
                                <form action="./service.php" method="post">
                                    <div class="row">
                                        <p>
                                            <?= htmlspecialchars_decode($item['desciption']) ?>
                                        </p>
                                        <ul>
                                            <li><i style="font-size:13px"><i class="fas fa-utensils"></i> Đã bao gồm bữa sáng</i></li>
                                            <li><i data-target="#details_service" data-toggle="modal" style="font-size:13px; cursor: pointer;"><i class="fas fa-info"></i> Chi tiết</i></li>
                                        </ul>
                                        <h3><?= number_format($item['price']) ?></h3>
                                        <a href="<?= $LAYOUT_URL ?>/details.php?id=<?= $item['id_villa'] ?>">Xem chi tiết</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                </section>
        <?php
            }
        endif
        ?>
    </main>
    <!-- FOOTER -->
    <!-- FOOTER -->
    <!-- FOOTER -->
    <!-- FOOTER -->
    <!-- FOOTER -->
    <?php
    require_once '../Site/footer.php';
