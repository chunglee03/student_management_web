<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh sách thông tin khoa</h4>
                    <a class="btn btn-success" href="?modules=ThemKhoa">Thêm Mới</a>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Mã khoa</th>
                            <th>Tên khoa</th>
                            <th>Số điện thoại</th>
                            <th>Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          require_once './connect.php';
                          $sql = "SELECT * FROM tblkhoa";
                          $results = mysqli_query($conn, $sql);

                          while ($r = mysqli_fetch_array($results)) {
                            ?>
                                <tr>
                                <th scope="row"><?php echo $r['MaKhoa'] ?></th>
                                    <td><?php echo $r['TenKhoa'] ?></td>
                                    <td><?php echo $r['DienThoai'] ?></td>
                                    <td><a class="btn btn-block btn-primary" href="?modules=SuaKhoa&sid=<?php echo $r['MaKhoa'] ?>">Sửa</a> <a class="btn btn-block btn-danger" href="?modules=XoaKhoa&sid=<?php echo $r['MaKhoa'] ?>">Xóa</a></td>
                                </tr>
                            <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
