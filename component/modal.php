<div class="modal fade" id="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5>เขียนโพสต์ / บทความ</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="post_proc/post_add_proc.php" method="post" enctype="multipart/form-data">
                    <textarea name="post_body" id="" cols="30" rows="5" class="form-control mb-3" placeholder="เขียนโพสต์ / บทความ..." required></textarea>
                    <input name="cat_name" list="datalist" id="cat_name" class="form-select mb-3" required placeholder="หมวดหมู่...">
                    <datalist id="datalist">
                        <?php foreach($cat_all as $cat3): ?>
                        <option value="<?php echo $cat3['cat_name'] ?>">
                        <?php endforeach; ?>
                    </datalist>
                    <div class="input-group">
                        <label for="image" class="input-group-text">รูป/วีดีโอ</label>
                        <input type="file" name="post_media" id="" class="form-control" accept="image/*,video/mp4">
                    </div>
                    <button type="submit" class="btn btn-primary col-12 btn-lg mt-4">โพสต์</button>
                </form>
            </div>
        </div>
    </div>
</div>