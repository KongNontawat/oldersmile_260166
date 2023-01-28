<?php
include('../conn.php');

$query = mysqli_query($conn, "INSERT INTO setting (user_id, font_size) VALUES('$my_id','$set') ON DUPLICATE KEY UPDATE font_size = '{$_GET['font']}'");
if($query) {
    succ('../my_profile.php','บันทึกข้อมูล สำเร็จ');
}else {
    err('../my_profile.php','บันทึกข้อมูล ไม่สำเร็จ');
}