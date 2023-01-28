<?php 
include('../conn.php');
include('../auth_proc/check_login2.php');

$user_id = $my_id;
$mar_name = $_POST['mar_name'];
$mar_fname = $_POST['mar_fname'];
$mar_email = $_POST['mar_email'];
$mar_tel = $_POST['mar_tel'];
$mar_address = $_POST['mar_address'];
$mar_type = $_POST['mar_type'];
$mar_status = 0;

$sql2 = "INSERT INTO market VALUES('','$user_id','$mar_name','$mar_fname','$mar_email','$mar_tel','$mar_address','$mar_type','$mar_status')";
$query2 = mysqli_query($conn,$sql2);
if($query2) {
    succ('../my_profile.php','บันทึกข้อมูล สำเร็จ');
}else{
    err('../part.php','บันทึกข้อมูล ไม่สำเร็จ');
}


?>