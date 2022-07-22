<?php
// Select all
function select_all_category()
{
    $sql = "SELECT * FROM villa_category";
    return pdo_query($sql);
}
// Insert
function insert_category($data)
{
    $sql = "INSERT INTO villa_category (`name`,`img`,`price`)VALUES(:name_category,:img,:price)";
    return pdo_execute($sql, $data);
}
// Insert
function edit_category($data)
{
    $sql = "INSERT INTO `villa_category`(`name`) VALUES (:name_category) WHERE id = :id";
    // $sql = "INSERT INTO villa_category (`name`)VALUES(:name_category)";
    return pdo_execute($sql, $data);
}
// 
function delete_category($id)
{
    $sql = "DELETE FROM `villa_category` WHERE `id`= ?";
    return pdoo_execute($sql, $id);
}
// Đếm số bản ghi
function count_category()
{
    $sql = "SELECT * FROM villa_category";
    return row_count_all($sql);
}
function select_one_category_villa($id)
{
    $sql = "SELECT * FROM `villa_category` WHERE `id` = " . $id . "";
    return  pdo_select_one($sql);
}
// 
function update_category_villa($data)
{
    $sql = "UPDATE `villa_category` SET `name` = :title WHERE `id` = :id";
    return pdo_execute($sql, $data);
}
