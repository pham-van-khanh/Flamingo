<?php
$data = select_all_contact();
?>
<h2 class="text-center pt-2">Tin liên hệ</h2>
    <table id="tablecontact" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Ngày gửi</th>
                <th scope="col">Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($data as $item) {
            ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['email'] ?></td>
                    <td><?= $item['sdt'] ?></td>
                    <td><?= $item['contents'] ?></td>
                    <td><?= $item['date_contacts'] ?></td>
                    <td class="d-flex justify-content-between align-content-center" >
                        <?php
                        if ($item['status'] == 1) {
                            echo '<p class="text-primary">Mới</p><a href="?contact_return='.$item['id_contact'].'" class="btn btn-primary">Phản hồi</a>';
                        } else {
                            echo '<p class="text-success">Đã phản hồi</p>';
                        }
                        ?>
                        
                    </td>
                    <td><a onclick="return alter_delete()" href="index.php?btn_delete=<?= $item['id_contact'] ?>" style="cursor: pointer;" class="fas fa-trash-alt text-danger"></a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </table>