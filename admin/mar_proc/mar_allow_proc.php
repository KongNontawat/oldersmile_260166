<?php
include('../../conn.php');

$id = $_GET['id'];

$sql = "UPDATE user SET user_role = 'market' WHERE user_id = '$id'";
$query = mysqli_query($conn,$sql);

$sql2 = "UPDATE market SET mar_status = 1 WHERE user_id = '$id'";
$query2 = mysqli_query($conn,$sql2);

if($query2) {
    succ('../mar_mng.php','อนุมัติ สำเร็จ');
}else{
    err('../mar_mng.php','อนุมัติ ไม่สำเร็จ');
}

?>