<section class="section first-section">
    <div class="container-fluid">
        <div class="masonry-blog clearfix">
            <?php
            $sql = "SELECT * FROM post limit 2";
            $qr = mysqli_query($conn, $sql);
            if ($qr) {
                while ($row = mysqli_fetch_array($qr)) {
                    ?>
            <div class="first-slot">
                <div class="masonry-box post-media">
                <img src="./admin/<?php echo $row['Images']; ?>" alt="" class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange">
                                    <a href="<?php echo $row['Link']; ?>" title=""><?php echo $row['CategoryID']; ?></a>
                                </span>
                                <h4>
                                    <a href="detail.php?id=<?php echo $row['PostID']; ?>" title=""><?php echo $row['Title']; ?></a>
                                </h4>
                                <small>
                                    <a href="#" title=""><?php echo $row['CreateDate']; ?></a>
                                </small>
                                <small>
                                    <a href="#" title=""><?php echo $row['Author']; ?></a>
                                </small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end first-side -->
            <?php
                }
            }
            ?>
        </div><!-- end masonry -->
    </div>
</section>