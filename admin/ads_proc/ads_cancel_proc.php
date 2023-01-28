<?php 
include('../../conn.php');

$id = $_GET['id'];
$point = $_GET['point'];
$user_id = $_GET['user_id'];

$sql = "DELETE FROM advert WHERE ad_id = '$id'";
$query = mysqli_query($conn,$sql);

$sql2 = "UPDATE user SET user_wallet = user_wallet + '$point' WHERE user_id = '$user_id' AND user_role = 'market'";
$query2 = mysqli_query($conn,$sql2);

if($query2) {
    succ('../ads_mng.php','ยกเลิก สำเร็จ');
}else{
    err('../ads_mng.php','ยกเลิก ไม่สำเร็จ');
}


?>