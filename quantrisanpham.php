<?php
include_once '../admin/header-admin.php';

// Đường dẫn thư mục chứa ảnh (cập nhật cho đúng với bạn)
$imageFolder = '../../image/';

// XÓA
if (isset($_GET['delete'])) {
    $maSach = intval($_GET['delete']); 
    
    if ($maSach > 0) {
      
        $sqlGetImage = "SELECT HinhAnh FROM sach WHERE MaSach = $maSach";
        $resImage = mysqli_query($conn, $sqlGetImage);
        if ($resImage && mysqli_num_rows($resImage) > 0) {
            $row = mysqli_fetch_assoc($resImage);
            $imageName = $row['HinhAnh'];
            $imagePath = $imageFolder . basename($imageName);
            if (file_exists($imagePath)) {
                unlink($imagePath); 
            }
        }
        
       
        $sqlDelete = "DELETE FROM sach WHERE MaSach = $maSach";
        if (mysqli_query($conn, $sqlDelete)) {
          
            header("Location: quantrisanpham.php");
            exit();
        } else {
            echo "Lỗi khi xóa sách: " . mysqli_error($conn);
        }
    }
}

// LỌC
$filterTrangThai = isset($_GET['trangthai']) ? $_GET['trangthai'] : '';
$searchTen = isset($_GET['search']) ? trim($_GET['search']) : '';

$where = [];

if ($filterTrangThai === '0' || $filterTrangThai === '1' || $filterTrangThai === '2') {
    $filterTrangThaiInt = intval($filterTrangThai);
    $where[] = "TrangThai = $filterTrangThaiInt";
}

if ($searchTen !== '') {
    $searchTenEsc = mysqli_real_escape_string($conn, $searchTen);
    $where[] = "TenSach LIKE '%$searchTenEsc%'";
}

$sql = "SELECT * FROM sach";
if (count($where) > 0) {
    $sql .= " WHERE " . implode(" AND ", $where);
}

$result = mysqli_query($conn, $sql);
if ($result === false) {
    die('Lỗi câu truy vấn: ' . mysqli_error($conn));
}


?>

<div class="main-content">
    <h3>SẢN PHẨM</h3>
    <a href="../addsach.html"><button class="btn btn-default">THÊM SẢN PHẨM</button></a>

    <form method="GET" style="margin: 15px 0;">
        <input type="text" name="search" placeholder="Tìm theo tên sách..." value="<?php echo $searchTen; ?>">
        <select name="trangthai">
            <option value="">-- Lọc trạng thái --</option>
            <option value="1" <?php if ($filterTrangThai === '1') echo 'selected'; ?>>Còn hàng</option>
            <option value="0" <?php if ($filterTrangThai === '0') echo 'selected'; ?>>Hết hàng</option>
            <option value="2" <?php if ($filterTrangThai === '2') echo 'selected'; ?>>Ngừng kinh doanh</option>
        </select>
        <button type="submit" class="btn btn-primary">Lọc & Tìm</button>
        <a href="quantrisanpham.php" class="btn btn-default">Xóa lọc</a>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>mã</th>
                    <th>tên</th>
                    <th>loại</th>
                    <th>tác giả</th>
                    <th>Nhà cung cấp</th>
                    <th>NXB</th>
                    <th>năm xuất bản</th>
                    <th>giá nhập</th>
                    <th>giá bán</th>
                    <th>giá ưu đãi</th>
                    <th>số lượng</th>
                    <th>ngày cập nhật</th>
                    <th>định dạng</th>
                    <th>số trang</th>
                    <th>ngôn ngữ</th>
                    <th>hình ảnh</th>
                    <th>tóm tắt nội dung</th>
                    <th>trạng thái</th>
                    <th colspan="2">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['MaSach']; ?></td>
                            <td><?php echo $row['TenSach']; ?></td>
                            <td>
                                <?php
                                switch ($row['MaLoai']) {
                                    case 1:
                                        echo 'Light Novel';
                                        break;
                                    case 2:
                                        echo 'Manga';
                                        break;
                                    case 3:
                                        echo 'Ngôn tình/Học đường';
                                        break;
                                    case 4:
                                        echo 'Kinh dị';
                                        break;
                                    case 5:
                                        echo 'Truyện thiếu nhi';
                                        break;
                                    case 6:
                                        echo 'Phiêu lưu/Kỳ ảo';
                                        break;
                                    default:
                                        echo 'Không rõ';
                                        break;
                                }
                                ?>
                            </td>
                            <td><?php echo $row['TacGia']; ?></td>
                            <td><?php echo $row['NhaCungCap']; ?></td>
                            <td><?php echo $row['NhaXuatBan']; ?></td>
                            <td><?php echo $row['NamXuatBan']; ?></td>
                            <td><?php echo number_format($row['GiaNhap']) . 'đ'; ?></td>
                            <td><?php echo number_format($row['GiaBan']) . 'đ'; ?></td>
                            <td><?php echo ($row['GiaUuDai'] !== null && $row['GiaUuDai'] != 0) ? number_format($row['GiaUuDai']) . 'đ' : ''; ?></td>
                            <td><?php echo $row['SoLuong']; ?></td>
                            <td><?php echo $row['NgayCapNhat']; ?></td>
                            <td><?php echo $row['DinhDang']; ?></td>
                            <td><?php echo $row['SoTrang']; ?></td>
                            <td><?php echo $row['NgonNgu']; ?></td>
                            <td><img src="<?php echo '../../image/' . basename($row['HinhAnh']); ?>" style="max-width:50px;"></td>
                              <td class="summary-cell" title="<?php echo $row['MoTa']; ?>"><?php echo $row['MoTa']; ?></td>
                            <td>
                                <?php
                                switch ($row['TrangThai']) {
                                    case 0:
                                        echo 'Hết hàng';
                                        break;
                                    case 1:
                                        echo 'Còn hàng';
                                        break;
                                    case 2:
                                        echo 'Ngừng kinh doanh';
                                        break;
                                    default:
                                        echo 'Không rõ';
                                        break;
                                }
                                ?>
                            </td>
                            <td><a href="updatesanpham.php?MaSach=<?php echo $row['MaSach']; ?>" class="btn btn-info btn-xs">Sửa</a></td>
                            <td><a href="javascript:void(0);" onclick="confirmDelete('<?php echo $row['MaSach']; ?>')" class="btn btn-danger btn-xs">Xóa</a></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="19">Không có sản phẩm phù hợp.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function confirmDelete(maSach) {
    if (confirm("Bạn có chắc chắn muốn xóa sách này không?")) {
        window.location.href = "quantrisanpham.php?delete=" + maSach;
    }
}
</script>

<?php include_once 'footer-admin.php'; ?>
