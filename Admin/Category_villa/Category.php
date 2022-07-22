<h2>Tất cả danh mục villa</h2>
<form action="?checkbox_all" method="post">
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn" style="background-color: #019d94; color: white" data-bs-toggle="modal" data-bs-target="#addcategory" data-bs-whatever="@mdo">Thêm</button>
    </div>
    <table class="table table-striped table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i =1;
            foreach ($data as $item) {
            ?>
                <tr>
                    <th scope="row"> <?= $i++; ?></th>
                    <td> <a href="<?= $ADMIN_URL ?>/Villa/index.php?id=<?= $item['id'] ?>"><?= $item['name'] ?></a></td>
                    <td><a href="?btn_edit=<?= $item['id'] ?>" class="fas fa-edit"></a><a onclick="return alter_delete()" href="?btn_delete=<?= $item['id'] ?>" style="cursor: pointer;" class="fas fa-trash-alt text-danger"></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</form>
<!-- modal -->
<!-- modal -->

<div class="modal fade" id="addcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm danh mục</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="?btn_add" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" name="name_category" class="form-control">
                    </div>
            </div>
            <div class="modal-body">
                <form method="POST" action="?btn_add">
                    <div class="form-group">
                        <label for="">Ảnh đại diện</label>
                        <input type="file" name="img" class="form-control">
                    </div>
            </div>
            <div class="modal-body">
                <form method="POST" action="?btn_add">
                    <div class="form-group">
                        <label for="">Khoảng giá tiền</label>
                        <input type="text" name="price" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Thêm" class="button">
            </div>
        </div>
    </div>
</div>