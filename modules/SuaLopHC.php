<?php
require_once './connect.php';
$sid = $_GET['sid'];
$select = "SELECT * FROM tbllophc WHERE MaLopHC = $sid";

$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);


?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">

            <h5 class="card-title">Sửa Thông Tin Lớp Hành Chính</h5>
            <!-- Vertical Form -->
            <form action="" method="post" class="row g-3">
                <input type="hidden" name="sid" value="<?php echo $sid ?>">
                <div class="col-12">
                    <label for="TenLopHC" class="form-label">Tên Lớp Hành Chính</label>
                    <input type="text" class="form-control" id="TenLopHC" name="TenLopHC" value="<?php echo $row['TenLopHC'] ?>">
                </div>
                <div class="col-12">
    <label for="KhoaVien" class="form-label">Thuộc Khoa</label>
    <div class="col-sm-10">
        <select name="KhoaVien" class="form-select">
            <?php
            $sql = "SELECT * FROM tblkhoa";
            $result = mysqli_query($conn, $sql);

            while ($r = mysqli_fetch_array($result)) {
                // So sánh MaKhoa hiện tại với MaKhoa trong bảng
                $selected = ($r['MaKhoa'] == $row['MaKhoa']) ? "selected" : "";
            ?>
                <option value="<?php echo $r['MaKhoa']; ?>" <?php echo $selected; ?>>
                    <?php echo htmlspecialchars($r['TenKhoa']); ?>
                </option>
            <?php
            }
            ?>
        </select>
    </div>
</div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <button type="reset" class="btn btn-secondary">Xoá hết</button>
                    <a href="index.php?modules=LopHanhChinh" type="reset" class="btn btn-success">Trở Về</a>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>


    <?php
    
    if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
        if (isset($_POST['TenLopHC']) && isset($_POST['KhoaVien']) && isset($_POST['sid'])) {
            $tenlophc = $_POST['TenLopHC'];
            $khoavien = $_POST['KhoaVien'];
            $id = $_POST['sid'];
            $update = "UPDATE tbllophc SET TenLopHC ='$tenlophc', MaKhoa = '$khoavien' WHERE MaLopHC='$id'";
            $resultUpdate = mysqli_query($conn, $update);
            if ($resultUpdate) {
                echo "<h4 class='alert alert-success'>Cập Nhật Thành Công</h4>";
            } else {
                echo "<h4 class='alert alert-error'>Cập Nhật Thất Bại</h4>";
            }
        }
    }

    ?>