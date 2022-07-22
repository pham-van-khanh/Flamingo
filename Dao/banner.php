<?php
/* 
* truy xuất tất cả bản ghi
*/
function select_all_banner()
{
    $sql = "SELECT * FROM `tbl_banner` GROUP BY id DESC";
    return pdo_query($sql);
}
/* 
* truy xuất tất cả bản ghi
*/
function delete_banner($id)
{
    $sql = "DELETE FROM `tbl_banner` WHERE `id`=" . $id;
    return pdoo_execute($sql);
}
/* 
* insert 1 bản ghi
*/
function insert_banner($data)
{
    $sql = "INSERT INTO `tbl_banner`(`img`, `status`) VALUES (:img,:status)";
    return pdo_execute($sql, $data);
}
/* 
* truy xuất tất cả bản ghi
*/
function select_all_status()
{
    $sql = "SELECT * FROM `tbl_banner` WHERE `status`=1";
    return pdo_query($sql);
}
function update_banner_hiden($id)
{
    $sql = "UPDATE `tbl_banner` SET `status`= 0 WHERE `id`=" . $id;
    return pdoo_execute($sql);
}
function update_banner_block($id)
{
    $sql = "UPDATE `tbl_banner` SET `status`= 1 WHERE `id`=" . $id;
    return pdoo_execute($sql);
}
