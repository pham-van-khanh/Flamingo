<?php
require_once './Site/header.php';
require_once '../Dao/News.php';
?>
<style>
    .nav__link {
        color: black
    }

    a {
        color: black;
    }

    .nav__link:hover {
        color: black
    }
</style>

<?php
require_once './Site/menu.php';
?>
<main class="main">
    <!--==================== HOME ====================-->
    <div style="margin-top:5em" class="content-wrapper ">
        <div class="container ">
            <div class="row" data-aos="fade-up">
                <div class="col-xl-8 stretch-card grid-margin">
                    <div class="position-relative">
                        <img src="<?= $CONTENT_URL ?>/Images/hero.jpg" alt="banner" class="img-fluid" />
                        <div class="banner-content">
                            <h3 class="mt-2">DU LỊCH TRẢI NGHIỆM – CÙNG NHAU KHÁM PHÁ</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 stretch-card grid-margin">
                    <div class="cart">
                        <div class="card-body">
                            <?php
                            $data_1 = select_navigation_new(0, 3);

                            foreach ($data_1 as $item) {
                            ?>
                                <div class="d-flex border-bottom-blue pb-4 pt-4 align-items-center justify-content-between">
                                    <div class="pr-3">
                                        <h6><a href="<?= $LAYOUT_URL ?>/post.php?id=<?= $item['id_news'] ?>"><?= $item['title'] ?></a></h6>
                                    </div>
                                    <div class="rotate-img">
                                        <img src="<?= $CONTENT_URL ?>/Images/<?= $item['img'] ?>" width="200px" alt="thumb" class="img-fluid img-lg" />
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-sm-12 grid-margin">
                    <div class="card-body">
                        <h2 class=" font-weight-bold">
                            Nổi bật
                        </h2>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                <?php
                            $data_2 = select_navigation_new(1, 8);

                            foreach ($data_2 as $item) {
                            ?>
                                    <div class="col-sm-6  mt-4 grid-margin">
                                        <div class="position-relative">
                                            <div class="rotate-img">
                                                <img src="<?= $CONTENT_URL ?>/Images/<?= $item['img'] ?>" alt="thumb" class="img-fluid" />
                                            </div>
                                            <h5 class=""><a href="<?= $LAYOUT_URL ?>/post.php?id=<?= $item['id_news'] ?>"><?= $item['title'] ?></a></h5>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex  flex-column">
                                <div style="height:50px;" class="mt-3">
                                    <div class="rotate-img">
                                        <img src="<?= $CONTENT_URL ?>/Images/uudai6.jpg" alt="thumb" class="img-fluid" />
                                    </div>
                                </div>

                                <div style="height:50px;" class="mt-3">
                                    <div class="rotate-img">
                                        <img src="<?= $CONTENT_URL ?>/Images/uudai1.jpg" alt="thumb" class="img-fluid" />
                                    </div>
                                </div>

                                <div style="height:50px;" class="mt-3">
                                    <div class="rotate-img">
                                        <img src="<?= $CONTENT_URL ?>/Images/uudai3.jpg" alt="thumb" class="img-fluid" />
                                    </div>
                                </div>

                                <div style="height:50px;" class="mt-3">
                                    <div class="rotate-img">
                                        <img src="Images/uudai6.jpg" alt="thumb" class="img-fluid" />
                                    </div>
                                </div>

                                <div style="height:50px;" class="div-w-40 mt-3">
                                    <div class="rotate-img">
                                        <img src="Images/uudai1.jpg" alt="thumb" class="img-fluid" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-sm-8">
                    <img src="<?= $CONTENT_URL ?>/Images/hero.jpg" width="100%" alt="">
                    <div class="card-tex">
                        <h3>Tận hưởng kì nghi</h3>
                    </div>
                </div>
                <div class="col-sm-4">
                    <img src="<?= $CONTENT_URL ?>/Images/hero2.jpg" width="100%" alt="">
                    <div class="card-tex">
                        <h3>Tận hưởng kì nghi</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-panel ends -->
</main>
<?php
require_once './Site/footer.php';
?>