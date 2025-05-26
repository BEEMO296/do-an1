<?php
include_once 'header-admin.php';
require_once 'connect.php';
$maHD = $_GET['id'];

$sql = "SELECT * FROM hoa_don WHERE MaHD = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $maHD);
$stmt->execute();
$result = $stmt->get_result();

$hoadon = $result->fetch_assoc();

?>

<div class="main-content">
    <div class="container-fluid">
        <h3 class="mb-4">SỬA HÓA ĐƠN</h3>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thông Tin Hóa Đơn</h6>
            </div>
            <div class="card-body">
                <form action="xulysuahoadon.php" method="POST">
                    <input type="hidden" name="MaHD" value="<?= $hoadon['MaHD'] ?>">

                    <div class="mb-3">
                        <label for="NgayLap" class="form-label">Ngày Lập</label>
                        <input type="datetime-local" class="form-control" id="NgayLap" name="NgayLap"
                               value="<?= date('Y-m-d\TH:i:s', strtotime($hoadon['NgayLap'])) ?>" required>
                    </div>

                    

                    <div class="mb-3">
                        <label for="HoTenNguoiNhan" class="form-label">Họ Tên Người Nhận</label>
                        <input type="text" class="form-control" id="HoTenNguoiNhan" name="HoTenNguoiNhan"
                               value="<?= $hoadon['HoTenNguoiNhan'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="DiaChiGiaoHang" class="form-label">Địa Chỉ Giao Hàng</label>
                        <input type="text" class="form-control" id="DiaChiGiaoHang" name="DiaChiGiaoHang"
                               value="<?= $hoadon['DiaChiGiaoHang'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="SDTGiaoHang" class="form-label">SĐT Giao Hàng</label>
                        <input type="text" class="form-control" id="SDTGiaoHang" name="SDTGiaoHang"
                               value="<?= $hoadon['SDTGiaoHang'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="MaKH" class="form-label">Mã Khách Hàng</label>
                        <input type="number" class="form-control" id="MaKH" name="MaKH"
                               value="<?= $hoadon['MaKH'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="MaPTVC" class="form-label">Mã PTVC</label>
                        <input type="number" class="form-control" id="MaPTVC" name="MaPTVC"
                               value="<?= $hoadon['MaPTVC'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="MaPTTT" class="form-label">Mã PTTT</label>
                        <input type="number" class="form-control" id="MaPTTT" name="MaPTTT"
                               value="<?= $hoadon['MaPTTT'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="TrangThai" class="form-label">Trạng Thái</label>
                        <select class="form-select" id="TrangThai" name="TrangThai" required>
                            <option value="0" <?= ($hoadon['TrangThai'] == 0) ? 'selected' : '' ?>>Chờ xử lý</option>
                            <option value="1" <?= ($hoadon['TrangThai'] == 1) ? 'selected' : '' ?>>Đang giao</option>
                            <option value="2" <?= ($hoadon['TrangThai'] == 2) ? 'selected' : '' ?>>Đã giao</option>
                            <option value="3" <?= ($hoadon['TrangThai'] == 3) ? 'selected' : '' ?>>Đã hủy</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                    <a href="quantrihoadon.php" class="btn btn-secondary ms-2">Hủy</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'footer-admin.php';
?>