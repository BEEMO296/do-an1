<?php
include_once 'header-admin.php';
require_once 'connect.php';

$filterTrangThai = '';

if (isset($_GET['filterTrangThai'])) {
    $filterTrangThai = $_GET['filterTrangThai'];
}

$sql = "SELECT * FROM hoa_don WHERE 1";

if ($filterTrangThai === '0' || $filterTrangThai === '1' || $filterTrangThai === '2') {
    $sql .= " AND TrangThai = " . intval($filterTrangThai);
}

$result = mysqli_query($conn, $sql);
?>

<div class="main-content">
    <h3>HÓA ĐƠN</h3>

    <form method="get" action="" class="form-inline" style="margin-bottom: 15px;">
        <label for="filterTrangThai">Lọc trạng thái:</label>
        <select name="filterTrangThai" id="filterTrangThai" class="form-control" style="margin: 0 10px;">
            <option value="" <?= ($filterTrangThai === '') ? 'selected' : '' ?>>Tất cả</option>
            <option value="0" <?= ($filterTrangThai === '0') ? 'selected' : '' ?>>Hủy</option>
            <option value="1" <?= ($filterTrangThai === '1') ? 'selected' : '' ?>>Đang giao</option>
            <option value="2" <?= ($filterTrangThai === '2') ? 'selected' : '' ?>>Giao thành công</option>
        </select>
        <button type="submit" class="btn btn-primary" style="margin-left: 10px;">Lọc</button>
        <a href="?" class="btn btn-default" style="margin-left: 10px;">Xóa lọc</a>
    </form>

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
                        <td>
                            <?php
                            switch ($row['MaPTVC']) {
                                case 1:
                                    echo "Giao hàng tiêu chuẩn";
                                    break;
                                case 2:
                                    echo "Giao hàng nhanh";
                                    break;
                                case 3:
                                    echo "Giao hàng siêu tốc";
                                    break;
                                case 4:
                                    echo "Nhận tại cửa hàng";
                                    break;
                                default:
                                    echo "Không xác định";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            switch ($row['MaPTTT']) {
                                case 1:
                                    echo "COD";
                                    break;
                                case 2:
                                    echo "Chuyển khoản";
                                    break;
                                case 3:
                                    echo "Ví điện tử";
                                    break;
                                case 4:
                                    echo "Thẻ ngân hàng";
                                    break;
                                default:
                                    echo "Không xác định";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            switch ($row['TrangThai']) {
                                case 0:
                                    echo "Hủy";
                                    break;
                                case 1:
                                    echo "Đang giao";
                                    break;
                                case 2:
                                    echo "Giao thành công";
                                    break;
                                default:
                                    echo "Không xác định";
                            }
                            ?>
                        </td>
                        <td>
                            <a href="suahoadon.php?id=<?= $row['MaHD'] ?>" class="btn btn-info btn-xs">Sửa</a>
                        </td>
                        <td>
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

<?php include_once 'footer-admin.php'; ?>
