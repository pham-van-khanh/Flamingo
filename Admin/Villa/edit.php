<?php
//select on 'villa'
$villa =   select_one_villa($id);
?>
<div class="container box">
    <button onclick="come_back()" class="btn btn-primary fas fa-long-arrow-alt-left"></button>
    <h2 class="heading text-center text_color text-primary p-3">Sửa <?= $villa['name'] ?></h2>
    <?php
    if (isset($message)) {
        echo $message;
        unset($message);
    }
    ?>
    <div class="row ">
        <form method="post" action="?btn_update=<?= $villa['villa_category_id'] ?>" enctype="multipart/form-data">
            <input type="hidden" name="id_villa" value="<?php echo $villa['id_villa'] ?>">
            <div class="form-group">
                <label for=""><strong>Tên villa</strong></label>
                <input type="text" name="names" class="form-control form-control-lg" value="<?php echo $villa['name'] ?>">
            </div>
            <div class="form-group">
                <label for=""><strong>Giá khuyến mại</strong></label>
                <input type="text" name="price_sale" class="form-control form-control-lg" value="<?php echo $villa['price_sale'] ?>">
            </div>
            <div class="form-group">
                <label for=""><strong>Giá thuê</strong></label>
                <input type="price" name="price" class="form-control form-control-lg" value="<?php echo $villa['price'] ?>">
            </div>
            <div class="form-group" style="width: 350px;height: 350px; margin-bottom:25px">
                <label for=""><strong>Ảnh</strong></label>
                <img src="<?= $CONTENT_URL ?>/Images/<?= $villa['images'] ?>" alt="">
                <input type="hidden" name="img_base" class="form-control form-control-lg" value="<?php echo  $villa['images'] ?>">

            </div>

            <div class="form-group" >
                <label for=""><strong></strong></label>
                <input type="file" name="img" class="form-control form-control-lg">
            </div>

            <div class="form-group mt-3">
                <label for=""><strong>Số lượng tối đa</strong></label>
                <input type="number" name='quantity' class="form-control form-control-lg" value="<?php echo $villa['quantity'] ?>">
            </div>
            <div class="form-group">
                <label for=""><strong>Diện tích</strong></label>
                <input type="text" name="area" class="form-control form-control-lg" value="<?php echo $villa['area'] ?>">
            </div>
            <div class="form-group">
                <label for=""><strong>Vị trí</strong></label>
                <input type="text" name="view" class="form-control form-control-lg" value="<?php echo $villa['view'] ?>">
            </div>
            <div class="form-group">
                <label for=""><strong>Mô tả</strong></label>
                <textarea name="description" class="form-control form-control-lg" id="basic-example" cols="30" rows="10"><?php echo $villa['desciption'] ?></textarea>
            </div>
            <div class=" mt-3 d-flex justify-content-between">
                <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>

    </div>
</div>