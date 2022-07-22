<?php
/* 
* truy xuất tất cả bản ghi
*/
function select_all_service()
{
    $sql = "SELECT * FROM `villa_service` WHERE `status` = 1";
    return pdo_query($sql);
}
/* 
* truy xuất tất cả bản ghi
*/
function select_one_service($id)
{
    $sql = "SELECT * FROM `villa_service` WHERE id_villa_sv =  " . $id;
    return pdo_select_one($sql);
}
/* 
* truy xuất tất cả bản ghi
*/
function update_service($data)
{
    $sql = "UPDATE `villa_service` SET `name`=:title,`price`=:price,`img`=:img WHERE `id_villa_sv`=:id";
    return pdo_execute($sql, $data);
}
/* 
* truy xuất tất cả bản ghi
*/
function insert_service($data)
{
    $sql = "INSERT INTO `villa_service`( `name`, `price`, `img`) VALUES (:title,:price,:img)";
    return pdo_execute($sql, $data);
}
/* 
* truy xuất tất cả bản ghi
*/
function delete_service($id)
{
    $sql = "DELETE FROM `villa_service` WHERE `id_villa_sv`=" . $id;
    return pdoo_execute($sql);
}
function count_service()
{
    $sql = "SELECT * FROM `villa_service` ";
    return row_count_all($sql);
}
/* 
Phân trang
*/
function select_all_nav($start, $end)
{
    $sql = "SELECT * FROM `villa_service` WHERE `status` = 1 LIMIT " . $start . " , " . $end . " ";
    return pdo_query($sql);
}