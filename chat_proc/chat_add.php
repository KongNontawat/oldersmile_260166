<?php

include('../conn.php');

$sender = $my_id;
$receiver = $_GET['receiver'];
$message = $_GET['message'];
$mes_created = date('h:m:s d-m-Y');

$query = mysqli_query($conn, "INSERT INTO message VALUES ('$sender','$receiver','$message','$mes_created')");