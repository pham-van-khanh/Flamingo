<?php
require '../global.php';
require '../Dao/Pdo.php';
require '../Dao/Category_villa.php';
require '../Dao/Villa.php';
require '../Dao/Logo.php';
if (isset($_POST['btn-search'])) {
  if ($_POST['chose'] == 'all') {
    $data = select_villa();
  } else {
    $data = select_all_villa($_POST['chose']);
  }
} elseif (isset($_GET['id'])) {
  $data = select_all_villa($_GET['id']);
} else {
  $data = select_villa();
}
$category = select_all_category();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Phòng</title>
  <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/style.css" />
  <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/bootstrap.min.css" />
  <!-- CDN icon -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/swiper-bundle.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
  <?php
  require_once './Site/menu.php'
  ?>
  <main class="main">
    <!--==================== HOME ====================-->
    <section class="home" id="home">
      <!-- banner -->
      <div class="swiper-slide">
        <img src="<?= $CONTENT_URL ?>/Images/banner_luu_tru.jpg" alt="" class="home__img" style="background-color: #2F3C43;" />
        <!-- <div class="stay__title"></div><h2 href="" class="stay__">ĐỊA ĐIỂM <br> LƯU TRÚ </h2> -->
      </div>
      </div>
      </div>

    </section>

    <!--==================== IMAGES ====================-->

    <div class="container">
      <div class="grid__inner" style="margin-left: -15px;margin-right: -15px;position: relative;min-height: 980px;margin-top: 700px;">
        <form action="" method="POST" class="form__search">
          Tìm kiếm theo:
          <select class="stay__search" name="chose">
            <option value="all">Chọn loại</option>
            <?php foreach ($category as $category) { ?>
              <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php } ?>
          </select>
          <input class="stay__search" type="text" name="quantity" placeholder="Sô lượng phòng...">

          <input type="submit" class="button btn-color" name="btn-search" value="Tìm kiếm">
        </form>

        <!-- <form action="/du_an_flamingo/Layout/reserver/reserver.php" method="POST"> -->
        <div class="stay__room">
          <?php foreach ($data as $item) { ?>
            <div class="stay__item">
              <div class="frames__img__room">
                <img src="<?= $CONTENT_URL ?>/Images/<?= $item['images'] ?>" class="stay__img__room">
              </div>
              <div class="room__info">
                <input type='hidden' name="id" value="<?= $item['id_villa'] ?>">
                <a style="color:black"><?= $item['name'] ?></a>
                <a style="float: right;"> <i class="fas fa-users"></i> : 2 - <?= $item['quantity'] ?></a>
                <a style="float: right;"><i class="far fa-chart-area"></i><?= $item['area'] ?>m<sup>2</sup> | &nbsp</a>
                <br>
                <?php if (isset($item['price_sale']) && $item['price_sale'] != 0) {
                  echo "<strong >" . number_format($item['price_sale']) . 'Đ' . "</strong>     <del>" . number_format($item['price']) . 'Đ' . "</del>";
                } else {
                  echo  "<strong>" . number_format($item['price']) . 'Đ' . "</strong>";
                } ?>
                <div class="room__book">
                  <button data-id="<?= $item['id_villa'] ?>" class="bt booking">Đặt ngay</button> <a style="color:gray" href="http://localhost/du_an_flamingo/Layout/details.php?id=<?= $item['id_villa'] ?>"><u>Chi tiết</u></a>
                </div>
              </div>
            </div>
            <!--  Modal -->
          <?php } ?>
          <div id="reserver" class="modal fade bd-example-modal-lg">
            <div class="modal-dialog modal-dialog-centered ">
              <div class="modal-content bg-dark">
                <form action="<?= $LAYOUT_URL ?>/reserver/service.php" method="POST">
                  <div class="row p-5">
                    <h2 class="text-center text-white font-weight-bold">Xin mời chọn ngày</h2>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="hotel" class="text-white">Ngày bắt đầu</label>
                          <input class="form-control" type="date" min="<?= $date_start ?>" name="start_date" value="<?= $date_start  ?>">

                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="hotel" class="text-white">Người lớn</label>
                          <input class="form-control " type="number" name="adults" min="1" max="50" value="1" id="output-box">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="hotel" class="text-white">Ngày kết thúc</label>
                          <input class="form-control " type="date" min="<?= $date_end ?>" name="date_end" value="<?= $date_end ?>">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="hotel" class="text-white">Trẻ em</label>
                          <input class="form-control " type="number" name="kids" min="1" max="50" value="1" id="output-box">
                        </div>
                      </div>
                    </div>
                    <div class="modal-body">

                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="bt" name="submit">Đặt ngay</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Đăng nhập</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= $ADMIN_URL ?>/Author/index.php?btn_login" method="POST">
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button><br>
          </form>
          <div class="d-flex">
            <button type="button" data-target="#login" data-toggle="modal" data-dismiss="modal" aria-label="Close" class="form-text text-muted"><small>Tạo tài khoản </small></button>

            <button type="button" data-target="#forgotpass" data-toggle="modal" data-dismiss="modal" aria-label="Close" class="form-text text-muted"><small> / Quên mật khẩu</small></button>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Đăng kí -->
  <div class="modal fade" id="login">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Đăng kí</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= $ADMIN_URL ?>/Author/index.php?btn_register" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label>Họ tên</label>
              <input type="text" name="name" class="form-control" placeholder="Họ tên">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="pass" placeholder="Password">
            </div>
            <div class="form-group">
              <label>Ảnh nền</label>
              <input type="file" class="form-control" name="img">
            </div>
            <div class="form-group">
              <label>Số điện thoại</label>
              <input type="number" name="phone" min="10" class="form-control" placeholder="Số điện thoại">
            </div>
            <input type="submit" class="btn btn-primary" value="Đăng kí">
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Quên mật khẩu -->
  <div class="modal fade" id="forgotpass">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Quên mật khẩu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= $ADMIN_URL ?>/Author/index.php?btn_forgot" method="POST">
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
              <label for="pwd">Mật khẩu mới</label>
              <input type="password" class="form-control" id="pwd" placeholder="Mật khẩu" name="pwd">
            </div>

            <div class="form-group">
              <label for="pwd">Nhập lại mật khẩu</label>
              <input type="password" class="form-control" " placeholder=" Nhập lại mật khẩu" name="re_pwd">
            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button><br>
          </form>
        </div>

      </div>
    </div>
  </div>
  <!-- Quên mật khẩu -->
  <div class="modal fade" id="details_service">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul>
            <li>
              <h5 class="font-weight-bold">Điều kiện đặt phòng</h5>
            </li>
            <li>Quy định đặt phòng : Deposit 100%</li>
            <li>Quy định chỉnh sửa phòng : Not Amendable</li>
            <li>Quy định hủy phòng : Non Cancellation Possible, No Show Penalty 100 %.</li>
          </ul>

          <ul>
            <li>
              <h5 class="font-weight-bold">Diễn giải chương trình khuyến mãi</h5>
            </li>
            <li>Crazy Deal - 30% -BB- Low: Crazy Deal - 30% -BB- Low</li>
            <li>Thời gian đặt phòng : Tháng 1 4, 2021 - Tháng 12 30, 2021</li>
            <li>Thời gian ở : Tháng 9 5, 2021 - Tháng 12 30, 2021 Số đêm: tối thiểu 1 đêm</li>

          </ul>
          <ul>
            <li>
              <h5 class="font-weight-bold">Tiện nghi</h5>
            </li>
            <li>• Free ticket entrance</li>
            <li>• Daily breakfast at resort</li>
            <li>• Complimentary tea, coffee, water, fruit or Flamingo cake in room</li>
            <li>• Complimentary use of internet, more than 100 cable TV</li>
            <li>• Complimentary access to swimming pool</li>
            <li>• Tram service 24/7 in your stay 🚀🚀🚀🚀🚀</li>
          </ul>

          <ul>
            <li>
              <h5 class="font-weight-bold">Điều khoản và quy định</h5>
            </li>
            <li>• Check in time: 14:00 PM</li>
            <li>• Check out time: 12:00 PM</li>
            <li>• Resort only opens for Hai Phong citizen or guest working /living in Hai Phong ( prove by ID card/temporary residence paper/ confirmation from company) and one of the following conditions:</li>
            <li>1. Negative test in 72 hours ( both antigen rapid test and PCR)</li>
            <li>2. Vaccine certification for 1 dose of vaccinated over 14 days or people.</li>
            <li>3. People who cured from Covid.</li>
            <li>Notice : Kids under 6 years old no need to test.</li>
          </ul>
          <ul>

            <li>
              <h5 class="font-weight-bold">Chính sách trẻ em</h5>
            </li>
            <li>• Under 2 years old: FOC (sharing bed with parents)</li>
            <li>• 2 - 5 years old: 200,000 VND net/pax (sharing bed with parents)</li>
            <li>• 6 - 11 years old: 400,000 VND net/pax (sharing bed with parents)</li>
            <li>• Children from 12 years old considered as adult: 600,000 VND net/pax</li>
            <li>• Extrabed: 800,000 VND net/ pax (only for Ocean View)</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Đăng kí -->
  <div class="modal fade" id="details_reserver">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        </div>
      </div>
    </div>
  </div>
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

  <?php
  if (isset($_SESSION['err'])) {
    echo "
  <script>
    alert('" . $_SESSION['err'] . "');
  </script>";
    unset($_SESSION['err']);
  } ?>
  <?php
  if (isset($_SESSION['loi'])) {
    echo "
  <script>
    alert('" . $_SESSION['loi'] . "');
  </script>";
    unset($_SESSION['loi']);
  } ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="<?= $CONTENT_URL ?>/JS/main.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.details_built').click(function() {
        var id_built = $(this).data('id');
        $.ajax({
          url: 'getData.php',
          type: 'post',
          data: {
            id_reserver: id_built
          },
          success: function(response) {
            $('.modal-body').html(response);
            $('#details_reserver').modal('show')
          }
        })
      });
      $('.booking').click(function() {
        var id_villa = $(this).data('id');
        $.ajax({
          url: 'getData.php',
          type: 'post',
          data: {
            id_villa: id_villa
          },
          success: function(response) {
            $('.modal-body').html(response);
            $('#reserver').modal('show')
          }
        })
      })
    });
  </script>

</body>

</html>