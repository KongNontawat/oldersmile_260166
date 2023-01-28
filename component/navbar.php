<nav class="navbar navbar-light bg-white shadow-sm py-1 position-sticky top-0" style="z-index: 1000;">
    <div class="container">
        <a href="index.php" class="navbar-brand d-none d-md-block">
            <h3 class="text-logo"><b>OlderSmile</b></h3>
        </a>

        <ul class="nav nav-fill nav-pills flex-fill align-items-center active-menu" style="max-width: 500px;">
            <li class="nav-item"><a href="index.php" class="nav-link px-1 px-lg-3 home"><img src="icon/home.png" width="30" height="30" alt=""></a></li>
            <li class="nav-item"><a href="search.php" class="nav-link px-1 px-lg-3 search"><img src="icon/search.png" width="30" height="30" alt=""></a></li>
            <li class="nav-item"><a href="category.php" class="nav-link px-1 px-lg-3 category"><img src="icon/pin.png" width="30" height="30" alt=""></a></li>
            <li class="nav-item"><a href="chat_list.php" class="nav-link px-1 px-lg-3 chat_list"><img src="icon/chat.png" height="30" alt=""></a></li>
            <li class="nav-item d-md-none"><a href="#!" data-bs-target="#offcanvas" data-bs-toggle="offcanvas" class="nav-link px-1 px-lg-3"><img src="icon/menu.png" width="30" height="30" alt=""></a></li>
        </ul>

        <ul class="navbar-nav" style="max-width: 180px;">
            <li class="nav-item d-none d-lg-block">    
                <?php if(!isset($_SESSION['login'])): ?>
                    <a href="login.php" class="btn btn-primary">เข้าสู่ระบบ</a>
                    <a href="register.php" class="btn btn-outline-primary">สมัคร</a>
                <?php endif; ?>
                <?php if(isset($_SESSION['login']) AND $_SESSION['my_role'] != 'admin'): ?>
                <p class="text-muted">สวัสดี : <?php echo (isset($_SESSION['my_name']))?$_SESSION['my_name'] :'' ?></p>
                <?php endif; ?>
                <?php if(isset($_SESSION['login']) AND $_SESSION['my_role'] == 'admin'): ?>
                <a href="admin/user_mng.php" class="btn btn-outline-secondary">จัดการหลังบ้าน</a>
                                <?php endif; ?>
            </li>
        </ul>
    </div>
</nav>