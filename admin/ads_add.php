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
                            <li class="breadcrumb-item"><a href="ads_mng.php">จัดการโฆษณา</a></li>
                            <li class="breadcrumb-item active">เพิ่มโฆษณา</li>
                        </ol>

                        <div class="d-flex justify-content-between">
                            <h3 class="mb-3">เพิ่มโฆษณา</h3>
                        </div>

                        <!-- Form!!! -->
                        <div class="row">
                            <div class="col-md-5">
                                <form action="ads_proc/ads_add_proc.php" method="post" enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <textarea name="ad_body" id="" cols="30" rows="5" placeholder="เนื้อหาโฆษณา" autofocus class="form-control" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">ลิงก์โฆษณา :</label>
                                        <input type="text" name="ad_link" placeholder="https://..." required id="" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">กลุ่มเป้าหมาย</label>

                                        <select name="cat_id" id="" class="form-select" required>
                                            <option value="" selected disabled>-- เลือกกลุ่มเป้าหมาย --</option>
                                            <?php foreach($query as $i => $row):?> 
                                            <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                                            <?php endforeach;?> 

                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">จำนวนการมองเห็น :</label>
                                        <input type="number" name="ad_point" placeholder="" required id="" class="form-control">
                                    </div>


                                    
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="">รูปโฆษณา :</label>
                                        <input type="file" accept="image/*" name="ad_image" id="" class="form-control" required>
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
            $('.sidebar a.ads').addClass('active');
        })
    </script>

</body>
</html>