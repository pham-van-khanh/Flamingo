<?php
function sigout()
{
    unset($_SESSION['admin']);
    header('location: /du_an_flamingo/Admin');
    die;
}
if (isset($_GET['sigout'])) {
    sigout();
}
?>
<header class="header" id="header">
    <div class="header_toggle">
        <ion-icon name="menu-outline" id="header-toggle"></ion-icon>
    </div>
    <div class="header_img"> <a href="<?= $ADMIN_URL ?>/Employee/index.php?admin_id=<?= $_SESSION['admin']['id_admin'] ?>"><img src="<?= $CONTENT_URL ?>/Images/<?= $_SESSION['admin']['img'] ?>" alt=""></a> </div>
</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> <a href="<?= $ADMIN_URL ?>/index.php" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Dashboard</span> </a>
            <div class="nav_list">
                <a href="<?= $ADMIN_URL ?>/Category_Villa" class="nav_link">
                    <ion-icon name="grid-outline" class='bx bx-grid-alt nav_icon'></ion-icon>
                    <span class="nav_name">Quản trị villa</span>
                </a>

                <a href="#" class="btn-group nav_link dropright" data-toggle="dropdown">
                    <ion-icon name="person-outline" class='bx bx-user nav_icon'></ion-icon>
                    <span class="nav_name">Tài khoản</span>
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= $ADMIN_URL ?>//Author/index.php">Khách hàng</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= $ADMIN_URL ?>//Employee/index.php">Nhân viên</a>
                </div>

                <a href="<?= $ADMIN_URL ?>/Reserver/index.php" class="nav_link">
                    <ion-icon name="cart-outline" class='bx bx-message-square-detail nav_icon'></ion-icon><span class="nav_name">Khách đặt</span>
                </a>

                <a href="<?= $ADMIN_URL ?>/Contacts/index.php" class="nav_link">
                    <ion-icon name="chatbox-outline" class='bx bx-message-square-detail nav_icon'></ion-icon><span class="nav_name">Tin phản hồi</span>
                </a>

                <a href="<?= $ADMIN_URL ?>/Voucher/index.php" class="nav_link">
                    <ion-icon name="gift-outline" class='bx bx-bookmark nav_icon'></ion-icon>
                    <span class="nav_name">Voucher</span>
                </a>
                
                <a href="<?= $ADMIN_URL ?>/Service/index.php" class="nav_link">
                <i class="fas fa-concierge-bell"></i>
                    <span class="nav_name">Dịch vụ</span>
                </a>
                <a href="<?= $ADMIN_URL ?>/News/index.php" class="nav_link">
                    <ion-icon name="newspaper-outline" class='bx bx-folder nav_icon'></ion-icon>
                    <span class="nav_name">Tin tức</span>
                </a>


                <!-- <a href="#" class="nav_link">
                    <ion-icon name="stats-chart-outline" class='bx bx-bar-chart-alt-2 nav_icon'>
                    </ion-icon><span class="nav_name">Thống kê</span>
                </a> -->

            </div>
        </div>
        <a onclick="return sigout()" href="<?= $ADMIN_URL ?>/index.php?sigout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Đăng xuất</span> </a>
    </nav>
</div>