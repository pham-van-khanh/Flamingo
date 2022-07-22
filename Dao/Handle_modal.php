<?php
require 'Pdo.php';
require 'Villa.php';
if (isset($_POST['Check_modal'])) {
    $data = select_one_villa($_POST['id_villa']);
    foreach ($data  as $item) {
        array_push($result_arr, $item);
        header('Content-Type: application/json');
        echo json_encode($result_arr);
    }
}
