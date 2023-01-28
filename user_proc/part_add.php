<?php 
include('../conn.php');
include('../auth_proc/check_login2.php');

$user_id = $my_id;
$part_fname = $_POST['part_fname'];
$part_email = $_POST['part_email'];
$part_address = $_POST['part_address'];
$part_detail = $_POST['part_detail'];
$part_bank_number = $_POST['part_bank_number'];
$part_bank_acc = $_POST['part_bank_acc'];
$part_bank_name = $_POST['part_bank_name'];
$part_status = 0;

$sql2 = "INSERT INTO partner VALUES('','$user_id','$part_fname','$part_email','$part_address','$part_detail','$part_bank_number','$part_bank_acc','$part_bank_name','$part_status')";
$query2 = mysqli_query($conn,$sql2);
if($query2) {
    succ('../my_profile.php','บันทึกข้อมูล สำเร็จ');
}else{
    err('../part.php','บันทึกข้อมูล ไม่สำเร็จ');
}


?>