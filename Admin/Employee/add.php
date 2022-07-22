<div class="container box">
    <a href="<?= $ADMIN_URL ?>/Employee/" class="btn btn-primary fas fa-long-arrow-alt-left"></a>
    <h2 class="heading text-center text_color text-primary p-3">Thêm Nhân viên</h2>
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>
    <div class="row ">
        <form method="post" action="?btn_insert" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Họ tên</label>
                <input name="name" class="form-control form-control-lg" type="text">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control form-control-lg">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="pass" class="form-control form-control-lg">
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input name="phone" class="form-control form-control-lg" type="text">
            </div>
            <div class="form-group">
                <label for="">Avatar</label>
                <input name="avatar" class="form-control form-control-lg" type="file">
            </div>

            <div class="form-group">
                <label for="">Địa chỉ</label>
                <textarea name="address" class="form-control form-control-lg" id="basic-example" cols="30" rows="10"></textarea>
            </div>
            <div class=" mt-3 d-flex justify-content-between">
                <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>

    </div>
</div>