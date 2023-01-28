<?php 
include('../conn.php');
include('../auth_proc/check_login2.php');
$id = $_GET['id'];
$link = $_GET['link'];
$part = $_GET['part'];

$sql2 = "UPDATE user SET user_wallet = user_wallet + 0.3 WHERE user_id = '$part' AND user_role = 'partner'";
$query2 = mysqli_query($conn,$sql2);
$sql3 = "UPDATE advert SET ad_point = ad_point - 1 WHERE ad_id = '$id'";
$query3 = mysqli_query($conn,$sql3);

header('location:'.$link)


?>