<?php
// Select on `villa_category`
// $sql = "SELECT * FROM villa_category";
// $data =   pdo_query($sql);
/* *
* ID danh mục villa
 */
$id_category = $_GET['btn_add'];
$sql = "SELECT * FROM villa_category WHERE id = " . $id_category;
$data =   pdo_select_one($sql); // Cái này để lấy tên villa và id_danh mucj
?>
<div class="container box">
    <a href="<?= $ADMIN_URL ?>/Villa/index.php?id=<?= $data['id'] ?>" class="btn btn-primary fas fa-long-arrow-alt-left"></a>
    <h2 class="heading text-center text_color text-primary p-3">Thêm <?= $data['name'] ?></h2>
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>
    <div class="row ">
        <form method="post" action="?btn_insert=<?= $data['id'] ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for=""><strong>Tên villa</strong></label>
                <input type="text" name="names" class="form-control form-control-lg">
            </div>
            <div class="form-group">
                <label for=""><strong>Giá khuyến mại</strong></label>
                <input type="text" name="price_sale" class="form-control form-control-lg">
            </div>
            <div class="form-group">
                <strong><label for="">Ảnh</label></strong>
                <input type="file" name="img" class="form-control form-control-lg">
            </div>
            <!-- <div class="form-group">
                <strong><label for="">Ảnh chi tiết</label></strong>
                <input type="file" name="images[]" multiple class="form-control form-control-lg">
            </div> -->
            <div class="form-group">
                <label for=""><strong>Giá thuê</strong></label>
                <input type="number" name="price" class="form-control form-control-lg">
            </div>
            <div class="form-group">
                <label for=""><strong>Số lượng phòng ngủ</strong></label>
                <input type="number" name="bedrooms" class="form-control form-control-lg">
            </div>
            <div class="form-group">
                <label for=""><strong>Số lượng tối đa</strong></label>
                <input type="number" name='quantity' class="form-control form-control-lg">
            </div>
            <div class="form-group">
                <label for=""><strong>Diện tích</strong></label>
                <input type="text" name="area" class="form-control form-control-lg">
            </div>
            <div class="form-group">
                <label for=""><strong>Vị trí</strong></label>
                <input type="text" name="view" class="form-control form-control-lg">
            </div>
            <div class="form-group">
                <label for=""><strong>Mô tả</strong></label>
                <textarea name="description" class="form-control form-control-lg" id="basic-example" cols="30" rows="10"></textarea>
            </div>
            <div class=" mt-3 d-flex justify-content-between">
                <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>

    </div>
</div>