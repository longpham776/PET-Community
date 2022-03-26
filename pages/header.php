<?php
if(!isset($_SESSION)) session_start();
if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=[];
?>
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
            PET
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="nhannuoi.html">Nhận Nuôi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ungho.html">Ủng Hộ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.html">Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Liên Hệ</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>
                <a class="nav-icon d-none d-lg-inline" href="nhannuoi.php">
                    <i class="fa fa-fw fa-search text-dark mr-2"></i>
                </a>
                <a class="nav-icon position-relative text-decoration-none" href="cart.html">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"><?php echo sizeof($_SESSION['giohang']); ?></span>
                </a>
                <?php
                if(!isset($_SESSION['user'])){
                    ?>
                    <a class="nav-icon position-relative text-decoration-none" href="./login.html">
                    <i class="fa fa-fw fa-user text-dark mr-3"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                    </a>
                    <?php
                }
                else if(isset($_SESSION['user'])){
                    ?>
                    Hello, <a href="hoadon.php" title="Xem hóa đơn" style="text-decoration:none;"><?php if(isset($_SESSION['user'])){foreach($_SESSION['user'] as $a){echo $a->username;}} ?></a>
                    | <a href="logout.php" title="Sign Out" style="text-decoration:none;">Sign Out</a>
                    <?php
                }
                ?>
            </div>
        </div>

    </div>
</nav>