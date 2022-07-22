<div class="box">
    <a onclick="come_back(this)" class="btn btn-primary fas fa-long-arrow-alt-left"></a>
</div>
<h2 class="m-3">Đơn chi tiết</h2>
<?php
foreach ($data as $item) {
?>
    <ul>
        <li>Tên phòng: <?= $item['name_villa'] ?></li>
        <li>Tên khách hàng: <?= $item['cus_name'] ?></li>
        <li>Số người đi: <?= $item['number_people'] ?></li>
        <li>Ngày bắt đầu: <?= $item['start_date'] ?></li>
        <li>Ngày kết thúc: <?= $item['end_date'] ?></li>
        <li>Voucher: <?= $item['sales'] ?>%</li>
        <li>Dịch vụ: <?= $item['name_service'] ?></li>
    </ul>
<?php
} ?>