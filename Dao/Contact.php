<?php
/* 
* truy xuất tất cả bản ghi
*/
function select_all_contact(){
    $sql = "SELECT * FROM contact ORDER BY id_contact DESC";
    return pdo_query($sql);
}
/*  
* Cập bản ghi
*
*/
function insert_contacts($data)
{
    $sql = "INSERT INTO `contact`(`name`, `email`, `sdt`, `contents`, `date_contacts`) VALUES (:name,:email,:sdt,:noidung, :date_contacts)";
    return pdo_execute($sql, $data);
}
function update_contact($id){
    $sql = "UPDATE `contact` SET `status` = 0 WHERE `id_contact` =".$id;
    return pdoo_execute($sql);
}
/*  
* Xóa 1 bản ghi
*
*/
function delete_contacts($data)
{
    $sql = "DELETE FROM `contact` WHERE `id_contact` = :id";
    return pdo_execute($sql, $data);
}

?>
