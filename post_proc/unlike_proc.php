<?php 
include('../conn.php');
include('../auth_proc/check_login2.php');

$id = $_GET['id'];

$sql = "DELETE FROM post_like WHERE post_id = '$id' AND user_id = '$my_id'";
$query = mysqli_query($conn,$sql);



?>