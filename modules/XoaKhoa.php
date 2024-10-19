<?php
require_once './connect.php';
if(isset($_GET)){
    $id = $_GET['sid'];
    
    $sql = "DELETE from tblkhoa Where MaKhoa = '$id'";

    $result = mysqli_query($conn,$sql);
    if($result){
       echo "<h1 class='alert alert-success'>Xóa Thành Công</h1>";
    }
    else {
        echo "Xóa Thất Bại";
    }
}
?>

<a class="btn btn-block btn-success" href="index.php?modules=Khoa">Danh Sách Thông Tin Khoa</a>