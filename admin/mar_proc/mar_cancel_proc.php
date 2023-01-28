<?php
include('../../conn.php');

$id = $_GET['id'];

$sql = "DELETE FROM market WHERE mar_id = '$id'";
$query = mysqli_query($conn,$sql);

if($query) {
    succ('../mar_mng.php','ไม่อนุมัติ สำเร็จ');
}else{
    err('../mar_mng.php','ไม่อนุมัติ ไม่สำเร็จ');
}

?>