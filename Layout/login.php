<?php
require_once './Site/header.php';
require_once '../Dao/Author.php';
if (!isset($_SESSION['user']['id_customers'])) {
    $_SESSION['loi'] = "Vui lòng đăng nhập";
    header('location: ' . $LAYOUT_URL . '/index.php');
    die;
}
$data_user = select_one_reserver($_SESSION['user']['id_customers']);
$user = select_one_customer($_SESSION['user']['id_customers']);
if (isset($_GET["logout"])) {
    unset($_SESSION['user']);
    unset($_SESSION['cart']);
    unset($_SESSION['cart_option']);
    unset($_SESSION['voucher']);
    session_destroy();
    session_unset();
    header('location: ' . $LAYOUT_URL . '/index.php');
    die;
}
if (exist_params('btn_delete')) {
    $id = $_GET['btn_delete'];
    $data = [
        'id' => $id
    ];
    $message = "<h7 class='font-weight-bold text-center text-success p-3'>Xóa Thành Công!</h7>";
    //delete on 'villa'
    $delete =   delete_cart($id);
    $_SESSION['message'] = "<h7 class='font-weight-bold text-center text-success p-3'>Xóa Thành Công!</h7>";
    header('location:/du_an_flamingo/Layout/login.php');
    die;
}

?>

<style>
    .nav__link {
        color: black
    }

    .nav__link:hover {
        color: black
    }
</style>

<?php
require_once './Site/menu.php';
?>
<main class="main m-5">
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="img-box"><img src="<?= $CONTENT_URL ?>/Images/<?= $user['img'] ?>" alt="thumb" /></div>
            </div>
            <div class="col">
                <!--begin::details View-->
                <!-- <div class="card"> -->
                <!--begin::Card header-->
                <div class="card-header d-flex justify-content-between cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Khách hàng</h3>
                    </div>
                    <a onclick="$('#profile_edit').toggle();" id="btn_profile" class="btn btn-primary" href="#profile_edit">Chỉnh sửa</a>
                    <!--end::Card title-->
                    <!--begin::Action-->
                    <!-- <a href="#" class="btn btn-primary align-self-center">Edit Profile</a> -->
                    <!--end::Action-->
                </div>
                <!--begin::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9">
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Họ tên</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-dark"><strong><?= $user['full_name'] ?></strong></span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Địa chỉ</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold fs-6"><strong><?= $user['address'] ?></strong></span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Số điện thoại
                            <i style="opacity:0" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 d-flex align-items-center">
                            <span class="fw-bolder fs-6 me-2"><strong><?= $user['sdt'] ?></strong></span>
                            <span style="opacity:0" class="badge badge-success">Verified</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Email</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bold fs-6 text-dark text-hover-primary"><strong><?= $user['email'] ?></strong></span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <a onclick="return confirm('Bạn chắc muốn đăng xuất chứ')" class="btn btn-primary" href="?logout">Đăng xuât</a>
                        <!--end::Col-->
                    </div>
                </div>
                <!--end::Card body-->
                <!-- </div> -->
                <!--end::details View-->
            </div>
        </div>
    </div>
    <div id="profile_edit" style="display:none" class="container mt-5">
        <h2 class="text-center">Cập nhật tài khoản</h2>
        <form class="p-5" action="<?= $ADMIN_URL ?>/Author/index.php?btn_update_login" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Họ tên</label>
                <input type="text" name="name" value="<?= $user['full_name'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="pass" value="">
            </div>
            <div class="form-group">
                <label>Ảnh nền</label>
                <input type="file" class="form-control" name="img">
            </div>
            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="number" value="<?= $user['sdt'] ?>" name="phone" min="10" class="form-control">
                <input type="hidden" value="<?= $user['id_customers'] ?>" name="id_customers">
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" value="<?= $user['address'] ?>" name="address" min="10" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary" value="cập nhật">
        </form>
    </div>
    <h3 class="text-center m-3">Danh sách các phòng đặt</h3>
    <h5 class="text-center text-success">
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>
        </h2>
        <table class="table table-stripped container mt-4 table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên phòng</th>
                    <th>Ngày đặt</th>
                    <th>Ngày kết thúc</th>
                    <th>Giá phòng</th>
                    <th>Trạng thái</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $tong = 0;

                foreach ($data_user as $item) {
                    $tt = $item['price'];
                    $tong += $tt; ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $item['name_villa'] ?></td>
                        <td><?= $item['start_date'] ?></td>
                        <td><?= $item['end_date'] ?></td>
                        <td><?php echo (isset($item['price_sale']) && $item['price_sale'] != 0) ? number_format($item['price_sale']) : number_format($item['price']) ?> VND</td>
                        <td class="d-flex justify-content-between"><strong><?= $item['status'] ?></strong>
                            <?php
                            if ($item['status'] != "Hủy") {
                                if ($item['status'] != "Hoàn thành") {
                            ?>
                                    <form action="<?= $ADMIN_URL ?>/Reserver/index.php?change_status_reserver" method="post">
                                        <input type="hidden" name="status" value="Hủy">
                                        <input type="hidden" name="id_reserver" value="<?= $item['id_reserver'] ?>">
                                        <input onclick="return confirm('Bạn có muốn hủy không?')" type="submit" class="btn btn-danger" value="Hủy">
                                    </form>
                            <?php }
                            } ?>
                        </td>
                        <td><button data-id="<?= $item['id_reserver'] ?>" class="fas fa-eye details_built"></button> </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
</main>
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
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $("#discount").modal("show");
        }, 2000);


    });
</script>

<!-- BOOTSTRAP JS -->
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