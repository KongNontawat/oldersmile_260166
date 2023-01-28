<?php 
include('../conn.php');
include('../auth_proc/check_login2.php');

$id = $_GET['id'];

$sql = "INSERT INTO post_like VALUES('$id','$my_id',1)";
$query = mysqli_query($conn,$sql);



?>