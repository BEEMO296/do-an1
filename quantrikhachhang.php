<?php
include_once 'header-admin.php';
?>

            <div class="main-content">
                <h3>KHÁCH HÀNG</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                    <?php
                    $sql = "SELECT * FROM khach_hang";
                    $result = mysqli_query($conn, $sql);?>


                        <thead>
                            <tr>
                                <th>mã khách</th>
                                <th>tên khách</th>
                                <th>email</th>
                                <th>tên đăng nhập</th>
                                <th>mật khẩu</th>
                                <th>điện thoại</th>
                                <th>ngày sinh</th>
                                <th>giới tính</th>
                                <th>ngày tạo</th>
                                <th>trạng thái</th>
                                <th colspan="2">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
         <tr>
        <td><?= $row['MaKH'] ?></td>
        <td><?= $row['HoTen'] ?></td>
        <td><?= $row['Email'] ?></td>
        <td><?= $row['TenDN'] ?></td>
        <td><?= $row['MatKhau'] ?></td>
        <td><?= $row['DienThoai'] ?></td>
        <td><?= date("d/m/Y", strtotime($row['NgaySinh'])) ?></td>

        <td>
            <?php
            switch ($row['GioiTinh']) {
                case 1:
                    echo "Nam";
                    break;
                case 2:
                    echo "Khác";
                    break;
                case 0:
                    echo "Nữ";
                    break;
                default:
                    echo "Không rõ";
            }
            ?>
        </td>

        <td>
            <?= isset($row['NgayTao']) ? date("d/m/Y", strtotime($row['NgayTao'])) : '' ?>
        </td>

        <td>
            <?php
            switch ($row['TrangThai']) {
                case 1:
                    echo "Hoạt động";
                    break;
                case 0:
                    echo "Khóa";
                    break;
                default:
                    echo "Không xác định";
            }
            ?>
        </td>
 
           <td>
             <a href="updatetrangthai.php?id=<?= $row['MaKH'] ?>" class="btn btn-info btn-xs">Sửa</a>
            </td>

        <td>
    <a href="xoakhachhang.php?makh=<?= $row['MaKH'] ?>" 
    onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này?')" 
    class="btn btn-danger btn-xs">Xóa</a>
</td>

    </tr>
        <?php endwhile; ?>
        </tbody>

                    </table>
                </div>
            </div>



            <?php
   include_once 'footer-admin.php';
   ?>

   