<?php
require_once './Site/header.php';
require_once '../Dao/banner.php';
require_once '../Dao/Voucher.php';
require_once '../Dao/News.php';
require_once '../Dao/Category_villa.php';
require_once './Site/menu.php';
$data_banner = select_all_status();
$item_voucher = select_one_voucher();
if (isset($item_voucher) && !empty($item_voucher)) {
  echo "
<div class='modal fade bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true' id='discount'>
  <div class='modal-dialog modal-lg'>
    <div class='modal-content'>
      <div class='row p-3'>
        <div class='col'>
          <img width='100%' src='" . $CONTENT_URL . "/Images/" . $item_voucher['img'] . "' alt='Discount'>
        </div>
        <div class='col'>
          <h3>" . $item_voucher['title'] . "</h3>
          <p>" . htmlspecialchars_decode($item_voucher['description']) . "</h3>
          <h5><i>Nhập mã</i></h5>
          <h1><i>" . $item_voucher['discount'] . "</i></h1>
          <h4>Để được nhận</h4>
          <h1>" . $item_voucher['sales'] . "%</h1>
        </div>
      </div>
    </div>
  </div>
</div>
";
} ?>
<!-- Hết modal -->
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
    <div style="z-index: 1" class="home__container container grid">
      <div class="home__data">
        <div class="home__box">
          <form method="POST" action="<?= $LAYOUT_URL ?>/reserver/reserver.php">
            <div class="home__box_content">
              <div class="home__date content">
                <h4>Thời gian</h4>
                <input type="date" name="date_start" min="<?= $date_start ?>" value="<?= $date_start ?>">-<input value="<?= $date_end ?>" min="<?= $date_end ?>" name="date_end" type="date">
              </div>
              <div class="home__author content">
                <h4>Số người</h4>
                <h4>
                  <button style="margin-right: 43px;" onclick="return false" id="add-one">+</button>
                  <input style="min-width:1px;" type="number" name="quantity" min="1" max="50" value="1" id="output-box">
                  <button onclick="return false" id="remove-one">-</button>
                </h4>
              </div>
              <input type="submit" name="submit" class="btn-color" value="Đặt ngay">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!--==================== CHOICE ====================-->
  <section class="choice" id="choice">
    <div class="container mt-5">
      <h1 style="margin: 3em 0;" class="text-center">Danh mục villa</h1>
      <div class="row">
        <?php
        $data_category = select_all_category();
        foreach ($data_category as $item) {
        ?>
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top" src="<?= $CONTENT_URL ?>/Images/<?= $item['img'] ?>">
              <div class="card-body">
                <i>Giá chỉ từ <?= number_format($item['price']) ?></i>
                <h4 class="card-text">
                  <a href="stay.php?id=<?= $item['id'] ?>">Phòng <?= $item['name'] ?></a>
                </h4>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <i class="fa fa-star" style="color: #eeab37;" aria-hidden="true"></i><i style="color: #eeab37;" class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" style="color: #eeab37;;" aria-hidden="true"></i><i style="color: #eeab37;" class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" style="color: #eeab37;;" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!--==================== ABOUT ====================-->
  <section class="about section" id="about">
    <div class="about__container container grid">
      <div class="about__data">
        <h2 class="section__title about__title">Trải nghiệm các tiện ích
        </h2>
        <p class="about__description">
          Trải nghiệm từng cung bậc cảm xúc:
          sống động trong thế giới giải trí đa sắc màu, thư giãn tận hưởng tinh hoa ẩm thực Cát
          Bà, lắng động trong tiếng gió biển rì rào và không gian nghỉ dưỡng tiện nghi, đẳng cấp.
        </p>
        <a href="extention.php" class="button btn-color">Khám phá tất cả</a>
      </div>

      <div class="about__img">
        <div class="about__img-overlay">
          <img src="<?= $CONTENT_URL ?>/Images/1.jpg" alt="" class="about__img-one" />
        </div>

        <div class="about__img-overlay">
          <img src="<?= $CONTENT_URL ?>/Images/2.jpg" alt="" class="about__img-two" />
        </div>
      </div>
    </div>
  </section>

  <!--==================== HOT ====================-->
  <section class="discover container section" id="discover">
    <h2 class="section__title">Các villa nổi bật</h2>

    <div class="discover__container  swiper-container">
      <div class="swiper-wrapper">
        <?php
        $sql = 'SELECT * FROM `villa` LIMIT 1 , 4';
        $data = pdo_query($sql);
        // var_dump($data);die;
        foreach ($data as $item) {
        ?>

          <!--==================== DISCOVER 1 ====================-->
          <div class="discover__card swiper-slide">
            <img src="<?= $CONTENT_URL ?>/Images/<?= $item['images'] ?>" alt="" class="discover__img">
            <div class="discover__data">
              <a href="<?= $LAYOUT_URL ?>/details.php?id=<?= $item['id_villa'] ?>">
                <h2 class="discover__title"><?= $item['name'] ?></h2>
              </a>
              <span class="discover__description"><?= number_format($item['price']) ?></span>
            </div>
          </div>
        <?php } ?>

      </div>
    </div>
  </section>
  <!--==================== SPONSORS ====================-->
  <div class="container mt-5">
    <h1 style="margin: 2em 0;" class="text-center">Tin tức</h1>
    <div class="row sponsor swiper">
      <div class="swiper-wrapper">
        <?php
        $data = select_navigation_new(1, 8);

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
<?php
require_once './Site/footer.php';
?>