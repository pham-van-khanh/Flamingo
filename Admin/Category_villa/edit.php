<?php
//select on 'new'
$item = select_one_category_villa($id);
// var_dump($item);die;
?>

<div class="container box">
    <button onclick="come_back()" class="btn btn-primary fas fa-long-arrow-alt-left"></button>

    <h2 class="heading text-center text_color text-primary p-3">Sửa</h2>
    <?php
    if (isset($message)) {
        echo $message;
        unset($message);
    }
    ?>
    <div class="row ">
        <form method="post" action="?btn_update">
            <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
            <div class="form-group">
                <label for="">Tên </label>
                <input type="text" name="title" class="form-control" value="<?php echo $item['name'] ?>">
            </div>
            <div class=" mt-3 d-flex justify-content-between">
                <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>

    </div>
</div>