<div class="container box">
    <a href="<?= $ADMIN_URL ?>/Voucher" class="btn btn-primary fas fa-long-arrow-alt-left"></a>
    <h2 class="heading text-center text_color text-primary p-3">Thêm voucher</h2>
    <?php
    function rand_string($length)
    {
        $str = '';
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $size = strlen($chars);
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[rand(0, $size - 1)];
        }
        return $str;
    }

    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>
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
                <label for="">Mã giảm giá</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="discount" value="<?= rand_string(8) ?>">
                    <div class="input-group-append">
                        <a href="<?= $ADMIN_URL ?>/Voucher/index.php?btn_add" class="btn btn-outline-secondary" type="button">Mã mới</a>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Giá muốn giảm</label>
                <input type="number" name="price" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nội dung</label>
                <textarea name="content" class="form-control" id="basic-example" cols="30" rows="10"></textarea>
            </div>
            <div class=" mt-3 d-flex justify-content-between">
                <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>

    </div>
</div>