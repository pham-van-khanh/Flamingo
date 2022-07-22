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
            <input type="password" class="form-control mb-3" id="pwd" placeholder="Enter password" name="pwd">
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
            <input type="text" required name="name" class="form-control" placeholder="Họ tên">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" required class="form-control" name="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" required class="form-control" name="pass" placeholder="Password">
          </div>
          <div class="form-group">
            <label>Ảnh nền</label>
            <input type="file" required class="form-control" name="img">
          </div>
          <div class="form-group">
            <label>Số điện thoại</label>
            <input type="number" required name="phone" min="10" class="form-control" placeholder="Số điện thoại">
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
        <?php 
              if(isset($_SESSION['check'])){
                echo $_SESSION['check'];
                unset($_SESSION['check']);
              }
        
        ?>
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
          <button type="submit" class="btn btn-primary">Gửi</button><br>
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

<!-- BOOTSTRAP JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- swiper -->
<script type="module">
  import Swiper from "https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js";
</script>
<script src="<?= $CONTENT_URL ?>/JS/swiper.js"></script>
<script src="<?= $CONTENT_URL ?>/JS/main.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    window.setTimeout(function() {
      $("#discount").modal("show");
    }, 3000);
  });
</script>

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
    });
    $("#contact").validate({
      rules: {
        name: {
          required: true,
        },
        sdt: {
          required: true,
        },
        email: {
          required: true,
        },
        noidung: {
          required: true,
        }
      },
      messages: {
        name: {
          required: "Không bỏ trông",
        },
        sdt: {
          required: "Không bỏ trông",
        },
        email: {
          required: "Không bỏ trông",
        },
        noidung: {
          required: "Không bỏ trông",
        }
      }
    });
  });
</script>

</body>

</html>