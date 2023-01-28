<?php 
include('../conn.php');
include('../auth_proc/check_login2.php');

$id = $_GET['id'];

$sql = "DELETE FROM post WHERE post_id = '$id'";
$query = mysqli_query($conn,$sql);

if($query) {
    succ($_SERVER['HTTP_REFERER'],'ลบข้อมูล สำเร็จ');
}else{
    err($_SERVER['HTTP_REFERER'],'ลบข้อมูล ไม่สำเร็จ');
}


?>