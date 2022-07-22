<?php
/* 
* @param array
* Thực hiện nhập vào database
*/
function insert_employee($data)
{
    $sql = "INSERT INTO `employee`( `name`,`email`, `pass`,  `img`, `sdt`, `address`) VALUES (:name,:email,:pass,:avatar,:phone,:address)";
    return pdo_execute($sql, $data);
}
/* 
* @param string
* Thực hiện lấy số lượng bản ghi trong dtb
*/
function select_employee($email)
{
    $sql = "SELECT * FROM `employee` WHERE `email` = ?";
    return row_count($sql, $email);
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
//lấy ra tất cả bản ghi
function select_all_employee()
{
    $sql = "SELECT * FROM `employee`";
    return pdo_query($sql);
}
//lấy ra tất cả bản ghi
function select_nav_employee($start, $end)
{
    $sql = "SELECT * FROM `employee` ORDER BY `id_employee` DESC LIMIT " . $start . " , " . $end . "";
    return pdo_query($sql);
}
//delete employee
function delete_employee($id)
{
    $sql = "DELETE FROM employee WHERE id_employee = " . $id;
    return  pdo_select_one($sql);
}
//lấy ra 1 bản ghi
function select_one_employee($id)
{
    $sql = "SELECT * FROM employee WHERE id_employee = " . $id;
    return  pdo_select_one($sql);
}
//update employee
function update_employee($data)
{
    $sql = "UPDATE `employee` SET `name` = :name , `email` = :email , `sdt` = :phone , `address` = :address WHERE `id_employee` = :id_employee ";
    return  pdo_execute($sql, $data);
}
//Đếm số bản ghi
function count_employs()
{
    $sql = "SELECT * FROM `employee`";
    return row_count_all($sql);
}

function login_employee($user, $pass)
{
    $sql = "SELECT * FROM `employee` WHERE email = :email AND pass = :pass";
    $conn = pdo_get_connection();
    $statement = $conn->prepare($sql);
    $params = [
        'email' => $user,
        'pass' => md5($pass),
    ];

    $statement->execute($params);
    $result = [];
    $data = $statement->fetch();
    if ($data == false) {
        // Truy vấn không tìm đc bản ghi tương ứng hoặc truy vấn có lỗi
        return [];
    }

    $result = [
        'id_employee' => $data['id_employee'],
        'img' => $data['img']
    ];

    return $result;
}
