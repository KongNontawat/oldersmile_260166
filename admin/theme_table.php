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
                            <li class="breadcrumb-item active">จัดการ</li>
                        </ol>

                        <div class="d-flex justify-content-between">
                            <h3>จัดการ</h3>

                            <div class="d-flex">
                                <a href="" class="btn btn-primary me-3">+ เพิ่ม</a>

                                <form action="" method="get">
                                    <div class="input-group">
                                        <input type="text" name="search" placeholder="ค้าหา..." id="" class="form-control">
                                        <button type="submit" class="btn btn-outline-secondary">ค้าหา</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Table!!! -->
                        <div class="table-responsive mt-3">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th style="width: 0%;">#</th>
                                        <th style="width: 0%;">Text</th>
                                        <th style="width: 0%;">Text</th>
                                        <th style="width: 0%;">Text</th>
                                        <th style="width: 0%;">Text</th>
                                        <th style="width: 0%;">Text</th>
                                        <th style="width: 0%;">Text</th>
                                        <th style="width: 0%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Test</td>
                                        <td>Test</td>
                                        <td>Test</td>
                                        <td>Test</td>
                                        <td>Test</td>
                                        <td>Test</td>
                                        <td>Test</td>
                                        <td>
                                            <a href="#!" class="btn btn-warning btn-sm">แก้ไข</a>
                                            <a href="#!" onclick="return confirm('คุณแน่ใจ หรือไม่ ว่าจะลบ')" class="btn btn-danger btn-sm">ลบ</a>
                                        </td>
                                    </tr>
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
            $('.sidebar a.').addClass('active');
        })
    </script>

</body>
</html>