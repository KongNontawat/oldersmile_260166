<?php

include('../conn.php');
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM message AS m LEFT JOIN user AS u ON u.user_id = m.sender WHERE (m.sender = '$my_id' AND m.receiver = '$id') OR (m.receiver = '$my_id' AND m.sender = '$id')");
$message = [];
foreach($query as $mes) {
    array_push($message, $mes);
}

echo json_encode($message);