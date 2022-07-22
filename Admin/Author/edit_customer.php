<?php
//select on 'new'
$customer = select_one_customer($id);
?>
<div class="container box">
    <button onclick="come_back()" class="btn btn-primary fas fa-long-arrow-alt-left"></button>
    <h2 class="heading text-center text_color text-primary p-3">Sửa thông tin khách hàng '<?= $customer['full_name'] ?>'</h2>
    <?php
    if (isset($message)) {
        echo $message;
        unset($message);
    }
    ?>
    <div class="row ">
        <form method="post" action="?btn_update">
            <input type="hidden" name="id_customers" value="<?php echo $customer['id_customers'] ?>">
            <div class="form-group">
                <label for="">Họ Tên</label>
                <input type="text" name="name" class="form-control" value="<?php echo $customer['full_name'] ?>">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $customer['email'] ?>">
            </div>
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $customer['sdt'] ?>">
            </div>
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <textarea name="address" class="form-control" id="basic-example" cols="30" rows="10"><?php echo $customer['address'] ?></textarea>
            </div>
            <div class=" mt-3 d-flex justify-content-between">
                <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>

    </div>
</div>