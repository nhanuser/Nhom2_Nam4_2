
<div class="widget">
                        <h2 class="widget-title">Bài viết gần đây</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                            <?php
                        $sql = "SELECT * FROM post";
                        $qr = mysqli_query($conn, $sql);

                        if ($qr) {
                            for ($i = 1; $i <= 3; $i++) {
                            ($row = mysqli_fetch_array($qr)) 
                        ?>
                                <a href="detail.php?id=<?php echo $row['PostID']; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                    <img src="./admin/<?php echo $row['Images']; ?>" alt="" class="img-fluid">
                                        <h5 class="mb-1"><?php echo mb_strimwidth($row['Title'], 0, 60, '...'); ?></h5>
                                        
                                    </div>
                                </a>
                        <?php }}?>
                               
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->

