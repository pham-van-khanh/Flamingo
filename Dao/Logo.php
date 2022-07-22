<?php

/* 
* truy xuất tất cả bản ghi
 */
function select_all_logo()
{
    $sql = "SELECT * FROM tbl_logo GROUP BY id DESC";
    return pdo_query($sql);
}
/* 
* truy xuất qua trangj thai
 */
function select_status_logo($status)
{
    $sql = "SELECT * FROM tbl_logo WHERE `status` = " . $status;
    return pdo_select_one($sql);
}
/* 
* truy xuất qua trangj thai
 */
function insert_logo($data)
{
    $sql = "INSERT INTO `tbl_logo`(`logo`, `status`) VALUES (:img,:status)";
    return pdo_execute($sql, $data);
}
/* 
* truy xuất qua trangj thai
 */
function update_logo($id)
{
    $sql = "UPDATE `tbl_logo` SET `status` = 1 WHERE `id` = " . $id;
    pdoo_execute($sql);
    $sql1 = "UPDATE `tbl_logo` SET `status` = 0 WHERE NOT `id` = " . $id;
    pdoo_execute($sql1);
    return;
}

function delete_logo($id)
{
    $sql = "DELETE FROM `tbl_logo` WHERE `id` = " . $id;
    return pdoo_execute($sql);
}
