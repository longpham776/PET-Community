<?php 
include_once './config.php';
include './pdo.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PET Shop - Thông tin sản phẩm</title>
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

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
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



    <!-- Open Content -->
    <?php
        include "./pages/content_nhannuoi.php"
    ?>
    <!-- Close Content -->

    <!-- Start Footer -->
    <?php
        include "./pages/footer.php"
    ?>
    <!-- End Footer -->

    

</body>

</html>