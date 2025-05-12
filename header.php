<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Fahasa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        .header-banner {
            background-color:rgb(198, 40, 40);
            color: white;
            padding: 10px 0;
        }

        .header-banner img {
            height: 50px;
            margin-right: 10px;
        }

        .navbar-brand img {
            height: 40px;
        }

        .search-bar input {
            width: 100%;
        }

        .account-wrapper:hover .account-popup,
        .notify-wrapper:hover .notify-popup {
            display: block !important;
        }

        .account-popup, .notify-popup {
            transition: all 0.2s ease;
        }
        .user-info-wrapper {
            position: relative;
        }

        .user-info-popup {
            position: absolute;
            background-color: white;
            border: 1px solid #ddd;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 10px;
            top: 110%;
            left: 0;
            width: 200px;
            z-index: 1000;
            display: none;
            border-radius: 5px;
        }

        .user-info-wrapper:hover .user-info-popup {
            display: block;
        }
        .btn-danger:hover {
            background-color: #b30014; 
            border-color: #b30014; 
        }

        .btn-outline-danger:hover {
            background-color: #f8d7da; 
            border-color: #d70018;
        }
        .btn-danger, .btn-outline-danger {
            font-size: 15px;
            padding: 7px;
            border-radius: 10px;
        }

        .btn-danger:hover {
            background-color: #b30014;
            border-color: #b30014;
        }

        .btn-outline-danger:hover {
            background-color: #f8d7da;
            border-color: #d70018;
        }

    </style>
</head>
<body>

<div class="header-banner" style="display: flex; justify-content: center; align-items: center; height: 60px;">
    <img src="images/banner-lich-su.png" alt="TỦ SÁCH LỊCH SỬ" class="img-fluid" style="width: 1263px; height: 60px; object-fit: cover;">
</div>

<nav class="navbar navbar-light bg-white shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="index.php" class="navbar-brand">
            <img src="images/fahasa-logo.png" alt="Fahasa">
        </a>

        <div class="d-flex align-items-center flex-grow-1 mx-3 search-bar">
            <button class="btn btn-outline-secondary me-2">
                <i class="bi bi-grid-fill"></i>
            </button>
            <input class="form-control" type="search" placeholder="Tìm kiếm sách...">
            <button class="btn btn-danger ms-2">
                <i class="bi bi-search text-white"></i>
            </button>
        </div>

        <div class="d-flex align-items-center">
            <div class="notify-wrapper position-relative me-3">
                <a href="#" class="text-dark text-decoration-none">
                    <i class="bi bi-bell"></i> <small>Thông báo</small>
                </a>
                <div class="notify-popup position-absolute bg-white border shadow-sm p-3 rounded d-none" id="notifyPopup" style="top: 120%; right: 0; z-index: 1000; width: 300px;">
                    <h6 class="mb-2">Thông báo mới</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="bi bi-dot"></i> Ưu đãi sách tháng 4!</li>
                        <li class="mb-2"><i class="bi bi-dot"></i> Đơn hàng #1234 đang giao</li>
                        <li><i class="bi bi-dot"></i> Tặng mã giảm giá 50K</li>
                    </ul>
                    <a href="#" class="btn btn-link p-0 mt-2">Xem tất cả</a>
                </div>
            </div>

            <a href="giohang.php" class="text-dark text-decoration-none me-3">
                <i class="bi bi-cart3"></i> <small>Giỏ hàng</small>
            </a>

            <?php if (isset($_SESSION['user'])): ?>
                <div class="user-info-wrapper position-relative me-3">
                    <span class="me-3"><i class="bi bi-person-circle"></i> <?= $_SESSION['user']['name']; ?></span>
                    <div class="user-info-popup">
                        <p><strong>Email:</strong> <?= $_SESSION['user']['email']; ?></p>
                        <p><strong>Số điện thoại:</strong> <?= $_SESSION['user']['phone']; ?></p>
                        <a href="profile.php" class="btn btn-outline-primary btn-sm w-100">Xem hồ sơ</a>
                    </div>
                </div>
                <a href="logout.php" class="btn btn-outline-secondary btn-sm">Đăng xuất</a>
            <?php else: ?>
                <div class="account-wrapper position-relative me-3">
                    <a href="login.php" class="text-dark text-decoration-none" id="accountToggle">
                        <i class="bi bi-person"></i> <small>Tài khoản</small>
                    </a>
                    <div class="account-popup position-absolute bg-white border shadow-sm p-3 rounded d-none" id="accountPopup" style="top: 120%; right: 0; z-index: 1000; width: 250px;">
                        <a href="login.php" class="btn btn-danger btn-sm w-100 mb-2">Đăng nhập</a>
                        <a href="register.php" class="btn btn-outline-danger btn-sm w-100">Đăng ký</a>
                    </div>
                </div>
            <?php endif; ?>

            <div class="dropdown ms-2">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    🇻🇳
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">🇻🇳 Tiếng Việt</a></li>
                    <li><a class="dropdown-item" href="#">🇬🇧 English</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const accountWrapper = document.querySelector(".account-wrapper");
        const accountPopup = document.getElementById("accountPopup");

        const notifyWrapper = document.querySelector(".notify-wrapper");
        const notifyPopup = document.getElementById("notifyPopup");

        document.addEventListener("click", function (e) {
            if (!accountWrapper.contains(e.target)) {
                accountPopup.classList.add("d-none");
            }
            if (!notifyWrapper.contains(e.target)) {
                notifyPopup.classList.add("d-none");
            }
        });

        accountWrapper.addEventListener("mouseenter", () => {
            accountPopup.classList.remove("d-none");
        });
        accountWrapper.addEventListener("mouseleave", () => {
            accountPopup.classList.add("d-none");
        });

        notifyWrapper.addEventListener("mouseenter", () => {
            notifyPopup.classList.remove("d-none");
        });
        notifyWrapper.addEventListener("mouseleave", () => {
            notifyPopup.classList.add("d-none");
        });
    });
</script>

</body>
</html>
