<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh sách thông tin lớp hành chính</h4>
                    <a class="btn btn-success" href="?modules=ThemLopHanhChinh">Thêm Mới</a>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Mã lớp hành chính</th>
                            <th>Tên lớp hành chính</th>
                            <th>Tên khoa</th>
                            <th>Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          require_once './connect.php';
                          $sql = "SELECT * FROM tbllophc hc inner join tblkhoa k on hc.MaKhoa = k.MaKhoa order by hc.MaKhoa";
                          $results = mysqli_query($conn, $sql);

                          while ($r = mysqli_fetch_array($results)) {
                            ?>
                                <tr>
                                <th scope="row"><?php echo $r['MaLopHC'] ?></th>
                                    <td><?php echo $r['TenLopHC'] ?></td>
                                    <td><?php echo $r['TenKhoa'] ?></td>
                                    <td><a class="btn btn-block btn-primary" href="?modules=SuaLopHanhChinh&sid=<?php echo $r['MaLopHC'] ?>">Sửa</a> <a class="btn btn-block btn-danger" href="?modules=XoaLopHanhChinh&sid=<?php echo $r['MaLopHC'] ?>">Xóa</a></td>
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
