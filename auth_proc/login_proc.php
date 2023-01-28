<?php

include('../conn.php');

$user_name = $_POST['user_name'];
$user_pass = md5($_POST['user_pass']);

$query1 = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$user_name'");

if(mysqli_num_rows($query1) > 0) {
    $user = mysqli_fetch_assoc($query1);
    if($user['user_pass'] == $user_pass) {
        $_SESSION['my_id'] = $user['user_id'];
        $_SESSION['my_name'] = $user['user_name'];
        $_SESSION['my_image'] = $user['user_image'];
        $_SESSION['my_role'] = $user['user_role'];
        $_SESSION['login'] = 'login';
        succ('../index.php','เข้าสู่ระบบสำเร็จ');
    }else {
        err('../login.php','ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
    }
}else {
    err('../login.php','ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
}