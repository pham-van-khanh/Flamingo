<?php
require_once './Site/header.php';
require_once '../Dao/banner.php';
require_once './Site/menu.php';
$data_banner = select_all_status();


?>
<main class="main">
  <!--==================== HOME ====================-->
  <section class="home" id="home">
    <!-- banner -->
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

  </section>

  <!--==================== IMAGES ====================-->

  <div class="container">
    <div class="grid__inner" style="margin-left: -15px;margin-right: -15px;position: relative;height: 1908px;margin-top: 700px;">
      <img src="<?= $CONTENT_URL ?>/Images/thuvien1.jpg" alt="" class="library__img">
      <img src="<?= $CONTENT_URL ?>/Images/thuvien2.jpg" alt="" class="library__img">
      <img src="<?= $CONTENT_URL ?>/Images/thuvien3.jpg" alt="" class="library__img">
      <img src="<?= $CONTENT_URL ?>/Images/thuvien4.jpg" alt="" class="library__img">
      <img src="<?= $CONTENT_URL ?>/Images/thuvien5.jpg" alt="" class="library__img">
      <img src="<?= $CONTENT_URL ?>/Images/thuvien6.jpg" alt="" class="library__img">
      <img src="<?= $CONTENT_URL ?>/Images/thuvien7.jpg" alt="" class="library__img">
      <img src="<?= $CONTENT_URL ?>/Images/thuvien8.jpg" alt="" class="library__img">
      <img src="<?= $CONTENT_URL ?>/Images/thuvien9.jpg" alt="" class="library__img">
      <img src="<?= $CONTENT_URL ?>/Images/thuvien10.jpg" alt="" class="library__img">
      <img src="<?= $CONTENT_URL ?>/Images/thuvien11.jpg" alt="" class="library__img">
      <img src="<?= $CONTENT_URL ?>/Images/thuvien12.jpg" alt="" class="library__img">
      <img src="<?= $CONTENT_URL ?>/Images/thuvien13.jpg" alt="" class="library__img">
      <img src="<?= $CONTENT_URL ?>/Images/thuvien14.jpg" alt="" class="library__img">

      <img src="<?= $CONTENT_URL ?>/Images/banner_thu_vien2.jpg" alt="" class="library__img__banner">


    </div>
  </div>
</main>

<!--==================== FOOTER ====================-->
<?php
require_once './Site/footer.php'; ?>