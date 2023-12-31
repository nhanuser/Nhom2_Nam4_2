
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>Liên hệ</title>
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
                        <h2><i class="fa fa-envelope-open-o bg-orange"></i> Liên hệ chúng tôi <small class="hidden-xs-down hidden-sm-down"></small></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-wrapper">
                            <div class="row">
                                <div class="col-lg-5">
                                    <h4>Về chúng tôi</h4>
                                    <p>Đây là sản phẩm của nhóm 2 chúng tôi, không dùng vào mục đích thương mại.</p>
                   
                                    <h4>Chúng tôi có thể giúp gì cho bạn?</h4>
                                    <p>Hãy gửi đóng góp của bạn cho chúng tôi, cảm ơn sự đóng góp của bạn. </p>
             
                                    <!-- <h4>Pre-Sale Question</h4>
                                    <p>Fusce dapibus nunc quis quam tempor vestibulum sit amet consequat enim. Pellentesque blandit hendrerit placerat. Integertis non.</p>-->
                                </div> 
                                <div class="col-lg-7">
                                    <form method="post" class="form-wrapper">
                                        <input name="name" type="text" class="form-control" placeholder="Họ tên">
                                        <input name="email" type="text" class="form-control" placeholder="Địa chỉ Email">
                                        <input name="phone" type="text" class="form-control" placeholder="Số điện thoại">
                                        <input name="subject" type="text" class="form-control" placeholder="Chủ đề">
                                        <textarea name="message" class="form-control" placeholder="Thông điệp của bạn"></textarea>
                                        <button type="submit" name="contact" class="btn btn-primary">Gửi <i class="fa fa-envelope-open-o"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
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
if (isset($_POST['contact'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $sub = $_POST["subject"];
    $mes = $_POST["message"];

    if (True) {
        // Sửa câu SQL INSERT INTO để chính xác về cú pháp và thứ tự các trường
        $sql = "INSERT INTO mails (name, email, phone, subject, message) VALUES ('$name', '$email', '$phone', '$sub', '$mes')";
        $qr = mysqli_query($conn, $sql);

        // Kiểm tra và thông báo lỗi nếu có
        if (!$qr) {
            die("Lỗi khi thêm dữ liệu: " . mysqli_error($conn));
        }

        echo "<script>window.location.href = 'contact.php';</script>";
        exit();
    }
}
?>