<?php
include('../../conn.php');

$id = $_GET['id'];
$point = $_GET['point'];
$user_id = $_GET['user_id'];

$sql = "UPDATE advert SET ad_status = 1 WHERE ad_id = '$id'";
$query = mysqli_query($conn,$sql);

$sql2 = "UPDATE user SET user_wallet = user_wallet - '$point' WHERE user_id = '$user_id'";
$query2 = mysqli_query($conn,$sql2);

if($query2) {
    succ('../ad_mng.php','อนุมัติ สำเร็จ');
}else{
    err('../ad_mng.php','อนุมัติ ไม่สำเร็จ');
}

?>