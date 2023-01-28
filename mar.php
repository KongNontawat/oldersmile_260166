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
                        <h4 class="text-center my-3">สมัครเป็นร้านค้ากับเรา</h4>
                            <form action="user_proc/mar_add.php" method="post" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label for="">ชื่อร้านค้า :</label>
                                    <input type="text" name="mar_name" id="" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="">ชื่อ-สกุลเจ้าของ :</label>
                                    <input type="text" name="mar_fname" id="" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="">อีเมล :</label>
                                    <input type="email" name="mar_email" id="" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="">เบอร์โทร :</label>
                                    <input type="tel" name="mar_tel" id="" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="">ที่อยู่ :</label>
                                    <textarea name="mar_address" id="" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">ประเภทร้านค้า :</label>
                                    <select name="mar_type" id="" class="form-select mb-3" required>
                                        <option value="" disabled selected> -- เลือกประเภทร้านค้า --</option>
                                        <option value="ร้านค้าออนไลน์">ร้านค้าออนไลน์</option>
                                        <option value="ร้านขายของ">ร้านขายของ</option>
                                        <option value="บริษัท">บริษัท</option>
                                        <option value="ห้างร้าน">ห้างร้าน</option>
                                    </select>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary col-12 btn-lg">บันทึกข้อมูล</button>
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
            $('.active-header').text('โปรไฟล์');
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