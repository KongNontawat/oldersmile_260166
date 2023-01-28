<?php 
include('../../conn.php');

$id = $_GET['id'];

$sql = "DELETE FROM advert WHERE ad_id = '$id'";
$query = mysqli_query($conn,$sql);

if($query) {
    succ('../ad_mng.php','ไม่อนุมัติ สำเร็จ');
}else{
    err('../ad_mng.php','ไม่อนุมัติ ไม่สำเร็จ');
}


?>