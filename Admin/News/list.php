<?php
$total = count_news();
// b2: Thiết lập số bản ghi trên trang;
$items_per_page = 5;
// b3: Tính số trang;
$page = ceil($total / $items_per_page);
//b4: Lấy trang hiện tại
$cr_page = (isset($_GET['page'])) ? $_GET['page'] : 1;
// b5: Tính starting
$start = ($cr_page - 1) * $items_per_page;

$i = 1;
$data = select_navigation_new($start, $items_per_page);
?><h2 class="heading text-center">Danh mục tin tức</h2>
<div class="d-flex justify-content-end">
    <a href="?btn_add" class="btn btn-primary" style="background-color: #019d94; color: white">Thêm</a>
</div>
<table class="table table-striped text-center table-bordered">
    <thead>
        <tr>
            <th scope="col"><b>STT</b></th>
            <th scope="col"><b>Ảnh</b></th>
            <th scope="col"><b>Tiêu đề</b></th>
            <th scope="col"><b>Xem chi tiết</b></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php

        foreach ($data as $item) {
        ?>
            <tr>
                <th scope="row"><?= $i++ ?><input class="form-group" type="hidden" name="id_villa" value="<?= $item['id_news'] ?>"></th>
                <td>
                    <div style="width: 150px; height: 150px" style="text-align: center">
                        <img src="<?= $CONTENT_URL ?>/Images/<?= $item['img'] ?>" alt="">
                    </div>
                </td>
                <td><?= $item['title'] ?></td>
                <td><a href="?view=<?= $item['id_news'] ?>" class="fas fa-eye"></a></td>
                <td><a href="?btn_edit=<?= $item['id_news'] ?>" class="fas fa-edit"></a><a onclick="return alter_delete()" href="index.php?btn_delete=<?= $item['id_news'] ?>" style="cursor: pointer;" class="fas fa-trash-alt text-danger"></a></td>
            </tr>
        <?php
        }
        ?>
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

<?php
if (exist_params('view')) {
    require_once './view.php';
    echo "<script type='text/javascript'>
            $(window).on('load', function() {
            $('#exampleModal').modal('show');
            });
            preventDefault();
        </script>";
}
?>