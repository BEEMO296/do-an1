<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/quantri.css">
</head>

<body>

    <div class="container-fluid content">
        <div class="logout">
            <img src="https://cdn-icons-png.flaticon.com/512/126/126467.png" alt="logout" width="20" height="20">
            <a href="login.php">  <span>Đăng xuất</span></a>
        </div>

        <div class="sidebar">
            <div class="sidebar-logo">
              <img src="../image/logo.png" alt="Logo" class="img-responsive">
            </div>
            <ul class="nav nav-pills nav-stacked">
            <li><a href="quantrisanpham.php">Sản phẩm</a></li>
                <li><a href="quantrikhachhang.php">Khách hàng</a></li>
                <li><a href="quantrihoadon.php">Hóa đơn</a></li><li>
            </ul>
          </div>

            <div class="main-content">
                <h3>SẢN PHẨM</h3>
                <button class="btn btn-default">THÊM SẢN PHẨM</button>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>mã</th>
                                <th>tên</th>
                                <th>loại</th>
                                <th>tác giả</th>
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
                            <tr>
                                <td>001</td>
                                <td>Book A</td>
                                <td>Văn học</td>
                                <td>Nguyễn A</td>
                                <td>NXB A</td>
                                <td>2024</td>
                                <td>50k</td>
                                <td>70k</td>
                                <td>60k</td>
                                <td>20</td>
                                <td>01/01/2025</td>
                                <td>bìa mềm</td>
                                <td>300</td>
                                <td>vi</td>
                                <td><img src="../image/logo.png" ></td>
                                <td class="summary-cell"
                                title="シリーズ最新作『VI』の攻略情報を詰め込んだ公式ガイドブック!

『アーマード・コア』シリーズ最新作『ARMORED CORE VI FIRES OF RUBICON』の攻略情報を詰め込んだ公式ガイドブック。

ミッションの出現条件やルートの分岐条件をまとめた全体フローチャート、バトルログ、コンテナ、アーカイブの位置がわかる全体マップ、ミッションで待ち受ける強敵の攻略法などなど、攻略に欠かせない情報が満載。アリーナ攻略のアドバイス、パーツやエンブレムの入手方法、敵AC・MTの性能といった各種データも掲載しています。

全ミッションのクリアを達成したい人はもちろんのこと、パーツをはじめとするさまざまな収集要素のコンプリートを目指す人に役立つ1冊となっています。

<おもな収録内容>

+ すべてのミッションをクリアするための攻略情報を詳細なマップとともに掲載

+ ガレージの仕組み、ACの各パラメータの役割を掲載

+ 各アクション、武器の属性やスタッガーなど本作ならではのシステムも解説

+ アセンブルで重要となる各パーツの詳細な性能と入手方法を収録

※本書の情報はAPP Ver.22時点の内容を記載しています。以降のアップデート等により情報に差異が発生することがあります。予めご了承ください。">
                                シリーズ最新作『VI』の攻略情報を詰め込んだ公式ガイドブック!

『アーマード・コア』シリーズ最新作『ARMORED CORE VI FIRES OF RUBICON』の攻略情報を詰め込んだ公式ガイドブック。

ミッションの出現条件やルートの分岐条件をまとめた全体フローチャート、バトルログ、コンテナ、アーカイブの位置がわかる全体マップ、ミッションで待ち受ける強敵の攻略法などなど、攻略に欠かせない情報が満載。アリーナ攻略のアドバイス、パーツやエンブレムの入手方法、敵AC・MTの性能といった各種データも掲載しています。

全ミッションのクリアを達成したい人はもちろんのこと、パーツをはじめとするさまざまな収集要素のコンプリートを目指す人に役立つ1冊となっています。

<おもな収録内容>

+ すべてのミッションをクリアするための攻略情報を詳細なマップとともに掲載

+ ガレージの仕組み、ACの各パラメータの役割を掲載

+ 各アクション、武器の属性やスタッガーなど本作ならではのシステムも解説

+ アセンブルで重要となる各パーツの詳細な性能と入手方法を収録

※本書の情報はAPP Ver.22時点の内容を記載しています。以降のアップデート等により情報に差異が発生することがあります。予めご了承ください。
                                   
                                </td>
                                <td>Còn hàng</td>
                                <td><button class="btn btn-info btn-xs">Sửa</button></td>
                                <td><button class="btn btn-danger btn-xs">Xóa</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>