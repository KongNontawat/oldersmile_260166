<?php  
include('conn.php');

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
<body class="w-100 vh-100 d-flex justify-content-center align-items-center px-2">

    <main class="w-100" style="max-width:650px">
        <div class="card shadow-sm">
            <div class="card-body">
                <a href="index.php"><h1 class="display-6 text-logo my-4 text-center"><b>OlderSmile</b></h1></a>
                <h3 class="text-logo2 mb-4 text-center">สมัครสมาชิก</h3>
                <?php include('component/alert2.php'); ?>

                <form action="auth_proc/register_proc.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="">ชื่อผู้ใช้ :</label>
                        <input type="text" name="user_name" id="" class="form-control" autofocus required>
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
                        <label for="">วันเกิด :</label>
                        <input type="date" name="user_dob" id="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">เบอร์โทร :</label>
                        <input type="tel" name="user_tel" id="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">รหัสผ่าน :</label>
                        <input type="password" name="user_pass" id="" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">ยืนยันรหัสผ่าน :</label>
                        <input type="password" name="user_pass2" id="" class="form-control" required>
                    </div>

                    <div class="input-group mb-3">
                        <label class="input-group-text" for="">รูปภาพ :</label>
                        <input type="file" accept="image/*" name="user_image" id="" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary mt-4 btn-lg col-12">สมัครสมาชิก</button>
                    <div class="text-center mt-3">
                        <a href="login.php" class="text-primary">เข้าสู่ระบบ?</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
    
    <script src="jquery/jquery-3.6.2.min.js"></script>
    <script src="boostrap/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>