<?php

//connection database

function pdo_get_connection()
{
    $dburl = "mysql:host=localhost;dbname=abec";
    $username = "root";
    $password = "";

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
/* Thực thi cập nhật, Xóa bằng mảng  */
function pdo_execute($sql, $data)
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
/* Thực thi cập nhật, xóa 1 bản ghi  */
function pdoo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);   
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
/* Truy xuất tất cả  */
function pdo_query($sql)
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        echo "lỗi: ";
        $e->getMessage();
    } finally {
        unset($conn);
    }
}

/* Truy xuất 1 bản ghi  */
function  pdo_select_one($sql)
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        echo "lỗi: ";
        $e->getMessage();
    } finally {
        unset($conn);
    }
}
// Kiểm tra đầu vào
function test_input($data)
{
    $data = trim($data);
    $data = htmlentities($data);
    $data = stripslashes($data);
    return $data;
}
/* 
* Đếm 1 số bản ghi sử dụng để 
* check tài khoản trong bảng khách hàng
*/
function row_count($sql)
{  
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($rows)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
/* 
* Đếm tất cả số bản ghi trong bảng
*/
function row_count_all($sql)
{  
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $total = $stmt->rowCount();
        return $total;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

