<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>Bài viết mới nhứt</title>
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
        <?php
        include("header.php");
        ?>

        <div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Bài viết mới nhất</li>
                        </ol>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section">
            <div class="container">
                <div class="row">
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

                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-grid-system">
                                <div class="row">
                                    <?php
                                    // Tính tổng số sản phẩm
                                    $totalProducts = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM post WHERE MenuID = 2"));

                                    // Số sản phẩm trên mỗi trang
                                    $productsPerPage = 8;

                                    // Tổng số trang
                                    $totalPages = ceil($totalProducts / $productsPerPage);

                                    // Trang hiện tại (mặc định là trang 1)
                                    $currentpage = isset($_GET['page']) ? $_GET['page'] : 1;

                                    // Xác định vị trí bắt đầu của sản phẩm trong truy vấn
                                    $startFrom = ($currentpage - 1) * $productsPerPage;

                                    // Truy vấn với LIMIT để lấy số lượng sản phẩm cho trang hiện tại
                                    $sql = "SELECT * FROM post WHERE MenuID = 2 LIMIT $startFrom, $productsPerPage";
                                    $qr = mysqli_query($conn, $sql);

                                    // Hiển thị sản phẩm
                                    if ($qr) {
                                        $count = 0; // Đếm số sản phẩm đã hiển thị trong mỗi hàng

                                        while ($row = mysqli_fetch_array($qr)) {
                                            $count++;
                                    ?>
                                            <div class="col-md-6">
                                                <div class="blog-box">
                                                    <div class="post-media">
                                                        <a href="tech-single.html" title="">
                                                            <img src="./admin/<?php echo $row['Images']; ?>" alt="" class="img-fluid">
                                                            <div class="hovereffect">
                                                                <span></span>
                                                            </div><!-- end hover -->
                                                        </a>
                                                    </div><!-- end media -->
                                                    <div class="blog-meta big-meta">
                                                        <h4><a href="tech-single.html" title=""><?php echo $row["Title"] ?></a></h4>
                                                        <p><?php echo $row["Abstract"] ?></p>
                                                        <small><a href="tech-single.html" title=""><?php echo date('d/m/Y', strtotime($row['CreateDate'])); ?></a></small>
                                                        <small><a href="tech-author.html" title=""><?php echo $row["Author"] ?></a></small>
                                                    </div><!-- end meta -->
                                                </div><!-- end blog-box -->
                                            </div><!-- end col -->

                                    <?php
                                            if ($count == 2) {
                                                echo '</div><div class="row">'; // Kết thúc hàng và bắt đầu hàng mới
                                                $count = 0; // Đặt lại đếm cho hàng mới
                                            }
                                        }
                                    }
                                    ?>
                                </div><!-- end row -->
                            </div><!-- end blog-grid-system -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis3">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <?php
                                        for ($i = 1; $i <= $totalPages; $i++) {
                                            echo '<li class="page-item ' . ($currentpage == $i ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->

                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <?php
        include("footer.php");
        ?>

        <div class="dmtop">Scroll to Top</div>

    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>