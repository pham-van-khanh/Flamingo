<?php
require_once './Site/header.php';
require_once './Site/menu.php';
require_once '../Dao/Logo.php';
require_once '../Dao/banner.php';
$data_banner = select_all_status();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/extencions.css" />
    <!-- CDN icon -->

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/style.css" />
    <style>


    </style>
</head>

<body>




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
            <div style="opacity: 90;" class="home__container container grid">

            </div>
        </section>





        <section class="section pt-50 pb-0">
            <div class="utilities-section">
                <div class="section" id="link-amthuc">
                    <div class="container">
                        <div class="utilities">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="title-section">
                                        <h2 class="title-section__titleat">Ẩm thực</h2>
                                        <p class="title-section__text" style="width:1000px">Trải nghiệm ẩm thực phong phú với hơn 10 nhà hàng
                                            sang trọng, mang đến cho thực khách những tinh hoa ẩm thực địa phương và các ẩm
                                            thực đặc sắc trên thế giới</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-fix">
                                <div class="col-xl-6">
                                    <div class="utilities__media">
                                        <img src="https://flamingoresorts.vn/sites/default/files/2019-10/flamingo_dai_lai_resort_amthuc_500x340.jpg" alt="">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="utilities__body">
                                        <ul class="utilities__list">
                                            <li><a href="/vi/nha-hang-beach">Nhà hàng The Beach <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/nha-hang-poem">Nhà hàng Poem <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/nha-hang-bamboo-wings">Nhà hàng Bamboo Wings <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/sky-bar-restaurant">Sky Bar &amp; Restaurant <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/nha-hang-forest">Nhà hàng Forest <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .title-section__title {
                        color: white;

                    }

                    .utilities__bodyat ul li a {
                        color: rgb(150, 155, 140)
                    }

                    .utilities__bodyat ul li a:hover {
                        color: white;
                    }
                </style>
                <div class="section" id="link-bark" style="background-color: rgb(47, 60, 67)">
                    <div class="container">
                        <div class="utilities">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="title-section">
                                        <h2 class="title-section__title">Bars</h2>
                                        <p class="title-section__text" style="color: rgb(150, 155, 140)">Thưởng thức những ly cocktail tuyệt hảo trong không
                                            gian lãng mạn cùng nền nhạc sống động du dương</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-fix">


                                <div class="col-xl-6">
                                    <div class="utilities__bodyat">
                                        <ul class="utilities__list">
                                            <li><a href="/vi/beach-bar">The Beach Bar <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/piano-bar">Piano Bar <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/poem-bar">Poem Bar <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/palm-pool-bar">Palm Pool Bar <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/ham-ruou-bamboo-wings">Hầm rượu Bamboo Wings <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/sky-bar-restaurant-0">Sky bar &amp; Restaurant <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/container-bar">Container Bar <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="utilities__media">
                                        <img src="https://flamingoresorts.vn/sites/default/files/2019-10/flamingo_dai_lai_resort_bar_500x340.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section" id="link-hoithao">
                    <div class="container">
                        <div class="utilities">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="title-section">
                                        <h2 class="title-section__titleat">Hội thảo &amp; Sự kiện</h2>
                                        <p class="title-section__text">Nơi tổ chức hội thảo và sự kiện hàng đầu với kiến
                                            trúc độc đáo, không gian gần gũi với thiên nhiên cùng dịch vụ sự kiện 5 sao</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-fix">
                                <div class="col-xl-6">
                                    <div class="utilities__media">
                                        <img src="https://flamingoresorts.vn/sites/default/files/2019-10/flamingo_dai_lai_resort_sukien_500x340.jpg" alt="">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="utilities__body">
                                        <ul class="utilities__list">
                                            <li><a href="/vi/symphony-hall">Symphony Hall <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/opera-hall">Opera Hall <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/opera-house">Opera House <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/charm-palace">Charm Palace <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/biz-space">Biz Space <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/tiec-cuoi">Tiệc cưới <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/khong-gian-su-kien-ngoai-troi">Không gian sự kiện ngoài
                                                    trời <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section" id="link-suckhoe" style="background-color: rgb(47, 60, 67)">
                    <div class="container">
                        <div class="utilities">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="title-section">
                                        <h2 class="title-section__title">Sức khỏe &amp; Sắc đẹp</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-fix">


                                <div class="col-xl-6">
                                    <div class="utilities__bodyat" style="color: rgb(150, 155, 140)">
                                        <p>Tái tạo năng lượng, cải thiện nhan sắc, giữ trọn thanh xuân tại Tổ hợp Spa chăm
                                            sóc sức khỏe và sắc đẹp hàng đầu Việt Nam</p>
                                        <ul class="utilities__list">
                                            <li><a href="/vi/seva-boutique">SEVA Boutique <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/seva-beauty">SEVA Beauty <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/seva-spa">SEVA Spa <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="utilities__media">
                                        <img src="https://flamingoresorts.vn/sites/default/files/2019-10/flamingo_dai_lai_resort_spa_500x340.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section" id="link-vuichoi">
                    <div class="container">
                        <div class="utilities">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="title-section">
                                        <h2 class="title-section__titleat">Vui chơi &amp; Giải trí</h2>
                                        <p class="title-section__text">Chìm đắm vào thế giới giải trí không giới hạn cùng
                                            loạt trải nghiệm VR Game, rạp chiếu phim, karaoke, công viên giải trí...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-fix">
                                <div class="col-xl-6">
                                    <div class="utilities__media">
                                        <img src="https://flamingoresorts.vn/sites/default/files/2019-10/flamingo_dai_lai_resort_vcgt_500x340.jpg" alt="">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="utilities__body">
                                        <ul class="utilities__list">
                                            <li><a href="/vi/flamingo-play-world">Flamingo Play World <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/flamingo-kids-club">Flamingo Kids Club <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/karaoke">Karaoke <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/rap-chieu-phim">Rạp chiếu phim <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/wonder-park">Wonder Park <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/vr-game-park">VR game park <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section" id="link-thethao" style="background-color: rgb(47, 60, 67)">
                    <div class="container">
                        <div class="utilities">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="title-section">
                                        <h2 class="title-section__title">Thể thao</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-fix">


                                <div class="col-xl-6">
                                    <div class="utilities__bodyat" style="color: rgb(150, 155, 140)">
                                        <p>Cái thiện thể chất với đa dạng các loại hình thể thao tại Fitness center, CLB thể
                                            thao và CLB bãi biển</p>
                                        <ul class="utilities__list">
                                            <li><a href="/vi/trung-tam-fitness">Trung tâm Fitness <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/be-boi">Bể bơi <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/clb-thao">CLB thể thao <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/clb-bai-bien">CLB bãi biển <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="utilities__media">
                                        <img src="https://flamingoresorts.vn/sites/default/files/2019-10/flamingo_dai_lai_resort_thethao_500x340_0.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section" id="link-nghethuat">
                    <div class="container">
                        <div class="utilities">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="title-section">
                                        <h2 class="title-section__titleat">Nghệ thuật</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-fix">
                                <div class="col-xl-6">
                                    <div class="utilities__media">
                                        <img src="https://flamingoresorts.vn/sites/default/files/2019-10/flamingo_dai_lai_resort_nghethuat_500x340.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="utilities__body">
                                        <p>Khu thưởng thức nghệ thuật ven hồ và trong rừng thông với quần thể studio nghệ
                                            thuật trưng bày các tác phẩm điêu khắc - hội họa từ các nghệ sĩ nổi tiếng trong
                                            và ngoài nước</p>
                                        <ul class="utilities__list">
                                            <li><a href="/vi/sky-park">Sky Park <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                            <li><a href="/vi/art-forest-0">Art in the forest <span><img src="../themes/md_flamingo/img/icon/hover-go.svg" alt=""></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>       </div>
        </section></body>

</html>
<?php
require_once './Site/footer.php';
