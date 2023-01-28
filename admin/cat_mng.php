<?php
include('../conn.php');
include('auth_proc/check_login.php');

$sql = "SELECT * FROM category WHERE not cat_id = 1";
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
                            <li class="breadcrumb-item active">จัดการหมวดหมู่</li>
                        </ol>

                        <div class="d-flex justify-content-between">
                            <h3 class="mb-3">จัดการหมวดหมู่</h3>

                        </div>

                        <form action="cat_proc/cat_add_proc.php" method="post" class="d-flex">
                            <div class="me-3">
                                <input style="width: 400px!important;" required autofocus type="text" name="cat_name" id="" class="form-control" placeholder="เพิ่มหมวดหมู่">
                            </div>
                            <button type="submit" class="btn btn-primary">+ เพิ่มหมวดหมู่</button>
                        </form>

                        <!-- Table!!! -->
                        <div class="table-responsive mt-3">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th style="width: 70%;">หมวดหมู่</th>
                                        <th style="width: 25%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($query as $i => $row):?>
                                    <form action="cat_proc/cat_edit_proc.php" method="post">
                                    <tr>
                                        <td><?php echo $i+1;?></td>
                                        <td>
                                            <input type="text" name="cat_name" value="<?php echo $row['cat_name'];?>" id="" class="form-control-plaintext">
                                            <input type="hidden" name="cat_id" value="<?php echo $row['cat_id'];?>">
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-warning btn-sm">ปรับปรุง</button>
                                            <a href="cat_proc/cat_del_proc.php?id=<?php echo $row['cat_id'];?>" onclick="return confirm('คุณแน่ใจ หรือไม่ ว่าจะลบ')" class="btn btn-danger btn-sm">ลบ</a>
                                        </td>
                                    </tr>
                                    </form>
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
            $('.sidebar a.cat').addClass('active');
        })
    </script>

</body>
</html>