<?php
session_start();
require_once 'admin/connect.php';
include 'header.php';
?>

<div class="container product-list">
    <h2 class="category-title">Giỏ hàng của bạn</h2>

    <?php
    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
        echo "<p>Giỏ hàng đang trống.</p>";
    } else {
        $ids = array_keys($_SESSION['cart']);
        $placeholders = implode(',', array_fill(0, count($ids), '?'));

        $stmt = $conn->prepare("SELECT MaSach, TenSach, GiaBan, GiaUuDai, HinhAnh FROM sach WHERE MaSach IN ($placeholders)");
        $types = str_repeat('s', count($ids));
        $stmt->bind_param($types, ...$ids);
        $stmt->execute();
        $result = $stmt->get_result();

        $tong = 0;
        echo "<table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sách</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>";

        while ($row = $result->fetch_assoc()) {
            $id = $row['MaSach'];
            $qty = $_SESSION['cart'][$id];
            $gia = $row['GiaUuDai'] && $row['GiaUuDai'] < $row['GiaBan'] ? $row['GiaUuDai'] : $row['GiaBan'];
            $thanhTien = $gia * $qty;
            $tong += $thanhTien;

            echo "<tr>
                    <td style='width: 100px'><img src='{$row['HinhAnh']}' class='img-fluid' style='max-height: 100px;'></td>
                    <td>{$row['TenSach']}</td>
                    <td>" . number_format($gia, 0, ',', '.') . "₫</td>
                    <td>$qty</td>
                    <td>" . number_format($thanhTien, 0, ',', '.') . "₫</td>
                  </tr>";
        }

        echo "<tr>
                <td colspan='4' style='text-align:right'><strong>Tổng cộng:</strong></td>
                <td><strong>" . number_format($tong, 0, ',', '.') . "₫</strong></td>
              </tr>";

        echo "</tbody></table>";
        echo "<div style='text-align: right; margin-top: 20px;'>
        <a href='admin/thanhtoan.php' class='btn btn-buy'>Thanh toán</a>
      </div>";
    }
    ?>

</div>

<?php include 'footer.php'; ?>