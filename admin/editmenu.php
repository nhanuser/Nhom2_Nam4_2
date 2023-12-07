<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include("connect.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

if (isset($_POST['sua'])) {
    $MenuName = $_POST["MenuName"];
    $Orders = $_POST["Orders"];
    $Parent = $_POST["Parent"];
    $IsActive = $_POST["IsActive"];
    $MenuTitle = $_POST["MenuTitle"];

    // Thêm điều kiện WHERE trong câu SQL để chỉnh sửa một bản ghi cụ thể
    if ($MenuName != "" && $Orders != "" && $Parent != "" && $IsActive != "" && $MenuTitle != "") {
        $sql = "UPDATE menu SET MenuName = '$MenuName', Orders = '$Orders', Parent = '$Parent', IsActive = '$IsActive', MenuTitle = '$MenuTitle' WHERE MenuID = $id";
        $qr = mysqli_query($conn, $sql);

        // Kiểm tra và thông báo lỗi nếu có
        if (!$qr) {
            die("Lỗi khi cập nhật dữ liệu: " . mysqli_error($conn));
        }

        echo "<script>window.location.href = 'index-menu.php';</script>";
        exit();
    }
}

$sql = "SELECT * FROM menu WHERE MenuID = $id";
$qr = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($qr);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h2>Xác nhận sửa Menu</h2>
    </div>
    <div class="container shadow p-5">
        <div class="row pb-2">
            <h2>Sửa Menu <span></span></h2>
        </div>
        <form method="post" enctype="multipart/form-data">
            <div asp-validation-summary="All"></div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Tên Menu:</label>
                    <input type="text" name="MenuName" class="form-control mb-3" value="<?php echo $row['MenuName']; ?>">
                    <span class="alert-danger"></span>
                </div>
                <div class="form-group col-md-6">
                    <label>Orders:</label>
                    <input type="text" name="Orders" class="form-control mb-3" value="<?php echo $row['Orders']; ?>">
                    <span class="alert-danger"></span>
                </div>
                <div class="form-group col-md-6">
                    <label>Parent:</label>
                    <input type="text" name="Parent" class="form-control mb-3" value="<?php echo $row['Parent']; ?>">
                    <span class="alert-danger"></span>
                </div>
                <div class="form-group col-md-6">
                    <label>Active:</label>
                    <input type="text" name="IsActive" class="form-control mb-3" value="<?php echo $row['IsActive']; ?>">
                    <span class="alert-danger"></span>
                </div>
                <div class="form-group col-md-6">
                    <label>Menu Title:</label>
                    <input type="text" name="MenuTitle" class="form-control mb-3" value="<?php echo $row['MenuTitle']; ?>">
                </div>
            </div>
            <button type="submit" name="sua" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Lưu</button>
            <a href="post.php" class="btn btn-lg btn-warning p-2">Quay lại</a>
        </form>
</main>
<?php
include 'inc/footer.php';
?>