<?php
/* 
* truy xuất tất cả bản ghi
*/
function select_all_footer()
{
    $sql = "SELECT * FROM `tbl_footer` ";
    return pdo_query($sql);
}
