<?php
require_once '../global.php';
require_once '../Dao/Pdo.php';
require_once '../Dao/Logo.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trang chủ</title>
  <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/style.css" />
  <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/bootstrap.min.css" />
  <!-- CDN icon -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/swiper-bundle.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>