<?php  
include('conn.php');
$show_ad = 'show';
$sql_post = "SELECT *,
    (SELECT SUM(post_like) FROM post_like WHERE post_id = p.post_id) AS post_like,
    (SELECT COUNT(*) FROM view_post WHERE post_id = p.post_id) AS view_post,
    (SELECT COUNT(*) FROM comment WHERE post_id = p.post_id) AS comment
FROM post AS p
    LEFT JOIN user AS u
    ON u.user_id = p.user_id
    LEFT JOIN category AS c
    ON c.cat_id = p.cat_id
WHERE p.post_id = {$_GET['id']}
GROUP BY p.post_id
ORDER BY p.post_id DESC";

$query_post = mysqli_query($conn, $sql_post);
$post = mysqli_fetch_assoc($query_post);

$query_com = mysqli_query($conn, "SELECT * FROM comment AS c LEFT JOIN user AS u ON c.user_id = u.user_id WHERE c.post_id = {$_GET['id']}");

if(isset($_SESSION['login'])) {
    mysqli_query($conn, "INSERT INTO view_post (post_id, user_id, view) SELECT '{$_GET['id']}','$my_id',1 WHERE NOT EXISTS (SELECT * FROM view_post WHERE post_id = '{$_GET['id']}' AND user_id = '$my_id') ");
}

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

                <h4 class="active-header my-2 my-lg-3 d-md-none"></h4>

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
                            <p><?php echo $post['post_body'] ?></p>
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

                <?php 
    $query_ad2 = mysqli_query($conn, "SELECT * FROM advert WHERE cat_id = {$post['cat_id']}");    
    if(mysqli_num_rows($query_ad2) > 0):
    ?>
    <div class="carousel slide mb-3" id="slide2" data-bs-ride="carousel">
    <div class="carousel-inner rounded-4">
        <?php foreach($query_ad2 as $i => $ad2): ?>
        <div class="carousel-item <?php echo ($i == 0)? ' active':''; ?>">
            <a href="ad_proc/ad_view.php?id=<?php echo $ad2['ad_id'] ?>=&part<?php echo $post['user_id'] ?>=&link=<?php echo $ad2['ad_link'] ?>" target="_blank"><img src="img/<?php echo $ad2['ad_image'] ?>" alt="" class="d-block w-100" height="250"></a>
        </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#slide2">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#slide2">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
<?php endif; ?>

                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <form action="post_proc/com_add_proc.php" method="post" class="d-flex align-items-center">
                            <img src="icon/comment.png" alt="" width="30" heigth="30" class="me-2">
                            <div class="input-group">
                                <input type="text" name="com_body" id="" required placeholder="แสดงความคิดเห็น..." class="form-control">
                                <input type="hidden" name="post_id" value="<?php echo $post['post_id'] ?>">
                                <button type="submit" class="btn btn-outline-primary">ส่ง</button>
                            </div>
                        </form>
                    </div>
                </div>

                <ul class="list-group">
                    <?php foreach($query_com aS $com): ?>
                    <li class="list-group-item list-group-item-action">
                        <a href="user_profile.php?id=<?php echo  $com['user_id'] ?>" class="d-flex align-items-center">
                            <img src="img/<?php echo  $com['user_image'] ?>" alt="" class="rounded-circle me-2" width="30" height="30">
                            <p><?php echo  $com['user_name'] ?></p>
                            <?php if( $com['user_role'] == 'admin' OR  $com['user_role'] == 'partner') : ?>
                            <img src="icon/verify.png" alt="" class="ms-1" width="15" height="15">
                            <?php endif; ?>
                            <small class="text-muted" style="font-size:12px;"><?php echo $com['com_created'] ?></small>
                        </a>
                        <p class="mt-1 ms-2"><?php echo $com['com_body'] ?></p>
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
            $('.active-menu a.home').addClass('active');
            $('.active-header').text('โพสต์');
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