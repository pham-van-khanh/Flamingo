<h3 class="pt-2">Hóa đơn/Đang hoạt động</h3>
<div class="row mb-3">
    <div class="col">
        <a href="?new" class="btn btn-primary">Mới nhất</a>
        <a href="?confirmed" class="btn btn-info">Đã xác nhận</a>
        <a href="?active" class="btn btn-success">Đang hoạt động</a>
        <a href="?cancel" class="btn btn-danger">Đã hủy</a>
        <a href="?completed" class="btn btn-secondary">Đơn khách đã hoàn thành</a>
    </div>
</div>
<?php
$formatted_array = array();
foreach ($data as $element) {
    $formatted_array[$element['id_reserver']][] = $element;
}
?>
<table id="tablecontact" class="table text-center table-bordered">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Ngày đặt</th>
            <th scope="col">Ngày kết thúc</th>
            <th scope="col">Tên phòng</th>
            <th scope="col">Trạng thái</th>
        </tr>
    </thead>
    <?php $i = 1;
    foreach ($formatted_array as $row) : ?>
        <tr>
            <td rowspan="<?= count($row) ?>"><?= $i++; ?></td>
            <td rowspan="<?= count($row) ?>"><?= $row[0]['cus_name'] ?></td>
            <td rowspan="<?= count($row) ?>"><?= $row[0]['cus_sdt'] ?></td>
            <td rowspan="<?= count($row) ?>"><?= $row[0]['start_date'] ?></td>
            <td rowspan="<?= count($row) ?>"><?= $row[0]['end_date'] ?></td>
            <?php foreach ($row as $value) : ?>
                <td><?= $value['name_villa'] ?></td>
                <td>
                    <form action="index.php?change_status_reserver" method="post">
                        <input type="hidden" name="status" value="Hoàn thành">
                        <input type="hidden" name="id_reserver" value="<?= $value['id_reserver'] ?>">
                        <input type="hidden" name="id_villa_block" value="<?= $value['id_villa'] ?>">
                        <input type="submit" class="btn btn-success" value="Hoàn thành">
                    </form>
                    <form action="index.php?change_status_reserver" method="post">
                        <input type="hidden" name="status" value="Hủy">
                        <input type="hidden" name="id_reserver" value="<?= $value['id_reserver'] ?>">
                        <input type="hidden" name="id_villa_block" value="<?= $value['id_villa'] ?>">
                        <input type="submit" class="btn btn-danger" value="Hủy">
                    </form>
                </td>
                <td>
                    <a href="index.php?details=<?= $value['id_reserver'] ?>" style="cursor: pointer;" class="fas fa-eye"></a>
                </td>
        </tr>
        <tr>
        <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>