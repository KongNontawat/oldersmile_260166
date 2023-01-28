<?php 
include('../../conn.php');

$id = $_GET['id'];

$sql = "DELETE FROM post WHERE post_id = '$id'";
$query = mysqli_query($conn,$sql);

if($query) {
    succ('../pub_mng.php','ลบข้อมูล สำเร็จ');
}else{
    err('../pub_mng.php','ลบข้อมูล ไม่สำเร็จ');
}


?>