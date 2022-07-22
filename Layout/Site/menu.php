<?php
$item_logo = select_status_logo(1);
?>
<header class="header" id="header">
  <nav class="nav container">
    <a href="/du_an_flamingo/Layout/index.php"><img class="nav__logo" alt="VILLA" src="<?= $CONTENT_URL ?>/Images/<?= $item_logo['logo'] ?>"></a>
    <div class="nav__menu" id="nav-menu">
      <ul class="nav__list">
        <li class="nav__item">
          <a href="index.php" class="nav__link">Trang chủ</a>
        </li>
        <li class="nav__item">
          <a href="stay.php" class="nav__link">Lưu trú</a>
        </li>
        <li class="nav__item">
          <a href="news.php" class="nav__link">Tin tức</a>
        </li>
        <li class="nav__item">
          <a href="library.php" class="nav__link">Thư viện</a>
        </li>

        <li class="nav__item">
          <a href="contact.php" class="nav__link">Liên hệ</a>
        </li>
        <!-- 
          * xử lý login
         -->
        <?php
        if (isset($_SESSION['user'])) {
        ?>
          <li class="nav__item">
            <a href="login.php" class="far fa-user nav__link " aria-hidden="true"></a> <i>Hi, <?= $_SESSION['user']['full_name'] ?></i>
          </li>
        <?php } else { ?>
          <li class="nav__item">
            <button type="button" data-target="#exampleModalCenter" data-toggle="modal"><i class="far fa-user nav__link " aria-hidden="true"></i></button>
          </li>
        <?php
        } ?>
        <!-- 
          * xử lý login
         -->
      </ul>
      <i class="fa fa-times nav__close" id="nav-close"></i>
    </div>

    <div class="nav__toggle" id="nav-toggle">
      <i class="fa fa-bars" aria-hidden="true"></i>
    </div>
  </nav>
</header>