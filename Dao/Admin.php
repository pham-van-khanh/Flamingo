<?php
function login($user, $pass)
{
    $sql = "SELECT * FROM `tbl_admin` WHERE email = :email AND pass = :pass";
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
        'id_admin' => $data['id_admin'],
        'img' => $data['img']
    ];

    return $result;
}
/* 
* truy vấn 1 bản ghi
*/
function select_one_admin($id)
{
    $sql = "SELECT * FROM `tbl_admin` WHERE id_admin = " . $id;
    return  pdo_select_one($sql);
}
