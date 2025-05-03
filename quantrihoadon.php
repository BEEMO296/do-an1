<?php
include_once 'header-admin.php';
?>
        <div class="main-content">
            <h3>HÓA ĐƠN</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>mã hóa đơn</th>
                            <th>ngày lập</th>
                            <th>email</th>
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
                        <td>112</td>
                        <td>24/4/2025</td>
                        <td>hoangtest@gmail.com</td>
                        <td>Hoàng</td>
                        <td>Hà Nội</td>
                        <td>0123456789 </td>
                        <td>456</td>
                        <td>12</td>
                        <td>13</td>
                        <td>giao thành công</td>
                        <td><button class="btn btn-info btn-xs">Sửa</button></td>
                                <td><button class="btn btn-danger btn-xs">Xóa</button></td>
                    </tbody>
                </table>
            </div>
        </div>
   <?php
   include_once 'footer-admin.php';
   ?>