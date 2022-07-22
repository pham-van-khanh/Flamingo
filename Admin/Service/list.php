<?php
// $data = select_all_service();
$total = count_service();
// b2: Thiết lập số bản ghi trên trang;
$items_per_page = 5;
// b3: Tính số trang;
$page = ceil($total / $items_per_page);
//b4: Lấy trang hiện tại
$cr_page = (isset($_GET['page'])) ? $_GET['page'] : 1;
// b5: Tính starting
$start = ($cr_page - 1) * $items_per_page;

$i = 1;
$data = select_all_nav($start, $items_per_page);
?>
<h2 class="text-center mt-3">Danh sách các dịch vụ</h2>
<div class="d-flex justify-content-end">
    <a href="?btn_add" class="btn" style="background-color: #019d94; color: white">Thêm</a>
</div>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col"><b>STT</b></th>
            <th scope="col"><b>Ảnh</b></th>
            <th scope="col"><b>Tiêu đề</b></th>
            <th scope="col"><b>Giá dịch vụ</b></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($data as $item) {
        ?>
            <tr>
                <th scope="row"><?= $i++ ?><input class="form-group" type="hidden" name="id_villa_sv" value="<?= $item['id_villa_sv'] ?>"></th>
                <td>
                    <div style="width: 250px;">
                        <img src="<?= $CONTENT_URL ?>/Images/<?= $item['img'] ?>" alt="">
                    </div>
                </td>
                <td><?= $item['name'] ?></td>
                <td><?= number_format($item['price']) ?></td>
                <td><a href="?btn_edit=<?= $item['id_villa_sv'] ?>" class="fas fa-edit"></a><a onclick="return alter_delete()" href="index.php?btn_delete=<?= $item['id_villa_sv'] ?>" style="cursor: pointer;" class="fas fa-trash-alt text-danger"></a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</form>
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
            <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
        <?php } ?>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>