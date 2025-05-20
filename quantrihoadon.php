<?php
include_once 'header-admin.php';
require_once 'connect.php';

$sql = "SELECT * FROM hoa_don";
$result = mysqli_query($conn, $sql);

?>
        <div class="main-content">
            <h3>HÓA ĐƠN</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>mã hóa đơn</th>
                            <th>ngày lập</th>
                            <th>họ tên người nhận</th>
                            <th>địa chỉ giao hàng</th>
                            <th>SDT giao hàng</th>
                            <th>mã khách hàng</th>
                            <th>mã ptvc</th>
                            <th>mã pttt</th>
                            <th>trạng thái</th>
                            <th colspan="2">hành động</th>
                        </tr>   
                    </thead>
                    <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
         <tr>
        <td><?= $row['MaHD'] ?></td>
        <td><?= $row['NgayLap'] ?></td>
        <td><?= $row['HoTenNguoiNhan'] ?></td>
        <td><?= $row['DiaChiGiaoHang'] ?></td>
        <td><?= $row['SDTGiaoHang'] ?></td>
        <td><?= $row['MaKH'] ?></td>
        <td><?= $row['MaPTVC'] ?></td>
        <td><?= $row['MaPTTT'] ?></td>
        <td><?= $row['TrangThai'] ?></td>
     
           <td>
             <a href="suahoadon.php?id=<?= $row['MaKH'] ?>" class="btn btn-info btn-xs">Sửa</a>
            

        
    <a href="xoahoadon.php?mahd=<?= $row['MaHD'] ?>" 
    onclick="return confirm('Bạn có chắc chắn muốn xóa hóa đơn này?')" 
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
