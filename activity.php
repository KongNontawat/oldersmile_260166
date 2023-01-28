<?php  
include('conn.php');

$sql_act = "SELECT *,
(SELECT SUM(post_like) FROM post_like WHERE post_id = p.post_id) AS post_like,
(SELECT COUNT(*) FROM view_post WHERE post_id = p.post_id) AS view_post,
(SELECT COUNT(*) FROM comment WHERE post_id = p.post_id) AS comment
FROM post AS p
LEFT JOIN user AS u
ON u.user_id = p.user_id
LEFT JOIN category AS c
ON c.cat_id = p.cat_id
WHERE p.cat_id = 1
GROUP BY p.post_id
ORDER BY p.post_id DESC LIMIT 3";

$query_post = mysqli_query($conn, $sql_act);


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
    <style>
        .card-body>a>p {
            font-size:<?php echo $set ?>px;
        }
    </style>
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

                <?php if(isset($_SESSION['login']) AND $_SESSION['my_role'] != 'user'): ?>
                <a href="pub_add.php" class="btn btn-outline-primary mb-3 btn-lg">เพิ่มส่วนประชาสัมพันธ์</a>
                <?php endif; ?>

                <?php foreach($query_post as $post): ?>
                <div class="card shadow-sm mb-3">
                    <div class="card-header bg-white d-flex align-items-center justify-content-between">
                        <a href="user_profile.php?id=<?php echo $post['user_id'] ?>" class="d-flex align-items-center">
                            <img src="img/<?php echo $post['user_image'] ?>" alt="" class="rounded-circle me-2" width="40" height="40">
                            <p><?php echo $post['user_name'] ?></p>
                            <?php if($post['user_role'] == 'admin' OR $post['user_role'] == 'partner') : ?>
                            <img src="icon/verify.png" alt="" class="ms-1" width="15" height="15">
                            <?php endif; ?>
                        </a>
                        <?php if($post['user_role'] == 'admin' OR $post['user_role'] == $my_id): ?>
                        <a href="post_proc/post_del_proc.php?id=<?php echo $post['user_id'] ?>" class="btn-close" onclick="return confirm('คุณแน่ใจหรือไม่ว่าจะลบ?')"></a>
                        <?php endif; ?>
                    </div>
                    <?php if($post['post_media']) : ?>
                    <?php error_reporting(0); ?>
                        <?php if(end(explode('.',$post['post_media'])) == 'mp4') : ?>
                                <video src="img/<?php echo $post['post_media'] ?>" controls muted autoplay type="video/*,video/mp4"></video>
                            <?php else: ?>
                                <a href="post_detail.php?id=<?php echo $post['post_id'] ?>"><img src="img/<?php echo $post['post_media'] ?>" alt="" class="card-img-top"></a>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="card-body">
                        <a href="post_detail.php?id=<?php echo $post['post_id'] ?>">
                            <p class="text-o-3"><?php echo $post['post_body'] ?></p>
                        </a>
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="index.php?cat_id=<?php echo $post['cat_id'] ?>&cat_name=<?php echo $post['cat_name'] ?>" class="text-primary">#<?php echo $post['cat_name'] ?></a>
                            <small class="text-muted">โพสต์เมื่อ : <?php echo $post['post_created'] ?></small>
                        </div>
                    </div>
                    <div class="card-footer bg-white d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center me-3">
                                <?php
                                $query_like = mysqli_query($conn, "SELECT * FROM post_like WHERE post_id = {$post['post_id']} AND user_id = {$my_id} AND post_like > 0");
                                if(mysqli_num_rows($query_like) > 0):
                                ?>
                                <a href="#!" class="d-flex align-items-center like" id="<?php echo $post['post_id'] ?>">
                                    <img src="icon/star-fill.png" alt="" class="me-1" width="25" height="25">
                                    <p><?php echo ($post['post_like'])?$post['post_like']:'0' ?></p>
                                </a>
                                <?php else: ?>
                                <a href="#!" class="d-flex align-items-center unlike" id="<?php echo $post['post_id'] ?>">
                                    <img src="icon/star.png" alt="" class="me-1" width="25" height="25">
                                    <p><?php echo ($post['post_like'])?$post['post_like']:'0' ?></p>
                                </a>
                                <?php endif; ?>
                            </div>
                            <a href="post_detail.php?id=<?php echo $post['post_id'] ?>" class="d-flex align-items-center">
                                <img src="icon/comment.png" alt="" class="me-1" width="25" height="25">
                                <p><?php echo ($post['comment'])?$post['comment']:'0' ?></p>
                            </a>
                        </div>
                        <small class="text-muted">รับชม : <?php echo $post['view_post'] ?></small>
                    </div>
                </div>
                <?php endforeach; ?>

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
            $('.active-menu a.activity').addClass('active');
            $('.active-header').text('ประชาสัมพันธ์');

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