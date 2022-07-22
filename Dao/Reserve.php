<?php
/* 
* Thêm dữ liệu vào dtb
*/
function insert_reserve($data)
{
    $sql = "INSERT INTO `reserver`(`id_customers`, `start_date`, `end_date`, `status`, `id_voucher`, `number_people`) " .
        "VALUES (:id_customers,:start_date,:end_date,:status,:id_voucher, :number_people)";
    pdo_execute($sql, $data);
    return  true;
}
/* 
* Thêm dữ liệu vào dtb
*/
function insert_not_voucher_reserve($data)
{
    $sql = "INSERT INTO `reserver`(`id_customers`, `start_date`, `end_date`, `status`, `number_people`) " .
        "VALUES (:id_customers,:start_date,:end_date,:status, :number_people)";
    pdo_execute($sql, $data);
    return  true;
}
/* 
* Thêm dữ liệu vào bangr chi tieet
*/
function insert_id_villa_reserve($id_reserver, $id_villa, $service_id)
{
    $sql = "INSERT INTO `reserver_details`(`reserve_id`, `villa_id`, `service_id`) VALUES (" . $id_reserver . "," . $id_villa . "," . $service_id . ")";
    pdoo_execute($sql);
    return  true;
}
function insert_id_villa_not_service_reserve($id_reserver, $id_villa)
{
    $sql = "INSERT INTO `reserver_details`(`reserve_id`, `villa_id`) VALUES (" . $id_reserver . "," . $id_villa . ")";
    pdoo_execute($sql);
    return  true;
}
/* 
* Truy xuất dữ liệu vào dtb
*/
function select_one_reserve()
{
    /*  $sql = "SELECT  `id_reserver` FROM `reserver` WHERE `start_date`= '" . $start_date . "' AND `end_date` = '" .  $end_date . "' ORDER BY `id_reserver` DESC"; */
    $sql = "SELECT  `id_reserver` FROM `reserver` ORDER BY `id_reserver` DESC";
    return pdo_select_one($sql);
}
/* 
* truy xuất 3 bảng `customers`, `reserver`, `reserver_details`
*/
function select_all_reserver()
{
    $sql = "SELECT  *,id_reserver , customers.full_name as cus_name, customers.sdt as cus_sdt, reserver.start_date as start_date, reserver.end_date as end_date, reserver.status as status,  villa.name as name_villa  FROM  reserver JOIN reserver_details ON reserver_details.reserve_id = reserver.id_reserver JOIN villa ON villa.id_villa = reserver_details.villa_id JOIN customers on customers.id_customers = reserver.id_customers ORDER BY id_reserver";
    return pdo_query($sql);
}/* 
* truy xuất 3 bảng `customers`, `reserver`, `reserver_details`
*/
function select_one_villa_reserver($id)
{
    $sql = "SELECT sales, reserver.number_people  as number_people, villa_service.name as name_service , id_reserver, villa.price as price, villa.name as name_villa, customers.full_name as cus_name, customers.sdt as cus_sdt, reserver.start_date as start_date, reserver.end_date as end_date, reserver.status as status,villa.name as name_villa  FROM  `reserver` JOIN `voucher` ON voucher.id_voucher = reserver.id_voucher  JOIN `reserver_details` ON reserver_details.reserve_id = reserver.id_reserver JOIN `villa_service` ON reserver_details.service_id =  villa_service.id_villa_sv JOIN `villa` ON villa.id_villa = reserver_details.villa_id JOIN `customers` on customers.id_customers = reserver.id_customers WHERE reserver.id_reserver = $id";
    return pdo_query($sql);
}
/* 
* truy xuất 3 bảng `customers`, `reserver`, `reserver_details`
*/
function select_all_reserver_where($status)
{
    $sql = "SELECT *,id_reserver , customers.full_name as cus_name, customers.sdt as cus_sdt, reserver.start_date as start_date, reserver.end_date as end_date, reserver.status as status,  villa.name as name_villa  FROM  reserver JOIN reserver_details ON reserver_details.reserve_id = reserver.id_reserver JOIN villa ON villa.id_villa = reserver_details.villa_id JOIN customers on customers.id_customers = reserver.id_customers WHERE  `reserver`.`status`= '" . $status . "'  ORDER BY id_reserver  DESC";
    return pdo_query($sql);
}
/* 
* Change `status` from `reserver`
*/
function change_status($status, $id_reserver)
{
    $sql = "UPDATE `reserver` SET `status`='" . $status . "' WHERE `reserver`.`id_reserver`=" . $id_reserver;
    return pdoo_execute($sql);;
}
function hidden_villa($id)
{
    $sql = "UPDATE `villa` SET `status`= 0 WHERE `id_villa` = " . $id;
    return pdoo_execute($sql);
}
function block_villa($id)
{
    $sql = "UPDATE `villa` SET `status`= 1 WHERE `id_villa` = " . $id;
    return pdoo_execute($sql);
}
