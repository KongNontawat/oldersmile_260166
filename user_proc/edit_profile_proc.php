<?php 
include('../conn.php');
include('../auth_proc/check_login2.php');

$user_id = $my_id;

$user_name = $_POST['user_name'];
$user_dob = $_POST['user_dob'];
$user_gender = $_POST['user_gender'];
$user_tel = $_POST['user_tel'];
$user_pass = ($_POST['user_pass']) ? md5($_POST['user_pass']) : $_POST['old_pass'];
$user_image = $_POST['old_image'];

        
if($_FILES['user_image']['error'] == 0){
    $ext = end(explode('.',$_FILES['user_image']['name']));
    $user_image = md5(uniqid()).'.'.$ext;
    move_uploaded_file($_FILES['user_image']['tmp_name'],'../img/'.$user_image);
}
$sql = "UPDATE user SET
user_name='$user_name',
user_dob='$user_dob',
user_gender='$user_gender',
user_tel='$user_tel',
user_pass='$user_pass',
user_image='$user_image'
WHERE user_id = '$user_id'
";
$query = mysqli_query($conn,$sql);
if($query) {
    $_SESSION['my_name'] = $user_name;
    $_SESSION['my_image'] = $user_image;
    succ('../my_profile.php','แก้ไขข้อมูล สำเร็จ');
}else{
    err('../edit_profile.php','แก้ไขข้อมูล ไม่สำเร็จ');
}


?>