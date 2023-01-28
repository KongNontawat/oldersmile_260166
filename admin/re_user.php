<?php
include('../conn.php');
include('auth_proc/check_login.php');

$sql = "SELECT * FROM user";
$query = mysqli_query($conn,$sql);



$sql1 = "SELECT * FROM user";
$re1 = mysqli_query($conn,$sql1);

$sql2 = "SELECT * FROM post";
$re2 = mysqli_query($conn,$sql2);

$sql3 = "SELECT * FROM question";
$re3 = mysqli_query($conn,$sql3);

$sql4 = "SELECT * FROM ques_answer GROUP BY user_id";
$re4 = mysqli_query($conn,$sql4);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../boostrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/base.css">
    <title>Older Smile</title>
</head>
<body>
    <?php include('component/alert.php');?>

    <main class="main d-flex">

        <!-- Side Bar!!! -->
        <?php include('component/sidebar.php');?>
        
        <div class="content">
            
            <!-- Nav Bar!!! -->
            <?php include('component/navbar.php');?>
            

            <div class="content-body">

                <div class="container-fluid mt-3 pb-5">

                    <div class="row gy-2 my-3">
                        <div class="col-md-6 col-lg-3">
                            <div class="card py-3 rounded-4 border-primary" style="border-width: 2px!important; border-left: 7px solid #0d6efd!important;">
                                <div class="card-body text-center">
                                    <h1 class="text-primary"><?php echo number_format(mysqli_num_rows($re1))?></h1>
                                    <p>จำนวนผู้ใช้ทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card py-3 rounded-4 border-success" style="border-width: 2px!important; border-left: 7px solid #198754!important;">
                                <div class="card-body text-center">
                                    <h1 class="text-success"><?php echo number_format(mysqli_num_rows($re2))?></h1>
                                    <p>จำนวนโพสต์ทั้งหมด</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card py-3 rounded-4 border-danger" style="border-width: 2px!important; border-left: 7px solid #dc3545!important;">
                                <div class="card-body text-center">
                                    <h1 class="text-danger"><?php echo number_format(mysqli_num_rows($re3))?></h1>
                                    <p>จำนวนแบบประเมิน</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card py-3 rounded-4 border-warning" style="border-width: 2px!important; border-left: 7px solid #ffc717!important;">
                                <div class="card-body text-center">
                                    <h1 class="text-warning"><?php echo number_format(mysqli_num_rows($re4))?></h1>
                                    <p>ยอดผู้ชมแบบประเมิน</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 rounded-4 shadow-sm bg-white">

                        <!-- Breacrumb!!! -->
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php">หน้าแรก</a></li>
                            <li class="breadcrumb-item active">รายงานผลข้อมูลผู้ใช้</li>
                        </ol>

                        <!-- Table!!! -->
                        <div class="table-responsive mt-3">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th style="width: 40%;">ชื่อผู้ใช้</th>
                                        <th style="width: 15%;">เบอร์โทร</th>
                                        <th style="width: 15%;">เพศ</th>
                                        <th style="width: 25%;">วันเกิด</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($query as $i => $row):?>
                                    <tr>
                                        <td><?php echo $i+1;?></td>
                                        <td><?php echo $row['user_name'];?></td>
                                        <td><?php echo $row['user_tel'];?></td>
                                        <td><?php echo $row['user_gender'];?></td>
                                        <td><?php echo $row['user_dob'];?></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>
        </div>


    </main>
    

    <script src="../jquery/jquery-3.6.2.min.js"></script>
    <script src="../boostrap/bootstrap.bundle.min.js"></script>
    <script src="../js/admin.js"></script>

    <script>
        $(function(){
            $('.sidebar a.re_user').addClass('active');
        })
    </script>

</body>
</html>