<?php
include('../../conn.php');

$id = $_GET['id'];

$sql = "DELETE FROM partner WHERE part_id = '$id'";
$query = mysqli_query($conn,$sql);

if($query) {
    succ('../part_mng.php','ไม่อนุมัติ สำเร็จ');
}else{
    err('../part_mng.php','ไม่อนุมัติ ไม่สำเร็จ');
}

?>