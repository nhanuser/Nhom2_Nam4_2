<?php
include("slider.php");
?>


<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-top clearfix">
                        <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
                    </div><!-- end blog-top -->

                    <div class="blog-list clearfix">
                       
                        <hr class="invis">
                        <?php
                        $sql = "SELECT * FROM post";
                        $qr = mysqli_query($conn, $sql);

                        if ($qr) {
                            while ($row = mysqli_fetch_array($qr)) {
                        ?>
                                <div class="blog-list clearfix">
                                    <div class="blog-box row">
                                        <div class="col-md-4">
                                            <div class="post-media">
                                                <a href="detail.php?id=<?php echo $row['PostID']; ?>" title="">
                                                <img src="./admin/<?php echo $row['Images']; ?>" alt="" class="img-fluid">
                                                    <div class="hovereffect"></div>
                                                </a>
                                            </div><!-- end media -->
                                        </div>
                                        <!-- end col-->

                                        <div class="blog-meta big-meta col-md-8">
                                            <h4><a href="detail.php?id=<?php echo $row['PostID']; ?>" title="<?php echo $row['Title']; ?>"><?php echo $row['Title']; ?></a></h4>
                                            <p><?php echo $row['Abstract']; ?></p>
                                            <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html" title="<?php echo $row['CategoryID']; ?>"><?php echo $row['CategoryID']; ?></a></small>
                                            <small><a href="tech-single.html" title="<?php echo $row['CreateDate']; ?>"><?php echo $row['CreateDate']; ?></a></small>
                                            <small><a href="tech-author.html" title="<?php echo $row['Author']; ?>"><?php echo $row['Author']; ?></a></small>
                                            <small><a href="tech-single.html" title=""><i class="fa fa-eye"></i> xxx</a></small>
                                        </div> <!-- end meta -->
                                    </div><!-- end blog-box -->

                                    <hr class="invis">
                                </div><!-- end blog-list -->
                        <?php
                            }
                        }
                        ?>

                    </div><!-- end blog-list -->
                </div><!-- end page-wrapper -->

                <hr class="invis">

                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-start">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">

                   
                    <?php 
                    include("slibers/popularpost.php");
                    include("slibers/recentcomment.php");
                    ?>
                   <div class="widget">
                        <h2 class="widget-title">Follow Us</h2>

                        <div class="row text-center">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button facebook-button">
                                    <i class="fa fa-facebook"></i>
                                    <p>27k</p>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button twitter-button">
                                    <i class="fa fa-twitter"></i>
                                    <p>98k</p>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button google-button">
                                    <i class="fa fa-google-plus"></i>
                                    <p>17k</p>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button youtube-button">
                                    <i class="fa fa-youtube"></i>
                                    <p>22k</p>
                                </a>
                            </div>
                        </div>
                    </div><!-- end widget -->

                </div><!-- end sidebar -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>