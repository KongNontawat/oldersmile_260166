<?php  
include('conn.php');


$sql_query = "SELECT * FROM question";
$query_query = mysqli_query($conn, $sql_query);
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
                        <h4 class="text-center my-3">แบบประเมิน</h4>
                        <form action="ques_proc/ques_add_proc.php" method="post" enctype="multipart/form-data">
                            <?php foreach($query_query as $ques): ?>
                            <h6 class="fs-5"><?php  echo $ques['ques_body'] ?></h6>
                            <div class="form-check">
                                <input type="radio" name="answer<?php  echo $ques['ques_id'] ?>" id="5_<?php  echo $ques['ques_id'] ?>" value="5" required class="from-check-input">
                                <label for="5_<?php  echo $ques['ques_id'] ?>" class="form-check-label">มากที่สุด</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="answer<?php  echo $ques['ques_id'] ?>" id="4_<?php  echo $ques['ques_id'] ?>" value="4" required class="from-check-input">
                                <label for="4_<?php  echo $ques['ques_id'] ?>" class="form-check-label">มาก</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="answer<?php  echo $ques['ques_id'] ?>" id="3_<?php  echo $ques['ques_id'] ?>" value="3" required class="from-check-input">
                                <label for="3_<?php  echo $ques['ques_id'] ?>" class="form-check-label">ปานกลาง</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="answer<?php  echo $ques['ques_id'] ?>" id="2_<?php  echo $ques['ques_id'] ?>" value="2" required class="from-check-input">
                                <label for="2_<?php  echo $ques['ques_id'] ?>" class="form-check-label">น้อย</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="answer<?php  echo $ques['ques_id'] ?>" id="1_<?php  echo $ques['ques_id'] ?>" value="1" required class="from-check-input">
                                <label for="1_<?php  echo $ques['ques_id'] ?>" class="form-check-label">น้อยที่สุด</label>
                            </div>
                            <hr>
                            <?php endforeach; ?>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary col-12 btn-lg">บันทึก</button>
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
            $('.active-menu a.ques').addClass('active');
            $('.active-header').text('แบบประเมิน');
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