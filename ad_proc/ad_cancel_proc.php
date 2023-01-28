<?php 
include('../conn.php');
include('../auth_proc/check_login2.php');

$id = $_GET['id'];
$point = $_GET['point'];
$user_id = $my_id;

$sql = "DELETE FROM advert WHERE ad_id = '$id'";
$query = mysqli_query($conn,$sql);

$sql2 = "UPDATE user SET user_wallet = user_wallet + '$point' WHERE user_id = '$user_id' AND user_role = 'market'";
$query2 = mysqli_query($conn,$sql2);

if($query2) {
    succ('../promote.php','ยกเลิก สำเร็จ');
}else{
    err('../promote.php','ยกเลิก ไม่สำเร็จ');
}


?>