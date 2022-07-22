<div class="container box">
    <a href="<?= $ADMIN_URL ?>/Service" class="btn btn-primary fas fa-long-arrow-alt-left"></a>
    <h2 class="heading text-center text_color text-primary p-3">Thêm voucher</h2>
    <div class="row ">
        <form method="post" action="?btn_update" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Tiêu đề</label>
                <input type="text" name="title" value="<?= $item['name'] ?>" class="form-control">
                <input type="hidden" name="id" value="<?= $item['id_villa_sv'] ?>" class="form-control">
            </div>
            <div style="width: 200px;">
                <img src="<?= $CONTENT_URL ?>/Images/<?= $item['img'] ?>" alt="">
            </div>
            <div class="form-group">
                <label for="">Ảnh</label>
                <input type="file" name="img" class="form-control">
                <input type="hidden" name="img_base" value="<?= $item['img'] ?>">
            </div>
            <div class="form-group">
                <label for="">Giá dịch vụ</label>
                <input type="number" name="price" value="<?= $item['price'] ?>" class="form-control">
            </div>
            <div class=" mt-3 d-flex justify-content-between">
                <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>

    </div>
</div>