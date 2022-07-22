<div class="container box">
    <a href="<?= $ADMIN_URL ?>/Service" class="btn btn-primary fas fa-long-arrow-alt-left"></a>
    <h2 class="heading text-center text_color text-primary p-3">Thêm dịch vụ</h2>
    <div class="row ">
        <form method="post" action="?btn_insert" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Tiêu đề</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Ảnh</label>
                <input type="file" name="img" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Giá dịch vụ</label>
                <input type="number" name="price" class="form-control">
            </div>
            <div class=" mt-3 d-flex justify-content-between">
                <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>

    </div>
</div>