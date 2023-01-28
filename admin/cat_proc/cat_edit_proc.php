<?php 
include('../../conn.php');

$cat_id = $_POST['cat_id'];   
$cat_name = $_POST['cat_name'];   

$sql = "UPDATE category SET cat_name='$cat_name' WHERE cat_id = '$cat_id'";
$query = mysqli_query($conn,$sql);

if($query) {
    succ('../cat_mng.php','แก้ไขข้อมูล สำเร็จ');

}else{
    err('../cat_mng.php','แก้ไขข้อมูล ไม่สำเร็จ');

}

?>