<?php
/* 
* Truy xt tất cả
*/
function select_all($start, $end)
{
    $sql = "SELECT * FROM `voucher`  WHERE NOT `id_voucher` = 1 ORDER BY  `id_voucher` DESC LIMIT " . $start . " , " . $end . "";
    return pdo_query($sql);
}
/* 
* Truy xt tất cả
*/
function insert_voucer($data)
{
    $sql = "INSERT INTO `voucher`(`title`, `description`, `sales`, `discount`, `img`) VALUES (:title,:content,:price,:discount,:img)";
    return  pdo_execute($sql, $data);
}
/* 
* Truy xt tất cả
*/
function update_voucher($data)
{
    $sql = "UPDATE `voucher` SET `title`= :title,`description`=:content,`sales`=:price,`discount`=:discount,`img`=:img WHERE `id_voucher`=:id";
    return  pdo_execute($sql, $data);
}
function update_voucher_change($id)
{
    $sql = "UPDATE `voucher` SET `status` = 1 WHERE `id_voucher`=" . $id;
    pdoo_execute($sql);
    $sql1 = "UPDATE `voucher` SET `status` = 0 WHERE NOT `id_voucher`=" . $id;
    pdoo_execute($sql1);
    return;
}


function count_voucher()
{
    $sql = "SELECT * FROM `voucher` ";
    return row_count_all($sql);
}
// Truy xuất 1 bản ghi
function select_one_voucher()
{
    $sql = "SELECT * FROM `voucher` WHERE `status`= 1";
    return pdo_select_one($sql);
}
// Truy xuất 1 bản ghi
function select_discount_voucher($discount)
{
    $sql = "SELECT * FROM `voucher` WHERE `discount`= '" . $discount . "'";
    return pdo_select_one($sql);
}

// Xóa
function delete_one($id)
{
    $sql = "DELETE FROM `voucher` WHERE id_voucher = " . $id;
    // var_dump($sql);die;
    return  pdoo_execute($sql);
}
