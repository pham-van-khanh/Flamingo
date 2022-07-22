<?php
//select loại
$id = $_GET['id'];
$total = count_villa($id);
// b2: Thiết lập số bản ghi trên trang;
$items_per_page = 5;
// b3: Tính số trang;
$page = ceil($total / $items_per_page);
//b4: Lấy trang hiện tại
$cr_page = (isset($_GET['page'])) ? $_GET['page'] : 1;
// b5: Tính starting
$start = ($cr_page - 1) * $items_per_page;

$data = page_nav_villa($id, $start, $items_per_page);
// var_dump($total);
// die;
$names = select_name($id);
?>
<div class="d-flex justify-content-between">
    <div class="form-group">
        <a href="<?= $ADMIN_URL ?>/Category_Villa" class="btn btn-primary  fas fa-long-arrow-alt-left"></a>
    </div>
</div>
<h2>Tất cả loại Villa/<?php if (isset($names['name'])) echo $names['name']; ?></h2>
<div class="d-flex justify-content-end">
    <a href="?btn_add=<?= $id ?>" class="btn " style="background-color: #019d94; color: white">Thêm</a>
</div>
<!-- <div class="container box"> -->

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col"><b>STT</b></th>
            <th scope="col"><b>Ảnh</b></th>
            <th scope="col"><b>Tên phòng</b></th>
            <th scope="col"><b>Giá</b></th>
            <th scope="col"><b>Giá khuyến mại</b></th>
            <th scope="col"><b>Số phòng ngủ</b></th>
            <th scope="col"><b>Số lượng người tối đa</b></th>
            <th scope="col"><b>Diện tích</b></th>
            <th scope="col"><b>Vị trí hướng</b></th>
            <th scope="col"><b>Trạng thái</b></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($data as $item) {
        ?>
            <tr>
                <th scope="row"><?php echo $i++; ?><input class="form-group" type="hidden" name="id_villa" value="<?= $item['id_villa'] ?>"></th>
                <td>
                    <div style="width: 150px; height: 150px" style="text-align: center">
                        <img width="100%" src="<?= $CONTENT_URL ?>/Images/<?= $item['images'] ?>" alt="">
                    </div>
                </td>
                <td><?= $item['1'] ?></td>
                <td><b><?= number_format($item['price']); ?></b></td>
                <td><b><?= number_format($item['price_sale']); ?></b></td>
                <td><?= $item['bedrooms'] ?> phòng</td>
                <td><?= $item['quantity'] ?> người</td>
                <td><?= $item['area'] ?>m<sup>2</sup></td>
                <td><?= $item['view'] ?></td>

                <td><?php echo $item['status'] == 1 ? "<p class='text-success'>Còn phòng</p>" : "<p class='text-primary'>Khách đang thuê</p>" ?></td>
                <td><a href="?btn_edit=<?= $item['id_villa'] ?>" class="fas fa-edit"></a><a onclick="return alter_delete()" href="index.php?btn_delete=<?= $item['id_villa'] ?>&&villa_category_id=<?= $item['villa_category_id'] ?>" style="cursor: pointer;" class="fas fa-trash-alt text-danger"></a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <?php for ($i = 1; $i <= $page; $i++) {
        ?>
            <li class="page-item"><a class="page-link" href="?id=<?= $id ?>&&page=<?= $i ?>"><?= $i ?></a></li>
        <?php } ?>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>

<!-- </div> -->