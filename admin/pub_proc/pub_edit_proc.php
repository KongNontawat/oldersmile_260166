<?php 
include('../../conn.php');

$post_id = $_POST['post_id'];

$user_id = $my_id;
$cat_id = 1;
$post_body = $_POST['post_body'];
$post_media = $_POST['old_media'];
        
if($_FILES['post_media']['error'] == 0){
    $ext = end(explode('.',$_FILES['post_media']['name']));
    $post_media = md5(uniqid()).'.'.$ext;
    move_uploaded_file($_FILES['post_media']['tmp_name'],'../../img/'.$post_media);
}

$sql = "UPDATE post SET
user_id='$user_id',
cat_id='$cat_id',
post_body='$post_body',
post_media='$post_media'
WHERE post_id = '$post_id'
";
$query = mysqli_query($conn,$sql);

if($query) {
    succ('../pub_mng.php','แก้ไขข้อมูล สำเร็จ');

}else{
    err('../pub_edit.php','แก้ไขข้อมูล ไม่สำเร็จ');

}

?>