<?php
include_once 'header-admin.php';
require_once 'connect.php';


$filterTrangThai = '';
$searchMaKH = '';

if (isset($_GET['filterTrangThai'])) {
    $filterTrangThai = $_GET['filterTrangThai'];
}

if (isset($_GET['searchMaKH'])) {
    $searchMaKH = trim($_GET['searchMaKH']);
}


$sql = "SELECT * FROM khach_hang WHERE 1";


if ($filterTrangThai === '0' || $filterTrangThai === '1') {
    $sql .= " AND TrangThai = " . intval($filterTrangThai);
}


if ($searchMaKH !== '') {

    $sql .= " AND MaKH LIKE '%" . mysqli_real_escape_string($conn, $searchMaKH) . "%'";
}

$result = mysqli_query($conn, $sql);
?>

<div class="main-content">
    <h3>KHÁCH HÀNG</h3>


    <form method="get" action="" class="form-inline" style="margin-bottom: 15px;">
        <label for="filterTrangThai">Lọc trạng thái:</label>
        <select name="filterTrangThai" id="filterTrangThai" class="form-control" style="margin: 0 10px;">
            <option value="" <?= ($filterTrangThai === '') ? 'selected' : '' ?>>Tất cả</option>
            <option value="1" <?= ($filterTrangThai === '1') ? 'selected' : '' ?>>Hoạt động</option>
            <option value="0" <?= ($filterTrangThai === '0') ? 'selected' : '' ?>>Khóa</option>
        </select>

        <label for="searchMaKH">Tìm mã khách:</label>
        <input type="text" name="searchMaKH" id="searchMaKH" value="<?= htmlspecialchars($searchMaKH) ?>" class="form-control" placeholder="Nhập mã khách">

        <button type="submit" class="btn btn-primary" style="margin-left: 10px;">Lọc & Tìm</button>
        <a href="?" class="btn btn-default" style="margin-left: 10px;">Xóa lọc</a>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered">
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

<?php include_once 'footer-admin.php'; ?>
