<?php
    include("connect.php");
?>
<header class="tech-header header">
            <div class="container-fluid">
                <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="tech-index.html"><img src="images/version/tech-logo.png" alt=""></a>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                        <?php
                            $sql = "SELECT * FROM menu";
                            $qr = mysqli_query($conn, $sql);
                            if ($qr) {
                                while ($row = mysqli_fetch_array($qr)) {
                                    ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php"><?php echo $row["MenuTitle"] ?></a>
                            </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                        <ul class="navbar-nav mr-2">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-rss"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="admin/login.php"><i class="fa fa-user"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div><!-- end container-fluid -->
</header><!-- end market-header -->