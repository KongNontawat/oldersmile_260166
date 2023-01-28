<?php 
include('../../conn.php');

$cat_name = $_POST['cat_name'];   

$sql = "INSERT INTO category VALUES('','$cat_name')";
$query = mysqli_query($conn,$sql);

if($query) {
    succ('../cat_mng.php','บันทึกข้อมูล สำเร็จ');

}else{
    err('../cat_mng.php','บันทึกข้อมูล ไม่สำเร็จ');

}

?>