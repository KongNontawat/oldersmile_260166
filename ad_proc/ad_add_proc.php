<?php 
include('../conn.php');
include('../auth_proc/check_login2.php');

$user_id = $my_id;
$cat_id = $_POST['cat_id'];
$ad_body = $_POST['ad_body'];
$ad_link = $_POST['ad_link'];
$ad_point = $_POST['ad_point'];
$ad_image = '';
$ad_status = 0;

if($_FILES['ad_image']['error'] == 0){
    $ext = end(explode('.',$_FILES['ad_image']['name']));
    $ad_image = md5(uniqid()).'.'.$ext;
    move_uploaded_file($_FILES['ad_image']['tmp_name'],'../img/'.$ad_image);
}

$sql = "INSERT INTO advert VALUES('','$user_id','$cat_id','$ad_body','$ad_link','$ad_point','$ad_image','$ad_status')";
$query = mysqli_query($conn,$sql);

if($query) {
    succ('../promote.php','บันทึกข้อมูล สำเร็จ');
}else{
    err('../promote.php','บันทึกข้อมูล ไม่สำเร็จ');
}


?>