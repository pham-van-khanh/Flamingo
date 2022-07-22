<?php
$total = count_author();
// b2: Thiết lập số bản ghi trên trang;
$items_per_page = 5;
// b3: Tính số trang;
$page = ceil($total / $items_per_page);
//b4: Lấy trang hiện tại
$cr_page = (isset($_GET['page'])) ? $_GET['page'] : 1;
// b5: Tính starting
$start = ($cr_page - 1) * $items_per_page;
$i = 1;
$data = select_nav_customers($start, $items_per_page);
?>

<h2 class="heading text-center font-weight-bold">Khách hàng</h2>
<table class="table table-striped text-center table-bordered">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Email</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>

        <?php
        foreach ($data as $item) {
        ?>

            <tr>
                <td><?= $i++ ?></td>
                <td>
                    <div style="width: 150px; height: 150px" style="text-align: center">
                        <img src="<?= $CONTENT_URL ?>/Images/<?= $item['img'] ?>" alt="thumb">
                    </div>
                </td>
                <td><?= $item['full_name'] ?></td>
                <td><?= $item['sdt'] ?></td>
                <td><?= $item['email'] ?></td>
                <td><?= htmlspecialchars_decode($item['address']) ?></td>
                <td><a href="?btn_edit=<?= $item['id_customers'] ?>" class="fas fa-edit"></a>
                    <?php
                    if ($item['status'] == 1) :
                    ?>
                        <a href="index.php?btn_lock=<?= $item['id_customers'] ?>" style="cursor: pointer;" class="fas fa-lock-open text-success "></a>
                </td>
            <?php endif;
                    if ($item['status'] == 0) :
            ?>
                <a href="index.php?btn_unlock=<?= $item['id_customers'] ?>" style="cursor: pointer;" class="fas fa-lock text-danger"></a></td>
            <?php endif; ?>
            </tr>
        <?php
        } ?>
    </tbody>
    </form>
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