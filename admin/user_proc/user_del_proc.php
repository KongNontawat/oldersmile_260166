<?php 
include('../../conn.php');

$id = $_GET['id'];

$sql = "DELETE FROM user WHERE user_id = '$id'";
$query = mysqli_query($conn,$sql);

if($query) {
    succ('../user_mng.php','ลบข้อมูล สำเร็จ');
}else{
    err('../user_mng.php','ลบข้อมูล ไม่สำเร็จ');
}


?>