<?php 
session_start();
include_once './config.php';
include './pdo.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PET Community - Nhận nuôi</title>
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
    <style>
        .services .services-list {margin: 0 -1px}
 .services .services-list:after {
    display: block;
    content: "";
    clear: both
}
 .services .services-list li {
    position: relative;
    overflow: hidden
}
@media (min-width: 992px) {
     .services .services-list li {
        float: left;
        width: 24%;
        width: -webkit-calc(25% - 2px);
        width: calc(25% - 2px);
        margin: 1px
    }
}
 .services .services-list li img {
    width: 100%;
    -webkit-transition: -webkit-transform .3s ease-out;
    transition: -webkit-transform .3s ease-out;
    transition: transform .3s ease-out;
    transition: transform .3s ease-out, -webkit-transform .3s ease-out
}
 .services .services-list li .detail {
    position: absolute;
    width: 100%;
    top: 50%;
    left: 0;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    text-align: center
}
 .services .services-list li .detail h3 {
    margin: 0;
    font-size: 225%;
    color: #FFFFFF;
    text-transform: uppercase;
    font-family: UTMBebas, sans-serif
}
@media (min-width: 1400px) {
     .services .services-list li .detail h3 {font-size: 260%}
}
@media (min-width: 1600px) {
    .services .services-list li .detail h3 {font-size: 285%}
}
 .services .services-list li .detail a {
    display: inline-block;
    margin: 8px auto 0;
    color: #FFFFFF;
    border-bottom: 1px solid #FFFFFF;
    -webkit-transition: all .2s;
    transition: all .2s
}
 .services .services-list li .detail a:hover {
    color: #FFF444;
    border-bottom-color: #FFF444
}
.services .services-list li:hover img {
    -webkit-transform: scale(1.15);
    -ms-transform: scale(1.15);
    transform: scale(1.15)
}
.text hr{
    border:none;
  border-top:1px dotted #000000;
  color:#000000;
  background-color:#fff;
  height:1px;
  width:100%;
}
/////
.line-through p{
   -webkit-text-decoration-line: line-through; /* Safari */
   text-decoration-line: line-through; 
}
    </style>
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




    <!-- Start Categories of The Month -->
    <?php
        include "./pages/category-nhannuoi.php"
    ?>
    <!-- End Categories of The Month -->


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