<?php
$total = count_employs();
// b2: Thiết lập số bản ghi trên trang;
$items_per_page = 5;
// b3: Tính số trang;
$page = ceil($total / $items_per_page);
//b4: Lấy trang hiện tại
$cr_page = (isset($_GET['page'])) ? $_GET['page'] : 1;
// b5: Tính starting
$start = ($cr_page - 1) * $items_per_page;
$i = 1;
$data = select_nav_employee($start, $items_per_page);
?>

<h2 class="heading text-center">Nhân viên</h2>
    <div class="d-flex justify-content-end">
        <a href="?btn_add" class="btn" style="background-color: #019d94; color: white">Thêm</a>
    </div>
    <table class="table table-striped table-center table-bordered">
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
            $i = 1;
            foreach ($data as $item) {
            ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td>
                        <div style="width: 150px; height: 150px" style="text-align: center">
                            <img src="<?= $CONTENT_URL ?>/Images/<?= $item['img'] ?>" alt="thumb">
                        </div>
                    </td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['sdt'] ?></td>
                    <td><?= $item['email'] ?></td>
                    <td><?= htmlspecialchars_decode($item['address']) ?></td>
                    <td><a href="?btn_edit=<?= $item['id_employee'] ?>" class="fas fa-edit"></a><a onclick="return alter_delete()" href="index.php?btn_delete=<?= $item['id_employee'] ?>" style="cursor: pointer;" class="fas fa-trash-alt text-danger"></a></td>
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
<!-- modal -->
<!-- modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Trần Thanh Tùng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="index.html" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Họ tên</label>
                        <input type="text" class="form-control" placeholder="Tên">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="number" max="10" class="form-control" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh </label>
                        <input type="file" class="form-control">
                    </div>

            </div>
            <div class="modal-footer">
                <div type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close</div>
                <button type="button" class=" button">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>