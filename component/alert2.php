<?php  if(isset($_SESSION['succ'])): ?>
<div class="alert alert-success show fade alert-dismissible">
    <p style="font-size:19px"><?php echo $_SESSION['succ']; unset($_SESSION['succ']) ?></p>
    <button class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>
<?php  if(isset($_SESSION['err'])): ?>
<div class="alert alert-danger show fade alert-dismissible">
    <p style="font-size:19px"><?php echo $_SESSION['err']; unset($_SESSION['err']) ?></p>
    <button class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>
