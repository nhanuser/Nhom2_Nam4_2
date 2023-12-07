<?php
    $id = $_GET["id"];
?>
<div class="col-lg-6">
                                    <?php
                                            $sql = "SELECT * FROM post where postid> $id Limit 1";
                                            $qr = mysqli_query($conn, $sql);

                                            if ($qr) {
                                                while ($row = mysqli_fetch_array($qr)) {
                                        ?>
                                        <div class="blog-list-widget">
                                            <div class="list-group">
                                                <a href="detail.php?id=<?php echo $row['PostID']?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="w-100 justify-content-between">
                                                        <img src="<?php echo $row['Images'] ?>" alt="" class="img-fluid float-left">
                                                        <h5 class="mb-1"><?php echo $row['Title'] ?></h5>
                                                        <small>Next Post</small>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <?php }}?>
                                    </div><!-- end col -->