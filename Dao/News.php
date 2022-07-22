<?php
/*  
* Cập bản ghi
*
*/
function insert_new($data)
{
    $sql = "INSERT INTO `news`(`title`, `img`, `content`) VALUES (:title,:img,:content)";
    return pdo_execute($sql, $data);
}
/*  
* Truy xuất tất cả bản ghi
*
*/
function select_all_new()
{
    $sql = "SELECT * FROM `news`";
    return pdo_query($sql);
}
/*  
* Phân trang 
*/
function select_navigation_new ($start,$end){
    $sql = "SELECT * FROM `news` ORDER BY `id_news` DESC LIMIT ". $start ." , ". $end ."";
    return pdo_query($sql);
}
//select news theo id
function select_one_new($id){
    $sql = "SELECT * FROM news WHERE id_news = ".$id;
    return  pdo_select_one($sql);
}
//update news
function update_news($data){
    $sql = "UPDATE `news` SET `title` = :title,`img`=:img , `content` = :content WHERE `id_news` = :id_news ";
    return  pdo_execute($sql, $data);
}
//delete news
function delete_news($id){
    $sql = "DELETE FROM news WHERE id_news = ".$id;
    return  pdoo_execute($sql);
}
// Đếm số bản ghi
function count_news(){
    $sql = "SELECT * FROM `news` ";
    return row_count_all($sql);
}

