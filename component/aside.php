<?php if(isset($show_ad)): ?>
    <?php 
    $query_ad1 = mysqli_query($conn, "SELECT * FROM advert WHERE cat_id = {$post['cat_id']} ORDER BY ad_id DESC");    
    if(mysqli_num_rows($query_ad1) > 0):
    ?>
    <div class="carousel slide mb-3" id="slide1" data-bs-ride="carousel">
    <div class="carousel-inner rounded-4">
        <?php foreach($query_ad1 as $i => $ad1): ?>
        <div class="carousel-item <?php echo ($i == 0)? ' active':''; ?>">
            <a href="ad_proc/ad_view.php?id=<?php echo $ad1['ad_id'] ?>=&part<?php echo $post['user_id'] ?>=&link=<?php echo $ad1['ad_link'] ?>" target="_blank"><img src="img/<?php echo $ad1['ad_image'] ?>" alt="" class="d-block w-100" height="250"></a>
        </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#slide1">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#slide1">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
<?php endif; ?>
<?php endif; ?>

<div class="card shadow-sm position-sticky" style="top:70px">
    <div class="card-body cat_bar">
        <h5 class="mb-3">เรื่องที่น่าสนใจ</h5>
        <?php foreach($cat_all as $cat2): ?>
        <a href="index.php?cat_id=<?php echo $cat2['cat_id'] ?>&cat_name=<?php echo $cat2['cat_name'] ?>" class="rounded-4 d-block mb-1 p-1 text-primary">#<?php echo $cat2['cat_name'] ?></a>
        <?php endforeach; ?>
    </div>
</div>