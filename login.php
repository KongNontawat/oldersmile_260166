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

    <main class="w-100" style="max-width:450px">
        <div class="card shadow-sm">
            <div class="card-body">
                <a href="index.php"><h1 class="display-6 text-logo my-4 text-center"><b>OlderSmile</b></h1></a>
                <h3 class="text-logo2 mb-4 text-center">เข้าสู่ระบบ</h3>
                <?php include('component/alert2.php'); ?>
                <form action="auth_proc/login_proc.php" method="post">
                    <div class="mb-3">
                        <label for="">ชื่อผู้ใช้ : </label>
                        <input type="text" name="user_name" id="" autofocus required placeholder="โปรดกรอกชื่อผู้ใช้..." class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">รหัสผ่าน : </label>
                        <input type="password" name="user_pass" id="" required placeholder="โปรดกรอกรหัสผ่าน..." class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary mt-4 btn-lg col-12">เข้าสู่ระบบ</button>
                    <div class="text-center mt-3">
                        <a href="register.php" class="text-primary">สมัครสมาชิก?</a>
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