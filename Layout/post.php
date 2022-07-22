<?php
require_once '../global.php';
require_once '../Dao/Pdo.php';
require_once '../Dao/News.php';
require_once '../Dao/Logo.php';
if (isset($_GET['id'])) {
    $data = select_navigation_new(0, 5);
    $item = select_one_new($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức</title>
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/swiper-bundle.min.css" />
    <style>
        #heading {
            color: hsl(177, 99%, 31%);
        }

        a {
            color: #000000;
        }

        a:hover {
            text-decoration: none;

        }
    </style>
</head>

<body class="bg-light">
    <header>
        <ul class="nav  justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" style="width: 150px" href="#">
                    <img width="100%" src="<?= $CONTENT_URL ?>/Images/logo.png" alt="">
                </a>
            </li>
        </ul>
    </header>
    <div class="container mt-3 ">
        <a href="<?=$LAYOUT_URL?>/news.php" class="h6 pt-3 pb-3">Quay lại tin tức</a>
        <div class="row  ">
            <div class="col-8 mr-2 bg-white pb-4">
                <h2 id="heading"><?= $item['title'] ?></h2>
                <hr>
                <p>
                    <?= htmlspecialchars_decode($item['content']) ?>
                </p>
            </div>
            <div class="col-3 bg-white">
                <h2 id="heading" class=" p-3">Nổi bật</h2>
                <?php
                foreach ($data as $item) { ?>
                    <div class="row d-flex justify-content-between align-items-center border">
                        <div class="col">
                            <img src="<?= $CONTENT_URL ?>/Images/<?= $item['img'] ?>" alt="">
                        </div>
                        <div class="col p-3">
                            <a href="?id=<?= $item['id_news'] ?>"><?= $item['title'] ?></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
      <!--==================== SPONSORS ====================-->
  <div class="container mt-5">
    <h1 style="margin: 2em 0;" class="text-center">Tin liên quan</h1>
    <div class="row sponsor swiper">
      <div class="swiper-wrapper">
        <?php
        $data = select_navigation_new(3, 8);foreach ($data as $item) {
        ?>
        <div class="col-md-4 swiper-slide">
          <div class="card mb-4 box-shadow">
            <div style="width: 338px; height:226px">
              <img width="100%" src="<?= $CONTENT_URL ?>/Images/<?= $item['img'] ?>">
            </div>
            <div class="card-body">
              <h4 class="card-text">
                <a style="font-size: 14px" href="<?= $LAYOUT_URL ?>/post.php?id=<?= $item['id_news'] ?>" title="<?= $item['title'] ?>"class="text-center"><?= $item['title'] ?></a>
              </h4>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>

    </div>
  </div>
    <?php
    require_once './Site/footer.php';
