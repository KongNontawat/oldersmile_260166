<div class="active-menu">
    <?php if(isset($_SESSION['login']) AND $_SESSION['my_role'] != 'user'): ?>
    <a href="#!" class="btn btn-primary col-12 mb-3" data-bs-target="#modal" data-bs-toggle="modal">+ สร้างโพสต์</a>
    <?php endif; ?>
    <a href="my_profile.php" class="rounded-4 p-2 mb-1 d-flex align-items-center my_profile"><img src="img/<?php echo (isset($_SESSION['my_image']))?$_SESSION['my_image'] :'avatar.png' ?>" alt="" class="rounded-circle me-2" width="45" height="45"> <p><?php echo (isset($_SESSION['my_name']))?$_SESSION['my_name'] :'โปรดเข้าสู่ระบบก่อน' ?></p></a>
    <a href="chat_list.php" class="rounded-4 p-2 mb-1 d-flex align-items-center chat_list"><img src="icon/chat.png" alt="" class="me-2" height="35"> <p>แชท</p></a>
    <a href="search.php" class="rounded-4 p-2 mb-1 d-flex align-items-center search"><img src="icon/search.png" alt="" class="me-2" width="35" height="35"> <p>ค้นหา</p></a>
    <a href="category.php" class="rounded-4 p-2 mb-1 d-flex align-items-center category"><img src="icon/pin.png" alt="" class="me-2" width="35" height="35"> <p>เรื่องที่น่าสนใจ</p></a>
    <a href="activity.php" class="rounded-4 p-2 mb-1 d-flex align-items-center activity"><img src="icon/megaphone.png" alt="" class="me-2" width="35" height="35"> <p>ประชาสัมพันธ์</p></a>
    <a href="ques.php" class="rounded-4 p-2 mb-1 d-flex align-items-center ques"><img src="icon/ques.png" alt="" class="me-2" width="35" height="35"> <p>แบบประเมิน</p></a>
    <?php if(isset($_SESSION['login']) AND $_SESSION['my_role'] == 'market'): ?>
    <a href="promote.php" class="rounded-4 p-2 mb-1 d-flex align-items-center promote"><img src="icon/promote.png" alt="" class="me-2" width="35" height="35"> <p>โปรโมท</p></a>
    <?php endif; ?>

    <a href="wallet.php" class="rounded-4 p-2 mb-1 d-flex align-items-center wallet"><img src="icon/wallet.png" alt="" class="me-2" width="35" height="35"> <p>กระเป๋าเงิน</p></a>
</div>