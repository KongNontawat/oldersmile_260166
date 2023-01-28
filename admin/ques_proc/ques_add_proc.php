<?php 
include('../../conn.php');

$ques_body = $_POST['ques_body'];   

$sql = "INSERT INTO question VALUES('','$ques_body')";
$query = mysqli_query($conn,$sql);

if($query) {
    succ('../ques_mng.php','บันทึกข้อมูล สำเร็จ');

}else{
    err('../ques_mng.php','บันทึกข้อมูล ไม่สำเร็จ');

}

?>