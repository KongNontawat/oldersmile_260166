<?php  
include('conn.php');
include('auth_proc/check_login.php');

$sql = "SELECT * FROM user WHERE NOT user_id = '$my_id' AND NOT user_role = 'partner' AND NOT user_role = 'admin'";
if(isset($_GET['search'])) {
$sql = "SELECT * FROM user WHERE NOT user_id = '$my_id' AND user_name LIKE '%{$_GET['search']}%' AND NOT user_role = 'partner' AND NOT user_role = 'admin'";
}
$query = mysqli_query($conn, $sql);

$query_part = mysqli_query($conn, "SELECT * FROM user WHERE NOT user_id = '$my_id' AND user_role = 'partner'");
$query_ad = mysqli_query($conn, "SELECT * FROM user WHERE NOT user_id = '$my_id' AND user_role = 'admin'");

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
                        <form action="" method="get" class="d-flex align-items-center">
                            <img src="icon/search.png" width="30" height="30" alt="" class="me-2">
                            <div class="input-group">
                                <input type="text" name="search" placeholder="ค้นหา..." id="" class="form-control">
                                <button type="submit" class="btn btn-outline-primary">ค้นหา</button>
                            </div>
                        </form>
                    </div>
                </div>


                <h4 class="mb-2">ผู้เชี่ยวชาญ</h4>
                <ul class="list-group mb-3">
                    <?php foreach($query_part as $part): ?>
                    <li class="list-group-item list-group-item-action d-flex align-items-center justify-content-between py-2">
                        <a href="chat.php?id=<?php echo $part['user_id'] ?>" class="d-flex align-items-center">
                            <img src="img/<?php echo $part['user_image'] ?>" alt="" class="rounded-circle me-2" width="40" height="40">
                            <p><?php echo $part['user_name'] ?></p>
                            <?php if($part['user_role'] == 'admin' OR $part['user_role'] == 'partner') : ?>
                            <img src="icon/verify.png" alt="" class="ms-1" width="15" height="15">
                            <?php endif; ?>
                        </a>
                        <a href="chat.php?id=<?php echo $part['user_id'] ?>" class="btn btn-outline-primary px-3 btn-sm">พูดคุย</a>
                    </li>
                    <?php endforeach; ?>
                <h4 class="mb-2">แอดมิน</h4>
                <ul class="list-group mb-3">
                    <?php foreach($query_ad as $ad): ?>
                    <li class="list-group-item list-group-item-action d-flex align-items-center justify-content-between py-2">
                        <a href="chat.php?id=<?php echo $ad['user_id'] ?>" class="d-flex align-items-center">
                            <img src="img/<?php echo $ad['user_image'] ?>" alt="" class="rounded-circle me-2" width="40" height="40">
                            <p><?php echo $ad['user_name'] ?></p>
                            <?php if($ad['user_role'] == 'admin' OR $ad['user_role'] == 'adner') : ?>
                            <img src="icon/verify.png" alt="" class="ms-1" width="15" height="15">
                            <?php endif; ?>
                        </a>
                        <a href="chat.php?id=<?php echo $ad['user_id'] ?>" class="btn btn-outline-primary px-3 btn-sm">พูดคุย</a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <h4 class="mb-2">คนที่คุณอาจรู้จัก</h4>
                <ul class="list-group mb-3">
                    <?php foreach($query as $user): ?>
                    <li class="list-group-item list-group-item-action d-flex align-items-center justify-content-between py-2">
                        <a href="chat.php?id=<?php echo $user['user_id'] ?>" class="d-flex align-items-center">
                            <img src="img/<?php echo $user['user_image'] ?>" alt="" class="rounded-circle me-2" width="40" height="40">
                            <p><?php echo $user['user_name'] ?></p>
                            <?php if($user['user_role'] == 'admin' OR $user['user_role'] == 'partner') : ?>
                            <img src="icon/verify.png" alt="" class="ms-1" width="15" height="15">
                            <?php endif; ?>
                        </a>
                        <a href="chat.php?id=<?php echo $user['user_id'] ?>" class="btn btn-outline-primary px-3 btn-sm">พูดคุย</a>
                    </li>
                    <?php endforeach; ?>
                </ul>

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
            $('.active-menu a.chat').addClass('active');
            $('.active-header').text('แชท');

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