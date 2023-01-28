<?php  
include('conn.php');
include('auth_proc/check_login.php');

$sql = "SELECT * FROM advert WHERE user_id = '$my_id'";
$query = mysqli_query($conn, $sql);

$sql_user = "SELECT * FROM user WHERE user_id = '$my_id'";
$query_user = mysqli_query($conn, $sql_user);
$user = mysqli_fetch_assoc($query_user);
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

                <h4 class="active-menu my-2 my-lg-3 d-md-none"></h4>

                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h4 class="text-center my-3">โปรโมท ลงโฆษณากับเรา</h4>
                        <form action="ad_proc/ad_add_proc.php" method="post" enctype="multipart/form-data">

                            <div class="mb-3">
                                <textarea name="ad_body" id="" cols="30" rows="5" placeholder="เนื้อหาโฆษณา" autofocus class="form-control" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">ลิงก์โฆษณา :</label>
                                <input type="text" name="ad_link" placeholder="https://..." required id="" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">กลุ่มเป้าหมาย</label>

                                <select name="cat_id" id="" class="form-select" required>
                                    <option value="" selected disabled>-- เลือกกลุ่มเป้าหมาย --</option>
                                    <?php foreach($cat_all as $i => $cat1):?> 
                                    <option value="<?php echo $cat1['cat_id'];?>"><?php echo $cat1['cat_name'];?></option>
                                    <?php endforeach;?> 

                                </select>
                            </div>
                            <small class="text-danger mb-2">* หัก 1 บาท ต่อการคลิกโฆษณา 1 ครั้ง</small>
                            <div class="mb-3">
                                <label for="">งบโฆษณา :</label>
                                <input type="number" name="ad_point" placeholder="" required id="" class="form-control" max="<?php echo $user['user_wallet'] ?>" min="0">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <img src="icon/money.png" alt="" class="me-2" width="30" heigth="30">
                                <h5>จำนวนเงินในกระเป๋า : <?php echo number_format( $user['user_wallet'],2) ?> บาท</h5>
                            </div>

                            
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="">รูปโฆษณา :</label>
                                <input type="file" accept="image/*" name="ad_image" id="" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary col-12 btn-lg mt-4">บันทึก</button>
                        </form>
                    </div>
                </div>

                <h4 class="my-3">โฆษณาของฉัน</h4>

                <?php foreach($query as $ads): ?>
                <div class="card shadow-sm mb-3">
                    <img src="img/<?php echo $ads['ad_image'] ?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <p class="mb-2"><?php echo $ads['ad_body'] ?></p>
                        <p class="text-muted mb-2"><?php echo $ads['ad_link'] ?></p>
                        <?php if($ads['ad_status']==1): ?>
                            <small class="text-success mb-2">กำลังเผยแพร่</small>
                            <?php else: ?>
                            <small class="text-warning mb-2">รอการอนุมัติ</small>
                        <?php endif; ?>
                        <?php if($ads['ad_status']== 0): ?>
                        <a href="ad_proc/ad_del_proc.php?id=<?php echo $ads['ad_id'] ?>&point=<?php echo $ads['ad_point'] ?>" class="btn btn-danger btn-sm px-3 mt-3">ยกเลิกโฆษณา</a>
                        <?php endif; ?>
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
            $('.active-menu a.promote').addClass('active');
            $('.active-header').text('โปรโมท');
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