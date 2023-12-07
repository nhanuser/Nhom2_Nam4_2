<?php
    $id = $_GET["id"];
?>
<div class="custombox clearfix">
                                <h4 class="small-title">Bình luận</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="comments-list">
                                        <?php
                                            $sql = "SELECT * FROM comments where postid= $id";
                                            $qr = mysqli_query($conn, $sql);

                                            if ($qr) {
                                                while ($row = mysqli_fetch_array($qr)) {
                                        ?>
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name"><?php echo $row['name'] ?><small>5 days ago</small></h4>
                                                    <p><?php echo $row['text'] ?></p>
                                                </div>
                                            </div>
                                           <?php 
                                            }
                                            }
                                           ?>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end custom-box -->