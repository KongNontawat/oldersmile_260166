<?php  if(isset($_SESSION['succ'])): ?>
<section class="position-fixed end-0 bottom-0 m-2">
    <div class="toast show bg-success text-white" style="max-width:280px">
        <div class="d-flex">
            <div class="toast-body text-white" style="font-size:19px"><?php echo $_SESSION['succ']; unset($_SESSION['succ']) ?></div>
            <button class="btn-close btn-close-white btn-close-toast m-auto me-2"></button>
        </div>
    </div>
</section>
<?php endif; ?>
<?php  if(isset($_SESSION['err'])): ?>
<section class="position-fixed end-0 bottom-0 m-2">
    <div class="toast show bg-danger text-white" style="max-width:280px">
        <div class="d-flex">
            <div class="toast-body text-white" style="font-size:19px"><?php echo $_SESSION['err']; unset($_SESSION['err']) ?></div>
            <button class="btn-close btn-close-white btn-close-toast m-auto me-2"></button>
        </div>
    </div>
</section>
<?php endif; ?>