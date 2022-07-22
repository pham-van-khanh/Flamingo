<div class="row mt-4">
    <div class="col-4">
        <img src="<?= $CONTENT_URL ?>/Images/<?= $item_admin['img'] ?>" alt="Thumb" class="img-thumbnail">
    </div>
    <div class="col-8">
        <div class="w-50 align-center">
            <div class="form-group">
                <label for="exampleInputEmail1">
                    <h3>Tên tài khoản</h3>
                </label>
                <input type="text" disabled value="<?= $item_admin['name'] ?>" class="form-control form-control-lg">
            </div>
            <div class="form-group mt-4">
                <label for="exampleInputEmail1">
                    <h3>Email address</h3>
                </label>
                <input type="email" disabled value="<?= $item_admin['email'] ?>" class="form-control form-control-lg">
                <button class="btn mt-5" class="btn" style="background-color: #019d94; color: white">Chỉnh sửa</button>
            </div>
            </d>
        </div>
    </div>