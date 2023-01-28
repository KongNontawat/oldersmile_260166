<?php
include('../conn.php');
include('../auth_proc/check_login2.php');

$query = mysqli_query($conn, "SELECT * FROM question");
foreach($query as $ques) {
    $answer = $_POST['answer'.$ques['ques_id']];
    $query2 = mysqli_query($conn, "INSERT INTO ques_answer VALUES('{$ques['ques_id']}','$my_id','$answer')");
}

if($query2) {
    succ('../ques_succ.php','บันทึกสำเร็จ');
}else{
    err('../ques.php','บันทึกไม่สำเร็จ');
}