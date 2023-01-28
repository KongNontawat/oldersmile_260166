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
                            <li class="breadcrumb-item"><a href="pub_mng.php">จัดการส่วนประชาสัมพันธ์</a></li>
                            <li class="breadcrumb-item active">เพิ่มส่วนประชาสัมพันธ์</li>
                        </ol>

                        <div class="d-flex justify-content-between">
                            <h3 class="mb-3">เพิ่มส่วนประชาสัมพันธ์</h3>
                        </div>

                        <!-- Form!!! -->
                        <div class="row">
                            <div class="col-md-5">
                                <form action="pub_proc/pub_add_proc.php" method="post" enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <textarea name="post_body" id="" cols="30" rows="5" placeholder="เนื้อหาประชาสัมพันธ์" required autofocus class="form-control" required></textarea>
                                    </div>
                                    
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="">รูปภาพ :</label>
                                        <input type="file" accept="image/*" name="post_media" id="" class="form-control" required>
                                    </div>

                                    <div class="mt-5">
                                        <a href="#!" onclick="window.history.back()" class="btn btn-secondary">กลับ</a>
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
            $('.sidebar a.pub').addClass('active');
        })
    </script>

</body>
</html>