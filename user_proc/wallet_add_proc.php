<?php 
include('../conn.php');
include('../auth_proc/check_login2.php');

$wallet = $_POST['wallet'];

$sql2 = "UPDATE user SET user_wallet = user_wallet+'$wallet' WHERE user_id = '$my_id'";
$query2 = mysqli_query($conn,$sql2);
if($query2) {
    succ('../wallet.php','เติมเงินเข้ากระเป๋าสำเร็จ');
}else{
    err('../wallet.php','เติมเงินเข้ากระเป๋าไม่สำเร็จ');
}


?>