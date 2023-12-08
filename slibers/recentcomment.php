<div class="widget">
                        <h2 class="widget-title">Bình luận nổi bật</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                            <?php
                        $sql = "SELECT * FROM comments";
                        $qr = mysqli_query($conn, $sql);

                        if ($qr) {
                            for ($i = 1; $i <= 3; $i++) {
                            ($row = mysqli_fetch_array($qr));
                            if ($row!=null){
                        ?>
                                <a href="detail.php?id=<?php echo $row['postid']; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1"><?php echo mb_strimwidth($row['name'], 0, 60, '...'); ?></h5>
                                        <h5 class="mb-1"><?php echo mb_strimwidth($row['text'], 0, 60, '...'); ?></h5>
                                       
                                    </div>
                                </a>
                                <?php }}}?>
                               
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->
