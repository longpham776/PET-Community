<?php 
include_once './config.php';
include './pdo.php';
$item_per_page=isset($_GET['per_page'])?$_GET['per_page']:8;
$current_page=isset($_GET['page'])?$_GET['page']:1;
$offset=($current_page-1)*$item_per_page;
$sql="select * from sanpham where xoa=0 order by masp asc limit ".$item_per_page." offset ".$offset." ";//2 
$objStatament = $objPDO->prepare($sql);
$objStatament->execute();
$data = $objStatament->fetchAll(PDO::FETCH_OBJ);
$n = $objStatament->rowCount();
$totalpage=ceil($n/$item_per_page);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PET Shop - Product Listing Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/PET.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <!-- Start Top Nav -->
    <?php
        include "./pages/nav.php"
    ?>
    <!-- Close Top Nav -->


    <!-- Header -->
    <?php
        include "./pages/header.php"
    ?>
    <!-- Close Header -->

    <!-- Modal -->
    <?php
        include "./pages/modal.php"
    ?>



    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Danh mục</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Loại thú cưng
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Chó</a></li>
                            <li><a class="text-decoration-none" href="#">Mèo</a></li>
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Sale
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Phụ kiện, đồ dùng cho chó</a></li>
                            <li><a class="text-decoration-none" href="#">Phụ kiện, đồ dùng cho mèo</a></li>
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Product
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseThree" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Thức ăn cho chó, mèo</a></li>
                            <li><a class="text-decoration-none" href="#">Cát vệ sinh cho chó, mèo</a></li>
                            <li><a class="text-decoration-none" href="#">Vật dụng ăn uống cho chó, mèo</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">All</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">Đực's</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none" href="#">Cái's</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 pb-4">
                        <div class="d-flex">
                            <select class="form-control">
                                <option>Nổi bật</option>
                                <option>A to Z</option>
                                <option>Item</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php 
                    foreach($data as $sp)
                    {
                        ?>
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid" src="assets/img/<?php echo $sp->hinh ?>">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <form action="shop-single.php" method="post">
                                                <li><i class="btn btn-success text-white mt-2 far fa-heart"><input type="submit" class="btn btn-success far fa-heart" name="submit" value="Thích"></i></li>
                                            </form>
                                            <form action="shop-single.php" method="post">
                                                <input type="text" name="math" hidden value="<?php echo $sp->math?>">
                                                <input type="text" name="masp" hidden value="<?php echo $sp->masp?>">
                                                <li><i class="btn btn-success text-white mt-2 far fa-eye"><input type="submit" class="btn btn-success far fa-eye" name="submit" value="Xem"></i></li>
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="shop-single.html" class="h3 text-decoration-none"><?php echo $sp->tensp ?></a>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <li class="pt-2">
                                            <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                                        <li>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <p class="text-center mb-0"><?php echo $sp->gia ?><u>đ</u></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                ?>
                </div>
                <div div="row">
                    <ul class="pagination pagination-lg justify-content-end">
                        <?php 
                        for($i=0;$i<=$totalpage;$i++){
                            ?>
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="?per_page=8&page=<?php echo$i+1 ?>" tabindex="-1"><?php echo $i+1 ?></a>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- End Content -->

    <!-- Start Brands -->
    <?php
        include "./pages/brands.php"
    ?>
    <!--End Brands-->


    <!-- Start Footer -->
    <?php
        include "./pages/footer.php"
    ?>
    <!-- End Footer -->

    <!-- Start Script -->
    <?php
        include "./pages/script.php"
    ?>
    <!-- End Script -->
</body>

</html>