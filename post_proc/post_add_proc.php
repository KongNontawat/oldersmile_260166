<?php 
include('../conn.php');
include('../auth_proc/check_login2.php');

$user_id = $my_id;
$cat_id = '';
$post_body = $_POST['post_body'];
$post_media = '';
$post_created = date('d-m-Y');

$query1 = mysqli_query($conn, "SELECT * FROM category WHERE cat_name = '{$_POST['cat_name']}'");
if(mysqli_num_rows($query1) > 0) {
    $catt = mysqli_fetch_assoc($query1);
    $cat_id = $catt['cat_id'];
}else {
    $query2 = mysqli_query($conn, "INSERT INTO category VALUES ('','{$_POST['cat_name']}')");
    $cat_id = mysqli_insert_id($conn);
}
        
if($_FILES['post_media']['error'] == 0){
    $ext = end(explode('.',$_FILES['post_media']['name']));
    $post_media = md5(uniqid()).'.'.$ext;
    move_uploaded_file($_FILES['post_media']['tmp_name'],'../img/'.$post_media);
}

$sql = "INSERT INTO post VALUES('','$user_id','$cat_id','$post_body','$post_media','$post_created')";
$query = mysqli_query($conn,$sql);

if($query) {
    succ('../index.php','บันทึกข้อมูล สำเร็จ');

}else{
    err('../index.php','บันทึกข้อมูล ไม่สำเร็จ');

}

?>