<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include 'connect.php';

if (isset($_POST['add'])) {
    $MenuName = $_POST["MenuName"];
    $Orders = $_POST["Orders"];
    $Parent = $_POST["Parent"];
    $IsActive = $_POST["IsActive"];
    $MenuTitle = $_POST["MenuTitle"];

    if ($MenuName != "" && $Orders != "" && $Parent != "" && $IsActive != "" && $MenuTitle != "") {
        // Sửa câu SQL INSERT INTO để chính xác về cú pháp và thứ tự các trường
        $sql = "INSERT INTO menu (MenuName, Orders, Parent, IsActive, MenuTitle) VALUES ('$MenuName', '$Orders', '$Parent', '$IsActive', '$MenuTitle')";
        $qr = mysqli_query($conn, $sql);

        // Kiểm tra và thông báo lỗi nếu có
        if (!$qr) {
            die("Lỗi khi thêm dữ liệu: " . mysqli_error($conn));
        }

        echo "<script>window.location.href = 'index-menu.php';</script>";
        exit();
    }
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h2>Xác nhận thêm menu</h2>
    </div>
    <div class="container shadow p-5">
        <div class="row pb-2">
            <h2>Thêm mới menu</h2>
        </div>
        <form method="post" enctype="multipart/form-data">
            <div asp-validation-summary="All"></div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Tên Menu:</label>
                    <input type="text" name="MenuName" class="form-control mb-3" value="">
                    <span class="alert-danger"></span>
                </div>
                <div class="form-group col-md-6">
                    <label>Orders:</label>
                    <input type="text" name="Orders" class="form-control mb-3" value="">
                    <span class="alert-danger"></span>
                </div>
                <div class="form-group col-md-6">
                    <label>Parent:</label>
                    <input type="text" name="Parent" class="form-control mb-3" value="">
                    <span class="alert-danger"></span>
                </div>
                <div class="form-group col-md-6">
                    <label>Active:</label>
                    <input type="text" name="IsActive" class="form-control mb-3" value="">
                    <span class="alert-danger"></span>
                </div>
                <div class="form-group col-md-6">
                    <label>Menu Title:</label>
                    <input type="text" name="MenuTitle" class="form-control mb-3" value="">
                </div>
            </div>
            <button type="submit" name="add" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Lưu</button>
            <a href="index-menu.php" class="btn btn-lg btn-warning p-2">Quay lại</a>
        </form>
    </div>
</main>

<?php
include 'inc/footer.php';
?>
