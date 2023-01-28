<?php 
include('../../conn.php');

$user_id = $_POST['user_id'];

$user_name = $_POST['user_name'];
$user_dob = $_POST['user_dob'];
$user_gender = $_POST['user_gender'];
$user_tel = $_POST['user_tel'];
$user_role = $_POST['user_role'];
$user_pass = ($_POST['user_pass']) ? md5($_POST['user_pass']) : $_POST['old_pass'];
$user_image = $_POST['old_image'];

        
if($_FILES['user_image']['error'] == 0){
    $ext = end(explode('.',$_FILES['user_image']['name']));
    $user_image = md5(uniqid()).'.'.$ext;
    move_uploaded_file($_FILES['user_image']['tmp_name'],'../../img/'.$user_image);
}
$sql = "UPDATE user SET
user_name='$user_name',
user_dob='$user_dob',
user_gender='$user_gender',
user_tel='$user_tel',
user_role='$user_role',
user_pass='$user_pass',
user_image='$user_image'
WHERE user_id = '$user_id'
";
$query = mysqli_query($conn,$sql);
if($query) {
    succ('../user_mng.php','แก้ไขข้อมูล สำเร็จ');
}else{
    err('../user_edit.php?id='.$user_id,'แก้ไขข้อมูล ไม่สำเร็จ');
}


?>