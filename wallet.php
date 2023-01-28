<?php  
include('conn.php');
include('auth_proc/check_login.php');

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

                <h4 class="active-header my-2 my-lg-3 d-md-none"></h4>

                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h4 class="text-center my-3">กระเป๋าเงินของฉัน</h4>
                        <div class="mb-3 d-flex align-items-center">
                            <img src="icon/money.png" alt="" class="me-2" width="40" heigth="40">
                            <h5>จำนวนเงินในกระเป๋า : <?php echo number_format( $user['user_wallet'],2) ?> บาท</h5>
                        </div>
                        <form action="user_proc/wallet_add_proc.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="">จำนวนเงินที่ต้องการเติม :</label>
                                <input type="number" name="wallet" class="form-control" min="0" id="number" placeholder="จำนวนเงินที่ต้องการเติม...">
                            </div>
                            
                            <button type="button" class="btn btn-outline-primary col-12 mt-3 button">ตกลง</button>

                            <div class="mt-4 show d-none">
                               <div class="mb-3">
                               <label for="">เลขเติมเงิน E-wallet</label>
                                <input type="number" name="" value="<?php echo rand(10000000000000,99999999999999) ?>" id="" readonly="readonly" class="form-control " disabled>
                               </div>
                                <h5>วิธีเติมเงิน</h5>
                                <pre>
1.คัดลอกเลข  E-wallet
2.เข้าแอพธนาคารของท่าน
3.กดเข้าเมนู เติมเงิน
4.วางเลย  E-wallet แล้วกดเติมเงิน
                                </pre>

                            <button type="submit" class="btn btn-primary col-12 mt-3 btn-lg">เติมเงินแล้ว</button>

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
            $('.active-menu a.wallet').addClass('active');
            $('.active-header').text('กระเป๋าเงิน');

            $('.button').click(function() {
                $('.show').removeClass('d-none')
            })

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