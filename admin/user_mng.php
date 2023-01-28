<?php
include('../conn.php');
include('auth_proc/check_login.php');

$sql = "SELECT * FROM user";

if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM user WHERE user_name LIKE '%$search%'";
}

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
                            <li class="breadcrumb-item active">จัดการสมาชิก</li>
                        </ol>

                        <div class="d-flex justify-content-between">
                            <h3>จัดการสมาชิก</h3>

                            <div class="d-flex">
                                <a href="user_add.php" class="btn btn-primary me-3">+ เพิ่มสมาชิก</a>

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
                                        <th style="width: 5%;">#</th>
                                        <th style="width: 10%;"></th>
                                        <th style="width: 15%;">ชื่อผู้ใช้</th>
                                        <th style="width: 15%;">เบอร์โทร</th>
                                        <th style="width: 10%;">เพศ</th>
                                        <th style="width: 15%;">วันเกิด</th>
                                        <th style="width: 10%;">สถานะ</th>
                                        <th style="width: 15%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($query as $i => $row):?>
                                    <tr>
                                        <td><?php echo $i+1;?></td>
                                        <td>
                                            <img class="rounded-circle" height="50" width="50" src="../img/<?php echo $row['user_image'];?>" alt="">
                                        </td>
                                        <td><?php echo $row['user_name'];?></td>
                                        <td><?php echo $row['user_tel'];?></td>
                                        <td><?php echo $row['user_gender'];?></td>
                                        <td><?php echo $row['user_dob'];?></td>

                                        <td>
                                            <?php if($row['user_role']=='admin'):?>
                                                <span class="badge bg-danger"><?php echo $row['user_role'];?></span>
                                            <?php elseif($row['user_role']=='partner'):?>
                                                <span class="badge bg-success"><?php echo $row['user_role'];?></span>
                                            <?php elseif($row['user_role']=='market'):?>
                                                <span class="badge bg-warning"><?php echo $row['user_role'];?></span>
                                            <?php else:?>
                                                <span class="badge bg-primary"><?php echo $row['user_role'];?></span>
                                            <?php endif;?>

                                        </td>

                                        <td>
                                            <a href="user_edit.php?id=<?php echo $row['user_id'];?>" class="btn btn-warning btn-sm">แก้ไข</a>
                                            <?php if($row['user_id']!==$my_id):?>
                                            <a href="user_proc/user_del_proc.php?id=<?php echo $row['user_id'];?>" onclick="return confirm('คุณแน่ใจ หรือไม่ ว่าจะลบ')" class="btn btn-danger btn-sm">ลบ</a>
                                            <?php endif;?>
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
            $('.sidebar a.user').addClass('active');
        })
    </script>

</body>
</html>