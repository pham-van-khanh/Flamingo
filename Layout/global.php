<?php
session_start();
$ROOT_URL = "http://localhost/du_an_flamingo";
$CONTENT_URL = "$ROOT_URL/Content";
$LAYOUT_URL = "$ROOT_URL/Layout";
$ADMIN_URL = "$ROOT_URL/Admin";
$DAO_URL = "$ROOT_URL/Dao";
// Extract REQUEST
function exist_params($fieldname)
{
    return array_key_exists($fieldname, $_REQUEST);
}
// Xử lý cập nhật ảnh
function handel_img($path, $uploads, $nameimg)
{

    move_uploaded_file($path, $uploads . $nameimg);
    return   $img = 'Uploads/' . $nameimg;
}

$date_start = date("Y-m-d");
$date_end = date('Y-m-d', strtotime("+1 day"));