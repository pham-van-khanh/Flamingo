<?php
/* 
* @param array
* Thực hiện nhập vào database
*/
function insert_author($data)
{
    $sql = "INSERT INTO `customers`( `full_name`,`email`, `pass`,  `img`, `sdt`) VALUES (:name_author,:email,:pass,:img,:phone)";
    return pdo_execute($sql, $data);
}
/* 
* @param string
* Thực hiện lấy số lượng bản ghi trong dtb
*/
function select_author($email)
{
    $sql = "SELECT * FROM `customers` WHERE `email` = ?";
    return row_count_all($sql, $email);
}
/* 
* @param string
* Thực hiện lấy số lượng bản ghi trong dtb
*/
function select($name)
{
    $sql = "SELECT * FROM `$name`";
    return pdo_query($sql);
}

function select_all_customers()
{
    $sql = "SELECT * FROM `customers`";
    return pdo_query($sql);
}
/* 
* Truy xuất lấy bản ghi qua limit
*/
function select_nav_customers($start, $end)
{
    $sql = "SELECT * FROM `customers` ORDER BY `customers`.`id_customers` DESC LIMIT " . $start . " , " . $end . "";
    return pdo_query($sql);
}
//delete customer
function delete_customer($id)
{
    $sql = "DELETE FROM customers WHERE id_customers = " . $id;
    return  pdoo_execute($sql);
}
//delete customer
function lock_customer($id)
{
    $sql = "UPDATE customers SET `status`= 0 WHERE id_customers = " . $id;
    return  pdoo_execute($sql);
}
function unlock_customer($id)
{
    $sql = "UPDATE customers SET `status`= 1 WHERE id_customers = " . $id;
    return  pdoo_execute($sql);
}
//lấy ra 1 bản ghi
function select_one_customer($id)
{
    $sql = "SELECT * FROM customers WHERE id_customers = " . $id;
    return  pdo_select_one($sql);
}
//update customers
function update_customers($data)
{
    $sql = "UPDATE `customers` SET `full_name` = :name , `email` = :email, `sdt` = :phone , `address` = :address WHERE `id_customers` = :id_customers ";
    return  pdo_execute($sql, $data);
}
function update_customers_login($data)
{
    $sql = "UPDATE `customers` SET `full_name` = :name , `email` = :email , `pass` = :pass, `img` = :img , `sdt` = :phone , `address` = :address WHERE `id_customers` = :id_customers ";
    return  pdo_execute($sql, $data);
}
/* 
* Đếm số bản ghi
*/
function count_author()
{
    $sql = "SELECT * FROM `customers` ";
    return row_count_all($sql);
}

function login($user, $pass)
{
    $sql = "SELECT * FROM customers WHERE email = :email AND pass = :pwd";
    $conn = pdo_get_connection();
    $statement = $conn->prepare($sql);
    $params = [
        'email' => $user,
        'pwd' => md5($pass),
    ];

    $statement->execute($params);
    $result = [];
    $data = $statement->fetch();

    if ($data == false) {
        // Truy vấn không tìm đc bản ghi tương ứng hoặc truy vấn có lỗi
        return [];
    }

    $result = [
        'id_customers' => $data['id_customers'],
        'img' => $data['img'],
        'email' => $data['email'],
        'pass' => $data['pass'],
        'sdt' => $data['sdt'],
        'full_name' => $data['full_name'],
        'address' => $data['address'],
        'status' => $data['status']
    ];

    return $result;
}

function select_one_reserver($id)
{
    $sql = "SELECT DISTINCT villa.price_sale as price_sale, id_reserver, villa.price as price, villa.name as name_villa, customers.full_name as cus_name, customers.sdt as cus_sdt, reserver.start_date as start_date, reserver.end_date as end_date, reserver.status as status,villa.name as name_villa  FROM  reserver JOIN reserver_details ON reserver_details.reserve_id = reserver.id_reserver JOIN villa ON villa.id_villa = reserver_details.villa_id JOIN customers on customers.id_customers = reserver.id_customers  WHERE reserver.id_customers = $id ORDER BY `reserver`.`id_reserver` DESC";
    return pdo_query($sql);
}
function delete_cart($id)
{
    $sql = "DELETE FROM reserver WHERE id_reserver = " . $id;
    return  pdoo_execute($sql);
}

// quên mật khẩu
function forgot_password($data)
{

    $sql = "UPDATE `customers` SET `pass` = :pwd WHERE `email` = :email ";
    return  pdo_execute($sql, $data);
}
