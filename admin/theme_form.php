<?php
include('../conn.php');
include('auth_proc/check_login.php');

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

                    <div class="p-4 rounded-4 shadow-sm bg-white">

                        <!-- Breacrumb!!! -->
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php">หน้าแรก</a></li>
                            <li class="breadcrumb-item"><a href="../index.php">หน้าแรก</a></li>
                            <li class="breadcrumb-item active">จัดการ</li>
                        </ol>

                        <div class="d-flex justify-content-between">
                            <h3 class="mb-3">จัดการ</h3>
                        </div>

                        <!-- Form!!! -->
                        <div class="row">
                            <div class="col-md-5">
                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <label for="">Text :</label>
                                        <input type="text" name="" id="" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">เพศ :</label>

                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label" for="">ชาย</label>
                                            <input class="form-check-input" value="ชาย" type="radio" name="user_gender" id="" class="form-control" required>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label" for="">หญิง</label>
                                            <input class="form-check-input" value="หญิง" type="radio" name="user_gender" id="" class="form-control" required>
                                        </div>

                                    </div>

                                    <div class="mb-3">
                                        <select name="" id="" class="form-select" required>
                                            <option value="" selected disabled>-- Text --</option>
                                            <option value="user">user</option>
                                            <option value="partner">partner</option>
                                            <option value="market">market</option>
                                            <option value="admin">admin</option>
                                        </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="">รูปภาพ :</label>
                                        <input type="file" accept="image/*" name="" id="" class="form-control">
                                    </div>

                                    <div class="mt-5">
                                        <a href="#!" class="btn btn-secondary">กลับ</a>
                                        <button type="reset" class="btn btn-info">ล้างข้อมูล</button>
                                        <button type="submit" class="btn btn-primary px-5">บันทึกข้อมูล</button>
                                    </div>

                                </form>
                            </div>
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
            $('.sidebar a.').addClass('active');
        })
    </script>

</body>
</html>