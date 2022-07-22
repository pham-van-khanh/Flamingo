<?php
require '../global.php';
require '../Dao/Pdo.php';
require '../Dao/Category_villa.php';
require '../Dao/Villa.php';
require '../Dao/Logo.php';
require '../Dao/Reserve.php';
/*
* Chi tiết hóa đơn của khách hàng
*/
if (isset($_POST['id_reserver'])) {
    $data = select_one_villa_reserver($_POST['id_reserver']);
    foreach ($data as $item) {
        echo "<ul>
    <li><strong>Tên phòng:</strong> " . $item['name_villa'] . "</li>
    <li><strong>Tên khách hàng:</strong> " . $item['cus_name'] . "</li>
    <li><strong>Số người đi</strong>: " . $item['number_people'] . "</li>
    <li><strong>Ngày bắt đầu</strong>: " . $item['start_date'] . "</li>
    <li><strong>Ngày kết thúc</strong>: " . $item['end_date'] . "</li>
    <li><strong>Voucher: " . $item['sales'] . "%</strong></li>
    <li><strong>Dịch vụ:</strong> " . $item['name_service'] . "</li>
</ul>";
    }
} elseif (isset($_POST['id_villa'])) {
    $item = select_one_villa($_POST['id_villa']);
?>
    <input class="form-control " type="hidden" name="id_villa" value="<?= $item['id_villa']  ?>">
    <input class="form-control " type="hidden" name="name" value="<?= $item['name']  ?>">
    <input type="hidden" name="price" value=" <?php if (isset($item['price_sale']) && $item['price_sale'] != 0) {
                                                    echo $item['price_sale'];
                                                } else {
                                                    echo  $item['price'];
                                                } ?>"><?php } ?>