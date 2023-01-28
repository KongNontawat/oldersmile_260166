<?php 
include('../../conn.php');

$ques_id = $_POST['ques_id'];   
$ques_body = $_POST['ques_body'];   

$sql = "UPDATE question SET ques_body='$ques_body' WHERE ques_id = '$ques_id'";
$query = mysqli_query($conn,$sql);

if($query) {
    succ('../ques_mng.php','แก้ไขข้อมูล สำเร็จ');

}else{
    err('../ques_mng.php','แก้ไขข้อมูล ไม่สำเร็จ');

}

?>