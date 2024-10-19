<?php
require_once './connect.php';
$sid = $_GET['sid'];
$select = "SELECT * FROM tblkhoa WHERE MaKhoa = $sid";

$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);


?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">

            <h5 class="card-title">Sửa Thông Tin Khoa</h5>
            <!-- Vertical Form -->
            <form action="" method="post" class="row g-3">
                <input type="hidden" name="sid" value="<?php echo $sid ?>">
                <div class="col-12">
                    <label for="TenKhoa" class="form-label">Tên Khoa</label>
                    <input type="text" class="form-control" id="TenKhoa" name="TenKhoa" value="<?php echo $row['TenKhoa'] ?>">
                </div>
                <div class="col-12">
                    <label for="DienThoai" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="DienThoai" name="DienThoai" value="<?php echo $row['DienThoai'] ?>">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <button type="reset" class="btn btn-secondary">Xoá hết</button>
                    <a href="index.php?modules=Khoa" type="reset" class="btn btn-success">Trở Về</a>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>


    <?php
    
    if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
        if (isset($_POST['TenKhoa']) && isset($_POST['DienThoai']) && isset($_POST['sid'])) {
            $tenkhoa = $_POST['TenKhoa'];
            $dienthoai = $_POST['DienThoai'];
            $id = $_POST['sid'];
            $update = "UPDATE tblkhoa SET TenKhoa ='$tenkhoa', DienThoai = '$dienthoai' WHERE MaKhoa='$id'";
            $resultUpdate = mysqli_query($conn, $update);
            if ($resultUpdate) {
                echo "<h4 class='alert alert-success'>Cập Nhật Thành Công</h4>";
            } else {
                echo "<h4 class='alert alert-error'>Cập Nhật Thất Bại</h4>";
            }
        }
    }

    ?>