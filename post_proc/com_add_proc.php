<?php 
include('../conn.php');
include('../auth_proc/check_login2.php');

$user_id = $my_id;
$post_id = $_POST['post_id'];
$com_body = $_POST['com_body'];
$com_created = date('d-m-Y');

$sql = "INSERT INTO comment VALUES('','$post_id','$user_id','$com_body','$com_created')";
$query = mysqli_query($conn,$sql);

if($query) {
    succ($_SERVER['HTTP_REFERER'],'แสดงความคิดเห็นสำเร็จ');

}else{
    err($_SERVER['HTTP_REFERER'],'แสดงความคิดเห็นไม่สำเร็จ');

}

?>