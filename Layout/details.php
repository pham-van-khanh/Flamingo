<?php
require_once '../global.php';
require_once '../Dao/Pdo.php';
require_once '../Dao/Villa.php';
require_once '../Dao/Logo.php';
$id = $_GET['id'];
$item = select_one_villa($id);
// var_dump($item);die;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/style.css" />
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/bootstrap.min.css" />
    <!-- CDN icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/swiper-bundle.min.css" />
    <style>
        section.booking {
            background-image: radial-gradient(circle farthest-corner at 10% 20%, rgba(14, 174, 87, 1) 0%, rgba(12, 116, 117, 1) 90%);
        }
    </style>
</head>

<body>
    <?php
    require_once './Site/menu.php'
    ?>
    <main class="main">
        <!--==================== HOME ====================-->
        <div class="banner__details container-fluid">
            <img src="<?= $CONTENT_URL ?>/Images/<?= $item['images'] ?>" alt="" class="banner__details__img" />
        </div>
        <h2 class="name__details" style="opacity: 0;"><?= $item['name'] ?></h2>

        </div>
        <div style="z-index: 1; opacity: 0;" class="details__container container grid">
            <div class="home__box">
                <div class="home__box_content">
                    <div class="home__date content">
                        <h4>Thời gian</h4><input type="date"></input>-<input type="date"></input>
                    </div>
                    <div class="home__author content">
                        <h4>Số người</h4>
                        <button id="add-one">+</button>
                        <input style="min-width:1px;" type="number" min="1" max="50" value="1" id="output-box">
                        <button id="remove-one">-</button>
                    </div>
                    <button class="btn-color">Đặt ngay</button>
                </div>
            </div>
        </div>
        <!--==================== information ====================-->
        <form action="<?= $LAYOUT_URL ?>/reserver/service.php" method="post">
            <div class="container">
                <div class="row m-5 text-center">
                    <div class="col">
                        <a class="row__name">DIỆN TÍCH</a> <br> <?= $item['area'] ?>m<sup>2</sup>
                    </div>
                    <div class="col">
                        <a class="row__name">HƯỚNG</a> <br> <?= $item['view'] ?>
                    </div>
                    <div class="col">
                        <a class="row__name">PHÒNG</a> <br> <?= $item['bedrooms'] ?>
                    </div>
                    <div class="col">
                        <a class="row__name">SỐ LƯỢNG NGƯỜI</a> <br> 2-<?= $item['quantity'] ?>
                    </div>
                </div>
                <div class="row d-flex flex-column text-center m-3">
                    <div class="col">
                        <h1 class="h1"><?= $item['name'] ?> - <br> Không gian tối giản mà phong cách</h1>
                    </div>
                    <div class="col">
                        <p><?= htmlspecialchars_decode($item['desciption']) ?></p>
                    </div>

                    <!-- HOTEL BOOKING START -->
                    <section class="booking">
                        <div class="container">
                            <div class="row p-5">

                                <input class="form-control " type="hidden" name="name_room" value="<?= $item['name'] ?>">
                                <input class="form-control " type="hidden" name="price" value="<?= $item['price'] ?>">

                                <div class="col">
                                    <div class="form-group">
                                        <label for="hotel" class="text-white">Ngày bắt đầu</label>
                                        <input class="form-control" type="date" min="<?= $date_start ?>" name="start_date" value="<?= $date_start  ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="hotel" class="text-white">Ngày kết thúc</label>
                                        <input class="form-control " type="date" min="<?= $date_end ?>" name="date_end" value="<?= $date_end ?>">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="hotel" class="text-white">Người lớn</label>
                                        <input class="form-control " type="number" name="adults" min="1" max="50" value="1" id="output-box">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="hotel" class="text-white">Trẻ em</label>
                                        <input class="form-control " type="number" name="kids" min="1" max="50" value="1" id="output-box">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                    <input class="form-control " type="hidden" name="id_villa" value="<?= $item['id_villa']  ?>">
                    <input class="form-control " type="hidden" name="name" value="<?= $item['name']  ?>">
                    <input type="hidden" name="price" value=" <?php if (isset($item['price_sale']) && $item['price_sale'] != 0) {
                                                                    echo $item['price_sale'];
                                                                } else {
                                                                    echo  $item['price'];
                                                                } ?>">
                    <!-- <h2 class="text-center mt-2">Giá chỉ:
                     
                    </h2> -->
                    <!-- HOTEL BOOKING START -->
                    <div class="col mt-4">
                        <input type="submit" name="submit" class="button btn-color" value="Đặt ngay">
                    </div>
                </div>
            </div>
        </form>

        <!--==================== HOT ====================-->
        <section class="discover container section" id="discover">
            <h2 class="section__title">Chi tiết</h2>

            <div class="discover__container  swiper-container">
                <div class="swiper-wrapper">

                    <!--==================== DISCOVER 1 ====================-->
                    <div class="discover__card swiper-slide">
                        <img src="<?= $CONTENT_URL ?>/Images/<?= $item['img1'] ?>" alt="" class="discover__img">
                    </div>
                    <!--==================== DISCOVER 2 ====================-->
                    <div class="discover__card swiper-slide">
                        <img src="<?= $CONTENT_URL ?>/Images/<?= $item['img2'] ?>" alt="" class="discover__img">
                    </div>
                    <!--==================== DISCOVER 3 ====================-->
                    <div class="discover__card swiper-slide">
                        <img src="<?= $CONTENT_URL ?>/Images/<?= $item['img3'] ?>" alt="" class="discover__img">
                    </div>

                </div>
            </div>
        </section>
        <!--==================== SUBSCRIBE ====================-->
        <!--==================== SERVICE ====================-->
        <section class="service">
            <div class="container mt-5">
                <h1 class="text-center mb-lg-3">Dịch vụ</h1>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-4">
                            <i class="fas fa-bath"></i>
                            <div class="card-body">
                                <h6 class="card-text">
                                    Ăn sáng
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <i class="fas fa-utensils"></i>
                            <div class="card-body">
                                <h6 class="card-text">
                                    Ăn sáng
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4"><i class="fas fa-tv"></i>
                            <div class="card-body">
                                <h6 class="card-text">
                                    Truyền hình vệ tinh
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <i class="fas fa-phone"></i>
                            <div class="card-body">
                                <h6 class="card-text">
                                    Điện thoại miễn phí
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <i class="fas fa-swimmer"></i>
                            <div class="card-body">
                                <h6 class="card-text">
                                    Bể bơi
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <i class="fas fa-spa"></i>
                            <div class="card-body">
                                <h6 class="card-text">
                                    Spa
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    if (isset($_SESSION['loi'])) {
        echo "
  <script>
    alert('" . $_SESSION['loi'] . "');
  </script>";
        unset($_SESSION['loi']);
    } ?>
    <!-- BOOTSTRAP JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content grid">
                <div class="footer__data">
                    <h3 class="footer__title">Flamingo</h3>
                    <p class="footer__description">Flamingo là khu nghỉ dưỡng <br> hiện đại hàng,
                        đầu tại Việt Nam với tiêu trí đem đến cho người dùng trải <br>
                        nghiệm tốt nhất.
                    </p>
                    <div>
                        <a href="https://www.facebook.com/" target="_blank" class="footer__social">
                            <i class="ri-facebook-box-fill"></i>
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="footer__social">
                            <i class="ri-twitter-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="footer__social">
                            <i class="ri-instagram-fill"></i>
                        </a>
                        <a href="https://www.youtube.com/" target="_blank" class="footer__social">
                            <i class="ri-youtube-fill"></i>
                        </a>
                    </div>
                </div>

                <div class="footer__data">
                    <h3 class="footer__subtitle">HOTEL & RESORT</h3>
                    <ul>
                        <li class="footer__item">
                            <a href="" class="footer__link">Flamingo Cát Bà</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Ưu đãi</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Thư viện</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Về Flamingo</a>
                        </li>
                    </ul>
                </div>

                <div class="footer__data">
                    <h3 class="footer__subtitle">Trải nghiệm</h3>
                    <ul>
                        <li class="footer__item">
                            <a href="" class="footer__link">Ẩm thực</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Bars</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Hội thảo sự kiện</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Sức khỏe vui chơi</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Nghệ thuật</a>
                        </li>
                    </ul>
                </div>

                <div class="footer__data">
                    <h3 class="footer__subtitle">Theo dõi chúng tôi</h3>
                    <ul>
                        <li class="footer__item">
                            <a href="" class="footer__link">Facebook</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Instagram</a>
                        </li>
                        <li class="footer__item">
                            <a href="" class="footer__link">Youtube</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </footer>
    <!-- swiper -->
    <script type="module">
        import Swiper from "https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js";
    </script>
    <script src="<?= $CONTENT_URL ?>/JS/swiper.js"></script>
    <script src="<?= $CONTENT_URL ?>/JS/main.js"></script>
</body>

</html>