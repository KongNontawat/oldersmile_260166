<?php
include('../conn.php');
include('auth_proc/check_login.php');

$sql = "SELECT * FROM post WHERE cat_id = 1";
$query = mysqli_query($conn,$sql);

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
                            <li class="breadcrumb-item active">จัดการส่วนประชาสัมพันธ์</li>
                        </ol>

                        <div class="d-flex justify-content-between">
                            <h3>จัดการส่วนประชาสัมพันธ์</h3>

                            <div class="d-flex">
                                <a href="pub_add.php" class="btn btn-primary me-3">+ เพิ่มส่วนประชาสัมพันธ์</a>

                            </div>
                        </div>

                        <!-- Table!!! -->
                        <div class="table-responsive mt-3">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th style="width: 15%;"></th>
                                        <th style="width: 35%;">เนื้อหา</th>
                                        <th style="width: 20%;">โพสต์เมื่อ</th>
                                        <th style="width: 25%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($query as $i => $row):?>
                                    <tr>
                                        <td><?php echo $i+1;?></td>
                                        <td>
                                            <img height="100" src="../img/<?php echo $row['post_media'];?>" alt="">
                                        </td>
                                        <td><?php echo $row['post_body'];?></td>
                                        <td><?php echo $row['post_created'];?></td>
                                        <td>
                                            <a href="../post_detail.php?id=<?php echo $row['post_id'];?>" class="btn btn-success btn-sm">แสดงความคิดเห็น</a>
                                            <a href="pub_edit.php?id=<?php echo $row['post_id'];?>" class="btn btn-warning btn-sm">แก้ไข</a>
                                            <a href="pub_proc/pub_del_proc.php?id=<?php echo $row['post_id'];?>" onclick="return confirm('คุณแน่ใจ หรือไม่ ว่าจะลบ')" class="btn btn-danger btn-sm">ลบ</a>
                                        </td>
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
            $('.sidebar a.pub').addClass('active');
        })
    </script>

</body>
</html>