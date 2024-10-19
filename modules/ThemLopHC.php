<?php
require_once './connect.php';
global $alert;
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST)) {
        $tenlophc = filter_var($_POST['TenLopHC']);
        $khoa = filter_var($_POST['MaKhoa']);
        $sql = "INSERT INTO tbllophc(TenLopHC, MaKhoa)VALUES('$tenlophc','$khoa')";

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
            <h5 class="card-title">Thêm thông tin lớp hành chính</h5>

            <!-- Vertical Form -->
            <form action="" method="post" class="row g-3">
                <div class="col-12">
                    <label for="TenLopHC" class="form-label">Tên Lớp Hành Chính</label>
                    <input type="text" class="form-control" id="TenLopHC" name="TenLopHC" required>
                </div>
                <div class="col-12">
                    <label for="MaKhoa" class="form-label">Khoa</label>
                    <div class="col-sm-10">
                        <select name="MaKhoa" class="form-select">
                            <?php
                            require_once './connect.php';
                            $sql = "SELECT * FROM tblkhoa";
                            $result = mysqli_query($conn, $sql);

                            while ($r =  mysqli_fetch_array($result)) {
                            ?>
                                <option value="<?php echo $r['MaKhoa'] ?>"><?php echo $r['TenKhoa'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Xác Nhận</button>
                    <button type="reset" class="btn btn-secondary">Xoá hết</button>
                    <a href="index.php?modules=LopHanhChinh" type="reset" class="btn btn-success">Trở Về</a>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>
</div>
