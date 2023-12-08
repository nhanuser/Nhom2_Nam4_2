<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include 'connect.php';

$errors = array(); // Initialize the $errors array

if (isset($_POST['add'])) {
    $Title = $_POST["Title"];
    $Contents = $_POST['Contents'];
    $Abstract = $_POST['Abstract'];
    $Author = $_POST['Author'];
    $Link = $_POST["Link"];
    $IsActive = $_POST["IsActive"];
    $PostOrder = $_POST["PostOrder"];
    $MenuID = $_POST["MenuID"];
    $CatID = $_POST["CategoryID"]; // Corrected the variable name
    $Status = $_POST["Status"];

    // Lấy ngày hiện tại
    $DateTime = date('Y-m-d');

    if (isset($_FILES['Images'])) {
        $file_name = $_FILES['Images']['name'];
        $file_tmp = $_FILES['Images']['tmp_name'];
        $file_path = "uploads/" . $file_name;

        // Tải lên tệp vào thư mục tải lên
        move_uploaded_file($file_tmp, $file_path);

        if ($Title != "" && $file_path != "" && $Abstract != "" && $Contents != "" && $Link != "" && $IsActive 
        != "" && $PostOrder != "" && $MenuID != "" && $CatID != "" && $Status != "") {
            $sql = "INSERT INTO post (Title, Abstract, Contents, Images, Link, CreateDate, Author, IsActive, PostOrder, MenuID, CategoryID, Status) VALUES 
            ('$Title', '$Abstract', '$Contents', '$file_path', '$Link', '$DateTime', '$Author' ,'$IsActive', '$PostOrder', '$MenuID', '$CatID', '$Status')"; // Corrected the order of values
            $qr = mysqli_query($conn, $sql);
            if ($qr) {
                echo "<script>window.location.href = 'postmanager.php';</script>";
                exit();
            } else {
                $errors[] = "Có lỗi khi thêm bài viết. Vui lòng thử lại!";
            }
        } else {
            $errors[] = "Vui lòng điền đầy đủ thông tin!";
        }
    }
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h2>Xác nhận thêm bài viết</h2>
    </div>
    <div class="container shadow p-5">
        <div class="row pb-2">
            <h2>Thêm mới bài viết</h2>
        </div>
        <form method="post" enctype="multipart/form-data">
        <?php
            if (!empty($errors)) {
                echo '<div class="alert alert-danger" role="alert">';
                foreach ($errors as $error) {
                    echo $error . "<br/>";
                }
                echo '</div>';
            }
            ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Tiêu đề:</label>
                    <input type="text" name="Title" class="form-control mb-3">
                    <span class="alert-danger"></span>
                </div>
                <div class="form-group col-md-6">
                    <label>Hình ảnh:</label>
                    <input type="file" name="Images" class="form-control mb-3" onchange="previewImage(event)">
                    <img id="preview" src="" alt="Hình ảnh bài viết" style="display: none; width: 200px;">
                </div>

                <div class="form-group col-md-6">
                    <label>Mô tả:</label>
                    <input type="text" name="Abstract" class="form-control mb-3">
                    <span class="alert-danger"></span>
                </div>
                <div class="form-group col-md-6">
                    <label>Đường dẫn:</label>
                    <input type="text" name="Link" class="form-control mb-3">
                </div>
                <div class="form-group col-md-6">
                    <label>Tác giả:</label>
                    <input type="text" name="Author" class="form-control mb-3">
                </div>
                <div class="form-group col-md-6">
                    <label>Ngày đăng bài:</label>
                    <?php 
                        $DateTime = date('Y-m-d');
                    ?>
                    <input type="date" name="DateTime" class="form-control mb-3" value="<?php echo $DateTime; ?>">
                    <span class="alert-danger"></span>
                </div>
                <div class="form-group col-md-6">
                    <label>PostOrder:</label>
                    <input type="text" name="PostOrder" class="form-control mb-3">
                </div>
                <div class="form-group col-md-6">
                    <label>IsActive:</label>
                    <input type="text" name="IsActive" class="form-control mb-3">
                </div>
                <div class="form-group col-md-6">
                    <label>Menu:</label>
                    <select class="form-control mb-3" name="MenuID">
                        <option>-- Lựa chọn Menu --</option>
                        <?php
                        $sql_menu = "SELECT * FROM menu"; // Truy vấn danh sách các thể loại từ CSDL
                        $result_menu = mysqli_query($conn, $sql_menu);
                        while ($menu = mysqli_fetch_array($result_menu)) {
                            $selected = ($menu['MenuID'] == $_POST['MenuID']) ? 'selected' : ''; // Corrected from $row['MenuID']
                            echo '<option value="' . $menu['MenuID'] . '" ' . $selected . '>' . $menu['MenuName'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Thể loại:</label>
                    <input type="text" name="CategoryID" class="form-control mb-3">
                </div>
                <div class="form-group col-md-6">
                    <label>Status:</label>
                    <input type="text" name="Status" class="form-control mb-3">
                </div>
                <div class="form-group col-md-6">
                    <label>Nội dung bài viết:</label>
                    <textarea name="Contents" class="form-control mb-3" id="your_summernote"></textarea>
                </div>
            </div>
            <button type="submit" name="add" class="btn btn-lg btn-primary p-2"><i class="bi bi-file-plus-fill"></i>Lưu</button>
            <a href="postmanager.php" class="btn btn-lg btn-warning p-2">Quay lại</a>
        </form>
    </div>
</main>

<?php
include 'inc/footer.php';
?>
<script>
    function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = "block";
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = "";
            preview.style.display = "none";
        }
    }
</script>