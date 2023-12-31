<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sID = session_id();
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>Chi tiết bài viết</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- FontAwesome Icons core CSS -->
<link href="css/font-awesome.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="style.css" rel="stylesheet">

<!-- Responsive styles for this template -->
<link href="css/responsive.css" rel="stylesheet">

<!-- Colors for this template -->
<link href="css/colors.css" rel="stylesheet">

<!-- Version Tech CSS for this template -->
<link href="css/version/tech.css" rel="stylesheet">

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        <?php include 'header.php'; ?>

        <section class="section single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <?php
                            $sql = "SELECT * FROM post WHERE PostID = $id";
                            $qr = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($qr)) {
                            ?>
                                <div class="blog-title-area text-center">
                                    <ol class="breadcrumb hidden-xs-down">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                        <li class="breadcrumb-item active"><?php echo $row['Title'] ?></li>
                                    </ol>

                                    <span class="color-orange"><a href="#" title="">Technology</a></span>

                                    <h3><?php echo $row['Title'] ?></h3>

                                    <div class="blog-meta big-meta">
                                        <small><a href="tech-single.html" title=""><?php echo $row['CreateDate'] ?></a></small>
                                        <small><a href="tech-author.html" title=""><?php echo $row['Author'] ?></a></small>
                                        <!-- <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small> -->
                                    </div><!-- end meta -->

                                    <div class="post-sharing">
                                        <ul class="list-inline">
                                            <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                            <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                            <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div><!-- end post-sharing -->
                                </div><!-- end title -->

                                <div class="single-post-media">
                                <img src="./admin/<?php echo $row['Images']; ?>" alt="" class="img-fluid">
                                </div><!-- end media -->

                                <div class="blog-content">
                                   <p>
                                   <?php echo $row['Contents'] ?>
                                   </p>
                                </div><!-- end content -->


                            <?php } ?>
                        </div><!-- end page-wrapper -->
                         <hr class="invis1">

                            <div class="custombox prevnextpost clearfix">
                                <div class="row">
                                    <?php
                                        include("details/prepost.php");
                                        include("details/nextpost.php");
                                    ?>
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">

                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title">Tác giả</h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="images/admin.png" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="#">Admin</a></h4>
                                        <p>Câu cửa miệng của chúng tôi là:</p> <p>Chào em, rất xinh đẹp tuyệt vời, chúc vui vẻ hành phúc bình an</p>

                                        <div class="topsocial">
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                        </div><!-- end social -->

                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">

                           <?php
                                include("details/comments.php");
                           ?>

                            <hr class="invis1">
                            <div class="custombox clearfix">
                                <h4 class="small-title">Leave a Reply</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form method="post" class="form-wrapper">
                                            <input name="cmtname" type="text" class="form-control" placeholder="Your name">
                                            <input name="cmtemail" type="text" class="form-control" placeholder="Email address">
                                            <input name="cmtweb" type="text" class="form-control" placeholder="Website">
                                            <textarea name="cmttext" class="form-control" placeholder="Your comment"></textarea>
                                            <button name="comment" type="submit" class="btn btn-primary">Gửi bình luận</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
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

        <?php
        include("footer.php");
        ?>

        

    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>
<?php


if (isset($_POST['comment'])) {
    $cmtname = $_POST["cmtname"];
    $cmtemail = $_POST["cmtemail"];
    $cmtweb = $_POST["cmtweb"];
    $cmttext = $_POST["cmttext"];
    $cmtpostid = $id;

    if (true) {
        // Sửa câu SQL INSERT INTO để chính xác về cú pháp và thứ tự các trường
        $sql = "INSERT INTO comments (name, email, web, text, postid) VALUES ('$cmtname', '$cmtemail', '$cmtweb', '$cmttext', '$cmtpostid')";
        $qr = mysqli_query($conn, $sql);

        // Kiểm tra và thông báo lỗi nếu có
        if (!$qr) {
            die("Lỗi khi thêm dữ liệu: " . mysqli_error($conn));
        }

        echo "<script>window.location.href = 'detail.php?id= $id;';</script>";
        exit();
    }
}
?>