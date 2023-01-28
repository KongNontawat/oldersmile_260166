<?php  
include('conn.php');

$sql = "SELECT *,COUNT(p.cat_id) AS count,c.cat_id AS cat_id FROM category AS c LEFT JOIN post AS p ON c.cat_id = p.cat_id WHERE NOT c.cat_id = 1 GROUP BY c.cat_id";
if(isset($_GET['search'])) {
    $sql = "SELECT *,COUNT(p.cat_id) AS count,c.cat_id AS cat_id FROM category AS c LEFT JOIN post AS p ON c.cat_id = p.cat_id WHERE NOT c.cat_id = 1 AND c.cat_name LIKE '%{$_GET['search']}%' GROUP BY c.cat_id";
}
$query = mysqli_query($conn, $sql);


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

                <ul class="list-group">
                    <?php foreach($query as $row): ?>
                    <li class="list-group-item list-group-item-action d-flex align-items-center justify-content-between py-3">
                        <a href="index.php?cat_id=<?php echo $row['cat_id'] ?>&cat_name=<?php echo $row['cat_name'] ?>">
                            <h5><?php echo $row['cat_name'] ?></h5>
                            <p class="mt-3 text-muted">จำนวนโพสต์ : <?php echo $row['count'] ?></p>
                        </a>
                        <a href="index.php?cat_id=<?php echo $row['cat_id'] ?>&cat_name=<?php echo $row['cat_name'] ?>" class="btn btn-outline-primary px-3 btn-sm">เลือก</a>
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
            $('.active-menu a.category').addClass('active');
            $('.active-header').text('เรื่องที่น่าสนใจ');

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