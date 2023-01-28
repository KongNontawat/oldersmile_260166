<?php  
include('conn.php');
include('auth_proc/check_login.php');

$sql_user = "SELECT * FROM user WHERE user_id = '$my_id'";
$query_user = mysqli_query($conn, $sql_user);
$row = mysqli_fetch_assoc($query_user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="boostrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/style.css">
    <title>OlderSmile</title>
</head>
<body>

    <?php include('component/alert.php'); ?>
    <!-- Navbar -->
    <?php include('component/navbar.php'); ?>

    <!-- Modal -->
    <?php include('component/modal.php'); ?>

    <!-- Canvas -->
    <?php include('component/canvas.php'); ?>

    <!-- Content -->
    <div class="container pb-5">
        <div class="row gy-3 mt-2 mt-lg-3">

            <div class="col-md-4 col-lg-3 d-none d-md-block">
                <?php include('component/sidebar.php'); ?>
            </div>

            <div class="col-md-8 col-lg-6">
                <img src="img/banner.png" alt="" class="mb-3 rounded-4 w-100">

                <h4 class="active-header my-2 my-lg-3 d-md-none"></h4>

                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h4 class="text-center my-3">แก้ไขโปรไฟล์</h4>
                            <form action="user_proc/edit_profile_proc.php" method="post" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label for="">ชื่อผู้ใช้ :</label>
                                    <input type="text" name="user_name" id="" class="form-control" value="<?php echo $row['user_name'];?>" required>
                                    <input type="hidden" name="user_id" value="<?php echo $row['user_id'];?>">
                                </div>

                                <div class="mb-3">
                                    <label for="">เพศ :</label>
                                    
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="">ชาย</label>
                                        <input <?php echo ($row['user_gender']=='ชาย') ? 'checked' : '' ;?> class="form-check-input" value="ชาย" type="radio" name="user_gender" id="" class="form-control" required>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="">หญิง</label>
                                        <input <?php echo ($row['user_gender']=='หญิง') ? 'checked' : '' ;?> class="form-check-input" value="หญิง" type="radio" name="user_gender" id="" class="form-control" required>
                                    </div>
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="">วันเกิด :</label>
                                    <input type="date" name="user_dob" id="" class="form-control" required value="<?php echo $row['user_dob'];?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">เบอร์โทร :</label>
                                    <input type="tel" name="user_tel" id="" class="form-control" required value="<?php echo $row['user_tel'];?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">รหัสผ่านใหม่ :</label>
                                    <input type="password" name="user_pass" id="" class="form-control">
                                    <input type="hidden" name="old_pass" value="<?php echo $row['user_pass'];?>">
                                </div>

                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="">รูปโปรไฟล์ :</label>
                                    <input type="file" accept="image/*" name="user_image" id="" class="form-control">
                                    <input type="hidden" name="old_image" value="<?php echo $row['user_image'];?>">
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary col-12 btn-lg">แก้ไขข้อมูล</button>
                                </div>

                                </form>
                    </div>
                </div>

            </div>

            <div class="col-md-3 d-none d-lg-block">
                <?php include('component/aside.php'); ?>
            </div>

        </div>
    </div>
    
    <script src="jquery/jquery-3.6.2.min.js"></script>
    <script src="boostrap/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        $(function() {
            $('.active-menu a.my_profile').addClass('active');
            $('.active-header').text('แก้ไขโปรไฟล์');
            $('.like').click(function() {
                let like = parseInt($(this).text())
                let el = $(this).children().attr('src')
                let id = $(this).attr('id')

                if(el == 'icon/star.png') {
                    $.get('post_proc/like_proc.php?id='+id)
                    $(this).children().attr('src','icon/star-fill.png')
                    $(this).children().text(like+1)
                }else {
                    $.get('post_proc/like_proc.php?id='+id)
                    $(this).children().attr('src','icon/star.png')
                    $(this).children().text(like-1)
                }
            })
            $('.unlike').click(function() {
                let like = parseInt($(this).text())
                let el = $(this).children().attr('src')
                let id = $(this).attr('id')

                if(el == 'icon/star.png') {
                    $.get('post_proc/like_proc.php?id='+id)
                    $(this).children().attr('src','icon/star-fill.png')
                    $(this).children().text(like+1)
                }else {
                    $.get('post_proc/like_proc.php?id='+id)
                    $(this).children().attr('src','icon/star.png')
                    $(this).children().text(like-1)
                }
            })
        })
    </script>
</body>
</html>