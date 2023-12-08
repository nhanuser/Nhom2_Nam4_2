<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include 'connect.php';
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h2>Danh sách tài khoản</h2>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active">Tài khoản</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body mt-4">
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th class="col-1 text-center">#</th>
                                    <th class="col-1 text-center">Họ và tên</th>
                                    <th class="col-3 text-center">Email</th>
                                    <th class="col-2 text-center">Tên đăng nhập</th>
                                    <th class="col-1 text-center">Mật khẩu</th>
                                    <th class="col-2 text-center">Level</th>
                                    <th class="col-2 text-center">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM admin ORDER BY adminID DESC";
                                $qr = mysqli_query($conn, $sql);
                                if ($sql) {
                                    $i = 0;
                                    while ($row = mysqli_fetch_array($qr)) {
                                        $i++;
                                ?>
                                        <tr>
                                            <th class="text-center" scope="row">
                                                <?php echo $i; ?>
                                            </th>
                                            <th class="text-center"><?php echo $row["adminName"] ?></th>
                                            <th class="text-center"><?php echo $row["adminEmail"] ?></th>
                                            <th class="text-center"><?php echo $row["adminUser"] ?></th>
                                            <th class="text-center"><?php echo $row["adminPass"] ?></th>
                                            <th class="text-center"><?php echo $row["level"] ?></th>
                                            <td class="text-center">
                                                <a onclick="return confirm(' Bạn có chắc chắn muốn xoá?')" href="deleteaccount.php?id=<?php echo $row['adminID']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
</body>
<?php
include 'inc/footer.php';
?>