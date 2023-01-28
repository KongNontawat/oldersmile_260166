<?php 
include('../../conn.php');

$user_id = $my_id;
$cat_id = 1;
$post_body = $_POST['post_body'];
$post_media = '';
$post_created = date('d-m-Y');
        
if($_FILES['post_media']['error'] == 0){
    $ext = end(explode('.',$_FILES['post_media']['name']));
    $post_media = md5(uniqid()).'.'.$ext;
    move_uploaded_file($_FILES['post_media']['tmp_name'],'../../img/'.$post_media);
}

$sql = "INSERT INTO post VALUES('','$user_id','$cat_id','$post_body','$post_media','$post_created')";
$query = mysqli_query($conn,$sql);

if($query) {
    succ('../pub_mng.php','บันทึกข้อมูล สำเร็จ');

}else{
    err('../pub_add.php','บันทึกข้อมูล ไม่สำเร็จ');

}

?>