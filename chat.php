<?php  
include('conn.php');
include('auth_proc/check_login.php');

$sql_user = "SELECT * FROM user WHERE user_id = '{$_GET['id']}'";
$query_user = mysqli_query($conn, $sql_user);
$row = mysqli_fetch_assoc($query_user);
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
<body>

    <?php include('component/alert.php'); ?>
    <!-- Navbar -->
    <?php include('component/navbar.php'); ?>

    <!-- Modal -->
    <?php include('component/modal.php'); ?>

    <!-- Canvas -->
    <?php include('component/canvas.php'); ?>

    <!-- Content -->
    <div class="container pb-5">
        <div class="row gy-3 mt-2 mt-lg-3">

            <div class="col-md-4 col-lg-3 d-none d-md-block">
                <?php include('component/sidebar.php'); ?>
            </div>

            <div class="col-md-8 col-lg-6">

                <h4 class="active-header my-2 my-lg-3 d-md-none"></h4>

                <div class="card shadow-sm mb-3" style="min-height:450px">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                     <a href="user_profile.php?id=<?php echo $row['user_id'] ?>" class="d-flex align-items-center">
                            <img src="img/<?php echo $row['user_image'] ?>" alt="" class="rounded-circle me-2" width="40" height="40">
                            <p><?php echo $row['user_name'] ?></p>
                            <?php if($row['user_role'] == 'admin' OR $row['user_role'] == 'partner') : ?>
                            <img src="icon/verify.png" alt="" class="ms-1" width="15" height="15">
                            <?php endif; ?>
                        </a>
                        <a href="chat_list.php" class="btn-close"></a>
                    </div>
                    <div class="card-body" id="show_message">


                    </div>
                    <div class="card-footer bg-white">
                        <form action="" method="get" id="form" class="d-flex align-items-center">
                            <img src="icon/chat.png" width="30" height="30" alt="" class="me-2">
                            <div class="input-group">
                                <input type="text" name="message" placeholder="พูดคุย..." id="" class="form-control">
                                <input type="hidden" name="receiver"  value="<?php echo $_GET['id'] ?>">
                                <button type="submit" class="btn btn-outline-primary">ส่ง</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="col-md-3 d-none d-lg-block">
                <?php include('component/aside.php'); ?>
            </div>

        </div>
    </div>
    
    <script src="jquery/jquery-3.6.2.min.js"></script>
    <script src="boostrap/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        $(function() {
            $('.active-menu a.chat_list').addClass('active');
            $('.active-header').text('แชท');

            get_chat();
           
            $('#form').submit(function(e) {
                e.preventDefault();
                let message = $('#form input[name=message]').val()
                let receiver = $('#form input[name=receiver]').val()
                $.get(`chat_proc/chat_add.php?message=${message}&receiver=${receiver}`,function() {
                    $('#form input[name=message]').val('')
                    get_chat();
                })
            })

            setInterval(() => {
                get_chat();
            }, 700);

            function get_chat() {
                $.get('chat_proc/chat_get.php?id=<?php echo $_GET['id'] ?>',function(data,status) {
                    let html = ``;
                    $.each($.parseJSON(data),function(i,val) {
                        // แชทเรา
                        if(val.sender == <?php echo $my_id ?>) {
                            html += `
                            <div class="d-flex mb-2 justify-content-end">
                            <div class="flex-grow-1" style="max-width:350px;">
                                <p class="rounded-3 bg-primary p-1">${val.message}</p>
                                <small class="text-muted d-block text-end" style="font-size:12px">${val.mes_created}</small>
                            </div>
                            <div class="flex-shrink-0 ms-2">
                                <img src="img/${val.user_image}" width="30" height="30" alt="" class="rounded-circle">
                            </div>
                        </div>
                            `;
                        }else {
                            html += `
                            <div class="d-flex mb-2">
                            <div class="flex-shrink-0">
                                <img src="img/${val.user_image}" width="30" height="30" alt="" class="rounded-circle">
                            </div>
                            <div class="flex-grow-1 ms-2" style="max-width:350px;">
                                <p class="rounded-3 p-1" style="background:#e0e0e0;">${val.message}</p>
                                <small class="text-muted d-block" style="font-size:12px">${val.mes_created}</small>
                            </div>
                        </div>
                            `;
                        }
                    })
                    $('#show_message').html(html)
                })
            }
        })
    </script>
</body>
</html>