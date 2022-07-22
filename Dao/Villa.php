<?php
// <!-- Insert -->
function insert_Villa($data)
{
    $sql = "INSERT INTO `villa`( `name`, `images`, `villa_category_id`, `price_sale`, `price`, `desciption`, `quantity`, `area`, `view`, `bedrooms`) VALUES (:names,:img,:villa_category_id,:price_sale,:price,:description,:quantity,:area,:view, :bedrooms)";
    return pdo_execute($sql, $data);
}
// Select all on villa category and villa
function select_all_villa($id)
{
    $sql = "SELECT * FROM `villa` a WHERE `status` = 1 AND villa_category_id = " . $id;
    return pdo_query($sql);
} // Select all on villa category and villa
function select_all_where_category_villa($id, $number_people)
{
    $sql = "SELECT * FROM `villa`  WHERE villa_category_id = " . $id . " AND " . $number_people . "<= `quantity` AND `status` = 1";
    return pdo_query($sql);
}
// PHÂN Trang
function page_nav_villa($id, $start, $end)
{
    $sql = "SELECT * FROM `villa`   WHERE villa_category_id = " . $id . " ORDER BY id_villa DESC LIMIT " . $start . " , " . $end . "";
    return pdo_query($sql);
}
function count_villa($id)
{
    $sql = "SELECT count(*) FROM `villa`  WHERE villa_category_id = " . $id;
    return row_count($sql);
}
// Select name on villa category
function select_name($id)
{
    $sql = "SELECT b.name FROM villa a JOIN villa_category b on a.villa_category_id = b.id WHERE a.villa_category_id =  " . $id;
    return pdo_select_one($sql);
}
// update villa
function update_villa($data)
{
    $sql = "UPDATE `villa` SET `name` = :names , `price_sale` = :price_sale, `price` = :price, `desciption` = :description, `quantity` = :quantity, `area` = :area, `view` = :view, `images` = :img  WHERE `id_villa` = :id_villa";
    return pdo_execute($sql, $data);
}
//select one villa
function select_one_villa($id)
{
    $sql = "SELECT * FROM villa WHERE id_villa = " . $id;
    return  pdo_select_one($sql);
}
//delete villa
function delete_villa($id)
{
    $sql = "DELETE FROM villa WHERE id_villa = " . $id;
    return  pdo_select_one($sql);
}
//select all villa
function select_villa()
{
    $sql = "SELECT * FROM `villa` WHERE  `status` = 1 ORDER BY id_villa DESC ";
    return pdo_query($sql);
}
//select all villa
function select_where_status_villa()
{
    $sql = "SELECT * FROM `villa` WHERE  `status` = 1";
    return pdo_query($sql);
}
