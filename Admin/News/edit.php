<?php
$new = select_one_new($id);
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
        <form method="post" action="?btn_update" enctype="multipart/form-data">
            <input type="hidden" name="id_news" value="<?php echo $new['id_news'] ?>">
            <div class="form-group">
                <label for="">Tiêu đề</label>
                <input type="text" name="title" class="form-control" value="<?php echo $new['title'] ?>">
            </div>
            <div class="form-group">
                <label for="">Ảnh</label><br>
                <img class="w-25" src="<?= $CONTENT_URL ?>/Images/<?= $new['img'] ?>" alt="">
                <input accept="image/png, image/jpeg" type="file" name="img" class="form-control">
                <input type="hidden" value="<?php echo $new['img'] ?>" name="img_base" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nội dung</label>
                <textarea name="content" class="form-control" id="basic-example" cols="30" rows="10"><?php echo $new['content'] ?></textarea>
            </div>
            <div class=" mt-3 d-flex justify-content-between">
                <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>

    </div>
</div>