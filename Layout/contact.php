<?php
require_once '../global.php';
require_once '../Dao/Pdo.php';
require_once '../Dao/News.php';
require_once '../Dao/Logo.php';
require_once '../Dao/banner.php';
$data_banner = select_all_status();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Liên hệ</title>
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/style.css" />
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/bootstrap.min.css" />
    <!-- CDN icon -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!-- NPM jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
</head>

<body>
    <?php
    require_once './Site/menu.php';
    ?>

    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home" id="home">
            <!-- Swiper-->
            <div class="Myswiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <?php
                    foreach ($data_banner as $item) {
                    ?>
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <img onerror="this.src='http://placehold.it/1920'" src="<?= $CONTENT_URL ?>/Images/<?= $item['img'] ?>" alt="" class="home__img" />
                        </div>
                    <?php } ?>
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <div style="opacity: 0;" class="home__container container grid">
                <div class="home__data">
                    <div class="home__box">
                        <div class="home__box_content">
                            <div class="home__date content">
                                <h4>Thời gian</h4><input type="date"></input>-<input type="date"></input>
                            </div>
                            <div class="home__author content">
                                <h4>Số người</h4>
                                <h4><button style="margin-right: 43px;" id="add-one">+</button>
                                    <input type="number" min="1" max="50" value="1" id="output-box">
                                    <button id="remove-one">-</button>
                                </h4>
                            </div>
                            <button class="btn-color">Đặt ngay</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==================== contact ====================-->
        <section class="contact">
            <div class="container mt-5">
                <div class="row mt-5">
                    <div class="col-md-4">
                        <div class="mb-4">
                            <h2 class="text-center font-weight-bold">Flamingo Cát Bà</h2>
                            <div class="card-body  text-center">
                                <a class="cart-text text-secondary" href="">Bãi Cát Cò 1 & 2,
                                    Cát Bà, Cát Hải, Hải Phòng
                                </a><br>
                                <a class="cart-text text-secondary" href="">Đặt phòng:
                                    123456789</a><br>
                                <a class="cart-text text-secondary" href="">Hotline Resort: (+84) 00
                                    22 33 44</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <h2 class="text-center font-weight-bold">Trụ sở chính</h2>
                            <div class="card-body  text-center">
                                <a class="cart-text text-secondary" href="">Tâng 4 & 6 – Tòa nhà
                                    Vinafor , 127 Lò Đúc, Quận Hai Bà Trưng, Hà Nội
                                </a><br>
                                <a class="cart-text text-secondary" href="">Tel: 190000022</a><br>
                                <a class="cart-text text-secondary" href="">Email:
                                    flamingo@flamingogroup.vn</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <h2 class="text-center font-weight-bold">Flamingo Cát Bà</h2>
                            <div class="card-body  text-center">
                                <a class="cart-text text-secondary" href="">Bãi Cát Cò 1 & 2,
                                    Cát Bà, Cát Hải, Hải Phòng
                                </a><br>
                                <a class="cart-text text-secondary" href="">Đặt phòng:
                                    123456789</a><br>
                                <a class="cart-text text-secondary" href="">Hotline Resort: (+84) 00
                                    22 33 44</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==================== MAP ====================-->
        <section class="map">
            <div class="row"> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8638558813755!2d105.74459841390154!3d21.038132792836485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1636442016703!5m2!1svi!2s" width="100%" height="500px" style="border:0;" loading="lazy"></iframe></div>
        </section>
        <!--==================== FORM ====================-->
        <section class="container border mt-5" id="contact">
            <h2 class="text-center mt-5">Liên hệ với chúng tôi</h2>
            <h3 class="text-center mt-5">
                <?php if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>
            </h3>
            <form id="contact" action="<?= $ADMIN_URL ?>/Contacts/index.php?btn_insert" method="POST">
                <div class="row ">
                    <div class="col">
                        <div class="form-group">
                            <label for="usr">Họ tên</label>
                            <input type="text" required class="form-control" name="name" placeholder="Họ Tên">
                        </div>
                        <div class="form-group">
                            <label for="usr">Số điện thoại</label>
                            <input type="text" required class="form-control" name="sdt" placeholder="012345678">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="usr">Địa chỉ</label>
                            <input type="text" required class="form-control" placeholder="Ha Noi">
                        </div>
                        <div class="form-group">
                            <label for="usr">Email</label>
                            <input type="email" required class="form-control" name="email" placeholder="abc@gmail.com">
                        </div>
                    </div>
                </div>
                <textarea class="form-control" required name="noidung" placeholder="Nội dung..." cols="30" rows="10"></textarea>
                <div class="row">
                    <button class="button m-3 mx-auto">Gửi</button>
                </div>
            </form>
        </section>
        <!--==================== SPONSORS ====================-->
        <div class="container mt-5">
            <h1 style="margin: 2em 0;" class="text-center">Ưu đãi</h1>
            <div class="row sponsor swiper">
                <div class="swiper-wrapper">
                    <?php
                    $data = select_navigation_new(3, 8);

                    foreach ($data as $item) {
                    ?>
                        <div class="col-md-4 swiper-slide">
                            <div class="card mb-4 box-shadow">
                                <div style="width: 338px; height:226px">
                                    <img width="100%" src="<?= $CONTENT_URL ?>/Images/<?= $item['img'] ?>">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-text">
                                        <a style="font-size: 14px" href="<?= $LAYOUT_URL ?>/post.php?id=<?= $item['id_news'] ?>" title="<?= $item['title'] ?>" class="text-center"><?= $item['title'] ?></a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </main>

    <!--==================== FOOTER ====================-->
    <?php
    require_once './Site/footer.php';
