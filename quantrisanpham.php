<?php
include_once '../admin/header-admin.php';


if (isset($_GET['delete'])) {
    $maSach = $_GET['delete'];


    $sqlGetImage = "SELECT HinhAnh FROM sach WHERE MaSach = ?";
    $stmtGetImage = $conn->prepare($sqlGetImage);
    $stmtGetImage->bind_param("s", $maSach);
    $stmtGetImage->execute();
    $resultImage = $stmtGetImage->get_result();
    
    if ($resultImage->num_rows > 0) {
        $row = $resultImage->fetch_assoc();
        $imagePath = $row['HinhAnh'];  // Đường dẫn đến ảnh cần xóa

        // Kiểm tra và xóa ảnh nếu tồn tại
        if (file_exists($imagePath)) {
            unlink($imagePath);  
        }
    }


    $sqlDelete = "DELETE FROM sach WHERE MaSach = ?";
    $stmtDelete = $conn->prepare($sqlDelete);
    $stmtDelete->bind_param("s", $maSach);  
    if ($stmtDelete->execute()) {
        echo "Sách đã được xóa thành công!";
        header("Location: quantrisanpham.php");  
        exit();
    } else {
        echo "Lỗi khi xóa sách: " . $stmtDelete->error;
    }

    $stmtDelete->close();
    $stmtGetImage->close();
}


$sql = "SELECT * FROM sach";
$result = mysqli_query($conn, $sql);
?>

<div class="main-content">
    <h3>SẢN PHẨM</h3>
    <a href="../addsach.html"><button class="btn btn-default">THÊM SẢN PHẨM</button></a>
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
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['MaSach']; ?></td>
                        <td><?php echo $row['TenSach']; ?></td>
                        <td> <?php
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
                 ?></td>



                        <td><?php echo $row['TacGia']; ?></td>
                   
                        <td><?php echo $row['NhaCungCap']; ?></td>
                        <td><?php echo $row['NhaXuatBan']; ?></td>
                        <td><?php echo $row['NamXuatBan']; ?></td>
                        <td> <?php echo number_format($row['GiaNhap']) . 'đ'; ?></td>
                        <td> <?php echo number_format($row['GiaBan']) . 'đ'; ?></td>
                        <td> <?php 
                         echo ($row['GiaUuDai'] !== null && $row['GiaUuDai'] != 0)
                        ? number_format($row['GiaUuDai']) . 'đ'  : '';  ?> </td>
                        <td><?php echo $row['SoLuong']; ?></td>
                        <td><?php echo $row['NgayCapNhat']; ?></td>
                        <td><?php echo $row['DinhDang']; ?></td>
                        <td><?php echo $row['SoTrang']; ?></td>
                        <td><?php echo $row['NgonNgu']; ?></td>
                        <td><img src="<?php echo '../../image/' . basename($row['HinhAnh']); ?>"></td>
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
                      }?>
                    </td>

                        
                        <td><a href="updatesanpham.php?MaSach=<?php echo $row['MaSach']; ?>" class="btn btn-info btn-xs">Sửa</a></td>
                        <td>
                     
                            <a href="javascript:void(0);" onclick="confirmDelete('<?php echo $row['MaSach']; ?>')" class="btn btn-danger btn-xs">Xóa</a>
                        </td>
                    </tr>
                <?php } ?>
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

<?php
 include_once 'footer-admin.php';
?>
