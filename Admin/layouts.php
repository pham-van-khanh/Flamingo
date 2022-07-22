<?php
if (!isset($_SESSION['admin']) && empty($_SESSION['admin'])) {
    header('Location: ' . $ADMIN_URL . '/');
    die;
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị</title>
    <!-- CDn icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js">
    </script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Bootrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/admins.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/CSS/footer.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        tinymce.init({
            selector: 'textarea#basic-example',
            height: 500,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script>
    <style>
        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body id="body-pd">
    <?php
    require_once '../nav.php';
    ?>
    <!--Container Main start-->
    <div class="height-100 bg-light">

        <?php
        if (isset($_SESSION['message'])) {
        ?>
            <div id="toast_mess" role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false" style="position: fixed; top: 0; left: 80%; z-index: 999;">
                <div class="toast-header"> <a type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </a></div>
                <div class="toast-body"><?php if (isset($_SESSION['message'])) {
                                            echo $_SESSION['message'];
                                            unset($_SESSION['message']);
                                        } ?></div>
            </div><?php } ?>

        <div class="card">
            <?php
            require_once $VIEW_NAME
            ?>

        </div>
    </div>
    <script src="<?= $CONTENT_URL ?>/JS/admin.js"></script>
    <script>
        var check_arr = [];
        var change_color = document.getElementById('change_color');
        var checkboxes = document.getElementsByName('foo[]');

        function checkboxs(source) {
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                console.log(n);
                checkboxes[i].checked = source.checked;
                if (source.checked) {
                    change_color.disabled = false;
                } else if (checkboxes[i].checked) {
                    change_color.disabled = false;
                } else {
                    change_color.disabled = true;

                }
                check_arr.push(checkboxes[i].value);
                if (!source.checked) {
                    check_arr = []
                }
            }
            return check_arr;
        }

        function change_color_checkbox(source) {
            if (source.checked) {
                return change_color.disabled = false;
            } else {
                return change_color.disabled = true;
            }
        }
    </script>
    <!--Container Main end-->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        function come_back() {
            window.history.back();
            preventDefault();
            return;
        }

        function alter_delete() {
            return confirm('Bạn có muốn xóa không');
        }

        function sigout() {
            return confirm('Bạn có muốn đăng xuất');
        }
    </script>
    <!-- TOAST -->
    <script>
        $(document).ready(function() {
            $("#toast_mess").toast("show");
            $(".select_option").change(function() {
                var color = $("option:selected", this).attr("class");
                $(this).attr("class", color);
                var id_reserver = $(this).attr("data-id");
                var status_reserve = $(this).val();
                /*  $.ajax({
                     url: 'http://localhost/du_an_flamingo/Admin/Reserver/handle.php',
                     type: 'POST',
                     data: {
                         "status": status_reserve,
                         "id_reserver ": id_reserver
                     },
                     success: function(data) {
                         var datas = JSON.parse(data);
                         alert(datas);
                     },
                     error: function(jqXHR, textStatus, errorThrown) {
                         console.log(textStatus, errorThrown);
                     }
                 }); */
                $.post('handle.php', {
                        status_reserve: status_reserve,
                        id_reserver: id_reserver
                    },
                    function(data, status) {
                        if (data == "success") {
                            console.log("success:", data);
                        } else {
                            console.log(status);
                        }

                    });
                console.log(status_reserve);
                console.log(id_reserver);
            });

        });
    </script>
</body>

</html>