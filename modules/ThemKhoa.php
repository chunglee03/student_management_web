<?php
require_once './connect.php';
global $alert;
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST)) {
        $tenkhoa = filter_var($_POST['TenKhoa']);
        $dienthoai = filter_var($_POST['DienThoai']);
        $sql = "INSERT INTO tblkhoa(TenKhoa, DienThoai)VALUES('$tenkhoa','$dienthoai')";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            $alert = 'Thêm Thành Công';
        } else {
            echo "Thêm Thất Bại";
        }
    }
}


?>


<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <?php
            if (isset($alert)) {
            ?>
                <div class="alert alert-success" role="alert">
                    Thêm Thành Công
                </div>
            <?php
            } else {
                echo "";
            }
            ?>
            <h5 class="card-title">Thêm thông tin khoa</h5>

            <!-- Vertical Form -->
            <form action="" method="post" class="row g-3">
                <div class="col-12">
                    <label for="TenKhoa" class="form-label">Tên Khoa</label>
                    <input type="text" class="form-control" id="TenKhoa" name="TenKhoa" required>
                </div>
                <div class="col-12">
                    <label for="DienThoai" class="form-label">Số Điện Thoại</label>
                    <input type="text" class="form-control" id="DienThoai" name="DienThoai" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Xác Nhận</button>
                    <button type="reset" class="btn btn-secondary">Xoá hết</button>
                    <a href="index.php?modules=Khoa" type="reset" class="btn btn-success">Trở Về</a>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>
</div>
